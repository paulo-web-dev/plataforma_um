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
               <li><span class="titulo">Ánalise Global da Empresa</span> <span class="pagina">10</span></li>
               <li><span class="titulo">Análise dos postos de trabalho</span><span class="pagina">11</span></li>
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

       <div class="paginacao">
         <script>paginacao()</script>
      </div>

      <div class="page">
 
{{-- Ánalise GLobal --}}
      <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Ánalise Global da Empresa </p>
         </div>
         <ul>
            @if(isset($empresa->analise))
            <p><?= $empresa->analise->analise ?></p>
            @endif
         </ul>
      </div>

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
            <p>Fotos - Funcionário executando atividade: {{$subsetor->nome}}</p>
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
		 	<p class="text-center" style="font-size: 22px; font-weight: bold;">Desconforto Osteomioarticular</p>
             <div class="grafico-saude">
         <div id="dadosaude{{$subsetor->id}}" style="height: 600px;" ></div>
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
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">ANEXOS: Moore & Garg</p>
         </div>
         <img src="/fotos/moore.png" style="max-width: 700px">
      </div>
      <div class="paginacao">
         <script>
            var anexos = document.getElementById('anexos'); 
            anexos.innerHTML = paginacao();
         </script>
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