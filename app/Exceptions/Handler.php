<?php

namespace App\Exceptions;

use Error;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * @param Exception $exception
     * @return void
     * @throws Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {

        // is this request asks for json?
        if( $request->header('Content-Type') == 'application/json'){

            /*  is this exception? */

            if ( !empty($exception) ) {
                // set default error message
                $response = [
                    'error' => 'Sorry, can not execute your request.'
                ];

                // If debug mode is enabled
                if (config('app.debug')) {
                    // Add the exception class name, message and stack trace to response
                    $response['exception'] = get_class($exception); // Reflection might be better here
                    $response['message'] = $exception->getMessage();
                    $response['trace'] = $exception->getTrace();
                }

                $status = 400;

                // get correct status code

                // is this validation exception
                if($exception instanceof ValidationException){

                    return $this->convertValidationExceptionToResponse($exception, $request);

                    // is it authentication exception
                }else if($exception instanceof AuthenticationException){

                    $status = 401;

                    $response['error'] = 'Can not finish authentication!';

                    //is it DB exception
                }else if($exception instanceof \PDOException){

                    $status = 500;

                    $response['error'] = 'Can not finish your query request!';

                    // is it http exception (this can give us status code)
                }else if($this->isHttpException($exception)){

                    $status = $exception->getCode();

                    $response['error'] = 'Request error!';

                }else if($exception instanceof ModelNotFoundException) {
                    $replacement = [
                        'id' => collect($exception->getIds())->first(),
                        'model' => Arr::last(explode('\\', $exception->getModel())),
                    ];
        
                    $error = new Error(
                        help: trans('exception.model_not_found.help'),
                        error: trans('exception.model_not_found.error', $replacement)
                    );
        
                    return response($error->$request->toArray(), Response::HTTP_NOT_FOUND);
                }else{

                    // for all others check do we have method getStatusCode and try to get it
                    // otherwise, set the status to 400
                    $status = method_exists($exception, 'getStatusCode') ? $exception->getCode() : 400;

                }

                return response()->json($response,$status);

            }
        }

        return parent::render($request, $exception);
    }
}
