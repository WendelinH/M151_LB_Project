<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

use Carbon\Carbon;

use App\Models\Kunde;

class KundeController extends Controller
{
    /* public function index(){
        $artikels = Kunde::all();
        return view('artikel.index',['artikels'=>$artikels]);
    } */

    public function show(Kunde $kunde)
    {
        return view('kunde.show',['kunde'=>$kunde]);
    }

    /* public function edit(Kunde $kunde)
    {
        return view('kunde.edit',['kunde'=>$kunde]);
    } */

    public function create(Kunde $kunde)
    {
        return view('kunde.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $kunde = NULL;
        try {
            $kunde = Kunde::query()->create([
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

    public function destroy(Kunde $kunde): RedirectResponse
    {
        $artikel->delete();
        return back();
    }

    /* public function update(Kunde $kunde)
    {
        dd($kunde);
    } */
}