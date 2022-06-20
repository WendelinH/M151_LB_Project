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
