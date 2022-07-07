<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\DB;

use App\Models\Inhalt;

class InhaltController extends Controller
{
    public function index(){
        $inhalts = Inhalt::all();
        return view('inhalt.index',['inhalts'=>$inhalts]);
    }

    public function show(Inhalt $inhalt)
    {
        return view('inhalt.show',['inhalt'=>$inhalt]);
    }

    public function create(Inhalt $inhalt)
    {
        return view('inhalt.create');
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            Inhalt::query()->create([
                'bezeichnung' => $request->input('bezeichnung'),
                'preis' => $request->input('preis'),
                'image_path' => $request->input('image_path'),
            ]);
        } catch (\Exception $exeption) {
            Log::error('Failed '+ $exeption, ['exeption' => $exeption->getMessage()]);

            // TODO show Error in View

            return back();
        }
        return redirect(route('inhalt.index'));
    }

    public function destroy(Inhalt $inhalt): RedirectResponse
    {
        $inhalt->delete();
        return redirect(route('inhalt.show'));
    }

    public function edit(Inhalt $inhalt)
    {
        return view('inhalt.edit',['inhalt'=>$inhalt]);
    }

    public function update(Request $request, $id)
    {
        $inhalt = Inhalt::find($id);
        $inhalt->bezeichnung = $request->input('bezeichnung');
        $inhalt->preis = $request->input('preis');
        $inhalt->image_path = $request->input('image_path');
        $inhalt->update();

        return redirect(route('inhalt.show', ['inhalt' => $inhalt->id]));
    }
}