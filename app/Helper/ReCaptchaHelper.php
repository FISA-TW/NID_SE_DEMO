<?php

namespace App\Helper;

use App;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ReCaptchaHelper
{
    public static function tryPassGoogleReCAPTCHA(Request $request)
    {
        $client = null;
        if (App::environment('production')) {
            $client = new Client([
                'timeout' => 10.0,
            ]);
        } else {
            $client = new Client([
                'timeout' => 10.0,
                'verify' => false,
            ]);
        }

        $response = $client->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'form_params' => [
                    'secret' => env('reCAPTCHA_Secret_Key'),
                    'response' => $request->get('g-recaptcha-response'),
                    'remoteip' => $request->getClientIp(),
                ]
            ]
        );

        return JsonHelper::decode($response->getBody());
    }
}
