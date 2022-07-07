<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
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
            return view('home',['artikels'=>$artikels, 'inhalte'=>$inhalte, 'preise'=>$preise]);
        }
        return view('home');
    }
}
