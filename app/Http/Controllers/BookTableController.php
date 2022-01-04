<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Booking;
use App\Models\UserBooking;
use Illuminate\Support\Facades\DB;

class BookTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('book_table');
    }

    public function pastBookingIndex()
    {
        $pastBooking = DB::table('user_bookings')
            ->select('bookings.id','bookings.booking_date','bookings.booking_time','bookings.created_at')
            ->join('users', 'user_bookings.user_id', '=', 'users.id')
            ->join('bookings', 'user_bookings.booking_id', '=', 'bookings.id')
            ->where('user_bookings.user_id','=', auth()->user()->id)
            ->orderBy('user_bookings.id','desc')
            ->get();        
        
        return view('past_booking',['pastBooking' => $pastBooking]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'bookingDate'=> ['required','date'],
            'bookingTime'=> ['required','numeric','min:8','max:19'],
            'totalGuest'=> ['required','numeric','min:1','max:6'],
            'tableNo'=> ['required','string','max:255'],
        ]);

        $bookingTime = $request->bookingTime;
        switch ($bookingTime){
            case 8:
                $bookingTime = "08:00";
                break;
            case 9:
                $bookingTime = "09:00";
                break;
            case 10:
                $bookingTime = "10:00";
                break;
            case 11:
                $bookingTime = "11:00";
                break;
            case 12:
                $bookingTime = "12:00";
                break;
            case 13:
                $bookingTime = "13:00";
                break;
            case 14:
                $bookingTime = "14:00";
                break;
             case 15:
                $bookingTime = "15:00";
                break;
            case 16:
                $bookingTime = "16:00";
                break;
            case 17:
                $bookingTime = "17:00";
                break;
            case 18:
                $bookingTime = "18:00";
                break;
            case 19:
                $bookingTime = "19:00";
                break;
            default:
                $bookingTime = "09:00";
        }

        //save to booking table
        $booking = new Booking;
        $booking->booking_date = $request->bookingDate;
        $booking->booking_time = $bookingTime;
        $booking->total_guest = $request->totalGuest;
        $booking->table_no = $request->tableNo;
        $booking->save();

        $newId = $booking->id;
        $userId = auth()->user()->id;


        //save to user_booking table
        $userBooking = new UserBooking;
        $userBooking->user_id = $userId;
        $userBooking->booking_id = $newId;
        $userBooking->save();


        return redirect(route('booktable.show',$newId));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Booking::find($id);
        return view('ticket')->with(['ticket' => $ticket]);
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
