
@extends('layouts.loginHeader')
@extends('layouts.datepickerHead')

@section('title','View all record')

@section('content')

<h1>View club sessions</h1><br>
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
    @foreach($clubBookingSess as $key => $value)
        <tr>
            <td>{{ $value->title }}</td>
            <td>{{ $value->start }}</td>
            <td>{{ $value->end }}</td>

            <!-- show, edit, and delete buttons -->
            <td>
                <a class="btn btn-small btn-success" href="{{ route('showclubsessionbookingform', ['id' => $value->id]) }}">Book club session</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection