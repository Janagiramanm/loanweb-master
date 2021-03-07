<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Builder;

class BuilderDetail extends Model
{
    //
    public function builders()
    {
        return $this->belongsTo(Builder::class);
    }
}
