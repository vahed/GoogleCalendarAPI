@extends('layouts.head')
@extends('layouts.loginHeader')
@extends('layouts.datepickerHead')
@section('title','User calendar')

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
				eventRender: function(userCal, element, view) { //booking represents event
				    if(userCal.event_type=='school club')
					    element.css('background-color', '#2ED9E1');
						else if(userCal.event_type=='adhoc appointment')
				        element.css('background-color', '#C2B1B2');
					    else if(userCal.event_type=='child review')
				        element.css('background-color', '#3DE12E');
					    else if(userCal.event_type=='holiday')
				        element.css('background-color', '#ff0043');
				},
			events: [
			    @foreach($userCal as $userCal)
                {
                    title : '{{ $userCal->title }}',
					event_type : '{{ $userCal->event_type }}',
                    start : '{{ $userCal->start }}',
                    end : '{{ $userCal->end }}'
					//url : '{{ route('showuser', $userCal->id) }}'
                },			
                @endforeach
            ],
			
		});
    });
	</script>

	<div class="container">
	    <div class="row">
		    <div class="col-md-2 bar1"></div><div class="col-md-10">Click on this link to book time slot for your child review.</div>
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
					User Calender    
				</div>
				<div class="panel-body" id="calendar">
				</div>
			</div>
	</div>
@endsection