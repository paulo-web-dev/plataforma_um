<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="{{url('/dist/css/relatorio.css')}}" rel="stylesheet">
      <script src="{{url('/dist/js/calculo_ferramentas_relatorio.js')}}"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <title>AET</title>
   </head>
   <body>
      {{-- Capa --}}
      <div class="homepage">
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
      </div>
      {{-- Contra capa com informações da empresa --}}
      <div class="page">
         <div class="cabecalho">
            <img src="/logo_plataforma_um.jpeg" class="img-cabecalho">
            <div class="cabecalhotext">
               <h2>
                  <p class="text-center">AET</p>
               </h2>
               <p class="text-center">Análise Ergonômica do Trabalho</p>
               <p class="text-center">2023</p>
            </div>
            <center><img src="/fotos-empresas/{{$empresa->photo}}" class="img-empresa "></center>
            <div class="subcabecalho" style="margin-top: 100px;">
               <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Identificação da Empresa</p>
            </div>
            <div class="infobox">
               <p class="text-center"><b>Endereço: {{$empresa->rua}}, {{$empresa->numero}}</b></p>
               <p class="text-center"><b>Cidade/Estado: {{$empresa->cidade}} - {{$empresa->estado}}</b></p>
               <p class="text-center"><b>CEP: {{$empresa->cep}}</b></p>
               <p class="text-center"><b>CNPJ: {{$empresa->cnpj}}</b></p>
               <p class="text-center"><b>N° de funcionários: {{$empresa->num_funcionarios}}</b></p>
               <p class="text-center">
                  <b id="atividadecapa">
                     CNAE: <script>atividadecapa({{$empresa->cnpj}})</script>
                  </b>
               </p>
               <p class="text-center"><b>Ramo de Atividade: {{$empresa->setor}}</b></p>
            </div>
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
               <li><span class="titulo">Introdução</span> <span class="pagina">3</span></li>
               <li><span class="titulo">Equipe Técnica</span> <span class="pagina">4</span></li>
               <li><span class="titulo">Objetivos</span> <span class="pagina">5</span></li>
               <li><span class="titulo">Metodologia</span> <span class="pagina">6</span></li>
               <li><span class="titulo">Análise dos postos de trabalho</span> <span class="pagina">8</span></li>
               <li><span class="titulo">Mapeamento Ergonômico</span> <span class="pagina" id="mapeamento"></span></li>
               <li><span class="titulo">Plano de Ação</span> <span class="pagina" id="plano_de_acao"></span></li>
               <li><span class="titulo">Disposições Finais</span> <span class="pagina" id="disposicoes"></span></li>
               <li><span class="titulo">Encerramento</span> <span class="pagina" id="encerramento"></span></li>
               <li><span class="titulo">Anexos</span> <span class="pagina" id="anexos"></span></li>
            </ul>
         </div>
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
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      {{-- Equipe Técnica --}}
      <div class="page">
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
      </div>
      {{-- Objetivos --}}
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Objetivos: </p>
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
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Metodologia: </p>
         </div>
         <?= $empresa->metodologia->metodologia ?>
      </div>
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      {{-- Metodologia2 --}}
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Metodologia: </p>
         </div>
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
      </div>
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      {{-- Postos/Subsetores/Cargos que foram avaliados --}}
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">ANÁLISE DOS POSTOS DE TRABALHO</p>
         </div>
         <p style="font-size: 25px;">As avaliações ocorreram nos seguintes setores da empresa:</p>
         <ul>
            @foreach ($empresa->setores as $setor)
            <li style="font-size: 25px;">{{$setor->nome}}</li>
            @endforeach
         </ul>
      </div>
      {{-- Loop Setores --}}
      @foreach ($empresa->setores as $setor)
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">{{$setor->nome}}</p>
         </div>
         <p style="font-size: 25px;">No setor {{$setor->nome}}, foram avaliado os seguintes postos de trabalho</p>
         <ul>
            @foreach ($setor->subsetores as $subsetor)
            <li style="font-size: 25px;">{{$subsetor->nome}}</li>
            @endforeach
         </ul>
      </div>
      {{-- Começo de descrição geral subsetores --}}
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">{{$setor->nome}}</p>
         </div>
         <table style="margin-left:10px; margin-right:10px">
            <tr>
               <td><b>Área:</b></td>
               <td>{{$setor->nome}}</td>
            </tr>
            <tr>
               <td><b>Setor:</b></td>
               <td>{{$setor->nome}}</td>
            </tr>
            <tr>
               <td><b>Cargos:</b></td>
               <td>
                  @foreach($setor->subsetores as $subsetor)
                  {{$subsetor->nome}},
                  @endforeach
               </td>
            </tr>
            <!-- Adicione mais linhas conforme necessário -->
         </table>
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Descrição da Tarefa</p>
         </div>
         @foreach($setor->subsetores as $subsetor)
         <p class="text-cargo" ><b>{{$subsetor->nome}}:</b>{{$subsetor->descricao}}. </p>
         @endforeach
      </div>
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      {{-- Características do Trabalho  --}}
      <div class="page">
         <div class="subcabecalho2" style="margin-top:35px">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Características do Trabalho </p>
         </div>
         <ul>
            @foreach($setor->subsetores as $subsetor)
            @foreach ($subsetor->dadosOrganizacionais as $dados)    
            <li>{{$dados->dado}}</li>
            @endforeach
            @endforeach
         </ul>
         {{-- Caracteristicas do ambiente de trabalho --}}
         <div class="subcabecalho2" style="margin-top:35px">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Características do Ambiente de Trabalho</p>
         </div>
         <ul>
            @foreach($setor->subsetores as $subsetor)
            @foreach ($subsetor->caracteristicas as $caracteristica)  
            <li>{{$caracteristica->titulo}}: {{$caracteristica->descricao}}</li>
            @endforeach
            @endforeach
         </ul>
         {{-- Pré diagnosticos --}}
         <div class="subcabecalho2" style="margin-top:35px">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Pré Diagnóstico</p>
         </div>
         <ul>
            @foreach($setor->subsetores as $subsetor)
            @foreach ($subsetor->preDiagnostico as $diagnostico)  
            <li>{{$diagnostico->titulo}}: {{$diagnostico->descricao}}</li>
            @endforeach
            @endforeach
         </ul>
      </div>
      @foreach($setor->subsetores as $subsetor)
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Fotos: {{$subsetor->nome}} </p>
         </div>
         <div class="imagem-container">
            @foreach ($subsetor->fotosatividade as $foto)
            <div class="imagem">
               <img src="/fotos-atividades/{{$foto->photo}}" alt="Imagem">
            </div>
            @endforeach
         </div>
      </div>
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Diagnostico: {{$subsetor->nome}} </p>
         </div>
         {{-- Tabela com Resultados de ferramentas --}}
         <div class="container mt-5">
            <table class="table table-bordered">
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
                  @endforeach
                  @foreach ($subsetor->conclusoes as $conclusao)
                  <tr>
                     <td>
                        {{$conclusao->ferramenta}}
                        <p id="textomemrbos{{$loop->index}}">
                        <p>
                           <br> Atividade: {{$conclusao->atividade}}.
                     </td>
                     <td id="conclusao{{$loop->index}}">{{$conclusao->conclusao}}</td>
                     <td id="membros{{$loop->index}}"></td>
                  </tr>
                  <script>
                     conclusao('{{$conclusao->conclusao}}', '{{$conclusao->ferramenta}}' ,{{$loop->index}});
                  </script>       
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
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      {{-- Dados de Saúde --}}
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Dados de Saúde: {{$subsetor->nome}} </p>
         </div>
         <p style="font-size: 21px;">Por meio de uma entrevista individualizada (com participação de 100% dos trabalhadores do setor) foi aplicado um questionário com questões abertas com a finalidade de identificar os principais desconfortos referidos pelos
            trabalhadores e que podem influenciar o seu desempenho durante o processo de trabalho.</li>
         <p>
            @php
            $sim = $subsetor->dadossaude->sim;
            $nao = $subsetor->dadossaude->nao;
            $total = $sim + $nao;
            $porcentagemSim = ($sim / $total) * 100;
            $porcentagemNao = ($nao / $total) * 100;
            $dataSaude = [
            'labels' => ['Sim', 'Não'],
            'data' => [$porcentagemSim, $porcentagemNao],
            ];
            @endphp
         <div style="margin-left: 10%; margin-top: 50px">
            <canvas id="dadosaude{{$subsetor->id}}" class="grafico"></canvas>
         </div>
         <script>
            // Gráfico Dados Saúde
            var ctx = document.getElementById('dadosaude{{$subsetor->id}}').getContext('2d');
            var data = @json($dataSaude);
            var colors = ['rgba(2, 125, 195, 0.5)', 'rgba(75, 192, 192, 0.5)'];
            
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Dados Saúde',
                        data: data.data,
                        backgroundColor: colors,
                        borderColor: colors,
                        borderWidth: 1,
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value, index, values) {
                                    return value + '%';
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false,
                        }
                    }
                }
            });
         </script>
      </div>
      </div>
      {{-- POPULAÇÃO --}}
      {{-- Pegar dados Populacionais --}}
      @php $populacaoSubsetor = $subsetor->populacaosubsetor; @endphp
      <script>
         var populacaoSubsetor = @json($populacaoSubsetor);
         var graficos = calcularEstatisticas(populacaoSubsetor, {{$subsetor->id}});
         console.log(graficos.index);
      </script>
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      {{-- Gráficos Populacionais --}}
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">Gráficos Populacionais</p>
         </div>
         <div class="grafico-container">
            <canvas id="genero{{$subsetor->id}}" class="grafico"></canvas>
         </div>
         <div class="grafico-container">
            <canvas id="faixaetaria{{$subsetor->id}}" class="grafico"></canvas>
         </div>
         <div class="grafico-container">
            <canvas id="tempoadimissao{{$subsetor->id}}" class="grafico"></canvas>
         </div>
         <div class="grafico-container">
            <canvas id="escolaridade{{$subsetor->id}}" class="grafico"></canvas>
         </div>
      </div>
      <div class="paginacao">
         <script>paginacao()</script>
      </div>
      <script>
         //Gráfico Genêro
           var ctx = document.getElementById('genero'+graficos.index).getContext('2d');
           var data =graficos.genero; 
           var colors = ['rgba(2, 125, 195, 0.5)', 'rgba(75, 192, 192, 0.5)', 'rgba(255, 205, 86, 0.5)', 'rgba(139, 69, 19, 0.5)', 'rgba(255, 165, 0, 0.5)'];
           var chart = new Chart(ctx, {
               type: 'bar', // Tipo de gráfico (por exemplo, barra)
               data: {
                   labels: data.labels, // Rótulos para o eixo X
                   datasets: [{
                       label: 'Gênero',
                       data: data.data, // Dados para o eixo Y
                       backgroundColor: colors, // Cor de fundo das barras
                       borderColor: colors, // Cor das bordas das barras
                       borderWidth: 1 // Largura das bordas das barras
                   }]
               },
               options: {
         		  scales: {
                  y: {
                      beginAtZero: true,
                      ticks: {
                          callback: function(value, index, values) {
                              return value + '%';
                          }
                      }
                  }
         		  },
                plugins: {
         			legend: {
         				display: false,
         				
         			}
         		}
               }
           });
         //Gráfico Faixa Etaria
         
         var ctx = document.getElementById('faixaetaria'+graficos.index).getContext('2d');
           var data = graficos.faixaetaria; 
         
           var chart = new Chart(ctx, {
               type: 'bar', // Tipo de gráfico (por exemplo, barra)
               data: {
                   labels: data.labels, // Rótulos para o eixo X
                   datasets: [{
                       label: 'Faixa Etária',
                       data: data.data, // Dados para o eixo Y
                       backgroundColor: colors, // Cor de fundo das barras
                       borderColor: colors, // Cor das bordas das barras
                       borderWidth: 1 // Largura das bordas das barras
                   }]
               },
               options: {
         							  scales: {
                  y: {
                      beginAtZero: true,
                      ticks: {
                          callback: function(value, index, values) {
                              return value + '%';
                          }
                      }
                  }
         		  },
                plugins: {
         			legend: {
         				display: false,
         				
         			}
         		}
               }
           }); 
         //Gráfico tempo Admissão
         
         var ctx = document.getElementById('tempoadimissao'+graficos.index).getContext('2d');
           var data = graficos.tempoadmissao; 
         
           var chart = new Chart(ctx, {
               type: 'bar', // Tipo de gráfico (por exemplo, barra)
               data: {
                   labels: data.labels, // Rótulos para o eixo X
                   datasets: [{
                       label: '',
                       data: data.data, // Dados para o eixo Y
                       backgroundColor: colors, // Cor de fundo das barras
                       borderColor: colors, // Cor das bordas das barras
                       borderWidth: 1 // Largura das bordas das barras
                   }]
               },
             options: {
         							  scales: {
                  y: {
                      beginAtZero: true,
                      ticks: {
                          callback: function(value, index, values) {
                              return value + '%';
                          }
                      }
                  }
         		  },
         		plugins: {
         			legend: {
         				display: false,
         				
         			}
         		}
         	}
           });
         
         //Gráfico Escolaridade
         var ctx = document.getElementById('escolaridade'+graficos.index).getContext('2d');
           var data =  graficos.escolaridade; 
         
           var chart = new Chart(ctx, {
               type: 'bar', // Tipo de gráfico (por exemplo, barra)
               data: {
                   labels: data.labels, // Rótulos para o eixo X
                   datasets: [{
                       label: 'Escolaridade',
                       data: data.data, // Dados para o eixo Y
                       backgroundColor: colors, // Cor de fundo das barras
                       borderColor: colors, // Cor das bordas das barras
                       borderWidth: 1 // Largura das bordas das barras
                   }]
               },
               options: {
         							  scales: {
                  y: {
                      beginAtZero: true,
                      ticks: {
                          callback: function(value, index, values) {
                              return value + '%';
                          }
                      }
                  }
         		  },
                 plugins: {
         			legend: {
         				display: false,
         				
         			}
         		}
               }
           });
      </script>
      @endforeach
      {{-- Recomendações Técnicas --}}
      <div class="page">
         <div class="subcabecalho2">
            <p class="text-center" style="font-weight: bold; font-size:22px; color:#fff;margin-top:5px">RECOMENDAÇÕES TÉCNICAS E SUGESTÕES DE ADEQUAÇÕES</p>
         </div>
         <ul>
            @foreach ($subsetor->recomendacao as $recomendacao)
            <li>{{$recomendacao->recomendacao}}</li>
            @endforeach
         </ul>
      </div>
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