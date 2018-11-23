
@extends('layouts.loginHeader')
@extends('layouts.datepickerHead')

@section('title','View school club bookings')

@section('content')

<h1>View All Events</h1><br>
        @if (Session::has('successDel'))
			<div class="alert alert-success">{{ Session::get('successDel') }}
		@endif
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Session name</td>
            <td>Session one</td>
            <td>Session two</td>
            <td>Child name</td>
			<td>Date of birth</td>
            <td>parent name</td>
            <td>Phone</td>
			<td>Email</td>
			<td>Session date</td>
			<td>Payment status</td>
			<td>Action</td>
        </tr>	`
    </thead>
    <tbody>
    @foreach($school_club_booking as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->session_name }}</td>
			<td>{{ $value->session1 }}</td>
			<td>{{ $value->session2 }}</td>
			<td>{{ $value->child_name }}</td>
            <td>{{ $value->d_o_b }}</td>
            <td>{{ $value->parent_name }}</td>
			<td>{{ $value->phone }}</td>
			<td>{{ $value->email }}</td>
			<td>{{ $value->date }}</td>
			<td>{{ $value->payment }}</td>

            <!-- show, edit, and delete buttons -->
            <td>
                <a class="btn btn-small btn-info" href="{{ route('editSchoolClubBooking',['id' => $value->id]) }}">Edit payment</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection