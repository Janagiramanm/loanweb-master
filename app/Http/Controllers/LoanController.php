<?php

namespace App\Http\Controllers;

use App\Customer;
use App\LoanApplication;
use Illuminate\Http\Request;
use App\Model\ApplicationStatus;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apply()
    {
        return view('apply');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function submit(Request $request)
    {
        // $input = $request->all();
        // dd($input);
        $customer = new Customer();
        $application_id                 = uniqid();
        $customer->applicationno        = $application_id;
        $customer->cust_name            = $request->input('cust_name');
        $customer->cust_email           = $request->input('cust_email');
        $customer->cust_phone           = $request->input('cust_phone');
        $customer->cust_address         = $request->input('cust_address');
        $customer->cust_city            = $request->input('cust_city');
        $customer->cust_pincode         = $request->input('cust_pincode');
        $customer->property_cost        = $request->input('loan_amount');
        $customer->application_status   = 1;

        $customer->save();

        return view('success')->with("app_id", $application_id );
    }

    public function statuscheckAjax(Request $request)
    {
        $input = $request->all();

        // dd($input);

        $customers = Customer::where('applicationno', '=', $input['apId'])->get();


        if(isset($customers[0])){
            $ap_status = ApplicationStatus::where('id', $customers[0]->application_status)->select('status')->get();
            $success = "Applciation Status: ".$ap_status[0]->status;
            return json_encode($success);

        }else{
            $error = "Not a valid Application Id";
            return json_encode($error);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
