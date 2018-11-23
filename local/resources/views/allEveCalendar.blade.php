@extends('layouts.head')
@extends('layouts.loginHeader')
@extends('layouts.datepickerHead')

@section('title','Show calendar')

@section('content')
    <script>
	$(document).ready(function() {
		$("#calendar").fullCalendar({
		    editable:false,
			allDay: false,
			weekends: true,
		    header:{
				left:   'prev,next today',
				center: 'title',
				right:  'month,agendaWeek,agendaDay'
			    },
				eventRender: function(booking, element, view) { //booking represents event
				    if(booking.event_type=='school club')				
					    element.css('background-color', '#2ED9E1');
						else if(booking.event_type=='adhoc appointment')
				        element.css('background-color', '#C2B1B2');
					    else if(booking.event_type=='child review')
				        element.css('background-color', '#3DE12E');
					    else if(booking.event_type=='holiday')
				        element.css('background-color', '#ff0043');
				},
			events: [
			    @foreach($booking as $booking)
                {
                    title : '{{ $booking->title }}',
					event_type : '{{ $booking->event_type }}',
                    start : '{{ $booking->start }}',
                    end : '{{ $booking->end }}',
					url : '{{ route('show', $booking->id) }}'
                },			
                @endforeach
            ],
			/* redirect the page onclick */
			eventClick: function(booking) {
				if(booking.event_type=='child review'){
				    return false;
				}
				else{
				    return true;
				}
            }
			
		});
    });
	</script>

	<div class="container">
	@if(Session::has('success'))
		<div class="alert alert-success">{{Session::get('success')}}</div>
	@endif
        <div class="row">
		    <div class="col-md-2 bar1"></div><div class="col-md-10">Disabled(User time slot for child review)</div>
		</div><br>
		<div class="row">
		    <div class="col-md-2 bar2"></div><div class="col-md-10">Click on this link to book adhoc appointment.</div>
		</div><br>
		<div class="row">
		    <div class="col-md-2 bar3"></div><div class="col-md-10">Click on this link to view your child's school club booking.</div>
		</div><br>
		<div class="row">
		    <div class="col-md-2 bar4"></div><div class="col-md-10">This color displays holidays and close days.</div>
		</div><br><br><br>
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				MY Calender    
			</div>
			<div class="panel-body" id="calendar">
			</div>
		</div>
	</div>
@endsection

