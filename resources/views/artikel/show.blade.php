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
                            <form>
                                <ul class="list-group">
                                @foreach ($inhalte as $inhalt)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="inhalt_{{ $inhalt->id }}" name='{{ strtolower($inhalt->bezeichnung) }}'>
                                            <label class="form-check-label" for="inhalt_{{ $inhalt->id }}">
                                                {{ $inhalt->bezeichnung }}
                                            </label>
                                        </div>
                                        <img class="roundet" style="height: 100px" src="../../img/{{ $inhalt->image_path }}" alt="{{ $inhalt->image_path }}">
                                        <span class="badge bg-secondary rounded-pill">{{ $inhalt->preis }} CHF</span>
                                    </li>
                                @endforeach
                                </ul>
                                <button type="submit" class="btn btn-primary">{{ __('Bestellen') }}</button>
                            </form>
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
