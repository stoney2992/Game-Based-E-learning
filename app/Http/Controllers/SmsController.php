<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class SmsController extends Controller
{
    public function sendsms()
    {
        $sid = getenv("TWILIO_SID");
        $token = getenv("TWILIO_TOKEN");
        $sendernumber = getenv("TWILIO_PHONE");
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
            ->create("+63 992 476 8735", // to
                    [
                        "body" => "Bai Chati ko kung naa kay na recieve",
                        "from" =>  $sendernumber
                    ]
            );

            dd("message sent successfully");


    }

}
