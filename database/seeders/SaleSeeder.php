<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        \App\Models\Sale::factory()->count(10)->create([
            'total' => $faker->randomFloat(2, 0, 1000),
            'store_id' => \App\Models\Store::factory()->create([
                'name' => $faker->company,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'user_id' => \App\Models\User::factory()->create()->id,
            ])->id,
            'employee_id' => \App\Models\Employee::factory()->create([
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
            ])->id,
            'customer_id' => $faker->safeEmail(),
            'date' => $faker->date,
        ]);
    }
}
