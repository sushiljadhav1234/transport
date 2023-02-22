<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\mst_client_contact_details;
use App\Models\Mst_clients;
use App\Models\TblJob;
use App\Models\Tbl_quote_request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Carbon;

class ClientController extends Controller
{
    //
    public function index()
    {
        return view('client.index');
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {

            $data = Mst_clients::with('user')->get();


            //dd($user);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    //  href="{{ route('reset.password.get',['token'=>$token,'email'=>$email]) }}"
                    $id = Crypt::encryptString($row->id);
                    $route = route('client.edit', ['id' => $row->id]);
                    $route1 = route('client.details', ['id' => $row->id]);

                    $actionBtn = " <a  href=" . $route . " id='edit' class='btn btn-primary'>Edit</a> <a  href=" . $route1 . " id='details' class='btn btn-primary'>Details</a>";
                    return $actionBtn;
                })->editColumn('name', function ($data) {
                    return $data->client_name;
                })->editColumn('date', function ($data) {
                    return date("Y-m-d H:i:s", strtotime($data->created_on));
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function add()
    {
        return view('client.add');
    }
    public function store(Request $request)
    {

        if ($request->ajax()) {
            $client = $request->client_name;
            $client_name = Mst_clients::where('client_name', $client)->first();

            if (empty($client_name)) {
                $data = [
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'client_name' => $request->client_name,
                    'emailid' => $request->emailid,
                    'contactno' => $request->contactno,
                    'address_street' => $request->address_street,
                    'address_city' => $request->address_city,
                    'address_state' => $request->address_state,
                    'address_zip' => $request->address_zip,
                    'createdby' => Auth::user()->id,
                    'createdon' => carbon::now(),
                    'updatedby' => Auth::user()->id,
                    'updatedon' => carbon::now(),
                ];
                $clientstore = Mst_clients::create($data);

                return response()->json(['success' => 'client added successfully.', 'data' => $clientstore]);
            } else {
                return response()->json(['success' => 'client already.']);
            }
        }
    }
    public function details(Request $request)
    {
        if ($request->ajax()) {

            //dd($request->all());
            if (empty($request->row_id)) {
                $data = [
                    'client_id' => $request->client_id,
                    'name' => $request->contact_person_name,
                    'contactno' => $request->contact_person_phone,
                    'email' => $request->contact_person_email,
                    'isactive' => '1',
                    'createdby' => Auth::user()->id,
                    'createdon' => Carbon::now(),
                ];
                $data1 = mst_client_contact_details::create($data);
            } else {

                $client = $request->row_id;

                $data = [
                    'client_id' => $request->client_id,
                    'name' => $request->contact_person_name,
                    'contactno' => $request->contact_person_phone,
                    'email' => $request->contact_person_email,
                    'isactive' => '1',
                    'updatedby' => Auth::user()->id,
                    'updatedon' => carbon::now(),
                ];
                $data1 = mst_client_contact_details::where('id', $client)->update($data);
            }
            return response()->json(['success' => 'client added successfully.', 'data' => $data1]);
        }
    }
    public function edit($id)
    {
        $data = Mst_clients::with('clientdetails')->where('id', $id)->first();

        return view('client.edit', compact('data'));
    }

    public function update(Request $request)
    {

        if ($request->ajax()) {

            $client = $request->clientid;

            $data = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'client_name' => $request->client_name,
                'emailid' => $request->emailid,
                'contactno' => $request->contactno,
                'address_street' => $request->address_street,
                'address_city' => $request->address_city,
                'address_state' => $request->address_state,
                'address_zip' => $request->address_zip,
                'createdby' => Auth::user()->id,
                'createdon' => carbon::now(),
                'updatedby' => Auth::user()->id,
                'updatedon' => carbon::now(),
            ];
            $clientstore = Mst_clients::where('id', $client)->update($data);

            return response()->json(['success' => 'client updated successfully.']);
        }
    }

    public function fetch_details(Request $request)
    {
        if ($request->ajax()) {
            $client_id = $request->client_id;
            $resultreason = mst_client_contact_details::where('client_id', $client_id)->get();

            $return = '';
            if (count($resultreason) > 0) {
                foreach ($resultreason as $rowreason) {

                    $return .= '<tr>';
                    $return .= '<td>';
                    $return .= $rowreason['name'];
                    $return .= '</td>';
                    $return .= '<td>';
                    $return .= $rowreason['contactno'];
                    $return .= '</td>';
                    $return .= '<td>';
                    $return .= $rowreason['email'];
                    $return .= '</td>';
                    $return .= '<td>';
                    if ($rowreason['isactive'] == '1') {
                        $return .= "Active";
                    } else {
                        $return .= "Not Active";
                    }
                    $return .= '</td>';
                    $return .= '<td>';
                    $return .= '<button type="submit" onclick="setrowdata(' . $rowreason['id'] . ');" class="btn btn-primary my-1">Edit</button>';
                    $return .= '</td>';
                    $return .= '</tr>';
                }
            } else {
                $return .= '<tr style="text-align:center">';
                $return .= '<td colspan="5">';
                $return .= 'No Data Found';
                $return .= '</td>';
                $return .= '</tr>';
            }
            echo $return;
        }
    }
    public function fetchdetails(Request $request)
    {
        if ($request->ajax()) {
            $client_id = $request->client_id;
            $resultreason = mst_client_contact_details::where('client_id', $client_id)->get();

            $return = '';
            if (count($resultreason) > 0) {
                foreach ($resultreason as $rowreason) {

                    $return .= '<tr>';
                    $return .= '<td>';
                    $return .= $rowreason['name'];
                    $return .= '</td>';
                    $return .= '<td>';
                    $return .= $rowreason['contactno'];
                    $return .= '</td>';
                    $return .= '<td>';
                    $return .= $rowreason['email'];
                    $return .= '</td>';

                    $return .= '</tr>';
                }
            } else {
                $return .= '<tr style="text-align:center">';
                $return .= '<td colspan="5">';
                $return .= 'No Data Found';
                $return .= '</td>';
                $return .= '</tr>';
            }
            echo $return;
        }
    }

    public function get_details(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id;

            $resultreason = mst_client_contact_details::where('id', $id)->get();

            $return = '';
            if (count($resultreason) > 0) {
                foreach ($resultreason as $rowreason) {

                    echo json_encode(array_map('utf8_encode', array(
                        'exists' => '1',
                        'id' => $rowreason['id'],
                        'client_id' => $rowreason['client_id'],
                        'name' => $rowreason['name'],
                        'contactno' => $rowreason['contactno'],
                        'email' => $rowreason['email'],
                        'isactive' => $rowreason['isactive']
                    )));
                }
            }
        }
    }

