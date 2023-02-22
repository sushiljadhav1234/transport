<?php

namespace App\Http\Controllers;

use App\Models\BusinessContactDetails;
use Carbon\Carbon;
use App\Models\TblJob;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\BusinessWarehouseDetail;

class WarehouseController extends Controller
{
    //

    public function index(){
        return view('warehouse.index');
    }

    public function list(Request $request){
        if($request->ajax()){
           $data =BusinessWarehouseDetail::with('business')->get(); 
           
           return DataTables::of($data)->addColumn('action', function ($row) {
            //  href="{{ route('reset.password.get',['token'=>$token,'email'=>$email]) }}"
            $id = $row->id;
            $route = route('warehouse.edit', ['id' => $row->id]);
            
            $actionBtn = " <a  href=" . $route . " id='edit' class='btn btn-primary'>Edit</a> <button id='btndeletebusiness' onclick='deletewarehouse($id)' class='btn btn-danger'><span class='icon-trash'></span></button>";
            return $actionBtn;
        })->rawColumns(['action'])
                
                ->make(true);
        }
    }

    public function edit($id){
        $data =BusinessWarehouseDetail::with('business')->where('id', $id)->first();
        return view('warehouse.edit',['data'=>$data]);
    }
    public function update(Request $request){
        if($request->ajax()){
            $data=[
                "warehouse_name"=>$request->warehouse_name,
                "warehouse_street"=>$request->warehouse_street,
                "warehouse_city"=>$request->warehouse_city,
                'warehouse_state'=>$request->warehouse_state,
                'warehouse_zip'=>$request->warehouse_zip,
                'warehouse_frieght'=>$request->warehouse_frieght,
                'updatedby'=>Auth::user()->id,
                'updatedon'=>Carbon::now(),
            ];
            $warehouse = BusinessWarehouseDetail::where('id', $request->id)->update($data);
            if($warehouse){
                
                return response()->json(['success' => 'Warehouse update successfully.']);
            }else{
                return response()->json(['error' => 'Warehouse update not successful.']);
            }
        }
    }

    public function delete(Request $request){
        if($request->ajax()){
          
          $resultdup =   DB::table('tbl_jobs')
          ->whereRaw('FIND_IN_SET('.$request->id.',job_sec2_interim_locations)'> 0)
          ->get();
          if(count($resultdup) > 0) {
                echo "Warehouse is mapped to job so you cannnot delete it.";
            }else
            {
                $resultcontactmap= BusinessContactDetails::
                $resultcontactmap = mysqli_query($con,"SELECT * FROM mst_business_contact_details WHERE warehouse = '$id' AND isdeleted = 0 ");
                if(mysqli_num_rows($resultcontactmap) > 0) {
                    echo "Warehouse is mapped to contact person so you cannnot delete it.";
                }
                else
                {
                    $resultinsert = 
                    $resultinsert =   mysqli_query($con,"UPDATE `mst_business_warehouse_details`
                                                        SET 
                                                        `isdeleted` = '1'
                                                        WHERE `id` = '$id';");
                    if($resultinsert)
                    {
                        echo "success";
                    }
                    else
                    {
                        echo "Error";
                    }
                }
        
         
            }
            
        }
    }
}
