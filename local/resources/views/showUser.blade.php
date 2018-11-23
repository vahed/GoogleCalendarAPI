
@extends('layouts.loginHeader')
@extends('layouts.datepickerHead')

@section('title','Show record')

@section('content')
        
		@if(Session::has('successDel'))
			<div class="alert alert-success">{{ Session::get('successDel') }}
		        <ul>
		        <li><a href="{{  URL::route('showAll')}}">View booking</a>
				<li><a href="{{ URL::to('events') }}">Calendar booking</a></li>
				</ul>
			</div>
		@endif
		@if(!empty($userBooking))
		<div class="panel panel-primary">
			<div class="panel-heading">
				Booking information
			</div>
			
		
		<div class="panel-body" id="calendar">
		<h2 align="center">{{ $userBooking->title }}</h2> 
		<table class="table table-striped table-bordered">
		<thead>
			<tr>
			    <td><strong>Booking date</strong></td>
				<td><strong>Start date and time:</strong></td>
				<td><strong>End date and time:</strong></td>
			</tr>	`
		</thead>
		<tbody>
		<tbody>
		
		<tr>
			<td>{{ $userBooking->event_type }}</td>
			<td>{{ $userBooking->start}}</td>
			<td>{{ $userBooking->end}}</td>
		</tr>
		
		</tbody>
	    </table>

            </div>
		</div>
		@endif
@endsection