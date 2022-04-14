<?php

namespace App\Traits;
use Mailgun\Mailgun;
use \Illuminate\Contracts\Events\Dispatcher;
trait AppEmail
{
    public function sendMail()
    {
        $mgClient = new Mailgun('b4f225d425ff680d9cc5a8dc5f4bf974-162d1f80-c91ae8b7');
        $domain = "sandbox04856448fa9f4d0db98f1a7e42b056ee.mailgun.org";
        
        # Make the call to the client.
        $result = $mgClient->sendMessage("$domain",
            array('from'    => 'Mailgun Sandbox <postmaster@sandbox04856448fa9f4d0db98f1a7e42b056ee.mailgun.org>',
                  'to'      => 'Linton Starks <dev.lintonstarks@gmail.com>',
                  'subject' => 'Hello Linton Starks',
                  'text'    => 'Congratulations Linton Starks, you just sent an email with Mailgun!  You are truly awesome! '));    
    }
}
