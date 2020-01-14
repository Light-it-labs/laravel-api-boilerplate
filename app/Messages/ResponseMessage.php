<?php


namespace App\Messages;


use Symfony\Component\HttpFoundation\Response;

class ResponseMessage
{
    private $messages = [
        Response::HTTP_OK => 'The resource was obtained successfully',
        Response::HTTP_NOT_FOUND => 'The resource was not found',
        Response::HTTP_INTERNAL_SERVER_ERROR => 'Internal server error',
        Response::HTTP_CONFLICT => 'Duplicated resource',
        Response::HTTP_CREATED => 'The resource was created successfully'
    ];

    /**
     * Get a message depending on $status
     * @param int $status
     * @return mixed|string
     */
    public function getStatusMessage(int $status)
    {
        if (! isset($this->messages[$status])) {
            return `No message for HttpCode: ${status}`;
        }

        return $this->messages[$status];
    }

    /**
     * Set or overrides a custom message
     * @param int $status
     * @param string $message
     * @return string
     */
    public function setStatusMessage(int $status, string $message)
    {
        return $this->messages[$status] = $message;
    }
}
