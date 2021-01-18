<?php


namespace MpAssocies\Exception;


use Illuminate\Database\Eloquent\ModelNotFoundException as LaravelModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException as LaravelValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException as LaravelHttpException;
use Throwable;

class CommonHandler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        if($e instanceof LaravelValidationException){
            $e = new ValidationException($e);
        }

        if($e instanceof LaravelModelNotFoundException){
            $e = new ModelNotFoundException($e->getModel());
        }

        if($e instanceof LaravelHttpException){
            $e = new HttpException($e);
        }

        if(!($e instanceof AppException)){
            $e = new AppException($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR, $e);
        }

        return response()->json($e->json(), $e->getCode());
    }
}