
@extends('layouts.loginHeader')
@extends('layouts.datepickerHead')

@section('title','Home')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">USER home page</div>

                <div class="panel-body">
                <div class="jumbotron">
				<p><h2>Leave your children in safe hands</h2><br>
				    IMG 4208 Leaving your young child isn't easy, 
					but when the time comes, you want to know that they will be nurtured and cherished.
					Each child entrusted into our care is allocated at least one ‘key person’. This is
					a member of the staff team that will form a particularly close working relationship
					with them. This role exists to complement the bond between a child and family. It 
					recognises that individual children need responsive adults that can build relationships
					with children that are reciprocal, loving and respectful.
				</P>
				</div>
				<i class="fa fa-file-pdf-o fa-2x pdf" aria-hidden="true">
					<a href="{{ URL::route('pdfview')}}">Inciden/Illness form</a>
				</i><br><br>
                 <i class="fa fa-file-pdf-o fa-2x pdf" aria-hidden="true">
					<a href="{{ URL::route('registerationForm')}}">Download registeration form</a>
				</i>
                </div>
            </div>
        </div>
    </div>
@endsection