    public function detailsview($id)
    {
        $data = Mst_clients::where('id', $id)->first();
        return view('client.details', compact('data'));
    }


    public function archieve(Request $request)
    {
        if ($request->ajax()) {
            // dd($request->all())
            //$request->id
            $data = TblJob::with('client')->where('client_id', '=', $request->id)->where('job_final_status', 'OPEN')->get();

            //$data = TblJob::get();

            //  dd(123,$data);
            return DataTables::of($data)
                ->addIndexColumn()
                /*  ->editColumn('name', function ($data) {
                    return $data->client['client_name'] . ',' . date("Y-m-d", strtotime($data->client['created_on'])) ?? '';
                })*/
                ->editColumn('jobstage', function ($data) {
                    return $data->job_stage ?? '';
                })
                ->editColumn('wine_volume', function ($data) {
                    return $data->wine_volume_type ?? '';
                })
                ->editColumn('unit', function ($data) {
                    return $data->units ?? '';
                })
                ->make(true);
        }
    }

    public function client_quote_list(Request $request)
    {
        if ($request->ajax()) {
            $data = Tbl_quote_request::get()/* ->toArray() */;

            if (($request['search']['value']) != null) {
                // DB::enableQueryLog();
                $data = Tbl_quote_request::where('units', 'LIKE', '%' . $request['search']['value'] . '%')
                    ->orwhere('who_pack', 'LIKE', '%' . $request['search']['value'] . '%')
                    ->orwhere('pickup_street', 'LIKE', '%' . $request['search']['value'] . '%')
                    ->orwhere('delivery_street', 'LIKE', '%' . $request['search']['value'] . '%')
                    ->orwhere('hopping_for_pickup', 'LIKE', '%' . $request['search']['value'] . '%')
                    // ->orderBy($request['order'][0]['column'], $request['order'][0]['dir'])
                    ->get();
                // dd(DB::getQueryLog());
                // dd($data->toArray());
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = " <a  href='#' class='btn btn-primary'>Edit</a>";
                    return $actionBtn;
                })->editColumn('quote', function ($data) {
                    $actionBtn1 = " <a  href='#' class='btn btn-primary' style='margin-left:5px'>Work on Quote</a>";
                    return $actionBtn1;
                })->editColumn('archive', function ($data) {
                    $actionBtn2 = " <a  href='#' class='btn btn-danger' style='margin-left:5px'>Work on Archive</a>";
                    return $actionBtn2;
                })
                ->rawColumns(['action', 'quote', 'archive'])
                ->make(true);
        }
    }
}
