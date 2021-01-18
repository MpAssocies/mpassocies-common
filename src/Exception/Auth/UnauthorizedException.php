<?php


namespace MpAssocies\Exception\Auth;


use MpAssocies\Exception\AppException;
use MpAssocies\Exception\Errors;
use Symfony\Component\HttpFoundation\Response;

class UnauthorizedException extends AppException
{
    private $errorCode;

    public function __construct($message= "Unauthorized.", $errorCode = Errors::UNAUTHORIZED)
    {
        parent::__construct($message, Response::HTTP_UNAUTHORIZED);
        $this->errorCode = $errorCode;
    }

    public function json()
    {
        return [
            'code' => $this->errorCode,
            'message' => $this->getMessage()
        ];
    }
}