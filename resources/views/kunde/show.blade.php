@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            
            @auth
            @if(Auth::user()->kunde->id == $kunde->id)
            <h1>Kunde - {{ $kunde->vorname }}</h1>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Vorname </div>
                            {{ $kunde->vorname }}
                            </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Nachname </div>
                            {{ $kunde->nachname }}
                            </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Ort </div>
                            {{ $kunde->ort }}
                            </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">PLZ </div>
                            {{ $kunde->plz }}
                            </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Strasse </div>
                            {{ $kunde->strasse }}
                            </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Tel </div>
                            {{ $kunde->tel }}
                            </div>
                    </li>
                </ul>
                <form 
                method="post" 
                action="{{ action([\App\Http\Controllers\WarenkorbController::class, 'store']) }}">
                @csrf
                @method('POST')
                    <div class="mb-3">
                        <label for="bemerkung" class="form-label">Bemerkung zur Bestellung</label>
                        <textarea class="form-control" id="bemerkung" rows="3" name="bemerkung"></textarea>
                    </div>
                    <div class="btn-group">
                        <a href="{{ route('kunde.edit', ['kunde' => $kunde->id]); }}" class="btn btn-dark"><i class="las la-chevron-left"></i>Zurück</a>
                        <button type="submit" class="btn btn-dark">Bestellung abschliesen<i class="las la-chevron-right"></i></button>
                    </div>
                </form>
        </div>
        <div class="col-md-6">
        @if (Auth::user()->warenkorb != null)
        <h1>Warenkorb von {{ $kunde->vorname }}{{ $kunde->nachname }}</h1>
        <ul class="list-group">
            @foreach ($artikels as $indexArtikel => $artikel)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">{{ $artikel->bezeichnung }}</div>
                    @foreach ($inhalte as $indexArtikelInhalt => $artikel_inhalte)
                        @if ($indexArtikelInhalt == $indexArtikel)
                            @foreach ($artikel_inhalte as $inhalt)
                                {{ $inhalt->bezeichnung }}, 
                            @endforeach
                        @endif
                    @endforeach
                </div>
                <span class="badge bg-secondary rounded-pill fs-6">{{ $preise[$indexArtikel] }} CHF</span>
            </li>
            @endforeach
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="ms-2 me-auto">
                    <div class="fw-bold fs-3">{{ __('Total:') }}</div>
                </div>
                <span class="badge bg-dark rounded-pill fs-4">{{ array_sum($preise) }} CHF</span>
            </li>
        </ul>
        @endif
            @endif
            @endauth
            @guest
                <p>Bitte Anmelden</p>
            @endguest
        </div>
    </div>
</div>
@endsection
