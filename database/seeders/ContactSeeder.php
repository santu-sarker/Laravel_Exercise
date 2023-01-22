<?php

namespace Database\Seeders;

use DB;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table('contacts')->insert([

                'name' => $faker->name(),
                'email' => $faker->email(),
                'phone' => $faker->phoneNumber(),
                'company' => $faker->randomElement(["Enter Tech", "Tiger IT", "Brain Station", "Apple", "Google", "Facebook"]),
                'address' => $faker->address(),
                'gender' => $faker->randomElement(['Male', "Female"]),
                'user_id' => $faker->randomElement([1, 2]),
            ]);

        }
    }
}
