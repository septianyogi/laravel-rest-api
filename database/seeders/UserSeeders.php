<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i<= 10; $i++){
            DB::table('users')->insert([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'gender' => $faker->randomElement(['male', 'female']),
                'dob' => $faker->date('Y-m-d', '2005-01-01'),
                'phone' => $faker->phoneNumber(),
                'age' => $faker->numberBetween(18, 60),
            ]);
        }
    }
}
