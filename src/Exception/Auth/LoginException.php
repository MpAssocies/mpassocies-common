<?php


namespace MpAssocies\Exception\Auth;


use MpAssocies\Exception\AppException;
use MpAssocies\Exception\Errors;
use Symfony\Component\HttpFoundation\Response;

class LoginException extends AppException
{
    public function __construct($message)
    {
        parent::__construct("Error login: " . $message, Response::HTTP_UNAUTHORIZED);
    }

    public function json()
    {
        return [
            'code' => Errors::LOGIN_ERROR,
            'message' => $this->getMessage()
        ];
    }
}