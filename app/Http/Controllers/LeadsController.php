<?php
/**
 * User: shafaatbinjaved
 * Date: 7/24/2018
 * Time: 1:56 PM
 */

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use \App\Lead;

class LeadsController extends BaseController {

	function store(Request $req) {

		$firstName = $req->input('first_name');
		$lastName = $req->input('last_name');
		$phoneNum = $req->input('phone_num');
		$email = $req->input('email');

		$result = Lead::create([
			'first_name'    =>  $firstName,
			'last_name'     =>  $lastName,
			'email'         =>  $email,
			'phone_num'     =>  $phoneNum
		]);

		$return_data = null;

		if ( $result ) {
			$return_data = array(
				"success"   =>  true
			);
		}
		else {
			$return_data = array(
				"success"   =>  true
			);
		}

		die(json_encode($return_data));
	}

}