<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Bank;
use App\Model\Occupation;

class BankController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $banks = Bank::all();
        return view('back-office.bank.index', compact('banks') );
    }

    public function create()
    {
        $occupations = Occupation::all();
        return view('back-office.bank.create',compact(['occupations']));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $path_url = Config('app.url');

        if ($input['bank_logo']) {
            $image = $input['bank_logo'];
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('/uploads/bank_logos/');
            $image->move($destinationPath, $name);
            $image = "/uploads/bank_logos/".$name;
            $input['bank_logo'] = $image;
        }

        $bank = Bank::create($input);
        return redirect(route('back-office.banks'))->with('success','Image Upload successfully');
    }

    public function edit(Request $request, Bank $bank_id)
    {
        return view('back-office.bank.edit', compact('bank_id'));
    }

    public function update(Request $request, Bank $bank_id)
    {
        $input = $request->all();
        if(isset($input['bank_logo'])){
            $image = $input['bank_logo'];
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('/uploads/bank_logos/');
            $image->move($destinationPath, $name);
            $image = "/uploads/bank_logos/".$name;


            Bank::where('id', '=', $bank_id->id)->update([
                'bank_name'         => $request->bank_name,
                'bank_branch'       => $request->bank_branch,
                'rate_of_interest'  => $request->rate_of_interest,
                'bank_address'      => $request->bank_address,
                'bank_logo'         => $image
            ]);
            return redirect(route('back-office.banks'))->with('success','Bank updated  successfully');

        }else{
            Bank::where('id', '=', $bank_id->id)->update([
                'bank_name'         => $request->bank_name,
                'bank_branch'       => $request->bank_branch,
                'rate_of_interest'  => $request->rate_of_interest,
                'bank_address'      => $request->bank_address,
                'bank_logo'         => $request->bank_logo_old,
            ]);

            return redirect(route('back-office.banks'))->with('success','Bank updated successfully');

        }

    }

    public function destroy(Request $request, Bank $bank_id)
    {
        Bank::where('id', '=', $bank_id->id)->delete();
        return redirect(route('back-office.banks'))->with('success','Bank deleted successfully');
    }
}
