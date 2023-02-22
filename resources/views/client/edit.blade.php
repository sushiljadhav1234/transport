@extends('layouts.app')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @if (Auth::user()->user_type == 'Admin' ||
            Auth::user()->user_type == 'Manager' ||
            Auth::user()->user_type == 'Employee' ||
            Auth::user()->user_type == 'Client')
        @php
            
        @endphp
        <div class="main-container">

            <div class="page-header text-center">

                <!-- Breadcrumb start -->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        Add/Edit Client
                    </li>
                </ol>


            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <form method="post" id="myformEdit">
                    @csrf
                    <input type="hidden" class="form-control" id="clientid" name="clientid" placeholder=""
                        value="{{ $data->id }}">
                    <div class="row gutters">
                        <div class="col-md-12">
                            <div class="form-group">

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">

                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    placeholder="First Name" value="{{ $data->first_name }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" value="{{ $data->last_name }}" id="last_name"
                                    name="last_name" placeholder="Last Name">
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="client_name">Company/Client Name</label>
                                <input type="text" class="form-control" value="{{ $data->client_name }}" id="client_name"
                                    name="client_name" placeholder="Client">
                                <input type="hidden" class="form-control" value="" id="id" name="id">
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="emailid">Email</label>
                                <input type="email" class="form-control" value="{{ $data->emailid }}" id="emailid"
                                    name="emailid" placeholder="Email">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="contactno">Contact No.</label>
                                <input type="text" class="form-control" value="{{ $data->contactno }}" id="contactno"
                                    name="contactno" placeholder="Contact No.">
                            </div>
                        </div>




                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="address_street">Street</label>
                                <input type="text" class="form-control" value="{{ $data->address_street }}"
                                    id="address_street" name="address_street" placeholder="Street">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="address_city">City</label>
                                <input type="text" class="form-control" value="{{ $data->address_city }}"
                                    id="address_city" name="address_city" placeholder="City">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="address_state">State</label>
                                <input type="text" class="form-control" value="{{ $data->address_state }}"
                                    id="address_state" name="address_state" placeholder="State" maxlength="2"
                                    minlength="2">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="address_zip">Zip</label>
                                <input type="text" class="form-control" value="{{ $data->address_zip }}"
                                    id="address_zip" name="address_zip" placeholder="Zip">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <br>
                                <button type="submit" name="sub" id="myformbut"
                                    class="btn btn-primary my-1">Submit</button>
                                <button type="button" onclick="window.history.back();"
                                    class="btn btn-primary my-1">Back</button>
                            </div>
                        </div>
                </form>
            </div>


            <div class="row" id="contactdetailssection">

                <div class="col-md-12">
                    <div class="table-container">
                        <div class="t-header">Contact Person Details</div>
                         <form method="post" id="contactform">
                          @csrf
                        <div class="row">
                        <div class="col-md-12">
                        <div class="row">
                                       
                                        <div class="col-md-3">
                            <div class="form-group">
                                            <input type="text" class="form-control" id="contact_person_name"
                                                    name="contact_person_name" placeholder="Contact Person Name"
                                                    ><input type="hidden" class="form-control" value="{{ $data->id }}"
                                                    id="client_id" name="client_id"><input type="hidden"
                                                    class="form-control" value="0" id="row_id" name="row_id">
                                        </div></div>
                                        <div class="col-md-3">
                            <div class="form-group">
                                            <input type="text" class="form-control" id="contact_person_phone"
                                                    name="contact_person_phone" placeholder="Contact Person No." >
                                            </div></div>
                                            <div class="col-md-3">
                            <div class="form-group">
                                            <input type="email" class="form-control" id="contact_person_email"
                                                    name="contact_person_email" placeholder="Contact Person Email"
                                                    >
                                                    </div></div>
                                                    
                                             <div class="col-md-3">
                            <div class="form-group">
                            <input type="checkbox" id="isactive" name="isactive" checked>
                                            <button type="submit"
                                                    id="contactsubbutton"class="btn btn-primary my-1" style="margin-left: 66px;">Submit</button>
                                                     </div></div>
                        </div>           
                        </div>
                        </div> 
                        </form>               
                        <div class="table-responsive">
                            <table id="mytable" class="table custom-table">
                                <thead>
                                    <tr style="background-color: #1A233A;">
                                       
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <th>Contact No.</th>
                                        <th>Email</th>
                                        <th>Is-Active</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody id="divcontactdetails">
                                    {{-- @foreach ($data->clientdetails as $val3)
                                        <tr>
                                            <td>{{ $val3->name }}</td>
                                            <td>{{ $val3->contactno }}</td>
                                            <td>{{ $val3->email }}</td>
                                            <td>{{ $val3->isactive == 0 ? 'Active' : 'In-Active' }}</td>
                                            <td><a href="#" id="editbutton"class="btn btn-primary my-1">Edit</a></td>
                                        </tr>
                                    @endforeach --}}
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        </div> <!-- Main container end -->
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
        getcontactdetails($('#clientid').val());
             function getcontactdetails(client_id)
            {
               var token = '{{ csrf_token() }}';
                var dataString = 'client_id=' + client_id+  'token=' + token  ;
                $.ajax({
                    type: "POST",
                    url: "{{route('client.getclient_details')}}",
                    data:{
                                _token:token,
                                client_id:client_id
                            },
                    cache: false,
                    beforeSend: function () {
                        $("#loading-wrapper").show();
                    },
                    complete: function () {
                    $("#loading-wrapper").hide();
                    },
                    success: function (data)
                    {
                        $("#divcontactdetails").empty();
                        $("#divcontactdetails").append(data);
                    },
                    error: function (error) {
                        swal("Error", error, "error");
                    }
                });
            return false;
            }

            function setrowdata(id)
            {
            {{-- var dataString = 'id=' + id; --}}
            var token = '{{ csrf_token() }}';
            $.ajax({
                type: "POST",
                url: "{{route('client.updateDetails')}}",
                data:{
                        _token:token,
                        id:id
                    },
                dataType: 'json',
                cache: false,
                beforeSend: function () {
                    $("#loading-wrapper").show();
                },
                complete: function () {
                $("#loading-wrapper").hide();
                },
                success: function (data)
                {
                    $("#row_id").val(data.id);
                    $("#client_id").val(data.client_id);
                    $("#contact_person_name").val(data.name);
                    $("#contact_person_phone").val(data.contactno);
                    $("#contact_person_email").val(data.email);
                    
                    if(data.isactive == '1')
                    {
                        $( "#isactive" ).prop( "checked", true );
                    }
                    else
                    {
                        $( "#isactive" ).prop( "checked", false );
                    }
                    
                    
                },
                error: function (error) {
                    swal("Error", error, "error");
                }
            });
            return false;
        }
 
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#first_name').add('#last_name').keyup(function() {

                    var first_name = $("#first_name").val();
                    var last_name = $("#last_name").val();
                    $('#client_name').val(first_name + ' ' + last_name);
                });
                $('#contactno').inputmask('(999) 999-9999');
                $('#contact_person_phone').inputmask('(999) 999-9999');
