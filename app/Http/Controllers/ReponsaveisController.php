<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\Responsaveis;
use Illuminate\Support\Facades\Storage;
class ReponsaveisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function formResponsaveis($id_empresa){

        return view('form-responsaveis',[
            'id_empresa' => $id_empresa,
    ]);
    }

    public function cadResponsaveis(Request $request){

     // Obtenha a imagem da assinatura do pedido
     $assinaturaBase64 = $request->input('signatureImage');

     // Decodifique a imagem da assinatura da codificação base64
     $assinaturaDecodificada = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $assinaturaBase64));
 
     // Gere um nome de arquivo único para a imagem da assinatura
     $nomeArquivo = 'assinatura'.$request->id_empresa.'_' . $request->nome. '.png';
 
     // Salve a imagem da assinatura no sistema de arquivos do Laravel
     $destinationPath = public_path('fotos-assinaturas/');
 
     // Crie um arquivo temporário e escreva os dados da assinatura nele
     $tempFile = tempnam(sys_get_temp_dir(), 'assinatura_temp');
     file_put_contents($tempFile, $assinaturaDecodificada);
 
     rename($tempFile, $destinationPath . $nomeArquivo);
    // Crie um novo responsável e atribua o caminho do arquivo da assinatura ao modelo
    $responsavel = new Responsaveis();
    $responsavel->nome = $request->input('nome');
    $responsavel->cargo = $request->input('cargo');
    $responsavel->identidade_trabalho = $request->input('identidade_trabalho');
    $responsavel->id_empresa = $request->input('id_empresa');
    $responsavel->foto =  $nomeArquivo; // Campo no modelo para armazenar o caminho do arquivo da assinatura
    $responsavel->save();
        
        return redirect()->route('infoempresa', ['id' => $responsavel->id_empresa]); 
    } 

    public function infoResponsaveis($id){
        
        $responsavel = Responsaveis::where('id', $id)->first();
        return view('info-responsaveis',[
            'responsavel' => $responsavel,
        ]);

    }

    
    public function updResponsaveis(Request $request){

        $responsavel =  Responsaveis::where('id', $request->id)->first();
        $responsavel->nome = $request->nome;
        $responsavel->cargo = $request->cargo;
        $responsavel->identidade_trabalho = $request->identidade_trabalho;
        $responsavel->save();
        
        return redirect()->route('infoempresa', ['id' => $responsavel->id_empresa]);
    } 

    public function delete($id){
        Responsaveis::destroy($id);
        return back();
    }
}
