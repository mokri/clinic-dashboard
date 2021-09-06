<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.ico')}}">
    <title>ESSAT-Clinique</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tagsinput.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fullcalendar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/typo.css') }}">

    <!--[if lt IE 9]>
		<script src="{{ asset('js/html5shiv.min.js') }}"></script>
		<script src="{{ asset('js/respond.min.js') }}"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
			<div class="header-left">
				<a href="{{ route('home') }}" class="logo">
					<img src=" {{asset('img/logo.png')}}" width="60" height="70" alt=""><span>EssatClinique</span>
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
          
             
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
							<img class="rounded-circle" src="{{ asset('img/user.jpg') }}" width="24" alt="Admin">
							<span class="status online"></span>
						</span>
						<span>{{ Auth::user()->name }}</span>
                    </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="{{route('doctor.profile',["id"=>Auth::user()->id, "name"=>Auth::user()->name, "email"=>Auth::user()->email])}}">My Profile</a>
						<a class="dropdown-item" href="{{route('doctor.profile.edit',["id"=>Auth::user()->id])}}">Edit Profile</a>

                         <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" tabindex="0" class="dropdown-item" >logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                        
                        
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{route('doctor.profile',["id"=>Auth::user()->id, "name"=>Auth::user()->name, "email"=>Auth::user()->email])}}">My Profile</a>
                    <a class="dropdown-item" href="{{route('doctor.profile.edit',["id"=>Auth::user()->id])}}">Edit Profile</a>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" tabindex="0" class="dropdown-item" >logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Menu</li>
                        <li class="{{ Request::is('home') ? 'active' : 'no' }}">
                            <a href="{{route('home')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>




                        <li class="{{ Request::is('patients', 'patiens/add-patients') ? 'active' : 'no' }}">
                            <a href="{{route('patients')}}"><i class="fa fa-wheelchair"></i> <span>Les patients</span></a>
                        </li>
                        
                        <li class="{{ Request::is('appointments','appointments/add-appointments') ? 'active' : 'no' }}">
                            <a href="{{route('appointments')}}"><i class="fa fa-calendar"></i> <span>rendez-vous</span></a>
                        </li>
                      
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content">
                
            @yield('content')
            
            </div>
            
           
        </div>
    </div>
    
    

    <div class="sidebar-overlay" data-reff=""></div>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
    <script src="{{  asset('js/app.js') }}"></script>
    
    <script src="{{ asset('js/select2.min.js') }}"></script>\
    
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    
    <script src="{{ asset('js/moment.min.js') }}"></script>
    
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js')}}"></script>
    
    <script src="{{ asset('js/tagsinput.js') }}"></script>
               <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
 <script src="{{ asset('js/fullcalendar.js') }}"></script>

    <script>
        $(function () {
            $('#datetimepicker3').datetimepicker({
                format: 'LT'

            });
        });
    </script>

    <script>
        $("#names").select2( {
            placeholder: "Nom - prenom - date de naissance",
            allowClear: true
        } );
    </script>

</body>

</html>