@extends('layouts.app')

@section('main_content')
    <section>
        <div class="container">
            <h1>Homepage fumetti:</h1>


            <div class="row">
                
                @foreach ($comics as $comic)
                <div class="col-3">
                    <div class="card" style="width: 20rem;">
                        <img class="card-img-top" src="{{$comic->thumb}}" alt="{{$comic->title}}">
                        <div class="card-block">
                        <h4 class="card-title">{{$comic->title}}</h4>

                        <p>{{$comic->series}}</p>

                        <h5>{{$comic->price}} €</h5>
                        <a href="{{ route('comics.show', [ 
                            'comic'=> $comic->id
                        ])}}" class="btn btn-primary">Vedi dettagli..
                        </a>

                        <div class="card-row">
                            <a href="{{ route('comics.edit', $comic->id) }}">Modifica Fumetto</a>
                        </div>

                        <div class="card-row">
                            <form action="{{ route('comics.destroy', [
                                'comic' => $comic->id
                            ]) }} " method="post">
                            
                            @csrf
                            @method('DELETE')
                
                            <input type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger" value="elimina">
                            </form>
                        </div>
                
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </section>
@endsection