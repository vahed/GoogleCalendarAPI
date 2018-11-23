<?php

namespace JackNersary\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Model;
use JackNersary\Timeslot;
use JackNersary\Booking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use JackNersary\School_club_booking;
use JackNersary\Adhoc_appointment;
use JackNersary\Notification_tb;
use Validator;
use Input;
use Notification;
use Illuminate\Notifications\Notifiable;
use JackNersary\Notifications\ClubBookingNotice;
//use JackNersary\Notifications\ClubBookingNotice;
//use Illuminate\Support\Facades\Notification;


class UserController extends Controller
{
	protected $timeslotbooking;
	
	/* direct user to the insertSchoolClubBooking view */
    public function index(){
		//$date = DB::table('bookings')->where('id', '=', $id)->get();
		return view('insertSchoolClubBooking');
	}
	/* carry booking database record to insertSchoolClubBooking form */
	public function showUser($id)
    {
        // get the event
        $booking = Booking::find($id);
		//$bookingId = $booking->id;
		//$event_type = $booking->event_type;
        //return View::make('insertSchoolClubBooking')->with('booking', $booking);
		return View::make('showUser')->with('userBooking', $booking);
    }
	public function showclubsessionbookingform($id)
    {
        // get the event
        $booking = Booking::find($id);
		$bookingId = $booking->id;
		$event_type = $booking->event_type;
        return View::make('insertSchoolClubBooking')->with('booking', $booking);
    }
	/* display user booking dates */
	public function showAllUserBooking()
    {
        $userBooking = Booking::all();
        return View::make('showAllUserBooking')->with(compact('userBooking'));
    }
	/* display child review bookings */
	public function getChildReview(){
	    $childReview = new Booking;
		$childReviewRec = $childReview::where('event_type','child review')->get();
		//dd($new);
	    return View::make('showChildReviewRec')->with(compact('childReviewRec'));
	}
	/* display timeslot form */
	public function getTimeslot(Request $request){
	$collections = collect(['2017-10-31 13:00:00','2017-10-31 13:15:00','2017-10-31 13:30:00',
	                        '2017-10-31 13:45:00','2017-10-31 14:00:00','2017-10-31 14:15:00',
							'2017-10-31 14:30:00','2017-10-31 14:45:00','2017-10-31 15:00:00',
							'2017-10-31 15:15:00','2017-10-31 15:30:00','2017-10-31 15:45:00',
							'2017-10-31 16:00:00','2017-10-31 16:30:00','2017-10-31 16:45:00',]);
	    $timeslotbooking = Timeslot::select('start')->get();
	    
		$res=array();
		
		    foreach($collections as $k=>$v){
			
			$rec = $timeslotbooking->where('start', $v);
			    if($rec->count() > 0){
				   $res[]='<button type="button" class="btn btn-danger btn-lg u-slot">'.$v.'</button></br></br>';
				}
			    else if($rec->count() == 0){
				
			       $res[]='<button type="submit" name="submitVal" class="btn btn-success btn-lg a-slot" id="id-slot" value="'.$v.'">'.$v.'</button></br></br>';
				}
			
		}
		return View::make('timeslot')->with(compact('res'));
	}
	/* store school club booking*/ 
	public function store(Request $request,$id)
    {   
	    $booking = Booking::find($id);
		
	    $session = new School_club_booking;

		$session->child_name = $request->childName;
		$session->d_o_b=$request->d_o_b;
		$session->parent_name=$request->parentName;
		$session->phone=$request->phone;
		$session->email=$request->email;
		$session->session_name=$request->sess_type;
		$session->date = $booking->start;
		
		$session->session1 = $request->session1;
		$session->session2 = $request->session2;
	
		$validator = Validator::make($request->all(), [
		    'childName' => 'required',
            'd_o_b' => 'required',
            'parentName' => 'required',
			'phone' => 'required',
			'email' => 'required|email',
			'sess_type' => 'required',
        ]);
		
		if ($validator->passes()) {
		    /* if the sessions are fully booked display error */
		    if($this->is_fully_booked($id)== false)
			   return back()->with('error','The sessions are fully booked');
			
			/* if not save the new session and display success message */
		    if($this->is_fully_booked($id) == true)
			   $session->save();
			   Notification::route('mail',$session->email)->notify(new ClubBookingNotice($session->email));
			   //Notification::send($session->parent_name, new InvoicePaid(new ClubBookingNotice($session->email)));
			   return back()->with('success','You have successfully booked a session. Check email confirmation');
        }else{
			return back()->withInput()->withErrors($validator);
		}
    }
    /* display all club session booking dates to the user */
	public function clubBookingdates(){
	    $clubsession = new Booking;
		$clubBookingSess = $clubsession->where(['event_type'=>'school club'])->get();
		return View::make('availableClubSess')->with(compact('clubBookingSess'));
	}
	
