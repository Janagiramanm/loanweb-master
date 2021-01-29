<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ExtaDocs extends Model
{
    protected $table = "extra_doc";
    protected $fillable = ['customer_id', 'doc_name'];
}
