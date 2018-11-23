
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
            <td>ID</td>
            <td>Title</td>
            <td>Start</td>
            <td>End</td>
            <td>Actions</td>
        </tr>	`
    </thead>
    <tbody>
    @foreach($booking as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ $value->start }}</td>
            <td>{{ $value->end }}</td>

            <!-- show, edit, and delete buttons -->
            <td>
                <a class="btn btn-small btn-success" href="{{ route('show', ['id' => $value->id]) }}">Show this event</a>
                <a class="btn btn-small btn-info" href="{{ route('edit',['id' => $value->id]) }}">Edit this event</a>
                <a class="btn btn-small btn-danger" href="{{ route('destroy', ['id' => $value->id]) }}">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection