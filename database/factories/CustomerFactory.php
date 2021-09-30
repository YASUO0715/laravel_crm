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

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $faker = \Faker\factory::create('ja_JP');
        return [
            'name' => $faker->name(),
            'email' => $this->faker->email(),
            'zipcode' => $this->faker->regexify('[1-9]{3}[0-9]{4}'),
            'address' => $faker->address(),
            'phone_number' => $this->faker->phoneNumber()
        ];
    }
}
