
@extends('layouts.loginHeader')
@extends('layouts.datepickerHead')

@section('title','Edit payment')

@section('content')
	<script>
	
	$(document).ready(function(){
		$val =$('#payment').val();
		$p_type = $('#payment_type').val();
		//alert($p_type);
		if($val=='paid'){
		   $("#paid").hide();
		}
		else if($val=='pending'){
		   $("#pending").hide();
		}
		else if($p_type=='card'){
		   $("#card").val().hide();
		}
		else if($p_type=='card'){
		   $("#card").val().hide();
		}
		else if($p_type=='cheque'){
		   $("#cheque").val().hide();
		}
		else if($p_type=='transfer'){
		   $("#transfer").val().hide();
		}
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

		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">

				<div class="page-header">
					<h1>Update payment</h1>
				</div>    

				<!-- FORM STARTS HERE -->
				<form method="POST" action="{{ route('updateSchoolClubBooking', ['id' => $school_club_booking->id]) }}" novalidate>
                    {{ csrf_field() }}
					<div class="form-group">
						<label for="session_name">Session name</label>
						<input type="text" name="session_name" id="session_name" class="form-control" value="{{ $school_club_booking->session_name }}" disabled>
					</div>
					
					<div class="form-group">
						<label for="parent_name">Parent name</label>
						<input type="text" name="parent_name" id="parent_name" class="form-control" value="{{ $school_club_booking->parent_name }}" disabled>
					</div>

					<div class="form-group">
						<label for="phone">Phone</label>
						<input type="number_format" name="phone" id="phone" class="form-control" value="{{ $school_club_booking->phone }}" disabled>
					</div>

					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" id="email" class="form-control" value="{{ $school_club_booking->email }}" disabled>
					</div>
					
					<div class="form-group">
					  <label for="payment">Payment:</label>
					  <select class="form-control" id="payment" name="payment">
						<option value="{{ $school_club_booking->payment }}" selected>{{ $school_club_booking->payment }}</option>
						<option value="pending" id="pending">pending</option>
						<option value="paid" id="paid">paid</option>
					  </select> 
					</div>
					
					<div class="form-group">
					  <label for="payment_type">Payment type:</label>
					  <select class="form-control" id="payment_type" name="payment_type">
						<option value="{{ $school_club_booking->payment_type }}" selected>{{ $school_club_booking->payment_type }}</option>
						<option value="cash" id="cash">cash</option>
						<option value="card" id="card">card</option>
						<option value="cheque" id="cheque">cheque</option>
						<option value="transfer" id="transfer">transfer</option>
					  </select> 
					</div>
					
					<button id="submitdatepicker" name="submitdatepicker" type="submit" class="btn btn-success">Create booking</button>
				</form>
		    </div>
		</div>
	
@endsection