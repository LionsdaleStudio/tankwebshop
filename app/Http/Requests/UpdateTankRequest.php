<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTankRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'crewnumber' => 'required|integer|min:1',
            'country' => 'required|string|max:255',
            'wars' => 'required|string|max:30',
            'releaseyear' => 'required|integer|digits:4|min:1900|max:' . now()->year,
            'cost' => 'required|numeric|min:0',
            'description' => 'required|string|max:1000',
            'active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'A név mező kitöltése kötelező.',
            'name.max' => 'A név legfeljebb 255 karakter hosszú lehet.',
            'crewnumber.required' => 'A személyzet számának megadása kötelező.',
            'crewnumber.integer' => 'A személyzet száma csak egész szám lehet.',
            'crewnumber.min' => 'A személyzet száma legalább 1 kell, hogy legyen.',
            'country.required' => 'Az ország mező kitöltése kötelező.',
            'country.max' => 'Az ország neve legfeljebb 255 karakter lehet.',
            'wars.max' => 'A háborúk mező legfeljebb 500 karakter hosszú lehet.',
            'releaseyear.required' => 'A kiadási év megadása kötelező.',
            'releaseyear.integer' => 'A kiadási év csak egész szám lehet.',
            'releaseyear.min' => 'A kiadási év nem lehet korábbi, mint 1900.',
            'releaseyear.max' => 'A kiadási év nem lehet jövőbeni év.',
            'cost.required' => 'Az ár megadása kötelező.',
            'cost.numeric' => 'Az árnak számnak kell lennie.',
            'cost.min' => 'Az ár nem lehet negatív.',
            'description.max' => 'A leírás legfeljebb 1000 karakter hosszú lehet.',
            'active.boolean' => 'A szolgálatban mező értéke csak igaz vagy hamis lehet.',
        ];
    }
}
