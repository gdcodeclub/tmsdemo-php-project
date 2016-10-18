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
use \Tms\Resource\Sms;

class ProcessController extends Controller
{

    public function process(Request $request)
    {
        $deliveryType = $request->input('emailSms');
        if($deliveryType == 'emailSend'){

        	$subject = $request->input('subject');
        	$message = $request->input('message');

            //split the recipient email address by comma delimiter
            //allows for multiple recipients
            $recipients = explode(",", $request->input('recipient'));
            $deliveryType = $request->input('emailSms');

        	$client = new Client($_ENV["TMS_KEY"],$_ENV["TMS_ENDPOINT"]);
            $email = new Email($client);
            $email->build(array(
    		  'subject' => $subject,
    		  'body' => $message,
    		  'from_name' => 'Richard Fong - PHP Client TMS Stage',
    		  'click_tracking_enabled' => true,
    		  'open_tracking_enabled' => true,
    		));

            //foreach var in recipients - see above - run the email recipients->build
            foreach ($recipients as $request => $recipient) {   
    		  $email->recipients->build(array('email' => $recipient));
            }    
    		$email->post();
        }
        else{
            $message = $request->input('message');
            $recipients = explode(",", $request->input('recipient'));
            $client = new Client($_ENV["TMS_KEY"],$_ENV["TMS_ENDPOINT"]);
            $sms = new Sms($client);
            $sms->build(array(
              'body' => $message,
            ));

            //foreach var in recipients - see above - run the email recipients->build
            foreach ($recipients as $request => $recipient) {   
                $sms->recipients->build(array('phone' => $recipient));
            }    
            $sms->post();
        }    

        //var_dump($email);
        //var_dump($request->all());

        // return "<p>Subject: <br />Message: $message<br />Recipient: $recipient</p>$deliveryType</br>";
        return redirect()->route('confirm');

    }

    public function confirm(Request $request){
        var_dump($request->all());
        return "Here we are in the confirm!";
    }

}
