<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
	<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>
    <!--<div id="app">-->
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar if user logged in as admin -->
					@if(Auth::check() && Auth::user()->is_admin()=='admin')
						   <ul class="nav navbar-nav">
							 <li><a href="{{ URL::route('calindex') }}">Calendar events</a></li>
							 <li><a href="{{ URL::route('create') }}">Create Event</a>
							 <li><a href="{{ URL::route('showAll')}}">View Events</a>
							 <li><a href="{{ URL::route('schoolClubBookingRec')}}">View school club bookings</a>
						   </ul>
			        <!-- Left Side Of Navbar if user logged in as normal user -->
					@elseif(Auth::check() && Auth::user()->is_admin()=='teacher')
						   <ul class="nav navbar-nav">
							 <li><a href="{{URL::route('teacherinsertbooking')}}">Create new booking</a></li>
							 <li><a href="{{URL::route('teacherEvents')}}">Calendar events</a></li>
                           </ul>
				    <!-- Left Side Of Navbar if user logged in as normal user -->
					@elseif(Auth::check() && Auth::user()->is_admin()=='user')
						   <ul class="nav navbar-nav">
						     <li><a href="{{ URL::route('home')}}">Home</a></li>
							 <li><a href="{{ URL::route('usereventcal')}}">Events calendar</a></li>
							 <li><a href="{{ URL::route('showAllUserBooking')}}">View Events</a></li>
							 <li><a href="{{ URL::route('insertAdhocApp')}}">Book adhoc appointment</a></li>
							 <li><a href="{{ URL::route('clubBookingdates')}}">Book school club</a></li>
							 <li><a href="{{ URL::route('viewTimeslot')}}">View/book timeslot</a></li>
							 <li><a href="{{ URL::route('notificationForm')}}">Report incident</a></li>
						   </ul>
                    @endif   

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif			
                    </ul>
                </div>
				
				<div class='row nav-row'>
					   <div class="col-md-8 left-text">
					       <h1>Jakeman Early Years Centre</h1>
					       <h3>Neighbourhood Nersury and Nursery School</h3>
					   </div>
                       <div class="col-md-4 right-text">
					       <p>Jakeman Road , Balsall Heath<br>
					       Birmingham , West Midlands, B12 9NX<br>
						   Tel: 0121 440 3066<br>
						   Fax: 0121 440 8310<br>
						   enquiry@jakeman.bham.sch.uk</p>
					   </div>
				</div>
				
            </div>
        </nav>
    <!--</div>-->
    
    <div class="container">	
        @yield('content')
    </div>
	
	@include('layouts.footer')
	
    </body>
</html>