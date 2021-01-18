<?php


namespace MpAssocies\Exception;

class ValidationException extends AppException
{
    /**
     * @var array
     */
    private $details;

    public function __construct(\Illuminate\Validation\ValidationException $exception)
    {
        parent::__construct("Error validate form", 422);
        foreach ($exception->errors() as $field => $errors){
            $this->details[] = [
                'field' => $field,
                'errors' => $errors
            ];
        }
    }

    public function json()
    {
        return [
            'code' => Errors::ERROR_FORM_VALIDATION,
            'message' => $this->getMessage(),
            'errors' => $this->details
        ];
    }
}