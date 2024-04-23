<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      {{-- <link href="{{url('/dist/css/relatorio.css')}}" rel="stylesheet"> --}}
      <script src="{{url('/dist/js/calculo_ferramentas_relatorio.js')}}"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-chart-3d@2.0.0/dist/chartjs-plugin-chart-3d.min.js"></script>
        <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-cartesian-3d.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
  <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" type="text/css" rel="stylesheet">
  <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" type="text/css" rel="stylesheet">
      <title>AET</title>
        <style type="text/css">

    html,
    body,
    #container {
      width: 50%;
      height: 25%;
      margin: 0;
      padding: 0;
    }

    body {
    font-family: 'Poppins', sans-serif !important; 
    text-align: justify;
    line-height: 1.5;
  }
  table {
    border-collapse: collapse;
    width: 780px;
    margin-left:10px;   
    background-color: #f0f0f0;
    margin-top: -16px;
    border-radius: 10px;
  }
  th, td {
    border: 1px solid black;
    padding: 8px;
    text-align: center;
   border-radius: 10px;
   font-size:14px;
  }
    
  th {
    background-color: #ccc;
    border-radius: 10px;
  }

  p {
    font-family: 'Poppins', sans-serif; 
    margin: 15px;
     line-height: 1.5;
      font-size: 16px;
  }
    .title{
      
    color: #fff;
    font-weight: bold;
    font-size: 58px;
  }

  .subtitle{
    color: #fff;
    font-weight: bold;
    font-size: 38px;
  }
  .text{
    margin:15px;
  }
  .legenda-grafico{
    font-weight: bold; 
    font-size:18px;
  }
  .homepage{
    border: 15px solid #00253b;
    width: 800px ;
    height:1150px;
    background-color: {{$identidade->cor_principal}};
    border-radius: 10px;
  }

  .page{
    border: 3px solid {{$identidade->cor_principal}};
    width: 800px ;
    height:1150px;
    border-radius: 10px;
    /* background-color: lightgray; */
  }

  .cabecalho{
    border: 3px solid {{$identidade->cor_principal}};
    width: 750px ;
    height:200px;
    border-radius: 10px;
    margin-left:25px;
    margin-top: 10px;
    
  }

    .infobox{
    border: 3px solid {{$identidade->cor_principal}};
    border-top: none; 
    width: 750px ;
    height:auto;
    border-radius: 10px;
    
  }

  .subcabecalho{
    border: 3px solid #000;
    background-color: {{$identidade->cor_principal}};
    width: 750px ;
    height:auto;
    border-radius: 10px;
  }

    .subcabecalho2{
    border: 3px solid #000;
    background-color: {{$identidade->cor_principal}};
    width: 780px;
    margin-left:10px;
    margin-top:10px;
    margin-bottom:15px;
    height:auto;
    border-radius: 10px;
  }

  .img-home{
    margin-top: 100px;
    margin-left: 175px;
    border-radius: 10px;
  }

  
  .img-empresa{
    margin-top: 100px;
    margin-left: auto;
    border-radius: 10px;
  }

 .img-cabecalho{
    width: auto;
    height: 195px;
    border-radius: 10px;
    display: inline-block;
    vertical-align: top;
  }

 .cabecalhotext{
    display: inline-block;
    vertical-align: top;
    margin-left:90px;
    margin-top:10px;
    color: {{$identidade->cor_principal}};
    font-weight: bold;
  }
  .titulo-documento{
    border: 5px solid #15f1ff;
    border-radius: 80px;
    margin: 20px; 
    height: auto;
    width:auto;
    justify-content: center;
    align-items: center;
  }

 .text-cargo{
     margin:8px;
 }

 .paginacao {
  font-size: 22px;
  position: absolute;
  left: 740px; 
  margin-top: -40px;
}
.rodape {
    font-size: 22px;
    position: absolute;
    margin-top: -70px;
    left: 25%;
    width: 100px;
}

.imgrodape{
   width: 40px;
}

.border{
  max-width: 80px; /* Ajuste conforme necessário */
  font-size: 10px;
} 

 /* Estilos para centralizar o container horizontalmente */
.imagem-container{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  max-width: 550px; /* Define a largura máxima para evitar que as imagens ultrapassem */
  margin: 0 auto; /* Centralize horizontalmente */
}
 
.imagem {
  width: calc(50% - 10px); /* Defina a largura para ocupar metade da largura da imagem-container com algum espaço à direita e à esquerda */
  margin-bottom: 20px; /* Espaço entre as imagens na coluna de baixo */
  max-width: 250px; /* Largura máxima para as imagens */
}

.imagem img {
  width: 100%;
  height: auto;
}

.grafico-container {
  display: inline-block;
  width: 65%; /* Ajuste a largura conforme necessário */
  margin-right: 5px; /* Espaço entre os gráficos */
  margin-left: 20px;
  margin-top: 50px;
}


.grafico-saude {
  display: inline-block;
  width: 80%;
  height: 600px; /* Ajuste a largura conforme necessário */
  margin-right: 5px; /* Espaço entre os gráficos */
  margin-left: 20px;
  margin-top: 50px;
}

.grafico{
  max-width: 450px;

}

.sumario {
  font-size: 13px;
  margin-bottom: 20px;
}
.titulo {
  font-weight: bold;
}
ul{
  margin-right:25px;
} 
td{
   font-size: 12px;
}
li{
    font-size: 16px;
}
.pagina {
  float: right;
  margin-right: 30px;
}

.responsaveis {
  margin-top: 100px;
}

.linha-assinatura {
  border-top: 2px solid #000; 
  max-width: 300px;
}

.ferramenta{
  font-size: 18px;
}
  

.loader-wrapper {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

.loader {
    border: 8px solid #f3f3f3;
    border-top: 8px solid #3498db;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.content {
    display: none;
}

.page2 {
    border: 3px solid {{$identidade->cor_principal}};
    width: 800px ;
    height: 1150px;
    border-radius: 10px;
    position: relative;
    overflow: hidden; /* Para esconder qualquer conteúdo que ultrapasse a div */
}

.page2::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('http://127.0.0.1:8000/marcadagua/{{$identidade->marca_dagua}}');
    background-repeat: no-repeat;
    background-size: 50%;
    background-position: center;
    opacity: 0.2; /* Opacidade de 50% */
}

 

  .footercapa {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 800px;
            height: 50px; /* Altura do rodapé */
        }

   a {
  text-decoration: none; /* remove o sublinhado */
  color: #000; /* define a cor do link */
}

a:hover {
  text-decoration: underline; /* sublinhado ao passar o mouse */
}
</style>
   </head>
   @if($alert != 0)
   <script>
      alert("Você ainda não definiu sua identidade visual prórpia, faça isso no menu!");
   </script>
   @endif
   <body>
      <div class="loader-wrapper" id="loader">
        <div class="loader"></div>
    </div>

      {{-- Capa --}}
      {{-- <div class="homepage">
         <img src="/logo_plataforma_um.jpeg" class="img-home">
         <div class="titulo-documento">
            <div class="text">
               <div class="title">
                  <p class="text-center">ANÁLISE ERGONÔMICA DO TRABALHO</p>
               </div>
               <div class="subtitle">
                  <br><br><br>
                  <p class="text-center">{{$empresa->nome}}</p>
                  <p class="text-center"> 2023</p>
               </div>
            </div>
         </div>
      </div> --}}
      {{-- Contra capa com informações da empresa --}}
      <div class="content" id="content">
      <script>
      
      document.addEventListener("DOMContentLoaded", function () {
    // Simule o tempo de carregamento da página
    setTimeout(function () {
        // Esconde a tela de carregamento
        document.getElementById("loader").style.display = "none";
        // Exibe o conteúdo da página
        document.getElementById("content").style.display = "block";
    }, 3000); // Tempo de simulação em milissegundos
});

      </script>
@if($identidade->tipo == 2)
 
            <div class="page">
<svg viewBox="0 0 500 320">
  <path d="M 0 80 C 150 240 300 0 500 128 L 500 0 L 0 0" fill="{{$identidade->cor_3}}"></path>
  <path d="M 0 80 C 150 240 330 -48 500 80 L 500 0 L 0 0" fill="{{$identidade->cor_1}}" opacity="0.8"></path>
  <path d="M 0 80 C 215 240 250 0 500 160 L 500 0 L 0 0" fill="{{$identidade->cor_2}}" opacity="0.5"></path>
</svg>  

<div style="margin-top:54px">
 <p style="font-size:30px" class="text-center"><b>{{$empresa->titulo}}</b></p>
<svg viewBox="0 0 500 300">
  <path d="M 0 225 C 150 75 300 300 500 180 L 500 300 L 0 300" fill="{{$identidade->cor_3}}"></path>
  <path d="M 0 225 C 150 75 330 345 500 225 L 500 300 L 0 300" fill="{{$identidade->cor_1}}" opacity="0.8"></path>
  <path d="M 0 225 C 215 75 250 300 500 150 L 500 300 L 0 300" fill="{{$identidade->cor_2}}" opacity="0.5"></path>
</svg>
</div>

       
         </div>
      </div>
      @elseif($identidade->tipo == 3)
      <div class="page">
         <img src="/capa/{{$identidade->foto_capa}}" style="width: 100%; height: 100%">
      </div>
      @else
      <div class="page">
         <div class="cabecalho">
            <img src="/fotos-identidade/{{$identidade->foto_empresa}}" class="img-cabecalho">
            <div class="cabecalhotext">
               <h2>
                  <p class="text-center">AET</p>
               </h2>
               <p class="text-center">Análise Ergonômica do Trabalho</p>
               <p class="text-center">{{$empresa->periodo_inspecao}}</p>
            </div>
 
         @if(isset($empresa->photo))
            <center><img src="/fotos-empresas/{{$empresa->photo}}" class="img-empresa " style="max-width: 80%"></center><br>
         @endif
            <p style="font-size:30px" class="text-center"><b>{{$empresa->titulo}}</b></p>

 
         </div>
      </div>
    
      {{-- Súmario --}}
      {{-- Objetivos --}}
