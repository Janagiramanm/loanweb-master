<?php

use Illuminate\Database\Seeder;
use App\Model\Occupation;

class OccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Occupation::truncate();

        Occupation::create([
            'occupation_name' => "SALARIED EMPLOYEED",
        ]);

        Occupation::create([
            'occupation_name' =>  "SELF EMPLOYEED",
        ]);

        Occupation::create([
            'occupation_name' =>  "SELF EMPLOYEED PROFESSIONAL",
        ]);

        Occupation::create([
            'occupation_name' =>  "NRI SALARIED EMPLOYEE",
        ]);

        Occupation::create([
            'occupation_name' =>  "NRI SELF EMPLOYEED",
        ]);
    }
}
