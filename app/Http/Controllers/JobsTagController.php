<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Jobstag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class JobsTagController extends Controller
{
    //
    public function index(){
        return view('jobstag.index');
    }

    public function list(Request $request){
        if ($request->ajax()) {

            $data = Jobstag::all();

            
            //dd($user);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    //  href="{{ route('reset.password.get',['token'=>$token,'email'=>$email]) }}"
                    // $id = Crypt::encryptString($row->id);
                     $route = route('jobstag.edit', ['id' => $row->id]);

                    $actionBtn = " <a  href=" .$route." class='btn btn-primary'>Edit</a> ";
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        } 
    }

    public function add(){
        return view('jobstag.add');
    }
    public function store(Request $request){
        
        $request->validate(
        [
            'tagname' => 'required|unique:mst_jobtags,tagname'
            
        ]);
        $data =[
            "tagname"=>$request->tagname,
            "createdon"=>Carbon::now(),
            'createdby'=>Auth::user()->id,
        ];
         Jobstag::create($data);
        return back()->with('success','Jobstag added sucessfully');
    }
    public function edit($id){
        $data = Jobstag::where('id', $id)->first();
        return view('jobstag.edit', compact('data'));
    }
    public function update(Request $request){
        
        $id = $request->id;
        $data =[
            "tagname"=>$request->tagname,
            "updatedon"=>Carbon::now(),
            'updatedby'=>Auth::user()->id,
        ];
         Jobstag::where('id',$id)->update($data);
        return back()->with('success','Jobstag update sucessfully');
    }
}
