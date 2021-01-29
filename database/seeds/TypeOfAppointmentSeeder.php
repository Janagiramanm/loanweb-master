<?php

use Illuminate\Database\Seeder;
use App\Model\TypeOfAppointment;

class TypeOfAppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeOfAppointment::truncate();

        TypeOfAppointment::create([
            'appointment_name' =>  "First Visit(New)"
        ]);

        TypeOfAppointment::create([
            'appointment_name' =>  "Pending Doc collection for backoffice"
        ]);

        TypeOfAppointment::create([
            'appointment_name' =>  "Bank visit to drop Application"
        ]);

        TypeOfAppointment::create([
            'appointment_name' =>  "Pending Doc collection for Bank"
        ]);

        TypeOfAppointment::create([
            'appointment_name' =>  "Disbursement Doc Collection"
        ]);

        TypeOfAppointment::create([
            'appointment_name' =>  "Pending Disbursement Doc Collection"
        ]);

        TypeOfAppointment::create([
            'appointment_name' =>  "Submitting Demand letter to bank"
        ]);
    }
}
