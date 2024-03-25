<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstitucionalController extends Controller
{
    public function index(){
        return view('index');
    }

    public function plano($plano){
      
   
        
        return view('plano', [ 
            'plano' => $plano,    
        ]);
    }

    public function apiAsaas(Request $request) {
        $client = new \GuzzleHttp\Client();
        
        $response = $client->request('POST', 'https://sandbox.asaas.com/api/v3/customers', [
            'body' => json_encode([
                'name' => $request->nome,
                'cpfCnpj' => $request->cpf
            ]),
          'headers' => [
            'accept' => 'application/json',
            'access_token' => '$aact_YTU5YTE0M2M2N2I4MTliNzk0YTI5N2U5MzdjNWZmNDQ6OjAwMDAwMDAwMDAwMDAwNzY5OTg6OiRhYWNoXzY2YTg2MWY5LWUyMDUtNGJlMS05MmMxLTA3NTBmYTIxY2I0Yg==',
            'content-type' => 'application/json',
          ],
        ]);
        
        $clientcartao = new \GuzzleHttp\Client();

        $responsecartao = $clientcartao->request('POST', 'https://sandbox.asaas.com/api/v3/payments/', [
            'body' => '{
                "billingType": "CREDIT_CARD",
                "callback": {
                    "successUrl": "https://plataformaum.unysystens.com.br/login"
                },
                "creditCard": {
                    "holderName": '.$request->nome.',
                    "number": "5226260068461477",
                    "expiryMonth": "12",
                    "expiryYear": "2031",
                    "ccv": "553"
                },
                "creditCardHolderInfo": {
                    "name": "Paulo Sérgio Cardeliquio Orfanelli",
                    "cpfCnpj": "41743114800",
                    "email": "paulosergioorfanelli@gmail.com",
                    "postalCode": "13224230",
                    "addressNumber": "Rua Mercúrio, 452",
                    "phone": "11941766319"
                },
                "customer": "cus_000005938803",
                "value": 5,
                "dueDate": "2024-08-30",
                "remoteIp": "189.113.32.246"
            }',
            
        'headers' => [
            'accept' => 'application/json',
            'access_token' => '$aact_YTU5YTE0M2M2N2I4MTliNzk0YTI5N2U5MzdjNWZmNDQ6OjAwMDAwMDAwMDAwMDAwNzY5OTg6OiRhYWNoXzY2YTg2MWY5LWUyMDUtNGJlMS05MmMxLTA3NTBmYTIxY2I0Yg==',
            'content-type' => 'application/json',
        ],
        ]);

  
        $responseData = json_decode($response->getBody(), true);
        $responseDatacartao = json_decode($responsecartao->getBody(), true);
        $customerId = $responseData['id'];
       

        echo $responsecartao->getBody();
     
    } 
}
