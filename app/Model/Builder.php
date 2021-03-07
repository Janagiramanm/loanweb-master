<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\BuilderDetail;

class Builder extends Model
{
    //

    public function builderDetails()
    {
        return $this->hasMany(BuilderDetail::class);
    }
}
