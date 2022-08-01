<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class TrackRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'mmsi' => 'required|numeric',
            'status' => 'required|numeric',
            'stationId' => 'required|numeric',
            'speed' => 'required|numeric',
            'lon' => 'required|numeric|between:-180,180',
            'lat' => 'required|numeric|between:-90,90',
            'course' => 'required|numeric',
            'heading' => 'required|numeric',
            'timestamp' => 'required|numeric',
        ];
    }
}