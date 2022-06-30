@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @Auth
                <h2>Danke für Ihren einkauf.</h2>
                <img src="../img/danke.jpg" alt="danke.jpg">
            @endauth
            @guest
                <p>Bitte Anmelden</p>
            @endguest
        </div>
    </div>
</div>
@endsection
