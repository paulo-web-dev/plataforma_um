<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Instituicao;
use Illuminate\Support\Facades\Hash;
use Auth;
class InstitucionalController extends Controller
{
    public function index(){
        return view('index');
    }
    public function plano($plano){
      
   
        if($plano == 'Fundamentos Fisio'){
            $valor = 29;
        }elseif($plano == 'Performance Fisio Pro'){
            $valor = 49;
        }else{
            $valor = 79;
        }
        return view('plano', [ 
            'plano' => $plano,
            'valor' => $valor,    
        ]);
    }

    public function apiAsaas(Request $request) {

        function get_client_ip() {
            $ipaddress = '';
            if (isset($_SERVER['HTTP_CLIENT_IP']))
                $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
            else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_X_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
            else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_FORWARDED'];
            else if(isset($_SERVER['REMOTE_ADDR']))
                $ipaddress = $_SERVER['REMOTE_ADDR'];
            return $ipaddress;
        }
        
        // Usage
        $client_ip = get_client_ip();

        $hoje = date("Y-m-d");
        // $client = new \GuzzleHttp\Client();
        
        // $response = $client->request('POST', 'https://sandbox.asaas.com/api/v3/customers', [
        //     'body' => json_encode([
        //         'name' => $request->nome,
        //         'cpfCnpj' => '41743114800'
        //     ]),
        //   'headers' => [
        //     'accept' => 'application/json',
        //     'access_token' => '$aact_YTU5YTE0M2M2N2I4MTliNzk0YTI5N2U5MzdjNWZmNDQ6OjAwMDAwMDAwMDAwMDAwNzY5OTg6OiRhYWNoXzY2YTg2MWY5LWUyMDUtNGJlMS05MmMxLTA3NTBmYTIxY2I0Yg==',
        //     'content-type' => 'application/json',
        //   ],
        // ]);
        
        $clientcartao = new \GuzzleHttp\Client();

        // $responseData = json_decode($response->getBody(), true);
        
        // $customerId = $responseData['id'];
        $responsecartao = $clientcartao->request('POST', 'https://sandbox.asaas.com/api/v3/payments/', [
            'body' => '{
                "billingType": "CREDIT_CARD",
                "callback": {
                    "successUrl": "https://plataformaum.unysystens.com.br/login"
                },
                "creditCard": {
                    "holderName": '.$request->nome.',
                    "number": '.$request->numero_cartao.',
                    "expiryMonth": '.$request->validade_mes.',
                    "expiryYear": '.$request->validade_ano.',
                    "ccv": '.$request->cvv.',
                },
                "creditCardHolderInfo": {
                    "name": '.$request->nome_titular.',
                    "cpfCnpj": "41743114800",
                    "email": '.$request->email_titular.',
                    "postalCode": '.$request->cep.',
                    "addressNumber": '.$request->num_endereco.',
                    "phone": '.$request->celular.',
                },
                "customer": cus_000005939411,
                "value": '.$request->valor.',
                "dueDate": '.$hoje.',
                "remoteIp": '.$client_ip.',
            }',
            
        'headers' => [
            'accept' => 'application/json',
            'access_token' => '$aact_YTU5YTE0M2M2N2I4MTliNzk0YTI5N2U5MzdjNWZmNDQ6OjAwMDAwMDAwMDAwMDAwNzY5OTg6OiRhYWNoXzY2YTg2MWY5LWUyMDUtNGJlMS05MmMxLTA3NTBmYTIxY2I0Yg==',
            'content-type' => 'application/json',
        ],
        ]);

        
        $semana = date("Y-m-d", strtotime($hoje . " +1 week"));
        $mes = date("Y-m-d", strtotime($hoje . " +1 month"));
        $instituicao = new Instituicao();
        $instituicao->nome = $request->nome;
        $instituicao->num_usuarios = 3;
        if(isset($request->plano)){
            $instituicao->final_assinatura = $mes;
            $instituicao->plano = $request->plano;
        }else{
            $instituicao->final_assinatura = $semana;
        }
       
        $instituicao->save();
        $usuario = new User();
        $usuario->password = Hash::make($request->cpfcpnjp);
        $usuario->name = $request->nome;
        $usuario->email = $request->email_titular;
        $usuario->id_instituicao = $instituicao->id;
        $usuario->power = 1;
        $usuario->save();
        // $responseDatacartao = json_decode($responsecartao->getBody(), true);

        return $responsecartao->getBody();
     
    } 
}
