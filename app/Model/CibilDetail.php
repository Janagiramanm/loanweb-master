<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\CibilSetting;

class CibilDetail extends Model
{
    //
    public function cibilSettings()
    {
        return $this->belongsTo(CibilSetting::class);
    }
}
