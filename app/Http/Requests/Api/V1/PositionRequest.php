<?php

namespace App\Http\Requests\Api\V1;

use Laravel\Lumen\Http\Request;

class PositionRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
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
            'rot' => 'numeric',
            'timestamp' => 'required|numeric',
        ];
    }

    public function getVesselId()
    {
        return $this->json('mmsi');
    }

    public function getStatus()
    {
        return $this->json('status');
    }

    public function getStationId()
    {
        return $this->json('stationId');
    }

    public function getSpeed()
    {
        return $this->json('speed');
    }

    public function getLongitude()
    {
        return $this->json('lon');
    }

    public function getLatitude()
    {
        return $this->json('lan');
    }

    public function getCourse()
    {
        return $this->json('course');
    }

    public function getHeading()
    {
        return $this->json('heading');
    }

    public function getRateOfTurn()
    {
        return $this->json('rot');
    }

    public function getTimestamp()
    {
        return $this->json('timestamp');
    }
}
