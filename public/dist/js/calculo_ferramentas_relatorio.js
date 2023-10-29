function mooregarg(fit, fde, ffe, fpmp, fri, fdt, index){
    var metodologia = document.getElementById('metodologia_moor');
    metodologia.innerHTML = '<b>MOORE & GARG</b> para analisar índice de esforço musculoesquelético da  parte distal dos membros superiores (punhos, mãos e dedos);';
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
         conclusao.innerHTML = ' Baixo Risco';
         conclusao.style.backgroundColor = "green";
    }
    

   
}
function conclusao(conclusao, ferramenta, index, member){

    var conclusaobg = document.getElementById('conclusao'+index);
    var textomembros = document.getElementById('textomemrbos'+index);
    var membros = document.getElementById('membros'+index);
   // console.log(conclusao)
    if(conclusao == 'Baixo Risco' || conclusao == 'RISCO BAIXO' || conclusao == 'Faixa Segura' || conclusao == 'Ausente ou Aceitável' || conclusao == 'aceitável se não é mantida ou repetida por longos períodos' || conclusao == 'Sem ações corretivas, postura adequada' || conclusao == 'Baixo'){
        colorbg = "green";
        colorfont = "white";
  
    } else if(conclusao == 'Duvidoso' || conclusao == 'RISCO MODERADO' || conclusao == 'Faixa é considerada de risco moderado' || conclusao == 'Limite' ||conclusao == 'Médio' ||conclusao == 'são necessários mais estudos e que serão necessárias mudanças' ||conclusao == 'são necessárias pesquisas e mudanças em um futuro próximo' || conclusao == 'Ações corretivas são requeridas em um futuro próximo' || conclusao == 'Ações corretivas são necessária a curto prazo'){
        colorbg = "yellow";
        colorfont = "black";

    } else{
        colorbg = "red";
        colorfont = "black";
    }
    
    if (ferramenta === 'Moore e Garg') {
        txt = '(Análise de risco para punhos e mãos)';
        membro = 'Punhos, Mãos e Dedos';
        var metodologia = document.getElementById('metodologia_moor');
        metodologia.innerHTML = '<b>MOORE & GARG</b> para analisar índice de esforço musculoesquelético da  parte distal dos membros superiores (punhos, mãos e dedos);';
    } else if (ferramenta === 'Rula') {
        txt = '(Avaliação de fatores de risco para distúrbios músculo-esqueléticos dos membros superiores)';
        membro = 'Pescoço, Ombros, Braços, Antebraços, Punhos, Mãos e Dedos';
        var metodologia = document.getElementById('metodologia_rula');
        metodologia.innerHTML = "<b>RULA (Rapid Upper Limb Assessment)</b> para avaliação do risco de distúrbios osteomusculares relacionados ao trabalho (DORT);";
    } else if (ferramenta === 'OWAS') {
        txt = '(Detecção de posturas inadequadas)';
        membro = 'Pescoço, Ombros, Braços, Antebraços, Punhos, Mãos e Dedos';
        var metodologia = document.getElementById('metodologia_owas');
        metodologia.innerHTML = "<b>OWAS</b> identificação da postura de trabalho;";
    } else if (ferramenta === 'Sue Rodgers') {
        txt = '(Análise de esforço para segmentos corpóreos)';
        membro = member;
        var metodologia = document.getElementById('metodologia_sue');
        metodologia.innerHTML = "<b>SUZANE RODGERS</b> para avaliar as exigências biomecânicas do sistema osteomuscular;";
    } else if (ferramenta === 'NIOSH') {
        txt = ''; 
        membro = ''; 
    }else if (ferramenta === 'OCRA') {
        txt = '(Análise de esforço para segmentos corpóreos)';
        membro = 'Pescoço, Ombros, Braços, Antebraços, Punhos, Mãos e Dedos';
        var metodologia = document.getElementById('metodologia_ocra');
        metodologia.innerHTML = "<b>OCRA</b>  mapeamento dos riscos por sobrecarga dos membros superiores;";
    } else {
        txt = ''; 
        membro = '';  
    }
    conclusaobg.style.backgroundColor = colorbg;
    conclusaobg.style.color = colorfont;
   // textomembros.innerHTML = txt;
    membros.innerHTML = membro;
}
function rula(braco, braco_desvio, antebraco, antebraco_desvio, punho, punho_desvio, pescoco, pescoco_desvio, tronco, tronco_desvio, perna, index){
    var metodologia = document.getElementById('metodologia_rula');
    metodologia.innerHTML = "<b>RULA (Rapid Upper Limb Assessment)</b> para avaliação do risco de distúrbios osteomusculares relacionados ao trabalho (DORT);";
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
  var metodologia = document.getElementById('metodologia_owas');
  metodologia.innerHTML = "<b>RULA (Rapid Upper Limb Assessment)</b> para a detecção de posturas inadequadas;";
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

        var metodologia = document.getElementById('metodologia_sue');
        metodologia.innerHTML = "<b>SUZANE RODGERS</b> para avaliar as exigências biomecânicas do sistema osteomuscular;";
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
return elementos.length;
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

//Gráficos 
function calcularEstatisticas(subsetor, index) {
let faixaetaria20a29 = 0;
let faixaetaria30a39 = 0;
let faixaetaria40a49 = 0;
let faixaetaria50a59 = 0;
let tempoadmissao0a5 = 0;
let tempoadmissao6a10 = 0;
let tempoadmissao10a20 = 0;
let sexom = 0;
let sexof = 0;
let key = 0;
let escolaridadesg = 0;
let escolaridadepg = 0;
let escolaridadetg = 0;

subsetor.forEach((populacao) => {
    if (populacao.sexo === 'MASC.') {
        sexom += 1;
        key++;
    } else {
        sexof += 1;
        key++;
    }

    switch (true) {
        case populacao.idade <= 29:
            faixaetaria20a29 += 1;
            break;

        case populacao.idade >= 30 && populacao.idade <= 39:
            faixaetaria30a39 += 1;
            break;

        case populacao.idade >= 40 && populacao.idade <= 49:
            faixaetaria40a49 += 1;
            break;

        case populacao.idade > 49:
            faixaetaria50a59 += 1;
            break;
    }

    switch (true) {
        case populacao.tempo_empresa <= 5:
            tempoadmissao0a5 += 1;
            break;

        case populacao.tempo_empresa >= 6 && populacao.tempo_empresa <= 10:
            tempoadmissao6a10 += 1;
            break;

        case populacao.tempo_empresa > 10:
            tempoadmissao10a20 += 1;
            break;
    }

    if (populacao.escolaridade == 'SEGUNDO GRAU COMPLETO') {
        escolaridadesg += 1;
    } else if (populacao.escolaridade == 'TERCEIRO GRAU COMPLETO') {
        escolaridadetg += 1;
    } else {
        escolaridadepg += 1;
    }
});


const porcentagemmasculino = Math.round((sexom / key) * 100);
const porcentagemfeminino = 100 - porcentagemmasculino;
const porcentagem20a29 = Math.round((faixaetaria20a29 / key) * 100);
const porcentagem30a39 = Math.round((faixaetaria30a39 / key) * 100);
const porcentagem40a49 = Math.round((faixaetaria40a49 / key) * 100);
const porcentagem50a59 = Math.round((faixaetaria50a59 / key) * 100);
const porcentagem0a5 = Math.round((tempoadmissao0a5 / key) * 100);
const porcentagem6a10 = Math.round((tempoadmissao6a10 / key) * 100);
const porcentagem10a20 = Math.round((tempoadmissao10a20 / key) * 100);
const porcentagempg = Math.round((escolaridadepg / key) * 100);
const porcentagemsg = Math.round((escolaridadesg / key) * 100);
const porcentagemtg = Math.round((escolaridadetg / key) * 100);

var genero = {
    'labels': ['Feminino', 'Masculino'],
    'data': [porcentagemfeminino, porcentagemmasculino],
};

var faixaetaria = {
    'labels': ['20 á 29 anos', '30 á 39 anos', '40 á 49 anos', '50 á 59 anos'],
    'data': [porcentagem20a29, porcentagem30a39, porcentagem40a49, porcentagem50a59],
};

var tempoadmissao = {
    'labels': ['0 á 5 anos', '6 á 10 anos', '10 á 20 anos'],
    'data': [porcentagem0a5, porcentagem6a10, porcentagem10a20],
};

var escolaridade = {
    'labels': ['Primeiro Grau', 'Segundo Grau', 'Terceiro Grau'],
    'data': [porcentagempg, porcentagemsg, porcentagemtg],
};

return {
    genero: genero,
    faixaetaria: faixaetaria,
    tempoadmissao: tempoadmissao,
    escolaridade: escolaridade,
    index,

};
}

// Exemplo de uso:
const empresa = {
populacao: [
    // Insira aqui os dados da população da empresa
],
};



function mes(numero) {
const meses = [
    'Janeiro', 'Fevereiro', 'Março', 'Abril',
    'Maio', 'Junho', 'Julho', 'Agosto',
    'Setembro', 'Outubro', 'Novembro', 'Dezembro'
];

return meses[numero -1];

}

function atividade(cnpj){



// Faz uma requisição GET para a API
fetch('https://unyflex.com.br/ajaxcnpcompleto/'+cnpj)
.then(response => {
// Verifica se a resposta da API foi bem-sucedida (código de status 200)
if (!response.ok) {
    throw new Error('Não foi possível obter os dados da API');
}
// Converte a resposta para JSON
return response.json();
})
.then(data => {
var atividade = document.getElementById('atividade');

atividade_principal = data.atividade_principal[0];
atividades_secundarias = data.atividades_secundarias[0];
//console.log(data);
atividade.innerHTML += atividade_principal.code + ' - ' + atividade_principal.text + '<br><br>';
atividade.innerHTML += atividades_secundarias.code + ' - ' + atividades_secundarias.text;

})
.catch(error => {
console.error('Ocorreu um erro:', error);
});


}

function atividadecapa(cnpj){



    // Faz uma requisição GET para a API
    fetch('https://unyflex.com.br/ajaxcnpcompleto/'+cnpj)
    .then(response => {
    // Verifica se a resposta da API foi bem-sucedida (código de status 200)
    if (!response.ok) {
        throw new Error('Não foi possível obter os dados da API');
    }
    // Converte a resposta para JSON
    return response.json();
    })
    .then(data => {
        var atividade = document.getElementById('atividadecapa');
    
        atividade_principal = data.atividade_principal[0];
        atividades_secundarias = data.atividades_secundarias[0];
       
        atividade.innerHTML += atividade_principal.code;
     
    
    })
    .catch(error => {
    console.error('Ocorreu um erro:', error);
    });
    
    
    }

