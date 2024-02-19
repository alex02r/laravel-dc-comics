@extends('layouts.mockup')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1>Aggiungi un nuovo Comic</h1>
            </div>
            <div class="col-8">
                <div class="bg-white rounded p-5 text-dark">
                    <form action="{{ route('comics.store') }}" method="post">
                        @csrf
                        {{-- immagine di copertina --}}
                        <div class="mb-3">
                            <label for="img" class="form-label">Inserisci link dell'immagine :</label>
                            <input type="text" name="img" id="img" class="form-control" required>
                        </div>
                        {{-- titolo --}}
                        <div class="mb-3">
                            <label for="titolo" class="form-label">Inserisci titolo:</label>
                            <input type="text" name="titolo" id="titolo" class="form-control" required>
                        </div>
                        {{-- descrizione --}}
                        <div class="mb-3">
                            <label for="description" class="form-label">Inserisci la descrizione:</label>
                            <textarea name="description" id="description" class="form-control" required></textarea>
                        </div>
                        {{-- artisti --}}
                        <div class="mb-3">
                            <label for="artists" class="form-label">
                                Inserisci gli artisti: <br>
                                <span class="text-secondary">Separa i nomi usando "," (Es: example, example1, ...)</span>
                            </label>
                            <input type="text" name="artists" id="artists" class="form-control" required>
                        </div>
                        {{-- scrittori --}}
                        <div class="mb-3">
                            <label for="writers" class="form-label">
                                Inserisci gli scrittori: <br>
                                <span class="text-secondary">Separa i nomi usando ","  (Es: example, example1, ...)</span>
                            </label>
                            <input type="text" name="writers" id="writers" class="form-control" required>
                        </div>
                        <input type="submit" value="invia" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection