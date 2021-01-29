<?php

namespace App\Imports;

use App\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DisbursementImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([
            'file_no'           => $row[1],
            'project_name'      => $row[2],
            'flat_no'           => $row[3],
            'customer_name'     => $row[4],
            'phone_no'          => $row[5],
            'email_id'          => $row[6],
            'finance_mode'      => $row[7],
            'installment_no'    => $row[8],
            'loan_amount'       => $row[9]
        ]);
    }
}
