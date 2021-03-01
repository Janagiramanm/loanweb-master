<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\CibilDetail;

class CibilSetting extends Model
{
    //
    public function cibilDetails()
    {
        return $this->hasMany(CibilDetail::class);
    }
}
