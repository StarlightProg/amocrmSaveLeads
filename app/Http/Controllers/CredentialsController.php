<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AmoCRM\Client\AmoCRMApiClient;

class CredentialsController extends Controller
{
    public function index(){
        if (!isset($_GET['code'])) {
            exit('INVALID REQUEST');
        }
        
        $apiClient = new AmoCRMApiClient(
            $_ENV['CLIENT_ID'],
            $_ENV['CLIENT_SECRET'],
            $_ENV['CLIENT_REDIRECT_URI']
        );
        $apiClient->setAccountBaseDomain($_ENV['ACCOUNT_DOMAIN']);
        
        $token = $apiClient->getOAuthClient()->getAccessTokenByCode($_GET['code']);
        
        file_put_contents('token.json', json_encode($token->jsonSerialize(), JSON_PRETTY_PRINT));
        
        echo 'OK';
    }
}
