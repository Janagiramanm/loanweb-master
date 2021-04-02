<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\CibilSetting;
use App\Customer;

class Bank extends Model
{
    protected $table = "bank";
    protected $fillable = ['bank_name', 'bank_branch', 'rate_of_interest', 'bank_address', 'bank_logo'];

    public function cibilSettings()
    {
        return $this->hasMany(CibilSetting::class);
    }

    public function customer(){
        return $this->hasMany(Customer::class);
    }
    
}
