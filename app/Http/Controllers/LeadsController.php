<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AmoCRM\Client\AmoCRMApiClient;
use Illuminate\Support\Facades\Storage;
use League\OAuth2\Client\Token\AccessToken;

class LeadsController extends Controller
{
    public function index(){    
        $apiClient = new AmoCRMApiClient(
            $_ENV['CLIENT_ID'],
            $_ENV['CLIENT_SECRET'],
            $_ENV['CLIENT_REDIRECT_URI']
        );
        $apiClient->setAccountBaseDomain($_ENV['ACCOUNT_DOMAIN']);

        $jsonToken = json_decode(Storage::disk('local')->get('token.json'), 1);
        $token = new AccessToken($jsonToken);

        $apiClient->setAccessToken($token);

        $leads = $apiClient->leads()->get()->all();

        echo '<pre>';
        var_dump($leads);
        echo '</pre>';
    }
}
