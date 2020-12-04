<?php

namespace Database\Factories;

use App\Models\Point_vente;
use App\Models\Point_ventes;
use Illuminate\Database\Eloquent\Factories\Factory;

class Point_venteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Point_vente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->name,
            'telephone1' => $this->faker->phoneNumber,
            'telephone2' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'geolocalisation_id' => 1,
            'type_point_vente_id' => 1,
        ];
    }
}
