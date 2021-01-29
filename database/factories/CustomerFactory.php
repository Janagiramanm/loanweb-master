<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'cust_name' => $faker->name,
        'cust_email' => $faker->safeEmail,
        'cust_phone' => $faker->phoneNumber,
        //'cust_type' => $faker->randomElement(['salaried', 'self_emp_pro', 'self_emp_non_pro', 'nri_sal', 'nri_self_emp']),
        'type_of_loan' => $faker->randomElement(['home_loan', 'plot_loan', 'mortgage_loan', 'commercial_loan', 'balance_transfer']),
        'loan_amount' => $faker->randomNumber(5),
        'cust_dob' => $faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
        'cust_address' => $faker->address,
        'cust_city' => $faker->city,
        'cust_state' => $faker->state,
        'application_status' => 1,
    ];
});
