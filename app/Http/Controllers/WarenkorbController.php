<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

use Carbon\Carbon;

use \App\Models\Bestellung;
use \App\Models\BestellPosition;
use \App\Models\BestellteKonfiguration;

class WarenkorbController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        try {

            $warenkorb = Auth::user()->warenkorb;

            $artikels = DB::table('warenkorbs')
                ->join('warenkorb_artikels', 'warenkorbs.id', '=', 'warenkorb_artikels.warenkorb_id')
                ->join('artikels', 'artikels.id', '=', 'warenkorb_artikels.artikel_id')
                ->select('artikels.id', 'warenkorb_artikels.id as warenkorb_artikel_id')
                ->where('warenkorbs.id', '=', $warenkorb->id)
                ->get();

            $bestellung = Bestellung::query()->create([
                'bemerkungen' => $request->input('bemerkung'),
                'datum' => Carbon::now(),
                'kunde_id' => Auth::user()->kunde->id,
            ]);

            foreach ($artikels as $artikel){
                $bestellPosition = BestellPosition::query()->create([
                    'artikel_id' => $artikel->id,
                    'bestellung_id' => $bestellung->id,
                ]);
                $inhalte = DB::table('warenkorb_artikels')
                    ->join('warenkorb_artikel_inhalts', 'warenkorb_artikels.id', '=', 'warenkorb_artikel_inhalts.warenkorb_artikel_id')
                    ->join('inhalts', 'inhalts.id', '=', 'warenkorb_artikel_inhalts.inhalt_id')
                    ->select('inhalts.id')
                    ->where('warenkorb_artikels.id', '=', $artikel->warenkorb_artikel_id)
                    ->get();
                foreach ($inhalte as $inhalt){
                    $bestellteKonfiguration = BestellteKonfiguration::query()->create([
                        'bestell_position_id' => $bestellPosition->id,
                        'inhalt_id' => $inhalt->id,
                    ]);
                }
            }

            $warenkorb->delete();

        } catch (\Exception $exeption) {
            Log::error($exeption, ['exeption' => $exeption->getMessage()]);

            // TODO show Error in View

            return redirect(back());
        }
        return redirect(route('danke'));
    }
}
