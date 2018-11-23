
@extends('layouts.loginHeader')
@extends('layouts.datepickerHead')
@section('title', 'Insert record')

@section('content')
	<script>
	
	$(document).ready(function(){
		
        /*jQuery('#datetimepicker1').datetimepicker({
		   timepicker:true,
		   mask:false, // '9999/19/39 29:59' - digit is the maximum possible for a cell
		   format:'y/m/d',
	   });*/
	   $('#datetimepicker1').datetimepicker();
	});
	</script>

	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </ul>
    </div>
    @endif
	
	@if(Session::has('success'))
		<div class="alert alert-success">{{Session::get('success')}}</div>
	@endif
    @if(Session::has('error'))
		<div class="alert alert-danger">{{Session::get('error')}}</div>
	@endif

		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">

				<div class="page-header">
					<h1>Request ad hoc appointment</h1>
				</div>    

				<!-- FORM STARTS HERE -->
				<form method="POST" action="{{ route('storeAdhocApp') }}" novalidate>
                    {{ csrf_field() }}
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" id="title" class="form-control" value="{{Auth::user()->name}}" placeholder="Name">
					</div>

					<div class="form-group">
						<label for="name">Appointment date and time</label>
						<input name="date" id="datetimepicker1" class="form-control" value="{{ old('date') }}" placeholder="choose date">
					</div>
					
					 <div class="form-group">
						<label for="exampleTextarea">Reason for appointment</label>
						<textarea name="reason" class="form-control" id="exampleTextarea" rows="3"></textarea>
					 </div>
					
					<button id="submitdatepicker" name="submitdatepicker" type="submit" class="btn btn-success">Book adhoc Appointment</button>
				</form>
		    </div>
		</div>
	<link rel="stylesheet" type="text/css" href="{{ asset('js/datetimepicker-master/jquery.datetimepicker.css') }}"/ >
	<script src="{{ asset('js/datetimepicker-master/jquery.js') }}"></script>
	<script src="{{ asset('js/datetimepicker-master/build/jquery.datetimepicker.full.min.js') }}"></script>
@endsection