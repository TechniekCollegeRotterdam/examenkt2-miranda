@extends('layouts.layout')

@section('content')
    <h1 class="mt-5">Provincies</h1>

    <nav class="nav">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('provincepublic') }}">Overzicht</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('provinceshow',
                                                    ['province' => $province->id]) }}">Provincie details</a>
            </li>
        </ul>
    </nav>

    <div class="card">
        <div class="card-header">
            Provincie details
        </div>
        <div class="card-body">
            <h2 class="card-title">{{ $province->name }}</h2>
            <table class="table .table-striped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Naam stad</th>
                </tr>
                </thead>
                <tbody>
                @foreach($province->city as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><a href="{{ route('cityshow',
                                         ['city' => $item->id]) }}">{{ $item->name }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

