@extends('layouts.layout')

@section('content')
    <h1 class="mt-5">Provincies</h1>

    <table class="table .table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Naam provincie</th>
            <th scope="col">Details</th>
        </tr>
        </thead>
        <tbody>
        @foreach($provinces as $province)
            <tr>
                <td scope="row">{{ $province->id }}</td>
                <td>{{ $province->name }}</td>
                <td><a href="{{ route('provinceshow',
                                ['province' => $province->id]) }}">Details</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
