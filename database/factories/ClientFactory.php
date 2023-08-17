<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cpf'       =>  rand(11111111111,99999999999),
            'name'      =>  fake()->name("male"),
            'address'   =>  fake()->streetAddress(),
            'birthdate' =>  fake()->date(),
            'state'     =>  fake()->address(),
            'gender'    =>  'M',
            'city'      =>  fake()->city(),
        ];
    }
}
