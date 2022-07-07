@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @auth()
            @if (Auth::user()->isAdmin())
            <h1>Inhalt</h1>
            <h2>Create</h2>
            <form 
                method="post" 
                action="{{ action([\App\Http\Controllers\InhaltController::class, 'store']) }}">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="bezeichnung" class="form-label">Bezeichnung</label>
                    <input type="text" class="form-control" id="bezeichnung" name="bezeichnung">
                </div>
                <div class="mb-3">
                    <label for="preis" class="form-label">Preis</label>
                    <input type="number" class="form-control" id="preis" name="preis" min="0.05" max="999999.95" step="0.05">
                </div>
                <div class="mb-3">
                    <label for="image_path" class="form-label">Bild name</label>
                    <input type="text" class="form-control" id="image_path" name="image_path">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
            @endif
            @endauth
            @guest
                <p>Bitte Anmelden</p>
            @endguest
        </div>
    </div>
</div>
@endsection
