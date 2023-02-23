@extends('layouts.app')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @if (Auth::user()->user_type == 'Admin' ||
            Auth::user()->user_type == 'Manager' ||
            Auth::user()->user_type == 'Employee' ||
            Auth::user()->user_type == 'Client')
        <form method="post" id="myform">
            <!-- Main container start -->
            <div class="main-container">
                <div class="page-header text-center">
                    <!-- Breadcrumb start -->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            Add Quote Request
                        </li>
                    </ol>

                    <div>
                        <button type="submit" id="sub" name="sub" class="btn btn-primary my-1">Submit</button>
                        <button type="submit" id="subcalc" name="subcalc" class="btn btn-primary my-1">Submit &
                            Calculate</button>
                        <button type="button" onclick="window.history.back();" class="btn btn-danger my-1">Back</button>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">



                    <div class="card">
                        <div class="card-header">
                            <div class="card-title" style="font-size: 14px;">Contact</div>
                        </div>
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name"
                                            placeholder="First Name">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                            placeholder="Last Name">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="Email Address">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            placeholder="Phone Number">
                                    </div>
                                </div>
                            </div>



                            <div class="row gutters">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="first_name">OR</label>

                                    </div>
                                </div>
                            </div>


                            <div class="row gutters">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name">Existing Client</label>
                                        <select class="form-control" id="clientid" name="clientid">
                                            <option value="">select if applicable</option>
                                            @foreach ($data1 as $item1)
                                                @php
                                                    $client = $item1->client_name;
                                                    if (empty($client)) {
                                                        $client = $item1->first_name . ' ' . $item1->last_name;
                                                    }
                                                @endphp
                                                <option value="@php echo $item1->id; @endphp">@php echo $client; @endphp</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header">
                            <div class="card-title" style="font-size: 14px;">Timing</div>
                        </div>
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="hopping_for_pickup">When are you hoping for pickup?</label>
                                        <select class="form-control" id="hopping_for_pickup" name="hopping_for_pickup">
                                            <option value="">Select</option>
                                            <option value="within 7 days">within 7 days</option>
                                            <option value="1 or 2 weeks">1 or 2 weeks</option>
                                            <option value="3 or 4 weeks">3 or 4 weeks</option>
                                            <option value="1 or 2 months">1 or 2 months</option>
                                            <option value="3+ months">3+ months</option>
                                            <option value="unsure">unsure</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="need_interim_storage">Do you need interim storage between pickup &
                                            deliver?</label>
                                        <select class="form-control" id="need_interim_storage" name="need_interim_storage">
                                            <option value="">Select</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group" id="need_interim_storage_fields">
                                        <label for="need_interim_storage_details">(if yes) please provide storage needs /
                                            details</label>
                                        <textarea class="form-control" id="need_interim_storage_details" name="need_interim_storage_details"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="card">
                        <div class="card-header">
                            <div class="card-title" style="font-size: 14px;">Wine Details</div>
                        </div>
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="declared_value_of_wine">Declared value(estimate if unsure)</label>
                                        <div class="input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text" style="padding:5px">$</div>
                                            </div>
                                            <input type="text" class="form-control" id="declared_value_of_wine"
                                                name="declared_value_of_wine" placeholder="Declared value of wine">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="who_pack">Who will be packing the wine?</label>
                                        <select class="form-control" required id="who_pack" name="who_pack">
                                            <option value="">Select</option>
                                            <option value="the client will pack all the wine">The client will pack all the
                                                wine</option>
                                            <option value="Client will pack some and Vine Vault will pack some">Client will
                                                pack some &amp; Vine Vault will pack some</option>
                                            <option value="Vine Vault will pack all/most of the wine">Vine Vault will pack
                                                all/most of the wine</option>
                                            <option value="not sure yet">Not sure yet</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                </div>



                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="wine_volume_type">Wine Unit Type</label>
                                        <select class="form-control" id="wine_volume_type" name="wine_volume_type">
                                            <option value="">Select</option>
                                            <option value="Bottles">Bottles</option>
                                            <option value="Boxes">Boxes</option>
                                            <option value="Pallets">Pallets</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="units">Number of Units</label>
                                        <input type="text" class="form-control" id="units" name="units"
                                            placeholder="Units">
                                    </div>
                                </div>

                                <div class="col-md-7 row" id="lrg_frmt_fields">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="do_hv_lrg_frmt_botlles">Do you have large format bottles?</label>
                                            <select class="form-control" id="do_hv_lrg_frmt_botlles"
                                                name="do_hv_lrg_frmt_botlles">
                                                <option value="">Select</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="form-group" id="do_hv_lrg_frmt_botlles_fields">
                                            <label for="do_hv_lrg_frmt_botlles_details">If yes, Please tell us how many and
                                                what size(s)</label>
                                            <textarea class="form-control" id="do_hv_lrg_frmt_botlles_details" name="do_hv_lrg_frmt_botlles_details"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>









                    <div class="card">
                        <div class="card-header">
                            <div class="card-title" style="font-size: 14px;">Pickup Details</div>
                        </div>
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="warehuseAddresspickup">Fill address from warehouse</label>
                                        <select class="form-control" id="warehuseAddresspickup"
                                            name="warehuseAddresspickup">
                                            <option value="">Select</option>
                                            @foreach ($data2 as $item2)
                                                @php
                                                    $warehouse_name = $item2->warehouse_name;
                                                @endphp
                                                <option value="@php echo $item2->id; @endphp">@php echo $warehouse_name; @endphp</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="pickup_street"
                                            name="pickup_street" placeholder="Street address">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="pickup_location_type"
                                            name="pickup_location_type" placeholder="Apt., unit, suite">

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="pickup_city" name="pickup_city"
                                            placeholder="City">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="pickup_state" name="pickup_state"
                                            placeholder="State" maxlength="2" minlength="2">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="pickup_zip" name="pickup_zip"
                                            placeholder="Zip code">
                                    </div>
                                </div>



                                <div class="col-md-10">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="pickup_access_info"
                                            name="pickup_access_info"
                                            placeholder="Please describe the access to where the wine will be collected from, including how many flights of stairs will need to be traversed ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                    <div class="card">
                        <div class="card-header">
                            <div class="card-title" style="font-size: 14px;">Delivery Details</div>
                        </div>
                        <div class="card-body">

                            <div class="row gutters">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="warehuseAddressdelivery">Fill address from warehouse</label>
                                        <select class="form-control" id="warehuseAddressdelivery"
                                            name="warehuseAddressdelivery">
                                            <option value="">Select</option>
                                            @foreach ($data2 as $item2)
                                                @php
                                                    $warehouse_name = $item2->warehouse_name;
                                                @endphp
                                                <option value="@php echo $item2->id; @endphp">@php echo $warehouse_name; @endphp</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="row gutters">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="delivery_street"
                                            name="delivery_street" placeholder="Street address">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">

                                        <input type="text" class="form-control" id="delivery_location_type"
                                            name="delivery_location_type" placeholder="Apt., unit, suite">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="delivery_city"
                                            name="delivery_city" placeholder="City">
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="delivery_state"
                                            name="delivery_state" placeholder="State" maxlength="2" minlength="2">
                                    </div>
                                </div>



                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="delivery_zip" name="delivery_zip"
                                            placeholder="Zip code">
                                    </div>
                                </div>



                                <div class="col-md-10">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="delivery_access_info"
                                            name="delivery_access_info"
                                            placeholder="Please describe the access to where the wine is going to, including how many flights of stairs will need to be traversed ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="card">
                        <div class="card-header">
                            <div class="card-title" style="font-size: 14px;">Notes</div>
                        </div>
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="notes">Any Additional Information</label>
                                        <textarea class="form-control" id="notes" name="notes"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="card">
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-md-12">
                                    <button type="submit" id="sub1" name="sub1"
                                        class="btn btn-primary my-1">Submit</button>
                                    <button type="submit" id="subcalc1" name="subcalc1"
                                        class="btn btn-primary my-1">Submit & Calculate</button>
                                    <button type="button" onclick="window.history.back();"
                                        class="btn btn-danger my-1">Back</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form> <!-- Main container end -->




        <!-- Main container end -->
        <div class="modal fade bd-example-modal-lg" id="modal_quote_created" tabindex="-1" role="dialog"
            aria-labelledby="customModalTwoLabel" aria-modal="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="customModalTwoLabel">Quote request successfuly created</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">


                        <div class="row">
                            <div class="form-group col-md-4 text-center">
                                <a class="btn btn-primary" href="index.php">Go to<br> dashboad</a>
                            </div>
                            <div class="form-group col-md-4 text-center">
                                <a class="btn btn-primary" href="view_quote_request_active.php">Go to active<br> quote
                                    requests</a>
                            </div>
                            <div class="form-group col-md-4 text-center">
                                <button class="btn btn-primary" onclick="calculatelastrequest()">Calculate the quote<br>
                                    request you just added</button>
                            </div>
                        </div>

                        <input type="hidden" id="createdid" name="createdid">

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


        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $("#warehuseAddressdelivery").change(function() {
                    $.ajax({
                        type: "post",
                        url: "{{ route('client.setaddressquote') }}",
                        data: {
                            'id': $("#warehuseAddressdelivery").val()
                        },
                        async: true,
                        cache: false,
                        beforeSend: function() {
                            $("#loading-wrapper").show();
                        },
                        complete: function() {
                            $("#loading-wrapper").hide();
                        },
                        success: function(data) {
                            if (data.exists == '1') {
                                $("#delivery_street").val(data.warehouse_street);
                                $("#delivery_city").val(data.warehouse_city);
                                $("#delivery_state").val(data.warehouse_state);
                                $("#delivery_zip").val(data.warehouse_zip);
                            } else {
                                var errmsg = data.errmsg;
                                swal("Error", errmsg, "error");
                            }
                        },
                        error: function(error) {
                            swal("Error", error, "error");
                        }
                    });
                });

                $("#warehuseAddresspickup").change(function() {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('client.setaddressquote') }}",
                        data: {
                            'id': $("#warehuseAddresspickup").val()
                        },
                        async: true,
                        cache: false,
                        beforeSend: function() {
                            $("#loading-wrapper").show();
                        },
                        complete: function() {
                            $("#loading-wrapper").hide();
                        },
                        success: function(data) {
                            if (data.exists == '1') {

                                $("#pickup_street").val(data.warehouse_street);
                                $("#pickup_city").val(data.warehouse_city);
                                $("#pickup_state").val(data.warehouse_state);
                                $("#pickup_zip").val(data.warehouse_zip);
                            } else {
                                var errmsg = data.errmsg;
                                swal("Error", errmsg, "error");
                            }


                        },
                        error: function(error) {
                            swal("Error", error, "error");
                        }
                    });
                });

                if ($("#who_pack").val() == 'Client will pack some and Vine Vault will pack some' || $("#who_pack")
                    .val() ==
                    'Vine Vault will pack all/most of the wine') {
                    $("#lrg_frmt_fields").show();
                } else {
                    $("#lrg_frmt_fields").hide();
                    $("#do_hv_lrg_frmt_botlles").val('');
                    $("#do_hv_lrg_frmt_botlles_details").val('');
                }
                $("#who_pack").change(function() {
                    if ($(this).val() == 'Client will pack some and Vine Vault will pack some' || $(this)
                        .val() ==
                        'Vine Vault will pack all/most of the wine') {
                        $("#lrg_frmt_fields").show();
                    } else {
                        $("#lrg_frmt_fields").hide();
                        $("#do_hv_lrg_frmt_botlles").val('');
                        $("#do_hv_lrg_frmt_botlles_details").val('');

                        if ($("#do_hv_lrg_frmt_botlles").val() == 'Yes') {

                            $("#do_hv_lrg_frmt_botlles_fields").show();
                            //$("#do_hv_lrg_frmt_botlles_details").prop('required',true);
                        } else {
                            $("#do_hv_lrg_frmt_botlles_fields").hide();
                            //$("#do_hv_lrg_frmt_botlles_details").prop('required',false);
                        }


                    }
                });


                $('#units').add('#declared_value_of_wine').keyup(function() {
                    var raw_text = $(this).val();
                    var return_text = raw_text.replace(/[^0-9.]/g, '');
                    $(this).val(return_text);
                });
                $('#phone').inputmask('(999) 999-9999');
                var buttonpressed;
                $('#subcalc').click(function() {
                    buttonpressed = $(this).attr('name');
                });
                $('#sub').click(function() {
                    buttonpressed = $(this).attr('name');
                });

                $('#subcalc1').click(function() {
                    buttonpressed = $(this).attr('name');
                });
                $('#sub1').click(function() {
                    buttonpressed = $(this).attr('name');
                });


                $("#do_hv_lrg_frmt_botlles_fields").hide();
                $("#need_interim_storage_fields").hide();
                $("#contact_person_phone").keyup(function() {
                    var raw_text = $(this).val();
                    var return_text = raw_text.replace(/[^0-9]/g, '');
                    $(this).val(return_text);
                });


                $.validator.addMethod("pwcheck", function(value) {
                    return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
                        &&
                        /[a-z]/.test(value) // has a lowercase letter
                        &&
                        /\d/.test(value) // has a digit
                });


                function findal_calculate_submit1(id) {
                    var form_data = new FormData();
                    form_data.append('id', id);
                    $.ajax({
                        type: "POST",
                        url: "set/calculate_request_checkclient.php",
                        dataType: 'text', // what to expect back from the PHP script, if anything
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        beforeSend: function() {
                            $("#loading-wrapper").show();
                        },
                        complete: function() {
                            $("#loading-wrapper").hide();
                        },
                        success: function(data) {

                            if (isNaN(data)) {
                                swal("Error ", data, "error");
                            } else {
                                swal({
                                    title: "Success",
                                    timer: 800,
                                    showCancelButton: false,
                                    showConfirmButton: false
                                });
                                window.location.href = "update_job.php?id=" + btoa(data);
                            }
                        },
                        error: function(error) {

                        }
                    });
                }

                function calculatelastrequest() {
                    var createdid = $("#createdid").val();
                    let formData = new FormData($("#myform")[0]);
                    formData.append('id', createdid);
                    $.ajax({
                        type: "POST",
                        url: "{{ route('client.calculate_request_checkclient_check') }}",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,
                        beforeSend: function() {
                            $("#loading-wrapper").show();
                        },
                        complete: function() {
                            $("#loading-wrapper").hide();
                        },
                        success: function(data) {
                            if (data == 'success') {
                                findal_calculate_submit1(createdid);
                            } else if (data == 'new') {
                                swal({
                                        title: " Are you sure you want to proceed?",
                                        text: "Emailid not found in the system. System will add this as a new client and map the same with this quote request.",
                                        type: "warning",
                                        showCancelButton: true,
                                        confirmButtonColor: '#DD6B55',
                                        confirmButtonText: 'Yes, I am sure',
                                        cancelButtonText: "No, cancel it",
                                        closeOnConfirm: false,
                                        closeOnCancel: true
                                    },
                                    function(isConfirm) {

                                        if (isConfirm) {
                                            findal_calculate_submit1(createdid);
                                        } else {

                                        }
                                    });
                            } else if (data == 'error') {
                                swal("Error ", data, "error");
                            } else {
                                swal({
                                        title: " Are you sure you want to proceed?",
                                        text: data,
                                        type: "warning",
                                        showCancelButton: true,
                                        confirmButtonColor: '#DD6B55',
                                        confirmButtonText: 'Yes, I am sure',
                                        cancelButtonText: "No, cancel it",
                                        closeOnConfirm: false,
                                        closeOnCancel: true
                                    },
                                    function(isConfirm) {

                                        if (isConfirm) {
                                            findal_calculate_submit1(createdid);
                                        } else {

                                        }
                                    });

                            }
                        },
                        error: function(error) {

                        }
                    });
                }

                $("#myform").validate({
                    rules: {
                        email: {
                            email: true
                        }
                    },
                    submitHandler: function(form) {


                        var sTest = $("#phone").val();
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
                        var first_name = $("#first_name").val();
                        // var last_name = $("#last_name").val();
                        var email = $("#email").val();
                        var clientid = $("#clientid").val();
                        //  var phone = $("#phone").val();

                        if (clientid != '' || (first_name != '' && email != '')) {
                            if (buttonpressed == 'subcalc' || buttonpressed == 'subcalc1') {
                                let formData = new FormData($("#myform")[0]);
                                $.ajax({
                                    type: "POST",
                                    url: "{{ route('client.quote_calculate') }}",
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    beforeSend: function() {
                                        $("#loading-wrapper").show();
                                    },
                                    complete: function() {
                                        $("#loading-wrapper").fadeOut(2000);
                                    },
                                    success: function(data) {
                                        if (data.success == 'success') {
                                            findal_calculate_submit();
                                        } else {
                                            swal({
                                                    title: " Are you sure you want to proceed?",
                                                    text: data.success,
                                                    type: "warning",
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#DD6B55',
                                                    confirmButtonText: 'Yes, I am sure',
                                                    cancelButtonText: "No, cancel it",
                                                    closeOnConfirm: false,
                                                    closeOnCancel: true
                                                },
                                                function(isConfirm) {

                                                    if (isConfirm) {
                                                        findal_calculate_submit();
                                                    } else {

                                                    }
                                                });
                                        }
                                    },
                                    error: function(error) {
                                        swal("Error", error, "error");
                                    }
                                });
                            }
                            if (buttonpressed == 'sub' || buttonpressed == 'sub1') {
                                let formData = new FormData($("#myform")[0]);
                                $.ajax({
                                    type: "POST",
                                    url: "{{ route('client.submit_quote_request') }}",
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    beforeSend: function() {
                                        $("#loading-wrapper").show();
                                    },
                                    complete: function() {
                                        $("#loading-wrapper").fadeOut(2000);
                                    },
                                    success: function(data) {
                                        if (data.success == "error") {
                                            swal("Error", data.success, "error");
                                        } else {
                                            $("#first_name").val('');
                                            $("#last_name").val('');
                                            $("#email").val('');
                                            $("#phone").val('');
                                            $("#clientid").val('');
                                            $("#hopping_for_pickup").val('');
                                            $("#need_interim_storage").val('');
                                            $("#need_interim_storage_details").val('');
                                            $("#declared_value_of_wine").val('');
                                            $("#who_pack").val('');
                                            $("#wine_volume_type").val('');
                                            $("#units").val('');
                                            $("#do_hv_lrg_frmt_botlles").val('');
                                            $("#do_hv_lrg_frmt_botlles_details").val('');
                                            $("#pickup_street").val('');
                                            $("#pickup_location_type").val('');
                                            $("#pickup_city").val('');
                                            $("#pickup_state").val('');
                                            $("#pickup_zip").val('');
                                            $("#pickup_access_info").val('');
                                            $("#delivery_street").val('');
                                            $("#delivery_location_type").val('');
                                            $("#delivery_city").val('');
                                            $("#delivery_state").val('');
                                            $("#delivery_zip").val('');
                                            $("#delivery_access_info").val('');
                                            $("#notes").val('');
                                            $("#createdid").val(data.data);
                                            $("#modal_quote_created").modal('show');
                                        }
                                    },
                                    error: function(error) {
                                        swal("Error", error, "error");
                                    }
                                });

                            }
                        } else {
                            swal("Error", "Please fill  client details.", "error");
                        }
                        return false;
                    }
                });


                function findal_calculate_submit() {
                    let formData = new FormData($("#myform")[0]);
                    $.ajax({
                        type: "POST",
                        url: "{{ route('client.quote_request_calc') }}",
                        data: formData,
                        processData: false,
                        contentType: false,
                        beforeSend: function() {
                            $("#loading-wrapper").show();
                        },
                        complete: function() {
                            $("#loading-wrapper").fadeOut(2000);
                        },
                        success: function(data) {
                            if (data.success == 'error') {
                                swal("Error ", data.success, "error");
                            } else {
                                swal({
                                    title: "Success",
                                    timer: 800,
                                    showCancelButton: false,
                                    showConfirmButton: false
                                });
                                window.location.href = "update_job.php?id=" + btoa(data.last_insert_id);
                            }

                        },
                        error: function(error) {
                            swal("Error", error, "error");
                        }
                    });
                }

                $("#clientid").change(function() {
                    var clientid = $("#clientid").val();
                    $.ajax({
                        type: "POST",
                        url: "{{ route('client.getclientdata') }}",
                        data: {
                            'clientid': clientid
                        },
                        cache: false,
                        beforeSend: function() {
                            $("#loading-wrapper").show();
                        },
                        complete: function() {
                            $("#loading-wrapper").fadeOut(2000);
                        },
                        success: function(data) {
                            if (data.exists == 1) {
                                $("#first_name").val(data.first_name);
                                $("#last_name").val(data.last_name);
                                $("#email").val(data.emailid);
                                $("#phone").val(data.contactno);

                            }
                        }
                    });
                });

                $("#need_interim_storage").change(function() {
                    if ($(this).val() == 'Yes') {

                        //$("#need_interim_storage_details").prop('required',true);
                        $("#need_interim_storage_fields").show();
                    } else {
                        //$("#need_interim_storage_details").prop('required',false);
                        $("#need_interim_storage_fields").hide();
                    }

                });



                $("#do_hv_lrg_frmt_botlles").change(function() {
                    if ($(this).val() == 'Yes') {

                        $("#do_hv_lrg_frmt_botlles_fields").show();
                        //$("#do_hv_lrg_frmt_botlles_details").prop('required',true);
                    } else {
                        $("#do_hv_lrg_frmt_botlles_fields").hide();
                        //$("#do_hv_lrg_frmt_botlles_details").prop('required',false);
                    }

                });

                $('#delivery_zip').keyup(function() {
                    var raw_text = $(this).val();
                    var return_text = raw_text.replace(/[^0-9]/g, '');
                    $(this).val(return_text);
                });
                $('#pickup_zip').keyup(function() {
                    var raw_text = $(this).val();
                    var return_text = raw_text.replace(/[^0-9]/g, '');
                    $(this).val(return_text);
                });



                $('#delivery_state').keyup(function() {

                    var raw_text = $(this).val();
                    var return_text = raw_text.replace(/[^A-Za-z]/g, '');
                    $(this).val(return_text.toUpperCase());
                });


                $('#pickup_state').keyup(function() {

                    var raw_text = $(this).val();
                    var return_text = raw_text.replace(/[^A-Za-z]/g, '');
                    $(this).val(return_text.toUpperCase());
                });
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
