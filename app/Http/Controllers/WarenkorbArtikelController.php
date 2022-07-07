<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use \App\Models\Warenkorb;
use \App\Models\Warenkorb_artikel;
use \App\Models\Warenkorb_artikel_inhalt;

class WarenkorbArtikelController extends Controller
{
    public function store(Request $request): RedirectResponse
    {

        if (Auth::user()->warenkorb == null){
            $warenkorb = Warenkorb::query()->create([
                'user_id' => Auth::user()->id,
            ]);
        }else{
            $warenkorb = Auth::user()->warenkorb;
        }


        $warenkorbArtikel = Warenkorb_artikel::query()->create([
            'warenkorb_id' => $warenkorb->id,
            'artikel_id' => $request->input('artikel'),
        ]);
        foreach ($request->all() as $index => $item){
            if ($item == null){
                Warenkorb_artikel_inhalt::query()->create([
                    'warenkorb_artikel_id' => $warenkorbArtikel->id,
                    'inhalt_id' => $index,
                ]);
            }
        }
        return redirect(route('home'));
    }
}
