@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <h1>Airport</h1>

            <h2>Create</h2>

            @auth
            <form 
                method="post" 
                action="{{ action([\App\Http\Controllers\AirportsViewController::class, 'store']) }}">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name='name' aria-describedby="nameHelp" placeholder="Enter Name">
                    <small id="nameHelp" class="form-text text-muted">Name of the Airport.</small>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
            @endauth
            @guest
                <p>Bitte Anmelden</p>
            @endguest
        </div>
    </div>
</div>
@endsection
