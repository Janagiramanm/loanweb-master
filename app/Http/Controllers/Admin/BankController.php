<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Bank;
use App\Model\Occupation;
use App\Model\CibilSetting;
use App\Model\CibilDetail;

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

        $request->validate([
            'bank_name' => 'required|unique:bank,bank_name',
                      
        ]);
        $input = $request->all();


        // echo '<pre>';
        // print_r($input);
        // exit;
        $occupation_id = $input['occupation_id'];

        $bank = new Bank();
        $bank->bank_name = $input['bank_name'];
        $bank->foir = null;
        $bank->ltv1 = $input['ltv1'];
        $bank->ltv2 = $input['ltv2'];
        $bank->ltv3 = $input['ltv3'];
        $bank->save();

        $inputArray = ['foir','cibil1','min-roi','max-roi','cibil2','min-roi2','max-roi2','cibil3','min-roi3','max-roi3','cibil4','min-roi4','max-roi4'];
        
        if($occupation_id){

                foreach($occupation_id as $key1 => $value){
                    $cibil = new CibilSetting();
                    $cibil->bank_id = $bank->id;
                    $cibil->occupation_id = $value;
                    $cibil->save();
                    foreach($inputArray as $key=> $inputField){
                        //    print_r($input[$inputField.'_'.$key1][0]);
                        $cibilDetails = new CibilDetail();
                        
                        $cibilDetails->cibil_setting_id = $cibil->id;
                        $cibilDetails->name = $inputField;
                        $cibilDetails->ltv1 = $input[$inputField.'_'.$key1][0];
                        $cibilDetails->ltv2 = $input[$inputField.'_'.$key1][1];
                        $cibilDetails->ltv3 = $input[$inputField.'_'.$key1][2];
                        $cibilDetails->save();
                    }
                }

        }
        return redirect(route('back-office.banks'))->with('success','Bank Added Successfully');
    }

    public function edit(Request $request, $id)
    {
        $occupations = Occupation::all();
        $bank = Bank::find($id);
        return view('back-office.bank.edit', compact(['bank','occupations']));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bank_name' => 'required|unique:bank,bank_name,'.$id,
                      
        ]);
        $input = $request->all();
        // echo '<pre>';
        // print_r($input);
        // exit;  
        // echo "==========="; 

        $bank = Bank::find($id);
        $bank->bank_name = $input['bank_name'];
        $bank->foir = null;
        $bank->ltv1 = $input['ltv1'];
        $bank->ltv2 = $input['ltv2'];
        $bank->ltv3 = $input['ltv3'];
        $bank->save();

        $occupation_id = $input['occupation_id'];
        $inputArray = ['foir','cibil1','min-roi','max-roi','cibil2','min-roi2','max-roi2','cibil3','min-roi3','max-roi3','cibil4','min-roi4','max-roi4'];
           
        if($occupation_id){

                foreach($occupation_id as $key1 => $value){
                            if(isset($input['old_cibil_setting_id'][$key1])){
                                    $cibil = CibilSetting::find($input['old_cibil_setting_id'][$key1]);
                            }else{
                                $cibil = new CibilSetting();
                            }
                            $cibil->bank_id = $id;
                            $cibil->occupation_id = $value;
                            $cibil->save();
                            foreach($inputArray as $key=> $inputField){
                                if(isset($input['old_'.$inputField.'_'.$key1])){
                                    $cibilDetails = CibilDetail::find($input['old_'.$inputField.'_'.$key1]);
                                }else{
                                    $cibilDetails = new CibilDetail();
                                }
                                
                                    $cibilDetails->cibil_setting_id = $cibil->id;
                                    $cibilDetails->name = $inputField;
                                    $cibilDetails->ltv1 = $input[$inputField.'_'.$key1][0];
                                    $cibilDetails->ltv2 = $input[$inputField.'_'.$key1][1];
                                    $cibilDetails->ltv3 = $input[$inputField.'_'.$key1][2];
                                    $cibilDetails->save();
                               
                            }
                  
                }

        }
        $delete_occupation=array_diff($input['old_occupation'],$input['occupation_id']);
        if($delete_occupation){
            foreach($delete_occupation as $del_occupationid){
                $del_cibil_setting = CibilSetting::find($del_occupationid);
                $del_cibil_detail[] =  $del_cibil_setting->id;
                $del_cibil_setting->delete();
            }
            if($del_cibil_detail){
                foreach($del_cibil_detail as $detail_id){
                    $cibilDetails = CibilDetail::where('cibil_setting_id','=',$detail_id)->get();
                    foreach($cibilDetails as $cibilDetail){
                        CibilDetail::find($cibilDetail->id)->delete();
                    }
                }
            }
        }
        return redirect(route('back-office.banks'))->with('success','Bank updated successfully');

    }

    public function destroy(Request $request, Bank $bank_id)
    {
        Bank::where('id', '=', $bank_id->id)->delete();
        return redirect(route('back-office.banks'))->with('success','Bank deleted successfully');
    }

    public function addMoreCibil(Request $request){

        $id = $request->incVal;
        $occupations = Occupation::all();
        $result = ' <div class="cibil-for-occupation">
        <div class="field-group">
             <div class="form-row">
                 <div class="form-group col-md-6">
                         <label for="occupation_id">Occupation</label>
                         <select name="occupation_id[]" id="occupation_id'.$id.'" class="form-control" required>
                             <option value="">Select Occupation</option>';
                             foreach($occupations as $occupation){
                                $result .='<option value="'.$occupation->id.'">'.$occupation->occupation_name.'</option>';         
                             }
        $result .='</select>
                 </div>
             </div>
             <div class="form-row">
                     <table class="table">
                         <tr>
                             <th>Name</th>
                             <th>LTV1</th>
                             <th>LTV2</th>
                             <th>LTV3</th>
                         </tr>
                         <tr>
                             <td>FOIR</td>
                             <td><input type="text" name="foir_'.$id.'[]"  /></td>
                             <td><input type="text" name="foir_'.$id.'[]"  /></td>
                             <td><input type="text" name="foir_'.$id.'[]"  /></td>
                         </tr>
                         <tr>
                             <td>CIBIL1</td>
                             <td><input type="text" name="cibil1_'.$id.'[]"  /></td>
                             <td><input type="text" name="cibil1_'.$id.'[]"  /></td>
                             <td><input type="text" name="cibil1_'.$id.'[]"  /></td>
                         </tr>
                         <tr>
                             <td>min roi (cibil 1)</td>
                             <td><input type="text" name="min-roi_'.$id.'[]"  /></td>
                             <td><input type="text" name="min-roi_'.$id.'[]"  /></td>
                             <td><input type="text" name="min-roi_'.$id.'[]"  /></td>
                         </tr>
                         <tr>
                             <td>max roi (cibil 1)</td>
                             <td><input type="text" name="max-roi_'.$id.'[]"  /></td>
                             <td><input type="text" name="max-roi_'.$id.'[]"  /></td>
                             <td><input type="text" name="max-roi_'.$id.'[]"  /></td>
                         </tr>
                         <tr>
                             <td>CIBIL2</td>
                             <td><input type="text" name="cibil2_'.$id.'[]"  /></td>
                             <td><input type="text" name="cibil2_'.$id.'[]"  /></td>
                             <td><input type="text" name="cibil2_'.$id.'[]"  /></td>
                         </tr>
                         <tr>
                             <td>min roi (cibil 2)</td>
                             <td><input type="text" name="min-roi2_'.$id.'[]"  /></td>
                             <td><input type="text" name="min-roi2_'.$id.'[]"  /></td>
                             <td><input type="text" name="min-roi2_'.$id.'[]"  /></td>
                         </tr>
                         <tr>
                             <td>max roi (cibil 2)</td>
                             <td><input type="text" name="max-roi2_'.$id.'[]"  /></td>
                             <td><input type="text" name="max-roi2_'.$id.'[]"  /></td>
                             <td><input type="text" name="max-roi2_'.$id.'[]"  /></td>
                         </tr>
                         <tr>
                             <td>CIBIL3</td>
                             <td><input type="text" name="cibil3_'.$id.'[]"  /></td>
                             <td><input type="text" name="cibil3_'.$id.'[]"  /></td>
                             <td><input type="text" name="cibil3_'.$id.'[]"  /></td>
                         </tr>
                         <tr>
                             <td>min roi (cibil 3)</td>
                             <td><input type="text" name="min-roi3_'.$id.'[]"  /></td>
                             <td><input type="text" name="min-roi3_'.$id.'[]"  /></td>
                             <td><input type="text" name="min-roi3_'.$id.'[]"  /></td>
                         </tr>
                         <tr>
                             <td>max roi (cibil 3)</td>
                             <td><input type="text" name="max-roi3_'.$id.'[]"  /></td>
                             <td><input type="text" name="max-roi3_'.$id.'[]"  /></td>
                             <td><input type="text" name="max-roi3_'.$id.'[] "  /></td>
                         </tr>
                         <tr>
                             <td>CIBIL4</td>
                             <td><input type="text" name="cibil4_'.$id.'[]"  /></td>
                             <td><input type="text" name="cibil4_'.$id.'[]"  /></td>
                             <td><input type="text" name="cibil4_'.$id.'[]"  /></td>
                         </tr>
                         <tr>
                             <td>min roi (cibil 4)</td>
                             <td><input type="text" name="min-roi4_'.$id.'[]"  /></td>
                             <td><input type="text" name="min-roi4_'.$id.'[]"  /></td>
                             <td><input type="text" name="min-roi4_'.$id.'[]"  /></td>
                         </tr>
                         <tr>
                             <td>max roi (cibil 4)</td>
                             <td><input type="text" name="max-roi4_'.$id.'[]"  /></td>
                             <td><input type="text" name="max-roi4_'.$id.'[]"  /></td>
                             <td><input type="text" name="max-roi4_'.$id.'[] "  /></td>
                         </tr>
                     </table>
             </div>
         </div>
         <div class="remove-sec"><a href="javascript:void(0);" class="remove_button">Remove</a></div>
     </div>
     
     ';
     $msg =  array(
        'status'=>1,
        'data'=>$result,
       
    );
    return response()->json($msg);
    
    }
}
