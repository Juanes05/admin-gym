<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;


    protected $fillable =[

        'name','lastname','document','state'
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstNameMale,
            'lastname' => $this->faker->lastName,
            'document' => $this->faker->unique()->numberBetween('10000,99999'),
            'state' =>rand(0,1),
        ];
    }
}
