@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1>Modifica il Comic</h1>
            </div>
            <div class="col-8">
                <div class="bg-white rounded p-5 text-dark">
                    <form action="{{ route('comics.update', ['comic'=>$comic->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="img" class="form-label">Modifica link dell'immagine :</label>
                            <input type="text" name="img" id="img" class="form-control" value="{{ $comic->thumb }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="titolo" class="form-label">Modifica titolo:</label>
                            <input type="text" name="titolo" id="titolo" class="form-control" value="{{ $comic->title }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Modifica prezzo:</label>
                            <input type="text" name="price" id="price" class="form-control" value="{{ $comic->price }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Modifica la descrizione:</label>
                            <textarea name="description" id="description" class="form-control"required>{{ $comic->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="series" class="form-label">Modifica la serie:</label>
                            <input type="text" name="series" id="series" class="form-control" value="{{ $comic->series }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Modifica il tipo:</label>
                            <input type="text" name="type" id="type" class="form-control" value="{{ $comic->type }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="date" class="form-label">Modifica data di uscita:</label>
                            <input type="date" name="date" id="date" class="form-control" value="{{ $comic->sale_date }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="artists" class="form-label">
                                Modifica gli artisti: <br>
                                <span class="text-secondary">Separa i nomi usando "," (Es: example, example1, ...)</span>
                            </label>
                            <input type="text" name="artists" id="artists" class="form-control" value="{{ $comic->artists }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="writers" class="form-label">
                                Modifica gli scrittori: <br>
                                <span class="text-secondary">Separa i nomi usando ","  (Es: example, example1, ...)</span>
                            </label>
                            <input type="text" name="writers" id="writers" class="form-control" value="{{ $comic->writers }}" required>
                        </div>

                        <input type="submit" value="invia" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection