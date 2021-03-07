<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\BankBranch;
use App\Model\Bank;


class BankBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = BankBranch::all();
        return view('back-office.branches.index',compact(['branches']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banks = Bank::all();
        return view('back-office.branches.create',compact(['banks']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   

        $request->validate([
             'bank_id' => 'required',
             'branch_name' => 'required',
             'address' => 'required',
             'locality' => 'required',
             'pincode' => 'required'
        ]);

        $branch = new BankBranch();
        $branch->bank_id = $request->bank_id;
        $branch->branch_name = $request->branch_name;
        $branch->address = $request->address;
        $branch->locality = $request->locality;
        $branch->pincode = $request->pincode;
        $branch->save();
        return redirect(route('back-office.branches.index'))->with('success','Branch has been Added Successfully');
      
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
        $branch = BankBranch::find($id);
        $banks = Bank::all();
        return view('back-office.branches.edit',compact(['branch','banks']));
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
        $request->validate([
            'bank_id' => 'required',
            'branch_name' => 'required',
            'address' => 'required',
            'locality' => 'required',
            'pincode' => 'required'
       ]);

       $branch = BankBranch::find($id);
       $branch->bank_id = $request->bank_id;
       $branch->branch_name = $request->branch_name;
       $branch->address = $request->address;
       $branch->locality = $request->locality;
       $branch->pincode = $request->pincode;
       $branch->save();
       return redirect(route('back-office.branches.index'))->with('success','Branch has been Updated Successfully');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $branch = BankBranch::find($id);
         $branch->delete();
         return redirect(route('back-office.branches.index'))->with('success','Branch has been deleted Successfully');

    }

    public function getBranchData(Request $request){
         
        $branches = BankBranch::where('bank_id','=', $request->bank_id)->get();
        if($branches){
            $result = '<select name="branch_name" id="branch_name" >
                          <option value=""> Select Branch</option>';
                        foreach($branches as $key => $branch){
                            $result .= '<option value="'.$branch->id.'">'.$branch->branch_name.'</option>';
                        }
            $result . '</select>';
            $msg = [
                'status' => 1,
                'data' => $result
            ];
            return response()->json($msg);
        }
        $msg = [
            'status' => 0,
            'data' => 'No data found'
        ];
        return response()->json($msg);
    }
}
