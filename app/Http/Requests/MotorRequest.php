<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Route;

class MotorRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (Route::is('motor.store')) {
            return [
                'kendaraan_id' => 'required',
                'mesin' => 'required',
                'tipe_suspensi' => 'required',
                'tipe_transmisi' => 'required',
                'jumlah' => 'required|numeric'
            ];
        }
        else{
            return [
                'mesin' => 'required',
                'tipe_suspensi' => 'required',
                'tipe_transmisi' => 'required',
                'jumlah' => 'required|numeric'
            ];
        }
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}
