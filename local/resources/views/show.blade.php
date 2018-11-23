
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
		@if(!empty($booking))
		<div class="panel panel-primary">
			<div class="panel-heading">
				Booking information
			</div>
			
		
		<div class="panel-body" id="calendar">
		<h2 align="center">{{ $booking->title }}</h2> 
		<table class="table table-striped table-bordered">
		<thead>
			<tr>
			    <td><strong>Booking date</strong></td>
				<td><strong>Start date and time:</strong></td>
				<td><strong>End date and time:</strong></td>
				<td><strong>Action</strong></td>
			</tr>	`
		</thead>
		<tbody>
		<tbody>
		
		<tr>
			<td>{{ $booking->event_type }}</td>
			<td>{{ $booking->start}}</td>
			<td>{{ $booking->end}}</td>
			<td>
			    <a class="btn btn-small btn-info" href="{{ route('edit',$booking->id) }}">Edit Booking</a>
                <a class="btn btn-small btn-danger" href="{{ route('destroy', ['id' => $booking->id]) }}">Delete</a>
		    </td>
		</tr>
		
		</tbody>
	    </table>

            </div>
		</div>
		@endif
@endsection