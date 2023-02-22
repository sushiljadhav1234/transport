<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Mst_clients;
use Illuminate\Http\Request;
use App\Models\Tbl_quote_request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;
use App\Models\mst_client_contact_details;
use App\Models\Mst_business_warehouse_details;

date_default_timezone_set('Asia/Calcutta');

class ClientController extends Controller
{
    //
    public function index()
    {
        return view('client.index');
    }

    //my work
    public function add_quote_request()
    {
        $data1 = Mst_clients::orderByRaw("first_name ASC, last_name ASC")->get();
        $data2 = Mst_business_warehouse_details::where("isdeleted", "0")->orderBy("warehouse_name", "ASC")->get();
        // dd($data1->toArray());
        return view('client.add_quote_request', compact('data1', 'data2'));
    }

    public function submit_quote_request(Request $request)
    {
        $data = [
            'client_id' => $request->clientid,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'wine_volume_type' => $request->wine_volume_type,
            'units' => $request->units,
            'do_hv_lrg_frmt_botlles' => $request->do_hv_lrg_frmt_botlles,
            'do_hv_lrg_frmt_botlles_details' => $request->do_hv_lrg_frmt_botlles_details,
            'declared_value_of_wine' => $request->declared_value_of_wine,
            'hopping_for_pickup' => $request->hopping_for_pickup,
            'who_pack' => $request->who_pack,
            'pickup_street' => trim($request->pickup_street),
            'pickup_city' => trim($request->pickup_city),
            'pickup_state' => $request->pickup_state,
            'pickup_zip' => $request->pickup_zip,
            'pickup_location_type' => $request->pickup_location_type,
            'pickup_access_info' => $request->pickup_access_info,
            'delivery_street' => trim($request->delivery_street),
            'delivery_city' => trim($request->delivery_city),
            'delivery_state' => $request->delivery_state,
            'delivery_zip' => $request->delivery_zip,
            'delivery_location_type' => $request->delivery_location_type,
            'delivery_access_info' => $request->delivery_access_info,
            'need_interim_storage' => $request->need_interim_storage,
            'need_interim_storage_details' => $request->need_interim_storage_details,
            'notes' => $request->notes,
            'final_remarks' => "",
            'createdby' => Auth::id(),
            'createdon' => date('Y-m-d H:i:s'),
        ];
        $result = Tbl_quote_request::create($data);
        if (!empty($result) && is_array($result)) {
            return response()->json(['success' => 'Quote request Added Successfully.', 'data' => $result['id']]);
        } else {
            return response()->json(['success' => 'error']);
        }
    }

    public function quote_calculate(Request $request)
    {
        if (isset($request->clientid)) {
            return response()->json(['success' => 'success']);
        } else {
            $exist = Mst_clients::where('emailid', $request->email)->first();
            if ($exist) {
                return response()->json(['success' => "Client name " . $exist->client_name . " with email " . $request->email . " already exists in system. System will automaticaly map the client with this quote."]);
            } else {
                return response()->json(['success' => 'success']);
            }
        }
    }
    //end my work

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

    public function client_quote_list(Request $request)
    {
        if ($request->ajax()) {
            $data = Tbl_quote_request::get()/* ->toArray() */;

            // if (($request['search']['value']) != null) {
            //     // DB::enableQueryLog();
            //     $data = Tbl_quote_request::where('units', 'LIKE', '%' . $request['search']['value'] . '%')
            //         ->orwhere('who_pack', 'LIKE', '%' . $request['search']['value'] . '%')
            //         ->orwhere('pickup_street', 'LIKE', '%' . $request['search']['value'] . '%')
            //         ->orwhere('delivery_street', 'LIKE', '%' . $request['search']['value'] . '%')
            //         ->orwhere('hopping_for_pickup', 'LIKE', '%' . $request['search']['value'] . '%')
            //         // ->orderBy($request['order'][0]['column'], $request['order'][0]['dir'])
            //         ->toSql()/* ->get() */;
            //     // dd(DB::getQueryLog());
            //     dd($data);
            // }

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
}
