<?php

namespace JackNersary\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Calendar;
use JackNersary\Child_review_booking;
use JackNersary\Booking;
use Illuminate\Support\Facades\View;
use Validator;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('insertTeacherBooking');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function teacherEvents()
    {
        $teacherCal = Booking::all();
        return View::make('teacherEvents')->with(compact('teacherCal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    //$booking = new Booking;
        $child_review = new Child_review_booking;
		$child_review->title = $request->title;
		$child_review->teacher_name = $request->teacher_name;
		$child_review->start=$request->start; 
		$child_review->end=$request->end;
		$child_review->event_type='Child review';
		
		$validator = Validator::make($request->all(), [
		    'title' => 'required',
			'teacher_name' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);
		
		if ($validator->passes()) {
		    /* if duplicate record display error */
		    if(app('JackNersary\Http\Controllers\BookingController')->is_duplicate($child_review->title,$child_review->start,$child_review->end) == false)
			   return back()->with('error','There is a record of this event');
			
			/* if not save the new event and display success message */
		    if(app('JackNersary\Http\Controllers\BookingController')->is_duplicate($child_review->title,$child_review->start,$child_review->end) == true)
			   $child_review->save();
		       $this->insertChildReview($child_review->title,$child_review->event_type,$child_review->start,$child_review->end);
			   return back()->with('success','Event created successfully');
        }else{
			return back()->withInput()->withErrors($validator);
		}
    }
	/* insert child review session in booking database as well */
	public function insertChildReview($title,$eve_type,$start,$end){
	    $booking = new Booking;
		$booking->title = $title;
		$booking->event_type=$eve_type;
		$booking->start=$start; 
		$booking->end=$end;
		
		$booking->save();
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
