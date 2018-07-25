<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use \App\Lead;

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
    	$leads = Lead::all();


        return view('home', [
        	'leads'     =>  $leads,
	        'search'    => "",
	        "direction" =>  "asc"
        ]);
    }

    public function search(Request $req) {
    	$search_term = $req->input("search");
    	$search = "%".$search_term."%";
	    $leads = Lead::where('first_name','like',$search)
		            ->orWhere('last_name','like',$search)
	                ->get();

	    return view('home', [
		    'leads'     =>  $leads,
		    "search"    =>  $search_term,
		    "direction" =>  "asc"
	    ]);
    }

    public function sort($column,$direction) {

	    $leads = Lead::orderBy($column,$direction)->get();

	    if ( $direction == "asc" ) {
		    $direction = "desc";
	    }
	    else if ( $direction == "desc" ) {
		    $direction = "asc";
	    }

	    return view('home', [
		    'leads' =>  $leads,
		    "search"    =>  "",
		    "direction" =>  $direction
	    ]);
    }

	public function sort_and_search($column,$direction,$search) {

		$leads = null;

		if ( $search != "" ) {
			$search_term = "%".$search."%";
			$leads = Lead::where('first_name','like',$search_term)
			             ->orWhere('last_name','like',$search_term)
						 ->orderBy($column,$direction)
			             ->get();
		}
		else {
			$leads = Lead::orderBy( $column, $direction )
			             ->get();
		}

		if ( $direction == "asc" ) {
			$direction = "desc";
		}
		else if ( $direction == "desc" ) {
			$direction = "asc";
		}

		return view('home', [
			'leads'     =>  $leads,
			"search"    =>  $search,
			"direction" =>  $direction
		]);
	}
}
