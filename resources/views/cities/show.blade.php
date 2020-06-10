@extends('layouts.layout')

@section('content')
    <h1 class="mt-5">Steden</h1>

    <nav class="nav">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cities.index') }}">Overzicht</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cities.create') }}">Aanmaken</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('cities.show',
                                                    ['city' => $city->id]) }}">Stad details</a>
            </li>
        </ul>
    </nav>

    <div class="card">
        <div class="card-header">
            Stad details
        </div>
        <div class="card-body">
            <h2 class="card-title">{{ $city->name }}</h2>
            <p class="card-text">{{ $city->description }}</p>
            <p class="card-text">{{ $city->province->name }}</p>
        </div>
    </div>

@endsection

