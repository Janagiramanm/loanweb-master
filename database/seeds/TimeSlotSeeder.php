<?php

use Illuminate\Database\Seeder;
use App\Model\Timeslot;

class TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Timeslot::truncate();

        Timeslot::create(['time_slot' => '06:00 AM']);
        Timeslot::create(['time_slot' => '06:30 AM']);
        Timeslot::create(['time_slot' => '07:00 AM']);
        Timeslot::create(['time_slot' => '07:30 AM']);
        Timeslot::create(['time_slot' => '08:00 AM']);
        Timeslot::create(['time_slot' => '08:30 AM']);
        Timeslot::create(['time_slot' => '09:00 AM']);
        Timeslot::create(['time_slot' => '10:00 Am']);
        Timeslot::create(['time_slot' => '10:30 AM']);
        Timeslot::create(['time_slot' => '11:00 AM']);
        Timeslot::create(['time_slot' => '12:00 PM']);
        Timeslot::create(['time_slot' => '01:00 PM']);
        Timeslot::create(['time_slot' => '01:30 PM']);
        Timeslot::create(['time_slot' => '02:00 PM']);
        Timeslot::create(['time_slot' => '02:30 PM']);
        Timeslot::create(['time_slot' => '03:00 PM']);
        Timeslot::create(['time_slot' => '03:30 PM']);
        Timeslot::create(['time_slot' => '04:00 PM']);
        Timeslot::create(['time_slot' => '04:30 PM']);
        Timeslot::create(['time_slot' => '05:00 PM']);
        Timeslot::create(['time_slot' => '05:30 PM']);
        Timeslot::create(['time_slot' => '06:00 PM']);

    }
}
