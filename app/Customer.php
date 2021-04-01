<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    protected $fillable = [
        'applicationno', 'cust_name', 'cust_email', 'cust_phone', 'cust_dob', 'cust_address', 'cust_city', 'cust_pincode', 'cust_profile', 'cust_name_two', 'cust_email_two', 'cust_phone_two', 'buying_door_no', 'project_name', 'builder_name', 'project_company_name', 'bank_id', 'bank_branch', 'file_no', 'property_cost', 'loan_amount', 'mmr_payable', 'mmr_paid', 'type_of_funding', 'application_status', 'application_deleted', 'deleted_at', 'occupation_id'
    ];

    public function loanApplications() {
        return $this->hasMany(LoanApplication::class);
    }
}
