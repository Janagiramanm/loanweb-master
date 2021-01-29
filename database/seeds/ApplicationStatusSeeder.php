<?php

use Illuminate\Database\Seeder;
use App\Model\ApplicationStatus;

class ApplicationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ApplicationStatus::truncate();

        ApplicationStatus::create([
            "status" => "New",
            "comment" => "this is fresh leads from all the sources"
        ]);

        ApplicationStatus::create([
            "status" => "Pipeline",
            "comment" => "In this section all the intrested customers will come here"
        ]);

        ApplicationStatus::create([
            "status" => "SendtoBank",
            "comment" => "In this Application is proceeded to bank"
        ]);

        ApplicationStatus::create([
            "status" => "Login",
            "comment" => "In this section all the processed application should be shown"
        ]);

        ApplicationStatus::create([
            "status" => "Sanctioned",
            "comment" => "In this section all the Loan sanction application should be shown"
        ]);

        ApplicationStatus::create([
            "status" => "ReadyToDisburse",
            "comment" => "In this section all the Loan sanction application should be shown"
        ]);

        ApplicationStatus::create([
            "status" => "BankProcess",
            "comment" => "In this section all the Loan sanction application should be shown"
        ]);

        ApplicationStatus::create([
            "status" => "ChequeFixing",
            "comment" => "In this section all the Loan sanction application should be shown"
        ]);

        ApplicationStatus::create([
            "status" => "Disbursement",
            "comment" => "In this section all the disbursed data will be shown"
        ]);

        ApplicationStatus::create([
            "status" => "PartDisbursement",
            "comment" => "In this section all the disbursed data will be shown"
        ]);
        ApplicationStatus::create([
            "status" => "PartChequeFixing",
            "comment" => "In this section all the disbursed data will be shown"
        ]);

        ApplicationStatus::create([
            "status" => "miscellaneous",
            "comment" => "In this section all the disbursed data will be shown from the builder data"
        ]);

    }
}
