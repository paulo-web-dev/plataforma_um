      
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