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

    /* public function edit(Artikel $artikel)
    {
        return view('artikel.edit',['artikel'=>$artikel]);
    } */

    public function create(Artikel $artikel)
    {
        return view('artikel.create');
    }

    /* public function store(Request $request): RedirectResponse
    {
        try {
            Artikel::query()->create([
                'name' => $request->input('name'),
            ]);
        } catch (\Exception $exeption) {
            Log::error('Failed '+ $exeption, ['exeption' => $exeption->getMessage()]);

            // TODO show Error in View

            return back();
        }
        return redirect(route('home'));
    } */

    public function destroy(Artikel $artikel): RedirectResponse
    {
        $artikel->delete();
        return back();
    }

    /* public function update(Artikel $artikel)
    {
        dd($artikel);
    } */
}