@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <h1>Artikel - {{ $artikel->bezeichnung }}</h1>
            @Auth
            <div class="row">
                <div class="col-lg">
                    <img class="" src="../../img/{{ $artikel->image_path }}" alt="{{ $artikel->image_path }}" style="width: 100%;">
                </div>
                <div class="col">
                    <h2>{{ $artikel->bezeichnung }}</h2>
                    <span>{{ $artikel->preis }} CHF</span>
                    <form method="post" action="{{ action([\App\Http\Controllers\WarenkorbArtikelController::class, 'store']) }}">
                        @csrf
                        @method('POST')
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <input type="hidden" value="{{ $artikel->id }}" id="artikel_{{ $artikel->id }}" name='artikel'>
                            </li>
                            @foreach ($inhalte as $inhalt)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="inhalt_{{ $inhalt->id }}" name='{{ $inhalt->id }}'>
                                    <label class="form-check-label" for="inhalt_{{ $inhalt->id }}">
                                        {{ $inhalt->bezeichnung }}
                                    </label>
                                </div>
                                <img class="roundet" style="height: 100px" src="../../img/{{ $inhalt->image_path }}" alt="{{ $inhalt->image_path }}">
                                <span class="badge bg-secondary rounded-pill">{{ $inhalt->preis }} CHF</span>
                            </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('artikel.index'); }}" class="btn btn-info">
                            <i class="las la-chevron-left"></i>
                            Zur??ck zur Artikelauswahl
                        </a>
                        <button type="submit" class="btn btn-primary"><i class="las la-cart-plus"></i>{{ __('Bestellen') }}</button>
                    </form>
                    @if (Auth::user()->isAdmin())
                    <a href="{{ route('artikel.edit', ['artikel'=> $artikel->id]); }}" class="btn btn-warning"><i class="las la-pen"></i>Edit</a>
                    <br>
                    <form method="post" action="{{ action([\App\Http\Controllers\ArtikelController::class, 'destroy'], $artikel) }}" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="las la-trash"></i>L??schen</button>
                    </form>
                    @endif
                </div>
            </div>
            @endauth
            @guest
            <p>Bitte Anmelden</p>
            @endguest
        </div>
    </div>
</div>
@endsection