<?php


namespace MpAssocies\Middleware;

use Closure;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use MpAssocies\Exception\Auth\UnauthorizedException;
use MpAssocies\Exception\Errors;
use MpAssocies\Models\Auth\Module\Session;

class CheckModuleAuth
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     * @throws UnauthorizedException
     * @throws Exception
     */
    public function handle(Request $request, Closure $next)
    {
        $session = Session::where('value', $request->bearerToken())->first();

        if(empty($session))
        {
            throw new UnauthorizedException("Invalid session");
        }


        if(new DateTime($session->expiration) < new DateTime()){
            throw new UnauthorizedException("Token expired", Errors::EXPIRED_TOKEN);
        }

        return $next($request);
    }
}