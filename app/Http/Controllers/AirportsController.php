<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use App\Models\Airport;

class AirportsController extends Controller
{
    public function index(){
        $airports = Airport::all();
        return view('airport.index',['airports'=>$airports]);
    }

    public function show(Airport $airport)
    {
        return view('airport.show',['airport'=>$airport]);
    }

    public function edit(Airport $airport)
    {
        return view('airport.edit',['airport'=>$airport]);
    }

    public function create(Airport $airport)
    {
        return view('airport.create');
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            Airport::query()->create([
                'name' => $request->input('name'),
            ]);
        } catch (\Exception $exeption) {
            Log::error('Failed '+ $exeption, ['exeption' => $exeption->getMessage()]);

            // TODO show Error in View

            return back();
        }
        return redirect(route('airports.index'));
    }

    public function destroy(Airport $airport): RedirectResponse
    {
        $airport->delete();
        return back();
    }

    public function update(Airport $airport)
    {
        dd($airport);
    }
}