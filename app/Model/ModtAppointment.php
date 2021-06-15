<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Customer;
use App\User;
use App\Model\Timeslot;

class ModtAppointment extends Model
{
    //
    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function user(){
        return $this->hasOne(User::class,'id','agent_id');
    }

    public function timeslot(){
        return $this->hasOne(Timeslot::class,'id','timeslot_id');
    }
}