	/* display notificaiton form */
	public function notificationForm(){
	    return view('notificationForm');
	}
	/* store user notificaiton in user table */
	public function storeNotification(Request $request){
	    $message = new Notification_tb;

		$message->name = $request->name;
		$message->email_from = $request->email;
		$message->reason = $request->reason;
        
		$validator = Validator::make($request->all(), [
		    'name' => 'required',
            'email' => 'required',
            'reason' => 'required',
        ]);
		
		if ($validator->passes()) {
		    /* if form validation is correct */
			   $message->save();
			   return back()->with('success','You have successfully send a notification to Administrator');
        }else{
			return back()->withInput()->withErrors($validator);
		}
	}
	/* get the date from booking table and count
	   if the number of booking based on the date 
	   in School_club_booking table is greater than 10 
	*/
	function is_fully_booked($id){
		$booking = Booking::find($id);
		$session = new School_club_booking;
		
		$result = $session::where(['date'=>$booking->start])->get();
		
		if($result->count()>10)
			return false;
		else
			return true;
	}
	public function storeTimeslot(Request $request){
	    $timeslotbooking = new Timeslot;
		
		$timeslotbooking->parent_name = $request->fullname;
		$timeslotbooking->child_name = $request->child_name;
		$timeslotbooking->email = $request->email;
		$timeslotbooking->phone = $request->phone;
		$submitVal = $request->submitVal;
		$timeslotbooking->start = $submitVal;
		$date = date('Y-m-d',strtotime($submitVal));//change timestamp to normal date string
		$timeslotbooking->date = $date;
		$child_name = $timeslotbooking->child_name;
		$email = $timeslotbooking->email;

		$validator = Validator::make($request->all(), [
		    'fullname' => 'required',
			'child_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);
		
		if($validator->passes()){
		    if($this->ifEmailExists($email,$date,$child_name) == false){
			    return back()->with('error','You have already picked a time slot for this child');
			}
			if($this->is_timeslot_taken($submitVal)==false){
			    return back()->with('error','someone else have just taken  your requested time slot, please, pick another.');
			}
			if($this->ifEmailExists($email,$date,$child_name)==true){
			    $timeslotbooking->save();
			    return back()->with('success','You have successfully booked a time slot');
			}    
		}else{
			return back()->withInput()->withErrors($validator);
		}
	}
	/* check if the user already booked a timeslot on the same date */
	public function ifEmailExists($email,$date,$childname){
		$result = Timeslot::where('email', $email)
          ->where('date', $date)
		  ->where('child_name',$childname);

		if($result->count()>0){
		    return false;
		}else{
		    return true;
		}
	}
	/* check if someone concurrently checked the same time slot */
	public function is_timeslot_taken($time){
	    $result = Timeslot::where('start', $time);
		if($result->count()>0){
		    return false;
		}else{
		    return true;
		}
	}
	/* direct to adhoc form request */
	public function showAdhocApp(){
	    return view('insertAdhocApp');
	}
	/* insert adhoc appointment into database */
	public function storeAdhocApp(Request $request){
	    $adhoc_app = new Adhoc_appointment;
		$adhoc_app->name = $request->name;
		$adhoc_app->date = $request->date;
		$adhoc_app->reason = $request->reason;
		
		$validator = Validator::make($request->all(), [
		    'name' => 'required',
            'date' => 'required',
            'reason' => 'required',
        ]);
		
		if($validator->passes()){
		    $adhoc_app->save();
		    return back()->with('success','You have successfully booked an adhoc meeting');
		}
		else{
		    return back()->withInput()->withErrors($validator);
		}
	}
	/* display booking record in userEvents blade */
	public function userEventsCal()
    {
        $userCal = Booking::all();
        return View::make('userEvents')->with(compact('userCal'));
    }
}