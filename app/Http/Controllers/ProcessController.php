<?php

// validate the web form
// call the tms client
// display form data
// return a redirect response object which will 
// redirect whatever page objcet to another page

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Tms\Client;
use \Tms\Resource\Email;

class ProcessController extends Controller
{

    public function process(Request $request)
    {
    	// var_dump($request->all());

    	$subject = $request->input('subject');
    	$message = $request->input('message');
    	$recipient = $request->input('recipient');

    	$client = new Client($_ENV["TMS_KEY"],$_ENV["TMS_ENDPOINT"]);
        $email = new Email($client);
        $email->build(array(
		  'subject' => $subject,
		  'body' => $message,
		  'from_name' => 'Richard Fong - TMS Stage',
		  'click_tracking_enabled' => true,
		  'open_tracking_enabled' => true,
		));
		$email->recipients->build(array('email' => $recipient));
		$email->post();

        var_dump($email);

        return "<p>Subject: $subject<br />Message: $message<br />Recipient: $recipient</p>";
    }

}
