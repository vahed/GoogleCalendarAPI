
@extends('layouts.loginHeader')
@extends('layouts.datepickerHead')
@section('title', 'Book school club')
@section('content')
	<script>
	
	$(document).ready(function(){
       $('#sel1').val('');
	   jQuery('#d_o_b').datetimepicker({
		   timepicker:false,
		   //mask:false, // '9999/19/39 29:59' - digit is the maximum possible for a cell
		   format:'y/m/d',
	   });
	   $('#aClub').each(function(){
		   this.onclick = function() {$("#twoSess").show();}
	   });
	   $('#bClub').each(function(){
		   this.onclick = function() {$("#twoSess").hide();}
	   });
	   /*$('#aClub').click(function(){
	        $("#twoSess").show();
	   });
	   $('#bClub').click(function(){
	        $("#twoSess").hide();
	   });*/
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
					<h1>Book club session</h1>
				</div>    

				<!-- FORM STARTS HERE -->
				<form method="POST" action="{{ route('schoolclubbooking', ['id' => $booking->id]) }}" novalidate>
                    {{ csrf_field() }}
					
					<div class="form-group">
						<label for="child name">Child name</label>
						<input type="text" name="childName" id="child name" class="form-control" value="{{ old('child name') }}" placeholder="Child name">
					</div>

					<div class="form-group">
						<label for="d_o_b">Date of birth</label>
						<input name="d_o_b" id="d_o_b" class="form-control" value="{{ old('d_o_b') }}" placeholder="dd-mm-yyyy">
					</div>
                    <div class="form-group">
						<label for="parent name">Parent name</label>
						<input type="text" name="parentName" id="parent name" class="form-control" value="{{Auth::user()->name}}">
					</div>
					<div class="form-group">
						<label for="phone">Phone</label>
						<input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" placeholder="phone">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" name="email" id="email" class="form-control" value="{{Auth::user()->email}}" >
					</div>
					
					 <div class="form-group">
					     <label for="sel1">Select session:</label>
						 <select class="form-control" id="sel1" name="sess_type" data-default-value="">
						    <option value=""></option>
						    <option value="Breakfast club" id="bClub">Breakfast club - £8</option>
							<option value="After school club" id="aClub">After school club</option>
						 </select>
					</div>
					
					<div class="form-check">						
						<div class="twoSess" id="twoSess">
							<label class="form-check-label">
							  <input type="checkbox" name="session1" value="session1" class="form-check-input">
							  Session one from 15:00 to 16:00 - £6
							</label><br>
							<label class="form-check-label">
							  <input type="checkbox" name="session2" value="session2" class="form-check-input">
							  Session two from 16:00 to 17:00 - £6
							</label><br><br>
						</div>
					</div>
					
					<button id="sessButton" name="sessButton" type="submit" class="btn btn-success">Book club session</button>
				</form>
			</div>
		</div>
	<link rel="stylesheet" type="text/css" href="{{ asset('js/datetimepicker-master/jquery.datetimepicker.css') }}"/ >
	<script src="{{ asset('js/datetimepicker-master/jquery.js') }}"></script>
	<script src="{{ asset('js/datetimepicker-master/build/jquery.datetimepicker.full.min.js') }}"></script>
@endsection