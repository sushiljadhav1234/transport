<?php

namespace App\Http\Controllers;


use Carbon\Carbon;

use App\Models\User;
use App\Models\Warehouses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Crypt;



class UserController extends Controller
{
    //
    public function index(){
        // $user= Warehouses::with('user')->get();
        // dd($user);
        return view('users.index');
    }

    public function list(Request $request){
       
        if ($request->ajax()) {
        
            $data= User::with('warehouse')->withTrashed()->get();
            //dd($data->toArray());
           
            //dd($user);
            return DataTables::of($data)
            ->addIndexColumn()
                ->addColumn('action', function($row){
                    //  href="{{ route('reset.password.get',['token'=>$token,'email'=>$email]) }}"
                   $id = Crypt::encryptString($row->id);
                    $route= route('user.edit',['id'=> $id]);
                    
                    $actionBtn =" <a  href=$route id='edit' class='btn btn-primary'>Edit</a>";
                    return $actionBtn;
                }) ->editColumn('name', function ($data) {
                    return $data->first_name.' '. $data->last_name;
                    
                })->editColumn('user', function ($user){
                    $user1 = User::where('id', $user->createdby)->first();
                    return $user1->first_name.' '. $user1->last_name;
                })->editColumn('date', function ($data) {
                    return date("Y-m-d H:i:s", strtotime($data->created_at));
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function add(){
        $warehouse = Warehouses::all();
        return view('users.add',['warehouse'=>$warehouse]);
    }
    Public function store(Request $request){
       
        $warehouse='';
        if(!empty($request->warehouse_id)){
            $warehouse= $request->warehouse_id;
        }
       
        if($request->has('isdeleted')){
            $date= Carbon::now();
        }
       
        $data =[
            'first_name'=>$request->first_name,
            'last_name' =>$request->last_name,
            'emailid' =>$request->emailid,
            'contactno'=>$request->contactno,
            'warehouse_id'=>$warehouse,
            'user_type'=>$request->usertype,
            'password'=>Crypt::encryptString($request->password),
            'createdby'=>Auth::user()->id,
            'updatedby'=>Auth::user()->id,
            'deleted_at'=>$request->has('isdeleted')?$date:NULL,
        ];
        User::create($data);
        return back();
    }

    public function getUser($id){
        $id = Crypt::decryptString($id);
        // dd($id);
        $warehouse = Warehouses::all();
        $user =User::where('id', $id)->withTrashed()->first();
        return view('users.edit',['user'=>$user, 'warehouse'=>$warehouse]);
    }

    public function updateUser(Request $request){
        
        
        $warehouse='';
        if(!empty($request->warehouse_id)){
            $warehouse= $request->warehouse_id;
        }
       
        if($request->has('isdeleted')){
            $date= Carbon::now();
        }
       
        $data =[
            'first_name'=>$request->first_name,
            'last_name' =>$request->last_name,
            'emailid' =>$request->emailid,
            'contactno'=>$request->contactno,
            'warehouse_id'=>$warehouse,
            'user_type'=>$request->usertype,
            'password'=>Crypt::encryptString($request->password),
            // 'createdby'=>Auth::user()->id,
            'updatedby'=>Auth::user()->id,
            'deleted_at'=>$request->has('isdeleted')?$date:NULL,
        ];
        User::where('id', $request->id)->withTrashed()->update($data);
        return back();

    }
}
