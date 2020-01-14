<?php


namespace App\Messages;


use Symfony\Component\HttpFoundation\Response;

class ExampleResponseMessage extends ResponseMessage
{
    public function __construct()
    {
        // You can override default messages with a custom string
         // Remember to use Symfony\Component\HttpFoundation\Response constants for HttpCodes
        $this->setStatusMessage(Response::HTTP_OK, 'This is an example message for 200 HttpCode');
    }
}
