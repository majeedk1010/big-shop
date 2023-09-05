<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
//use Illuminate\Http\Exceptions\HttpResponseException;
//use ValidationException;
//use Laravel\Passport\Exceptions\AuthenticationException;
use Laravel\Passport\Exceptions\MissingScopeException;
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

    // public function report(Throwable $e)
    // {
    //     parent::report($e);
    // }

    public function render($request, Throwable $e)
{
    if ($e instanceof MissingScopeException && $request->wantsJson()){
        return response()->json([
            'status'=>401,//401 Unauthorized
            'error' => 'Unauthorized',
        ], 401);
    }

    // if ($e instanceof AuthenticationException) {
    //     //return response()->json($e->getMessage());
    //     return response()->json([
    //         'status'=>403,
    //         'error' => 'Unauthenticated 2',
    //     ], 403);
    // }

    return parent::render($request, $e);
}



//   protected function unauthenticated($request, AuthenticationException $e)
//   {
//     return response()->json([
//         'errors'=>[
//             'status'=>401,
//             'message'=>'Unauthenticated',
//         ],401
//     ]);
//   }


}
