<!DOCTYPE html>
<!-- beautify ignore:start -->
<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../assets/"
    data-template="vertical-menu-template-free"
>
<head>
    <meta charset="utf-8"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <meta name="description" content=""/>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ URL::to('../assets/img/avatars/logo2.png') }}"/>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />
    <!-- Select2 CSS -->
    <link href="{{ asset('../assets/css/select2.css') }}" rel="stylesheet" />
    <link href="{{ asset('../assets/js/swetalert2/sweetalert2.css') }}" rel="stylesheet" />


{{--    <link href="{{ asset('../assets/css/select2.min.css') }}" rel="stylesheet" />--}}

    {{--Datatable CSS   --}}
{{--    <link href="{{ asset('../assets/css/datatable.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ asset('../assets/css/responsive.datatable.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ asset('../assets/css/datatable/typehead.css') }}" rel="stylesheet" />--}}
    <link href="{{ asset('../assets/css/datatable/datatable-bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('../assets/css/datatable/responsive.datatable.css') }}" rel="stylesheet" />
{{--Bs- Stepper--}}
    <link href="{{ asset('../assets/css/bs-stepper/bs-stepper.css') }}" rel="stylesheet" />
    <link href="{{ asset('../assets/css/bs-stepper/bootstrap-select.css') }}" rel="stylesheet" />


{{--    <link href="{{ asset('../assets/css/datatable/checkbox.datatable.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ asset('../assets/css/datatable/buttons.datatable.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ asset('../assets/css/datatable/rowgroup.datatable.css') }}" rel="stylesheet" />--}}
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href=" {{ asset('../assets/vendor/fonts/boxicons.css')}}"/>
    <link rel="stylesheet" href=" {{ asset('../assets/vendor/fonts/font_awesome.min.css')}}"/>
    <!-- Core CSS -->

    <link rel="stylesheet" href=" {{ asset('../assets/vendor/css/core.css')}}"  class="template-customizer-core-css"/>
    <link rel="stylesheet" class="template-customizer-theme-css" href=" {{ asset('../assets/vendor/css/theme-default.css')}}"/>
    <link rel="stylesheet" href=" {{ asset('../assets/css/demo.css')}}"/>

    <!-- Vendors CSS -->
    <link rel="stylesheet" href=" {{ asset('../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}"/>

    <link rel="stylesheet" href=" {{ asset('../assets/vendor/libs/apex-charts/apex-charts.css')}}"/>


    <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"/>-->



    <!-- Row Group CSS -->
    <!-- Helpers -->

    <script src=" {{ asset('../assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <script src="{{ asset('../assets/js/template.customize.js') }}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src=" {{ asset('../assets/js/config.js')}}"></script>
    <style>
        .select2-selection__arrow{
            margin-top: 15px;
        }
        table.dataTable thead .sorting:before, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_desc_disabled:before {
            right: 1em;
            content: "\02C6" !important;
        }

        table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after {
            right: 0.5em;
            content: "\02C7" !important;
        }
        .swal2-container {
            z-index: 10000000000000;
        }
    </style>
    @yield('style')
</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="index.html" class="app-brand-link">
                    <img src="{{ asset('../assets/img/avatars/logo2.png') }}">
                    <span class="app-brand-text demo menu-text fw-bolder ms-2" style="text-transform: capitalize">Tillozor</span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>
                <ul class="menu-inner py-1">
                    @include('elements.menu')
                </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->

            <nav
                class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                id="layout-navbar"
            >
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <!-- Search -->
                    <div class="navbar-nav align-items-center">
                        <div class="nav-item d-flex align-items-center mr-3" >
                            <i class="bx bx-money fs-4 lh-0"></i>
                            <input id="currency_id"
                                type="text"
                                class="form-control border-0 shadow-none" readonly
                                value="Kurs: {{ number_format(session()->get('dollar_kursi'), 0, '.', ' ') }} UZS"
                                aria-label="Search..."
                            />

                        </div>
                        <div class="nav-item d-flex align-items-center ml-3" >
                            <i class="bx bx-location-plus fs-4 lh-0"></i>
                            <input id="branch_name"
                                   type="text"
                                   class="form-control border-0 shadow-none" readonly
                                   value="Filiali: {{ auth()->user()->branch->name ?? '' }} "
                                   aria-label="Search..."
                            />

                        </div>
{{--                        <span class="badge bg-success">{{ auth()->user()->branch->name }} Filiali</span>--}}

                    </div>
                    <!-- /Search -->

                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <!-- Place this tag where you want the button to render. -->
                        <li class="nav-item lh-1 me-3">
                            <a href="#" class="mt-2">
                                {{ auth()->user()->name; }}
                            </a>
                            <p class="text-center ">{{ auth()->user()->role; }}</p>

                        </li>

                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                               data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="{{ asset('../assets/img/avatars/6.png') }}" alt class="w-px-40 h-auto rounded-circle"/>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="{{ asset('../assets/img/avatars/6.png') }}" alt
                                                         class="w-px-40 h-auto rounded-circle"/>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block">{{ auth()->user()->name; }}</span>
                                                <small class="text-muted text-uppercase">{{ auth()->user()->role; }}</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <form method="POST" id="form-id" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item text-danger" href="#"  onclick="document.getElementById('form-id').submit();">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Chiqish</span>
                                        </a>
                                    </form>

                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                    </ul>
                </div>
            </nav>

            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    @yield('content')
                </div>
                <!-- / Content -->

                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">
                            ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            , made with ❤️ by <i class="bx bxl-telegram"></i>
                            <a href="https://t.me/ilyos_saydaliyev" target="_blank" class="footer-link fw-bolder" style="font-family:'monospace'; font-weight: 100">Ilyosbek</a>
                        </div>
                    </div>
                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->


