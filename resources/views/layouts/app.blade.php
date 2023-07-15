<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{env('APP_NAME')}}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{@asset('assets/images/logo/favicon.png')}}">

    <!-- page css -->
    <link href="{{@asset('assets/vendors/select2/select2.css')}}" rel="stylesheet">
    <link href="{{@asset('assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">

    <!-- Core css -->
    <link href="{{@asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">

    <link href="{{@asset('assets/css/app.min.css')}}" rel="stylesheet">
    <link href="{{@asset('assets/css/chatBot.css')}}" rel="stylesheet">
    <script src="{{@asset('assets/vendors/chartjs/Chart.min.js')}}"></script>
    <script src="{{@asset('assets/vendors/chartist/chartist.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.8/push.min.js" ></script>
</head>

<body>
    @include('components.toastr')
    <div class="app">
        <div class="layout">
            <div class="header">
                <div class="logo logo-dark">
                    <a href="{{url('dashboard')}}">
                        <img src="{{@asset('assets/images/logo/logo.png')}}" alt="Logo">
                        <img class="logo-fold" src="{{@asset('assets/images/logo/logo.png')}}" alt="Logo">
                    </a>
                </div>
                <div class="nav-wrap">
                    <ul class="nav-left">
                        <li>
                            @php
                                $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";  
                                $CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                            @endphp
                            <a href="{{$CurPageURL}}">
                                <i class="anticon anticon-reload"></i>
                            </a>
                        </li>
                        <li class="mobile-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="dropdown dropdown-animated scale-left">
                            <div class="pointer" data-toggle="dropdown">
                                <div class="avatar avatar-image  m-h-10 m-r-15">
                                    <img src="{{@asset('assets/images/avatars/user.png')}}"  alt="">
                                </div>
                            </div>
                            <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                                <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                                    <div class="d-flex m-r-50">
                                        <div class="avatar avatar-lg avatar-image">
                                            <img src="{{@asset('assets/images/avatars/user.png')}}" alt="">
                                        </div>
                                        <div class="m-l-10">
                                            <p class="m-b-0 text-dark font-weight-semibold">----</p>
                                            <p class="m-b-0 opacity-07">----</p>
                                        </div>
                                    </div>
                                </div>
                                {{-- <a href="{{url('edit-profile')}}" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-user"></i>
                                            <span class="m-l-10">{{__("Edit Profile")}}</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a> --}}
                                {{-- <a href="{{url('logout')}}" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                            <span class="m-l-10">Logout</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a> --}}
                            </div>
                        </li>
                    </ul>
                </div>
            </div>    
           
            <div class="side-nav">
                <div class="side-nav-inner">
                    <ul class="side-nav-menu scrollable">
                        <li class="nav-item">
                            <a class="dropdown-toggle" href="{{url('event')}}">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dashboard"></i>
                                </span>
                                <span class="title">Event</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @yield('content')
        </div>
    </div>

    
    <!-- Core Vendors JS -->
    <script src="{{@asset('assets/js/vendors.min.js')}}"></script>
    <script src="{{@asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{@asset('assets/vendors/select2/select2.min.js')}}"></script>
    <script src="{{@asset('assets/js/custom.js')}}"></script>
    <script src="{{@asset('assets/js/system.js')}}"></script>

    <!-- page js -->
    {{-- <script src="{{@asset('assets/js/pages/dashboard-default.js')}}"></script> --}}
    <!-- page js -->
    <script src="{{@asset('assets/vendors/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{@asset('assets/vendors/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{@asset('assets/js/pages/datatables.js')}}"></script>
    <script>
        $('#data-table').DataTable();
        $('.select2').select2();
    </script>

    <!-- Core JS -->
    <script src="{{@asset('assets/js/app.min.js')}}"></script>
</body>

</html>