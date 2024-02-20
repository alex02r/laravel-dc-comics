<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateComicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=>'required|max:100',
            'description'=>'required',
            'thumb'=>'required',
            'price'=>'required|max:20',
            'sale_date'=>'required',
            'series'=>'required|max:100',
            'type'=>'required|max:100',
            'artists'=>'required',
            'writers'=>'required'
        ];
    }
    public function messages(){
        return[
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
        ];
    }
}
