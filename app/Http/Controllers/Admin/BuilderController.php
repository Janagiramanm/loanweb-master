<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Builder;

class BuilderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $banks = Bank::all();
        $builders = Builder::all();
        return view('back-office.builders.index',compact(['builders']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('back-office.builders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo '<pre>';
        // print_r($request->input());
        // exit;

        $request->validate([
                'builder_name'=>'required',
                'project_name'=>'required',
                'project_type'=>'required',
                'type_name'=>'required'
               
        ]);

       
        $builder = new Builder();
        $builder->builder_name = $request->builder_name;
        $builder->project_name = $request->project_name;
        $builder->project_type = $request->project_type;
        $builder->project_type_name  =  $request->type_name;
        $builder->range   = $request->range;
        $builder->spoc_name = $request->spoc_name;
        $builder->spoc_mobile = $request->spoc_mobile;
        $builder->spoc_email = $request->spoc_email;
        $builder->save();
        return redirect( route('back-office.builders.index'))->withSuccess('Builder added successfully!');
        

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
        $builder = Builder::find($id);
        return view('back-office.builders.edit',compact(['builder']));
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
        // echo '<pre>';
        // print_r($request->builder_name);
        // exit;
        $request->validate([
            'builder_name'=>'required',
            'project_name'=>'required',
            'project_type'=>'required',
            'type_name'=>'required'
        ]);
        $builder = Builder::find($id);
        $builder->builder_name = $request->builder_name;
        $builder->project_name = $request->project_name;
        $builder->project_type = $request->project_type;
        $builder->project_type_name  =  $request->type_name;
        $builder->range   = $request->range;
        $builder->spoc_name = $request->spoc_name;
        $builder->spoc_mobile = $request->spoc_mobile;
        $builder->spoc_email = $request->spoc_email;
        $builder->save();
        return redirect( route('back-office.builders.index'))->withSuccess('Builder added successfully!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $builder = Builder::find($id);
        $builder->delete();
        return redirect('back-office/builders');
    }
}