$("#contactsubbutton").on('click', function() {
                    
                    $("#contactform").validate({
                      
                        rules: {

                            contact_person_name: {
                                required: true
                               
                            },
                            contact_person_email: {
                                required: true,
                                 email: true
                            },
                            contact_person_phone: {
                                required: true
                            },
                          
                        },
                        submitHandler: function(form) {
                            var sTest = $("#contact_person_phone").val();
                            var iCount = 0;
                            for (iIndex in sTest) {
                                if (!isNaN(parseInt(sTest[iIndex]))) {
                                    iCount++;
                                }
                            }
                            if (iCount == 10 || iCount == 0) {} else {
                                swal("error", "Contact no should be of 10 character", "error");
                                return false;
                            }


                            var client_id = $('#clientid').val();
                            var name= $('#contact_person_name').val();
                            var number = $('#contact_person_phone').val();
                            var email = $('#contact_person_email').val();
                            var active = $('input[name="isactive"]:checked').serialize();

                            var formData = new FormData($("#contactform")[0]);
                           

                            $.ajax({
                            type: "POST",
                            url: "{{route('client.getdetails')}}",
                            data: formData,
                                processData: false,
                                contentType: false,
                                beforeSend: function() {
                                    $("#loading-wrapper").show();
                                },
                                complete: function() {
                                    $("#loading-wrapper").hide();
                                },
                                success: function(data) {
                                    console.log(data.success);

                                    if (data.success == "client added successfully.") {
                                        swal({
                                            title: "Success",
                                            timer: 800,
                                            showCancelButton: false,
                                            showConfirmButton: false
                                        });
                                     	$("#row_id").val('');
                                        $("#contact_person_email").val('');
                                        $("#contact_person_name").val('');
                                        $("#contact_person_phone").val('');
                                        getcontactdetails(client_id);
                                    }


                                },

                            });
                            return false;
                        }



                    });



                });


                $("#myformbut").on('click', function() {

                    $("#myformEdit").validate({
                        rules: {

                            emailid: {
                                required: true,
                                email: true
                            },
                            address_street: {
                                required: true
                            },
                            address_city: {
                                required: true
                            },
                            address_state: {
                                required: true
                            },
                            address_zip: {
                                required: true
                            }
                        },
                        submitHandler: function(form) {
                            var sTest = $("#contactno").val();
                            var iCount = 0;
                            for (iIndex in sTest) {
                                if (!isNaN(parseInt(sTest[iIndex]))) {
                                    iCount++;
                                }
                            }
                            if (iCount == 10 || iCount == 0) {} else {
                                swal("error", "Contact no should be of 10 character", "error");
                                return false;
                            }


                            var id = document.getElementById('clientid').value;
                            var client_name = document.getElementById("client_name").value;
                            var address_street = document.getElementById("address_street").value;
                            var address_city = document.getElementById("address_city").value;
                            var address_state = document.getElementById("address_state").value;
                            var address_zip = document.getElementById("address_zip").value;
                            var first_name = document.getElementById("first_name").value;
                            var last_name = document.getElementById("last_name").value;
                            var emailid = document.getElementById("emailid").value;
                            var contactno = document.getElementById("contactno").value;

                            if (client_name == '' && first_name == '') {
                                swal("Error",
                                    "Please fill either first name or client name to proceed.",
                                    "error");
                                return false;
                            }

                            var formData = new FormData($("#myformEdit")[0]);
                           

                            $.ajax({
                                type: "POST",
                                url: "{{ route('client.update') }}",
                                data: formData,
                                processData: false,
                                contentType: false,
                                beforeSend: function() {
                                    $("#loading-wrapper").show();
                                },
                                complete: function() {
                                    $("#loading-wrapper").hide();
                                },
                                success: function(data) {
                                    console.log(data.success);

                                    if (data.success == "client updated successfully.") {
                                        swal({
                                            title: "Success",
                                            timer: 800,
                                            showCancelButton: false,
                                            showConfirmButton: false
                                        });
                                    }


                                },

                            });
                            return false;
                        }



                    });



                });

                 
               
            });
        </script>
    @endif
    @include('layouts.footer')
@endsection
