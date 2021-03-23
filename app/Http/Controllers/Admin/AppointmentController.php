<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                        ->select('users.name as agent_name', 'customers.cust_name as customer_name', 'customers.telecallername', 'type_of_appointment.appointment_name', 'appointment.appointment_date', 'time_slots.time_slot', 'appointment.status', 'appointment.id','application_status.status')
                        ->where('appointment.status' , '=', 1)
                        ->get();

        return view('back-office.Appointments.index',  compact('appointments'));
    }

}
