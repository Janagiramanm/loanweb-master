<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ApplicationStatus extends Model
{
    protected $table = "application_status";
    protected $fillable = ['status'];
}
