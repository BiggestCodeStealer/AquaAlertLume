<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recordatorio;
use Faker\Factory as Faker;

class RecordatoriosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 0; $i < 20; $i++){
            Recordatorio::create([
                'name' => $faker->unique()->name(),
                'desc' => $faker->randomElement(['Led','Motor','Rele']),
                'dose' => rand(0, 100),
                'hour' => $faker->time(),
                'date' => $faker->dateTimeThisYear(),
                'user_id' => rand(1, 11)
            ]);
        }
    }
}