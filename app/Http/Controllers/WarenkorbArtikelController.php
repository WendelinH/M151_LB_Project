<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WarenkorbArtikelController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        dd($request->all());
        /* try {
            Artikel::query()->create([
                'artikel_id' => $request->input('artikel_id'),
            ]);
        } catch (\Exception $exeption) {
            Log::error('Failed '+ $exeption, ['exeption' => $exeption->getMessage()]);

            // TODO show Error in View

            return back();
        }
        return redirect(route('home')); */
    }
}
