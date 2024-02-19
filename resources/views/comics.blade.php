@extends('layouts.mockup')
@section('content')
    <div class="container">
        <div class="row row-gap-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1>Comics</h1>
                    </div>
                    <div>
                        <a href="{{ route('comics.create')}}" class="btn btn-success">Add Comic</a>
                    </div>
                </div>
            </div>
            @foreach ($comics as $comic)
                <div class="col-3">
                    <div class="card h-100">
                        <img src="{{ $comic->thumb }}" class="card-img-top" alt="{{ $comic->title }}" style="height: 350px">
                        <div class="card-body">
                          <h5 class="card-title">{{ $comic->title }}</h5>
                          <a href="{{route('comics.show', $comic->id)}}" class="btn btn-primary">Dettaglio</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection