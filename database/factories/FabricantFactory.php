<?php

namespace Database\Factories;

use App\Models\Fabricant;
use Illuminate\Database\Eloquent\Factories\Factory;

class FabricantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fabricant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom'=>$this->faker->name,
            'logo'=>$this->faker->imageUrl(200,200,'animals'),
        ];
    }
}
