<?php

namespace App\Exports;

use App\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class CustomerLoginProcessExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'A. No',
            'Submission Date',
            'Flat No.',
            'Project',
            'Name of the customer',
            'Telecaller',
            'Excutive Name',
            'Bank Name',
            'Bank Branch',
            'File No',
            'Customer Contact No',
            'Email Address',
            'Total Property Cost',
            'Loan Amount',
            'MMR Payable',
            'MMR Paid',
            'Type of Funding',
            'Insurance Amount',
            'Sanctioned Date',
            'Status',
            'Date of Disbursement',
            'Amount Disbursed'
        ];
    }
    public function collection()
    {
        $exceldata = DB::table('customers')
                        ->leftjoin('bank', 'customers.bank_id', '=', 'bank.id')
                        ->leftjoin('application_status', 'customers.application_status', '=', 'application_status.id')
                        ->leftjoin('disbursement_tab', 'customers.id', '=', 'disbursement_tab.customer_id')
                        ->leftjoin('users', 'customers.emp_id', '=', 'users.id')
                        ->where([['customers.application_status', '=', 3], ['customers.application_deleted', '=', 0] ])
                        ->select('customers.id as a_no',
                                 'customers.created_at as sub_date',
                                 'customers.buying_door_no',
                                 'customers.project_name',
                                 'customers.cust_name',
                                 'customers.telecallername',
                                 'users.name',
                                 'bank.bank_name',
                                 'bank.bank_branch',
                                 'customers.file_no',
                                 'customers.cust_phone',
                                 'customers.cust_email',
                                 'customers.property_cost',
                                 'customers.loan_amount',
                                 'customers.mmr_payable',
                                 'customers.mmr_paid',
                                 'customers.type_of_funding',
                                 'customers.insurance_amt',
                                 'customers.sanctioned_date',
                                 'application_status.status',
                                 'disbursement_tab.date_of_disbursement',
                                 'disbursement_tab.disbursement_amount')
                        ->get();

        return $exceldata;
    }

}
