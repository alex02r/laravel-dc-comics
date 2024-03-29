@extends('layouts.mockup')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1>Aggiungi un nuovo Comic</h1>
            </div>
            <div class="col-8">
                <div class="bg-white rounded p-5 text-dark">
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
                        
                        <div class="mb-3">
                            <label for="thumb" class="form-label">Inserisci link dell'immagine :</label>
                            <input type="text" name="thumb" id="thumb" class="form-control" value="{{ old('thumb') }}">
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Inserisci titolo:</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Inserisci prezzo:</label>
                            <input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Inserisci la descrizione:</label>
                            <textarea name="description" id="description" class="form-control"required>{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="series" class="form-label">Inserisci la serie:</label>
                            <input type="text" name="series" id="series" class="form-control" value="{{ old('series') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Inserisci il tipo:</label>
                            <input type="text" name="type" id="type" class="form-control" value="{{ old('type') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="sale_date" class="form-label">Inserisci data di uscita:</label>
                            <input type="date" name="sale_date" id="sale_date" class="form-control" value="{{ old('sale_date') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="artists" class="form-label">
                                Inserisci gli artisti: <br>
                                <span class="text-secondary">Separa i nomi usando "," (Es: example, example1, ...)</span>
                            </label>
                            <input type="text" name="artists" id="artists" class="form-control" value="{{ old('artists') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="writers" class="form-label">
                                Inserisci gli scrittori: <br>
                                <span class="text-secondary">Separa i nomi usando ","  (Es: example, example1, ...)</span>
                            </label>
                            <input type="text" name="writers" id="writers" class="form-control" value="{{ old('writers') }}" required>
                        </div>

                        <input type="submit" value="invia" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection