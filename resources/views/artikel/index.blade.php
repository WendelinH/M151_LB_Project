@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @auth
            <div class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <h1>Artikel</h1>
                    </div>
                    @if (Auth::user()->isAdmin())
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ route('artikel.create'); }}" class="btn btn-primary" role="button"><i class="las la-plus"></i>Create</a>
                        </li>
                    </ul>
                    @endif
                </div>
            </div>
            <div class="row">
                @foreach ($artikels as $artikel)
                <div class="col-md-3">
                    <div class="card m-2" style="width: 18rem;">
                        <img class="card-img-top" src="img/{{ $artikel->image_path }}" alt="{{ $artikel->image_path }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $artikel->bezeichnung }}</h5>
                            <p class="card-text">{{ $artikel->preis }} CHF</p>
                            <a href="{{ route('artikel.show', ['artikel' => $artikel->id]); }}" class="btn btn-primary"><i class="las la-cart-plus"></i>Bestellen</a>
                            @if (Auth::user()->isAdmin())
                            <br>
                            <a href="{{ route('artikel.edit', ['artikel'=> $artikel->id]); }}" class="btn btn-warning"><i class="las la-pen"></i>Edit</a>
                            <br>
                            <form 
                                method="post" 
                                action="{{ action([\App\Http\Controllers\ArtikelController::class, 'destroy'], $artikel) }}" 
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="las la-trash"></i>L??schen</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endauth
            @guest
                <p>Bitte Anmelden</p>
            @endguest
        </div>
    </div>
</div>
@endsection
