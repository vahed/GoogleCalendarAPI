
@extends('layouts.loginHeader')
@extends('layouts.datepickerHead')

@section('title','Dashboard')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ADMIN Dashboard</div>

                <div class="panel-body">
                    
					<div class="jumbotron">
				    <p><h2>Your are logged in as Administrator</h2><br>
				    The adinistrator is able to view calendar, insert new booking into
					Database tables, update existing records, delete database records.
					
				    </P>
				    </div>
					<i class="fa fa-file-pdf-o fa-2x pdf" aria-hidden="true">
					<a href="{{ URL::route('pdfview')}}">Download Inciden/Illness form</a>
					</i><br><br>
					 <i class="fa fa-file-pdf-o fa-2x pdf" aria-hidden="true">
						<a href="{{ URL::route('registerationForm')}}">Download registeration form</a>
					</i>
                </div>
				
            </div>
        </div>
    </div>
@endsection