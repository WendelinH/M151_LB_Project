@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @auth
            <div class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <h1>Inhalt</h1>
                    </div>
                    @if (Auth::user()->isAdmin())
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ route('inhalt.create'); }}" class="btn btn-primary" role="button"><i class="las la-plus"></i>Create</a>
                        </li>
                    </ul>
                    @endif
                </div>
            </div>
            <div class="row">
                @foreach ($inhalts as $inhalt)
                <div class="col-md-3">
                    <div class="card m-2" style="width: 18rem;">
                        <img class="card-img-top" src="img/{{ $inhalt->image_path }}" alt="{{ $inhalt->image_path }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $inhalt->bezeichnung }}</h5>
                            <p class="card-text">{{ $inhalt->preis }} CHF</p>
                            <a href="{{ route('inhalt.show', ['inhalt' => $inhalt->id]); }}" class="btn btn-primary"><i class="las la-eye"></i> Show</a>
                            @if (Auth::user()->isAdmin())
                            <br>
                            <a href="{{ route('inhalt.edit', ['inhalt'=> $inhalt->id]); }}" class="btn btn-warning"><i class="las la-pen"></i>Edit</a>
                            <br>
                            <form 
                                method="post" 
                                action="{{ action([\App\Http\Controllers\InhaltController::class, 'destroy'], $inhalt) }}" 
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="las la-trash"></i>Löschen</button>
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
