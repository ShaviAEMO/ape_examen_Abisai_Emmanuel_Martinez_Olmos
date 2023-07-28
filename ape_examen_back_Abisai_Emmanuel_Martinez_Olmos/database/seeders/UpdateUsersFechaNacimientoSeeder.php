<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;



class UpdateUsersFechaNacimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
        {
            $faker = Faker::create();

            User::whereNull('fecha_nacimiento')->get()->each(function ($user) use ($faker) {
                $user->update([
                    'fecha_nacimiento' => $faker->date(),
                ]);
            });
        }
}
