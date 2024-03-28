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
      
   
        if($plano == 'Basic'){
            $valor = 5;
            $link ='https://www.asaas.com/c/1zbzm8cxaq7c8ww8';
        }elseif($plano == 'Plus'){
            $valor = 5;
            $link = 'https://www.asaas.com/c/89x0o2uemplzmcnx';
        }else{
            $valor =5;
            $link = 'https://www.asaas.com/c/60xm4h8zx2bkzne6';
        }
        return view('plano', [ 
            'plano' => $plano,
            'valor' => $valor,
            'link' => $link    
        ]);
    }

    public function apiAsaas(Request $request) {


        $hoje = date("Y-m-d");
        // $client = new \GuzzleHttp\Client();
        
        // $response = $client->request('POST', 'https://api.asaas.com/v3/customers', [
        //     'body' => json_encode([
        //         'name' => 'Paulo Orfanelli',
        //         'cpfCnpj' => '41743114800'
        //     ]),
        //   'headers' => [
        //     'accept' => 'application/json',
        //     'access_token' => '$aact_YTU5YTE0M2M2N2I4MTliNzk0YTI5N2U5MzdjNWZmNDQ6OjAwMDAwMDAwMDAwMDA0MDY5MDU6OiRhYWNoX2YzYzg1YjZjLTdlY2UtNDE1ZC1hN2E0LTBiYzBjMzU0ZTRkOQ==',
        //     'content-type' => 'application/json',
        //   ],
        // ]);
         
        // $clientcartao = new \GuzzleHttp\Client();

        // $responseData = json_decode($response->getBody(), true);
        
        // $customerId = $responseData['id'];
        // $client = new \GuzzleHttp\Client();

        // $response = $client->request('POST', 'https://api.asaas.com/v3/payments/', [
        //   'body' => '{"billingType":"CREDIT_CARD","creditCard":{"holderName" =>"'.$request->nome.'","number":"'.$request->numero_cartao.'","expiryMonth":"'.$request->validade_mes.'","expiryYear":"'.$request->validade_ano.'","ccv":"'.$request->cvv.'"},"creditCardHolderInfo":{"name":"'.$request->nome.'","email":"'.$request->email_titular.'","postalCode":"'.$request->cep.'","addressNumber":"'.$request->num_endereco.'","phone":"'.$request->celular.'","cpfCnpj":"41743114800"},"customer":"cus_000081160474","value":5,"dueDate":"2024-08-30","remoteIp":"189.113.32.246"}',
        //   'headers' => [
        //     'accept' => 'application/json',
        //     'access_token' => '$aact_YTU5YTE0M2M2N2I4MTliNzk0YTI5N2U5MzdjNWZmNDQ6OjAwMDAwMDAwMDAwMDA0MDc2MDU6OiRhYWNoXzUyMDRkNTdiLWY4NzYtNDA3NS1iZmMyLWY4N2Q3N2Q1NjY3NA==',
        //     'content-type' => 'application/json',
        //   ],
        // ]);
        
 
        
        $semana = date("Y-m-d", strtotime($hoje . " +1 week"));
        $mes = date("Y-m-d", strtotime($hoje . " +1 month"));
        $instituicao = new Instituicao();
        $instituicao->nome = $request->nome;
        $instituicao->num_usuarios = 5;
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

        return $usuario; 
     
    } 
}
