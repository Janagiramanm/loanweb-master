<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\ApplicationStatus;

class ApplicationStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // dd("hi");
        $statuses = ApplicationStatus::all();
        // dd($statuses);
        return view('back-office.applicationstatus.index', compact('statuses'));
    }

    public function create()
    {

        return view('back-office.applicationstatus.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $status = ApplicationStatus::create($input);
        return redirect(route('back-office.applicationstatus'))->with('success','Status Upload successfully');
    }

    public function edit(Request $request, ApplicationStatus $status)
    {
        return view('back-office.applicationstatus.edit', compact('status'));
    }

    public function update(Request $request, ApplicationStatus $status)
    {
        ApplicationStatus::where('id', '=', $status->id)->update([
            'status'     => $request->status,
        ]);
        return redirect(route('back-office.applicationstatus'))->with('success','Status updated  successfully');
    }

    public function destroy(Request $request, ApplicationStatus $status)
    {
        ApplicationStatus::where('id', '=', $status->id)->delete();
        return redirect(route('back-office.applicationstatus'))->with('success','Status deleted successfully');
    }
}