<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->

<script src=" {{ asset('../assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src=" {{ asset('../assets/vendor/libs/popper/popper.js')}}"></script>
<script src=" {{ asset('../assets/vendor/js/bootstrap.js')}}"></script>
<script src=" {{ asset('../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

<script src=" {{ asset('../assets/vendor/js/menu.js')}}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src=" {{ asset('../assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script src="{{ asset('../assets/js/bs-stepper/bootstrap-select.js') }}"></script>

{{--<script src="{{ asset('../assets/js/datatable.js') }}"></script>--}}
<script src="{{ asset('../assets/js/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('../assets/js/basic.datatable.js') }}"></script>




{{--<script src="{{ asset('../assets/js/responsive.datatable.js') }}"></script>--}}
{{--<script src="{{ asset('../assets/js/responsive.bootstrap.js') }}"></script>--}}
<!-- Main JS -->
<script src=" {{ asset('../assets/js/main.js')}}"></script>

<!-- Page JS -->
<script src=" {{ asset('../assets/js/dashboards-analytics.js')}}"></script>
<script src="{{ asset('../assets/js/select2.min.js') }}"></script>
<script src="{{ asset('../assets/js/bootstrap.select2.js') }}"></script>
<script src="{{ asset('../assets/js/bs-stepper/bs-stepper.js') }}"></script>

<script src="{{ asset('../assets/js/bs-stepper/form-wizard.js') }}"></script>
<script src="{{ asset('../assets/js/swetalert2/sweetalert2.js') }}"></script>
<script>
    $(document).ready(function(){
        $(".select2").select2();


    });
</script>
{{--Input Mask Js--}}
<script src=" {{ asset('../assets/js/imask.js')}}"></script>
<script>

    $(".datatable").DataTable({

        "language": {
            "search": "Qidirish: ",
            "info": "Ko'rsatilyapti _START_ dan _END_ gacha _TOTAL_ ta qatordan",
            "processing": "Yuklanyapti...",
            "zeroRecords": "Ma'lumotlar Topilmadi!",
            "lengthMenu": "Ko'rish _MENU_ qator",
            "paginate": {
                "first": "Birinchisi",
                "last": "Oxirgisi",
                "next": ">",
                "previous": "<"
            },
        },
        processing: true,
        responsive: true,
        ordering: false,
    });
    var startPhoneMask = IMask(document.getElementById('phone1'), {
        mask: '(00) 000-00-00'
    }).on('accept', function() {
        document.getElementById('phone1').style.display = '';
        document.getElementById('phone1').innerHTML = startPhoneMask.unmaskedValue;
    }).on('complete', function() {
        document.getElementById('phone1').style.display = 'inline-block';
    });
    var startPhoneMask2 = IMask(document.getElementById('phone2'), {
        mask: '(00) 000-00-00'
    }).on('accept', function() {
        document.getElementById('phone2').style.display = '';
        document.getElementById('phone2').innerHTML = startPhoneMask2.unmaskedValue;
    }).on('complete', function() {
        document.getElementById('phone2').style.display = 'inline-block';
    });


</script>

<!-- Place this tag in your head or just before your close body tag. -->
{{--<script async defer src="https://buttons.github.io/buttons.js"></script>--}}

@yield('script')

</body>
</html>
