@extends('layouts.app')

@section('main_content')
<div class="container form_container">
    <h2>Aggiungi un nuovo Fumetto:</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('comics.store') }}" method="post">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <label for="series">Serie D'appartenenza</label>
            <input type="text" class="form-control" name="series" id="series" value="{{ old('series') }}">
        </div>

        <div class="form-group">
            <label for="thumb">Copertina</label>
            <input type="text" class="form-control" name="thumb" id="thumb" value="{{ old('thumb') }}">
        </div>

        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
        </div>


        <div class="form-group">
            <label for="price">Prezzo</label>
            <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}">
        </div>

        <input type="submit" class="btn btn-primary" value="Crea">
    </form>
</div>
@endsection