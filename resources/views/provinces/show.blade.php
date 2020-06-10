@extends('layouts.layout')

@section('content')
    <h1 class="mt-5">Provincies</h1>

    <nav class="nav">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('provinces.index') }}">Overzicht</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('provinces.create') }}">Aanmaken</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('provinces.show',
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
        </div>
    </div>

@endsection
