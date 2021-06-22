<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Pay;
use Carbon\Carbon;
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
            'customer_id' => Customer::factory(),
            'end_date' => Carbon::now()->addDays(30)->toDateString()
        ];
    }
}
