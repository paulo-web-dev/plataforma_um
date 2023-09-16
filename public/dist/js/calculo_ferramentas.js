function mooregarg(fit, fde, ffe, fpmp, fri, fdt, index){
            var resultado = fit * fde * ffe * fpmp * fri * fdt;
            var conclusao = document.getElementById('conclusaomoore'+index);
            conclusao.style.color = "white"; 
            if(resultado > 3 && resultado < 7){
            conclusao.innerHTML = resultado + 'Duvidoso';
            conclusao.style.color = "black"; 
            conclusao.style.backgroundColor = "yellow";
            }else if(resultado > 7 ){
            conclusao.innerHTML = resultado + ' Risco';
            conclusao.style.backgroundColor = "red"; 
            }else if(resultado <= 3){
                 conclusao.innerHTML = resultado + ' Baixo Risco';
                 conclusao.style.backgroundColor = "green";
            }
            

           
        }

        function rula(braco, braco_desvio, antebraco, antebraco_desvio, punho, punho_desvio, pescoco, pescoco_desvio, tronco, tronco_desvio, perna, index){
            
            var braco = braco + braco_desvio;
            var conclusaorula = document.getElementById('conclusaorula'+index);
            conclusaorula.style.color = "white"; 
            var antebraco = antebraco + antebraco_desvio;
            var punho = punho + punho_desvio;
            var pescoco = pescoco + pescoco_desvio;
            var tronco = tronco + tronco_desvio;
            var linhaA = ((braco - 1) * 3 + antebraco) - 1;
            var colunaA = (punho * 2) - 1;
            var colunaB = (((tronco - 1) * 2) + punho) - 1;
            var linhaB = pescoco - 1;
            var tabelaA = [
                [1, 2, 2, 2, 2, 3, 3, 3],
                [2, 2, 2, 2, 3, 3, 3, 3],
                [2, 3, 3, 3, 3, 3, 4, 4],
                [2, 3, 3, 3, 3, 4, 4, 4],
                [3, 3, 3, 3, 3, 4, 4, 4],
                [3, 4, 4, 4, 4, 4, 5, 5],
                [3, 3, 4, 4, 4, 4, 5, 5],
                [3, 4, 4, 4, 4, 4, 5, 5],
                [4, 4, 4, 4, 4, 5, 5, 5],
                [4, 4, 4, 4, 4, 5, 5, 5],
                [4, 4, 4, 4, 4, 5, 5, 5],
                [4, 4, 4, 5, 5, 5, 6, 6],
                [5, 5, 5, 5, 5, 6, 6, 7],
                [5, 6, 6, 6, 6, 6, 7, 7],
                [6, 6, 6, 7, 7, 7, 7, 8],
                [7, 7, 7, 7, 7, 8, 8, 9],
                [8, 8, 8, 8, 8, 9, 9, 9],

            ];

            var tabelaB = [
                [1, 3, 2, 3, 3, 4, 5, 5, 6, 6, 7, 7],
                [2, 3, 2, 3, 4, 5, 5, 5, 6, 7, 7, 7],
                [3, 3, 3, 4, 4, 5, 5, 6, 6, 7, 7, 7],
                [5, 5, 5, 6, 6, 7, 7, 7, 7, 7, 8, 8],
                [7, 7, 7, 7, 7, 8, 8, 8, 8, 8, 8, 8],
                [8, 8, 8, 8, 8, 8, 8, 9, 9, 9, 9, 9],
                
            ]

            var tabelaC = [
                [1, 2, 3, 3, 4, 5, 5],
                [2, 2, 3, 4, 4, 5, 5],
                [3, 3, 3, 4, 4, 5, 6],
                [3, 3, 3, 4, 5, 6, 6],
                [4, 4, 4, 5, 6, 7, 7],
                [4, 4, 5, 6, 6, 7, 7],
                [5, 5, 6, 6, 7, 7, 7],
                [5, 5, 6, 7, 7, 7, 7 ]
            ];
            var resultadoA = tabelaA[linhaA][colunaA];
            var restultadoB = tabelaB[linhaB][colunaB];
            var resultadoFinal =  tabelaC[resultadoA -1][restultadoB - 1];
         
            switch(true){
                case resultadoFinal < 3:
               
                conclusaorula.innerHTML = 'aceitável se não é mantida ou repetida por longos períodos';
                conclusaorula.style.backgroundColor = "green";
                break;

                 case resultadoFinal > 2 && resultadoFinal < 5:
                 conclusaorula.innerHTML = 'são necessários mais estudos e que serão necessárias mudanças';
                 conclusaorula.style.color = "black"; 
                 conclusaorula.style.backgroundColor = "yellow";
                
                break;
                
                case resultadoFinal > 4 && resultadoFinal < 7:
                 conclusaorula.innerHTML = 'são necessárias pesquisas e mudanças em um futuro próximo';
                 conclusaorula.style.backgroundColor = "red";
               
                break;

                case resultadoFinal > 6:
                conclusaorula.innerHTML = 'o necessárias pesquisas e mudanças imediatamente';
                conclusaorula.style.backgroundColor = "black";
               
                break;
            }
           
            
        }


        function owas(dorso, braco, perna, carga, index){
             
          var conclusaoowas = document.getElementById('conclusaoowas'+index);
          var coluna = ((dorso - 1) * 3 + braco) - 1;
          var linha = ((perna - 1) * 3 + carga) - 1;
          var tabelaowas = [
            [1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 1, 1, 1, 1, 1, 1 ], 
            [1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 1, 1, 1, 1, 1, 1 ], 
            [1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 3, 2, 2, 3, 1, 1, 1, 1, 1, 2 ], 
            [2, 2, 3, 2, 2, 3, 2, 2, 3, 3, 3, 3, 3, 3, 3, 2, 2, 2, 2, 3, 3 ],
            [2, 2, 3, 2, 2, 3, 2, 3, 3, 3, 4, 4, 3, 4, 3, 3, 3, 4, 2, 3, 4 ],
            [3, 3, 4, 2, 2, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 2, 3, 4 ],
            [1, 1, 1, 1, 1, 1, 1, 1, 2, 3, 3, 3, 4, 4, 4, 1, 1, 1, 1, 1, 1 ], 
            [2, 2, 3, 1, 1, 1, 1, 1, 2, 4, 4, 4, 4, 4, 4, 3, 3, 3, 1, 1, 1 ], 
            [2, 2, 3, 1, 1, 1, 2, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 1, 1, 1 ],
            [2, 3, 3, 2, 2, 3, 2, 2, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 2, 3, 4 ],
            [3, 3, 4, 2, 3, 4, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 2, 3, 4 ],
            [4, 4, 4, 2, 3, 4, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 2, 3, 4 ],

            
          ];
            resultadoowas = tabelaowas[coluna][linha];
            conclusaoowas.style.color = "white";
           switch(resultadoowas){
                case 1:
               
                conclusaoowas.innerHTML = 'Sem ações corretivas, postura adequada';
                conclusaoowas.style.backgroundColor = "green";
                break;

                 case 2:
                 conclusaoowas.innerHTML = 'Ações corretivas são requeridas em um futuro próximo';
                conclusaoowas.style.backgroundColor = "yellow";
                conclusaoowas.style.color = "black";
               
                break;

                case 3:
                 conclusaoowas.innerHTML = 'Ações corretivas são necessária a curto prazo';
                 conclusaoowas.style.backgroundColor = "red";
               
                break;

                case 4:
                conclusaoowas.innerHTML = 'Ações corretivas imediatas';
                conclusaoowas.style.backgroundColor = "black";
               
                break;
            }
           
            
             

        }


       function suerodgers(dados, index){
                var conclusaosue = document.getElementById('conclusaosue' + index);

                const arraysAmarelo = [
                '[1, 2, 3]',
                '[1, 3, 2]',
                '[2, 1, 3]',
                '[2, 2, 2]',
                '[2, 3, 1]',
                '[2, 3, 2]',
                '[3, 1, 2]',
                ];

                const arraysVermelho = [
                '[2, 2, 3]',
                '[3, 1, 3]',
                '[3, 2, 1]',
                '[3, 2, 2]',
                '[3, 2, 3]',
                '[3, 3, 1]',
                '[3, 3, 2]',
                ];

                function calculasue(membro) {
                var splitmembro = membro.split('-');
                arraymembro = splitmembro[1];
                nomemembro = splitmembro[0];
                let algumaCondicaoAtendida = false;

                for (const arrayamerelo of arraysAmarelo) {
                    if (arrayamerelo == arraymembro) {
                    conclusaosue.innerHTML += '<br> -' + nomemembro + '- RISCO MODERADO';
                    algumaCondicaoAtendida = true;
                    break;
                    }
                }

                for (const arrayvermelho of arraysVermelho) {
                    if (arrayvermelho == arraymembro) {

                    conclusaosue.innerHTML += '<br> -' + nomemembro + '- RISCO ALTO';
                    algumaCondicaoAtendida = true;
                    break;
                    }
                }

                if (!algumaCondicaoAtendida) {
                    conclusaosue.innerHTML += '<br> -' + nomemembro + '- RISCO BAIXO';
                }
                }

                dados.forEach((dados) => {
                calculasue(dados);
                });

               
       }


       function niosh(fdh, fav, fdc, frlt, ffl, fqpc, peso, index){
        
        var conclusaoniosh = document.getElementById('conclusaoniosh' + index);
        conclusaoniosh.style.color ="white";
        var ilm = (fdh + fav + fdc) * (1 - frlt) * (1 - ffl) * (1 - fqpc) * peso;
           switch(true){
                case ilm < 1:
               
                conclusaoniosh.innerHTML = ilm + ' - Faixa Segura';
                conclusaoniosh.style.backgroundColor = "green";
                break;

                 case ilm >= 1 && ilm < 2.3:
               
                conclusaoniosh.innerHTML = ilm + ' - Faixa é considerada de risco moderado';
                conclusaoniosh.style.backgroundColor = "yellow";
                break;

                case ilm > 2.3:
               
                conclusaoniosh.innerHTML = ilm + ' - Faixa é considerada de alto risco';
                conclusaoniosh.style.backgroundColor = "red";
                break;

           }
 
       }

    function paginacao(){
        var classeAlvo = "page";
        var elementos = document.getElementsByClassName(classeAlvo);
        document.write(elementos.length);
        
        }

    function classificacao(classificacao, index){
        classification = classificacao.split(' ', 2);
        resultado = classification[1].split('(', 1);
        var conclusao = document.getElementById('classificacao'+index);
        switch(resultado[0]){
            case 'LEVE':

            conclusao.style.backgroundColor = "green";
            break;

             case 'MODERADO':
      
             conclusao.style.backgroundColor = "yellow";
           
            break;

            case 'ALTO':
          
             conclusao.style.backgroundColor = "red";
           
            break;

        }
  
    }

    
