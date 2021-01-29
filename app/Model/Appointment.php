<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = "appointment";
    protected $fillable = [ 'agent_id', 'customer_id', 'appointment_date', 'timeslot_id', 'created_excutive', 'status', 'appointmenttype_id'];
}

