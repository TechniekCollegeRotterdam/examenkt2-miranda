@extends('layouts.layout')

@section('content')
    <h1 class="mt-5">Steden</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <nav class="nav">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cities.index') }}">Overzicht</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cities.create') }}">Aanmaken</a>
            </li>
            <li class="nav-link">
                <a class="nav-link active" href="{{ route('cities.edit',
                                                   ['city' => $city->id]) }}">Aanpassen</a>
            </li>
        </ul>
    </nav>

    <form method="POST" action="/cities/{{$city->id}}}">
        @method('PUT')
        @csrf

        <div class="form-group">
            <label for="name">Naam stad</label>
            <input type="text" name="name" class="form-control" id="name"
                   aria-describedby="CitynameHelp" value="{{ $city->name }}">
        </div>

        <div class="form-group">
            <label for="description">Beschrijving</label>
            <textarea class="form-control" name="description" id="description" rows="3">
                {{$city->description}}
            </textarea>
        </div>
        <button type="submit" class="btn btn-primary">Updaten</button>
    </form>

@endsection


