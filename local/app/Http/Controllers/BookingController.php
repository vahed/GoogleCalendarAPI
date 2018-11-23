<?php

namespace JackNersary\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Calendar;
use JackNersary\Booking;
use JackNersary\School_club_booking;
use Illuminate\Support\Facades\View;
use Validator;
use Notification;
use JackNersary\Notifications\InvoicePaid;

class BookingController extends Controller
{
	protected $booking;
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking = Booking::all();
        return View::make('allEveCalendar')->with(compact('booking'));
    }

	/* direct to viewAllRecord balde */
	public function showAll()
    {
        $booking = Booking::all();
        return View::make('viewAllRecord')->with(compact('booking'));
    }
	/* display all school club bookings */
	public function showSchoolClubBooking(){
	    $school_club_booking = School_club_booking::all();
        return View::make('viewSchoolClubBooking')->with(compact('school_club_booking'));
	}

    /**
     * Show the form for creating a new booking.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('insertEvent');
    }
    
    /**
     * Store a newly created resource in booking table.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $booking = new Booking;
		$booking->title = $request->title;
		$booking->start=$request->start; 
		$booking->end=$request->end;
		$booking->event_type=$request->event_type;
		
		$validator = Validator::make($request->all(), [
		    'title' => 'required',
            'start' => 'required',
            'end' => 'required',
			'event_type' => 'required',
        ]);
		
		if ($validator->passes()) {
		    /* if duplicate record display error */
		    if($this->is_duplicate($booking->title,$booking->start,$booking->end) == false)
			   return back()->with('error','There is a record of this event');
			
			/* if not save the new event and display success message */
		    if($this->is_duplicate($booking->title,$booking->start,$booking->end) == true)
			   $booking->save();
			   return back()->with('success','Event created successfully');
        }else{
			return back()->withInput()->withErrors($validator);
		}
    }
    /* check if duplicate record exists */
	public function is_duplicate($title,$start,$end){
	    $booking = new Booking;
	    $result = $booking::where(['title'=>$title,
		'start'=>$start,
		'end'=>$end])
		->get();
		if($result->count()>0)
			return false;
		else
			return true;
	}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUser($id)
    {
        // get the calendar booking details
        $userBooking = Booking::find($id);	
        return View::make('showUser')->with('userBooking', $userBooking);
    }
    public function show($id)
    {
        // get the event
        $booking = Booking::find($id);
		$bookingId = $booking->id;
		$event_type = $booking->event_type;
		
        return View::make('show')->with('booking', $booking);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the event
        $booking = Booking::find($id);
        // show the edit form and pass the event
        return View::make('edit')
            ->with('booking', $booking);
			
    }
    
	public function editPayment($id)
    {
        // get the event
        $school_club_booking = School_club_booking::find($id);

        // show the edit form and pass the event
        return View::make('editPayment')
            ->with('school_club_booking', $school_club_booking);
			
    }

	public function updatePayment(Request $request,$id)
    {		
		$school_club_booking = School_club_booking::find($id); 
		$school_club_booking->payment=$request->payment; 
		$school_club_booking->payment_type=$request->payment_type; 
		$school_club_booking->save();
		
		Notification::route('mail','vahed_borakae@yahoo.com')->notify(new InvoicePaid($school_club_booking->email));
		
		return back()->with('success','Payment updated successfully');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //$events = new Events;
		
		$validator = Validator::make($request->all(), [
		    'title' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);
		
		if ($validator->passes()) {
		    $booking = Booking::find($id);
		    $booking->title = $request->title;
			$booking->start=$request->start; 
			$booking->end=$request->end; 
			$booking->save();
		    
			return back()->with('success','Record updated successfully');
        }else{
			return back()->withInput()->withErrors($validator);
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking=Booking::find($id);
		$booking->delete();
		
		return back()->with(['successDel'=>'Record deleted successfully']);
    }
}
