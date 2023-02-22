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

                <button class="btn btn-primary" onclick="viewcontactdetails({{ $data->id }})">View Contact Person
                    Details</button>

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
                                <input type="text" class="form-control" value="{{ $data->address_zip }}"
                                    id="address_zip" name="address_zip" placeholder="Zip" readonly>
                            </div>
                        </div>





                </form>
            </div>
            <div class="col-md-12 text-center"
                style="border-top: 1px solid #596280; margin-top: 10px; margin-bottom: 10px;"></div>


            <div class="row gutters">
                <div class="col-md-12 text-center">
                    <h4><button type="button" class="btn btn-primary" style="float:right"
                            onclick="getarchivedjobstemp({{ $data->id }})">View Archived</button><u>Jobs</u></h4>
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
                    <h4><a href="add_quote_request.php" class="btn btn-primary" style="float:left">Add New
                            Quotes</a><u>Quote Requests</u><button type="button" class="btn btn-primary"
                            style="float:right" onclick="getarchivedquotes()">View Archived Quotes</button></h4>
                </div>
            </div>
            <div class="row gutters">
                <div class="table-responsive">
                    <table id="basicExamplequotes" class="table custom-table">
                        <thead>
                            <tr>
                                <th></th>
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
        <!-- Main container end -->
        <div class="modal fade bd-example-modal-lg" id="modal_contact_person" tabindex="-1" role="dialog"
            aria-labelledby="customModalTwoLabel" aria-modal="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="customModalTwoLabel">Contact Person Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">


                        <div class="row">

                            <div class="col-md-12">
                                <div class="table-container">
                                    <div class="table-responsive">
                                        <table id="mytable" class="table custom-table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Contact No.</th>
                                                    <th>Email</th>
                                                </tr>
                                            </thead>
                                            <tbody id="contactperson_data">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>



                    </div>


                    <div class="modal-footer custom">

                        <div class="left-side">
                            <button type="button" class="btn btn-link danger" data-dismiss="modal">Cancel</button>
                        </div>
                        <div class="divider"></div>
                        <div class="right-side">

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Main container end -->
        <div class="modal fade bd-example-modal-xl" id="modal_view_archived_jobs" tabindex="-1" role="dialog"
            aria-labelledby="customModalTwoLabel" aria-modal="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="customModalTwoLabel">View Jobs (Archived)</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">


                        <div class="row">

                            <div class="col-md-12">
                                <div class="table-container">
                                    <div class="table-responsive">
                                        <table id="basicExamplearchivedjobs" class="table custom-table"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Job No</th>
                                                    <th>Job Name</th>
                                                    <th>Job Stage</th>
                                                    <th>Wine volume type</th>
                                                    <th>Units</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>



                    </div>


                    <div class="modal-footer custom">

                        <div class="left-side">
                            <button type="button" class="btn btn-link danger" data-dismiss="modal">Cancel</button>
                        </div>
                        <div class="divider"></div>
                        <div class="right-side">

                        </div>
                    </div>

                </div>
            </div>
        </div>
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
    @if (Auth::user()->user_type == 'Admin' ||
            Auth::user()->user_type == 'Manager' ||
            Auth::user()->user_type == 'Employee' ||
            Auth::user()->user_type == 'Client')
        <script>
            function getarchivedjobstemp(id) {
                $("#modal_view_archived_jobs").modal('show');
                $('#basicExamplearchivedjobs').DataTable().ajax.reload();
            }

            function viewcontactdetails(client_id) {
                var token = '{{ csrf_token() }}';
                var dataString = 'client_id=' + client_id;
                $.ajax({
                    type: "POST",
                    url: "{{ route('client.getclient_details1') }}",
                    data: {
                        _token: token,
                        client_id: client_id
                    },
                    cache: false,
                    beforeSend: function() {
                        $("#loading-wrapper").show();
                    },
                    complete: function() {
                        $("#loading-wrapper").fadeOut(2000);
                    },
                    success: function(data) {
                        $("#contactperson_data").empty();
                        $("#contactperson_data").append(data);
                        $("#modal_contact_person").modal("show");
                    },
                    error: function(error) {
                        swal("Error", error, "error");
                    }
                });
                return false;
            }
            $(document).ready(function() {
                $('#basicExamplejobs').DataTable({
                    scrollY: '400px',
                    scrollCollapse: true,
                    paging: true,
                    oLanguage: {
                        sProcessing: '<div id="loading-wrapper"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>'
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "",
                        type: "get"
                    },
                    columnDefs: [{
                        "orderable": false,
                        "targets": 9
                    }]
                });
                $('#basicExamplequotes').DataTable({
                    scrollY: '400px',
                    scrollCollapse: true,
                    paging: true,
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


                $('#basicExamplearchivedquotes').DataTable({
                    oLanguage: {
                        sProcessing: '<div id="loading-wrapper"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>'
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "get/get_quotes_client_details_archived.php",
                        type: "post"
                    },
                    columnDefs: [{
                        "orderable": false,
                        "targets": 4
                    }]
                });




                $('#basicExamplearchivedjobs').DataTable({
                    /* oLanguage: {
                          sProcessing: '<div id="loading-wrapper"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>'
                      }, */
                    processing: false,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('client.archieve') }}",
                        type: "get",
                        data: {
                            id: {{ $data->id }}
                        }
                    },
                    /* columnDefs: [
                         {"orderable": false, "targets": 4},
                     ],*/
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'job_name',
                            name: 'Job Name'
                        },
                        {
                            data: 'jobstage',
                            name: 'Job Stage'
                        },
                        {
                            data: 'wine_volume',
                            name: 'Wine volume type'
                        },
                        {
                            data: 'unit',
                            name: 'Units'
                        },

                        /*  {
                              data: 'name',
                              name: 'name'
                          },
                          {
                              data: 'jobstage',
                              name: 'jobstage'
                          },
                          {
                              data: 'wine_volume',
                              name: 'wine_volume'
                          },
                          {
                              data: 'unit',
                              name: 'unit'
                          },*/


                    ]
                });




            });
        </script>
    @endif
    @include('layouts.footer')
@endsection
