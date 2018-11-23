
@extends('layouts.loginHeader')
@extends('layouts.datepickerHead')

@section('title','View all record')

@section('content')

<h1>View All Events</h1><br>
        @if (Session::has('successDel'))
			<div class="alert alert-success">{{ Session::get('successDel') }}
		@endif
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Title</td>
            <td>Start</td>
            <td>End</td>
            <td>Actions</td>
        </tr>	`
    </thead>
    <tbody>
	@if(!empty($userBooking))
    @foreach($userBooking as $key => $value)
        <tr>
            <td>{{ $value->title }}</td>
            <td>{{ $value->start }}</td>
            <td>{{ $value->end }}</td>

            <!-- show, edit, and delete buttons -->
            <td>
                <a class="btn btn-small btn-success" href="{{ route('showuser', ['id' => $value->id]) }}">Display this event</a>
            </td>
        </tr>
    @endforeach
	@endif
    </tbody>
</table>

@endsection