@endif
   
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">SUMÁRIO</p>
         </div>
         <div class="sumario">
            <ul>
               <a href="#identificacao"><li><span class="titulo">Identificação da Empresa</span> <span class="pagina">3</span></li></a>
               <a href="#introducao"><li><span class="titulo">Introdução</span> <span class="pagina">4</span></li></a>
               <a href="#analise"><li><span class="titulo">Análise Ergônomica Do Trabalho.</span> <span class="pagina">5</span></li></a>
               {{-- <li><span class="titulo">Equipe Técnica</span> <span class="pagina">5</span></li> --}}
               <a href="#objetivos"><li><span class="titulo">Objetivos Da Análise Ergônomica Do Trabalho</span> <span class="pagina">6</span></li></a>
               <a href="#metodologia"><li><span class="titulo">Metodologia Empregada</span> <span class="pagina">7</span></li></a>
               <a href="#demanda"><li><span class="titulo">Demanda</span> <span class="pagina">9</span></li></a>
               @if(isset($empresa->analise))
              <a href="#analiseglobal"> <li><span class="titulo">Ánalise Global da Empresa</span> <span class="pagina">10</span></li></a>
              <a href="#posto"><li><span class="titulo">Análise dos postos de trabalho</span><span class="pagina">11</span></li></a>
               @else
              <a href="#posto"> <li><span class="titulo">Análise dos postos de trabalho</span><span class="pagina">10</span></li></a>
               @endif
               <div id="postos" style="margin-left:20px"></div>
               @if (count($empresa->mapeamento) > 1)
              <a href="#mapeamentoergo"> <li><span class="titulo">Mapeamento Ergonômico</span> <span class="pagina" id="mapeamento"></span></li></a>
               @endif
                @if (count($empresa->planodeacao) > 1)
              <a href="#planoacao"> <li><span class="titulo">Plano de Ação</span> <span class="pagina" id="plano_de_acao"></span></li></a>
                @endif
              <a href="#disposicoes2"><li><span class="titulo">Disposições Finais</span> <span class="pagina" id="disposicoes"></span></li></a>
              <a href="#encerramento2"><li><span class="titulo">Encerramento</span> <span class="pagina" id="encerramento"></span></li></a>
              <a href="#anexospage"><li><span class="titulo">Anexos</span> <span class="pagina" id="anexos"></span></li></a>
            </ul>
         </div>
      </div>

       @if(isset($empresa->rodape))
 <div class="rodape">
      <img src="/fotos-empresa-rodape/{{$empresa->rodape->foto}}" class="imgrodape">
   </div>
@endif  {{-- Identificação da Empresa --}}
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      <div class="page2" id="identificacao">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">IDENTIFICAÇÃO DA EMPRESA</p>
         </div>
         <ul>
         <li><b>Endereço: {{$empresa->rua}}, {{$empresa->numero}}</b></li><br>
               <li><b>Cidade/Estado: {{$empresa->cidade}} - {{$empresa->estado}}</b></li><br>
               <li><b>CEP: {{$empresa->cep}}</b></li><br>
               <li><b>TELEFONE: {{$empresa->telefone}}</b></li><br>
               <li><b>CNPJ: {{$empresa->cnpj}}</b></li><br>
               <li><b>INSCRIÇÃO ESTADUAL: {{$empresa->cnpj}}</b></li><br>
               <li><b>Grau de Risco: {{$empresa->grau_de_risco}}</b></li><br>
                <li>
                  <b id="atividadecapa">
                     CNAE: <script>atividadecapa({{$empresa->cnpj}})</script>
                  </b>
               </li><br>
                <li><b>Ramo de Atividade: {{$empresa->setor}}</b></li><br>
               <li><b>Período de Inspeção: {{$empresa->periodo_inspecao}}</b></li><br>
              
              
            </ul>
        
      </div>
      {{-- Introdução --}}
      @if(isset($empresa->rodape))
 <div class="rodape">
      <img src="/fotos-empresa-rodape/{{$empresa->rodape->foto}}" class="imgrodape">
   </div>
@endif
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      <div class="page2" id="introducao">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">INTRODUÇÃO</p>
         </div>
         <p><?= $empresa->introducao->introducao?></p>
      </div>
      {{-- AET (Análise Ergonomica do Trabalho) --}}
      @if(isset($empresa->rodape))
 <div class="rodape">
      <img src="/fotos-empresa-rodape/{{$empresa->rodape->foto}}" class="imgrodape">
   </div>
@endif
       <div class="paginacao">
         <script>paginacao()</script>
      </div>
      <div class="page2" id="analise">
         @if(isset($empresa->cabecalho))
      <table style="margin-left:10px; margin-right:10px; margin-top: 10px;">
    <tr style="height: 32.5px;">
        <td style="width: 60px"><img src="/fotos-empresa-cabecalho/{{$empresa->cabecalho->foto_empresa}}" alt="Imagem 1" style="width: 100px"></td>
        <td>
            <center> 
                <table style="margin-top: 1px; width: 90%">
                    <tr>
                        <td><b> Análise Ergonômica do Trabalho</b></td> 
                    </tr>
                    <tr>
                        <td><b>{{$empresa->nome}} - CNPJ:{{$empresa->cnpj}}</b></td>
                    </tr>
                    <tr>
                        <td><b>{{$empresa->periodo_inspecao}}</b></td>
                    </tr>  
                </table>
            </center>
        </td>
        <td style="width: 60px"><img src="/fotos-empresa-produtor/{{$empresa->cabecalho->foto_produtor}}" alt="Imagem 2" style="width: 100px"></td>
    </tr>
</table>

@endif

         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">ANÁLISE ERGONÔMICA DO TRABALHO </p>
         </div>
     <p>
          Método que envolve um conjunto de etapas e ações que mantêm uma coerência interna, principalmente quanto a possibilidade de se questionar os

resultados obtidos durante a coleta de dados, validando-os ao longo do processo e aproximando-os mais da realidade pesquisada. Na AET as hipóteses são construídas, validadas e/ou refutadas ao longo do processo. Essa abordagem permite revelar a complexidade do trabalhar. Pressupõe a utilização de distintas técnicas, cuja importância para a análise depende da problemática e da configuração da demanda.

Assim, uma ação ergonômica comporta as seguintes fases:
</p>
<ul>
  <li>Análise da demanda</li>
  <li>Coleta de informações sobre a empresa</li>
  <li>Levantamento das características da população</li>
  <li>Escolha das situações de análise</li>
  <li>Análise do processo técnico e da tarefa</li>
  <li>Observações globais e abertas da atividade</li>
  <li>Elaboração de um pré – diagnóstico</li>
  <li>Observações globais sistemáticas – análise dos dados</li>
  <li>Validação</li>
  <li>Diagnóstico</li>
  <li>Recomendações e transformação</li>
</ul>
<p>

Cada uma das fases deve integrar as bases da abordagem ergonômica que pressupõe:
</p>
<ul>
  <li>Estudo centrado na atividade real de trabalho</li>
  <li>Globalidade da situação de trabalho</li>
  <li>Consideração da variabilidade, tanto decorrente da tecnologia e da produção quanto a dos trabalhadores</li>
</ul>
      </div>
  @if(isset($empresa->rodape))
 <div class="rodape">
      <img src="/fotos-empresa-rodape/{{$empresa->rodape->foto}}" class="imgrodape">
   </div>
@endif
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      {{-- Equipe Técnica --}}
      {{-- <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Equipe Técnica</p>
         </div>
         <p style="font-size: 25px;">{{$empresa->equipe->equipe}}</p>
         <br>
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Ramo de Atividade</p>
         </div>
         <p style="font-size: 25px;">Ramo De Atividade:</p>
         <p style="font-size: 25px;" id="atividade">
            <script>atividade({{$empresa->cnpj}})</script>
         </p>
      </div>
      <div class="paginacao">
         <script>paginacao()</script>
      </div> --}}
      {{-- Objetivos --}}
      @if (count($empresa->objetivos) > 0)
          
      <div class="page2" id="objetivos">
         @if(isset($empresa->cabecalho))
      <table style="margin-left:10px; margin-right:10px; margin-top: 10px;">
    <tr style="height: 32.5px;">
        <td style="width: 60px"><img src="/fotos-empresa-cabecalho/{{$empresa->cabecalho->foto_empresa}}" alt="Imagem 1" style="width: 100px"></td>
        <td>
            <center> 
                <table style="margin-top: 1px; width: 90%">
                    <tr>
                        <td><b> Análise Ergonômica do Trabalho</b></td> 
                    </tr>
                    <tr>
                        <td><b>{{$empresa->nome}} - CNPJ:{{$empresa->cnpj}}</b></td>
                    </tr>
                    <tr>
                        <td><b>{{$empresa->periodo_inspecao}}</b></td>
                    </tr>  
                </table>
            </center>
        </td>
        <td style="width: 60px"><img src="/fotos-empresa-produtor/{{$empresa->cabecalho->foto_produtor}}" alt="Imagem 2" style="width: 100px"></td>
    </tr>
</table>

@endif

         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">OBJETIVOS DA ÁNALISE ERGONÔMICA DO TRABALHO</p>
         </div>
         <ul>
            @foreach ($empresa->objetivos as $objetivo)
            <?= $objetivo->objetivo ?>
            @endforeach
         </ul>
      </div>
      @if(isset($empresa->rodape))
 <div class="rodape">
      <img src="/fotos-empresa-rodape/{{$empresa->rodape->foto}}" class="imgrodape">
   </div>
@endif
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      @endif
      {{-- Metodologia --}}
      <div class="page2" id="metodologia">
         @if(isset($empresa->cabecalho))
      <table style="margin-left:10px; margin-right:10px; margin-top: 10px;">
    <tr style="height: 32.5px;">
        <td style="width: 60px"><img src="/fotos-empresa-cabecalho/{{$empresa->cabecalho->foto_empresa}}" alt="Imagem 1" style="width: 100px"></td>
        <td>
            <center> 
                <table style="margin-top: 1px; width: 90%">
                    <tr>
                        <td><b> Análise Ergonômica do Trabalho</b></td> 
                    </tr>
                    <tr>
                        <td><b>{{$empresa->nome}} - CNPJ:{{$empresa->cnpj}}</b></td>
                    </tr>
                    <tr>
                        <td><b>{{$empresa->periodo_inspecao}}</b></td>
                    </tr>  
                </table>
            </center>
        </td>
        <td style="width: 60px"><img src="/fotos-empresa-produtor/{{$empresa->cabecalho->foto_produtor}}" alt="Imagem 2" style="width: 100px"></td>
    </tr>
</table>

@endif

         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">METODOLOGIA EMPREGADA </p>
         </div>
         <?php

            $texto = $empresa->metodologia->metodologia;

            // Verifica se a string contém o trecho desejado
            if (strpos($texto, "A metodologia de trabalho baseia-se:") !== false) {
               // Substitui o trecho pelo código HTML da imagem
               $texto = str_replace("A metodologia de trabalho baseia-se:", "A metodologia de trabalho baseia-se: <center><img src='https://unyflex.com.br/storage/banners/ergo.jpeg' alt='Metodologia' style='max-width: 280px'> </center>", $texto);
            }

            // Exibe o texto modificado
            echo $texto;
            ?>

      </div>
      @if(isset($empresa->rodape))
 <div class="rodape">
      <img src="/fotos-empresa-rodape/{{$empresa->rodape->foto}}" class="imgrodape">
   </div>
