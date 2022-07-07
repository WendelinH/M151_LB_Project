@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @auth
            @if (Auth::user()->isAdmin())
            <h1>Inhalt - {{ $inhalt->bezeichnung }}</h1>
            <div class="row">
                <div class="col-lg">
                    <img class="" src="../../img/{{ $inhalt->image_path }}" alt="{{ $inhalt->image_path }}" style="width: 100%;">
                </div>
                <div class="col">
                    <h2>{{ $inhalt->bezeichnung }}</h2>
                    <span>{{ $inhalt->preis }} CHF</span>
                    <br>
                    <a href="{{ route('inhalt.edit', ['inhalt'=> $inhalt->id]); }}" class="btn btn-warning"><i class="las la-pen"></i>Edit</a>
                    <br>
                    <form method="post" action="{{ action([\App\Http\Controllers\InhaltController::class, 'destroy'], $inhalt) }}" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="las la-trash"></i>Löschen</button>
                    </form>
                </div>
            </div>
            @endif
            @endauth
            @guest
            <p>Bitte Anmelden</p>
            @endguest
        </div>
    </div>
</div>
@endsection