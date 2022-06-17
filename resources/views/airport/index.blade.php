@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <h1>Airports</h1>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ route('airports.create'); }}" class="btn btn-primary" role="button"><i class="las la-plus"></i>Create</a>
                        </li>
                    </ul>
                </div>
            </div>

            @auth
            <table class='table table-bordered'>
                <thead>
                    <tr>
                        <td>id</td>
                        <td>name</td>
                        <td>created_at</td>
                        <td>updated_at</td>
                        <td>CRUD</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($airports as $airport)
                    <tr>
                        <td>{{ $airport->id }}</td>
                        <td>{{ $airport->name }}</td>
                        <td>{{ $airport->created_at }}</td>
                        <td>{{ $airport->updated_at }}</td>
                        <td>
                            <a href="{{ route('airports.show', ['airport' => $airport->id]); }}" class="btn btn-info" role="button"><i class="las la-eye"></i>Show</a>
                            <a href="{{ route('airports.edit', ['airport' => $airport->id]); }}" class="btn btn-warning" role="button"><i class="las la-edit"></i>Edit</a>
                            <form 
                                method="post" 
                                action="{{ action([\App\Http\Controllers\AirportsViewController::class, 'destroy'], $airport) }}" 
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="las la-trash"></i>Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
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
