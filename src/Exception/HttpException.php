<?php


namespace MpAssocies\Exception;


use Symfony\Component\HttpKernel\Exception\HttpException as LaravelHttpException;

class HttpException extends AppException
{
    public function __construct(LaravelHttpException $cause)
    {
        parent::__construct("A Laravel HTTP Error occurs", $cause->getStatusCode(), $cause);
    }

    protected function getApplicationCode(){
        return Errors::LARAVEL_HTTP_EXCEPTION;
    }
}
{

}