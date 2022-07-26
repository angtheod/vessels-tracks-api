<?php

namespace Database\Factories\Api\V1;

use App\Models\Api\V1\Vessel;
use Illuminate\Database\Eloquent\Factories\Factory;

class VesselFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vessel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [];
    }
}
