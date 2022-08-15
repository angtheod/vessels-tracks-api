<?php

namespace App\Http\Requests\Api\V1;

use Laravel\Lumen\Http\Request;

class VesselRequest extends Request
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
            'mmsi' => ['required'],
        ];
    }
}
