@extends('layouts.app')

@section('main_content')
<div class="container form_container">
    <h2>Modifica un Fumetto:</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('comics.update', [
        'comic' => $comic->id
    ]) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $comic->title }}">
        </div>

        <div class="form-group">
            <label for="series">Serie D'appartenenza</label>
            <input type="text" class="form-control" name="series" id="series" value="{{ $comic->series }}">
        </div>

        <div class="form-group">
            <label for="thumb">Copertina</label>
            <input type="text" class="form-control" name="thumb" id="thumb" value="{{  $comic->thumb }}">
        </div>

        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{  $comic->description }}</textarea>
        </div>


        <div class="form-group">
            <label for="price">Prezzo</label>
            <input type="text" class="form-control" name="price" id="price" value="{{  $comic->price }}">
        </div>

        <input type="submit" class="btn btn-primary" value="Modifica">
    </form>
</div>
@endsection