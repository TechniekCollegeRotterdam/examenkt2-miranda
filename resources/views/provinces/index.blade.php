@extends('layouts.layout')

@section('content')
    <h1 class="mt-5">Provincies</h1>

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if(session('red'))
        <div class="alert alert-danger">
            {{ session('red') }}
        </div>
    @endif

    <nav class="nav">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('provinces.index') }}">Overzicht</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('provinces.create') }}">Aanmaken</a>
            </li>
        </ul>
    </nav>

    <table class="table .table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Naam provincie</th>
            <th scope="col">Details</th>
            <th scope="col">Aanpassen</th>
            <th scope="col">Verwijderen</th>
        </tr>
        </thead>
        <tbody>
        @foreach($provinces as $province)
            <tr>
                <td scope="row">{{ $province->id }}</td>
                <td>{{ $province->name }}</td>
                <td><a href="{{ route('provinces.show',
                                ['province' => $province->id]) }}">Details</a></td>
                <td><a href="{{ route('provinces.edit',
                                      ['province' => $province->id]) }}">Aanpassen</a></td>
                <td><a href="{{ route('provinces.delete',
                                        ['province' => $province->id]) }}">Verwijderen</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection

