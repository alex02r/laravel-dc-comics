<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;

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
        $dati = $request->all();
        
        $new_comic = new Comic;
        $new_comic->title = $dati['titolo'];
        $new_comic->description = $dati['description'];
        $new_comic->thumb = $dati['img'];
        $new_comic->price = $dati['price'];
        $new_comic->series = $dati['series'];
        $new_comic->sale_date = $dati['date'];
        $new_comic->type = $dati['type'];
        $new_comic->artists = $dati['artists'];
        $new_comic->writers = $dati['writers'];
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
        $dati = $request->all();

        $comic = Comic::find($id);

        $comic->title = $dati['titolo'];
        $comic->description = $dati['description'];
        $comic->thumb = $dati['img'];
        $comic->price = $dati['price'];
        $comic->series = $dati['series'];
        $comic->sale_date = $dati['date'];
        $comic->type = $dati['type'];
        $comic->artists = $dati['artists'];
        $comic->writers = $dati['writers'];
        $comic->update();

        return redirect()->route('comics.show', compact('id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
