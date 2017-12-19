<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\User;
use App\Screening;
use App\Genre;
use App\Language;
use App\Movie;
use App\Ticket;
use Carbon\Carbon;
use PDF;
use Response;
use App\Mail\UpcomingEvent;
use App\Http\Controllers\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use Image;
use Cookie;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $screenings = Screening::orderBy('id', 'desc')->get();
        $genres = Genre::orderBy('id', 'desc')->get();
     //   $cookie = Cookie::make($name, $value);
        
       // $cookie_get = Cookie::get('movietix_user');
        return view('dashboard', compact('screenings', 'genres', 'cookie_get'));
    }

    public function myevents()
    {
        $screenings_count = Screening::where('user_id', Auth::user()->id)->whereDate('date', '>', Carbon::today()->toDateString())->orderBy('id', 'desc')->count();
        $screenings = Screening::where('user_id', Auth::user()->id)->whereDate('date', '>', Carbon::today()->toDateString())->orderBy('id', 'desc')->get();
        $genres = Genre::orderBy('id', 'desc')->get();
        return view('account.myevents', compact('screenings_count', 'screenings', 'genres'));
    }

    public function pastevents()
    {
        $screenings_count = Screening::where('user_id', Auth::user()->id)->whereDate('date', '<', Carbon::today()->toDateString())->orderBy('id', 'desc')->count();
        $screenings = Screening::where('user_id', Auth::user()->id)->whereDate('date', '<', Carbon::today()->toDateString())->orderBy('id', 'desc')->get();
        $genres = Genre::orderBy('id', 'desc')->get();
        //past screenings
         $tickets = Ticket::where('user_id', Auth::user()->id)->get();
        $array = [];
        foreach ($tickets as $ticket) {
            $this_screening = $ticket->screening->whereDate('date', '<', Carbon::today()->toDateString())->get();
            if (!in_array($this_screening, $array))
            {
                array_push($array, $this_screening);
            }
        }
        $array_count = count($array);
        //past screenings
        return view('account.pastevents', compact('screenings_count', 'screenings', 'genres', 'array', 'array_count'));
    }

    public function upcomingevents()
    {
        $tickets = Ticket::where('user_id', Auth::user()->id)->get();
        $array = [];
        foreach ($tickets as $ticket) {
            $this_screening = $ticket->screening->whereDate('date', '>', Carbon::today()->toDateString())->get();
            if (!in_array($this_screening, $array))
            {
                array_push($array, $this_screening);
            }
        }
        $array_count = count($array);
        $screenings_count = Screening::where('user_id', Auth::user()->id)->whereDate('date', '<', Carbon::today()->toDateString())->orderBy('id', 'desc')->count();
        $screenings = Screening::whereDate('date', '>', Carbon::today()->toDateString())->orderBy('id', 'desc')->get();
        $genres = Genre::orderBy('id', 'desc')->get();
        return view('account.upcomingevents', compact('screenings_count', 'screenings', 'genres', 'array', 'array_count'));
    }

     public function myprofile()
    {
        return view('account.profile');
    }

     public function updateprofile(Request $request)
    {
        $user = Auth::user();

        if(Input::hasFile('image')){
            $file=Input::file('image');
            $dd = $file->getClientOriginalName();
            $file_basename = substr($dd, 0, strripos($dd, '.')); // get file name
            $file_ext = substr($dd, strripos($dd, '.')); // get file extension
            $t = date("i-s");
            $newfilename = md5($file_basename) . $t . $file_ext;
            Image::make($file)->resize(1500, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('/uploads/profile/'. $newfilename));
            $image = $newfilename;
        }
         if (Input::hasFile('image')) { 
            $user->image = $newfilename;
        }
        if ($request->firstname) $user->firstname = $request->firstname;
        if ($request->lastname) $user->lastname = $request->lastname;
        if ($request->mobile_number) $user->mobile_no = $request->mobile_number;
        if ($request->home_number) $user->home_no = $request->home_number;
        if ($request->email) $user->email = $request->email;
         $user->save();
         session()->flash('success', 'Profile Updated');
         return redirect()->back();
      //  return view('account.profile');
    }

    public function attendees(Request $request, $slug)
    {
         $screening = Screening::where('slug', $slug)->first();
         $tickets = $screening->tickets()->orderBy('id', 'desc')->get();
         $count_tickets = $screening->tickets()->orderBy('id', 'desc')->count();
        return view('account.attendees', compact('screening', 'tickets', 'count_tickets'));
    }

    public function upcomingattendees(Request $request, $slug)
    {
         $screening = Screening::where('slug', $slug)->first();
         $tickets = $screening->tickets()->orderBy('id', 'desc')->get();
         $count_tickets = $screening->tickets()->orderBy('id', 'desc')->count();
        return view('account.upcomingattendees', compact('screening', 'tickets', 'count_tickets'));
    }

    public function pastattendees(Request $request, $slug)
    {
         $screening = Screening::where('slug', $slug)->first();
         $tickets = $screening->tickets()->orderBy('id', 'desc')->get();
         $count_tickets = $screening->tickets()->orderBy('id', 'desc')->count();
        return view('account.pastattendees', compact('screening', 'tickets', 'count_tickets'));
    }

    public function download_attendees(Request $request, $slug)
    {
         $screening = Screening::where('slug', $slug)->first();
         $tickets = $screening->tickets()->orderBy('id', 'desc')->get();
         $count_tickets = $screening->tickets()->orderBy('id', 'desc')->count();
       //  if($request->has('download')){
         view()->share('screening',$screening);
         view()->share('count_tickets',$count_tickets);
         view()->share('tickets',$tickets);
                $pdf = PDF::loadView('account.attendees');
                return $pdf->download('screening_attendees.pdf');
         //   }
        return view('account.attendees', compact('screening', 'tickets', 'count_tickets'));
    }

    public function sendemail() {
        $screenings = Screening::all();
        $auth = Auth::user();
        foreach ($screenings as $key => $screening) {
            if($screening->date > Carbon::today()->toDateString()) {
                $tickets = $screening->tickets()->get();
                foreach ($tickets as $key => $ticket) {
                    $user = User::where('id', $ticket->user->id)->first();
                    \Mail::to($user)->send(new UpcomingEvent($user, $auth, $screening));
                }
            }else {
                dd('okay');
            }
        }
         session()->flash('success', 'Email Query Ran! ');
        return redirect()->back();
    }   

}
