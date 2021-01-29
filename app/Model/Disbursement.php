<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Disbursement extends Model
{
    protected $table = "disbursement_tab";
    protected $fillable = ['customer_id', 'disbursement_amount', 'date_of_disbursement', 'installment_num', 'cheque_no', 'cheque_amount', 'cheque_date', 'neft_urt_no', 'neft_amount', 'neft_date'];
}
