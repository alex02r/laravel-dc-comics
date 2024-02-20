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

        if (isNull($dati['img'])) {
            $new_comic->thumb = "https://kare.ee/images/no-image.jpg";
        }else{
            $new_comic->thumb = $dati['img'];
        }
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

        if (isNull($dati['img'])) {
            $comic->thumb = "https://www.google.com/imgres?imgurl=https%3A%2F%2Fwww.mylittleadventure.com%2Fimages%2Fdefault%2Fdefault-img.png&tbnid=asfSaCEGE8KLaM&vet=12ahUKEwjq4oXa5reEAxVp7rsIHdVtDz8QMygSegQIARB3..i&imgrefurl=https%3A%2F%2Famp.mylittleadventure.it%2Fbest-things%2Fistanbul%2Ftours%2Fil-meglio-di-istanbul-salta-la-fila-di-santa-sofia-la-basilica-cisterna-e-la-moschea-blu-aufvNSCi&docid=IiEKmk-yr0TJTM&w=400&h=250&q=img%20default&ved=2ahUKEwjq4oXa5reEAxVp7rsIHdVtDz8QMygSegQIARB3";
        }else{
            $comic->thumb = $dati['img'];
        }
        
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
