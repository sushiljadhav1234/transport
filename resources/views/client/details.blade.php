@extends('layouts.app')
@section('content')
    @if (Auth::user()->user_type == 'Admin' ||
            Auth::user()->user_type == 'Manager' ||
            Auth::user()->user_type == 'Employee' ||
            Auth::user()->user_type == 'Client')
        <div class="main-container">

            <div class="page-header text-center">

                <!-- Breadcrumb start -->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        Client Details
                    </li>
                </ol>
                <button class="btn btn-primary" onclick="viewcontactdetails()">View Contact Person Details</button>

            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <form method="post" id="myform">
                    <div class="row gutters">
                        <div class="col-md-12">
                            <div class="form-group">

                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" value="{{ $data->first_name }}" id="first_name"
                                    name="first_name" placeholder="First Name" readonly>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" value="{{ $data->last_name }}" id="last_name"
                                    name="last_name" placeholder="Last Name" readonly>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="client_name">Company/Client Name</label>
                                <input type="text" class="form-control" value="{{ $data->client_name }}" id="client_name"
                                    name="client_name" placeholder="Client" readonly>
                                <input type="hidden" class="form-control" value="{{ $data->id }}" id="id"
                                    name="id">
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="emailid">Email</label>
                                <input type="email" class="form-control" value="{{ $data->emailid }}" id="emailid"
                                    name="emailid" placeholder="Email" readonly>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="contactno">Contact No.</label>
                                <input type="text" class="form-control" value="{{ $data->contactno }}" id="contactno"
                                    name="contactno" placeholder="Contact No." readonly>
                            </div>
                        </div>




                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="address_street">Street</label>
                                <input type="text" class="form-control" value="{{ $data->address_street }}"
                                    id="address_street" name="address_street" placeholder="Street" readonly>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="address_city">City</label>
                                <input type="text" class="form-control" value="{{ $data->address_city }}"
                                    id="address_city" name="address_city" placeholder="City" readonly>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="address_state">State</label>
                                <input type="text" class="form-control" value="{{ $data->address_state }} "
                                    id="address_state" name="address_state" placeholder="State" readonly>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="address_zip">Zip</label>
                                <input type="text" class="form-control" value="{{ $data->address_zip }}" id="address_zip"
                                    name="address_zip" placeholder="Zip" readonly>
                            </div>
                        </div>





                </form>
            </div>
            <div class="col-md-12 text-center"
                style="    border-top: 1px solid #596280;
    							margin-top: 10px;
    margin-bottom: 10px;"></div>


            <div class="row gutters">
                <div class="col-md-12 text-center">
                    <h4><button type="button" class="btn btn-primary" style="float:right"
                            onclick="getarchivedjobstemp()">View Archived</button><u>Jobs</u></h4>
                </div>
            </div>
            <div class="row gutters">
                <div class="table-responsive">
                    <table id="basicExamplejobs" class="table custom-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Job Name</th>
                                <th>Job No.</th>
                                <th>Stage</th>
                                <th>Current Location </th>
                                <th></th>
                                <th>Quoted Price</th>
                                <th></th>
                                <th></th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12 text-center"
                style="border-top: 1px solid #596280; margin-top: 10px; margin-bottom: 10px;"></div>
            <div class="row gutters">
                <div class="col-md-12 text-center">
                    <h4><a href="{{ route('client.add_quote_request') }}" class="btn btn-primary" style="float:left">Add
                            New Quotes</a><u>Quote Requests</u><button type="button" class="btn btn-primary"
                            style="float:right" onclick="getarchivedquotes()">View Archived Quotes</button></h4>
                </div>
            </div>
            <div class="row gutters">
                <div class="table-responsive">
                    <table id="basicExamplequotes" class="table custom-table">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Volume</th>
                                <th>Packing</th>
                                <th>Pickup Location </th>
                                <th>Delivery Location </th>
                                <th>Urgency</th>
                                <th>Work on Quote</th>
                                <th>Archive</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>



        </div>
        </div>
        <script>
            $('#basicExamplequotes').DataTable({
                oLanguage: {
                    sProcessing: '<div id="loading-wrapper"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>'
                },
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('client.quoteList') }}",
                    type: "get"
                },
                columnDefs: [{
                    "orderable": false,
                    "targets": 6
                }],
                columns: [{
                        data: 'action',
                        name: 'action'
                    },
                    {
                        data: 'units',
                        name: 'Volume'
                    },
                    {
                        data: 'who_pack',
                        name: 'Packing'
                    },
                    {
                        data: 'pickup_street',
                        name: 'Pickup Location'
                    },
                    {
                        data: 'delivery_street',
                        name: 'Delivery Location'
                    },
                    {
                        data: 'hopping_for_pickup',
                        name: 'Urgency'
                    },
                    {
                        data: 'quote',
                        name: 'Work on Quote'
                    },
                    {
                        data: 'archive',
                        name: 'Archive'
                    },
                ],
            });
        </script>
    @else
        <div class="main-container">

            <!-- Page header start -->
            <div class="page-header text-center">

                <!-- Breadcrumb start -->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">You are not allowed for this page.</li>
                </ol>


            </div>

        </div>
    @endif
    @include('layouts.footer')
@endsection
