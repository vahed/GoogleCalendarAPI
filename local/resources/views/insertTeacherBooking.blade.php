
@extends('layouts.loginHeader')
@extends('layouts.datepickerHead')
@section('title', 'Teacher booking child review')

@section('content')
	<script>
	
	$(document).ready(function(){
		
		jQuery(function(){
		 jQuery('#datetimepicker1').datetimepicker({
		  timepicker:true,
		  //format:'d-m-Y h:00:00',
		 });
		 jQuery('#datetimepicker2').datetimepicker({
		  timepicker:true,
		  //format:'d-m-Y h:00:00',
		 });
		});

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
					<h1>Create child review booking</h1>
				</div>    

				<!-- FORM STARTS HERE -->
				<form method="POST" action="{{ route('teacherbooking') }}" novalidate>
                    {{ csrf_field() }}
					<div class="form-group">
						<label for="name">Booking Title</label>
						<input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" placeholder="Title">
					</div>
					
					<div class="form-group">
						<label for="teacher_name">Teacher name</label>
						<input name="teacher_name" id="teacher_name" class="form-control" value="{{ old('teacher_name') }}" placeholder="Teacher name">
					</div>

					<div class="form-group">
						<label for="name">Start</label>
						<input name="start" id="datetimepicker1" class="form-control" value="{{ old('start') }}" placeholder="start date">
					</div>

					<div class="form-group">
						<label for="name">End</label>
						<input name="end" id="datetimepicker2" class="form-control" value="{{ old('end') }}" placeholder="start date">
					</div>
					
					<button id="submitdatepicker" name="submitdatepicker" type="submit" class="btn btn-success">Create booking</button>
				</form>
			</div>
		</div>
	<link rel="stylesheet" type="text/css" href="{{ asset('js/datetimepicker-master/jquery.datetimepicker.css') }}"/ >
	<script src="{{ asset('js/datetimepicker-master/jquery.js') }}"></script>
	<script src="{{ asset('js/datetimepicker-master/build/jquery.datetimepicker.full.min.js') }}"></script>
@endsection