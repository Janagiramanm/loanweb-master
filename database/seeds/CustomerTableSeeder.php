<?php

use App\Customer;
use App\LoanApplication;
use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        Customer::truncate();

        for($i = 0; $i < 15; $i++) {
            $customer = Customer::create([
                'applicationno' => uniqid(),
                'cust_name' => $faker->name,
                'cust_email' => $faker->safeEmail,
                'cust_phone' => $faker->phoneNumber,
                'cust_dob' => $faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
                'cust_address' => $faker->address,
                'cust_city' => $faker->city,
                'cust_pincode' => $faker->numberBetween(100001, 860000),
                'application_deleted' => false,
                'application_status' => 1,
            ]);

        }
    }
}
