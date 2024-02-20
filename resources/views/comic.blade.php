@extends('layouts.mockup')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h1>COMIC</h1>
                </div>
                <div class="d-flex gap-3">
                  <a href="{{ route('comics.edit', ['comic'=>$comic]) }}" class="btn btn-warning">Modifica</a>
                  <form action="{{ route('comics.destroy', ['comic'=>$comic->id]) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare il comic?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Elimina</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="{{ $comic->thumb }}" class="img-fluid rounded-start" alt="{{ $comic->title }}">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">{{ $comic->title }}</h5>
                          <p class="card-text">{{ $comic->description }}</p>
                          <p class="card-text"><small class="text-body-secondary">Artisti: {{ $comic->artists }}</small></p>
                          <p class="card-text"><small class="text-body-secondary">Srcittori: {{ $comic->writers }}</small></p>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection