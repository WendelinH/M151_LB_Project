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
            <table class='table table-bordered'>
                <thead>
                    <tr>
                        <td>id</td>
                        <td>bezeichnung</td>
                        <td>preis</td>
                        <td>image_path</td>
                        <td>created_at</td>
                        <td>updated_at</td>
                        <td>CRUD</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($artikels as $artikel)
                    <tr>
                        <td>{{ $artikel->id }}</td>
                        <td>{{ $artikel->bezeichnung }}</td>
                        <td>{{ $artikel->preis }}</td>
                        <td>{{ $artikel->image_path }}</td>
                        <td>{{ $artikel->created_at }}</td>
                        <td>{{ $artikel->updated_at }}</td>
                        <td>
                            <a href="{{ route('artikel.show', ['artikel' => $artikel->id]); }}" class="btn btn-info" role="button"><i class="las la-eye"></i>Show</a>
                            <a href="{{ route('artikel.edit', ['artikel' => $artikel->id]); }}" class="btn btn-warning" role="button"><i class="las la-edit"></i>Edit</a>
                            <form 
                                method="post" 
                                action="{{ action([\App\Http\Controllers\ArtikelController::class, 'destroy'], $artikel) }}" 
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
