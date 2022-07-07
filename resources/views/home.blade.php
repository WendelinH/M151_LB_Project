@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @auth
        <div class="col-md-8 mb-3">
            <div class="card">
                <div class="card-header">{{ __('Artikel') }}</div>

                <div class="card-body">
                    <div>
                        <a href="{{ route('artikel.index'); }}" class="btn btn-primary btn-lg btn-block">Auswahl anzeigen.</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Warenkorb') }}</div>

                <div class="card-body">
                    @if (Auth::user()->warenkorb != null)
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
                                @if (Auth::user()->kunde != null)
                                <a class="btn btn-info" href="{{ route('kunde.edit', ['kunde' => Auth::user()->kunde->id]); }}" role="button">Check out</a>
                                @else
                                <a class="btn btn-info" href="{{ route('kunde.create'); }}" role="button">Check out</a>
                                @endif
                            </div>
                            <span class="badge bg-dark rounded-pill fs-4">{{ array_sum($preise) }} CHF</span>
                        </li>
                    </ul>
                    @endif
                </div>
            </div>
        </div>
        @endauth

        <div class="col-md-8 mb-3">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
