<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Builder;
use App\Model\BuilderDetail;

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
        $request->validate([
                'builder_name'=>'required',
                'project_name'=>'required',
                'project_type'=>'required',
                'type_name'=>'required'
               
        ]);

        $builder = new Builder();
        $builder->builder_name = $request->builder_name;
        $builder->project_name = $request->project_name;
        $builder->save();

        $project_types = $request->project_type;
        if($project_types){
            foreach($project_types as $key => $project_type){

                $builder_details  = new BuilderDetail();
                $builder_details->builder_id = $builder->id;
                $builder_details->project_type = $project_type;
                $builder_details->project_type_name  =  $request->type_name[$key];
                $builder_details->range   = $request->range[$key];
                $builder_details->spoc_name = $request->spoc_name[$key];
                $builder_details->spoc_mobile = $request->spoc_mobile[$key];
                $builder_details->spoc_email = $request->spoc_email[$key];
                $builder_details->save();
            }
        }
        
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
        
        $request->validate([
            'builder_name'=>'required',
            'project_name'=>'required',
            'project_type'=>'required',
            'type_name'=>'required'
        ]);
     
        $builder = Builder::find($id);
        $builder->builder_name = $request->builder_name;
        $builder->project_name = $request->project_name;
        $builder->save();
        $project_type = $request->project_type;
        if($project_type){
            BuilderDetail::where('builder_id','=',$builder->id)->delete();
            foreach($project_type as $key => $project){
                 $detail = new BuilderDetail();
                 $detail->builder_id= $builder->id;
                 $detail->project_type = $request->project_type[$key];
                 $detail->project_type_name = $request->type_name[$key];
                 $detail->range = $request->range[$key];
                 $detail->spoc_name = $request->spoc_name[$key];
                 $detail->spoc_mobile = $request->spoc_mobile[$key];
                 $detail->spoc_email = $request->spoc_email[$key];
                 $detail->save();
            }
        }
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
        $builder_details = BuilderDetail::where('builder_id','=',$builder->id)->delete();
        $builder->delete();
        return redirect('back-office/builders');
    }

    public function getProject(Request $request){

        $project = Builder::find($request->builder_id)->project_name;
        $msg = [
            'status'=>1,
            'data'=> $project
        ];
        return response()->json($msg);

    }

    public function fetchProjects(Request $request){

        $id = $request->builder_id;
        $projects = BuilderDetail::where('builder_id','=',$id)->get();
        if($projects){
            $result = '<select name="project_name" id="project_name">
                            <option value="">Select Project</option>
                      ';
          
            foreach($projects as $project){
                  $result .='<option value="'.$id.'">'.$project->project_type_name.'</option>';
            }
            $result .= '</select>';
        }
        // echo $result;
        $msg = [
            'status'=>1,
            'data'=> $result
        ];
        return response()->json($msg);


    }
}
