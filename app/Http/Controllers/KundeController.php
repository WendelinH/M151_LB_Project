<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use App\Models\Kunde;

class KundeController extends Controller
{

    public function show(Kunde $kunde)
    {
        if (Auth::user()->warenkorb != null){
            $warenkorb = Auth::user()->warenkorb;

            $artikels = DB::table('warenkorbs')
            ->join('warenkorb_artikels', 'warenkorbs.id', '=', 'warenkorb_artikels.warenkorb_id')
            ->join('artikels', 'artikels.id', '=', 'warenkorb_artikels.artikel_id')
            ->select('artikels.*', 'warenkorb_artikels.id as warenkorb_artikel_id')
            ->where('warenkorbs.id', '=', $warenkorb->id)
            ->get();

            $inhalte = [];
            foreach ($artikels as $artikel){
                $inhalte[] = DB::table('warenkorb_artikels')
                                ->join('warenkorb_artikel_inhalts', 'warenkorb_artikels.id', '=', 'warenkorb_artikel_inhalts.warenkorb_artikel_id')
                                ->join('inhalts', 'inhalts.id', '=', 'warenkorb_artikel_inhalts.inhalt_id')
                                ->select('inhalts.*', 'warenkorb_artikels.id as warenkorb_artikel_id')
                                ->where('warenkorb_artikels.id', '=', $artikel->warenkorb_artikel_id)
                                ->get();
                
            }
            
            $preise_data = DB::table('warenkorb_artikels')
                                ->join('warenkorb_artikel_inhalts', 'warenkorb_artikels.id', '=', 'warenkorb_artikel_inhalts.warenkorb_artikel_id')
                                ->join('inhalts', 'inhalts.id', '=', 'warenkorb_artikel_inhalts.inhalt_id')
                                ->select('warenkorb_artikels.id', DB::raw("SUM(inhalts.preis) as preis"))
                                ->groupBy('warenkorb_artikels.id')
                                ->get();
            
            $preise = [];
            foreach ($artikels as $index => $artikel){
                $preise[] = (float)$artikel->preis + (float)$preise_data->get($index)->preis;
            }
            return view('kunde.show',['kunde'=>$kunde, 'artikels'=>$artikels, 'inhalte'=>$inhalte, 'preise'=>$preise]);
        }
        return view('kunde.show',['kunde'=>$kunde]);
    }

    public function edit(Kunde $kunde)
    {
        return view('kunde.edit',['kunde'=>$kunde]);
    }

    public function create(Kunde $kunde)
    {
        return view('kunde.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $kunde = NULL;
        try {
            $kunde = Kunde::query()->create([
                'user_id' => Auth::user()->id,
                'kunde_seit' => Carbon::now(),
                'nachname' => $request->input('nachname'),
                'ort' => $request->input('ort'),
                'plz' => $request->input('plz'),
                'strasse' => $request->input('strasse'),
                'tel' => $request->input('tel'),
                'vorname' => $request->input('vorname'),
            ]);
        } catch (\Exception $exeption) {
            Log::error($exeption, ['exeption' => $exeption->getMessage()]);

            // TODO show Error in View

            return back();
        }
        return redirect(route('kunde.show', ['kunde' => $kunde->id]));
    }

    public function update(Request $request, $id)
    {
        $kunde = Kunde::find($id);
        $kunde->nachname = $request->input('nachname');
        $kunde->ort = $request->input('ort');
        $kunde->plz = $request->input('plz');
        $kunde->strasse = $request->input('strasse');
        $kunde->tel = $request->input('tel');
        $kunde->vorname = $request->input('vorname');
        $kunde->update();

        return redirect(route('kunde.show', ['kunde' => $kunde->id]));
    }
}