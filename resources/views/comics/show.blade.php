@extends('layouts.app')

@section('main_content')
    <section>
        
        <div class="container">
            <h1>Dettaggli Fumetto : {{ $comics->title}}</h1>

            <div class="card" style="width: 20rem;">
                <img class="card-img-top" src="{{$comics->thumb}}" alt="{{$comics->title}}">
                <div class="card-block">
                <h4 class="card-title">{{$comics->title}}</h4>

                <p>Serie:{{$comics->series}}</p>

                @if($comics->description)
                    <p>{{$comics->description}}</p>
                @endif

                <h5>Prezzo: {{$comics->price}} €</h5>
                
                </div>
        </div>

    </section>
@endsection