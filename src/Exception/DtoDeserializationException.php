<?php


namespace MpAssocies\Exception;


use Symfony\Component\HttpFoundation\Response;

class DtoDeserializationException extends AppException
{
    /**
     * @var array
     */
    private $details;

    public function __construct($details)
    {
        parent::__construct($details, Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function json()
    {
        return [
            'code' => Errors::ERROR_DESERIALIZE_OBJECT,
            'message' => $this->getMessage(),
        ];
    }
}