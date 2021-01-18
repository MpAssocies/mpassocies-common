<?php


namespace MpAssocies\Exception;


use Exception;
use Throwable;

class AppException extends Exception
{
    /**
     * AppException constructor.
     * @param $message
     * @param $code
     * @param Throwable|null $cause
     */
    public function __construct($message, $code, Throwable $cause = null)
    {
        parent::__construct($message, $code, $cause);
    }

    public function json()
    {
        return [
            'code' => Errors::UNKNOWN_ERROR,
            'message' => $this->getMessage(),
        ];
    }
}