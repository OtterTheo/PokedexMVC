<?php

namespace App\Http\Request;

class PokedexRequest extends Request
{
    public function __construct()
    {

    }

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
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'string|required',
            'type_id' => 'required',
        ];

        return $rules;
    }
}
