@extends('layouts.header')

@section('content')
<!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Informação de Checklist
            </h2>
            <a href="{{ route('infoempresa',  ['id' => $idempresa]) }}" class="btn btn-primary shadow-md mr-2"><i data-feather="skip-back" class="w-4 h-4 mr-2"></i>Voltar</a>
        </div>

        <form action="{{ route('upd-checklists') }}" enctype="multipart/form-data" data-single="true" method="post">
            <div class="p-5">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert">
                        <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $error }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i data-feather="x" class="w-4 h-4"></i>
                        </button>
                    </div>
                @endforeach

                <div class="grid grid-cols-12 gap-x-5">

                    @csrf
                    <input type="hidden" name="idempresa" value="{{$idempresa}}">
                        <div class="col-span-12 xl:col-span-6">
                        <h2 class="font-medium text-base mr-auto">
                    Avaliação de Cadeira
                            </h2>
                    <table>
            <thead>
            <tr>
                <th>Pergunta</th>
                <th>Resposta</th>
            </tr>
        </thead>
        <tbody>
        <tr>
        <td>Cadeira estofada?</td>
        <td><input name="cadeira_estofada" class="show-code form-check-input" @if($checklistCadeira->cadeira_estofada == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Estofado de espessura e maciez adequada?</td>
        <td><input name="estofado_espessura_maciez" class="show-code form-check-input" @if($checklistCadeira->estofado_espessura_maciez == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Tecido da cadeira permite boa transpiração?</td>
        <td><input name="tecido_transpiracao" class="show-code form-check-input" @if($checklistCadeira->tecido_transpiracao == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Altura regulável?</td>
        <td><input name="altura_regulavel" class="show-code form-check-input" @if($checklistCadeira->altura_regulavel == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Acionamento fácil da regulagem da altura?</td>
        <td><input name="acionamento_regulagem_altura" class="show-code form-check-input" @if($checklistCadeira->acionamento_regulagem_altura == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>A altura máxima da cadeira é compatível com pessoas mais altas ou com pessoas baixas?</td>
        <td><input name="altura_compativel" class="show-code form-check-input" @if($checklistCadeira->altura_compativel == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Largura da cadeira de dimensão correta?</td>
        <td><input name="largura_dimensao_correta" class="show-code form-check-input" @if($checklistCadeira->largura_dimensao_correta == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Assento na horizontal, não jogando o corpo do funcionário para trás?</td>
        <td><input name="assento_horizontal" class="show-code form-check-input" @if($checklistCadeira->assento_horizontal == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Assento de forma plana?</td>
        <td><input name="assento_plano" class="show-code form-check-input" @if($checklistCadeira->assento_plano == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Borda anterior do assento arredondada?</td>
        <td><input name="borda_anterior_arredondada" class="show-code form-check-input" @if($checklistCadeira->borda_anterior_arredondada == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Apoio dorsal com regulagem da inclinação?</td>
        <td><input name="apoio_dorsal_regulagem" class="show-code form-check-input" @if($checklistCadeira->apoio_dorsal_regulagem == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Apoio dorsal fornece um suporte firme?</td>
        <td><input name="apoio_dorsal_suporte_firme" class="show-code form-check-input" @if($checklistCadeira->apoio_dorsal_suporte_firme == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Forma do apoio acompanhando as curvaturas normais da coluna?</td>
        <td><input name="apoio_dorsal_curvaturas_coluna" class="show-code form-check-input" @if($checklistCadeira->apoio_dorsal_curvaturas_coluna == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Regulagem da altura do apoio dorsal: existe e é fácil?</td>
        <td><input name="altura_apoio_dorsal" class="show-code form-check-input" @if($checklistCadeira->altura_apoio_dorsal == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Espaço para acomodação das nádegas?</td>
        <td><input name="espaco_nadegas" class="show-code form-check-input" @if($checklistCadeira->espaco_nadegas == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Giratória?</td>
        <td><input name="giratoria" class="show-code form-check-input" @if($checklistCadeira->giratoria == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Rodízios não muito duros nem muito leves?</td>
        <td><input name="rodizios_duros_leves" class="show-code form-check-input" @if($checklistCadeira->rodizios_duros_leves == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Os braços da cadeira são de altura regulável e a regulagem é fácil?</td>
        <td><input name="bracos_regulaveis" class="show-code form-check-input" @if($checklistCadeira->bracos_regulaveis == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Os braços da cadeira prejudicam a aproximação do trabalhador até seu posto de trabalho?</td>
        <td><input name="bracos_aproximacao_trabalhador" class="show-code form-check-input" @if($checklistCadeira->bracos_aproximacao_trabalhador == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>A cadeira tem algum outro mecanismo de conforto e que seja facilmente utilizável?</td>
        <td><input name="mecanismo_conforto" class="show-code form-check-input" @if($checklistCadeira->mecanismo_conforto == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Por amostragem, percebe-se que os mecanismos de regulagem de altura, de inclinação e da altura do apoio dorsal estão funcionando bem?</td>
        <td><input name="mecanismos_funcionando_bem" class="show-code form-check-input" @if($checklistCadeira->mecanismos_funcionando_bem == 1) checked @endif type="checkbox"></td>
    </tr>

        </tbody>
    </table>  <br>

                    <h2 class="font-medium text-base mr-auto">
                    Avaliação de Mesa de trabalho
                            </h2>
                    <table>
            <thead>
            <tr>
                <th>Pergunta</th>
                <th>Resposta</th>
            </tr>
        </thead>
        <tbody>
        <tr>
        <td>É o tipo de móvel mais adequado para a função que é exercida?</td>
        <td><input name="tipo_movel_adequado" class="show-code form-check-input" @if($checklistMesa->tipo_movel_adequado == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Altura apropriada?</td>
        <td><input name="altura_apropriada" class="show-code form-check-input" @if($checklistMesa->altura_apropriada == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Permite regulagem de altura para pessoas muito altas ou muito baixas?</td>
        <td><input name="regulagem_altura" class="show-code form-check-input" @if($checklistMesa->regulagem_altura == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Borda anterior arredondada?</td>
        <td><input name="borda_anterior_arredondada" class="show-code form-check-input" @if($checklistMesa->borda_anterior_arredondada == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Dimensões apropriadas considerando os diversos tipos de trabalho realizado pelo trabalhador? (possibilita abrir espaço suficiente para escrita, leitura, consulta a documentos segundo a necessidade?)</td>
        <td><input name="dimensoes_apropriadas" class="show-code form-check-input" @if($checklistMesa->dimensoes_apropriadas == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Material não reflexivo? Cor adequada, para não refletir?</td>
        <td><input name="material_nao_reflexivo" class="show-code form-check-input" @if($checklistMesa->material_nao_reflexivo == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Espaço para as pernas suficientemente alto?</td>
        <td><input name="espaco_pernas_alto" class="show-code form-check-input" @if($checklistMesa->espaco_pernas_alto == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Espaço para as pernas suficientemente profundo?</td>
        <td><input name="espaco_pernas_profundo" class="show-code form-check-input" @if($checklistMesa->espaco_pernas_profundo == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Espaço para as pernas suficientemente largo?</td>
        <td><input name="espaco_pernas_largo" class="show-code form-check-input" @if($checklistMesa->espaco_pernas_largo == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Facilidade para a pessoa entrar e sair no posto de trabalho? (não considerar se houver suporte do teclado – ver avaliação específica, adiante)</td>
        <td><input name="facilidade_entrada_saida" class="show-code form-check-input" @if($checklistMesa->facilidade_entrada_saida == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Permite ajuste da altura da tela do monitor de vídeo? Ou há acessório próprio para esta função? Ou, no caso de LCD, obtém-se bom ajuste de altura com os recursos do próprio equipamento?</td>
        <td><input name="ajuste_altura_tela_monitor" class="show-code form-check-input" @if($checklistMesa->ajuste_altura_tela_monitor == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Este ajuste pode ser feito facilmente?</td>
        <td><input name="facilidade_ajuste_altura" class="show-code form-check-input" @if($checklistMesa->facilidade_ajuste_altura == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>O monitor pode ser posicionado mais para frente ou mais para trás?</td>
        <td><input name="ajuste_monitor_frente_tras" class="show-code form-check-input" @if($checklistMesa->ajuste_monitor_frente_tras == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Este ajuste pode ser feito facilmente?</td>
        <td><input name="facilidade_ajuste_frente_tras" class="show-code form-check-input" @if($checklistMesa->facilidade_ajuste_frente_tras == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>A mesa tem algum espaço para que o trabalhador guarde algum objeto pessoal (bolsa, pasta ou outro)?</td>
        <td><input name="espaco_objeto_pessoal" class="show-code form-check-input" @if($checklistMesa->espaco_objeto_pessoal == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>Os fios ficam organizados adequadamente, não interferindo na área de trabalho?</td>
        <td><input name="organizacao_fios" class="show-code form-check-input" @if($checklistMesa->organizacao_fios == 1) checked @endif type="checkbox"></td>
    </tr>
    <tr>
        <td>A mesa de trabalho tem algum outro mecanismo de conforto e que seja facilmente utilizável?</td>
        <td><input name="outro_mecanismo_conforto" class="show-code form-check-input" @if($checklistMesa->outro_mecanismo_conforto == 1) checked @endif type="checkbox"></td>
    </tr>

            
        </tbody>
    </table>


         <br>

                 <h2 class="font-medium text-base mr-auto">
                Suporte Para Teclado
                        </h2>
                   <table>
        <thead>
        <tr>
            <th>Pergunta</th>
            <th>Resposta</th>
        </tr>
    </thead>
    <tbody>
       <tr>
    <td>A altura do suporte do teclado é regulável?</td>
    <td><input name="altura_regulavel" class="show-code form-check-input" @if($checklistSuporteTeclado->altura_regulavel == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>A regulagem é feita facilmente?</td>
    <td><input name="regulagem_facil" class="show-code form-check-input" @if($checklistSuporteTeclado->regulagem_facil == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>Suas dimensões são apropriadas, inclusive cabendo o mouse?</td>
    <td><input name="dimensoes_apropriadas" class="show-code form-check-input" @if($checklistSuporteTeclado->dimensoes_apropriadas == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>Sua largura permite mover o teclado mais para perto ou mais para longe do operador?</td>
    <td><input name="largura_teclado_ajustavel" class="show-code form-check-input" @if($checklistSuporteTeclado->largura_teclado_ajustavel == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>O suporte é capaz de amortecer vibrações ou sons criados ao se digitar ou datilografar?</td>
    <td><input name="amortecimento_vibracoes_sons" class="show-code form-check-input" @if($checklistSuporteTeclado->amortecimento_vibracoes_sons == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>O espaço para as pernas é suficientemente alto?</td>
    <td><input name="espaco_pernas_alto" class="show-code form-check-input" @if($checklistSuporteTeclado->espaco_pernas_alto == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>O espaço para as pernas é suficiente em profundidade?</td>
    <td><input name="espaco_pernas_profundo" class="show-code form-check-input" @if($checklistSuporteTeclado->espaco_pernas_profundo == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>O espaço para as pernas é suficientemente largo?</td>
    <td><input name="espaco_pernas_largo" class="show-code form-check-input" @if($checklistSuporteTeclado->espaco_pernas_largo == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>Facilidade para a pessoa entrar e sair no posto de trabalho?</td>
    <td><input name="facilidade_entrada_saida" class="show-code form-check-input" @if($checklistSuporteTeclado->facilidade_entrada_saida == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>Há apoio arredondado para o carpo, ou a borda anterior da mesa é arredondada? Ou o próprio teclado tem uma aba complementar que funciona como apoio?</td>
    <td><input name="apoio_arredondado_carpo" class="show-code form-check-input" @if($checklistSuporteTeclado->apoio_arredondado_carpo == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>O suporte de teclado ou seu mecanismo de regulagem tem alguma quina viva ou ponta capaz de ocasionar acidente ou ferimento nos joelhos, coxas ou pernas do usuário?</td>
    <td><input name="quina_viva_ocasionar_acidente" class="show-code form-check-input" @if($checklistSuporteTeclado->quina_viva_ocasionar_acidente == 1) checked @endif type="checkbox"></td>
</tr>

    </tbody>
</table>

       <br>

                 <h2 class="font-medium text-base mr-auto">
                Apoio Para os Pés
                        </h2>
                   <table>
        <thead>
        <tr>
            <th>Pergunta</th>
            <th>Resposta</th>
        </tr>
    </thead>
    <tbody>
   <tr>
    <td>Largura suficiente?</td>
    <td><input name="largura_suficiente" class="show-code form-check-input" @if($checklistApoioPes->largura_suficiente == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>Altura regulável? Ou disponível mais de um modelo, com alturas diferentes?</td>
    <td><input name="altura_regulavel" class="show-code form-check-input" @if($checklistApoioPes->altura_regulavel == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>Inclinação ajustável?</td>
    <td><input name="inclinação_ajustavel" class="show-code form-check-input" @if($checklistApoioPes->inclinação_ajustavel == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>Pode ser movido para frente ou para trás no piso?</td>
    <td><input name="movimento_frente_tras" class="show-code form-check-input" @if($checklistApoioPes->movimento_frente_tras == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>Desliza facilmente no piso?</td>
    <td><input name="desliza_facilmente" class="show-code form-check-input" @if($checklistApoioPes->desliza_facilmente == 1) checked @endif type="checkbox"></td>
</tr>

        
        
    </tbody>
</table>

      <br>

                 <h2 class="font-medium text-base mr-auto">
                Porta-Documentos
                        </h2>
                   <table>
        <thead>
        <tr>
            <th>Pergunta</th>
            <th>Resposta</th>
        </tr>
    </thead>
    <tbody>
      <tr>
    <td>Sua altura, distância e ângulo podem ser ajustados?</td>
    <td><input name="ajuste_altura_distancia_angulo" class="show-code form-check-input" @if($checklistDocumentos->ajuste_altura_distancia_angulo == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>O ajuste é feito com facilidade?</td>
    <td><input name="facilidade_ajuste" class="show-code form-check-input" @if($checklistDocumentos->facilidade_ajuste == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>Permite boa retenção ou fixação do documento?</td>
    <td><input name="retencao_fixacao_documento" class="show-code form-check-input" @if($checklistDocumentos->retencao_fixacao_documento == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>Ele previne vibrações?</td>
    <td><input name="prevencao_vibracoes" class="show-code form-check-input" @if($checklistDocumentos->prevencao_vibracoes == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>Ele possui o espaço suficiente para o tipo de documento de que normalmente o trabalhador faz uso?</td>
    <td><input name="espaco_suficiente_documento" class="show-code form-check-input" @if($checklistDocumentos->espaco_suficiente_documento == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>Ele permite que o usuário o coloque na posição mais próxima possível do ângulo de visão da tela e que possa ser usado nessa posição?</td>
    <td><input name="posicao_proxima_angulo_visao" class="show-code form-check-input" @if($checklistDocumentos->posicao_proxima_angulo_visao == 1) checked @endif type="checkbox"></td>
</tr>

        
        
    </tbody>
</table>


      <br>

                 <h2 class="font-medium text-base mr-auto">
                   Teclado
                        </h2>
                   <table>
        <thead>
        <tr>
            <th>Pergunta</th>
            <th>Resposta</th>
        </tr>
    </thead>
    <tbody>
   <tr>
    <td>É fino?</td>
    <td><input name="fino" class="show-code form-check-input" @if($checklistTeclado->fino == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>É macio?</td>
    <td><input name="macio" class="show-code form-check-input" @if($checklistTeclado->macio == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>As teclas têm dimensões corretas?</td>
    <td><input name="teclas_dimensoes_corretas" class="show-code form-check-input" @if($checklistTeclado->teclas_dimensoes_corretas == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>É configurado segundo padronização da ABNT?</td>
    <td><input name="configuracao_ABNT" class="show-code form-check-input" @if($checklistTeclado->configuracao_ABNT == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>Apresenta algum tipo de formato não tradicional e que complica mais do que facilita?</td>
    <td><input name="formato_nao_tradicional" class="show-code form-check-input" @if($checklistTeclado->formato_nao_tradicional == 1) checked @endif type="checkbox"></td>
</tr>

    </tbody>
</table>

<br>

                 <h2 class="font-medium text-base mr-auto">
                   Monitor de Vídeo
                        </h2>
                   <table>
        <thead>
        <tr>
            <th>Pergunta</th>
            <th>Resposta</th>
        </tr>
    </thead>
    <tbody>
        <tr>
    <td>O monitor de vídeo está localizado na frente do trabalhador?</td>
    <td><input name="monitor_frente_trabalhador" class="show-code form-check-input" @if($checklistMonitor->monitor_frente_trabalhador == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>Sua altura está adequada?</td>
    <td><input name="altura_adequada" class="show-code form-check-input" @if($checklistMonitor->altura_adequada == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>Há mecanismo de regulagem de altura disponível e este ajuste pode ser feito facilmente?</td>
    <td><input name="regulagem_altura_facil" class="show-code form-check-input" @if($checklistMonitor->regulagem_altura_facil == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>Pode ser inclinado e este ajuste pode ser feito facilmente?</td>
    <td><input name="inclinação_facil" class="show-code form-check-input" @if($checklistMonitor->inclinação_facil == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>Tem controle de brilho e de contraste dos caracteres?</td>
    <td><input name="controle_brilho_contraste" class="show-code form-check-input" @if($checklistMonitor->controle_brilho_contraste == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>Há tremores na tela?</td>
    <td><input name="tremores_tela" class="show-code form-check-input" @if($checklistMonitor->tremores_tela == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>A imagem permanece claramente definida à luminância máxima?</td>
    <td><input name="imagem_claramente_definida" class="show-code form-check-input" @if($checklistMonitor->imagem_claramente_definida == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>Nos monitores com tubo de imagem (CRT) a frequência de renovação de imagem (screen refresh rate) pode ser ajustada?</td>
    <td><input name="freq_renovacao_imagem_ajustavel" class="show-code form-check-input" @if($checklistMonitor->freq_renovacao_imagem_ajustavel == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>O monitor de vídeo é fosco?</td>
    <td><input name="monitor_fosco" class="show-code form-check-input" @if($checklistMonitor->monitor_fosco == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>O monitor de vídeo é plano?</td>
    <td><input name="monitor_plano" class="show-code form-check-input" @if($checklistMonitor->monitor_plano == 1) checked @endif type="checkbox"></td>
</tr>

                
    </tbody>
</table>

<br>

                 <h2 class="font-medium text-base mr-auto">
                   Gabinete e CPU

                        </h2>
                   <table>
        <thead>
        <tr>
            <th>Pergunta</th>
            <th>Resposta</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Toma espaço excessivo no posto de trabalho?</td>
            <td><input name="espaco_excessivo" class="show-code form-check-input" @if($checklistComputador->espaco_excessivo == 1) checked @endif type="checkbox"></td>
        </tr>

        <tr>
            <td>Transmite calor radiante para o corpo do trabalhador? </td>
            <td><input name="transmite_calor_radiante" class="show-code form-check-input" @if($checklistComputador->transmite_calor_radiante == 1) checked @endif  type="checkbox"></td>
        </tr>

        <tr>
            <td>Gera nível excessivo de ruído? </td>
            <td><input name="nivel_excessivo_ruido" class="show-code form-check-input" @if($checklistComputador->nivel_excessivo_ruido == 1) checked @endif type="checkbox"></td>
        </tr>
                
    </tbody>
</table>
{{-- 
<br>

                 <h2 class="font-medium text-base mr-auto">
                   Notebook e Acessórios para o seu uso

                        </h2>
                   <table>
        <thead>
        <tr>
            <th>Pergunta</th>
            <th>Resposta</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td>Estão disponíveis um suporte para elevar a tela do equipamento até a
altura dos olhos, um teclado externo e um mouse externo?</td>
            <td><input name="espaco_excessivo" class="show-code form-check-input" type="checkbox"></td>
        </tr>

        <tr>
            <td>O mesmo é leve (menos que 2,5 kg)?</td>
            <td><input name="espaco_excessivo" class="show-code form-check-input" type="checkbox"></td>
        </tr>

        <tr>
            <td>O teclado mais frequentemente utilizado (do notebook ou o auxiliar) possui
teclas em separado para a função de Pgup, Pgdn, Home e End?
</td>
            <td><input name="espaco_excessivo" class="show-code form-check-input" type="checkbox"></td>
        </tr>

        <tr>
            <td> O teclado do notebook possui a mesma configuração do teclado do
desktop?
</td>
            <td><input name="espaco_excessivo" class="show-code form-check-input" type="checkbox"></td>
        </tr>

        <tr>
            <td>As teclas têm dimensões de 14 polegadas ou mais?</td>
            <td><input name="espaco_excessivo" class="show-code form-check-input" type="checkbox"></td>
        </tr>

        <tr>
            <td>A tela tem dimensão de 14 polegadas ou mais?</td>
            <td><input name="espaco_excessivo" class="show-code form-check-input" type="checkbox"></td>
        </tr>

        <tr>
            <td>Tem dispositivos para inserção de vários tipos de mídia disponíveis?</td>
            <td><input name="espaco_excessivo" class="show-code form-check-input" type="checkbox"></td>
        </tr>
       
                
    </tbody>
</table> --}}

<br>

                 <h2 class="font-medium text-base mr-auto">
                  Interação e do Leiaute

                        </h2>
                   <table>
        <thead>
        <tr>
            <th>Pergunta</th>
            <th>Resposta</th>
        </tr>
    </thead>
    <tbody>

<tr>
    <td>Está o trabalhador na posição correta em relação ao tipo de função e ao leiaute da sala?</td>
    <td><input name="posicao_correta" class="show-code form-check-input" @if($checklistLeiaute->posicao_correta == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>Há uma área mínima de 6 metros quadrados por pessoa?</td>
    <td><input name="area_minima" class="show-code form-check-input" @if($checklistLeiaute->area_minima == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>Distância entre a parte de trás de um terminal e o operador mais próximo é maior que 1,0 metro?</td>
    <td><input name="distancia_terminal_operador" class="show-code form-check-input" @if($checklistLeiaute->distancia_terminal_operador == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>Quando necessário ligar algum equipamento elétrico, as tomadas estão em altura maior que 75 cm?</td>
    <td><input name="tomadas_altura" class="show-code form-check-input" @if($checklistLeiaute->tomadas_altura == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>Quando necessário usar disquete, CD ou pendrive, o acesso aos respectivos dispositivos no corpo do computador é fácil?</td>
    <td><input name="acesso_dispositivos" class="show-code form-check-input" @if($checklistLeiaute->acesso_dispositivos == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>Há algum fator que leve à necessidade de se trabalhar em contração estática do tronco?</td>
    <td><input name="fator_contracao_estatica" class="show-code form-check-input" @if($checklistLeiaute->fator_contracao_estatica == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>No caso de necessidade de consultar o terminal enquanto atende ao telefone, um equipamento tipo headset está sempre disponível? Em número suficiente?</td>
    <td><input name="headset_disponivel" class="show-code form-check-input" @if($checklistLeiaute->headset_disponivel == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>Há interferências que prejudicam o posicionamento do corpo – por exemplo, estabilizadores, caixas de lixo, caixas e outros materiais debaixo da mesa? CPUs?</td>
    <td><input name="interferencias_posicionamento" class="show-code form-check-input" @if($checklistLeiaute->interferencias_posicionamento == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>O sistema de trabalho permite que o usuário alterne sua postura de modo a ficar de pé ocasionalmente?</td>
    <td><input name="alterna_postura_de_pe" class="show-code form-check-input" @if($checklistLeiaute->alterna_postura_de_pe == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>O clima é adequado (temperatura efetiva entre 20ºC e 23ºC)?</td>
    <td><input name="clima_adequado" class="show-code form-check-input" @if($checklistLeiaute->clima_adequado == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>O nível sonoro é apropriado (menor que 65 dB(A))? </td>
    <td><input name="nivel_sonoro_apropriado" class="show-code form-check-input" @if($checklistLeiaute->nivel_sonoro_apropriado == 1) checked @endif type="checkbox"></td>
</tr>

        
       
                
    </tbody>
</table>

<br>

                 <h2 class="font-medium text-base mr-auto">
                   Sistema de Trabalho


                        </h2>
                   <table>
        <thead>
        <tr>
            <th>Pergunta</th>
            <th>Resposta</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Caso o trabalho envolva uso somente de computador, existe pausa bem
estabelecida de 10 minutos a cada 50 minutos trabalhados?
</td>
            <td><input name="pausa_10_minutos_cada_50_minutos" @if($checklistSistema->pausa_10_minutos_cada_50_minutos == 1) checked @endif class="show-code form-check-input" type="checkbox"></td>
        </tr>

        <tr>
            <td> No caso de digitação, o número médio de toques é menor que 8.000 por
hora? Ou no caso de ser maior que 8.000 por hora, há pausas de
compensação bem definidas?
 </td>
            <td><input name="pausa_digitacao_8000_toques_por_hora"  @if($checklistSistema->pausa_10_minutos_cada_50_minutos == 1) checked @endif class="show-code form-check-input" type="checkbox"></td>
        </tr>

        <tr>
            <td>- Há pausa de 10 minutos a cada duas horas trabalhadas? Ou verifica-se a
possibilidade real de as pessoas terem um tempo de descanso de
aproximadamente 10 minutos a cada duas horas trabalhadas?
</td>
            <td><input name="pausa_10_minutos_cada_2_horas" @if($checklistSistema->pausa_10_minutos_cada_50_minutos == 1) checked @endif class="show-code form-check-input" type="checkbox"></td>
        </tr>
                
    </tbody>
</table>

<br>

                 <h2 class="font-medium text-base mr-auto">
                   Iluminação do Ambiente


                        </h2>
                   <table>
        <thead>
      <tr>
    <td>Iluminação entre 450 – 550 lux?</td>
    <td><input name="iluminacao_lux" class="show-code form-check-input" @if($checklistIluminacao->iluminacao_lux == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>Para pessoas com mais de 45 anos está disponível iluminação suplementar?</td>
    <td><input name="iluminacao_suplementar_mais_45_anos" class="show-code form-check-input" @if($checklistIluminacao->iluminacao_suplementar_mais_45_anos == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>A visão do trabalhador está livre de reflexos? (ver tela, teclados, mesa, papéis, etc...)?</td>
    <td><input name="visao_livre_reflexos" class="show-code form-check-input" @if($checklistIluminacao->visao_livre_reflexos == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>– Estão todas as fontes de deslumbramento fora do campo de visão do operador?</td>
    <td><input name="fontes_deslumbramento_fora_visao" class="show-code form-check-input" @if($checklistIluminacao->fontes_deslumbramento_fora_visao == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td> Estão os postos de trabalho posicionados de lado para as janelas?</td>
    <td><input name="postos_trabalho_posicionados_lado_janelas" class="show-code form-check-input" @if($checklistIluminacao->postos_trabalho_posicionados_lado_janelas == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>Caso contrário, as janelas têm persianas e cortinas?</td>
    <td><input name="janelas_persianas_cortinas" class="show-code form-check-input" @if($checklistIluminacao->janelas_persianas_cortinas == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>O brilho do piso é baixo?</td>
    <td><input name="brilho_piso_baixo" class="show-code form-check-input" @if($checklistIluminacao->brilho_piso_baixo == 1) checked @endif type="checkbox"></td>
</tr>
<tr>
    <td>A legibilidade do documento é satisfatória?</td>
    <td><input name="legibilidade_documento_satisfatoria" class="show-code form-check-input" @if($checklistIluminacao->legibilidade_documento_satisfatoria == 1) checked @endif type="checkbox"></td>
</tr>

        
                
    </tbody>
</table>

            <div class="mt-3">
                <label for="atividade" class="form-label"><strong>Atividade</strong></label>
                <input id="atividade" type="text" name="atividade" class="form-control"
                  value="{{$checklistCadeira->atividade}}"   placeholder="Atividade avaliada" required>
            </div>
                                                                  
                <div class="flex justify-end mt-4">
                    <button type="submit" class="btn btn-primary w-40 mr-auto">Atualizar Checklist</button>
                </div>
            </div>
        </form>
    </div>
    <!-- END: Personal Information -->
    <!-- END: Users Layout -->
    </div>
@endsection

@push('custom-scripts')





@endpush
