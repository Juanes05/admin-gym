<?php

namespace Database\Factories;

use App\Models\Pay;
use Illuminate\Database\Eloquent\Factories\Factory;

class PayFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pay::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pay' => 60000,
            'pay_reference' => $this->faker->numberBetween(500,1000),
            'user_id' => rand(1,5),
        ];
    }
}
