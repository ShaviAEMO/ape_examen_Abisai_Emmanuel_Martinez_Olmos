<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UserDomicilio;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserDomicilio>
 */
class UserDomicilioFactory extends Factory
{
    protected $model = UserDomicilio::class;

    public function definition()
    {
        return [
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'domicilio' => $this->faker->streetAddress,
            'numero_exterior' => $this->faker->buildingNumber,
            'colonia' => $this->faker->cityPrefix,
            'cp' => $this->faker->postcode,
            'ciudad' => $this->faker->city,
        ];
    }
}
