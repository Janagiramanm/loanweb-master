<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Bank;

class BankBranch extends Model
{
    //
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
