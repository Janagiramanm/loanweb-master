<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
      //  $this->call(CustomerTableSeeder::class);
        $this->call(TypeOfAppointmentSeeder::class);
        $this->call(ApplicationStatusSeeder::class);
        $this->call(TimeSlotSeeder::class);
        $this->call(OccupationSeeder::class);
        $this->call(RequiredDocSeeder::class);
    }
}
