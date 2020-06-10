@extends('layouts.layout')

@section('content')
    <h1 class="mt-5">Steden</h1>

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <nav class="nav">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('cities.index') }}">Overzicht</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cities.create') }}">Aanmaken</a>
            </li>
        </ul>
    </nav>

    <table class="table .table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Naam stad</th>
            <th scope="col">Beschrijving</th>
            <th scope="col">Details</th>
            <th scope="col">Aanpassen</th>
            <th scope="col">Verwijderen</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cities as $city)
            <tr>
                <td scope="row">{{ $city->id }}</td>
                <td>{{ $city->name }}</td>
                <td>{{ $city->description }}</td>
                <td><a href="{{ route('cities.show',
                                ['city' => $city->id]) }}">Details</a></td>
                <td><a href="{{ route('cities.edit',
                                      ['city' => $city->id]) }}">Aanpassen</a></td>
                <td><a href="{{ route('cities.delete',
                                        ['city' => $city->id]) }}">Verwijderen</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection

