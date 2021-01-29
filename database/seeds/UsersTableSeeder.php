<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// use Faker\Generator as Faker;

use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $telecallerRole = Role::where('name', 'telecaller')->first();
        $agentRole = Role::where('name', 'agent')->first();
        $backofficeagent = Role::where('name', 'back-office-agent')->first();


        $admin = User::create([
            'name'  => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make("password"),
            'phone' => "8790010929",
            'address' => "bangalore",
            'city' => "darsi",
            'state' => 'karanataka',
            'zipcode' => "523247"
        ]);
        $telecaller = User::create([
            'name'  => 'Telecaller',
            'email' => 'telecaller@telecaller.com',
            'password' => Hash::make("password"),
            'phone' => "9182387725",
            'address' => "bangalore",
            'city' => "darsi",
            'state' => 'karanataka',
            'zipcode' => "523247"
        ]);
        $agent = User::create([
            'name'  => 'Field Agent',
            'email' => 'agent@agent.com',
            'password' => Hash::make("password"),
            'phone' => "9032336978",
            'address' => "bangalore",
            'city' => "darsi",
            'state' => 'karanataka',
            'zipcode' => "523247"
        ]);
        $backOffice = User::create([
            'name'  => 'Back Office Agent',
            'email' => 'backoffice@agent.com',
            'password' => Hash::make("password"),
            'phone' => "9032336978",
            'address' => "bangalore",
            'city' => "darsi",
            'state' => 'karanataka',
            'zipcode' => "523247"
        ]);

        $admin->roles()->attach($adminRole);
        $telecaller->roles()->attach($telecallerRole);
        $agent->roles()->attach($agentRole);
        $backOffice->roles()->attach($backofficeagent);


    }
}
