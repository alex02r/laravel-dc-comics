<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use Illuminate\Support\Facades\Validator as FacadesValidator;

use function PHPUnit\Framework\isNull;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-comic');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dati = $this->validation($request->all());
        
        $new_comic = new Comic;
        $new_comic->fill($dati);
        $new_comic->save();

        return redirect()->route('comics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::find($id);
        return view('comic', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Comic $comic)
    {
        return view('edit-comic', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dati = $this->validation($request->all());
        
        
        $comic = Comic::find($id);
        
        $comic->fill($dati);
        $comic->save();

        return redirect()->route('comics.show', ['comic'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::find($id);
        $comic->delete();
        return redirect()->route('comics.index');
    }
    private function validation($data){
        $validator = FacadesValidator::make(
            $data, 
            [
                'title'=>'required|max:100',
                'description'=>'required',
                'thumb'=>'required',
                'price'=>'required|max:20',
                'sale_date'=>'required',
                'series'=>'required|max:100',
                'type'=>'required|max:100',
                'artists'=>'required',
                'writers'=>'required'
            ],
            [
                'title.required'=>'Il titolo deve essere obbligatorio',
                'title.max'=>'Lunghezza massima del titolo: 100 caratteri',
                'description'=>'La descrizione deve essere obbligatoria',
                'thumb'=>'L\'immagine deve essere obbligatoria',
                'price.required'=>'Il prezzo deve essere obbligatorio',
                'price.max'=>'Lunghezza massima del perzzo: 20 caratteri',
                'sale_date'=>'La data deve essere obbligatoria',
                'series.required'=>'La Serie deve essere obbligatoria',
                'series.max'=>'Lunghezza massima della serie: 100 caratteri',
                'type.required'=>'Il tipo deve essere obbligatorio',
                'type.max'=>'Lunghezza massima del tipo: 100 caratteri',
                'artists'=>'Gli artisti sono obbligatori',
                'writers'=>'Gli scrittori sono obbligatori'
            ])->validate();

        return $validator;
    }
}
