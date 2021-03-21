<?php

namespace App\Traits;

trait SendMail
{
    function aabc()
    {
        $status = "Chinonye";
        return $status; 
    }

    public function sendMail()
    {
        $email = new \SendGrid\Mail\Mail(); 
        $email->setFrom("bookings.valgeets@gmail.com");
        $email->setSubject("Sending with SendGrid is Fun");
        $email->addTo("endee09@gmail.com", "Nnamdi Ibe");
        $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
        $email->addContent(
            "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
        );
        $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
        try {
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
            //$response);
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }
        
    }
}