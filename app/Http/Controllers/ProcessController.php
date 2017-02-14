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
        $responseData = NULL;

        if ($deliveryType == 'emailSend') {
        	$subject = $request->input('subject');
        	$message = $request->input('message');

            // split the recipient email address by comma delimiter
            // allows for multiple recipients
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

            // foreach var in recipients - see above - run the email recipients->build
            foreach ($recipients as $recipient) {       		    
                $email->recipients->build(array('email' => $recipient));
            }   

            $responseData = $email->post();
        } else {
            $message = $request->input('message');
            $recipients = explode(",", $request->input('recipient'));
            $client = new Client($_ENV["TMS_KEY"],$_ENV["TMS_ENDPOINT"]);
            $sms = new Sms($client);
            $sms->build(array(
              'body' => $message,
            ));

            // foreach var in recipients - see above - run the email recipients->build
            foreach ($recipients as $recipient) {   
                $sms->recipients->build(array('phone' => $recipient));
            }

            $responseData = $sms->post();
        }    

        // $request->session()->flash('data', $request);
        // var_dump($responseData);
        $request->session()->put('data', $responseData);
        return redirect()->route('confirm');
    }

    public function confirm(Request $request) 
    {
        //var_dump($request->session());
        $getTMSResponse = $request->session()->get('data');
        var_dump($getTMSResponse->id);

        //future sql to insert into tbl
        //"INSERT INTO messages (`tms_id`, `subject`) VALUES (
        //    $getTMSResponse->id,
        //    $getTMSResponse->subject
        //)"

        return "Success! Your messages is being delivered right now!";
    }

}
