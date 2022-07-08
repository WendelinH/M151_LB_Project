<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\DB;

use App\Models\Artikel;
use App\Models\Konfiguration;
use App\Models\Inhalt;

class ArtikelController extends Controller
{
    public function index(){
        $artikels = Artikel::all();
        return view('artikel.index',['artikels'=>$artikels]);
    }

    public function show(Artikel $artikel)
    {
        $inhalte = DB::table('artikels')
            ->join('konfigurations', 'artikels.id', '=', 'konfigurations.artikel_id')
            ->join('inhalts', 'inhalts.id', '=', 'konfigurations.inhalt_id')
            ->select('inhalts.*')
            ->where('artikels.id', '=', $artikel->id)
            ->get();
        return view('artikel.show',['artikel'=>$artikel, 'inhalte'=>$inhalte]);
    }

    public function create(Artikel $artikel)
    {
        $inhalte = Inhalt::all();
        return view('artikel.create',['inhalte'=>$inhalte]);
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $artikel = Artikel::query()->create([
                'bezeichnung' => $request->input('bezeichnung'),
                'preis' => $request->input('preis'),
                'image_path' => $request->input('image_path'),
            ]);
            foreach ($request->all() as $index => $item){
                if ($item == 'true'){
                    Konfiguration::query()->create([
                        'artikel_id' => $artikel->id,
                        'inhalt_id' => $index,
                    ]);
                }
            }
        } catch (\Exception $exeption) {
            Log::error('Failed '+ $exeption, ['exeption' => $exeption->getMessage()]);

            // TODO show Error in View

            return back();
        }
        return redirect(route('artikel.index'));
    }

    public function destroy(Artikel $artikel): RedirectResponse
    {
        $artikel->delete();
        return redirect(route('artikel.index'));;
    }

    public function edit(Artikel $artikel)
    {
        $usedInhalte =  DB::table('artikels')
            ->join('konfigurations', 'artikels.id', '=', 'konfigurations.artikel_id')
            ->join('inhalts', 'inhalts.id', '=', 'konfigurations.inhalt_id')
            ->select('inhalts.*')
            ->where('artikels.id', '=', $artikel->id)
            ->get();
        $inhalte =  Inhalt::all();
        return view('artikel.edit',['artikel'=>$artikel, 'usedInhalte'=>$usedInhalte, 'inhalte'=>$inhalte]);
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::find($id);
        $artikel->bezeichnung = $request->input('bezeichnung');
        $artikel->preis = $request->input('preis');
        $artikel->image_path = $request->input('image_path');
        $artikel->update();

        Konfiguration::where('artikel_id', $artikel->id)->delete();

        foreach ($request->all() as $index => $item){
            if ($item == 'true'){
                Konfiguration::query()->create([
                    'artikel_id' => $artikel->id,
                    'inhalt_id' => $index,
                ]);
            }
        }

        return redirect(route('artikel.show', ['artikel' => $artikel->id]));
    }
}