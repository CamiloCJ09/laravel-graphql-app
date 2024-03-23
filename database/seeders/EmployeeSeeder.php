<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

      $faker = \Faker\Factory::create();

      Employee::factory()->count(10)->create([
          'first_name' => $faker->firstName,
          'last_name' => $faker->lastName,
          'email' => $faker->unique()->safeEmail,
          'phone' => $faker->phoneNumber,
          'store_id' => \App\Models\Store::factory()->create([
            'name' => $faker->company,
            'address' => $faker->address,
            'phone' => $faker->phoneNumber,
            'email' => $faker->unique()->safeEmail,
            'user_id' => \App\Models\User::factory()->create()->id,
          ])->id,
      ]);
        //
    }
}
