@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <h1>Airport - {{ $airport->name }}</h1>

            <h2>Edit</h2>

            @auth
            <table class='table table-bordered'>
                <thead>
                    <tr>
                        <td>id</td>
                        <td>name</td>
                        <td>created_at</td>
                        <td>updated_at</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $airport->id }}</td>
                        <td>{{ $airport->name }}</td>
                        <td>{{ $airport->created_at }}</td>
                        <td>{{ $airport->updated_at }}</td>
                    </tr>
                </tbody>
            </table>
            @endauth
            @guest
                <p>Bitte Anmelden</p>
            @endguest
        </div>
    </div>
</div>
@endsection