@endif
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      {{-- Metodologia2 --}}
      <div class="page2">
         @if(isset($empresa->cabecalho))
      <table style="margin-left:10px; margin-right:10px; margin-top: 10px;">
    <tr style="height: 32.5px;">
        <td style="width: 60px"><img src="/fotos-empresa-cabecalho/{{$empresa->cabecalho->foto_empresa}}" alt="Imagem 1" style="width: 100px"></td>
        <td>
            <center> 
                <table style="margin-top: 1px; width: 90%">
                    <tr>
                        <td><b> Análise Ergonômica do Trabalho</b></td> 
                    </tr>
                    <tr>
                        <td><b>{{$empresa->nome}} - CNPJ:{{$empresa->cnpj}}</b></td>
                    </tr>
                    <tr>
                        <td><b>{{$empresa->periodo_inspecao}}</b></td>
                    </tr>  
                </table>
            </center>
        </td>
        <td style="width: 60px"><img src="/fotos-empresa-produtor/{{$empresa->cabecalho->foto_produtor}}" alt="Imagem 2" style="width: 100px"></td>
    </tr>
</table>

@endif

         <p id="" class="ferramenta"><b>RITMO DE TRABALHO </b>– Existe uma distinção entre ritmo e cadência. A cadência tem um aspecto quantitativo, o ritmo qualitativo. A cadência refere-se à velocidade dos movimentos quase repete em uma dada unidade de tempo, o ritmo é a maneira como as cadências são ajustadas ou arranjadas: pode ser livre (quando o indivíduo tem autonomia para determinar sua própria cadência) ou imposto (por uma máquina, pela esteira da linha de montagem e até por incentivos à Operação) - Teiger, 1985. Na empresa encontramos: o trabalho livre.</p>
         <p id="" class="ferramenta"><b>EXIGÊNCIAS COGNITIVAS </b> – Detectamos que quanto ao conhecimento, à percepção para a realização das atividades, a maioria dos colaboradores tinha um bom preparo para a efetivação do trabalho</p>
         <p style="font-size: 16px;" class="text-center ferramenta">OBSERVAÇÕES IN LOCO E FOTOS - FERRAMENTAS ERGONÔMICAS</p>
         <p>Inicialmente foram realizadas as observações referentes à ergonomia dos postos
            de trabalho (condições dos mobiliários, das ferramentas, dos equipamentos, das
            posturas de trabalho, da iluminação, do ruído).<br><br>
            Utilizamos questionários para entrevista com funcionários para identificar os
            problemas no posto de trabalho, para posteriormente aplicar as ferramentas
            validadas pertinentes.<br><br>
            Foram utilizadas as seguintes ferramentas ergonômicas:<br><br>
         <p id="metodologia_moor" class="ferramenta"></p>
         <p id="metodologia_rula" class="ferramenta"></p>
         <p id="metodologia_owas" class="ferramenta"></p>
         <p id="metodologia_sue" class="ferramenta"></p>
         <p id="metodologia_niosh" class="ferramenta"></p>
		   <p id="metodologia_ocra" class="ferramenta"></p>
         <p id="metodologia_checklist" class="ferramenta"></p>
         <p id="metodologia_rosa" class="ferramenta"></p>
         <p id="metodologia_reba" class="ferramenta"></p>
         <p id="metodologia_hal" class="ferramenta"></p>
      </div>
            @if(isset($empresa->rodape))
 <div class="rodape">
      <img src="/fotos-empresa-rodape/{{$empresa->rodape->foto}}" class="imgrodape">
   </div>
@endif
      <div class="paginacao">
         <script>paginacao()</script>
      </div>

      {{-- Demanda --}}
      <div class="page" id="demanda">
   @if(isset($empresa->cabecalho))
      <table style="margin-left:10px; margin-right:10px; margin-top: 10px;">
    <tr style="height: 32.5px;">
        <td style="width: 60px"><img src="/fotos-empresa-cabecalho/{{$empresa->cabecalho->foto_empresa}}" alt="Imagem 1" style="width: 100px"></td>
        <td>
            <center> 
                <table style="margin-top: 1px; width: 90%">
                    <tr>
                        <td><b> Análise Ergonômica do Trabalho</b></td> 
                    </tr>
                    <tr>
                        <td><b>{{$empresa->nome}} - CNPJ:{{$empresa->cnpj}}</b></td>
                    </tr>
                    <tr>
                        <td><b>{{$empresa->periodo_inspecao}}</b></td>
                    </tr>  
                </table>
            </center>
        </td>
        <td style="width: 60px"><img src="/fotos-empresa-produtor/{{$empresa->cabecalho->foto_produtor}}" alt="Imagem 2" style="width: 100px"></td>
    </tr>
</table>

@endif

         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">DEMANDA</p>
         </div>
         <ul>
            @if(isset($empresa->demanda))
            <p><?= $empresa->demanda->demanda ?></p>
            @endif
         </ul> <br>
   
      </div>
 @if(isset($empresa->analise))
       @if(isset($empresa->rodape))
 <div class="rodape">
      <img src="/fotos-empresa-rodape/{{$empresa->rodape->foto}}" class="imgrodape">
   </div>
@endif
       <div class="paginacao">
         <script>paginacao()</script>
      </div>

      <div class="page2" id="analiseglobal">
 
{{-- Ánalise GLobal --}}
 @if(isset($empresa->cabecalho))
      <table style="margin-left:10px; margin-right:10px; margin-top: 10px;">
    <tr style="height: 32.5px;">
        <td style="width: 60px"><img src="/fotos-empresa-cabecalho/{{$empresa->cabecalho->foto_empresa}}" alt="Imagem 1" style="width: 100px"></td>
        <td>
            <center> 
                <table style="margin-top: 1px; width: 90%">
                    <tr>
                        <td><b> Análise Ergonômica do Trabalho</b></td> 
                    </tr>
                    <tr>
                        <td><b>{{$empresa->nome}} - CNPJ:{{$empresa->cnpj}}</b></td>
                    </tr>
                    <tr>
                        <td><b>{{$empresa->periodo_inspecao}}</b></td>
                    </tr>  
                </table>
            </center>
        </td>
        <td style="width: 60px"><img src="/fotos-empresa-produtor/{{$empresa->cabecalho->foto_produtor}}" alt="Imagem 2" style="width: 100px"></td>
    </tr>
</table>

@endif
      <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">ANÁLISE  GLOBAL DA EMPRESA </p>
         </div>
         <ul>
           
            <p><?= $empresa->analise->analise ?></p>
            
         </ul>
      </div>
@endif
@if(isset($empresa->rodape))
 <div class="rodape">
      <img src="/fotos-empresa-rodape/{{$empresa->rodape->foto}}" class="imgrodape">
   </div>
@endif
   {{-- Ánalise Dos Postos de Trabalho --}}
      <div class="paginacao" id="posto">
         <script>paginacao()</script>
      </div>
      {{-- Postos/Subsetores/Cargos que foram avaliados --}}
      <div class="page2">
       @if(isset($empresa->cabecalho))
      <table style="margin-left:10px; margin-right:10px; margin-top: 10px;">
    <tr style="height: 32.5px;">
        <td style="width: 60px"><img src="/fotos-empresa-cabecalho/{{$empresa->cabecalho->foto_empresa}}" alt="Imagem 1" style="width: 100px"></td>
        <td>
            <center> 
                <table style="margin-top: 1px; width: 90%">
                    <tr>
                        <td><b> Análise Ergonômica do Trabalho</b></td> 
                    </tr>
                    <tr>
                        <td><b>{{$empresa->nome}} - CNPJ:{{$empresa->cnpj}}</b></td>
                    </tr>
                    <tr>
                        <td><b>{{$empresa->periodo_inspecao}}</b></td>
                    </tr>  
                </table>
            </center>
        </td>
        <td style="width: 60px"><img src="/fotos-empresa-produtor/{{$empresa->cabecalho->foto_produtor}}" alt="Imagem 2" style="width: 100px"></td>
    </tr>
</table>

@endif
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">ANÁLISE DOS POSTOS DE TRABALHO</p>
         </div>
         <p >O documento contempla o levantamento ergonômico @if(count($empresa->area) > 1) das seguintes áreas:@else da seguinte área: @endif </p>
         <ul>
            @foreach ($empresa->area as $area)
            <li >{{$area->nome}}</li>
            @endforeach
         </ul>
      </div>
     
 @foreach ($empresa->area as $area)
        @if(isset($empresa->rodape))
 <div class="rodape">
      <img src="/fotos-empresa-rodape/{{$empresa->rodape->foto}}" class="imgrodape">
   </div>
@endif
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      {{-- Postos/Subsetores/Cargos que foram avaliados --}}
      <div class="page2">
       @if(isset($empresa->cabecalho))
      <table style="margin-left:10px; margin-right:10px; margin-top: 10px;">
    <tr style="height: 32.5px;">
        <td style="width: 60px"><img src="/fotos-empresa-cabecalho/{{$empresa->cabecalho->foto_empresa}}" alt="Imagem 1" style="width: 100px"></td>
        <td>
            <center> 
                <table style="margin-top: 1px; width: 90%">
                    <tr>
                        <td><b> Análise Ergonômica do Trabalho</b></td> 
                    </tr>
                    <tr>
                        <td><b>{{$empresa->nome}} - CNPJ:{{$empresa->cnpj}}</b></td>
                    </tr>
                    <tr>
                        <td><b>{{$empresa->periodo_inspecao}}</b></td>
                    </tr>  
                </table>
            </center>
        </td>
        <td style="width: 60px"><img src="/fotos-empresa-produtor/{{$empresa->cabecalho->foto_produtor}}" alt="Imagem 2" style="width: 100px"></td>
    </tr>
</table>

@endif
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">ÁREA: {{$area->nome}}</p>
         </div>
         <p>As avaliações ocorreram nos seguintes setores da empresa:</p>
         <ul>
           @foreach ($area->setores as $setor)
            <li>{{$setor->nome}}</li>
            @endforeach
         </ul>
      </div>
             
      {{-- Loop Setores --}}
    @foreach ($area->setores as $setor)
          @if(isset($empresa->rodape))
 <div class="rodape">
      <img src="/fotos-empresa-rodape/{{$empresa->rodape->foto}}" class="imgrodape">
   </div>
