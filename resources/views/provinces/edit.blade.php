@extends('layouts.layout')

@section('content')
    <h1 class="mt-5">Provincies</h1>

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
                <a class="nav-link" href="{{ route('provinces.index') }}">Overzicht</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('provinces.create') }}">Aanmaken</a>
            </li>
            <li class="nav-link">
                <a class="nav-link active" href="{{ route('provinces.edit',
                                                   ['province' => $province->id]) }}">Aanpassen</a>
            </li>
        </ul>
    </nav>

    <form method="POST" action="/provinces/{{$province->id}}}">
        @method('PUT')
        @csrf

        <div class="form-group">
            <label for="name">Naam provincie</label>
            <input type="text" name="name" class="form-control" id="name"
                   aria-describedby="ProvincenameHelp" value="{{ $province->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Updaten</button>
    </form>

@endsection

