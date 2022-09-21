<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class resultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();;
        for ($i = 0; $i < 100; $i++) {
            DB::table('results')->insert([
                'reg_number' => rand(1000,2000),
                'roll_no' => rand(100,200),
                's_name' => $faker->text(30),
                'f_name' => $faker->text(30),
                'm_name' => $faker->text(30),
                'cgpa' => rand(1,4),
                'institute' => $faker->text(30),
                'institute_code' => 50679,
                'course_name' => $faker->text(30),
                'course_duration' => '10 month',
                'passing_year' => rand(2010,2020),
                'date_of_birth' => $faker->date,
                'created_at' => Carbon::now(),
                ]);
        }
    }
}
