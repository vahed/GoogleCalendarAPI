
@extends('layouts.loginHeader')
@extends('layouts.datepickerHead')
@section('title', 'Insert record')
@section('content')
	<script>
	
	$(document).ready(function(){
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
					<h1></span>Report incident</h1>
				</div>    

				<!-- FORM STARTS HERE -->
				<form method="POST" action="{{ route('storeNotification') }}" novalidate>
                    {{ csrf_field() }}
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" id="title" class="form-control" value="{{Auth::user()->name}}" placeholder="Name">
					</div>
					
					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="email" id="title" class="form-control" value="{{Auth::user()->email}}" placeholder="Name">
					</div>
					
					 <div class="form-group">
						<label for="exampleTextarea">Report incident</label>
						<textarea name="reason" class="form-control" id="exampleTextarea" rows="3"></textarea>
					 </div>
					
					<button id="submitdatepicker" name="submitdatepicker" type="submit" class="btn btn-success">Submit incident report</button>
				</form>
			</div>
		</div>
@endsection