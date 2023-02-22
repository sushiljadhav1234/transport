<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <style>
        .select2-container--default .select2-selection--multiple {
            background-color: #1A233A;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background: linear-gradient(to bottom, #5a8dee 0%, #0f44ab 100%);
            border: 0.5px solid #2055ba;
        }

        .select2-dropdown {
            background-color: #000;
        }

        .select2-container--default .select2-results__option[aria-selected=true] {
            background-color: #5897FB;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />


    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap4 Dashboard Template">
    <meta name="author" content="ParkerThemes">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" />

    <!-- Title -->
    <title>TRANSPORT MANAGEMENT SYSTEM</title>


    <!-- *************
   ************ Common Css Files *************
  ************ -->
    <!-- Bootstrap css -->

    <!-- Icomoon Font Icons css -->
    <link rel="stylesheet" href="{{ asset('fonts/style.css') }}">
    <!-- Main css -->

    <!-- Chat css -->
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    <!-- Data Tables -->
    <link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bs4.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bs4-custom.css') }}" />
    <link href="{{ asset('vendor/datatables/buttons.bs.css') }}" rel="stylesheet" />


    <!-- *************
   ************ Vendor Css Files *************
  ************ -->

    <!--**************************
   **************************
    **************************
       Required JavaScript Files
    **************************
   **************************
  **************************-->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/moment.js') }}"></script>
    <script src="{{ asset('js/moment.js') }}"></script>
    


    <!-- *************
   ************ Vendor Js Files *************
  ************* -->
    <!-- Slimscroll JS -->
    <script src="{{ asset('vendor/slimscroll/slimscroll.min.js') }}"></script>
    <script src="{{ asset('vendor/slimscroll/custom-scrollbar.js') }}"></script>

    <!-- Polyfill JS -->
    <script src="{{ asset('vendor/polyfill/polyfill.min.js') }}"></script>
    <script src="{{ asset('vendor/polyfill/class-list.min.js') }}"></script>


    <!-- Circleful Charts -->
    <script src="{{ asset('vendor/circliful/circliful.min.js') }}"></script>
    <script src="{{ asset('vendor/circliful/circliful.custom.js') }}"></script>
    <!-- Data Tables -->
    <script src="{{ asset('vendor/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('js/main.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <style>
        label.error {
            color: red;
        }
    </style>


    <script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert/sweetalert-dev.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('vendor/sweetalert/sweetalert.css') }}">



    <!-- Input Tags JS -->
    <script src="{{ asset('vendor/input-tags/tagsinput.min.js') }}"></script>
    <script src="{{ asset('vendor/input-tags/typeahead.js') }}"></script>
    <!-- Input Tags css -->
    <link rel="stylesheet" href="{{ asset('vendor/input-tags/tagsinput.css') }}" />



    <!-- Select2 -->
    <script src="{{ asset('vendor/select2/dist/js/select2.full.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('vendor/select2/dist/css/select2.min.css') }}">




    <!-- Datepicker css -->
    <link rel="stylesheet" href="{{ asset('vendor/datepicker/css/classic.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/datepicker/css/classic.date.css') }}" />

    <!-- Datepickers -->
    <script src="{{ asset('vendor/datepicker/js/picker.js') }}"></script>
    <script src="{{ asset('vendor/datepicker/js/picker.date.js') }}"></script>
    <script src="{{ asset('vendor/datepicker/js/custom-picker.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>


    <title>
        {{-- Argon Dashboard 2 by Creative Tim --}}
    </title>
    <!--     Fonts and icons     -->

</head>

<body class="{{ $class ?? '' }}">

    @if (!Auth::user())
        @yield('content')
    @endif

    @if (Auth::user())
        @include('layouts.header')


        @yield('content')
    @endif

    

</body>

</html>
