<?php

// validate the web form
// call the tms client
// return a redirect reponse object which will 
// redirect hatever page objcet to another page

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProcessController extends Controller
{

    public function process(Request $request)
    {
    	// var_dump($request->all());

    	$subject = $request->input('subject');
    	$message = $request->input('message');

        return "<br />$subject<br />$message";
    }

}
