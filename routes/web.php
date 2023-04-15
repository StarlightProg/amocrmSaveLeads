<?php

use AmoCRM\Client\AmoCRMApiClient;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // if (!isset($_GET['code'])) {
    //     exit('INVALID REQUEST');
    // }
    
    // $apiClient = new AmoCRMApiClient(
    //     $_ENV['CLIENT_ID'],
    //     $_ENV['CLIENT_SECRET'],
    //     $_ENV['CLIENT_REDIRECT_URI']
    // );
    // $apiClient->setAccountBaseDomain($_ENV['ACCOUNT_DOMAIN']);
    
    // $token = $apiClient->getOAuthClient()->getAccessTokenByCode($_GET['code']);
    
    // file_put_contents('../token.json', json_encode($token->jsonSerialize(), JSON_PRETTY_PRINT));
    
    // echo 'OK';

    return view('welcome');
});
