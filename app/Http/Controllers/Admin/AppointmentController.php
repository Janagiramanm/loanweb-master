<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mapper;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $appointments = DB::table('appointment')
                        ->join('customers', 'customers.id', '=', 'appointment.customer_id')
                        ->join('type_of_appointment', 'type_of_appointment.id', '=', 'appointment.appointmenttype_id')
                        ->join('time_slots', 'time_slots.id', '=', 'appointment.timeslot_id')
                        ->join('users', 'users.id', '=', 'appointment.agent_id')
                        ->join('application_status', 'customers.application_status', '=', 'application_status.id')
                        ->select('users.name as agent_name', 'customers.cust_name as customer_name', 'customers.telecallername', 'type_of_appointment.appointment_name', 'appointment.appointment_date', 'time_slots.time_slot', 'appointment.status', 'appointment.id','application_status.status', 'appointment.latitude','appointment.longitude')
                        ->where('appointment.status' , '=', 1)
                        ->get();
        if($appointments){

            Mapper::map(12.9251281, 77.6157007, ['zoom' => 8, 'fullscreenControl' => false, 'center' => true, 'marker' => false, 'cluster' => true, 'clusters' => ['center' => false, 'zoom' => 15, 'size'=> 4], 'language' => 'en']);

            $lat = 12.9251281;
            $lng = 77.6157007;
    
            $icons = [
                'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
                'http://maps.google.com/mapfiles/ms/icons/pink-dot.png',
                'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png',
                'http://maps.google.com/mapfiles/ms/icons/purple-dot.png',
               
            ];

            $i=0;
            foreach($appointments as $appointment){
               
                $title = nl2br("Name - ".$appointment->customer_name);
                Mapper::marker($appointment->latitude, $appointment->longitude, ['title' => $title, 'animation' => 'DROP', 'icon' => 'http://maps.google.com/mapfiles/ms/icons/purple-dot.png']);
            } 
        }

        return view('back-office.Appointments.index',  compact('appointments'));
    }

}
