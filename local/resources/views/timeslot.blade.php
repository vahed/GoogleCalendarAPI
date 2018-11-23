@extends('layouts.head')
@extends('layouts.loginHeader')
@extends('layouts.datepickerHead')

@section('title','Time slot')

@section('content')
    <script>
	
	$(document).ready(function() {
		
	    $( ".row-heading" ).click(function() {
		  $(".hidden-row").slideDown();
		});	
    });
	</script>

	<div class="container">
	
	<h1 align="center">Pick an available time slot</h1><br>
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
	
	<div class="panel panel-primary">
		<div class="panel-heading">
			    Time slot
		</div>
			<div class="panel-body" id="calendar">
	        <table class="table"> 
			   <tbody>
			        <h3>Fill up details</h3><br>
			        <form method="POST" action="{{ route('storeTimeslot') }}">
					{{ csrf_field() }}
					  <div class="form-group">
						<label for="fullname">Full name</label>
						<input type="text" class="form-control" name="fullname" id="fullname" placeholder="Full name" value="{{Auth::user()->name}}" >
					  </div>
					  <div class="form-group">
						<label for="child_name">Child name</label>
						<input type="text" class="form-control" name="child_name" id="child_name" placeholder="Child name" value="{{ old('child_name') }}" >
					  </div>
					  <div class="form-group">
						<label for="phone">Phone</label>
						<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone number" value="{{ old('phone') }}">
					  </div>
					  <div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" name="email" id="email" placeholder="Email@yahoo.com" value="{{Auth::user()->email}}" >
						
						<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
					  </div>
					   
					  <h3 class="row-heading h-style">
					      <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                          Click here to pick up an available time slot
					  </h3><br>
								<div class="d-inline box-info"></div><label class="d-inline">Available</label><br>
								<div class="box-danger"></div><label>Unvailable</label><br><br>

					  <div class="row hidden-row">
						  @foreach ($res as $value)
						   
							<div class="col-md-3">{!! $value !!}</div>
						  @endforeach
					  </div>
					</form>
			   </tbody>
			</table>
		</div>
	</div>
	</div>
@endsection