<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Bank;
use App\Model\Occupation;
use App\Customer;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function emicalculator()
    {
        return view('emicalculator');
    }

    public function faq()
    {
        return view('faq');
    }

    public function blog()
    {
        return view('blog');
    }

    public function contact()
    {
        return view('contact');
    }

    public function interestRate()
    {
        return view('interestRate');
    }

    public function statuscheck()
    {
        return view('statuscheck');
    }

    public function eligibility()
    {
        $occupations = Occupation::all()->take(3);
        return view('eligibility', compact('occupations'));
    }

    public function eligibility_two()
    {
        return view('eligibility2');
    }

    public function transfer()
    {
        return view('transfer');
    }

    public function banklisteligibility(Request $request)
    {
        $input = $request->all();
        // dd($input);
        $loan_amount = $input['loan_amount'];
        if(isset($input['net_income'])){
            $net_income = $input['net_income'];
        }elseif(isset($input['annual_profit'])){
            $net_income = $input['annual_profit'];
        }elseif(isset($input['gross_income'])){
            $net_income = $input['gross_income'];
        }

        $tenure = 20;
        $foir = 0.6;
        $banks = Bank::all();
        $eligibilities = array();
        foreach ($banks as $bank) {
            $top = ($net_income*$foir);
            $bottom = 100000 * (($bank->rate_of_interest * 0.01) / 12);
            $eligibility = 100000 *  ($top / $bottom);
            array_push($eligibilities, array('bank_logo' => $bank->bank_logo, 'bank_name' => $bank->bank_name, 'roi' => $bank->rate_of_interest, 'eligibility' => $eligibility));
        }
        Customer::create([
            'cust_name'             => $input['cust_name'],
            'cust_email'            => $input['cust_email'],
            'cust_phone'            => $input['cust_phone'],
            'applied_loan_amount'   => $input['loan_amount'],
            'cust_address'          => $input['cust_address'],
            'occupation_id'         => $input['occupation_id'],
            'applicationno'         => uniqid(),
            'application_status'    => 1,
            'application_deleted'   => false
        ]);
        return view('banklist', compact('eligibilities'));
    }
}
