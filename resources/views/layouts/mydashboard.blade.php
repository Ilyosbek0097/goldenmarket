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

    <title>@yield('title')</title>

    <meta name="description" content=""/>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ URL::to('../assets/img/favicon/favicon.ico') }}"/>

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
              <span class="app-brand-logo demo">
                <svg
                    width="25"
                    viewBox="0 0 25 42"
                    version="1.1"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                >
                  <defs>
                    <path
                        d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                        id="path-1"
                    ></path>
                    <path
                        d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                        id="path-3"
                    ></path>
                    <path
                        d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                        id="path-4"
                    ></path>
                    <path
                        d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                        id="path-5"
                    ></path>
                  </defs>
                  <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                      <g id="Icon" transform="translate(27.000000, 15.000000)">
                        <g id="Mask" transform="translate(0.000000, 8.000000)">
                          <mask id="mask-2" fill="white">
                            <use xlink:href="#path-1"></use>
                          </mask>
                          <use fill="#696cff" xlink:href="#path-1"></use>
                          <g id="Path-3" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-3"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                          </g>
                          <g id="Path-4" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-4"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                          </g>
                        </g>
                        <g
                            id="Triangle"
                            transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) "
                        >
                          <use fill="#696cff" xlink:href="#path-5"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </span>
                    <span class="app-brand-text demo menu-text fw-bolder ms-2">Sneat</span>
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
                                    <img src="{{ asset('../assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle"/>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="../assets/img/avatars/1.png" alt
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
                                    <a class="dropdown-item" href="#">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bx bx-cog me-2"></i>
                                        <span class="align-middle">Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <form method="POST" id="form-id" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="#"  onclick="document.getElementById('form-id').submit();">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
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
                            , made with ❤️ by
                            <a href="#" target="_blank" class="footer-link fw-bolder">ILYOSBEK</a>
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
