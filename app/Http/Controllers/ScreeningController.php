<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Screening;
use App\Genre;
use App\Language;
use App\Movie;
use App\Ticket;
use App\ScreeningRating;
use Image;
use Carbon\Carbon;
use DateTime;


class ScreeningController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::orderBy('id', 'desc')->get();
        $languages = Language::orderBy('id', 'desc')->get();
        return view('screenings.create', compact('genres', 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movie_title = request('movie_title');
        $location = request('location');
        $date = date("Y-m-d-i-s-a");
        $slug_combine = $movie_title.' '.$location.' '.$date;
        $slug_format = strtr($slug_combine, ' ', '-');
        $slug = $slug_format;

        if(Input::hasFile('image')){
            $file=Input::file('image');
            $dd = $file->getClientOriginalName();
            $file_basename = substr($dd, 0, strripos($dd, '.')); // get file name
            $file_ext = substr($dd, strripos($dd, '.')); // get file extension
            $t = date("i-s");
            $newfilename = md5($file_basename) . $t . $file_ext;
            Image::make($file)->resize(1500, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('/uploads/movies/'. $newfilename));
            $image = $newfilename;
        }

        $screening = Screening::create([
            'user_id' => Auth::user()->id,
            'genre_id' => request('genre_id'),
            'location' => request('location'),
            'no_tickets' => request('tickets'),
            'date' => request('date'),
            'slug' => $slug
        ]); 
        $movie = Movie::create([
            'title' => request('movie_title'),
            'screening_id' => $screening->id,
            'language_id' => request('language_id'),
            'genre_id' => request('genre_id'),
            'description' => request('movie_description'),
            'duration' => request('movie_duration'),
            'image' => $image
        ]); 
         session()->flash('success', 'Screening Added ');
     //   return redirect()->back();
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
          $screening = Screening::where('slug', $slug)->first();
          $reviews = $screening->screening_ratings()->orderBy('id', 'desc')->get();
          $total_tickets = $screening->no_tickets;  //total tickets
          $tickets = $screening->tickets()->count();  //current tickets
          $available_tickets = $total_tickets - $tickets;  //available tickets

         // $time = strtotime($screening->date);
          //$time = DateTime::createFromFormat('Y-m-d', $screening->date)->format('Y-m-d');
            //$newformat = date('Y-m-d',$time);
         // $diff = date("Y-m-d", $screening->date);
          $end_date = $screening->date;
          $end_date = $screening->date;  //end date
          //$end_date = date('Y-m-d',strtotime($end_date . "+1 days"));
        //  $end_date = date('Y-m-d', strtotime($end_date . ' -1 day'));
          $current_date = date("Y-m-d");
          if($end_date > $current_date) {
            $still_on = true;
          }else {
            $still_on = false;
          } //$dt->toDateString(); 
          $one = $screening->screening_ratings()->where('rating', 1)->count();
          $two = $screening->screening_ratings()->where('rating', 2)->count();
          $three = $screening->screening_ratings()->where('rating', 3)->count();
          $four = $screening->screening_ratings()->where('rating', 4)->count();
          $five = $screening->screening_ratings()->where('rating', 5)->count();

        return view('screenings.show', compact('screening', 'tickets', 'available_tickets', 'still_on', 'end_date', 'reviews', 'one', 'two', 'three', 'four', 'five'));
    }

    public function show_also($id)
    {
        $movie = Movie::find($id);
       // dd($movie->id);
          $screening = Screening::where('id', $movie->screening_id)->first();
        //  $screening = $movie->screening()->get();
       //   dd($screening->location);
          $reviews = $screening->screening_ratings()->orderBy('id', 'desc')->get();
          $total_tickets = $screening->no_tickets;  //total tickets
          $tickets = $screening->tickets()->count();  //current tickets
          $available_tickets = $total_tickets - $tickets;  //available tickets

         // $time = strtotime($screening->date);
          //$time = DateTime::createFromFormat('Y-m-d', $screening->date)->format('Y-m-d');
            //$newformat = date('Y-m-d',$time);
         // $diff = date("Y-m-d", $screening->date);
          $end_date = $screening->date;
          $end_date = $screening->date;  //end date
          $current_date = date("Y-m-d");
          if($end_date > $current_date) {
            $still_on = true;
          }else {
            $still_on = false;
          } //$dt->toDateString(); 
          $one = $screening->screening_ratings()->where('rating', 1)->count();
          $two = $screening->screening_ratings()->where('rating', 2)->count();
          $three = $screening->screening_ratings()->where('rating', 3)->count();
          $four = $screening->screening_ratings()->where('rating', 4)->count();
          $five = $screening->screening_ratings()->where('rating', 5)->count();

        return view('screenings.show', compact('screening', 'tickets', 'available_tickets', 'still_on', 'end_date', 'reviews', 'one', 'two', 'three', 'four', 'five'));
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

    public function comment(Request $request, $slug)
    {

        $screening = Screening::where('slug', $slug)->first();
        if( !$screening->screening_ratings()->where('user_id', Auth::user()->id)->first() ) {
            $screening_ratings = ScreeningRating::create([
                'rating' => request('rating'),
                'review' => request('review'),
                'user_id' => Auth::user()->id,
                'screening_id' => $screening->id
            ]); 
             session()->flash('success', 'Review Submitted');
            return redirect()->back();
        }else{
            session()->flash('error', 'You already reviewed this screening!');
            return redirect()->back();
        }
    }


     public function browse()
    {   
        $auth = Auth::user();
        $genres = Genre::orderBy('id', 'desc')->get();
        $languages = Language::orderBy('id', 'desc')->get();
         $thedata = [$genres, $languages, $auth];
        return $thedata;
    }

    public function browse_events()
    {   
        $genres = Genre::orderBy('id', 'desc')->get();
        $languages = Language::orderBy('id', 'desc')->get();
        return view('screenings.browse', compact('genres', 'languages', 'screenings'));
    }
    
    public function search(Request $request, $q)
    {   
        $auth = Auth::user();
       // $query =  $query;
       // $genre = Genre::find($request->input_genre);
        $genre = $request->input_genre;
        $language = Language::find($request->input_language);
        $start_date =  $request->start_date;
        $end_date =  $request->end_date;
        $movies = Movie::Where(function ($query) {
               // $q = ;
             $genre = Input::get ( 'input_genre' );
            $language = Input::get ( 'input_language' ); ///
                 $query->where('genre_id', '=', ''.$genre.'')
                      ->orWhere('language_id', '=', $language);
            })
            ->Where(function ($query) {
                $q = Input::get ( 'q' );
                $start_date =  Input::get ( 'start_date' );
                $end_date =  Input::get ( 'end_date' );  ////
                $query->where('created_at', '>', $start_date)
                      ->where('updated_at', '<', $end_date)
                      ->where('title', 'LIKE', '%'.$q.'%');
            })->with('screening')->orderBy('id', 'desc')->take(15)->get();
        if(count($movies) > 0)
            $thedata = $movies;
        else $thedata = '';
          //  return view('startups.search')->withDetails($startup)->withQuery( $q );
        

    //    $thedata = [$genres, $languages, $auth];
        return $thedata;
      //  return view('screenings.browse', compact('genres', 'languages', 'screenings'));
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
