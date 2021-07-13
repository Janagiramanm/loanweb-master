<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Locale;
use DateTime;
use App\Model\Bank;
use App\Model\CibilSetting;
use App\Model\Builder;
use App\Model\Occupation;
use App\Model\CibilDetail;

use NumberFormatter;





class EligibilityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $banks = Bank::all();
        $builders = Builder::all();
        $occupations = Occupation::whereIn('id',[1,2])->get();
        
        return view('back-office.eligibilities.index',compact(['banks','builders','occupations']));
    }

    public function openForm(Request $request)
    {
        // dd($request->all());
        $input = $request->all();
        if($input['incomeType'] == 'salaried'){
            return view('back-office.eligibilities.salaried');
        }else {
            return view('back-office.eligibilities.selfEmployeed');
        }
    }

    public function SelfEmployeeType(Request $request)
    {
        $input = $request->all();

        if($input['employmentType'] == 'general'){
            return view('back-office.eligibilities.generalselfemployeed',compact('input'));
        }else {
            return view('back-office.eligibilities.professionalselfemployeed',compact('input'));
        }
    }

    public function applicant(Request $request)
    {
        // dd($request);
        $input = $request->all();
       
       
        $dob = new DateTime($input['dob']);
        $today   = new DateTime('today');
        $age =  $dob->diff($today)->y;
        $input['age'] = $age;

        $cibil = ['cibil1','cibil2', 'cibil3', 'cibil4'];
        $cibilSettings = CibilSetting::where('bank_id','=',$input['bank'])
              ->where('occupation_id','=',$input['occupation'])->get();
        $cibilscore = $input['cibilScore'];
        $res = [];
        $input['interest'] = '';
        if($cibilSettings){
            foreach($cibilSettings as $cibilSetting){
                   $cibilDetails = CibilDetail::where('cibil_setting_id','=',$cibilSetting->id)->get();
                   if($cibilDetails){
                             foreach($cibilDetails as $key =>  $value){
                                   if($key > 0){
                                       if(in_array($value->name,$cibil)){
                                              $res[$value->id]['ltv1'] = explode('-',$value->ltv1);
                                              $res[$value->id]['ltv2'] = explode('-',$value->ltv2);
                                              $res[$value->id]['ltv3'] = explode('-',$value->ltv3);
                                        }
                                   }
                             }
                   }
            }
        }
       
        if($res){
            foreach($res as $key => $value){
                foreach($value as $name => $val){
                        if(isset($val[0]) && isset($val[1])){
                            if($cibilscore >= $val[0] && $cibilscore <= $val[1]){
                                $input['interest'] = CibilDetail::where('parent_id','=',$key)
                                            ->where('name','like','max-roi%')->first()->$name;
                                            
                            }
                        }
                }
            }
        }
       
        if($input['occupation'] == '1'){
            return view('back-office.eligibilities.applicant',compact('input'));
        }else {
            if($input['employmentType'] == 'general'){
                return view('back-office.eligibilities.generalselfemployeed',compact('input'));
            }else{
                return view('back-office.eligibilities.professionalselfemployeed',compact('input'));
            }
         //   return view('back-office.eligibilities.selfEmployeed');
         
        }
        
        // return view('back-office.eligibilities.applicant',compact('input'));
    }

    public function eligibility(Request $request)
    {
        $input = $request->all();
      
        $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::CURRENCY);
        $compArr = array("E", "SP", "P", "G", "SG");
        $salaryIncome1 = 0;
        $rentalItr1 = 0;
        $rentalNonItr1 = 0;
        $variableOT1 = 0;
        $fixedIncentivesQuat1 = 0;
        $variableIncentivesQuat1 = 0;
        $variableIncentivesHalf1 = 0;
        $variableIncentivesYear1 = 0;
        $interestDividend1 = 0;
        $agriculturalIncome1 = 0;
        $lic50New1 = 0;
        $lic100Renew1 = 0;
        $otherSources1 = 0;

        if (isset($input['applicant1'])) {
         
            if (isset($input['grossIncome1'])) {
                $salaryIncome1 = $input['grossIncome1'];
            }

            if(isset($input['netIncome1'] )){
                $salaryIncome1 = $input['netIncome1'];
            }
            if(isset($input['rentalItr1'] )){
                $rentalItr1 = $input['rentalItr1'] / 12;
            }
            if(isset($input['rentalNonItr1'] )){
                $rentalNonItr1 = ($input['rentalNonItr1'] * 0.75)/12;
            }
            if(isset($input['variableOT1'] )){
                $variableOT1 = ($input['variableOT1']*0.5)/3;
            }
            if(isset($input['fixedIncentivesQuat1'] )){
                $fixedIncentivesQuat1 = $input['fixedIncentivesQuat1']/3;
            }
            if(isset($input['variableIncentivesQuat1'] )){
                $variableIncentivesQuat1 = ($input['variableIncentivesQuat1']*0.5)/3;
            }
            if(isset($input['variableIncentivesHalf1'] )){
                $variableIncentivesHalf1 = ($input['variableIncentivesHalf1']*0.5)/6;
            }
            if(isset($input['variableIncentivesYear1'] )){
                $variableIncentivesYear1 = ($input['variableIncentivesYear1']*0.5)/12;
            }
            if(isset($input['interestDividend1'] )){
                $interestDividend1 = ($input['interestDividend1']*0.5)/12;
            }
            if(isset($input['agriculturalIncome1'] )){
                $agriculturalIncome1 = $input['agriculturalIncome1']/12;
            }
            if(isset($input['lic50New1'] )){
                $lic50New1 = ($input['lic50New1']*0.5)/12;
            }
            if(isset($input['lic100Renew1'] )){
                $lic100Renew1 = $input['lic100Renew1']/12;
            }
            if(isset($input['otherSources1'] )){
                $otherSources1 = ($input['otherSources1']*0.5)/12;
            }

            if(in_array($input['companyType'], $compArr)){
                if((60 - $input['ageOfApplicant1']) >= 20 ){
                    // $loan_tenure1 = 20;
                    $secondaryTenure = 20;
                }else {
                    // $loan_tenure1 = 60 - $input['ageOfApplicant1'];
                    $secondaryTenure = 60 - $input['ageOfApplicant1'];

                    // $loan_tenure1 = 60 - $input['ageOfApplicant1'];
                    // $secondaryTenure = $loan_tenure1-5;
                }
            }else{
                if((60 - $input['ageOfApplicant1']) >= 20 ){
                    $loan_tenure1 = 30;
                }else{
                    $loan_tenure1 = 60 - $input['ageOfApplicant1'];
                }
            }


            $totalIncome1 =  (int)($salaryIncome1 + $rentalItr1 + $rentalNonItr1 +  $variableOT1  + $fixedIncentivesQuat1 +  $variableIncentivesQuat1 + $variableIncentivesHalf1 + $variableIncentivesYear1 +  $interestDividend1 + $agriculturalIncome1  +  $lic50New1 + $lic100Renew1  + $otherSources1);


            if(isset($input['companyType']) && $input['companyType'] == "E"){
                $first = $totalIncome1 + ($totalIncome1 * 0.07);
                $second = $first + ($first * 0.07);
                $stepUpIncome = $second + ($second * 0.07);
            } elseif (isset($input['companyType']) && $input['companyType'] == "SP"){
                $first = $totalIncome1 + ($totalIncome1 * 0.06);
                $second = $first + ($first * 0.06);
                $stepUpIncome = $second + ($second * 0.06);
            } else {
                $first = $totalIncome1 + ($totalIncome1 * 0.05);
                $second = $first + ($first * 0.05);
                $stepUpIncome = $second + ($second * 0.05);
            }

            $allLoans1 = isset($input['allLoans1']) ? $input['allLoans1'] : 0 ;
            $crediBills1 = isset($input['creditCardBills1']) ? $input['creditCardBills1'] : 0;
            $totalLiabilityes1 = $allLoans1 + ($crediBills1 * 0.05);
            $totalObligations1 = number_format($totalLiabilityes1);
            $foir = (float)(0.6);
            $rateOfIntrest = 0;
            if(isset($input['otherSources1'] )){
              $rateOfIntrest = $input['rateOfIntrest']/100;
            }
            $costOfProperty = isset($input['costOfProperty']) ? $input['costOfProperty']:0;
            $loanRequested = isset($input['loanRequested']) ? $input['loanRequested'] : 0;


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
            $emi = 0;
            $eligibilityAsPerIncome = 0;
            $finalEligibility = 0;


            if(in_array($input['companyType'], $compArr)){
                $stepX = pow((1+$rateOfIntrest/12),($secondaryTenure * 12));
                $stepY = pow((1+$rateOfIntrest/12),($secondaryTenure * 12))-1;
                $stepUpEmi = (100000*($rateOfIntrest/12)) * $stepX/$stepY;

                $primaryEmi= (100000*($rateOfIntrest/12));

                $eligibityforIncomePrimary = ((($totalIncome1 * $foir)- $totalLiabilityes1 ) / (int)$primaryEmi) * 100000;
                $eligibityForStepUp = ((($stepUpIncome * $foir)- $totalLiabilityes1 ) / (int)$stepUpEmi) * 100000;

                if($eligibleLoanAsPerProperty < $eligibityforIncomePrimary  &&  $eligibleLoanAsPerProperty < $eligibityForStepUp){
                    $finalEligibility = $fmt->format($eligibleLoanAsPerProperty);
                }elseif($eligibityforIncomePrimary < $eligibleLoanAsPerProperty  &&  $eligibityforIncomePrimary < $eligibityForStepUp) {
                    $finalEligibility = $fmt->format($eligibityforIncomePrimary);
                }else{
                    $finalEligibility = $fmt->format($eligibityForStepUp);
                }
            }else {

                $x = pow((1+$rateOfIntrest/12),($loan_tenure1 * 12));
                $y = pow((1+$rateOfIntrest/12),($loan_tenure1 * 12))-1;
                if($rateOfIntrest > 0){
                    $emi = (100000*($rateOfIntrest/12))*$x/$y;

                    $eligibilityAsPerIncome = ((($totalIncome1 * $foir) - $totalLiabilityes1) / (int)$emi)*100000;
                    
                    if($eligibleLoanAsPerProperty < $eligibilityAsPerIncome ){
                        $finalEligibility = $fmt->format($eligibleLoanAsPerProperty);
                    }else {
                        $finalEligibility =$fmt->format( $eligibilityAsPerIncome);
                    }
                }
            }

            if(in_array($input['companyType'], $compArr)){
                $params = array('applicants'=> 1,  'company' => $input['companyType'], 'primaryEmi' => $fmt->format($primaryEmi),  'secondaryEmi' => $fmt->format($stepUpEmi), 'foir' => $foir, 'eligibleLoanAsPerProperty' => $fmt->format($eligibleLoanAsPerProperty), 'eligibilityAsPerIncome' => $fmt->format($eligibityforIncomePrimary), 'apprisalIncome' => $fmt->format($totalIncome1), 'totalLiabilityes1' => $fmt->format($totalLiabilityes1), 'eligibityForStepUp' => $fmt->format($eligibityForStepUp), 'marginPaidInAmount' => $fmt->format($marginPaidInAmount), 'finalEligibility' => $finalEligibility);
            } else {
                $params = array('applicants'=> 1, 'company' => $input['companyType'], 'primaryEmi' => $fmt->format($emi),  'foir' => $foir, 'eligibleLoanAsPerProperty' => $fmt->format($eligibleLoanAsPerProperty), 'apprisalIncome' => $fmt->format($totalIncome1), 'totalLiabilityes1' => $fmt->format($totalLiabilityes1), 'marginPaidInAmount' => $fmt->format($marginPaidInAmount), 'eligibilityAsPerIncome' => $fmt->format($eligibilityAsPerIncome),'finalEligibility' => $finalEligibility);
            }

        }
        if(isset($input['applicant2'])){

            // Applicant 1 Incomes=================
            if (isset($input['grossIncome1'])) {
                $salaryIncome1 = $input['grossIncome1'];
            }
            if(isset($input['netIncome1'] )){
                $salaryIncome1 = $input['netIncome1'];
            }
            $rentalItr1 = $input['rentalItr1'] / 12;
            $rentalNonItr1 = ($input['rentalNonItr1'] * 0.75)/12;
            $variableOT1 = ($input['variableOT1']*0.5)/3;
            $fixedIncentivesQuat1 = $input['fixedIncentivesQuat1']/3;
            $variableIncentivesQuat1 = ($input['variableIncentivesQuat1']*0.5)/3;
            $variableIncentivesHalf1 = ($input['variableIncentivesHalf1']*0.5)/6;
            $variableIncentivesYear1 = ($input['variableIncentivesYear1']*0.5)/12;
            $interestDividend1 = ($input['interestDividend1']*0.5)/12;
            $agriculturalIncome1 = $input['agriculturalIncome1']/12;
            $lic50New1 = ($input['lic50New1']*0.5)/12;
            $lic100Renew1 = $input['lic100Renew1']/12;
            $otherSources1 = ($input['otherSources1']*0.5)/12;

            if(in_array($input['companyType'], $compArr)){
                if((60 - $input['ageOfApplicant1']) >= 20 ){
                    $loan_tenure1 = 20;
                }else {
                    $loan_tenure1 = 60 - $input['ageOfApplicant1'];
                }
            }else{
                if((60 - $input['ageOfApplicant1']) >= 30 ){
                    $loan_tenure1 = 30;
                }else{
                    $loan_tenure1 = 60 - $input['ageOfApplicant1'];
                }
            }

            $totalIncome1 = ($salaryIncome1 + $rentalItr1 + $rentalNonItr1 +  $variableOT1  + $fixedIncentivesQuat1 +  $variableIncentivesQuat1 + $variableIncentivesHalf1 + $variableIncentivesYear1 +  $interestDividend1 + $agriculturalIncome1  +  $lic50New1 + $lic100Renew1  + $otherSources1);

            // Applicant 1 Loans=====================
            $allLoans1 = $input['allLoans1'];
            $crediBills1 = $input['creditCardBills1'];
            $totalLiabilityes1 = ($allLoans1 + ($crediBills1 * 0.05));
            $totalObligations1 = $totalLiabilityes1;


            // Applicant 2 Incomes=================
            if (isset($input['grossIncome2'])) {
                $salaryIncome2 = $input['grossIncome2'];
            }
            if(isset($input['netIncome1'])){
                $salaryIncome2 = $input['netIncome1'];
            }
            $rentalItr2 = $input['rentalItr2'] / 12;
            $rentalNonItr2 = ($input['rentalNonItr2'] * 0.75)/12;
            $variableOT2 = ($input['variableOT2']*0.5)/3;
            $fixedIncentivesQuat2 = $input['fixedIncentivesQuat2']/3;
            $variableIncentivesQuat2 = ($input['variableIncentivesQuat2']*0.5)/3;
            $variableIncentivesHalf2 = ($input['variableIncentivesHalf2']*0.5)/6;
            $variableIncentivesYear2 = ($input['variableIncentivesYear2']*0.5)/12;
            $interestDividend2 = ($input['interestDividend2']*0.5)/12;
            $agriculturalIncome2 = $input['agriculturalIncome2']/12;
            $lic50New2 = ($input['lic50New2']*0.5)/12;
            $lic100Renew2 = $input['lic100Renew2']/12;
            $otherSources2 = ($input['otherSources2']*0.5)/12;

            if(in_array($input['companyType'], $compArr)){
                if((60 - $input['ageOfApplicant2']) >= 20 ){
                    $loan_tenure2 = 20;
                }else {
                    $loan_tenure2 = 60 - $input['ageOfApplicant2'];

                }
            }else{
                if((60 - $input['ageOfApplicant2']) >= 30 ){
                    $loan_tenure2 = 30;
                }else{
                    $loan_tenure2 = 60 - $input['ageOfApplicant2'];
                }
            }

            $totalIncomePerMonth2 =  ($salaryIncome2 + $rentalItr2 + $rentalNonItr2 +  $variableOT2  + $fixedIncentivesQuat2 +  $variableIncentivesQuat2 + $variableIncentivesHalf2 + $variableIncentivesYear2 +  $interestDividend2 + $agriculturalIncome2  +  $lic50New2 + $lic100Renew2  + $otherSources2);

            // Applicant 2 Loans=====================
            $allLoans2 = $input['allLoans2'];
            $crediBills2 = $input['creditCardBills2'];
            $totalLiabilityes2 = ($allLoans2 +($crediBills2 * 0.05));



            if($loan_tenure1 == $loan_tenure2){

                $foir = (float)(0.6);
                $rateOfIntrest = $input['rateOfIntrest']/100;
                $costOfProperty = $input['costOfProperty'];
                $loanRequested = $input['loanRequested'];

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



                if(in_array($input['companyType'], $compArr)){
                    $totalObligations2 = $totalLiabilityes2 + $totalLiabilityes1;
                    $totalIncome = $totalIncome1 +  $totalIncomePerMonth2;

                    if($input['companyType'] == "E"){
                        $first = $totalIncome + ($totalIncome * 0.07);
                        $second = $first + ($first * 0.07);
                        $stepUpIncome = $second + ($second * 0.07);
                    } elseif ($input['companyType'] == "SP"){
                        $first = $totalIncome + ($totalIncome * 0.06);
                        $second = $first + ($first * 0.06);
                        $stepUpIncome = $second + ($second * 0.06);
                    } else {
                        $first = $totalIncome + ($totalIncome * 0.05);
                        $second = $first + ($first * 0.05);
                        $stepUpIncome = $second + ($second * 0.05);
                    }

                    $stepX = pow((1+$rateOfIntrest/12),($loan_tenure2 * 12));
                    $stepY = pow((1+$rateOfIntrest/12),($loan_tenure2 * 12))-1;
                    $stepUpEmi = (100000*($rateOfIntrest/12)) * $stepX/$stepY;

                    $primaryEmi= (100000*($rateOfIntrest/12));

                    $eligibityforIncomePrimary = ((($totalIncome * $foir)- $totalObligations2 ) / (int)$primaryEmi) * 100000;
                    $eligibityForStepUp = ((($stepUpIncome * $foir)- $totalObligations2 ) / (int)$stepUpEmi) * 100000;

                    if($eligibleLoanAsPerProperty < $eligibityforIncomePrimary  &&  $eligibleLoanAsPerProperty < $eligibityForStepUp){
                        $finalEligibility = $fmt->format($eligibleLoanAsPerProperty);
                    }elseif($eligibityforIncomePrimary < $eligibleLoanAsPerProperty  &&  $eligibityforIncomePrimary < $eligibityForStepUp) {
                        $finalEligibility = $fmt->format($eligibityforIncomePrimary);
                    }else{
                        $finalEligibility = $fmt->format($eligibityForStepUp);
                    }
                }else {

                    $totalObligations2 = $totalLiabilityes2 + $totalLiabilityes1;
                    $totalIncome = $totalIncome1 +  $totalIncomePerMonth2;

                    $x = pow((1+$rateOfIntrest/12),($loan_tenure1 * 12));
                    $y = pow((1+$rateOfIntrest/12),($loan_tenure1 * 12))-1;
                    $emi1 = (int)((100000*($rateOfIntrest/12))*$x/$y);

                    $standardEligibilityPerIncome = ((($totalIncome * $foir) - $totalObligations2)/$emi1)*100000;

                    if($eligibleLoanAsPerProperty < $standardEligibilityPerIncome ){
                        $finalEligibility = $fmt->format($eligibleLoanAsPerProperty);
                    }else {
                        $finalEligibility =$fmt->format( $standardEligibilityPerIncome);
                    }
                }

                if(in_array($input['companyType'], $compArr)){
                    $params = array('applicants'=> 2,  'company' => $input['companyType'], 'primaryEmi' => $fmt->format($primaryEmi),  'secondaryEmi' => $fmt->format($stepUpEmi), 'foir' => $foir, 'eligibleLoanAsPerProperty' => $fmt->format($eligibleLoanAsPerProperty), 'eligibilityAsPerIncome' => $fmt->format($eligibityforIncomePrimary), 'apprisalIncome' => $fmt->format($totalIncome), 'totalLiabilityes1' => $fmt->format($totalObligations2), 'eligibityForStepUp' => $fmt->format($eligibityForStepUp), 'marginPaidInAmount' => $fmt->format($marginPaidInAmount), 'finalEligibility' => $finalEligibility,  'tenure1' => $loan_tenure1, 'tenure2' => $loan_tenure2);
                } else {

                    $params = array('applicants'=> 2,  'company' => $input['companyType'], 'primaryEmi' => $fmt->format($emi1),  'foir' => $foir, 'eligibleLoanAsPerProperty' => $fmt->format($eligibleLoanAsPerProperty), 'eligibilityAsPerIncome' => $fmt->format($standardEligibilityPerIncome), 'apprisalIncome' => $fmt->format($totalIncome), 'totalLiabilityes1' => $fmt->format($totalObligations2), 'marginPaidInAmount' => $fmt->format($marginPaidInAmount), 'tenure1' => $loan_tenure1, 'tenure2' => $loan_tenure2,  'finalEligibility' => $finalEligibility );
                }

            } else {
                    // Applicant 1 Eligibility with salary=====================
                    $foir = (float)(0.6);
                    $rateOfIntrest = $input['rateOfIntrest']/100;
                    $costOfProperty = $input['costOfProperty'];
                    $loanRequested = $input['loanRequested'];

                    $x = pow((1+$rateOfIntrest/12),($loan_tenure1 * 12));
                    $y = pow((1+$rateOfIntrest/12),($loan_tenure1 * 12))-1;
                    $emi1 = ((100000*($rateOfIntrest/12))*$x/$y);

                    $eligibilityAsPerIncome1 = (($totalIncome1*$foir - $totalLiabilityes1)/$emi1)*100000;

                    // Applicant 2 Eligibility with salary=====================
                    $x = pow((1+$rateOfIntrest/12),($loan_tenure2 * 12));
                    $y = pow((1+$rateOfIntrest/12),($loan_tenure2 * 12))-1;
                    $emi2 = (100000*($rateOfIntrest/12))*$x/$y;

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

                    $eligibilityAsPerIncome2 = (((($totalIncomePerMonth2*$foir) - $totalLiabilityes2)/$emi2)*100000);

                    $totalEligibilityAsPerIncomeOfTwo = $eligibilityAsPerIncome2 + $eligibilityAsPerIncome1;

                    if($totalEligibilityAsPerIncomeOfTwo  > $eligibleLoanAsPerProperty){
                        $finalEligibility = $eligibleLoanAsPerProperty;
                    } else {
                        $finalEligibility = $totalEligibilityAsPerIncomeOfTwo;
                    }

                    $emiforBoth = (($eligibilityAsPerIncome2*$emi2)/100000)+(($eligibilityAsPerIncome1*$emi1)/100000);

                    $emiforOne = (($eligibilityAsPerIncome2*$emi2)/100000);

                    $params = array( 'applicants'=> 2, 'apprisalIncome1'=> $fmt->format($totalIncome1), 'apprisalIncome2'=> $fmt->format($totalIncomePerMonth2), 'eligibilityAsPerIncome2' => $fmt->format($eligibilityAsPerIncome2), 'emi1' => $fmt->format($emi1), 'emi2' => $fmt->format($emi2), 'eligibilityAsPerIncome1' => $fmt->format($eligibilityAsPerIncome1), 'totalObligations1' => $fmt->format($totalLiabilityes1), 'totalObligations2' => $fmt->format($totalLiabilityes2), 'totalEligibility' => $fmt->format($totalEligibilityAsPerIncomeOfTwo), 'eligibleLoanAsPerProperty' => $fmt->format($eligibleLoanAsPerProperty), 'finalEligibility'=>  $fmt->format($finalEligibility), 'firstEmi' => $fmt->format($emiforBoth), 'secondEmi' => $fmt->format($emiforOne), 'tenure1' => $loan_tenure1, 'tenure2' => $loan_tenure2);

            }

        }
        if(isset($input['applicant3'])) {


            // Applicant 1 Incomes=================
            if (isset($input['grossIncome1'])) {
                $salaryIncome1 = $input['grossIncome1'];
            }
            if(isset($input['netIncome1'] )){
                $salaryIncome1 = $input['netIncome1'];
            }
            $rentalItr1 = $input['rentalItr1'] / 12;
            $rentalNonItr1 = ($input['rentalNonItr1'] * 0.75)/12;
            $variableOT1 = ($input['variableOT1']*0.5)/3;
            $fixedIncentivesQuat1 = $input['fixedIncentivesQuat1']/3;
            $variableIncentivesQuat1 = ($input['variableIncentivesQuat1']*0.5)/3;
            $variableIncentivesHalf1 = ($input['variableIncentivesHalf1']*0.5)/6;
            $variableIncentivesYear1 = ($input['variableIncentivesYear1']*0.5)/12;
            $interestDividend1 = ($input['interestDividend1']*0.5)/12;
            $agriculturalIncome1 = $input['agriculturalIncome1']/12;
            $lic50New1 = ($input['lic50New1']*0.5)/12;
            $lic100Renew1 = $input['lic100Renew1']/12;
            $otherSources1 = ($input['otherSources1']*0.5)/12;

            if(in_array($input['companyType'], $compArr)){
                if((60 - $input['ageOfApplicant1']) >= 20 ){
                    $loan_tenure1 = 20;
                }else {
                    $loan_tenure1 = 60 - $input['ageOfApplicant1'];
                }
            }else{
                if((60 - $input['ageOfApplicant1']) >= 30 ){
                    $loan_tenure1 = 30;
                }else{
                    $loan_tenure1 = 60 - $input['ageOfApplicant1'];
                }
            }

            $totalIncome1 =  ($salaryIncome1 + $rentalItr1 + $rentalNonItr1 +  $variableOT1  + $fixedIncentivesQuat1 +  $variableIncentivesQuat1 + $variableIncentivesHalf1 + $variableIncentivesYear1 +  $interestDividend1 + $agriculturalIncome1  +  $lic50New1 + $lic100Renew1  + $otherSources1);

            // Applicant 1 Loans=====================
            $allLoans1 = $input['allLoans1'];
            $crediBills1 = $input['creditCardBills1'];
            $totalLiabilityes1 = $allLoans1 + ($crediBills1 * 0.05);

            // Applicant 2 Incomes=================
            if (isset($input['grossIncome2'])) {
                $salaryIncome2 = $input['grossIncome2'];
            }
            if(isset($input['netIncome1'])){
                $salaryIncome2 = $input['netIncome1'];
            }
            $rentalItr2 = $input['rentalItr2'] / 12;
            $rentalNonItr2 = ($input['rentalNonItr2'] * 0.75)/12;
            $variableOT2 = ($input['variableOT2']*0.5)/3;
            $fixedIncentivesQuat2 = $input['fixedIncentivesQuat2']/3;
            $variableIncentivesQuat2 = ($input['variableIncentivesQuat2']*0.5)/3;
            $variableIncentivesHalf2 = ($input['variableIncentivesHalf2']*0.5)/6;
            $variableIncentivesYear2 = ($input['variableIncentivesYear2']*0.5)/12;
            $interestDividend2 = ($input['interestDividend2']*0.5)/12;
            $agriculturalIncome2 = $input['agriculturalIncome2']/12;
            $lic50New2 = ($input['lic50New2']*0.5)/12;
            $lic100Renew2 = $input['lic100Renew2']/12;
            $otherSources2 = ($input['otherSources2']*0.5)/12;

            if(in_array($input['companyType'], $compArr)){
                if((60 - $input['ageOfApplicant2']) >= 20 ){
                    $loan_tenure2 = 20;
                }else {
                    $loan_tenure2 = 60 - $input['ageOfApplicant2'];
                }
            }else{
                if((60 - $input['ageOfApplicant2']) >= 30 ){
                    $loan_tenure2 = 30;
                }else{
                    $loan_tenure2 = 60 - $input['ageOfApplicant2'];
                }
            }

            $totalIncome2 =  ($salaryIncome2 + $rentalItr2 + $rentalNonItr2 +  $variableOT2  + $fixedIncentivesQuat2 +  $variableIncentivesQuat2 + $variableIncentivesHalf2 + $variableIncentivesYear2 +  $interestDividend2 + $agriculturalIncome2  +  $lic50New2 + $lic100Renew2  + $otherSources2);

            // Applicant 2 Loans=====================
            $allLoans2 = $input['allLoans2'];
            $crediBills2 = $input['creditCardBills2'];
            $totalLiabilityes2 = ($allLoans2 + ($crediBills2  * 0.05));


            // Applicant 3 Income Sources==============
            if (isset($input['grossIncome3'])) {
                $salaryIncome3 = $input['grossIncome3'];
            }
            if(isset($input['netIncome3'])){
                $salaryIncome3 = $input['netIncome3'];
            }

            $rentalItr3 = $input['rentalItr3'] / 12;
            $rentalNonItr3 = ($input['rentalNonItr3'] * 0.75)/12;
            $variableOT3 = ($input['variableOT3']*0.5)/3;
            $fixedIncentivesQuat3 = $input['fixedIncentivesQuat3']/3;
            $variableIncentivesQuat3 = ($input['variableIncentivesQuat3']*0.5)/3;
            $variableIncentivesHalf3 = ($input['variableIncentivesHalf3']*0.5)/6;
            $variableIncentivesYear3 = ($input['variableIncentivesYear3']*0.5)/12;
            $interestDividend3 = ($input['interestDividend3']*0.5)/12;
            $agriculturalIncome3 = $input['agriculturalIncome3']/12;
            $lic50New3 = ($input['lic50New3']*0.5)/12;
            $lic100Renew3 = $input['lic100Renew3']/12;
            $otherSources3 = ($input['otherSources3']*0.5)/12;

            if(in_array($input['companyType'], $compArr)){
                if((60 - $input['ageOfApplicant3']) >= 20 ){
                    $loan_tenure3 = 20;
                }else {
                    $loan_tenure3 = 60 - $input['ageOfApplicant3'];
                }
            }else{
                if((60 - $input['ageOfApplicant3']) >= 30 ){
                    $loan_tenure3 = 30;
                }else{
                    $loan_tenure3 = 60 - $input['ageOfApplicant3'];
                }
            }

            $totalIncome3 =  ($salaryIncome3 + $rentalItr3 + $rentalNonItr3 +  $variableOT3  + $fixedIncentivesQuat3 +  $variableIncentivesQuat3 + $variableIncentivesHalf3 + $variableIncentivesYear3 +  $interestDividend3 + $agriculturalIncome3  +  $lic50New3 + $lic100Renew3  + $otherSources3 );


            // all loans for applicant 3 ===================
            $allLoans3 = $input['allLoans3'];
            $crediBills3 = $input['creditCardBills3'];
            $totalLiabilityes3 = ($allLoans3 +( $crediBills3  * 0.05));


            if($loan_tenure1 == $loan_tenure2 && $loan_tenure2 == $loan_tenure3){
                $foir = (float)(0.6);
                $rateOfIntrest = $input['rateOfIntrest']/100;
                $costOfProperty = $input['costOfProperty'];
                $loanRequested = $input['loanRequested'];

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

                if(in_array($input['companyType'], $compArr)){
                    $totalIncome = $totalIncome1 + $totalIncome2 + $totalIncome3;
                    $totalObligations = $totalLiabilityes1 + $totalLiabilityes2 + $totalLiabilityes3;

                    if($input['companyType'] == "E"){
                        $first = $totalIncome + ($totalIncome * 0.07);
                        $second = $first + ($first * 0.07);
                        $stepUpIncome = $second + ($second * 0.07);
                    } elseif ($input['companyType'] == "SP"){
                        $first = $totalIncome + ($totalIncome * 0.06);
                        $second = $first + ($first * 0.06);
                        $stepUpIncome = $second + ($second * 0.06);
                    } else {
                        $first = $totalIncome + ($totalIncome * 0.05);
                        $second = $first + ($first * 0.05);
                        $stepUpIncome = $second + ($second * 0.05);
                    }

                    $stepX = pow((1+$rateOfIntrest/12),($loan_tenure1 * 12));
                    $stepY = pow((1+$rateOfIntrest/12),($loan_tenure1 * 12))-1;
                    $stepUpEmi = (100000*($rateOfIntrest/12)) * $stepX/$stepY;

                    $primaryEmi= (100000*($rateOfIntrest/12));

                    $eligibityforIncomePrimary = ((($totalIncome * $foir)- $totalObligations ) / (int)$primaryEmi) * 100000;
                    $eligibityForStepUp = ((($stepUpIncome * $foir)- $totalObligations ) / (int)$stepUpEmi) * 100000;

                    if($eligibleLoanAsPerProperty < $eligibityforIncomePrimary  &&  $eligibleLoanAsPerProperty < $eligibityForStepUp){
                        $finalEligibility = $fmt->format($eligibleLoanAsPerProperty);
                    }elseif($eligibityforIncomePrimary < $eligibleLoanAsPerProperty  &&  $eligibityforIncomePrimary < $eligibityForStepUp) {
                        $finalEligibility = $fmt->format($eligibityforIncomePrimary);
                    }else{
                        $finalEligibility = $fmt->format($eligibityForStepUp);
                    }
                }else {

                    $totalIncome = $totalIncome1 + $totalIncome2 + $totalIncome3;
                    $totalObligations = $totalLiabilityes1 + $totalLiabilityes2 + $totalLiabilityes3;

                    $x = pow((1+$rateOfIntrest/12),($loan_tenure1 * 12));
                    $y = pow((1+$rateOfIntrest/12),($loan_tenure1 * 12))-1;
                    $emi = ((100000*($rateOfIntrest/12))*$x/$y);

                    $standardEligibilityPerIncome = ((($totalIncome * $foir) - $totalObligations)/$emi ) * 100000;

                    if($eligibleLoanAsPerProperty < $standardEligibilityPerIncome ){
                        $finalEligibility = $fmt->format($eligibleLoanAsPerProperty);
                    }else {
                        $finalEligibility =$fmt->format( $standardEligibilityPerIncome);
                    }
                }


                if(in_array($input['companyType'], $compArr)){
                    $params = array(  'applicants'=> 2,
                                      'company' => $input['companyType'],
                                      'apprisalIncome' => $fmt->format($totalIncome),
                                      'totalLiabilityes1' => $fmt->format($totalObligations),
                                      'primaryEmi' => $fmt->format($primaryEmi),
                                      'secondaryEmi' => $fmt->format($stepUpEmi),
                                      'foir' => $foir,
                                      'marginPaidInAmount' => $fmt->format($marginPaidInAmount),
                                      'eligibleLoanAsPerProperty' => $fmt->format($eligibleLoanAsPerProperty),
                                      'eligibilityAsPerIncome' => $fmt->format($eligibityforIncomePrimary),
                                      'eligibityForStepUp' => $fmt->format($eligibityForStepUp),
                                      'finalEligibility' => $finalEligibility,
                                      'tenure1' => $loan_tenure1,
                                      'tenure2' => $loan_tenure2,
                                      'tenure3' => $loan_tenure3
                                    );
                } else {

                    $params = array(  'applicants'=> 2,
                                      'company' => $input['companyType'],
                                      'primaryEmi' => $fmt->format($emi),
                                      'foir' => $foir,
                                      'eligibleLoanAsPerProperty' => $fmt->format($eligibleLoanAsPerProperty),
                                      'eligibilityAsPerIncome' => $fmt->format($standardEligibilityPerIncome),
                                      'apprisalIncome' => $fmt->format($totalIncome),
                                      'totalLiabilityes1' => $fmt->format($totalObligations),
                                      'marginPaidInAmount' => $fmt->format($marginPaidInAmount),
                                      'finalEligibility' => $finalEligibility,
                                      'tenure1' => $loan_tenure1,
                                      'tenure2' => $loan_tenure2,
                                      'tenure3' => $loan_tenure3
                                    );
                }



            } else {
                $foir = (float)(0.6);
                $rateOfIntrest = $input['rateOfIntrest']/100;
                $costOfProperty = $input['costOfProperty'];
                $loanRequested = $input['loanRequested'];

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

                $x = pow((1+$rateOfIntrest/12),($loan_tenure1 * 12));
                $y = pow((1+$rateOfIntrest/12),($loan_tenure1 * 12))-1;
                $emi1 = ((100000*($rateOfIntrest/12))*$x/$y);

                $x = pow((1+$rateOfIntrest/12),($loan_tenure2 * 12));
                $y = pow((1+$rateOfIntrest/12),($loan_tenure2 * 12))-1;
                $emi2 = ((100000*($rateOfIntrest/12))*$x/$y);

                $x = pow((1+$rateOfIntrest/12),($loan_tenure3 * 12));
                $y = pow((1+$rateOfIntrest/12),($loan_tenure3 * 12))-1;
                $emi3 = ((100000*($rateOfIntrest/12))*$x/$y);


                $eligibilityAsPerIncome1 = ((($totalIncome1 * $foir) - $totalLiabilityes1)/ $emi1)*100000;

                $eligibilityAsPerIncome2 = ((($totalIncome2 * $foir) - $totalLiabilityes2)/ $emi2)*100000;
                $eligibilityAsPerIncome3 = ((($totalIncome3 * $foir) - $totalLiabilityes3)/ $emi3)*100000;

                $totalEligibilityAsPerIncomeOfThree = ($eligibilityAsPerIncome1 +$eligibilityAsPerIncome2 + $eligibilityAsPerIncome1);

                if($totalEligibilityAsPerIncomeOfThree  > $eligibleLoanAsPerProperty){
                    $finalEligibility = $eligibleLoanAsPerProperty;
                } else {
                    $finalEligibility = $totalEligibilityAsPerIncomeOfThree;
                }

                $allthreeEmi = (($eligibilityAsPerIncome1*$emi1)/100000)+(($eligibilityAsPerIncome2*$emi2)/100000)+(($eligibilityAsPerIncome3*$emi3)/100000);

                $emifortwo = (($eligibilityAsPerIncome2*$emi2)/100000)+(($eligibilityAsPerIncome3*$emi3)/100000);

                $emiforOne = (($eligibilityAsPerIncome3*$emi3)/100000);



                $params = array(    'applicants'=> 3,
                                    'company' => $input['companyType'],
                                    'tenure1' => $loan_tenure1,
                                    'tenure2' => $loan_tenure2,
                                    'tenure3' => $loan_tenure3,
                                    'apprisalIncome1'=> $fmt->format($totalIncome1),
                                    'apprisalIncome2'=> $fmt->format($totalIncome2),
                                    'apprisalIncome3' => $fmt->format($totalIncome3),
                                    'totalObligations1' => $fmt->format($totalLiabilityes1),
                                    'totalObligations2' => $fmt->format($totalLiabilityes2),
                                    'totalObligations3' => $fmt->format($totalLiabilityes3),
                                    'emi1' => $fmt->format($emi1),
                                    'emi2' => $fmt->format($emi2),
                                    'emi3' => $fmt->format($emi3),
                                    'eligibilityAsPerIncome1' => $fmt->format($eligibilityAsPerIncome1),
                                    'eligibilityAsPerIncome2' => $fmt->format($eligibilityAsPerIncome2),
                                    'eligibilityAsPerIncome3' => $fmt->format($eligibilityAsPerIncome3),
                                    'totalEligibility' => $fmt->format($totalEligibilityAsPerIncomeOfThree), 'eligibleLoanAsPerProperty' => $fmt->format($eligibleLoanAsPerProperty), 'finalEligibility'=>  $fmt->format($finalEligibility),
                                    'firstEmi' => $fmt->format($allthreeEmi),
                                    'secondEmi' => $fmt->format($emifortwo),
                                    'thirdEmi' => $fmt->format($emiforOne),
                                );

                            // dd($params);



            }
            // dd($params);
        }

        return view('back-office.eligibilities.eligibility', compact('params'));
    }

    public function selfemployeeGeneral(Request $request)
    {
        $input = $request->all();
        $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::CURRENCY);

        if(isset($input['applicant1'])){
            /* these are the incomes to applicants */
            $netProfit1             = $input['netProfit1'];
            $depriciation1          = $input['depriciation1'];
            $onetimeExpenses1       = $input['onetimeExpenses1'];
            $totalRemuneration1     = $input['totalRemuneration1'];
            $rentalincome1          = $input['rentalincome1'];
            $rentalincomenotshow1   = $input['rentalincomenotshow1'];
            $incomeOfInterest1      = $input['incomeOfInterest1'];
            $agriIncome1            = $input['agriIncome1'];
            $lic50percent1          = $input['lic50percent1'];
            $lic100percent1         = $input['lic100percent1'];
            $otherIncome1           = $input['otherIncome1'];

            $totalIncome1 = $netProfit1 + $depriciation1 + $onetimeExpenses1 +  $totalRemuneration1 + $rentalincome1 + $rentalincomenotshow1 + $incomeOfInterest1 + $agriIncome1 + $lic50percent1 + $lic100percent1 + $otherIncome1;
            $finalincome = (int)($totalIncome1/12);

            /* these are liabiles  */
            $incometax1             = $input['incometax1'];
            $allLoans1              = $input['allLoans1'];
            $creditCardBills1       = $input['creditCardBills1'];

            $totaldeductions1 = ($incometax1/12) + $allLoans1 + ($creditCardBills1 * 0.05);
            $finaldeduction = (int)$totaldeductions1;


            /* common calculation */
            $rateOfIntrest          = $input['rateOfIntrest']/100;
            $loanTenure             = $input['loanTenure'];
            $costOfProperty         = $input['costOfProperty'];
            $loanRequested          = $input['loanRequested'];

            $initialfoir = (float)0.2;
            if($costOfProperty < 3000000){
                $ltv = (float)0.9;
            }else if($costOfProperty > 3000000 && $costOfProperty <= 7500000){
                $ltv = (float)0.85;
            }else {
                $ltv = (float)0.8;
            }

            if(($initialfoir+$ltv) <= 1.2){
                $foir = (float)1.2;
            }
            $marginPaid = 1 - $ltv;

            $x = pow((1+$rateOfIntrest/12),($loanTenure * 12));
            $y = pow((1+$rateOfIntrest/12),($loanTenure * 12))-1;
            $emi = (int)((100000*($rateOfIntrest/12))*$x/$y);

            $eligibleLoanAsPerProperty = $costOfProperty * $ltv;
            $eligibilityAsPerIncome = ((($finalincome*$initialfoir)-$finaldeduction)/$emi)*100000;

            if($eligibleLoanAsPerProperty < $eligibilityAsPerIncome ){
                $marginPaidInAmount = $costOfProperty - $eligibleLoanAsPerProperty;
                $finalEligibility = $fmt->format($eligibleLoanAsPerProperty);
            }else {
                $marginPaidInAmount = $costOfProperty - $eligibilityAsPerIncome;
                $finalEligibility =$fmt->format( $eligibilityAsPerIncome);
            }
            $params = array('applicants'=> 1,  'emi' => $fmt->format($emi),  'foir' => $foir, 'eligibleLoanAsPerProperty' => $fmt->format($eligibleLoanAsPerProperty), 'apprisalIncome' => $fmt->format($finalincome), 'totaldeductions' => $fmt->format($finaldeduction), 'marginPaidInAmount' => $fmt->format($marginPaidInAmount), 'eligibilityAsPerIncome' => $fmt->format($eligibilityAsPerIncome),'finalEligibility' => $finalEligibility);

        }
        if(isset($input['applicant2'])){
            /* these are the incomes to applicants */
            $netProfit1             = $input['netProfit1'];
            $depriciation1          = $input['depriciation1'];
            $onetimeExpenses1       = $input['onetimeExpenses1'];
            $totalRemuneration1     = $input['totalRemuneration1'];
            $rentalincome1          = $input['rentalincome1'];
            $rentalincomenotshow1   = $input['rentalincomenotshow1'];
            $incomeOfInterest1      = $input['incomeOfInterest1'];
            $agriIncome1            = $input['agriIncome1'];
            $lic50percent1          = $input['lic50percent1'];
            $lic100percent1         = $input['lic100percent1'];
            $otherIncome1           = $input['otherIncome1'];

            $totalIncome1 = $netProfit1 + $depriciation1 + $onetimeExpenses1 +  $totalRemuneration1 + $rentalincome1 + $rentalincomenotshow1 + $incomeOfInterest1 + $agriIncome1 + $lic50percent1 + $lic100percent1 + $otherIncome1;


            /* these are liabiles  */
            $incometax1             = $input['incometax1'];
            $allLoans1              = $input['allLoans1'];
            $creditCardBills1       = $input['creditCardBills1'];

            $totaldeductions1 = ($incometax1/12) + $allLoans1 + ($creditCardBills1 * 0.05);


            /* these are the incomes to applicant 2 */
            $netProfit2             = $input['netProfit2'];
            $depriciation2          = $input['depriciation2'];
            $onetimeExpenses2       = $input['onetimeExpenses2'];
            $totalRemuneration2     = $input['totalRemuneration2'];
            $rentalincome2          = $input['rentalincome2'];
            $rentalincomenotshow2   = $input['rentalincomenotshow2'];
            $incomeOfInterest2      = $input['incomeOfInterest2'];
            $agriIncome2            = $input['agriIncome2'];
            $lic50percent2          = $input['lic50percent2'];
            $lic100percent2         = $input['lic100percent2'];
            $otherIncome2           = $input['otherIncome2'];

            $totalIncome2 = $netProfit2 + $depriciation2 + $onetimeExpenses2 +  $totalRemuneration2 + $rentalincome2 + $rentalincomenotshow2 + $incomeOfInterest2 + $agriIncome2 + $lic50percent2 + $lic100percent2 + $otherIncome2;

            /* these are liabiles of applicant 2 */
            $incometax2             = $input['incometax2'];
            $allLoans2              = $input['allLoans2'];
            $creditCardBills2       = $input['creditCardBills2'];

            $totaldeductions2 = ($incometax2/12) + $allLoans2 + ($creditCardBills2 * 0.05);




            $finalincome = (int)($totalIncome1/12) + (int)($totalIncome2/12);
            $finaldeduction = (int)$totaldeductions1 + (int)$totaldeductions2;


            /* common calculation */
            $rateOfIntrest          = $input['rateOfIntrest']/100;
            $loanTenure             = $input['loanTenure'];
            $costOfProperty         = $input['costOfProperty'];
            $loanRequested          = $input['loanRequested'];

            $initialfoir = (float)0.2;
            if($costOfProperty < 3000000){
                $ltv = (float)0.9;
            }else if($costOfProperty > 3000000 && $costOfProperty <= 7500000){
                $ltv = (float)0.85;
            }else {
                $ltv = (float)0.8;
            }

            if(($initialfoir+$ltv) <= 1.2){
                $foir = (float)1.2;
            }
            $marginPaid = 1 - $ltv;

            $x = pow((1+$rateOfIntrest/12),($loanTenure * 12));
            $y = pow((1+$rateOfIntrest/12),($loanTenure * 12))-1;
            $emi = (int)((100000*($rateOfIntrest/12))*$x/$y);

            $eligibleLoanAsPerProperty = $costOfProperty * $ltv;
            $eligibilityAsPerIncome = ((($finalincome*$initialfoir)-$finaldeduction)/$emi)*100000;



            if($eligibleLoanAsPerProperty < $eligibilityAsPerIncome ){
                $marginPaidInAmount = $costOfProperty - $eligibleLoanAsPerProperty;
                $finalEligibility = $fmt->format($eligibleLoanAsPerProperty);
            }else {
                $marginPaidInAmount = $costOfProperty - $eligibilityAsPerIncome;
                $finalEligibility =$fmt->format( $eligibilityAsPerIncome);
            }
            $params = array('applicants'=> 2,  'emi' => $fmt->format($emi),  'foir' => $foir, 'eligibleLoanAsPerProperty' => $fmt->format($eligibleLoanAsPerProperty), 'apprisalIncome' => $fmt->format($finalincome), 'totaldeductions' => $fmt->format($finaldeduction), 'marginPaidInAmount' => $fmt->format($marginPaidInAmount), 'eligibilityAsPerIncome' => $fmt->format($eligibilityAsPerIncome),'finalEligibility' => $finalEligibility);

        }
        if(isset($input['applicant3'])){
            /* these are the incomes to applicant 1 */
            $netProfit1             = $input['netProfit1'];
            $depriciation1          = $input['depriciation1'];
            $onetimeExpenses1       = $input['onetimeExpenses1'];
            $totalRemuneration1     = $input['totalRemuneration1'];
            $rentalincome1          = $input['rentalincome1'];
            $rentalincomenotshow1   = $input['rentalincomenotshow1'];
            $incomeOfInterest1      = $input['incomeOfInterest1'];
            $agriIncome1            = $input['agriIncome1'];
            $lic50percent1          = $input['lic50percent1'];
            $lic100percent1         = $input['lic100percent1'];
            $otherIncome1           = $input['otherIncome1'];

            $totalIncome1 = $netProfit1 + $depriciation1 + $onetimeExpenses1 +  $totalRemuneration1 + $rentalincome1 + $rentalincomenotshow1 + $incomeOfInterest1 + $agriIncome1 + $lic50percent1 + $lic100percent1 + $otherIncome1;


            /* these are liabiles  */
            $incometax1             = $input['incometax1'];
            $allLoans1              = $input['allLoans1'];
            $creditCardBills1       = $input['creditCardBills1'];

            $totaldeductions1 = ($incometax1/12) + $allLoans1 + ($creditCardBills1 * 0.05);


            /* these are the incomes to applicant 2 */
            $netProfit2             = $input['netProfit2'];
            $depriciation2          = $input['depriciation2'];
            $onetimeExpenses2       = $input['onetimeExpenses2'];
            $totalRemuneration2     = $input['totalRemuneration2'];
            $rentalincome2          = $input['rentalincome2'];
            $rentalincomenotshow2   = $input['rentalincomenotshow2'];
            $incomeOfInterest2      = $input['incomeOfInterest2'];
            $agriIncome2            = $input['agriIncome2'];
            $lic50percent2          = $input['lic50percent2'];
            $lic100percent2         = $input['lic100percent2'];
            $otherIncome2           = $input['otherIncome2'];

            $totalIncome2 = $netProfit2 + $depriciation2 + $onetimeExpenses2 +  $totalRemuneration2 + $rentalincome2 + $rentalincomenotshow2 + $incomeOfInterest2 + $agriIncome2 + $lic50percent2 + $lic100percent2 + $otherIncome2;


            /* these are liabiles of applicant 2 */
            $incometax2             = $input['incometax2'];
            $allLoans2              = $input['allLoans2'];
            $creditCardBills2       = $input['creditCardBills2'];

            $totaldeductions2 = ($incometax2/12) + $allLoans2 + ($creditCardBills2 * 0.05);

            /* these are the incomes to applicant 3 */
            $netProfit3             = $input['netProfit3'];
            $depriciation3          = $input['depriciation3'];
            $onetimeExpenses3       = $input['onetimeExpenses3'];
            $totalRemuneration3     = $input['totalRemuneration3'];
            $rentalincome3          = $input['rentalincome3'];
            $rentalincomenotshow3   = $input['rentalincomenotshow3'];
            $incomeOfInterest3      = $input['incomeOfInterest3'];
            $agriIncome3            = $input['agriIncome3'];
            $lic50percent3          = $input['lic50percent3'];
            $lic100percent3         = $input['lic100percent3'];
            $otherIncome3           = $input['otherIncome3'];

            $totalIncome3 = $netProfit3 + $depriciation3 + $onetimeExpenses3 +  $totalRemuneration3 + $rentalincome3 + $rentalincomenotshow3 + $incomeOfInterest3 + $agriIncome3 + $lic50percent3 + $lic100percent3 + $otherIncome3;


            /* these are liabiles of applicant 3  */
            $incometax3             = $input['incometax3'];
            $allLoans3              = $input['allLoans3'];
            $creditCardBills3       = $input['creditCardBills3'];

            $totaldeductions3 = ($incometax3/12) + $allLoans3 + ($creditCardBills3 * 0.05);

            $finalincome = (int)($totalIncome1/12) + (int)($totalIncome2/12) + (int)($totalIncome3/12);
            $finaldeduction = (int)$totaldeductions1 + (int)$totaldeductions2 + (int)$totaldeductions3;


            /* common calculation */
            $rateOfIntrest          = $input['rateOfIntrest']/100;
            $loanTenure             = $input['loanTenure'];
            $costOfProperty         = $input['costOfProperty'];
            $loanRequested          = $input['loanRequested'];

            $initialfoir = (float)0.2;
            if($costOfProperty < 3000000){
                $ltv = (float)0.9;
            }else if($costOfProperty > 3000000 && $costOfProperty <= 7500000){
                $ltv = (float)0.85;
            }else {
                $ltv = (float)0.8;
            }

            if(($initialfoir+$ltv) <= 1.2){
                $foir = (float)1.2;
            }
            $marginPaid = 1 - $ltv;

            $x = pow((1+$rateOfIntrest/12),($loanTenure * 12));
            $y = pow((1+$rateOfIntrest/12),($loanTenure * 12))-1;
            $emi = (int)((100000*($rateOfIntrest/12))*$x/$y);

            $eligibleLoanAsPerProperty = $costOfProperty * $ltv;
            $eligibilityAsPerIncome = ((($finalincome*$initialfoir)-$finaldeduction)/$emi)*100000;

            if($eligibleLoanAsPerProperty < $eligibilityAsPerIncome ){
                $marginPaidInAmount = $costOfProperty - $eligibleLoanAsPerProperty;
                $finalEligibility = $fmt->format($eligibleLoanAsPerProperty);
            }else {
                $marginPaidInAmount = $costOfProperty - $eligibilityAsPerIncome;
                $finalEligibility =$fmt->format( $eligibilityAsPerIncome);
            }
            $params = array('applicants'=> 3,  'emi' => $fmt->format($emi),  'foir' => $foir, 'eligibleLoanAsPerProperty' => $fmt->format($eligibleLoanAsPerProperty), 'apprisalIncome' => $fmt->format($finalincome), 'totaldeductions' => $fmt->format($finaldeduction), 'marginPaidInAmount' => $fmt->format($marginPaidInAmount), 'eligibilityAsPerIncome' => $fmt->format($eligibilityAsPerIncome),'finalEligibility' => $finalEligibility);

        }
        // dd($params);
        return view('back-office.eligibilities.generalSelfEligibility', compact('params'));
    }

    public function selfemployeeProfessional(Request $request)
    {
        $input = $request->all();
        $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::CURRENCY);

        if(isset($input['applicant1'])){
            /* these are the incomes to applicants */
            $profession1            = $input['profession1'];
            $experience1            = $input['experience1'];
            $latestFinancial1       = $input['latestFinancial1'];
            $previousFinancial1     = $input['previousFinancial1'];
            $posOfExistingLoan     = $input['posOfExistingLoan1'];

            $grossProfit = ($latestFinancial1 + $previousFinancial1)/2;

            if($profession1  == 'D'){
                if($grossProfit > 2500000){
                    $multiplier = 4;
                }else{
                    $multiplier = 4;
                }
            }else{
                if($grossProfit > 2500000){
                    $multiplier = 2;
                }else{
                    $multiplier = 1.5;
                }
            }


            /* common calculation */
            $rateOfIntrest          = $input['rateOfIntrest']/100;
            $loanTenure             = $input['loanTenure'];
            $costOfProperty         = $input['costOfProperty'];
            $loanRequested          = $input['loanRequested'];

            if($costOfProperty < 3000000){
                $ltv = (float)0.9;
            }else if($costOfProperty > 3000000 && $costOfProperty <= 7500000){
                $ltv = (float)0.85;
            }else {
                $ltv = (float)0.8;
            }
            $marginPaid = 1 - $ltv;

            $x = pow((1+$rateOfIntrest/12),($loanTenure * 12));
            $y = pow((1+$rateOfIntrest/12),($loanTenure * 12))-1;
            $emi = (int)((100000*($rateOfIntrest/12))*$x/$y);

            $eligibleLoanAsPerProperty = $costOfProperty * $ltv;

            $eligibilityAsPerIncome = ($grossProfit * $multiplier) - $posOfExistingLoan;

            if($eligibleLoanAsPerProperty < $eligibilityAsPerIncome ){
                $marginPaidInAmount = $costOfProperty - $eligibleLoanAsPerProperty;
                $finalEligibility = $fmt->format($eligibleLoanAsPerProperty);
            }else {
                $marginPaidInAmount = $costOfProperty - $eligibilityAsPerIncome;
                $finalEligibility =$fmt->format( $eligibilityAsPerIncome);
            }

            $params = array('applicants'=> 1, 'profession' => $profession1 , 'emi' => $fmt->format($emi),  'multiplier' => $multiplier, 'eligibleLoanAsPerProperty' => $fmt->format($eligibleLoanAsPerProperty), 'grossProfit' => $fmt->format($grossProfit), 'posOfExistingLoan' => $fmt->format($posOfExistingLoan), 'marginPaidInAmount' => $fmt->format($marginPaidInAmount), 'eligibilityAsPerIncome' => $fmt->format($eligibilityAsPerIncome),'finalEligibility' => $finalEligibility);

        }

        if(isset($input['applicant2'])){
           /* these are the details of applicant 1 */
           $profession1            = $input['profession1'];
           $experience1            = $input['experience1'];
           $latestFinancial1       = $input['latestFinancial1'];
           $previousFinancial1     = $input['previousFinancial1'];
           $posOfExistingLoan1      = $input['posOfExistingLoan1'];

           /* these are the details of applicant 2 */
           $profession2            = $input['profession2'];
           $experience2            = $input['experience2'];
           $latestFinancial2       = $input['latestFinancial2'];
           $previousFinancial2     = $input['previousFinancial2'];
           $posOfExistingLoan2      = $input['posOfExistingLoan2'];

           $Financial1 = ($latestFinancial1 + $previousFinancial1)/2;
           $Financial2 = ($latestFinancial2 + $previousFinancial2)/2;

           $grossProfit =  $Financial1 + $Financial2;

           $posOfExistingLoan = $posOfExistingLoan2 + $posOfExistingLoan1;


           if($profession1  == 'D'){
                if($grossProfit > 2500000){
                    $multiplier = 4;
                }else{
                    $multiplier = 4;
                }
            }else{
                if($grossProfit > 2500000){
                    $multiplier = 2;
                }else{
                    $multiplier = 1.5;
                }
            }
            /* common calculation */
            $rateOfIntrest          = $input['rateOfIntrest']/100;
            $loanTenure             = $input['loanTenure'];
            $costOfProperty         = $input['costOfProperty'];
            $loanRequested          = $input['loanRequested'];

            if($costOfProperty < 3000000){
                $ltv = (float)0.9;
            }else if($costOfProperty > 3000000 && $costOfProperty <= 7500000){
                $ltv = (float)0.85;
            }else {
                $ltv = (float)0.8;
            }
            $marginPaid = 1 - $ltv;

            $x = pow((1+$rateOfIntrest/12),($loanTenure * 12));
            $y = pow((1+$rateOfIntrest/12),($loanTenure * 12))-1;
            $emi = (int)((100000*($rateOfIntrest/12))*$x/$y);

            $eligibleLoanAsPerProperty = $costOfProperty * $ltv;

            $eligibilityAsPerIncome = ($grossProfit * $multiplier) - $posOfExistingLoan;

            if($eligibleLoanAsPerProperty < $eligibilityAsPerIncome ){
                $marginPaidInAmount = $costOfProperty - $eligibleLoanAsPerProperty;
                $finalEligibility = $fmt->format($eligibleLoanAsPerProperty);
            }else {
                $marginPaidInAmount = $costOfProperty - $eligibilityAsPerIncome;
                $finalEligibility =$fmt->format( $eligibilityAsPerIncome);
            }

            $params = array('applicants'=> 2, 'profession' => $profession1 , 'emi' => $fmt->format($emi),  'multiplier' => $multiplier, 'eligibleLoanAsPerProperty' => $fmt->format($eligibleLoanAsPerProperty), 'grossProfit' => $fmt->format($grossProfit), 'posOfExistingLoan' => $fmt->format($posOfExistingLoan), 'marginPaidInAmount' => $fmt->format($marginPaidInAmount), 'eligibilityAsPerIncome' => $fmt->format($eligibilityAsPerIncome),'finalEligibility' => $finalEligibility);


        }

        if(isset($input['applicant2'])){
            /* these are the details of applicant 1 */
            $profession1            = $input['profession1'];
            $experience1            = $input['experience1'];
            $latestFinancial1       = $input['latestFinancial1'];
            $previousFinancial1     = $input['previousFinancial1'];
            $posOfExistingLoan1      = $input['posOfExistingLoan1'];

            /* these are the details of applicant 2 */
            $profession2            = $input['profession2'];
            $experience2            = $input['experience2'];
            $latestFinancial2       = $input['latestFinancial2'];
            $previousFinancial2     = $input['previousFinancial2'];
            $posOfExistingLoan2      = $input['posOfExistingLoan2'];

            /* these are the details of applicant 3 */
            $profession3            = $input['profession3'];
            $experience3            = $input['experience3'];
            $latestFinancial3       = $input['latestFinancial3'];
            $previousFinancial3     = $input['previousFinancial3'];
            $posOfExistingLoan3     = $input['posOfExistingLoan3'];

            $Financial1 = ($latestFinancial1 + $previousFinancial1)/2;
            $Financial2 = ($latestFinancial2 + $previousFinancial2)/2;
            $Financial3 = ($latestFinancial3 + $previousFinancial3)/2;


            $grossProfit =  $Financial1 + $Financial2 + $Financial3;

            $posOfExistingLoan = $posOfExistingLoan2 + $posOfExistingLoan1 + $posOfExistingLoan3;


            if($profession1  == 'D'){
                 if($grossProfit > 2500000){
                     $multiplier = 4;
                 }else{
                     $multiplier = 4;
                 }
             }else{
                 if($grossProfit > 2500000){
                     $multiplier = 2;
                 }else{
                     $multiplier = 1.5;
                 }
             }
             /* common calculation */
             $rateOfIntrest          = $input['rateOfIntrest']/100;
             $loanTenure             = $input['loanTenure'];
             $costOfProperty         = $input['costOfProperty'];
             $loanRequested          = $input['loanRequested'];

             if($costOfProperty < 3000000){
                 $ltv = (float)0.9;
             }else if($costOfProperty > 3000000 && $costOfProperty <= 7500000){
                 $ltv = (float)0.85;
             }else {
                 $ltv = (float)0.8;
             }
             $marginPaid = 1 - $ltv;

             $x = pow((1+$rateOfIntrest/12),($loanTenure * 12));
             $y = pow((1+$rateOfIntrest/12),($loanTenure * 12))-1;
             $emi = (int)((100000*($rateOfIntrest/12))*$x/$y);

             $eligibleLoanAsPerProperty = $costOfProperty * $ltv;

             $eligibilityAsPerIncome = ($grossProfit * $multiplier) - $posOfExistingLoan;

             if($eligibleLoanAsPerProperty < $eligibilityAsPerIncome ){
                 $marginPaidInAmount = $costOfProperty - $eligibleLoanAsPerProperty;
                 $finalEligibility = $fmt->format($eligibleLoanAsPerProperty);
             }else {
                 $marginPaidInAmount = $costOfProperty - $eligibilityAsPerIncome;
                 $finalEligibility =$fmt->format( $eligibilityAsPerIncome);
             }

             $params = array('applicants'=> 3, 'profession' => $profession1 , 'emi' => $fmt->format($emi),  'multiplier' => $multiplier, 'eligibleLoanAsPerProperty' => $fmt->format($eligibleLoanAsPerProperty), 'grossProfit' => $fmt->format($grossProfit), 'posOfExistingLoan' => $fmt->format($posOfExistingLoan), 'marginPaidInAmount' => $fmt->format($marginPaidInAmount), 'eligibilityAsPerIncome' => $fmt->format($eligibilityAsPerIncome),'finalEligibility' => $finalEligibility);


         }
        // dd($params);

        return view('back-office.eligibilities.professionalSelfEmployeeEligibility', compact('params'));
    }


}
