<?php


namespace MpAssocies\Traits;


use DateTime;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use MpAssocies\Exception\Auth\LoginException;
use MpAssocies\Models\Auth\Module\AuthKey;
use MpAssocies\Models\Auth\Module\Session;

trait ModuleAuthentification
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @throws LoginException
     */
    public function login(Request $request)
    {
        $sentKey = $request->input('key') ?? '';
        $secret = $request->input('secret') ?? '';
        $authKey = AuthKey::where('key', $sentKey)->first();

        if($authKey == null)
        {
            throw new LoginException("Unable to find key " . $sentKey);
        }

        if(!Hash::check($request->input('secret'), $authKey->secret)){
            throw new LoginException("Wrong password " . $secret);
        }

        $expiration = new DateTime();
        $expiration->modify('+' . env('BEARER_VALIDITY_PERIOD') . ' minutes');

        $session = new Session();
        $session->value = Str::random(64);
        $session->expiration = $expiration;
        $session->key_authed = $authKey->key;

        $session->save();

        return response()->json(
            [
                'token' => $session->value,
                'expiration_date' => $session->expiration->format("Y-m-d H:i:s")
            ]
        );
    }
}