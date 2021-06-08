<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Facades\DB;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = array();
        $data['newleads']   = Customer::where('application_status', '=', 1)->where('application_deleted', '=', 0)->count();
        $data['pipeline']   = Customer::where('application_status', '=', 2)->where('application_deleted', '=', 0)->count();
        $data['login']      = Customer::where('application_status', '=', 4)->where('application_deleted', '=', 0)->count();
        $data['sanction']   = Customer::where('application_status', '=', 5)->where('application_deleted', '=', 0)->count();
        $data['disbursed']  = Customer::where('application_status', '=', 9)->where('application_deleted', '=', 0)->count();
        $data['all']        = Customer::count();
        $data['trash']      = Customer::where('application_deleted', '=', 1)->count();

        $appointments = DB::table('appointment')
                        ->join('customers', 'customers.id', '=', 'appointment.customer_id')
                        ->join('type_of_appointment', 'type_of_appointment.id', '=', 'appointment.appointmenttype_id')
                        ->join('time_slots', 'time_slots.id', '=', 'appointment.timeslot_id')
                        ->join('users', 'users.id', '=', 'appointment.agent_id')
                        ->select('users.name as agent_name', 'customers.cust_name as customer_name','customers.cust_address as cust_address', 'customers.telecallername', 'type_of_appointment.appointment_name', 'appointment.appointment_date', 'time_slots.time_slot', 'appointment.status')
                        ->where('appointment.status' , '=', 1)
                        ->get();

        return view('back-office.index', compact('data', 'appointments'));
    }



    public function eligibility()
    {
        return view('back-office.eligibility');
    }

    public function eligibilityCalc(Request $request)
    {
        $input = $request->all();
        // dd($input);
        $grossIncome = $input['grossIncome'];
        $rentalItr = $input['rentalItr'] / 12;
        $rentalNonItr = ($input['rentalNonItr'] * 0.75)/12;
        $variableOT = ($input['variableOT']*0.5)/3;
        $fixedIncentivesQuat = $input['fixedIncentivesQuat']/3;
        $variableIncentivesQuat = ($input['variableIncentivesQuat']*0.5)/3;
        $variableIncentivesHalf = ($input['variableIncentivesHalf']*0.5)/6;
        $variableIncentivesYear = ($input['variableIncentivesYear']*0.5)/12;
        $interestDividend = ($input['interestDividend']*0.5)/12;
        $agriculturalIncome = $input['agriculturalIncome']/12;
        $lic50New = ($input['lic50New']*0.5)/12;
        $lic100Renew = $input['lic100Renew']/12;
        $otherSources = ($input['otherSources']*0.5)/12;

        $totalIncomePerMonth =  (int)($grossIncome + $rentalItr + $rentalNonItr +  $variableOT  + $fixedIncentivesQuat +  $variableIncentivesQuat + $variableIncentivesHalf + $variableIncentivesYear +  $interestDividend + $agriculturalIncome  +  $lic50New + $lic100Renew  + $otherSources);

        $allLoans = $input['allLoans'];
        $crediBills = $input['creditCardBills'];
        $totalLiabilityes = number_format($allLoans +( ($crediBills  -  $grossIncome) * 0.05));

        $foir = (float)(0.6);

        // dd($foir);

        $rateOfIntrest = $input['rateOfIntrest']/100;
        $loanTenure = $input['loanTenure'];
        $costOfProperty = $input['costOfProperty'];
        $loanRequested = $input['loanRequested'];
        // dd($rateOfIntrest);


        $emi = (int)(100000*($rateOfIntrest/12))*((1+($rateOfIntrest/12))^($loanTenure * 12)) / ((1+($rateOfIntrest/12))^($loanTenure * 12)-1);

        // dd($emi);

        if($costOfProperty <= 3000000){
            $ltv = 0.9;
        }else if($costOfProperty > 3000000 || $costOfProperty <= 7500000){
            $ltv = 0.8;
        }else {
            $ltv = 0.75;
        }

        $marginPaid = 1 - $ltv;
        $marginPaidInAmount =  $costOfProperty * $marginPaid ;
        $eligibleLoanAsPerProperty =  $costOfProperty * $ltv;

        $eligibilityAsPerIncome = ((($totalIncomePerMonth * $foir)-($allLoans+(($crediBills - ($grossIncome * 0.25)))*0.05)) / $emi)*100000;

        // dd($eligibilityAsPerIncome);

        if($eligibleLoanAsPerProperty < $eligibilityAsPerIncome ){
            $finalEligibility = $eligibleLoanAsPerProperty;
        }else {
            $finalEligibility = $eligibilityAsPerIncome;
        }

        $params = array('totalIncomePerMonth' => $totalIncomePerMonth, 'totalLiabilityes' => $totalLiabilityes, 'foir' => $foir, 'emi' => $emi, 'ltv' => $ltv, 'marginPaid' => $marginPaid, 'marginPaidInAmount' => $marginPaidInAmount, 'eligibleLoanAsPerProperty' => $eligibleLoanAsPerProperty,  'eligibilityAsPerIncome' => $eligibilityAsPerIncome, 'finalEligibility' => $finalEligibility);

        // dd($params);
        return view('back-office.finalAmount', compact('params'));

    }

    public function finalAmount()
    {
        return view('back-office.finalAmount');
    }

}

