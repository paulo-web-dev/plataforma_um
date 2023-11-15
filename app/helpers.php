<?php

function hello() {
    return 'hello';
}

// Defina outras funções globais, se necessário

function mooregarg($fit, $fde, $ffe, $fpmp, $fri, $fdt) {
    $resultado = $fit * $fde * $ffe * $fpmp * $fri * $fdt;
   

    if ($resultado > 3 && $resultado < 7) {
        $conclusao = 'Duvidoso';
    } elseif ($resultado > 7) {
        $conclusao = ' Alto Risco';
    } elseif ($resultado <= 3) {
        $conclusao = ' Baixo Risco';
    }

    return $conclusao;
}


function rula($braco, $braco_desvio, $antebraco, $antebraco_desvio, $punho, $punho_desvio, $pescoco, $pescoco_desvio, $tronco, $tronco_desvio, $perna) {
    
    $braco = $braco + $braco_desvio;
    $antebraco = $antebraco + $antebraco_desvio;
    $punho = $punho + $punho_desvio;
    $pescoco = $pescoco + $pescoco_desvio;
    $tronco = $tronco + $tronco_desvio;

    $linhaA = (($braco - 1) * 3 + $antebraco) - 1;
    $colunaA = ($punho * 2) - 1;
    $colunaB = (((($tronco - 1) * 2) + $punho) - 1);
    $linhaB = $pescoco - 1;

    $tabelaA = [
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

    $tabelaB = [
        [1, 3, 2, 3, 3, 4, 5, 5, 6, 6, 7, 7],
        [2, 3, 2, 3, 4, 5, 5, 5, 6, 7, 7, 7],
        [3, 3, 3, 4, 4, 5, 5, 6, 6, 7, 7, 7],
        [5, 5, 5, 6, 6, 7, 7, 7, 7, 7, 8, 8],
        [7, 7, 7, 7, 7, 8, 8, 8, 8, 8, 8, 8],
        [8, 8, 8, 8, 8, 8, 8, 9, 9, 9, 9, 9],
    ];

    $tabelaC = [
        [1, 2, 3, 3, 4, 5, 5],
        [2, 2, 3, 4, 4, 5, 5],
        [3, 3, 3, 4, 4, 5, 6],
        [3, 3, 3, 4, 5, 6, 6],
        [4, 4, 4, 5, 6, 7, 7],
        [4, 4, 5, 6, 6, 7, 7],
        [5, 5, 6, 6, 7, 7, 7],
        [5, 5, 6, 7, 7, 7, 7],
    ];

    $resultadoA = $tabelaA[$linhaA][$colunaA];
    $resultadoB = $tabelaB[$linhaB][$colunaB];
    $resultadoFinal = $tabelaC[$resultadoA - 1][$resultadoB - 1];

    switch (true) {
        case $resultadoFinal < 3:
            $conclusaorula = 'Aceitável se não é mantida ou repetida por longos períodos';
          
            break;

        case $resultadoFinal > 2 && $resultadoFinal < 5:
            $conclusaorula = 'São necessários mais estudos e que serão necessárias mudanças';
          
            break;

        case $resultadoFinal > 4 && $resultadoFinal < 7:
            $conclusaorula = 'São necessárias pesquisas e mudanças em um futuro próximo';
            break;

        case $resultadoFinal > 6:
            $conclusaorula = 'São necessárias pesquisas e mudanças imediatamente';
            break;
    }

        return $conclusaorula;
}


function owas($dorso, $braco, $perna, $carga) {


    $coluna = (($dorso - 1) * 3 + $braco) - 1;
    $linha = (($perna - 1) * 3 + $carga) - 1;

    $tabelaowas = [
        [1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 1, 1, 1, 1, 1, 1],
        [1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 1, 1, 1, 1, 1, 1],
        [1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 3, 2, 2, 3, 1, 1, 1, 1, 1, 2],
        [2, 2, 3, 2, 2, 3, 2, 2, 3, 3, 3, 3, 3, 3, 3, 2, 2, 2, 2, 3, 3],
        [2, 2, 3, 2, 2, 3, 2, 3, 3, 3, 4, 4, 3, 4, 3, 3, 3, 4, 2, 3, 4],
        [3, 3, 4, 2, 2, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 2, 3, 4],
        [1, 1, 1, 1, 1, 1, 1, 1, 2, 3, 3, 3, 4, 4, 4, 1, 1, 1, 1, 1, 1],
        [2, 2, 3, 1, 1, 1, 1, 1, 2, 4, 4, 4, 4, 4, 4, 3, 3, 3, 1, 1, 1],
        [2, 2, 3, 1, 1, 1, 2, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 1, 1, 1],
        [2, 3, 3, 2, 2, 3, 2, 2, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 2, 3, 4],
        [3, 3, 4, 2, 3, 4, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 2, 3, 4],
        [4, 4, 4, 2, 3, 4, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 2, 3, 4],
    ];

    $resultadoowas = $tabelaowas[$coluna][$linha];
  

    switch ($resultadoowas) {
        case 1:
            $conclusaoowas = 'Sem ações corretivas, postura adequada';
        
            break;

        case 2:
            $conclusaoowas = 'Ações corretivas são requeridas em um futuro próximo';
           
            break;

        case 3:
            $conclusaoowas = 'Ações corretivas são necessárias a curto prazo';
          
            break;

        case 4:
            $conclusaoowas = 'Ações corretivas imediatas';
            
            break;
    }

    return $conclusaoowas;
}

function niosh($fdh, $fav, $fdc, $frlt, $ffl, $fqpc, $peso) {

    $ilm = ($fdh + $fav + $fdc) * (1 - $frlt) * (1 - $ffl) * (1 - $fqpc) * $peso;

    switch (true) {
        case $ilm < 1:
            $conclusaoniosh = 'Faixa Segura';
         

        case $ilm >= 1 && $ilm < 2.3:
            $conclusaoniosh = 'A Faixa é considerada de risco moderado';
            break;

        case $ilm > 2.3:
            $conclusaoniosh ='A Faixa é considerada de alto risco';
            break;
    }
    return $conclusaoniosh;
}



?>