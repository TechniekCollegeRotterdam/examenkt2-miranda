@extends('layouts.layout')

@section('content')
    <h1 class="mt-5">Steden</h1>

    <table class="table .table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Naam stad</th>
            <th scope="col">Beschrijving</th>
            <th scope="col">Details</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cities as $city)
            <tr>
                <td scope="row">{{ $city->id }}</td>
                <td>{{ $city->name }}</td>
                <td>{{ $city->description }}</td>
                <td><a href="{{ route('cityshow',
                                ['city' => $city->id]) }}">Details</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection


