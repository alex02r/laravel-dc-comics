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
                        
                        <div class="mb-3">
                            <label for="img" class="form-label">Inserisci link dell'immagine :</label>
                            <input type="text" name="img" id="img" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="titolo" class="form-label">Inserisci titolo:</label>
                            <input type="text" name="titolo" id="titolo" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Inserisci prezzo:</label>
                            <input type="text" name="price" id="price" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Inserisci la descrizione:</label>
                            <textarea name="description" id="description" class="form-control" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="series" class="form-label">Inserisci la serie:</label>
                            <input type="text" name="series" id="series" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Inserisci il tipo:</label>
                            <input type="text" name="type" id="type" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="date" class="form-label">Inserisci data di uscita:</label>
                            <input type="date" name="date" id="date" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="artists" class="form-label">
                                Inserisci gli artisti: <br>
                                <span class="text-secondary">Separa i nomi usando "," (Es: example, example1, ...)</span>
                            </label>
                            <input type="text" name="artists" id="artists" class="form-control" required>
                        </div>

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