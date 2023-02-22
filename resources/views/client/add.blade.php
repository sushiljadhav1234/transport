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
                <form method="post" id="myform">
                    @csrf
                    <div class="row gutters">
                        <div class="col-md-12">
                            <div class="form-group">

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" value="" id="first_name" name="first_name"
                                    placeholder="First Name">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" value="" id="last_name" name="last_name"
                                    placeholder="Last Name">
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="client_name">Company/Client Name</label>
                                <input type="text" class="form-control" value="" id="client_name"
                                    name="client_name" placeholder="Client">
                                <input type="hidden" class="form-control" value="" id="id" name="id">
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="emailid">Email</label>
                                <input type="email" class="form-control" value="" id="emailid" name="emailid"
                                    placeholder="Email">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="contactno">Contact No.</label>
                                <input type="text" class="form-control" value="" id="contactno" name="contactno"
                                    placeholder="Contact No.">
                            </div>
                        </div>




                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="address_street">Street</label>
                                <input type="text" class="form-control" value="" id="address_street"
                                    name="address_street" placeholder="Street">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="address_city">City</label>
                                <input type="text" class="form-control" value="" id="address_city"
                                    name="address_city" placeholder="City">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="address_state">State</label>
                                <input type="text" class="form-control" value="" id="address_state"
                                    name="address_state" placeholder="State" maxlength="2" minlength="2">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="address_zip">Zip</label>
                                <input type="text" class="form-control" value="" id="address_zip"
                                    name="address_zip" placeholder="Zip">
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


                $("#myformbut").on('click', function() {

                    $("#myform").validate({
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

                            var formData = new FormData($("#myform")[0]);

                            $.ajax({
                                type: "POST",
                                url: "{{ route('client.store') }}",
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

                                    if (data.success == "client already.") {
                                        swal("Error", data.success, "error");
                                    } else {
                                        swal({
                                            title: "Success",
                                            timer: 800,
                                            showCancelButton: false,
                                            showConfirmButton: false
                                        });
                                        console.log(data.data['id']);
                                        $("#id").val(data.data['id']);
                                        $("#client_id").val(data.data['id']);
                                        $("#contactdetailssection").show();
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
