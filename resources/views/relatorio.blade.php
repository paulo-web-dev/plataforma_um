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
  font-size: 16px;
  margin-bottom: 20px;
}
.titulo {
  font-weight: bold;
}
ul{
  margin-right:25px;
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
  
</style>
   </head>
   @if($alert != 0)
   <script>
      alert("Você ainda não definiu sua identidade visual prórpia, faça isso no menu!");
   </script>
   @endif
   <body>
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
      <div class="page">
         <div class="cabecalho">
            <img src="/fotos-identidade/{{$identidade->foto_empresa}}" class="img-cabecalho">
            <div class="cabecalhotext">
               <h2>
                  <p class="text-center">AET</p>
               </h2>
               <p class="text-center">Análise Ergonômica do Trabalho</p>
               <p class="text-center">2023</p>
            </div>
 

            <center><img src="/fotos-empresas/{{$empresa->photo}}" class="img-empresa "></center><br>
            <p style="font-size:26px" class="text-center"><b>{{$empresa->nome}}</b></p><br>
            <p style="font-size:30px" class="text-center"><b>{{$empresa->titulo}}</b></p>

 
         </div>
      </div>
      {{-- Súmario --}}
      {{-- Objetivos --}}
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Súmario</p>
         </div>
         <div class="sumario">
            <ul>
               <li><span class="titulo">Identificação da Empresa</span> <span class="pagina">3</span></li>
               <li><span class="titulo">Introdução</span> <span class="pagina">4</span></li>
               <li><span class="titulo">Análise Ergônomica Do Trabalho.</span> <span class="pagina">5</span></li>
               {{-- <li><span class="titulo">Equipe Técnica</span> <span class="pagina">5</span></li> --}}
               <li><span class="titulo">Objetivos Da Análise Ergônomica Do Trabalho</span> <span class="pagina">6</span></li>
               <li><span class="titulo">Metodologia Empregada</span> <span class="pagina">7</span></li>
               <li><span class="titulo">Demanda</span> <span class="pagina">9</span></li>
               @if(isset($empresa->analise))
               <li><span class="titulo">Ánalise Global da Empresa</span> <span class="pagina">10</span></li>
               <li><span class="titulo">Análise dos postos de trabalho</span><span class="pagina">11</span></li>
               @else
               <li><span class="titulo">Análise dos postos de trabalho</span><span class="pagina">10</span></li>
               @endif
               <div id="postos" style="margin-left:20px"></div>
               @if (count($empresa->mapeamento) > 1)
               <li><span class="titulo">Mapeamento Ergonômico</span> <span class="pagina" id="mapeamento"></span></li>
               @endif
                @if (count($empresa->planodeacao) > 1)
               <li><span class="titulo">Plano de Ação</span> <span class="pagina" id="plano_de_acao"></span></li>
                @endif
               <li><span class="titulo">Disposições Finais</span> <span class="pagina" id="disposicoes"></span></li>
               <li><span class="titulo">Encerramento</span> <span class="pagina" id="encerramento"></span></li>
               <li><span class="titulo">Anexos</span> <span class="pagina" id="anexos"></span></li>
            </ul>
         </div>
      </div>

          {{-- Identificação da Empresa --}}
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Identificação da Empresa</p>
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
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Introdução</p>
         </div>
         <p><?= $empresa->introducao->introducao?></p>
      </div>
      {{-- AET (Análise Ergonomica do Trabalho) --}}
       <div class="paginacao">
         <script>paginacao()</script>
      </div>
     
      <div class="page">
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
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Objetivos Da Análise Ergônomica Do Trabalho </p>
         </div>
         <ul>
            @foreach ($empresa->objetivos as $objetivo)
            <li style="font-size: 25px;">{{$objetivo->objetivo}}</li>
            @endforeach
         </ul>
      </div>
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      {{-- Metodologia --}}
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Metodologia Empregada</p>
         </div>
         <?= $empresa->metodologia->metodologia ?>
      </div>
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      {{-- Metodologia2 --}}
      <div class="page">
         
         <p style="font-size: 18px;" class="text-center">OBSERVAÇÕES IN LOCO E FOTOS - FERRAMENTAS ERGONÔMICAS</p>
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
      </div>
      <div class="paginacao">
         <script>paginacao()</script>
      </div>

      {{-- Demanda --}}
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Demanda</p>
         </div>
         <ul>
            @if(isset($empresa->demanda))
            <p><?= $empresa->demanda->demanda ?></p>
            @endif
         </ul> <br>

      </div>
 @if(isset($empresa->analise))
       <div class="paginacao">
         <script>paginacao()</script>
      </div>

      <div class="page">
 
{{-- Ánalise GLobal --}}

      <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Ánalise Global da Empresa </p>
         </div>
         <ul>
           
            <p><?= $empresa->analise->analise ?></p>
            
         </ul>
      </div>
@endif
   {{-- Ánalise Dos Postos de Trabalho --}}
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      {{-- Postos/Subsetores/Cargos que foram avaliados --}}
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">ANÁLISE DOS POSTOS DE TRABALHO</p>
         </div>
         <p style="font-size: 25px;">O documento contempla o levantamento ergonômico @if(count($empresa->area) > 1) das seguintes áreas:@else da seguinte área: @endif </p>
         <ul>
            @foreach ($empresa->area as $area)
            <li style="font-size: 25px;">{{$area->nome}}</li>
            @endforeach
         </ul>
      </div>
     
 @foreach ($empresa->area as $area)
  
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      {{-- Postos/Subsetores/Cargos que foram avaliados --}}
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Área: {{$area->nome}}</p>
         </div>
         <p style="font-size: 25px;">As avaliações ocorreram nos seguintes setores da empresa:</p>
         <ul>
           @foreach ($area->setores as $setor)
            <li style="font-size: 25px;">{{$setor->nome}}</li>
            @endforeach
         </ul>
      </div>
             
      {{-- Loop Setores --}}
    @foreach ($area->setores as $setor)
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
         <script>
            var postos = document.getElementById('postos'); 
            var pagina = document.getElementsByClassName('page').length;
            postos.innerHTML +=  '<li><span class="titulo">{{$setor->nome}}</span><span class="pagina">'+ pagina +'</span></li>';
         </script>
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Setor: {{$setor->nome}}</p>
         </div>
         <p style="font-size: 25px;">No setor {{$setor->nome}},  foi realizado o levantamento ergonômico das atividades nos seguintes postos de trabalho:</p>
         <ul>
            @foreach ($setor->subsetores as $subsetor)
            <li style="font-size: 25px;">{{$subsetor->nome}}</li>
            @endforeach
         </ul>
      </div>
      {{-- Começo de descrição geral subsetores --}}
	 @foreach ($setor->subsetores as $subsetor)
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
       <?php
    $descricao = $subsetor->descricao;
    $maxCaracteres = 3000;
    
    if (mb_strlen($descricao) > $maxCaracteres) {
        // Se a descrição for maior que 500 caracteres, dividir em partes
        $partes = str_split($descricao, $maxCaracteres);
        $pagina = 1;

        foreach ($partes as $parte) {
          echo ' <div class="page">';
            if($pagina == 1){
               ?>
                 <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Setor: {{$setor->nome}}</p>
         </div>
         <table style="margin-left:10px; margin-right:10px">
            {{-- <tr>
               <td><b>Setor:</b></td>
               <td>{{$setor->nome}}</td>
            </tr> --}}
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
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Descrição da Tarefa</p>
         </div>
               <?php 
            }
           
            echo '<p class="text-cargo">' . $parte . '.</p>';
            
            echo '</div>';
            echo '
                 <div class="paginacao">
         <script>paginacao()</script>
      </div>
            ';
            $pagina++;
        }
    } else {
    
    ?>
    
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Setor: {{$setor->nome}}</p>
         </div>
         <table style="margin-left:10px; margin-right:10px">
            {{-- <tr>
               <td><b>Setor:</b></td>
               <td>{{$setor->nome}}</td>
            </tr> --}}
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
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Descrição da Tarefa</p>
         </div>
         
         <p class="text-cargo" ><b>{{$subsetor->nome}}: </b>{{$subsetor->descricao}}. </p>
     
      </div>
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      <?php }?>
      @if(isset($subsetor->analiseAtividade))
      {{-- Ánalise da Atividade --}}

      <div class="page">
         <div class="subcabecalho2" style="margin-top:35px">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Análise da Atividade</p>
         </div>

            <p><?= $subsetor->analiseAtividade->analise ?></p>
         
      </div>
      @endif
      {{-- Fotos Atividade --}}
      @if(count($subsetor->fotosatividade) >= 1)
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Fotos</p>
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
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      {{-- Características do Trabalho  --}}
      <div class="page">
         <div class="subcabecalho2" style="margin-top:35px">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Características Da Organização Do Trabalho</p>
         </div>
         <ul>
        
            @foreach ($subsetor->dadosOrganizacionais as $dados)    
            <li>{{$dados->dado}}</li>
            @endforeach
         
         </ul>
       
      </div>
   @endif
  {{-- POPULAÇÃO --}}
      {{-- Pegar dados Populacionais --}}
 
      @php $populacaoSubsetor = $subsetor->populacaosubsetor; @endphp
      <script>
         var populacaoSubsetor = @json($populacaoSubsetor);
         var graficos{{$subsetor->id}} = calcularEstatisticas(populacaoSubsetor, {{$subsetor->id}});
         console.log(graficos{{$subsetor->id}});
      </script>
     
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      {{-- Gráficos Populacionais --}}
       @if(count($subsetor->populacaosubsetor) >= 1)
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Características Da População</p>
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
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Dados de Saúde </p>
         </div>
         <p style="font-size: 21px;">Por meio de uma entrevista individualizada (com participação de 100% dos trabalhadores do setor) foi aplicado um questionário com questões abertas com a finalidade de identificar os principais desconfortos referidos pelos
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
               <div id="dadosaude{{$subsetor->id}}" style="height: 280px; width: 160%; margin-left: -70px"></div>
            </div>
         <p class="text-center" style="font-size: 22px; font-weight: bold;">Segmento Corporal</p>
            <div class="grafico-container">
               <div id="segmento{{$subsetor->id}}" style="height: 280px; width: 160%; margin-left: -70px" ></div>
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

   @if($total > 0)
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
         @endif
          @endif
      </div>
       @endif
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
     
     {{-- Caracteristicas do ambiente de trabalho --}}
     @if(count($subsetor->caracteristicas) >= 1)
      <div class="page">

         <div class="subcabecalho2" style="margin-top:35px">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Características do Ambiente de Trabalho</p>
         </div>
         <ul>
           
            @foreach ($subsetor->caracteristicas as $caracteristica)  
            <li>{{$caracteristica->titulo}}: {{$caracteristica->descricao}}</li>
            @endforeach
     
         </ul>

      </div>
@endif
	    <div class="paginacao">
         <script>paginacao()</script>
      </div>

        @if(count($subsetor->preDiagnostico) >= 1)
    <div class="page">
   
         {{-- Pré diagnosticos --}}
         <div class="subcabecalho2" style="margin-top:35px">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Pré Diagnóstico</p>
         </div>
         <ul>
           
            @foreach ($subsetor->preDiagnostico as $diagnostico)  
            <li>{{$diagnostico->titulo}} {{$diagnostico->descricao}}</li>
            @endforeach
          
         </ul>
      </div>

@endif

      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Diagnostico</p>
         </div>
         {{-- Tabela com Resultados de ferramentas --}}
		 	@php
			$i = 0;
			@endphp
         <div class="container mt-5">
            <table class="table table-bordered" >
               <thead>
                  <tr>
                     <th>Ferramentas</th>
                     <th>Resultado</th>
                     <th>Região Corpórea</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($subsetor->moore as $moore)
                  <tr>
                     <td>MOORE E GARG
                        <br>(Análise de risco para punhos e mãos)
                        <br> Atividade: {{$moore->atividade}}.
                     </td>
                     <td id="conclusaomoore{{$loop->index}}"></td>
                     <td>Punhos, Mãos e Dedos</td>
                  </tr>
                  <script>
                     mooregarg({{$moore->fit}},{{$moore->fde}},{{$moore->ffe}},{{$moore->fpmp}},{{$moore->fri}},{{$moore->fdt}}, {{$loop->index}});
                  </script>   
				  	@php
					$i++;
					@endphp    
                  @endforeach
                  @foreach ($subsetor->conclusoes as $conclusao)
                  <tr>
                     <td>
                        {{$conclusao->ferramenta}}
                        <p id="textomemrbos{{$conclusao->id}}">
                        </p>
                          Atividade: {{$conclusao->atividade}}.
                     </td>
                     <td id="conclusao{{$conclusao->id}}">{{$conclusao->conclusao}}</td>
                     <td id="membros{{$conclusao->id}}"></td>
                  </tr>
                  <script>
                     conclusao('{{$conclusao->conclusao}}', '{{$conclusao->ferramenta}}' ,{{$conclusao->id}}, '{{$conclusao->membro}}');
                  </script>   
				  	@php
					$i++;
					@endphp    
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
               </tbody>
            </table>
         </div>
      </div>
 

	    <div class="paginacao">
         <script>paginacao()</script>
      </div>
         @if(count($subsetor->recomendacao) >= 1)
    <div class="page">
         {{-- Pré diagnosticos --}}
         <div class="subcabecalho2" style="margin-top:35px">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Recomendações Técnicas e Sugestões De Adequações</p>
         </div>
         <ul>
           
          @foreach ($subsetor->recomendacao as $recomendacao)
            <li>{{$recomendacao->recomendacao}}</li>
            @endforeach
          
         </ul>
      </div>
    
      </div>
    @endif
      @endforeach
      
      @endforeach
    
      @endforeach
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      {{-- Mapeamento Ergonomico --}}
      @php
      $mapeamentos = $empresa->mapeamento;
      @endphp
      @while(count($mapeamentos) > 0)
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size: 22px; color: #fff; margin-top: 5px">Mapeamento Ergonômico</p>
         </div>
         <table>
            <thead>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Área</th>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Setor</th>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Posto Trabalho</th>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Função</th>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Postura</th>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Atividade</th>
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
                  <td class="border">{{substr($mapeamento->funcao, 0, 50)}}...</td>
                  <td class="border">{{$mapeamento->postura}}</td>
                  <td class="border">{{$mapeamento->atividade}}...</td>
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
      <div class="paginacao">
         <script>
            var mapeamento = document.getElementById('mapeamento'); 
            mapeamento.innerHTML = paginacao() -1;
         </script>
      </div>
      @endwhile
      {{-- Plano de ação --}}
      @php
      $planos = $empresa->planodeacao;
      @endphp
      @while(count($planos) > 0)
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size: 22px; color: #fff; margin-top: 5px">Plano de Ação</p>
         </div>
         <table>
            <thead>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Área</th>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Setor</th>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Posto Trabalho</th>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Função</th>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Exigência da Atividade</th>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Recomendação de Melhora</th>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Viabilidade</th>
               <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Prazo</th>
               <!-- Cabeçalho da tabela -->
            </thead>
            <tbody>
               @foreach ($planos->take(8) as $plano)
               <tr class="hover:bg-gray-200">
                  <td class="border">{{$plano->area}}</td>
                  <td class="border">{{$plano->setor}}</td>
                  <td class="border">{{$plano->posto_trabalho}}</td>
                  <td class="border">{{substr($plano->funcao, 0, 50)}}...</td>
                  <td class="border">{{$plano->exigencia}}</td>
                  <td class="border">{{$plano->recomendacao}}</td>
                  <td class="border">{{$plano->viabilidade}}</td>
                  <td class="border">{{$plano->prazo}}</td>
               </tr>
               @endforeach 
            </tbody>
         </table>
         @php
         $planos = $planos->slice(8); // Remove os primeiros 8 elementos
         @endphp
      </div>
      <div class="paginacao">
         <script>
            var plano = document.getElementById('plano_de_acao'); 
            plano.innerHTML = paginacao() -1;
         </script>
      </div>
      @endwhile
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      {{-- Disposições Finais --}}
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">DISPOSIÇÕES FINAIS</p>
         </div>
         <ul>
            @if(isset($empresa->disposicao))
            <?= $empresa->disposicao->disposicao?>
            @endif
         </ul>
      </div>
      <div class="paginacao">
         <script>
            var disposicoes = document.getElementById('disposicoes'); 
            disposicoes.innerHTML = paginacao();
         </script>
      </div>
      {{-- Encerramento --}}
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Encerramento: {{$empresa->nome}}</p>
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
      <div class="paginacao">
         <script>
            var encerramento = document.getElementById('encerramento'); 
            encerramento.innerHTML = paginacao();
         </script>
      </div>
      
   @if(isset($empresa->ChecklistCadeira))
        <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">ANEXOS: Checklist</p>
         </div>
<center>
          <h2>Avaliação da Cadeira</h2>
            <table class="table table-striped" style="width: 80%; margin-top: 20px">
   
  <tbody>
    <tr>
   @php 
   function converte_zero_um($valor) {
    if ($valor == 0) {
        return "Não(0)";
    } else {
        return "Sim(1)";
    }
}

   @endphp
      
    </tr>
    <tr>  
    
    <td>1 – Cadeira estofada?</td>
   
    <td>{{converte_zero_um($empresa->ChecklistCadeira->cadeira_estofada)}}</td>
</tr>
<tr>  
    <td>2 – Estofado de espessura e maciez adequada?</td>
    
    <td>{{converte_zero_um($empresa->ChecklistCadeira->estofado_espessura_maciez)}}</td>
</tr>
<tr>  
    <td>3 – Tecido da cadeira permite boa transpiração?</td>
   
    <td>{{converte_zero_um($empresa->ChecklistCadeira->tecido_transpiracao)}}</td>
</tr>
<tr>  
    <td>4 – Altura regulável?</td>
    
    <td>{{converte_zero_um($empresa->ChecklistCadeira->altura_regulavel)}}</td>
</tr>
<tr>  
    <td>5 – Acionamento fácil da regulagem da altura?</td>
    
    <td>{{converte_zero_um($empresa->ChecklistCadeira->acionamento_regulagem_altura)}}</td>
</tr>
<tr>  
    <td>6 – A altura máxima da cadeira é compatível com pessoas mais altas ou com pessoas baixas?</td>
    
    <td>{{converte_zero_um($empresa->ChecklistCadeira->altura_compativel)}}</td>
</tr>
<tr>  
    <td>7 – Largura da cadeira de dimensão correta?</td>
    
    <td>{{converte_zero_um($empresa->ChecklistCadeira->largura_dimensao_correta)}}</td>
</tr>
<tr>  
    <td>8 – Assento na horizontal, não jogando o corpo do funcionário para trás?</td>
    
    <td>{{converte_zero_um($empresa->ChecklistCadeira->assento_horizontal)}}</td>
</tr>
<tr>  
    <td>9 – Assento de forma plana? </td>
    
    <td>{{converte_zero_um($empresa->ChecklistCadeira->assento_plano)}}</td>
</tr>
<tr>  
    <td>10 – Borda anterior do assento arredondada?</td>
    
    <td>{{converte_zero_um($empresa->ChecklistCadeira->borda_anterior_arredondada)}}</td>
</tr>
<tr>  
    <td>11 – Apoio dorsal com regulagem da inclinação (seja através de regulagem própria, seja através de “mecanismo de amortecimento”)?</td>
   
    <td>{{converte_zero_um($empresa->ChecklistCadeira->apoio_dorsal_regulagem)}}</td>
</tr>
<tr>  
    <td>11 – Apoio dorsal com regulagem da inclinação (seja através de regulagem própria, seja através de “mecanismo de amortecimento”)?</td>
    
    <td>{{converte_zero_um($empresa->ChecklistCadeira->apoio_dorsal_suporte_firme)}}</td>
</tr>
<tr>  
    <td>12 – Apoio dorsal fornece um suporte firme?</td>
    
    <td>{{converte_zero_um($empresa->ChecklistCadeira->apoio_dorsal_suporte_firme)}}</td>
</tr>
<tr>  
    <td>13 – Forma do apoio acompanhando as curvaturas normais da coluna?</td>
    
    <td>{{converte_zero_um($empresa->ChecklistCadeira->apoio_dorsal_curvaturas_coluna)}}</td>
</tr>
<tr>  
    <td>14 – Regulagem da altura do apoio dorsal: existe e é fácil? </td>
    
    <td>{{converte_zero_um($empresa->ChecklistCadeira->altura_apoio_dorsal)}}</td>
</tr>
<tr>  
    <td>15 – Espaço para acomodação das nádegas?</td>
    
    <td>{{converte_zero_um($empresa->ChecklistCadeira->espaco_nadegas)}}</td>
</tr>
<tr>  
    <td>16 – Giratória?</td>
    
    <td>{{converte_zero_um($empresa->ChecklistCadeira->giratoria)}}</td>
</tr>
<tr>  
    <td>17 – Rodízios não muito duros nem muito leves?</td>
    
    <td>{{converte_zero_um($empresa->ChecklistCadeira->rodizios_duros_leves)}}</td>
</tr>
<tr>  
    <td>18 – Os braços da cadeira são de altura regulável e a regulagem é fácil?</td>
   
    <td>{{converte_zero_um($empresa->ChecklistCadeira->bracos_regulaveis)}}</td>
</tr>
<tr>  
    <td>19 – Os braços da cadeira prejudicam a aproximação do trabalhador até seu posto de trabalho?</td>
    
    <td>{{converte_zero_um($empresa->ChecklistCadeira->bracos_aproximacao_trabalhador)}}</td>
</tr>
<tr>  
    <td>20 – A cadeira tem algum outro mecanismo de conforto e que seja facilmente utilizável? *</td>
  
    <td>{{converte_zero_um($empresa->ChecklistCadeira->mecanismo_conforto)}}</td>
</tr>
<tr>  
    <td>21 – Por amostragem, percebe-se que os mecanismos de regulagem de altura, de inclinação e da altura do apoio dorsal estão funcionando bem?</td>
    
    <td>{{converte_zero_um($empresa->ChecklistCadeira->mecanismos_funcionando_bem)}}</td>
</tr>



   

   
  </tbody>
</table>

</center>
      </div>
      <div class="paginacao">
         <script>
            var anexos = document.getElementById('anexos'); 
            anexos.innerHTML = paginacao();
         </script>
      </div>

        <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">ANEXOS: Checklist</p>
         </div>
<center>
          <h2>Avaliação da Mesa de Trabalho</h2>
            <table class="table table-striped" style="width: 80%; margin-top: 20px">
   
  <tbody>

    <tr>  
      <td>1 - É o tipo de móvel mais adequado para a função que é exercida?</td>
      <td>{{converte_zero_um($empresa->ChecklistMesa->tipo_movel_adequado)}}</td>
    </tr>
    <tr>  
      <td>2 - Altura apropriada? </td>
      <td>{{converte_zero_um($empresa->ChecklistMesa->altura_apropriada)}}</td>
    </tr>
    <tr>  
      <td>3 - Permite regulagem de altura para pessoas muito altas ou muito baixas?</td>
      <td>{{converte_zero_um($empresa->ChecklistMesa->regulagem_altura)}}</td>
    </tr>
    <tr>  
      <td>4 - Borda anterior arredondada? </td>
      <td>{{converte_zero_um($empresa->ChecklistMesa->borda_anterior_arredondada)}}</td>
    </tr>
    <tr>  
      <td>5 - Dimensões apropriadas considerando os diversos tipos de trabalho
realizados pelo trabalhador? (possibilita abrir espaço suficiente para escrita,
leitura, consulta a documentos segundo a necessidade?)</td>
      <td>{{converte_zero_um($empresa->ChecklistMesa->dimensoes_apropriadas)}}</td>
    </tr>
    <tr>  
      <td>6 - Material não reflexivo? Cor adequada, para não refletir?</td>
      <td>{{converte_zero_um($empresa->ChecklistMesa->material_nao_reflexivo)}}</td>
    </tr>
    <tr>  
      <td>7 - Espaço para as pernas suficientemente alto? </td>
      <td>{{converte_zero_um($empresa->ChecklistMesa->espaco_pernas_alto)}}</td>
    </tr>
    <tr>  
      <td>8 - Espaço para as pernas suficientemente profundo?</td>
      <td>{{converte_zero_um($empresa->ChecklistMesa->espaco_pernas_profundo)}}</td>
    </tr>
    <tr>  
      <td>9 - Espaço para as pernas suficientemente largo? </td>
      <td>{{converte_zero_um($empresa->ChecklistMesa->espaco_pernas_largo)}}</td>
    </tr>
    
    <tr>  
      <td>10 - Facilidade para a pessoa entrar e sair no posto de trabalho? (não
considerar se houver suporte do teclado – ver avaliação específica, adiante)</td>
      <td>{{converte_zero_um($empresa->ChecklistMesa->facilidade_entrada_saida)}}</td>
    </tr>
    <tr>  
      <td>11 - Permite ajuste da altura da tela do monitor de vídeo? Ou há acessório
próprio para esta função? Ou, no caso de LCD, obtém-se bom ajuste de altura
com os recursos do próprio equipamento?
</td>
      <td>{{converte_zero_um($empresa->ChecklistMesa->ajuste_altura_tela_monitor)}}</td>
    </tr>
    <tr>  
      <td>12 - Este ajuste pode ser feito facilmente?</td>
      <td>{{converte_zero_um($empresa->ChecklistMesa->facilidade_ajuste_altura)}}</td>
    </tr>
    <tr>  
      <td>13 - O monitor pode ser posicionado mais para frente ou mais para trás?</td>
      <td>{{converte_zero_um($empresa->ChecklistMesa->ajuste_monitor_frente_tras)}}</td>
    </tr>
   <tr>  
      <td>14 - Este ajuste pode ser feito facilmente?</td>
      <td>{{converte_zero_um($empresa->ChecklistMesa->facilidade_ajuste_frente_tras)}}</td>
    </tr>
    <tr>  
      <td>15 – A mesa tem algum espaço para que o trabalhador guarde algum objeto
pessoal (bolsa, pasta ou outro?)</td>
      <td>{{converte_zero_um($empresa->ChecklistMesa->espaco_objeto_pessoal)}}</td>
    </tr>
    <tr>  
      <td>16 – Os fios ficam organizados adequadamente, não interferindo na área de
trabalho?</td>
      <td>{{converte_zero_um($empresa->ChecklistMesa->organizacao_fios)}}</td>
    </tr>
    <tr>  
      <td>17- A mesa de trabalho tem algum outro mecanismo de conforto e que seja
facilmente utilizável? </td>
      <td>{{converte_zero_um($empresa->ChecklistMesa->outro_mecanismo_conforto)}}</td>
    </tr>

   
  </tbody>
</table>

</center>
      </div>
      <div class="paginacao">
         <script>
            paginacao();
         </script>
      </div>


        <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">ANEXOS: Checklist</p>
         </div>
<center>
          <h2>Avaliação do Suporte do Teclado</h2>
            <table class="table table-striped" style="width: 80%; margin-top: 20px">
   
  <tbody>

    <tr>  
      <td>1 – A altura do suporte do teclado é regulável?</td>
      <td>{{converte_zero_um($empresa->ChecklistSuporteTeclado->tipo_movel_adequado)}}</td>
    </tr>

    <tr>  
      <td>2 – A regulagem é feita facilmente?</td>
      <td>{{converte_zero_um($empresa->ChecklistSuporteTeclado->tipo_movel_adequado)}}</td>
    </tr>

    <tr>  
      <td>3 – Suas dimensões são apropriadas, inclusive cabendo o mouse?</td>
      <td>{{converte_zero_um($empresa->ChecklistSuporteTeclado->tipo_movel_adequado)}}</td>
    </tr>


    <tr>  
      <td>4 – Sua largura permite mover o teclado mais para perto ou mais para longe do
operador?
</td>
      <td>{{converte_zero_um($empresa->ChecklistSuporteTeclado->tipo_movel_adequado)}}</td>
    </tr>

    <tr>  
      <td>5 – O suporte é capaz de amortecer vibrações ou sons criados ao se digitar ou
datilografar?</td>
      <td>{{converte_zero_um($empresa->ChecklistSuporteTeclado->tipo_movel_adequado)}}</td>
    </tr>

    <tr>  
      <td>6 – O espaço para as pernas é suficientemente alto?</td>
      <td>{{converte_zero_um($empresa->ChecklistSuporteTeclado->tipo_movel_adequado)}}</td>
    </tr>
    <tr>  
      <td>7 – O espaço para as pernas é suficiente em profundidade?</td>
      <td>{{converte_zero_um($empresa->ChecklistSuporteTeclado->tipo_movel_adequado)}}</td>
    </tr>
    <tr>  
      <td>8 – O espaço para as pernas é suficientemente largo? </td>
      <td>{{converte_zero_um($empresa->ChecklistSuporteTeclado->tipo_movel_adequado)}}</td>
    </tr>
    <tr>  
      <td>9– Facilidade para a pessoa entrar e sair no posto de trabalho?</td>
      <td>{{converte_zero_um($empresa->ChecklistSuporteTeclado->tipo_movel_adequado)}}</td>
    </tr>
    <tr>  
      <td>10 – Há apoio arredondado para o carpo, ou a borda anterior da mesa é
arredondada? Ou o próprio teclado tem uma aba complementar que funciona
como apoio?</td>
      <td>{{converte_zero_um($empresa->ChecklistSuporteTeclado->tipo_movel_adequado)}}</td>
    </tr>

   <tr>  
      <td>11 – O suporte de teclado ou seu mecanismo de regulagem tem alguma quina
viva ou ponta capaz de ocasionar acidente ou ferimento nos joelhos, coxas ou
pernas do usuário?</td>
      <td>{{converte_zero_um($empresa->ChecklistSuporteTeclado->tipo_movel_adequado)}}</td>
    </tr>
   
  </tbody>
</table>

     <h2>Avaliação do Apoio para os pés</h2>
            <table class="table table-striped" style="width: 80%; margin-top: 20px">
   
  <tbody>

    <tr>  
      <td>1 – Largura suficiente?</td>
      <td>{{converte_zero_um($empresa->ChecklistApoioPes->largura_suficiente)}}</td>
    </tr>

   <tr>  
      <td>2 – Altura regulável? Ou disponível mais de um modelo, com alturas
diferentes?</td>
      <td>{{converte_zero_um($empresa->ChecklistApoioPes->altura_regulavel)}}</td>
    </tr>

   <tr>  
      <td>3 – Inclinação ajustável? </td>
      <td>{{converte_zero_um($empresa->ChecklistApoioPes->inclinação_ajustavel)}}</td>
    </tr>

   <tr>  
      <td>4 – Pode ser movido para frente ou para trás no piso?</td>
      <td>{{converte_zero_um($empresa->ChecklistApoioPes->movimento_frente_tras)}}</td>
    </tr>

   <tr>  
      <td>5 – Desliza facilmente no piso? </td>
      <td>{{converte_zero_um($empresa->ChecklistApoioPes->desliza_facilmente)}}</td>
    </tr>

   
  </tbody>
</table>
</center>
      </div>
      <div class="paginacao">
         <script>
            paginacao();
         </script>
      </div>


     <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">ANEXOS: Checklist</p>
         </div>
<center>
          <h2>Avaliação do Porta-documentos
</h2>
            <table class="table table-striped" style="width: 80%; margin-top: 20px">
   
  <tbody>

    <tr>  
      <td>1 – Sua altura, distância e ângulo podem ser ajustados?</td>
      <td>{{converte_zero_um($empresa->ChecklistDocumentos->ajuste_altura_distancia_angulo)}}</td>
    </tr>
    <tr>  
      <td>2 – O ajuste é feito com facilidade?</td>
      <td>{{converte_zero_um($empresa->ChecklistDocumentos->facilidade_ajuste)}}</td>
    </tr>
   <tr>  
      <td>3- Permite boa retenção ou fixação do documento?</td>
      <td>{{converte_zero_um($empresa->ChecklistDocumentos->retencao_fixacao_documento)}}</td>
    </tr>

   <tr>  
      <td>4 – Ele previne vibrações</td>
      <td>{{converte_zero_um($empresa->ChecklistDocumentos->prevencao_vibracoes)}}</td>
    </tr>

   <tr>  
      <td>5 – Ele possui o espaço suficiente para o tipo de documento de que
normalmente o trabalhador faz uso?</td>
      <td>{{converte_zero_um($empresa->ChecklistDocumentos->espaco_suficiente_documento)}}</td>
    </tr>

   <tr>  
      <td>6 – Ele permite que o usuário o coloque na posição mais próxima possível do
ângulo de visão da tela e que possa ser usado nessa posição?
</td>
      <td>{{converte_zero_um($empresa->ChecklistDocumentos->posicao_proxima_angulo_visao)}}</td>
    </tr>
   
   
  </tbody>
</table>

     <h2>Avaliação do Teclado</h2>
            <table class="table table-striped" style="width: 80%; margin-top: 20px">
   
  <tbody>

    <tr>  
      <td>1 – É fino? </td>
      <td>{{converte_zero_um($empresa->ChecklistTeclado->fino)}}</td>
    </tr>

   <tr>  
      <td>2 – É macio?</td>
      <td>{{converte_zero_um($empresa->ChecklistTeclado->macio)}}</td>
    </tr>

   <tr>  
      <td>3 – As teclas têm dimensões corretas?</td>
      <td>{{converte_zero_um($empresa->ChecklistTeclado->teclas_dimensoes_corretas)}}</td>
    </tr>

   <tr>  
      <td>4 – É configurado segundo padronização da ABNT?</td>
      <td>{{converte_zero_um($empresa->ChecklistTeclado->configuracao_ABNT)}}</td>
    </tr>

   <tr>  
      <td>5- Apresenta algum tipo de formato não tradicional e que complica mais do que facilita? </td>
      <td>{{converte_zero_um($empresa->ChecklistTeclado->formato_nao_tradicional)}}</td>
    </tr>

   
  </tbody>
</table>
</center>
      </div>
      <div class="paginacao">
         <script>
            paginacao();
         </script>
      </div>


   
     <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">ANEXOS: Checklist</p>
         </div>
<center>
          <h2>Avaliação do Monitor de Vídeo
</h2>
            <table class="table table-striped" style="width: 80%; margin-top: 20px">
   
  <tbody>

    <tr>  
      <td>1 – O monitor de vídeo está localizado na frente do trabalhador? </td>
      <td>{{converte_zero_um($empresa->ChecklistMonitor->monitor_frente_trabalhador)}}</td>
    </tr>

   <tr>  
      <td>2 – Sua altura está adequada? </td>
      <td>{{converte_zero_um($empresa->ChecklistMonitor->altura_adequada)}}</td>
   </tr>


   <tr>  
      <td>3 – Há mecanismo de regulagem de altura disponível e este ajuste pode ser
feito facilmente?
</td>
      <td>{{converte_zero_um($empresa->ChecklistMonitor->regulagem_altura_facil)}}</td>
   </tr>

   <tr>  
      <td>4 – Pode ser inclinado e este ajuste pode ser feito facilmente?</td>
      <td>{{converte_zero_um($empresa->ChecklistMonitor->inclinação_facil)}}</td>
   </tr>


   <tr>  
      <td>5 – Tem controle de brilho e de contraste dos caracteres?</td>
      <td>{{converte_zero_um($empresa->ChecklistMonitor->controle_brilho_contraste)}}</td>
   </tr>


   <tr>  
      <td>6 – Há tremores na tela? </td>
      <td>{{converte_zero_um($empresa->ChecklistMonitor->tremores_tela)}}</td>
   </tr>


   <tr>  
      <td>7 – A imagem permanece claramente definida à luminância máxima?</td>
      <td>{{converte_zero_um($empresa->ChecklistMonitor->imagem_claramente_definida)}}</td>
   </tr>

   <tr>  
      <td>8 - Nos monitores com tubo de imagem (CRT) a freqüência de renovação de
imagem (screen refresh rate) pode ser ajustada?</td>
      <td>{{converte_zero_um($empresa->ChecklistMonitor->freq_renovacao_imagem_ajustavel)}}</td>
    </tr>

   <tr>  
      <td>9 – O monitor de vídeo é fosco? </td>
      <td>{{converte_zero_um($empresa->ChecklistMonitor->monitor_fosco)}}</td>
    </tr>

   <tr>  
      <td>10 - O monitor de vídeo é plano?</td>
      <td>{{converte_zero_um($empresa->ChecklistMonitor->monitor_plano)}}</td>
    </tr>


   
   
  </tbody>
</table>

     <h2>Avaliação do Notebook e Acessórios para o seu uso</h2>
            <table class="table table-striped" style="width: 80%; margin-top: 20px">
   
  <tbody>

    <tr>  
      <td>1 – Estão disponíveis um suporte para elevar a tela do equipamento até a
altura dos olhos, um teclado externo e um mouse externo? </td>
      <td>{{converte_zero_um($empresa->ChecklistNotebook->suporte_tela_teclado_mouse)}}</td>
    </tr>
   <tr>  
      <td> 2 – O mesmo é leve (menos que 2,5 kg)?</td>
      <td>{{converte_zero_um($empresa->ChecklistNotebook->leve)}}</td>
    </tr>

    
    <tr>  
      <td>3 – O teclado mais frequentemente utilizado (do notebook ou o auxiliar) possui
teclas em separado para a função de Pgup, Pgdn, Home e End? </td>
      <td>{{converte_zero_um($empresa->ChecklistNotebook->teclas_separadas)}}</td>
    </tr>
   <tr>  
      <td>4 – O teclado do notebook possui a mesma configuração do teclado do
desktop? </td>
      <td>{{converte_zero_um($empresa->ChecklistNotebook->teclado_notebook_configuracao)}}</td>
    </tr>


    
    <tr>  
      <td>5 – As teclas têm dimensões de 14 polegadas ou mais? </td>
      <td>{{converte_zero_um($empresa->ChecklistNotebook->teclas_dimensoes)}}</td>
    </tr>
   <tr>  
      <td>6 – A tela tem dimensão de 14 polegadas ou mais? </td>
      <td>{{converte_zero_um($empresa->ChecklistNotebook->tela_dimensoes)}}</td>
    </tr>

    
    <tr>  
      <td>7 – Tem dispositivos para inserção de vários tipos de mídia disponíveis?  </td>
      <td>{{converte_zero_um($empresa->ChecklistNotebook->dispositivos_midia)}}</td>
    </tr>
   
  </tbody>
</table>
</center>
      </div>
      <div class="paginacao">
         <script>
            paginacao();
         </script>
      </div>


         
     <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">ANEXOS: Checklist</p>
         </div>
<center>
 <h2>Avaliação da Interação e do Leiaute</h2>
            <table class="table table-striped" style="width: 80%; margin-top: 20px">
   
  <tbody>

    <tr>  
      <td>1 – Está o trabalhador na posição correta em relação ao tipo de função e ao
leiaute da sala?
</td>
      <td>{{converte_zero_um($empresa->ChecklistLeiaute->posicao_correta)}}</td>
    </tr>
    
   <tr>  
      <td>2 – Há uma área mínima de 6 metros quadrados por pessoa? </td>
      <td>{{converte_zero_um($empresa->ChecklistLeiaute->area_minima)}}</td>
    </tr>

    <tr>  
      <td>3 – Distância entre a parte de trás de um terminal e o operador mais próximo é
maior que 1,0 metro?
</td>
      <td>{{converte_zero_um($empresa->ChecklistLeiaute->distancia_terminal_operador)}}</td>
    </tr>

    <tr>  
      <td>4 – Quando necessário ligar algum equipamento elétrico, as tomadas estão em
altura maior que 75 cm?</td>
      <td>{{converte_zero_um($empresa->ChecklistLeiaute->tomadas_altura)}}</td>
    </tr>

    <tr>  
      <td>5 – Quando necessário usar disquete, CD ou pendrive, o acesso aos
respectivos dispositivos no corpo do computador é fácil?
</td>
      <td>{{converte_zero_um($empresa->ChecklistLeiaute->acesso_dispositivos)}}</td>
    </tr>

    <tr>  
      <td>6 – Há algum fator que leve à necessidade de se trabalhar em contração
estática do tronco?</td>
      <td>{{converte_zero_um($empresa->ChecklistLeiaute->fator_contracao_estatica)}}</td>
    </tr>

    <tr>  
      <td>7 – No caso de necessidade de consultar o terminal enquanto atende ao
telefone, um equipamento tipo head set está sempre disponível? Em número
suficiente?</td>
      <td>{{converte_zero_um($empresa->ChecklistLeiaute->headset_disponivel)}}</td>
    </tr>
    <tr>  
      <td>8 – Há interferências que prejudicam o posicionamento do corpo – por
exemplo, estabilizadores, caixas de lixo, caixas e outros materiais debaixo da
mesa? CPUs?</td>
      <td>{{converte_zero_um($empresa->ChecklistLeiaute->interferencias_posicionamento)}}</td>
    </tr>

    <tr>  
      <td>9 – O sistema de trabalho permite que o usuário alterne sua postura de modo a
ficar de pé ocasionalmente?
</td>
      <td>{{converte_zero_um($empresa->ChecklistLeiaute->alterna_postura_de_pe)}}</td>
    </tr>

    <tr>  
      <td>10 – O clima é adequado (temperatura efetiva entre 20ºC e 23ºC)?</td>
      <td>{{converte_zero_um($empresa->ChecklistLeiaute->clima_adequado)}}</td>
    </tr>

    <tr>  
      <td>11 – O nível sonoro é apropriado (menor que 65 dB(A))?</td>
      <td>{{converte_zero_um($empresa->ChecklistLeiaute->nivel_sonoro_apropriado)}}</td>
    </tr>
   
  </tbody>
</table>
          <h2>Avaliação do Sistema de Trabalho
</h2>
            <table class="table table-striped" style="width: 80%; margin-top: 20px">
   
  <tbody>

    <tr>  
      <td>1 – Caso o trabalho envolva uso somente de computador, existe pausa bem
estabelecida de 10 minutos a cada 50 minutos trabalhados? </td>
      <td>{{converte_zero_um($empresa->ChecklistSistema->pausa_10_minutos_cada_50_minutos)}}</td>
    </tr>

      <tr>  
      <td>2 – No caso de digitação, o número médio de toques é menor que 8.000 por
hora? Ou no caso de ser maior que 8.000 por hora, há pausas de
compensação bem definidas? </td>
      <td>{{converte_zero_um($empresa->ChecklistSistema->pausa_digitacao_8000_toques_por_hora)}}</td>
    </tr>

   <tr>  
      <td>3 - Há pausa de 10 minutos a cada duas horas trabalhadas? Ou verifica-se a
possibilidade real de as pessoas terem um tempo de descanso de
aproximadamente 10 minutos a cada duas horas trabalhadas? </td>
      <td>{{converte_zero_um($empresa->ChecklistSistema->pausa_10_minutos_cada_2_horas)}}</td>
    </tr>

  
  </tbody>
</table>

    
</center>
      </div>
      <div class="paginacao">
         <script>
            paginacao();
         </script>
      </div>


      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">ANEXOS: Checklist</p>
         </div>
<center>
 <h2>Avaliação da Iluminação do Ambiente</h2>
            <table class="table table-striped" style="width: 80%; margin-top: 20px">
   
  <tbody>

    <tr>  
      <td>1 – Iluminação entre 450 – 550 lux?</td>
      <td>{{converte_zero_um($empresa->ChecklistIluminacao->iluminacao_lux)}}</td>
    </tr>
   <tr>  
      <td>2 – Para pessoas com mais de 45 anos está disponível iluminação suplementar?
</td>
      <td>{{converte_zero_um($empresa->ChecklistIluminacao->iluminacao_suplementar_mais_45_anos)}}</td>
    </tr>

   
   <tr>  
      <td>3 – A visão do trabalhador está livre de reflexos? (ver tela, teclados, mesa,
papéis, etc...)?
</td>
      <td>{{converte_zero_um($empresa->ChecklistIluminacao->visao_livre_reflexos)}}</td>
    </tr>

   <tr>  
      <td>4 – Estão todas as fontes de deslumbramento fora do campo de visão do
operador?
</td>
      <td>{{converte_zero_um($empresa->ChecklistIluminacao->fontes_deslumbramento_fora_visao)}}</td>
    </tr>

   <tr>  
      <td>5 – Estão os postos de trabalho posicionados de lado para as janelas?</td>
      <td>{{converte_zero_um($empresa->ChecklistIluminacao->postos_trabalho_posicionados_lado_janelas)}}</td>
    </tr>

   <tr>  
      <td>6 – Caso contrário, as janelas têm persianas e cortinas? </td>
      <td>{{converte_zero_um($empresa->ChecklistIluminacao->janelas_persianas_cortinas)}}</td>
    </tr>

    <tr>  
      <td>7– O brilho do piso é baixo? </td>
      <td>{{converte_zero_um($empresa->ChecklistIluminacao->brilho_piso_baixo)}}</td>
    </tr>

    <tr>  
      <td>8– A legibilidade do documento é satisfatória? </td>
      <td>{{converte_zero_um($empresa->ChecklistIluminacao->legibilidade_documento_satisfatoria)}}</td>
    </tr>


   
  </tbody>
</table>
  
</center>
      </div>
      <div class="paginacao">
         <script>
            paginacao();
         </script>
      </div>
      @endif
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">ANEXOS: Moore & Garg</p>
         </div>
         <img src="/fotos/moore.png" style="max-width: 700px">
      </div>
         <div class="paginacao">
         <script> paginacao();</script>
      </div>
      <div class="paginacao">
      
      </div>
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">ANEXOS: Niosh</p>
         </div>
         <center>
            <img src="/fotos/niosh.png" style="max-width: 700px">
            <img src="/fotos/niosh.jpg" style="max-width: 700px; margin-top: 150px">
         </center>
      </div>
      <div class="paginacao">
         <script> paginacao();</script>
      </div>
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">ANEXOS: Sue Rodgers</p>
         </div>
         <center>
            <img src="/fotos/sue.webp" style="max-width: 700px">
         </center>
      </div>
      <div class="paginacao">
         <script> paginacao();</script>
      </div>
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">ANEXOS: OWAS</p>
         </div>
         <center>
            <img src="/fotos/owas.jpeg" style="max-width: 700px; margin-top: 150px">
         </center>
      </div>
      <div class="paginacao">
         <script> paginacao();</script>
      </div>
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">ANEXOS: Rula</p>
         </div>
         <center>
            <img src="/fotos/rulaa.png" style="max-width: 700px; margin-top: -150px">
         </center>
      </div>
      <div class="paginacao">
         <script>
            var paginas = document.getElementById('paginas'); 
            paginas.innerHTML = paginacao();
            window.onload = function () {
            //window.print();
            }
         </script>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   </body>
</html>