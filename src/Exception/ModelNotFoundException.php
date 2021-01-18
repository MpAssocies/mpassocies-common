<?php


namespace MpAssocies\Exception;

class ModelNotFoundException extends AppException
{
    private $class;

    public function __construct($class)
    {
        parent::__construct("Model not found " . $class, 404);
        $this->class = $class;
    }

    public function json()
    {
        $code = Errors::MODEL_NOT_FOUND;

        return [
            'code' => $code,
            'message' => $this->getMessage()
        ];
    }
}