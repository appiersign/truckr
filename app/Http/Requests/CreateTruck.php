<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateTruck extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()['account_type'] === 'owner';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'license_plate' => 'required|min:5',
            'model'         => 'required|min:3',
            'make'          => 'required|min:3',
            'type'          => 'required|in:flatbed,reefer,stepdeck,van,container truck',
            'capacity'      => 'required'
        ];
    }
}