@endif
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
         <script>
            var postos = document.getElementById('postos'); 
            var pagina = document.getElementsByClassName('page').length + document.getElementsByClassName('page2').length + 2; 
            postos.innerHTML +=  '<a href="#{{$setor->nome}}"> <li><span class="titulo">{{$setor->nome}}</span><span class="pagina">'+ pagina +'</span></li></a>';
         </script>
      <div class="page2" id="{{$setor->nome}}">
       @if(isset($empresa->cabecalho))
      <table style="margin-left:10px; margin-right:10px; margin-top: 10px;">
    <tr style="height: 32.5px;">
        <td style="width: 60px"><img src="/fotos-empresa-cabecalho/{{$empresa->cabecalho->foto_empresa}}" alt="Imagem 1" style="width: 100px"></td>
        <td>
            <center> 
                <table style="margin-top: 1px; width: 90%">
                    <tr>
                        <td><b> Análise Ergonômica do Trabalho</b></td> 
                    </tr>
                    <tr>
                        <td><b>{{$empresa->nome}} - CNPJ:{{$empresa->cnpj}}</b></td>
                    </tr>
                    <tr>
                        <td><b>{{$empresa->periodo_inspecao}}</b></td>
                    </tr>  
                </table>
            </center>
        </td>
        <td style="width: 60px"><img src="/fotos-empresa-produtor/{{$empresa->cabecalho->foto_produtor}}" alt="Imagem 2" style="width: 100px"></td>
    </tr>
</table>

@endif
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">ÁREA: {{mb_strtoupper($area->nome, 'UTF-8')}}</p>
         </div>
         <p>No setor {{$setor->nome}},  foi realizado o levantamento ergonômico das atividades nos seguintes postos de trabalho:</p>
         <ul>
            @foreach ($setor->subsetores as $subsetor) 
            <li>{{$subsetor->nome}}</li>
            @endforeach
         </ul>
      </div>
      {{-- Começo de descrição geral subsetores --}}
	 @foreach ($setor->subsetores as $subsetor)
          @if(isset($empresa->rodape))
 <div class="rodape">
      <img src="/fotos-empresa-rodape/{{$empresa->rodape->foto}}" class="imgrodape">
   </div>
@endif
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
    <?php
$descricao = $subsetor->descricao;
$maxCaracteres = 899;

// Definir a função apenas se não existir
if (!function_exists('findNextBreakPosition')) {
    // Função para encontrar a próxima posição de quebra de página
    function findNextBreakPosition($text, $maxCharacters) {
        $closingTagPosition = mb_strpos(mb_substr($text, $maxCharacters), "</p>");
        $dotPosition = mb_strpos(mb_substr($text, $maxCharacters), ";");
        $brPosition = mb_strpos(mb_substr($text, $maxCharacters), "<br>");

        // Escolher a posição apropriada para a quebra de página
        return $closingTagPosition !== false ? $closingTagPosition :
               ($dotPosition !== false ? $dotPosition : $brPosition);
    }
}

