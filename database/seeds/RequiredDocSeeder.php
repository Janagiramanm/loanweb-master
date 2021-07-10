<?php

use Illuminate\Database\Seeder;
use App\Model\RequiredDoc;

use function Matrix\identity;

class RequiredDocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RequiredDoc::truncate();
        RequiredDoc::create([
            'doc_name'      => 'ID Proof',
            'type_of_doc'   => 'KYC',
            'occupation_id' => 1,
        ]);
        RequiredDoc::create([
            'doc_name'      => 'Present Address',
            'type_of_doc'   => 'KYC',
            'occupation_id' => 1,
        ]);
        RequiredDoc::create([
            'doc_name'      => 'Permanent Address',
            'type_of_doc'   => 'KYC',
            'occupation_id' => 1,
        ]);
        RequiredDoc::create([
            'doc_name'      => 'Photos',
            'type_of_doc'   => 'KYC',
            'occupation_id' => 1,
        ]);


        RequiredDoc::create([
            'doc_name'      => 'Payslips (last 3 months)',
            'type_of_doc'   => 'INCOME',
            'occupation_id' => 1,
        ]);

        RequiredDoc::create([
            'doc_name'      => 'Bank Statement (6months)',
            'type_of_doc'   => 'INCOME',
            'occupation_id' => 1,
        ]);

        RequiredDoc::create([
            'doc_name'      => 'Form-16 (2 years)',
            'type_of_doc'   => 'INCOME',
            'occupation_id' => 1,
        ]);

        RequiredDoc::create([
            'doc_name'      => 'Company ID Card',
            'type_of_doc'   => 'OTHER',
            'occupation_id' => 1,
        ]);

        RequiredDoc::create([
            'doc_name'      => 'Offer\Relieving Letter',
            'type_of_doc'   => 'OTHER',
            'occupation_id' => 1,
        ]);

        RequiredDoc::create([
            'doc_name'      => 'Processing fee Cheque',
            'type_of_doc'   => 'OTHER',
            'occupation_id' => 1,
        ]);


        RequiredDoc::create([
            'doc_name'      => 'ID Proof',
            'type_of_doc'   => 'KYC',
            'occupation_id' => 2,
        ]);
        RequiredDoc::create([
            'doc_name'      => 'Present Address',
            'type_of_doc'   => 'KYC',
            'occupation_id' => 2,
        ]);
        RequiredDoc::create([
            'doc_name'      => 'Permanent Address',
            'type_of_doc'   => 'KYC',
            'occupation_id' => 2,
        ]);
        RequiredDoc::create([
            'doc_name'      => 'Photos',
            'type_of_doc'   => 'KYC',
            'occupation_id' => 2,
        ]);


        RequiredDoc::create([
            'doc_name'      => 'Incorporation',
            'type_of_doc'   => 'INCOME',
            'occupation_id' => 2,
        ]);

        RequiredDoc::create([
            'doc_name'      => 'Partnership deed',
            'type_of_doc'   => 'INCOME',
            'occupation_id' => 2,
        ]);

        RequiredDoc::create([
            'doc_name'      => 'MOA, AOA',
            'type_of_doc'   => 'INCOME',
            'occupation_id' => 2,
        ]);

        RequiredDoc::create([
            'doc_name'      => 'Business Profile',
            'type_of_doc'   => 'INCOME',
            'occupation_id' => 2,
        ]);
        RequiredDoc::create([
            'doc_name'      => 'Office address proof',
            'type_of_doc'   => 'INCOME',
            'occupation_id' => 2,
        ]);
        RequiredDoc::create([
            'doc_name'      => 'IT Returns (3 years)',
            'type_of_doc'   => 'INCOME',
            'occupation_id' => 2,
        ]);
        RequiredDoc::create([
            'doc_name'      => 'P&L, Balance Sheet (3 years)',
            'type_of_doc'   => 'INCOME',
            'occupation_id' => 2,
        ]);
        RequiredDoc::create([
            'doc_name'      => 'Bank Statement (1 year)',
            'type_of_doc'   => 'INCOME',
            'occupation_id' => 2,
        ]);


        RequiredDoc::create([
            'doc_name'      => 'ID Proof',
            'type_of_doc'   => 'KYC',
            'occupation_id' => 3,
        ]);
        RequiredDoc::create([
            'doc_name'      => 'Present Address',
            'type_of_doc'   => 'KYC',
            'occupation_id' => 3,
        ]);
        RequiredDoc::create([
            'doc_name'      => 'Permanent Address',
            'type_of_doc'   => 'KYC',
            'occupation_id' => 3,
        ]);
        RequiredDoc::create([
            'doc_name'      => 'Photos',
            'type_of_doc'   => 'KYC',
            'occupation_id' => 3,
        ]);

        RequiredDoc::create([
            'doc_name'      => 'Payslips (3 months)',
            'type_of_doc'   => 'INCOME',
            'occupation_id' => 3,
        ]);
        RequiredDoc::create([
            'doc_name'      => 'Bank Statement (6months)',
            'type_of_doc'   => 'INCOME',
            'occupation_id' => 3,
        ]);
        RequiredDoc::create([
            'doc_name'      => 'Form-16 (2years)',
            'type_of_doc'   => 'INCOME',
            'occupation_id' => 3,
        ]);
        RequiredDoc::create([
            'doc_name'      => 'IT Returns (3 years)',
            'type_of_doc'   => 'INCOME',
            'occupation_id' => 3,
        ]);
        RequiredDoc::create([
            'doc_name'      => 'P&L, Balance Sheet (3 years)',
            'type_of_doc'   => 'INCOME',
            'occupation_id' => 3,
        ]);


        RequiredDoc::create([
            'doc_name'      => 'AOS',
            'type_of_doc'   => 'Disbursement',
            'from_whom'     => 'Builder'
        ]);
        RequiredDoc::create([
            'doc_name'      => 'TPT/LOU',
            'type_of_doc'   => 'Disbursement',
            'from_whom'     => 'Builder'
        ]);
        RequiredDoc::create([
            'doc_name'      => 'CFNOC',
            'type_of_doc'   => 'Disbursement',
            'from_whom'     => 'Builder'
        ]);
        RequiredDoc::create([
            'doc_name'      => 'Demand Letter',
            'type_of_doc'   => 'Disbursement',
            'from_whom'     => 'Builder'
        ]);
        RequiredDoc::create([
            'doc_name'      => 'Builder NOC',
            'type_of_doc'   => 'Disbursement',
            'from_whom'     => 'Builder'
        ]);
        RequiredDoc::create([
            'doc_name'      => 'OCR Receipt',
            'type_of_doc'   => 'Disbursement',
            'from_whom'     => 'Builder'
        ]);
        RequiredDoc::create([
            'doc_name'      => 'Cost sheet',
            'type_of_doc'   => 'Disbursement',
            'from_whom'     => 'Builder'
        ]);


        RequiredDoc::create([
            'doc_name'      => 'Sanction letter',
            'type_of_doc'   => 'Disbursement',
            'from_whom'     => 'Customer'
        ]);
        RequiredDoc::create([
            'doc_name'      => 'Facility agreement',
            'type_of_doc'   => 'Disbursement',
            'from_whom'     => 'Customer'
        ]);
        RequiredDoc::create([
            'doc_name'      => 'Cheques',
            'type_of_doc'   => 'Disbursement',
            'from_whom'     => 'Customer'
        ]);
        RequiredDoc::create([
            'doc_name'      => 'Submitted Document',
            'type_of_doc'   => 'Bank Visit',
            
        ]);







    }
}



