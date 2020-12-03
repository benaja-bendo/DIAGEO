<?php

namespace Database\Factories;

use App\Models\Arrondissement;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArrondissementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Arrondissement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'numero'=>$this->faker->numberBetween(1,8),
            'nom_arrondissement'=>$this->faker->text(10),
            'ville_id'=>$this->faker->numberBetween(1,5),
        ];
    }
}
