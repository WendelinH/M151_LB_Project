@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @auth()
            @if (Auth::user()->kunde == null)
            <h1>Kunde</h1>
            <h2>Create - Form</h2>
            <form 
                method="post" 
                action="{{ action([\App\Http\Controllers\KundeController::class, 'store']) }}">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="nachname" class="form-label">Nachname</label>
                    <input type="text" class="form-control" id="nachname" name='nachname'>
                </div>
                <div class="mb-3">
                    <label for="vorname" class="form-label">Vorname</label>
                    <input type="text" class="form-control" id="vorname" name='vorname'>
                </div>
                <div class="mb-3">
                    <label for="ort" class="form-label">Ort</label>
                    <input type="text" class="form-control" id="ort" name='ort'>
                </div>
                <div class="mb-3">
                    <label for="plz" class="form-label">PLZ</label>
                    <input type="text" class="form-control" id="plz" name='plz'>
                </div>
                <div class="mb-3">
                    <label for="strasse" class="form-label">Strasse</label>
                    <input type="text" class="form-control" id="strasse" name='strasse'>
                </div>
                <div class="mb-3">
                    <label for="tel" class="form-label">Telefon Nummer</label>
                    <input type="text" class="form-control" id="tel" name='tel'>
                </div>
                <div class="btn-group">
                    <a href="{{ route('home'); }}" class="btn btn-dark"><i class="las la-chevron-left"></i>Zurück</a>
                    <button type="submit" class="btn btn-dark">Weiter<i class="las la-chevron-right"></i></button>
                </div>
            </form>
            
            @else
            <h1>Nothing to see hier.</h1>
            @endif
            @endauth
            @guest
                <p>Bitte Anmelden</p>
            @endguest
        </div>
    </div>
</div>
@endsection
