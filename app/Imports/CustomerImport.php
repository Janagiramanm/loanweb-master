<?php

namespace App\Imports;

use App\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomerImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([
            'cust_name' => $row[1],
            'cust_phone' => $row[2],
            'cust_email' => $row[3],
            'project_name' => $row[4],
            'buying_door_no' => $row[5],
            'property_cost' => $row[6]
        ]);
    }
}
