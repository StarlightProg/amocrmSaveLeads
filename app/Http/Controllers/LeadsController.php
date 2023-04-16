<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AmoCRM\Client\AmoCRMApiClient;
use App\Models\Contact;
use App\Models\Lead;
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

        $apiClient->onAccessTokenRefresh(function($token){
            Storage::disk('local')->put('token.json', json_encode($token->jsonSerialize(), JSON_PRETTY_PRINT));
        });

        $leads = $apiClient->leads()->get(null,['catalog_elements','contacts'])->all();
        
        foreach($leads as $lead){
            if($lead->contacts==null){
                continue;
            }

            $contactsArr = [];

            foreach($lead->contacts as $contact){
                array_push($contactsArr, $contact->id);

                $contactPhoneArr = [];
                $contactMailArr = [];
                $contactCompany = null;
                $contactPhone = null;
                $contactMail = null;

                $contactApi = $apiClient->contacts()->getOne($contact->id);
                
                $customFields = $contactApi->getCustomFieldsValues();

                if($contactApi->company!=null){
                    $contactCompany = $apiClient->companies()->getOne($contactApi->company->id)->name;
                }

                if($customFields!=null){                
                    $phoneFields = $customFields->getBy('fieldCode', 'PHONE');
                    $mailFields = $customFields->getBy('fieldCode', 'EMAIL');
                    
                    if($phoneFields!=null){
                        foreach ($phoneFields->getValues() as $phoneField) {
                            array_push($contactPhoneArr,$phoneField->value);
                        }

                        $contactPhone = '{' . implode(",",$contactPhoneArr) . '}'; 
                    }
                    
                    if($mailFields!=null){
                        foreach ($mailFields->getValues() as $mailField) {
                            array_push($contactMailArr,$mailField->value);
                        }

                        $contactMail = '{' . implode(",",$contactMailArr) . '}'; 
                    }                                        
                }

                $contactData = array(
                    'id' => $contact->id,
                    'name' => $contactApi->name,
                    'company' => $contactCompany,
                    'phone' => $contactPhone,
                    'mail' => $contactMail
                );

                Contact::firstOrCreate($contactData);
            }

            $contactsStr = '{' . implode(",",$contactsArr) . '}';            

            $leadData = array(
                'id' => $lead->id,
                'name' => $lead->name,
                'price' => $lead->price,
                'contacts' => $contactsStr
            );

            Lead::firstOrCreate($leadData);
        }        
    }
}