if (mb_strlen($descricao) > $maxCaracteres) {
    $startPosition = 0;
      $ij = 0;
    while ($startPosition < mb_strlen($descricao)) {
        // Encontrar a posição para a quebra de página
        $breakPosition = findNextBreakPosition(mb_substr($descricao, $startPosition), $maxCaracteres);

        // Se encontrarmos uma posição, dividir e exibir a página
        if ($breakPosition !== false) {
            $breakPosition += $maxCaracteres;
            $parte = mb_substr($descricao, $startPosition, $breakPosition + 4);

            // Saída do conteúdo HTML
            echo '
<div class="page2"> 

';

if($ij == 0){
echo '
    <div class="subcabecalho2">
        <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">ÁREA: ' . mb_strtoupper($area->nome, 'UTF-8') . '</p>
    </div>
    <table style="margin-left:10px; margin-right:10px">
       <tr>
            <td><b>Setor:</b></td>
            <td>' . $setor->nome . '</td>
        </tr>
        <tr>
            <td><b>Posto de Trabalho:</b></td>
            <td>' . $subsetor->nome . '</td>
        </tr>

         <tr>
               <td><b>Função:</b></td>
               <td>' . $subsetor->funcao->funcao. '</td>
         </tr>
        <!-- Adicione mais linhas conforme necessário -->
    </table>';
}
if(strlen($parte) > 10){
  
echo '
    <div class="subcabecalho2">
        <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">DESCRIÇÃO DA TAREFA</p>
    </div>
    <p class="text-cargo">' . $parte . '</p>
</div>';
            $startPosition += $breakPosition + 4;
            $ij++;
       } } else {
            // Se não houver mais quebras de página, exibir o restante do texto e sair do loop
            $parte = mb_substr($descricao, $startPosition);
          
if(strlen($parte) > 50){
            echo '
<div class="page2">
    
    <div class="subcabecalho2">
        <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">DESCRIÇÃO DA TAREFA</p>
    </div>
    <p class="text-cargo">' . $parte . '</p>
</div>';}
            break;
        }
    }
} else {
    // Caso em que o conteúdo não precisa ser quebrado em páginas

?>



    
      <div class="page2">
         <div class="subcabecalho2">
        
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">ÁREA: {{mb_strtoupper($area->nome, 'UTF-8')}}</p>
         </div>
         <table style="margin-left:10px; margin-right:10px">
            <tr>
               <td><b>Setor:</b></td>
               <td>{{$setor->nome}}</td>
            </tr>
            <tr>
               <td><b>Posto de Trabalho:</b></td>
               <td>{{$subsetor->nome}}</td>
    
            </tr>
            @if(isset($subsetor->funcao))
              <tr>
               <td><b>Função:</b></td>
               <td>{{$subsetor->funcao->funcao}}</td>
            </tr>
            @endif

            @if(isset($subsetor->tarefa))
              <tr>
               <td><b>Tarefa:</b></td>
               <td>{{$subsetor->tarefa->tarefa}}</td>
            </tr>
            @endif
            
            <!-- Adicione mais linhas conforme necessário -->
         </table>
         <div class="subcabecalho2">
          @if(isset($empresa->cabecalho))
      <table style="margin-left:10px; margin-right:10px; margin-top: 10px;">
    <tr style="height: 32.5px;">
        <td style="width: 60px"><img src="/fotos-empresa-cabecalho/{{$empresa->cabecalho->foto_empresa}}" alt="Imagem 1" style="width: 100px"></td>
        <td>
            <center> 
                <table style="margin-top: 1px; width: 90%">
                    <tr>
                        <td><b> Análise Ergonômica do Trabalho</b></td> 
                    </tr>
                    <tr>
                        <td><b>{{$empresa->nome}} - CNPJ:{{$empresa->cnpj}}</b></td>
                    </tr>
                    <tr>
                        <td><b>{{$empresa->periodo_inspecao}}</b></td>
                    </tr>  
                </table>
            </center>
        </td>
        <td style="width: 60px"><img src="/fotos-empresa-produtor/{{$empresa->cabecalho->foto_produtor}}" alt="Imagem 2" style="width: 100px"></td>
    </tr>
</table>

@endif
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">DESCRIÇÃO DA TAREFA</p>
         </div>
       
         <p class="text-cargo" ><?= $subsetor->descricao?>. </p>
     
      </div>
            @if(isset($empresa->rodape))
 <div class="rodape">
      <img src="/fotos-empresa-rodape/{{$empresa->rodape->foto}}" class="imgrodape">
   </div>
@endif
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      <?php }?>
      @if(isset($subsetor->analiseAtividade))
      {{-- Ánalise da Atividade --}}

      <div class="page2">
       @if(isset($empresa->cabecalho))
      <table style="margin-left:10px; margin-right:10px; margin-top: 10px;">
    <tr style="height: 32.5px;">
        <td style="width: 60px"><img src="/fotos-empresa-cabecalho/{{$empresa->cabecalho->foto_empresa}}" alt="Imagem 1" style="width: 100px"></td>
        <td>
            <center> 
                <table style="margin-top: 1px; width: 90%">
                    <tr>
                        <td><b> Análise Ergonômica do Trabalho</b></td> 
                    </tr>
                    <tr>
                        <td><b>{{$empresa->nome}} - CNPJ:{{$empresa->cnpj}}</b></td>
                    </tr>
                    <tr>
                        <td><b>{{$empresa->periodo_inspecao}}</b></td>
                    </tr>  
                </table>
            </center>
        </td>
        <td style="width: 60px"><img src="/fotos-empresa-produtor/{{$empresa->cabecalho->foto_produtor}}" alt="Imagem 2" style="width: 100px"></td>
    </tr>
</table>

@endif
         <div class="subcabecalho2" style="margin-top:35px">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">ANÁLISE DA ATIVIDADE</p>
         </div>

            <p><?= $subsetor->analiseAtividade->analise ?></p>
         
      </div>
      @endif
      {{-- Fotos Atividade --}}
      @if(count($subsetor->fotosatividade) >= 1)
            @if(isset($empresa->rodape))
 <div class="rodape">
      <img src="/fotos-empresa-rodape/{{$empresa->rodape->foto}}" class="imgrodape">
   </div>
@endif
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      <div class="page">
               @if(isset($empresa->cabecalho))
      <table style="margin-left:10px; margin-right:10px; margin-top: 10px;">
    <tr style="height: 32.5px;">
        <td style="width: 60px"><img src="/fotos-empresa-cabecalho/{{$empresa->cabecalho->foto_empresa}}" alt="Imagem 1" style="width: 100px"></td>
        <td>
            <center> 
                <table style="margin-top: 1px; width: 90%">
                    <tr>
                        <td><b> Análise Ergonômica do Trabalho</b></td> 
                    </tr>
                    <tr>
                        <td><b>{{$empresa->nome}} - CNPJ:{{$empresa->cnpj}}</b></td>
                    </tr>
                    <tr>
                        <td><b>{{$empresa->periodo_inspecao}}</b></td>
                    </tr>  
                </table>
            </center>
        </td>
        <td style="width: 60px"><img src="/fotos-empresa-produtor/{{$empresa->cabecalho->foto_produtor}}" alt="Imagem 2" style="width: 100px"></td>
    </tr>
</table>

@endif
         <div class="subcabecalho2">
 
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">FOTOS</p>
         </div>
         <div class="imagem-container">
            @foreach ($subsetor->fotosatividade as $foto)
            <div class="imagem">
               <img src="/fotos-atividades/{{$foto->photo}}" alt="Imagem" style=" max-height: 250px ;">
            </div>
            @endforeach
            @if (isset($subsetor->descricaoFotos))
                 <p>{{$subsetor->descricaoFotos->descricao}}</p>
            @else
            <p>Fotos - Funcionário executando atividade: {{$subsetor->nome}}</p>
            @endif
         </div>
      </div>
            @if(isset($empresa->rodape))
 <div class="rodape">
      <img src="/fotos-empresa-rodape/{{$empresa->rodape->foto}}" class="imgrodape">
   </div>
@endif
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      {{-- Características do Trabalho  --}}
      @if (count($subsetor->dadosOrganizacionais) > 0)
          
     
      <div class="page">
       @if(isset($empresa->cabecalho))
      <table style="margin-left:10px; margin-right:10px; margin-top: 10px;">
    <tr style="height: 32.5px;">
        <td style="width: 60px"><img src="/fotos-empresa-cabecalho/{{$empresa->cabecalho->foto_empresa}}" alt="Imagem 1" style="width: 100px"></td>
        <td>
            <center> 
                <table style="margin-top: 1px; width: 90%">
                    <tr>
                        <td><b> Análise Ergonômica do Trabalho</b></td> 
                    </tr>
                    <tr>
                        <td><b>{{$empresa->nome}} - CNPJ:{{$empresa->cnpj}}</b></td>
                    </tr>
                    <tr>
                        <td><b>{{$empresa->periodo_inspecao}}</b></td>
                    </tr>  
                </table>
            </center>
        </td>
        <td style="width: 60px"><img src="/fotos-empresa-produtor/{{$empresa->cabecalho->foto_produtor}}" alt="Imagem 2" style="width: 100px"></td>
    </tr>
</table>

@endif
         <div class="subcabecalho2" style="margin-top:35px">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">CARACTERÍSTICAS DA ORGANIZAÇÃO DO TRABALHO</p>
         </div>
         <ul>
        
            @foreach ($subsetor->dadosOrganizacionais as $dados)  

               @php
                  $partes = explode(":", $dados->dado);
             
               @endphp
            <li><b>{{$partes[0]}}:</b>@if(isset($partes[1])) {{$partes[1]}} @endif</li>
            @endforeach
         
         </ul>
       
      </div>
   @endif
    @endif
  {{-- POPULAÇÃO --}}
      {{-- Pegar dados Populacionais --}}
 
      @php $populacaoSubsetor = $subsetor->populacaosubsetor; @endphp
      
      <script>
         var populacaoSubsetor = @json($populacaoSubsetor);
         var graficos{{$subsetor->id}} = calcularEstatisticas(populacaoSubsetor, {{$subsetor->id}});
         console.log(graficos{{$subsetor->id}});
      </script>
         @if(isset($empresa->rodape))
 <div class="rodape">
      <img src="/fotos-empresa-rodape/{{$empresa->rodape->foto}}" class="imgrodape">
   </div>
@endif
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      {{-- Gráficos Populacionais --}}
       @if(count($subsetor->populacaosubsetor) >= 1)
      <div class="page">
   
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">CARACTERÍSTICAS DA POPULAÇÃO</p>
         </div>
          <center>
         <div class="grafico-container">
		 	<p class="text-center legenda-grafico">Gênero</p>
                <div id="genero{{$subsetor->id}}"></div>
         </div>
         <div class="grafico-container">
		 <p class="text-center legenda-grafico">Faixa Etária</p>
            <div id="faixaetaria{{$subsetor->id}}"></div>
         </div>

               <div class="grafico-container">
		 <p class="text-center legenda-grafico">Tempo Admissão</p>
            <div id="tempoadmissao{{$subsetor->id}}"></div>
         </div>
              <div class="grafico-container">
		 <p class="text-center legenda-grafico">Escolaridade</p>
            <div id="escolaridade{{$subsetor->id}}"></div>
             <div class="bloco-preto"></div>
         </div>
  </center>
      </div>
 
      <div class="paginacao">
         <script>paginacao()</script>
      </div>

    

      <script>
         //Gráfico Genêro

anychart.onDocumentReady(function () {
  // create column chart
  var chart = anychart.column3d();

  // turn on chart animation
  chart.animation(true);

  // set chart title text settings
  var data = graficos{{$subsetor->id}}.genero;
  var customColors = ['#FF5733', '#FFC300', '#3498DB', '#32CD32', '#FF5733', '#FFC300', '#3498DB', '#32CD32', '#FF5733'];


var chartData = [];

data.labels.forEach(function(label, index) {
  var value = data.data[index];
  var color = customColors[index];

  chartData.push({ x: label, value: value, fill: color });
});
   

  // create area series with passed data e atribuir cores da paleta personalizada
chart.column(chartData);

  // Adicionar rótulos no topo de cada barra
  chart.getSeries(0).labels().enabled(true);
  chart.getSeries(0).labels().position('top');
  chart.getSeries(0).labels().format('{%Value} %');
  chart.background().fill("#f0f0f0");
  chart
    .tooltip()
    .position('center-top')
    .anchor('center-bottom')
    .offsetX(0)
    .offsetY(5)
    .format('{%Value}%');

  // set scale minimum
  chart.yScale().minimum(0);

  // set yAxis labels formatter
  chart.yAxis().labels().format('{%Value}%');

  chart.tooltip().positionMode('point');
  chart.interactivity().hoverMode('by-x');
  chart.yScale().minimum(0);
  chart.yScale().maximum(100);

  // set container id for the chart
  chart.container('genero{{$subsetor->id}}');

  // initiate chart drawing
  chart.draw();
});


         //Gráfico Faixa Etaria
   anychart.onDocumentReady(function () {
  // create column chart
  var chart = anychart.column3d();

  // turn on chart animation
  chart.animation(true);

  // set chart title text settings
  var data = graficos{{$subsetor->id}}.faixaetaria;
  var customColors = ['#FF5733', '#FFC300', '#3498DB', '#32CD32', '#FF5733', '#FFC300', '#3498DB', '#32CD32', '#FF5733'];


var chartData = [];

data.labels.forEach(function(label, index) {
  var value = data.data[index];
  var color = customColors[index];
  
  chartData.push({ x: label, value: value, fill: color });
});
   

  // create area series with passed data e atribuir cores da paleta personalizada
chart.column(chartData);

  // Adicionar rótulos no topo de cada barra
  chart.getSeries(0).labels().enabled(true);
  chart.getSeries(0).labels().position('top');
  chart.getSeries(0).labels().format('{%Value} %');
  chart.background().fill("#f0f0f0");
  chart
    .tooltip()
    .position('center-top')
    .anchor('center-bottom')
    .offsetX(0)
    .offsetY(5)
    .format('{%Value}%');

  // set scale minimum
  chart.yScale().minimum(0);

  // set yAxis labels formatter
  chart.yAxis().labels().format('{%Value}%');

  chart.tooltip().positionMode('point');
  chart.interactivity().hoverMode('by-x');
  chart.yScale().minimum(0);
  chart.yScale().maximum(100);

  // set container id for the chart
  chart.container('faixaetaria{{$subsetor->id}}');

  // initiate chart drawing
  chart.draw();
});
       
       
         
         //Gráfico Escolaridade
         
         //Gráfico Faixa Etaria
   anychart.onDocumentReady(function () {
  // create column chart
  var chart = anychart.column3d();

  // turn on chart animation
  chart.animation(true);

  // set chart title text settings
  var data = graficos{{$subsetor->id}}.escolaridade;
  var customColors = ['#FF5733', '#FFC300', '#3498DB', '#32CD32', '#FF5733', '#FFC300', '#3498DB', '#32CD32', '#FF5733'];


var chartData = [];

data.labels.forEach(function(label, index) {
  var value = data.data[index];
  var color = customColors[index];
   
  chartData.push({ x: label, value: value, fill: color });
});
   

  // create area series with passed data e atribuir cores da paleta personalizada
chart.column(chartData);

  // Adicionar rótulos no topo de cada barra
  chart.getSeries(0).labels().enabled(true);
  chart.getSeries(0).labels().position('top');
  chart.getSeries(0).labels().format('{%Value} %');
  chart.background().fill("#f0f0f0");
  chart
    .tooltip()
    .position('center-top')
    .anchor('center-bottom')
    .offsetX(0)
    .offsetY(5)
    .format('{%Value}%');

  // set scale minimum
  chart.yScale().minimum(0);

  // set yAxis labels formatter
  chart.yAxis().labels().format('{%Value}%');

  chart.tooltip().positionMode('point');
  chart.interactivity().hoverMode('by-x');
  chart.yScale().minimum(0);
  chart.yScale().maximum(100);

  // set container id for the chart
  chart.container('escolaridade{{$subsetor->id}}');

  // initiate chart drawing
  chart.draw();
});

//Tempo Admissão
 //Gráfico Escolaridade
         
         //Gráfico Faixa Etaria
   anychart.onDocumentReady(function () {
  // create column chart
  var chart = anychart.column3d();

  // turn on chart animation
  chart.animation(true);

  // set chart title text settings
  var data = graficos{{$subsetor->id}}.tempoadmissao;
  var customColors = ['#FF5733', '#FFC300', '#3498DB', '#32CD32', '#FF5733', '#FFC300', '#3498DB', '#32CD32', '#FF5733'];


var chartData = [];

data.labels.forEach(function(label, index) {
  var value = data.data[index];
  var color = customColors[index];
   
  chartData.push({ x: label, value: value, fill: color });
});
   

  // create area series with passed data e atribuir cores da paleta personalizada
chart.column(chartData);

  // Adicionar rótulos no topo de cada barra
  chart.getSeries(0).labels().enabled(true);
  chart.getSeries(0).labels().position('top');
  chart.getSeries(0).labels().format('{%Value} %');
  chart.background().fill("#f0f0f0");
  chart
    .tooltip()
    .position('center-top')
    .anchor('center-bottom')
    .offsetX(0)
    .offsetY(5)
    .format('{%Value}%');

  // set scale minimum
  chart.yScale().minimum(0);

  // set yAxis labels formatter
  chart.yAxis().labels().format('{%Value}%');

  chart.tooltip().positionMode('point');
  chart.interactivity().hoverMode('by-x');
  chart.yScale().minimum(0);
  chart.yScale().maximum(100);

  // set container id for the chart
  chart.container('tempoadmissao{{$subsetor->id}}');

  // initiate chart drawing
  chart.draw();
});
      </script>

        <div class="paginacao">

         <script>paginacao()</script>
      </div>
      @endif
   @if(isset($subsetor->dadossaude))
      {{-- Dados de Saúde --}}
      <div class="page">
       @if(isset($empresa->cabecalho))
      <table style="margin-left:10px; margin-right:10px; margin-top: 10px;">
    <tr style="height: 32.5px;">
        <td style="width: 60px"><img src="/fotos-empresa-cabecalho/{{$empresa->cabecalho->foto_empresa}}" alt="Imagem 1" style="width: 100px"></td>
        <td>
            <center> 
                <table style="margin-top: 1px; width: 90%">
                    <tr>
                        <td><b> Análise Ergonômica do Trabalho</b></td> 
                    </tr>
                    <tr>
                        <td><b>{{$empresa->nome}} - CNPJ:{{$empresa->cnpj}}</b></td>
                    </tr>
                    <tr>
                        <td><b>{{$empresa->periodo_inspecao}}</b></td>
                    </tr>  
                </table>
            </center>
        </td>
        <td style="width: 60px"><img src="/fotos-empresa-produtor/{{$empresa->cabecalho->foto_produtor}}" alt="Imagem 2" style="width: 100px"></td>
    </tr>
</table>

@endif
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">DADOS DE SAÚDE</p>
         </div>
         <p style="font-size: 16px;">Por meio de uma entrevista individualizada (com participação de 100% dos trabalhadores do setor) foi aplicado um questionário com questões abertas com a finalidade de identificar os principais desconfortos referidos pelos
            trabalhadores e que podem influenciar o seu desempenho durante o processo de trabalho.</li>
         <p>
       
            @php
            $sim = $subsetor->dadossaude->sim;
            $nao = $subsetor->dadossaude->nao;
            $total = $sim + $nao;
            $porcentagemSim = round(($sim / $total) * 100);
            $porcentagemNao = round(($nao / $total) * 100);
            $dataSaude = [
            'labels' => ['Sim', 'Não'],
            'data' => [$porcentagemSim, $porcentagemNao],
            ];

    

            @endphp
         <div style="margin-left: 10%; margin-top: 50px">
		 	<p class="text-center" style="font-size: 22px; font-weight: bold;">{{$subsetor->dadossaude->titulo}}</p>
            <div class="grafico-container">
               <div id="dadosaude{{$subsetor->id}}" style="height: 230px; width: 160%; margin-left: -70px"></div>
            </div>
         <p class="text-center" style="font-size: 22px; font-weight: bold;" id="segmentocorporal{{$subsetor->id}}">Segmento Corporal</p>
            <div class="grafico-container">
               <div id="segmento{{$subsetor->id}}" style="height: 230px; width: 160%; margin-left: -70px" ></div>
            </div>
         </div> 
         <script>
         
         //Gráfico Faixa Etaria
   anychart.onDocumentReady(function () {
  // create column chart
  var chart = anychart.column3d();

  // turn on chart animation
  chart.animation(true);

  // set chart title text settings

     var data = @json($dataSaude);
    
var chartData = [];
  var customColors = ['#FF5733', '#FFC300', '#3498DB', '#32CD32', '#FF5733', '#FFC300', '#3498DB', '#32CD32', '#FF5733'];


data.labels.forEach(function(label, index) {
  var value = data.data[index];
  var color = customColors[index];
   
  chartData.push({ x: label, value: value, fill: color });
});
   

  // create area series with passed data e atribuir cores da paleta personalizada
chart.column(chartData);

  // Adicionar rótulos no topo de cada barra
  chart.getSeries(0).labels().enabled(true);
  chart.getSeries(0).labels().position('top');
  chart.getSeries(0).labels().format('{%Value} %');
  chart.background().fill("#f0f0f0");
  chart
    .tooltip()
    .position('center-top')
    .anchor('center-bottom')
    .offsetX(0)
    .offsetY(5)
    .format('{%Value}%');

  // set scale minimum
  chart.yScale().minimum(0);

  // set yAxis labels formatter
  chart.yAxis().labels().format('{%Value}%');

  chart.tooltip().positionMode('point');
  chart.interactivity().hoverMode('by-x');
  chart.yScale().minimum(0);
  chart.yScale().maximum(100);

  // set container id for the chart
  chart.container('dadosaude{{$subsetor->id}}');

  // initiate chart drawing
  chart.draw();
});



</script>

   @if (isset($subsetor->dadossaude->segmentos))

   @php
            $colunaCervical = $subsetor->dadossaude->segmentos->coluna_cervical ?? 0;
            $colunaToracica = $subsetor->dadossaude->segmentos->coluna_toracica ?? 0;
            $colunaLombar = $subsetor->dadossaude->segmentos->coluna_lombar ?? 0;
            $ombro = $subsetor->dadossaude->segmentos->ombro ?? 0;
            $cotovelo = $subsetor->dadossaude->segmentos->cotovelo ?? 0;
            $punhoMao = $subsetor->dadossaude->segmentos->punho_mao ?? 0;
            $quadril = $subsetor->dadossaude->segmentos->quadril ?? 0;
            $joelho = $subsetor->dadossaude->segmentos->joelho ?? 0;
            $tornozeloPe = $subsetor->dadossaude->segmentos->tornozelo ?? 0;


           $total = $colunaCervical + $colunaToracica + $colunaLombar + $ombro + $cotovelo + $punhoMao + $quadril + $joelho + $tornozeloPe;

           
   @endphp
     @if($total > 0)
         @php
      
            $porcentagemColunaCervical = round(($colunaCervical / $total) * 100);
            $porcentagemColunaToracica = round(($colunaToracica / $total) * 100);
            $porcentagemColunaLombar = round(($colunaLombar / $total) * 100);
            $porcentagemOmbro = round(($ombro / $total) * 100);
            $porcentagemCotovelo = round(($cotovelo / $total) * 100);
            $porcentagemPunhoMao = round(($punhoMao / $total) * 100);
            $porcentagemQuadril = round(($quadril / $total) * 100);
            $porcentagemJoelho = round(($joelho / $total) * 100);
            $porcentagemTornozeloPe = round(($tornozeloPe / $total) * 100);

   @endphp

 
<script>


//GRÁFICO SEGMENTOS CORPORAIS
 //Gráfico Faixa Etaria
   anychart.onDocumentReady(function () {
  // create column chart
  var chart = anychart.column3d();

  // turn on chart animation
  chart.animation(true);
    
var chartData = [];
  var customColors = ['#FF5733', '#FFC300', '#3498DB', '#32CD32', '#FF5733', '#FFC300', '#3498DB', '#32CD32', '#FF5733'];


  var chartData = [
    { x: 'Coluna Cervical', value: {{$porcentagemColunaCervical}}, fill: '#FF5733' },
    { x: 'Coluna Toracica', value: {{$porcentagemColunaToracica}}, fill: '#FFC300' },
    { x: 'Coluna Lombar', value: {{$porcentagemColunaLombar}}, fill: '#3498DB' },
    { x: 'Ombro', value: {{$porcentagemOmbro}}, fill: '#32CD32' },
    { x: 'Cotovelo', value: {{$porcentagemCotovelo}}, fill: '#FF9900' },
    { x: 'Punho/Mão', value: {{$porcentagemPunhoMao}}, fill: '#66CCCC' },
    { x: 'Quadril', value: {{$porcentagemQuadril}}, fill: '#993366' },
    { x: 'Joelho', value: {{$porcentagemJoelho}}, fill: '#996633' },
   { x: 'Tornozelo/Pé', value: {{$porcentagemTornozeloPe}}, fill: '#0099CC' },
  ];
   

  // create area series with passed data e atribuir cores da paleta personalizada
chart.column(chartData);

  // Adicionar rótulos no topo de cada barra
  chart.getSeries(0).labels().enabled(true);
  chart.getSeries(0).labels().position('top');
  chart.getSeries(0).labels().format('{%Value} %');
  chart.background().fill("#f0f0f0");
  chart
    .tooltip()
    .position('center-top')
    .anchor('center-bottom')
    .offsetX(0)
    .offsetY(5)
    .format('{%Value}%');

  // set scale minimum
  chart.yScale().minimum(0);

  // set yAxis labels formatter
  chart.yAxis().labels().format('{%Value}%');

  chart.tooltip().positionMode('point');
  chart.interactivity().hoverMode('by-x');
  chart.yScale().minimum(0);
  chart.yScale().maximum(100);

  // set container id for the chart
  chart.container('segmento{{$subsetor->id}}');

  // initiate chart drawing
  chart.draw();
});
          
         </script>

         @else
         <script>
            var segmento = document.getElementById('segmentocorporal{{$subsetor->id}}');
            segmento.innerHTML = 'Não Há Queixas';
         </script>
         @endif
          @endif
      </div>
       @endif

             @if(isset($empresa->rodape))
 <div class="rodape">
      <img src="/fotos-empresa-rodape/{{$empresa->rodape->foto}}" class="imgrodape">
   </div>
@endif
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
     
     {{-- Caracteristicas do ambiente de trabalho --}}
     @if(count($subsetor->caracteristicas) >= 1)
      <div class="page2">
       @if(isset($empresa->cabecalho))
      <table style="margin-left:10px; margin-right:10px; margin-top: 10px;">
    <tr style="height: 32.5px;">
        <td style="width: 60px"><img src="/fotos-empresa-cabecalho/{{$empresa->cabecalho->foto_empresa}}" alt="Imagem 1" style="width: 100px"></td>
        <td>
            <center> 
                <table style="margin-top: 1px; width: 90%">
                    <tr>
                        <td><b> Análise Ergonômica do Trabalho</b></td> 
                    </tr>
                    <tr>
                        <td><b>{{$empresa->nome}} - CNPJ:{{$empresa->cnpj}}</b></td>
                    </tr>
                    <tr>
                        <td><b>{{$empresa->periodo_inspecao}}</b></td>
                    </tr>  
                </table>
            </center>
        </td>
        <td style="width: 60px"><img src="/fotos-empresa-produtor/{{$empresa->cabecalho->foto_produtor}}" alt="Imagem 2" style="width: 100px"></td>
    </tr>
</table>

@endif

         <div class="subcabecalho2" style="margin-top:35px">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">CARACTERÍSTICAS DO AMBIENTE DE TRABALHO</p>
         </div>
         <ul>
           
            @foreach ($subsetor->caracteristicas as $caracteristica)  
            @php
            $titulo = $caracteristica->titulo;

            // Verifica se o último caractere é diferente de ":"
            if (substr($titulo, -1) !== ':') {
               $titulo .= ':';
            }

        
            @endphp
            <li><b>{{$titulo}} </b><?= $caracteristica->descricao ?></li>
            @endforeach
     
         </ul>
             {{-- Pré diagnosticos --}}
              @if (count($subsetor->preDiagnostico) > 0)
       
         <div class="subcabecalho2" style="margin-top:35px">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">PRÉ DIAGNÓSTICO</p>
         </div>
@endif
         @if (count($subsetor->preDiagnostico) < 7)
            
         <ul>
          
            @foreach ($subsetor->preDiagnostico as $diagnostico)  
                @php
            $titulodiagnostico = $diagnostico->titulo;

            // Verifica se o último caractere é diferente de ":"
            if (substr($titulodiagnostico, -1) !== ':') {
               $titulodiagnostico .= ':';
            }

        
            @endphp
            <li><b>{{$titulodiagnostico}}</b> {{$diagnostico->descricao}}</li>
            @endforeach
          
         </ul>

         @endif
      </div>
@endif
      @if(isset($empresa->rodape))
 <div class="rodape">
      <img src="/fotos-empresa-rodape/{{$empresa->rodape->foto}}" class="imgrodape">
   </div>
@endif
	    <div class="paginacao">
         <script>paginacao()</script>
      </div>

        @if(count($subsetor->preDiagnostico) > 6 )
    <div class="page2">
   
         {{-- Pré diagnosticos --}}
          @if(isset($empresa->cabecalho))
      <table style="margin-left:10px; margin-right:10px; margin-top: 10px;">
    <tr style="height: 32.5px;">
        <td style="width: 60px"><img src="/fotos-empresa-cabecalho/{{$empresa->cabecalho->foto_empresa}}" alt="Imagem 1" style="width: 100px"></td>
        <td>
            <center> 
                <table style="margin-top: 1px; width: 90%">
                    <tr>
                        <td><b> Análise Ergonômica do Trabalho</b></td> 
                    </tr>
                    <tr>
                        <td><b>{{$empresa->nome}} - CNPJ:{{$empresa->cnpj}}</b></td>
                    </tr>
                    <tr>
                        <td><b>{{$empresa->periodo_inspecao}}</b></td>
                    </tr>  
                </table>
            </center>
        </td>
        <td style="width: 60px"><img src="/fotos-empresa-produtor/{{$empresa->cabecalho->foto_produtor}}" alt="Imagem 2" style="width: 100px"></td>
    </tr>
</table>

@endif
         <div class="subcabecalho2" style="margin-top:35px">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">PRÉ DIAGNÓSTICO</p>
         </div>
         <ul>
           
            @foreach ($subsetor->preDiagnostico as $diagnostico)  
            <li><b>{{$diagnostico->titulo}}</b> {{$diagnostico->descricao}}</li>
            @endforeach
          
         </ul>
      </div>

@endif
 @if (count($subsetor->conclusoes) > 0)
     
 
      <div class="page">
       @if(isset($empresa->cabecalho))
      <table style="margin-left:10px; margin-right:10px; margin-top: 10px;">
    <tr style="height: 32.5px;">
        <td style="width: 60px"><img src="/fotos-empresa-cabecalho/{{$empresa->cabecalho->foto_empresa}}" alt="Imagem 1" style="width: 100px"></td>
        <td>
            <center> 
                <table style="margin-top: 1px; width: 90%">
                    <tr>
                        <td><b> Análise Ergonômica do Trabalho</b></td> 
                    </tr>
                    <tr>
                        <td><b>{{$empresa->nome}} - CNPJ:{{$empresa->cnpj}}</b></td>
                    </tr>
                    <tr>
                        <td><b>{{$empresa->periodo_inspecao}}</b></td>
                    </tr>  
                </table>
            </center>
        </td>
        <td style="width: 60px"><img src="/fotos-empresa-produtor/{{$empresa->cabecalho->foto_produtor}}" alt="Imagem 2" style="width: 100px"></td>
    </tr>
</table>

@endif
         <div class="subcabecalho2">
         
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">DIAGNÓSTICO</p>
         </div>
         {{-- Tabela com Resultados de ferramentas --}}
		 	@php
			$i = 0;
			@endphp
         <div class="container mt-5">
            <table class="table table-bordered" style="width: 93%;" >
               <thead>
                  <tr>
                     <th style="width: 31%;">Ferramentas</th>
                     <th style="width: 31%;">Resultado</th>
                     <th style="width: 31%;"> Região Corpórea</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($subsetor->moore as $moore)
                  <tr>
                     <td >MOORE E GARG
                        <br>(Análise de risco para punhos e mãos)
                        <br> Atividade: {{$moore->atividade}}.
                     </td>
                     <td id="conclusaomoore{{$moore->id}}"></td>
                     <td>Punhos, Mãos e Dedos</td>
                  </tr>
                  <script>
                     mooregarg({{$moore->fit}},{{$moore->fde}},{{$moore->ffe}},{{$moore->fpmp}},{{$moore->fri}},{{$moore->fdt}}, {{$moore->id}});
                  </script>   
				  	@php
					$i++;
					@endphp    
                  @endforeach
                  @php $totalitens = $i + count($subsetor->conclusoes ) @endphp
                  @foreach ($subsetor->conclusoes as $conclusao)
                  
                 
                  <tr>
                     <td>
                        {{$conclusao->ferramenta}}
                        <p id="textomemrbos{{$conclusao->id}}" style="font-size: 12px">
                        </p>
                          Atividade: {{$conclusao->atividade}}.
                     </td>
                     <td id="conclusao{{$conclusao->id}}" style="font-size: 12px">{{$conclusao->conclusao}}</td>
                     <td id="membros{{$conclusao->id}}" style="font-size: 12px"></td>
                  </tr>
                  <script>
                     conclusao('{{$conclusao->conclusao}}', '{{$conclusao->ferramenta}}' ,'{{$conclusao->id}}', '{{$conclusao->membro}}');
                  </script>   
				  	@php
					$i++;
					@endphp    
                  @if ($i == 5 && $totalitens > 5)
                    </tbody>
                </table>
            </div>
            </div>
                  @if(isset($empresa->rodape))
 <div class="rodape">
      <img src="/fotos-empresa-rodape/{{$empresa->rodape->foto}}" class="imgrodape">
   </div>
@endif
              <div class="paginacao">
         <script>paginacao()</script>
      </div>
            {{-- Open a new page here --}}
            <div class="page">
             @if(isset($empresa->cabecalho))
      <table style="margin-left:10px; margin-right:10px; margin-top: 10px;">
    <tr style="height: 32.5px;">
        <td style="width: 60px"><img src="/fotos-empresa-cabecalho/{{$empresa->cabecalho->foto_empresa}}" alt="Imagem 1" style="width: 100px"></td>
        <td>
            <center> 
                <table style="margin-top: 1px; width: 90%">
                    <tr>
                        <td><b> Análise Ergonômica do Trabalho</b></td> 
                    </tr>
                    <tr>
                        <td><b>{{$empresa->nome}} - CNPJ:{{$empresa->cnpj}}</b></td>
                    </tr>
                    <tr>
                        <td><b>{{$empresa->periodo_inspecao}}</b></td>
                    </tr>  
                </table>
            </center>
        </td>
        <td style="width: 60px"><img src="/fotos-empresa-produtor/{{$empresa->cabecalho->foto_produtor}}" alt="Imagem 2" style="width: 100px"></td>
    </tr>
</table>

@endif
                <div class="subcabecalho2">
                    <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">DIAGNÓSTICO</p>
                </div>
                {{-- Tabela com Resultados de ferramentas --}}
                <div class="container mt-5">
                    <table class="table table-bordered" style="width: 93%;">
                        <thead>
                            <tr>
                                <th style="width: 31%;">Ferramentas</th>
                                <th style="width: 31%;">Resultado</th>
                                <th style="width: 31%;">Região Corpórea</th>
                            </tr>
                        </thead>
                        <tbody>
                @endif

                  @endforeach
                  
                  @foreach ($subsetor->rula as $rula)
                  <tr>
                     <td>RULA
                        <br>(Avaliação de fatores de risco para distÚrbios músculo-esqueléticos dos membros superiores)
                        <br> Atividade: {{$rula->atividade}}.
                     </td>
                     <td id="conclusaorula{{$loop->index}}"></td>
                     <td>Pescoço, Ombros,Braços, Antebraços,Punhos, Mãos e Dedos</td>
                  </tr>
                  <script>
                     rula({{$rula->braco}},{{$rula->braco_desvio}},{{$rula->antebraco}},{{$rula->antebraco_desvio}}, {{$rula->punho}}, {{$rula->punho_desvio}}, {{$rula->pescoco}},{{$rula->pescoco_desvio}},{{$rula->tronco}},{{$rula->tronco_desvio}}, {{$rula->perna}}, {{$loop->index}}); 
                  </script>  
				  	@php
					$i++;
					@endphp   
                 
                  @endforeach
                  @foreach ($subsetor->owas as $owas)
                  <tr>
                     <td>OWAS
                        <br>(Detecção de posturas inadequadas)
                        <br> Atividade: {{$owas->atividade}}.
                     </td>
                     <td id="conclusaoowas{{$loop->index}}"></td>
                     <td>Pescoço, Ombros,Braços, Antebraços,Punhos, Mãos e Dedos</td>
                  </tr>
                  <script>
                     owas({{$owas->dorso}},{{$owas->braco}}, {{$owas->pernas}}, {{$owas->carga}}, {{$loop->index}});
                  </script>   
				  	@php
					$i++;
					@endphp    
                  @endforeach
                  @foreach ($subsetor->suerodgers as $sue)
                  <tr>
                     <td>Sue Rodgers
                        <br>(análise de esforço para segmentos corpóreos)
                        <br> Atividade: {{$sue->atividade}}.
                     </td>
                     <td id="conclusaosue{{$loop->index}}"></td>
                     <td>Pescoço, Ombros,Braços, Antebraços,Punhos, Mãos e Dedos</td>
                  </tr>
                  <script>
                     suerodgers(['Pescoço -{{$sue->pescoco}}', 'Ombros -{{$sue->ombro}}', 'Tronco -{{$sue->tronco}}', 'Braco -{{$sue->braco}}', 'Mãos -{{$sue->mao_punho_dedo}}', 'Pernas -{{$sue->perna_pe_dedo}}' ], {{$loop->index}} );
                  </script>    
				  	@php
					$i++;
					@endphp   
                  @endforeach

                 @if(isset($subsetor->ChecklistCadeira))
                  <tr>
                     <td>CHECK LIST DE ANÁLISE DAS CONDIÇÕES DO POSTO DE TRABALHO AO COMPUTADOR
                       
                        <br> Atividade: {{$subsetor->ChecklistCadeira->atividade}}.
                     </td>
                     <td id="">{{$subsetor->ChecklistCadeira->resultado}}</td>
                     <td>Boa Condição Ergônomica</td>
                  </tr>
                   
				  	@php
					$i++;
					@endphp   
                  @endif
               </tbody>
            </table>
         </div>
      </div>
 
      @if(isset($empresa->rodape))
 <div class="rodape">
      <img src="/fotos-empresa-rodape/{{$empresa->rodape->foto}}" class="imgrodape">
   </div>
@endif
	    <div class="paginacao">
         <script>paginacao()</script>
      </div>
      @endif
         @if(count($subsetor->recomendacao) >= 1)
    <div class="page2">
     @if(isset($empresa->cabecalho))
      <table style="margin-left:10px; margin-right:10px; margin-top: 10px;">
    <tr style="height: 32.5px;">
        <td style="width: 60px"><img src="/fotos-empresa-cabecalho/{{$empresa->cabecalho->foto_empresa}}" alt="Imagem 1" style="width: 100px"></td>
        <td>
            <center> 
                <table style="margin-top: 1px; width: 90%">
                    <tr>
                        <td><b> Análise Ergonômica do Trabalho</b></td> 
                    </tr>
                    <tr>
                        <td><b>{{$empresa->nome}} - CNPJ:{{$empresa->cnpj}}</b></td>
                    </tr>
                    <tr>
                        <td><b>{{$empresa->periodo_inspecao}}</b></td>
                    </tr>  
                </table>
            </center>
        </td>
        <td style="width: 60px"><img src="/fotos-empresa-produtor/{{$empresa->cabecalho->foto_produtor}}" alt="Imagem 2" style="width: 100px"></td>
    </tr>
</table>

@endif
         {{-- Pré diagnosticos --}}
         <div class="subcabecalho2" style="margin-top:35px">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">RECOMENDAÇÕES TÉCNICAS E SUGESTÕES DE ADEQUAÇÕES</p>
         </div>
         <ul>
           
          @foreach ($subsetor->recomendacao as $recomendacao)
            <li style="margin: 5px">{{$recomendacao->recomendacao}}</li>
            @endforeach
          
         </ul>
      </div>
    
      </div>
    @endif
      @endforeach
      
      @endforeach
    
      @endforeach

            @if(isset($empresa->rodape))
 <div class="rodape">
      <img src="/fotos-empresa-rodape/{{$empresa->rodape->foto}}" class="imgrodape">
   </div>
@endif
      <div class="paginacao" >
         <script>paginacao()</script>
      </div>
      {{-- Mapeamento Ergonomico --}}
      @php
      $mapeamentos = $empresa->mapeamento;
      $contador_first = 0;
      @endphp
      @while(count($mapeamentos) > 0)
      @php 
      $contador_first ++;
      @endphp
      <div class="page" @if ($contador_first == 1) 
          id="mapeamentoergo"
      @endif>
       @if(isset($empresa->cabecalho))
      <table style="margin-left:10px; margin-right:10px; margin-top: 10px;">
    <tr style="height: 32.5px;">
        <td style="width: 60px"><img src="/fotos-empresa-cabecalho/{{$empresa->cabecalho->foto_empresa}}" alt="Imagem 1" style="width: 100px"></td>
        <td>
            <center> 
                <table style="margin-top: 1px; width: 90%">
                    <tr>
                        <td><b> Análise Ergonômica do Trabalho</b></td> 
                    </tr>
                    <tr>
                        <td><b>{{$empresa->nome}} - CNPJ:{{$empresa->cnpj}}</b></td>
                    </tr>
                    <tr>
                        <td><b>{{$empresa->periodo_inspecao}}</b></td>
                    </tr>  
                </table>
            </center>
        </td>
        <td style="width: 60px"><img src="/fotos-empresa-produtor/{{$empresa->cabecalho->foto_produtor}}" alt="Imagem 2" style="width: 100px"></td>
    </tr>
</table>

@endif
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size: 22px; color: #fff; margin-top: 5px">MAPEAMENTO ERGONÔMICO</p>
         </div>
         <table>
            <thead>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Área</th>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Setor</th>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Posto Trabalho</th>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Função</th>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Atividade</th>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Postura</th>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Exigência da Atividade</th>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Sobrecarga</th>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Classificação</th>
            </thead>
            <tbody>
               @foreach ($mapeamentos->take(8) as $mapeamento)
               <tr class="hover:bg-gray-200">
                  <td class="border">{{$mapeamento->area}}</td>
                  <td class="border">{{$mapeamento->setor}}</td>
                  <td class="border">{{$mapeamento->posto_trabalho}}</td>
                  <td class="border">{{substr($mapeamento->funcao, 0, 60)}}...</td>
                  <td class="border">{{$mapeamento->atividade}}</td>
                  <td class="border">{{$mapeamento->postura}}</td>
                  <td class="border">{{$mapeamento->exigencia}}</td>
                  <td class="border">{{$mapeamento->sobrecarga}}</td>
                  <td class="border" id="classificacao{{$mapeamento->id}}">{{$mapeamento->classificacao}}</td>
               </tr>
               <script> classificacao('{{$mapeamento->classificacao}}', '{{$mapeamento->id}}'); </script>
               @endforeach 
            </tbody>
         </table>
         @php
         $mapeamentos = $mapeamentos->slice(8); // Remove os primeiros 8 elementos
         @endphp
      </div>
            @if(isset($empresa->rodape))
 <div class="rodape">
      <img src="/fotos-empresa-rodape/{{$empresa->rodape->foto}}" class="imgrodape">
   </div>
@endif
      <div class="paginacao">
         <script>
            var mapeamento = document.getElementById('mapeamento'); 
           var pag = paginacao();
         </script>
         @if ($contador_first == 1)
             <script>
             mapeamento.innerHTML = pag;
             </script>
         @endif
      </div>
      @endwhile
      {{-- Plano de ação --}}
      @php
      $planos = $empresa->planodeacao;
      @endphp
      @php 
      $contador_first =0;
      @endphp
      @while(count($planos) > 0)
          @php 
      $contador_first ++;
      @endphp
      <div class="page"  @if ($contador_first == 1) 
          id="planoacao"
      @endif>
       @if(isset($empresa->cabecalho))
      <table style="margin-left:10px; margin-right:10px; margin-top: 10px;">
    <tr style="height: 32.5px;">
        <td style="width: 60px"><img src="/fotos-empresa-cabecalho/{{$empresa->cabecalho->foto_empresa}}" alt="Imagem 1" style="width: 100px"></td>
        <td>
            <center> 
                <table style="margin-top: 1px; width: 90%">
                    <tr>
                        <td><b> Análise Ergonômica do Trabalho</b></td> 
                    </tr>
                    <tr>
                        <td><b>{{$empresa->nome}} - CNPJ:{{$empresa->cnpj}}</b></td>
                    </tr>
                    <tr>
                        <td><b>{{$empresa->periodo_inspecao}}</b></td>
                    </tr>  
                </table>
            </center>
        </td>
        <td style="width: 60px"><img src="/fotos-empresa-produtor/{{$empresa->cabecalho->foto_produtor}}" alt="Imagem 2" style="width: 100px"></td>
    </tr>
</table>

@endif
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size: 22px; color: #fff; margin-top: 5px">PLANO DE AÇÃO</p>
         </div>
         <table>
            <thead>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Área</th>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Setor</th>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Posto Trabalho</th>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Função</th>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Exigência da Atividade</th>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Melhoria</th>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Viabilidade</th>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Prazo</th>
               <!-- Cabeçalho da tabela -->
            </thead>
            <tbody>
               @foreach ($planos->take(5) as $plano)
               <tr class="hover:bg-gray-200">
                  <td class="border">{{$plano->area}}</td>
                  <td class="border">{{$plano->setor}}</td>
                  <td class="border">{{$plano->posto_trabalho}}</td>
                  <td class="border">{{substr($plano->funcao, 0, 60)}}...</td>
                  <td class="border">{{$plano->exigencia}}</td>
                  <td class="border">{{$plano->recomendacao}}</td>
                  <td class="border">{{$plano->viabilidade}}</td>
                  <td class="border">{{$plano->prazo}}</td>
               </tr>
               @endforeach 
            </tbody>
         </table>
         @php
         $planos = $planos->slice(5); // Remove os primeiros 8 elementos
         @endphp
      </div>
            @if(isset($empresa->rodape)) 
 <div class="rodape">
      <img src="/fotos-empresa-rodape/{{$empresa->rodape->foto}}" class="imgrodape">
   </div>
@endif
      <div class="paginacao">
         <script>
            var plano = document.getElementById('plano_de_acao'); 
            plano.innerHTML = paginacao() -1;
         </script>
      </div>
      @endwhile
            @if(isset($empresa->rodape))
 <div class="rodape">
      <img src="/fotos-empresa-rodape/{{$empresa->rodape->foto}}" class="imgrodape">
   </div>
@endif
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      {{-- Disposições Finais --}}
      <div class="page2" id="disposicoes2">
      
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">DISPOSIÇÕES FINAIS</p>
         </div>
         <ul>
            @if(isset($empresa->disposicao))
            <?= $empresa->disposicao->disposicao?>
            @endif
         </ul>
      </div>
            @if(isset($empresa->rodape))
 <div class="rodape">
      <img src="/fotos-empresa-rodape/{{$empresa->rodape->foto}}" class="imgrodape">
   </div>
@endif
      <div class="paginacao">
         <script>
            var disposicoes = document.getElementById('disposicoes'); 
            disposicoes.innerHTML = paginacao();
         </script>
      </div>
      {{-- Encerramento --}} 
      <div class="page" id="encerramento2">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">ENCERRAMENTO: {{$empresa->nome}}</p>
         </div>
         <p style="font-size: 25px;">
            Este documento é composto de <span id="paginas">55</span> páginas impressas somente no anverso,
            devidamente rubricadas. <br><br>
            A reavaliação da ANÁLISE ERGONÔMICA DO TRABALHO, deverá ser realizada
            assim que houver qualquer alteração dos postos de trabalho ou atividade.
            <br><br>
            Jundiaí, {{date('d')}} de <script>document.write(mes('{{date("m")}}'))</script> de {{date('Y')}}
         </p>
         <br>
         <center>
            <br><br>
            <h3>Responsabilidade pela elaboração</h3>
            <div class="responsaveis">
               @foreach ($empresa->responsaveis as $responsavel)
                    {{-- @if (isset($responsavel->foto) && $responsavel->nome != 'Camila Rodrigues Sarafian')
                      
                           <img src="/fotos-assinaturas/{{$responsavel->foto}}" style="width: 200px; height: 80px">
                       
               @else --}}
               <img src="https://unyflex.com.br/storage/alunos/assinatura.jpg" style="width: 200px; height: 80px"> 
               {{-- @endif --}}
               <div class="linha-assinatura">
               </div>
               <p>{{$responsavel->nome}}</p>
               <p>{{$responsavel->cargo}}</p>
               <p>{{$responsavel->identidade_trabalho}}</p>
               <br><br><br>
             
               @endforeach
               
            </div>
         </center>
      </div>
            @if(isset($empresa->rodape)) 
 <div class="rodape">
      <img src="/fotos-empresa-rodape/{{$empresa->rodape->foto}}" class="imgrodape">
   </div>
@endif
      <div class="paginacao">
         <script>
            var encerramento = document.getElementById('encerramento'); 
            encerramento.innerHTML = paginacao();
            var anexos = document.getElementById('anexos'); 
            anexos.innerHTML = parseInt(encerramento.innerHTML) + 1;
         </script>
      </div>

  
      </div>
   
   <div id="anexospage"> </div>
  


         <script>
            ver_ferramentas(parseInt(encerramento.innerHTML));
         </script>
      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   </body>
</html>  
