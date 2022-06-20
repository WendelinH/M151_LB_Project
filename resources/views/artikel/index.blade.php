@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <h1>Artikel</h1>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ route('artikel.create'); }}" class="btn btn-primary" role="button"><i class="las la-plus"></i>Create</a>
                        </li>
                    </ul>
                </div>
            </div>

            @auth
            <div class="row">
                @foreach ($artikels as $artikel)
                <div class="col-md-3">
                    <div class="card m-2" style="width: 18rem;">
                        <img class="card-img-top" src="img/{{ $artikel->image_path }}" alt="{{ $artikel->image_path }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $artikel->bezeichnung }}</h5>
                            <p class="card-text">{{ $artikel->preis }}</p>
                            <a href="{{ route('artikel.show', ['artikel' => $artikel->id]); }}" class="btn btn-primary">Bestellen</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @guest
                <p>Bitte Anmelden</p>
            @endguest
        </div>
    </div>
</div>
@endsection
