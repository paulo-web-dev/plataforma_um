<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChecklistApoioPes;
use App\Models\ChecklistCadeira;
use App\Models\ChecklistComputador;
use App\Models\ChecklistDocumentos;
use App\Models\ChecklistIluminacao;
use App\Models\ChecklistLeiaute;
use App\Models\ChecklistMesa;
use App\Models\ChecklistMonitor;
use App\Models\ChecklistNotebook;
use App\Models\ChecklistSistema;
use App\Models\ChecklistSuporteTeclado;
use App\Models\ChecklistTeclado;
use Illuminate\Support\Facades\Schema;
class ChecklistsController extends Controller
{

    public function formChecklists($idempresa){
   
        return view('form-checklists',[
            'idempresa' => $idempresa,
    ]);

    return redirect()->route('infoempresa', ['id' => $request->id_empresa]); 
    }

    
    public function infoChecklists($idempresa){
        
        $checklistApoioPes = ChecklistApoioPes::where('id_empresa', $idempresa)->first();
        $checklistCadeira = ChecklistCadeira::where('id_empresa', $idempresa)->first();
        $checklistComputador = ChecklistComputador::where('id_empresa', $idempresa)->first();
        $checklistDocumentos = ChecklistDocumentos::where('id_empresa', $idempresa)->first();
        $checklistIluminacao = ChecklistIluminacao::where('id_empresa', $idempresa)->first();
        $checklistLeiaute = ChecklistLeiaute::where('id_empresa', $idempresa)->first();
        $checklistMesa = ChecklistMesa::where('id_empresa', $idempresa)->first();
        $checklistMonitor = ChecklistMonitor::where('id_empresa', $idempresa)->first();
        $checklistSistema = ChecklistSistema::where('id_empresa', $idempresa)->first();
        $checklistSuporteTeclado = ChecklistSuporteTeclado::where('id_empresa', $idempresa)->first();
        $checklistTeclado = ChecklistTeclado::where('id_empresa', $idempresa)->first();
        $checklistNotebook = ChecklistNotebook::where('id_empresa', $idempresa)->first();
        return view('info-checklists', [
            'idempresa' => $idempresa,
            'checklistApoioPes' => $checklistApoioPes,
            'checklistCadeira' => $checklistCadeira,
            'checklistComputador' => $checklistComputador,
            'checklistDocumentos' => $checklistDocumentos,
            'checklistIluminacao' => $checklistIluminacao,
            'checklistLeiaute' => $checklistLeiaute,
            'checklistMesa' => $checklistMesa,
            'checklistMonitor' => $checklistMonitor,
            'checklistSistema' => $checklistSistema,
            'checklistSuporteTeclado' => $checklistSuporteTeclado,
            'checklistTeclado' => $checklistTeclado,
            'checklistNotebook' => $checklistNotebook,
        ]);
    }

    public function cadChecklists(Request $request){
         
        $checklistCadeira = new ChecklistCadeira();
        $checklistCadeira->id_empresa = $request->idempresa;
        $checklistCadeira->cadeira_estofada = $request->cadeira_estofada=== 'on' ? 1 : 0;
        $checklistCadeira->estofado_espessura_maciez = $request->estofado_espessura_maciez=== 'on' ? 1 : 0;
        $checklistCadeira->tecido_transpiracao = $request->tecido_transpiracao=== 'on' ? 1 : 0;
        $checklistCadeira->altura_regulavel = $request->altura_regulavel=== 'on' ? 1 : 0;
        $checklistCadeira->acionamento_regulagem_altura = $request->acionamento_regulagem_altura=== 'on' ? 1 : 0;
        $checklistCadeira->altura_compativel = $request->altura_compativel=== 'on' ? 1 : 0;
        $checklistCadeira->largura_dimensao_correta = $request->largura_dimensao_correta=== 'on' ? 1 : 0;
        $checklistCadeira->assento_horizontal = $request->assento_horizontal=== 'on' ? 1 : 0;
        $checklistCadeira->assento_plano = $request->assento_plano=== 'on' ? 1 : 0;
        $checklistCadeira->borda_anterior_arredondada = $request->borda_anterior_arredondada=== 'on' ? 1 : 0;
        $checklistCadeira->apoio_dorsal_regulagem = $request->apoio_dorsal_regulagem=== 'on' ? 1 : 0;
        $checklistCadeira->apoio_dorsal_suporte_firme = $request->apoio_dorsal_suporte_firme=== 'on' ? 1 : 0;
        $checklistCadeira->apoio_dorsal_curvaturas_coluna = $request->apoio_dorsal_curvaturas_coluna=== 'on' ? 1 : 0;
        $checklistCadeira->altura_apoio_dorsal = $request->altura_apoio_dorsal=== 'on' ? 1 : 0;
        $checklistCadeira->espaco_nadegas = $request->espaco_nadegas=== 'on' ? 1 : 0;
        $checklistCadeira->giratoria = $request->giratoria=== 'on' ? 1 : 0;
        $checklistCadeira->rodizios_duros_leves = $request->rodizios_duros_leves=== 'on' ? 1 : 0;
        $checklistCadeira->bracos_regulaveis = $request->bracos_regulaveis=== 'on' ? 1 : 0;
        $checklistCadeira->bracos_aproximacao_trabalhador = $request->bracos_aproximacao_trabalhador=== 'on' ? 1 : 0;
        $checklistCadeira->mecanismo_conforto = $request->mecanismo_conforto=== 'on' ? 1 : 0;
        $checklistCadeira->mecanismos_funcionando_bem = $request->mecanismos_funcionando_bem=== 'on' ? 1 : 0;
        $checklistCadeira->save();

        $checklistMesa = new ChecklistMesa();
        $checklistMesa->id_empresa = $request->idempresa;
        $checklistMesa->tipo_movel_adequado = $request->has('tipo_movel_adequado') ? 1 : 0;
        $checklistMesa->altura_apropriada = $request->has('altura_apropriada') ? 1 : 0;
        $checklistMesa->regulagem_altura = $request->has('regulagem_altura') ? 1 : 0;
        $checklistMesa->borda_anterior_arredondada = $request->has('borda_anterior_arredondada') ? 1 : 0;
        $checklistMesa->dimensoes_apropriadas = $request->has('dimensoes_apropriadas') ? 1 : 0;
        $checklistMesa->material_nao_reflexivo = $request->has('material_nao_reflexivo') ? 1 : 0;
        $checklistMesa->espaco_pernas_alto = $request->has('espaco_pernas_alto') ? 1 : 0;
        $checklistMesa->espaco_pernas_profundo = $request->has('espaco_pernas_profundo') ? 1 : 0;
        $checklistMesa->espaco_pernas_largo = $request->has('espaco_pernas_largo') ? 1 : 0;
        $checklistMesa->facilidade_entrada_saida = $request->has('facilidade_entrada_saida') ? 1 : 0;
        $checklistMesa->ajuste_altura_tela_monitor = $request->has('ajuste_altura_tela_monitor') ? 1 : 0;
        $checklistMesa->facilidade_ajuste_altura = $request->has('facilidade_ajuste_altura') ? 1 : 0;
        $checklistMesa->ajuste_monitor_frente_tras = $request->has('ajuste_monitor_frente_tras') ? 1 : 0;
        $checklistMesa->facilidade_ajuste_frente_tras = $request->has('facilidade_ajuste_frente_tras') ? 1 : 0;
        $checklistMesa->espaco_objeto_pessoal = $request->has('espaco_objeto_pessoal') ? 1 : 0;
        $checklistMesa->organizacao_fios = $request->has('organizacao_fios') ? 1 : 0;
        $checklistMesa->outro_mecanismo_conforto = $request->has('outro_mecanismo_conforto') ? 1 : 0;
        $checklistMesa->save();

        $checklistSuporteTeclado = new ChecklistSuporteTeclado();
        $checklistSuporteTeclado->id_empresa = $request->idempresa;
        $checklistSuporteTeclado->altura_regulavel = $request->has('altura_regulavel') ? 1 : 0;
        $checklistSuporteTeclado->regulagem_facil = $request->has('regulagem_facil') ? 1 : 0;
        $checklistSuporteTeclado->dimensoes_apropriadas = $request->has('dimensoes_apropriadas') ? 1 : 0;
        $checklistSuporteTeclado->largura_teclado_ajustavel = $request->has('largura_teclado_ajustavel') ? 1 : 0;
        $checklistSuporteTeclado->amortecimento_vibracoes_sons = $request->has('amortecimento_vibracoes_sons') ? 1 : 0;
        $checklistSuporteTeclado->espaco_pernas_alto = $request->has('espaco_pernas_alto') ? 1 : 0;
        $checklistSuporteTeclado->espaco_pernas_profundo = $request->has('espaco_pernas_profundo') ? 1 : 0;
        $checklistSuporteTeclado->espaco_pernas_largo = $request->has('espaco_pernas_largo') ? 1 : 0;
        $checklistSuporteTeclado->facilidade_entrada_saida = $request->has('facilidade_entrada_saida') ? 1 : 0;
        $checklistSuporteTeclado->apoio_arredondado_carpo = $request->has('apoio_arredondado_carpo') ? 1 : 0;
        $checklistSuporteTeclado->quina_viva_ocasionar_acidente = $request->has('quina_viva_ocasionar_acidente') ? 1 : 0;
        $checklistSuporteTeclado->save();

        $checklistApoioPes = new ChecklistApoioPes();
        $checklistApoioPes->id_empresa = $request->idempresa;
        $checklistApoioPes->largura_suficiente = $request->has('largura_suficiente') ? 1 : 0;
        $checklistApoioPes->altura_regulavel = $request->has('altura_regulavel') ? 1 : 0;
        $checklistApoioPes->inclinação_ajustavel = $request->has('inclinação_ajustavel') ? 1 : 0;
        $checklistApoioPes->movimento_frente_tras = $request->has('movimento_frente_tras') ? 1 : 0;
        $checklistApoioPes->desliza_facilmente = $request->has('desliza_facilmente') ? 1 : 0;
        $checklistApoioPes->save();     
        
        $checklistDocumentos = new ChecklistDocumentos();
        $checklistDocumentos->id_empresa = $request->idempresa;
        $checklistDocumentos->ajuste_altura_distancia_angulo = $request->has('ajuste_altura_distancia_angulo') ? 1 : 0;
        $checklistDocumentos->facilidade_ajuste = $request->has('facilidade_ajuste') ? 1 : 0;
        $checklistDocumentos->retencao_fixacao_documento = $request->has('retencao_fixacao_documento') ? 1 : 0;
        $checklistDocumentos->prevencao_vibracoes = $request->has('prevencao_vibracoes') ? 1 : 0;
        $checklistDocumentos->espaco_suficiente_documento = $request->has('espaco_suficiente_documento') ? 1 : 0;
        $checklistDocumentos->posicao_proxima_angulo_visao = $request->has('posicao_proxima_angulo_visao') ? 1 : 0;
        $checklistDocumentos->save();

        $checklistTeclado = new ChecklistTeclado();
        $checklistTeclado->id_empresa = $request->idempresa;
        $checklistTeclado->fino = $request->has('fino') ? 1 : 0;
        $checklistTeclado->macio = $request->has('macio') ? 1 : 0;
        $checklistTeclado->teclas_dimensoes_corretas = $request->has('teclas_dimensoes_corretas') ? 1 : 0;
        $checklistTeclado->configuracao_ABNT = $request->has('configuracao_ABNT') ? 1 : 0;
        $checklistTeclado->formato_nao_tradicional = $request->has('formato_nao_tradicional') ? 1 : 0;
        $checklistTeclado->save();

        $checklistMonitor = new ChecklistMonitor();
        $checklistMonitor->id_empresa = $request->idempresa;
        $checklistMonitor->monitor_frente_trabalhador = $request->has('monitor_frente_trabalhador') ? 1 : 0;
        $checklistMonitor->altura_adequada = $request->has('altura_adequada') ? 1 : 0;
        $checklistMonitor->regulagem_altura_facil = $request->has('regulagem_altura_facil') ? 1 : 0;
        $checklistMonitor->inclinação_facil = $request->has('inclinação_facil') ? 1 : 0;
        $checklistMonitor->controle_brilho_contraste = $request->has('controle_brilho_contraste') ? 1 : 0;
        $checklistMonitor->tremores_tela = $request->has('tremores_tela') ? 1 : 0;
        $checklistMonitor->imagem_claramente_definida = $request->has('imagem_claramente_definida') ? 1 : 0;
        $checklistMonitor->freq_renovacao_imagem_ajustavel = $request->has('freq_renovacao_imagem_ajustavel') ? 1 : 0;
        $checklistMonitor->monitor_fosco = $request->has('monitor_fosco') ? 1 : 0;
        $checklistMonitor->monitor_plano = $request->has('monitor_plano') ? 1 : 0;
        $checklistMonitor->save();

        $checklistComputador = new ChecklistComputador();
        $checklistComputador->id_empresa = $request->idempresa;
        $checklistComputador->espaco_excessivo = $request->has('espaco_excessivo') ? 1 : 0;
        $checklistComputador->transmite_calor_radiante = $request->has('transmite_calor_radiante') ? 1 : 0;
        $checklistComputador->nivel_excessivo_ruido = $request->has('nivel_excessivo_ruido') ? 1 : 0;
        $checklistComputador->save();

        $checklistNotebook = new ChecklistNotebook();
        $checklistNotebook->id_empresa = $request->idempresa;
        $checklistNotebook->suporte_tela_teclado_mouse = $request->has('suporte_tela_teclado_mouse') ? 1 : 0;
        $checklistNotebook->leve = $request->has('leve') ? 1 : 0;
        $checklistNotebook->teclas_separadas = $request->has('teclas_separadas') ? 1 : 0;
        $checklistNotebook->teclado_notebook_configuracao = $request->has('teclado_notebook_configuracao') ? 1 : 0;
        $checklistNotebook->teclas_dimensoes = $request->has('teclas_dimensoes') ? 1 : 0;
        $checklistNotebook->tela_dimensoes = $request->has('tela_dimensoes') ? 1 : 0;
        $checklistNotebook->dispositivos_midia = $request->has('dispositivos_midia') ? 1 : 0;
        $checklistNotebook->save();

        $checklistLeiaute = new ChecklistLeiaute();
        $checklistLeiaute->id_empresa = $request->idempresa;
        $checklistLeiaute->posicao_correta = $request->has('posicao_correta') ? 1 : 0;
        $checklistLeiaute->area_minima = $request->has('area_minima') ? 1 : 0;
        $checklistLeiaute->distancia_terminal_operador = $request->has('distancia_terminal_operador') ? 1 : 0;
        $checklistLeiaute->tomadas_altura = $request->has('tomadas_altura') ? 1 : 0;
        $checklistLeiaute->acesso_dispositivos = $request->has('acesso_dispositivos') ? 1 : 0;
        $checklistLeiaute->fator_contracao_estatica = $request->has('fator_contracao_estatica') ? 1 : 0;
        $checklistLeiaute->headset_disponivel = $request->has('headset_disponivel') ? 1 : 0;
        $checklistLeiaute->interferencias_posicionamento = $request->has('interferencias_posicionamento') ? 1 : 0;
        $checklistLeiaute->alterna_postura_de_pe = $request->has('alterna_postura_de_pe') ? 1 : 0;
        $checklistLeiaute->clima_adequado = $request->has('clima_adequado') ? 1 : 0;
        $checklistLeiaute->nivel_sonoro_apropriado = $request->has('nivel_sonoro_apropriado') ? 1 : 0;
        $checklistLeiaute->save();

        $checklistSistema = new ChecklistSistema();
        $checklistSistema->id_empresa = $request->idempresa;
        $checklistSistema->pausa_10_minutos_cada_50_minutos = $request->has('pausa_10_minutos_cada_50_minutos') ? 1 : 0;
        $checklistSistema->pausa_digitacao_8000_toques_por_hora = $request->has('pausa_digitacao_8000_toques_por_hora') ? 1 : 0;
        $checklistSistema->pausa_10_minutos_cada_2_horas = $request->has('pausa_10_minutos_cada_2_horas') ? 1 : 0;
        $checklistSistema->save(); 
        
        $checklistIluminacao = new ChecklistIluminacao();
        $checklistIluminacao->id_empresa = $request->idempresa;
        $checklistIluminacao->iluminacao_lux = $request->has('iluminacao_lux') ? 1 : 0;
        $checklistIluminacao->iluminacao_suplementar_mais_45_anos = $request->has('iluminacao_suplementar_mais_45_anos') ? 1 : 0;
        $checklistIluminacao->visao_livre_reflexos = $request->has('visao_livre_reflexos') ? 1 : 0;
        $checklistIluminacao->fontes_deslumbramento_fora_visao = $request->has('fontes_deslumbramento_fora_visao') ? 1 : 0;
        $checklistIluminacao->postos_trabalho_posicionados_lado_janelas = $request->has('postos_trabalho_posicionados_lado_janelas') ? 1 : 0;
        $checklistIluminacao->janelas_persianas_cortinas = $request->has('janelas_persianas_cortinas') ? 1 : 0;
        $checklistIluminacao->brilho_piso_baixo = $request->has('brilho_piso_baixo') ? 1 : 0;
        $checklistIluminacao->legibilidade_documento_satisfatoria = $request->has('legibilidade_documento_satisfatoria') ? 1 : 0;
        $checklistIluminacao->save();
        return redirect()->route('infoempresa', ['id' => $request->id_empresa]); 
    } 


    public function updChecklists(Request $request){
         
        $checklistApoioPes = ChecklistApoioPes::where('id_empresa', $request->idempresa)->first();
        $checklistCadeira = ChecklistCadeira::where('id_empresa', $request->idempresa)->first();
        $checklistComputador = ChecklistComputador::where('id_empresa', $request->idempresa)->first();
        $checklistDocumentos = ChecklistDocumentos::where('id_empresa', $request->idempresa)->first();
        $checklistIluminacao = ChecklistIluminacao::where('id_empresa', $request->idempresa)->first();
        $checklistLeiaute = ChecklistLeiaute::where('id_empresa', $request->idempresa)->first();
        $checklistMesa = ChecklistMesa::where('id_empresa', $request->idempresa)->first();
        $checklistMonitor = ChecklistMonitor::where('id_empresa', $request->idempresa)->first();
        $checklistSistema = ChecklistSistema::where('id_empresa', $request->idempresa)->first();
        $checklistSuporteTeclado = ChecklistSuporteTeclado::where('id_empresa', $request->idempresa)->first();
        $checklistTeclado = ChecklistTeclado::where('id_empresa', $request->idempresa)->first();
        $checklistNotebook = ChecklistNotebook::where('id_empresa', $request->idempresa)->first();
        
        $checklistCadeira->id_empresa = $request->idempresa;
        $checklistCadeira->cadeira_estofada = $request->cadeira_estofada=== 'on' ? 1 : 0;
        $checklistCadeira->estofado_espessura_maciez = $request->estofado_espessura_maciez=== 'on' ? 1 : 0;
        $checklistCadeira->tecido_transpiracao = $request->tecido_transpiracao=== 'on' ? 1 : 0;
        $checklistCadeira->altura_regulavel = $request->altura_regulavel=== 'on' ? 1 : 0;
        $checklistCadeira->acionamento_regulagem_altura = $request->acionamento_regulagem_altura=== 'on' ? 1 : 0;
        $checklistCadeira->altura_compativel = $request->altura_compativel=== 'on' ? 1 : 0;
        $checklistCadeira->largura_dimensao_correta = $request->largura_dimensao_correta=== 'on' ? 1 : 0;
        $checklistCadeira->assento_horizontal = $request->assento_horizontal=== 'on' ? 1 : 0;
        $checklistCadeira->assento_plano = $request->assento_plano=== 'on' ? 1 : 0;
        $checklistCadeira->borda_anterior_arredondada = $request->borda_anterior_arredondada=== 'on' ? 1 : 0;
        $checklistCadeira->apoio_dorsal_regulagem = $request->apoio_dorsal_regulagem=== 'on' ? 1 : 0;
        $checklistCadeira->apoio_dorsal_suporte_firme = $request->apoio_dorsal_suporte_firme=== 'on' ? 1 : 0;
        $checklistCadeira->apoio_dorsal_curvaturas_coluna = $request->apoio_dorsal_curvaturas_coluna=== 'on' ? 1 : 0;
        $checklistCadeira->altura_apoio_dorsal = $request->altura_apoio_dorsal=== 'on' ? 1 : 0;
        $checklistCadeira->espaco_nadegas = $request->espaco_nadegas=== 'on' ? 1 : 0;
        $checklistCadeira->giratoria = $request->giratoria=== 'on' ? 1 : 0;
        $checklistCadeira->rodizios_duros_leves = $request->rodizios_duros_leves=== 'on' ? 1 : 0;
        $checklistCadeira->bracos_regulaveis = $request->bracos_regulaveis=== 'on' ? 1 : 0;
        $checklistCadeira->bracos_aproximacao_trabalhador = $request->bracos_aproximacao_trabalhador=== 'on' ? 1 : 0;
        $checklistCadeira->mecanismo_conforto = $request->mecanismo_conforto=== 'on' ? 1 : 0;
        $checklistCadeira->mecanismos_funcionando_bem = $request->mecanismos_funcionando_bem=== 'on' ? 1 : 0;
        $checklistCadeira->save();

       
        $checklistMesa->id_empresa = $request->idempresa;
        $checklistMesa->tipo_movel_adequado = $request->has('tipo_movel_adequado') ? 1 : 0;
        $checklistMesa->altura_apropriada = $request->has('altura_apropriada') ? 1 : 0;
        $checklistMesa->regulagem_altura = $request->has('regulagem_altura') ? 1 : 0;
        $checklistMesa->borda_anterior_arredondada = $request->has('borda_anterior_arredondada') ? 1 : 0;
        $checklistMesa->dimensoes_apropriadas = $request->has('dimensoes_apropriadas') ? 1 : 0;
        $checklistMesa->material_nao_reflexivo = $request->has('material_nao_reflexivo') ? 1 : 0;
        $checklistMesa->espaco_pernas_alto = $request->has('espaco_pernas_alto') ? 1 : 0;
        $checklistMesa->espaco_pernas_profundo = $request->has('espaco_pernas_profundo') ? 1 : 0;
        $checklistMesa->espaco_pernas_largo = $request->has('espaco_pernas_largo') ? 1 : 0;
        $checklistMesa->facilidade_entrada_saida = $request->has('facilidade_entrada_saida') ? 1 : 0;
        $checklistMesa->ajuste_altura_tela_monitor = $request->has('ajuste_altura_tela_monitor') ? 1 : 0;
        $checklistMesa->facilidade_ajuste_altura = $request->has('facilidade_ajuste_altura') ? 1 : 0;
        $checklistMesa->ajuste_monitor_frente_tras = $request->has('ajuste_monitor_frente_tras') ? 1 : 0;
        $checklistMesa->facilidade_ajuste_frente_tras = $request->has('facilidade_ajuste_frente_tras') ? 1 : 0;
        $checklistMesa->espaco_objeto_pessoal = $request->has('espaco_objeto_pessoal') ? 1 : 0;
        $checklistMesa->organizacao_fios = $request->has('organizacao_fios') ? 1 : 0;
        $checklistMesa->outro_mecanismo_conforto = $request->has('outro_mecanismo_conforto') ? 1 : 0;
        $checklistMesa->save();

       
        $checklistSuporteTeclado->id_empresa = $request->idempresa;
        $checklistSuporteTeclado->altura_regulavel = $request->has('altura_regulavel') ? 1 : 0;
        $checklistSuporteTeclado->regulagem_facil = $request->has('regulagem_facil') ? 1 : 0;
        $checklistSuporteTeclado->dimensoes_apropriadas = $request->has('dimensoes_apropriadas') ? 1 : 0;
        $checklistSuporteTeclado->largura_teclado_ajustavel = $request->has('largura_teclado_ajustavel') ? 1 : 0;
        $checklistSuporteTeclado->amortecimento_vibracoes_sons = $request->has('amortecimento_vibracoes_sons') ? 1 : 0;
        $checklistSuporteTeclado->espaco_pernas_alto = $request->has('espaco_pernas_alto') ? 1 : 0;
        $checklistSuporteTeclado->espaco_pernas_profundo = $request->has('espaco_pernas_profundo') ? 1 : 0;
        $checklistSuporteTeclado->espaco_pernas_largo = $request->has('espaco_pernas_largo') ? 1 : 0;
        $checklistSuporteTeclado->facilidade_entrada_saida = $request->has('facilidade_entrada_saida') ? 1 : 0;
        $checklistSuporteTeclado->apoio_arredondado_carpo = $request->has('apoio_arredondado_carpo') ? 1 : 0;
        $checklistSuporteTeclado->quina_viva_ocasionar_acidente = $request->has('quina_viva_ocasionar_acidente') ? 1 : 0;
        $checklistSuporteTeclado->save();

       
        $checklistApoioPes->id_empresa = $request->idempresa;
        $checklistApoioPes->largura_suficiente = $request->has('largura_suficiente') ? 1 : 0;
        $checklistApoioPes->altura_regulavel = $request->has('altura_regulavel') ? 1 : 0;
        $checklistApoioPes->inclinação_ajustavel = $request->has('inclinação_ajustavel') ? 1 : 0;
        $checklistApoioPes->movimento_frente_tras = $request->has('movimento_frente_tras') ? 1 : 0;
        $checklistApoioPes->desliza_facilmente = $request->has('desliza_facilmente') ? 1 : 0;
        $checklistApoioPes->save();     
        
       
        $checklistDocumentos->id_empresa = $request->idempresa;
        $checklistDocumentos->ajuste_altura_distancia_angulo = $request->has('ajuste_altura_distancia_angulo') ? 1 : 0;
        $checklistDocumentos->facilidade_ajuste = $request->has('facilidade_ajuste') ? 1 : 0;
        $checklistDocumentos->retencao_fixacao_documento = $request->has('retencao_fixacao_documento') ? 1 : 0;
        $checklistDocumentos->prevencao_vibracoes = $request->has('prevencao_vibracoes') ? 1 : 0;
        $checklistDocumentos->espaco_suficiente_documento = $request->has('espaco_suficiente_documento') ? 1 : 0;
        $checklistDocumentos->posicao_proxima_angulo_visao = $request->has('posicao_proxima_angulo_visao') ? 1 : 0;
        $checklistDocumentos->save();

        
        $checklistTeclado->id_empresa = $request->idempresa;
        $checklistTeclado->fino = $request->has('fino') ? 1 : 0;
        $checklistTeclado->macio = $request->has('macio') ? 1 : 0;
        $checklistTeclado->teclas_dimensoes_corretas = $request->has('teclas_dimensoes_corretas') ? 1 : 0;
        $checklistTeclado->configuracao_ABNT = $request->has('configuracao_ABNT') ? 1 : 0;
        $checklistTeclado->formato_nao_tradicional = $request->has('formato_nao_tradicional') ? 1 : 0;
        $checklistTeclado->save();

        
        $checklistMonitor->id_empresa = $request->idempresa;
        $checklistMonitor->monitor_frente_trabalhador = $request->has('monitor_frente_trabalhador') ? 1 : 0;
        $checklistMonitor->altura_adequada = $request->has('altura_adequada') ? 1 : 0;
        $checklistMonitor->regulagem_altura_facil = $request->has('regulagem_altura_facil') ? 1 : 0;
        $checklistMonitor->inclinação_facil = $request->has('inclinação_facil') ? 1 : 0;
        $checklistMonitor->controle_brilho_contraste = $request->has('controle_brilho_contraste') ? 1 : 0;
        $checklistMonitor->tremores_tela = $request->has('tremores_tela') ? 1 : 0;
        $checklistMonitor->imagem_claramente_definida = $request->has('imagem_claramente_definida') ? 1 : 0;
        $checklistMonitor->freq_renovacao_imagem_ajustavel = $request->has('freq_renovacao_imagem_ajustavel') ? 1 : 0;
        $checklistMonitor->monitor_fosco = $request->has('monitor_fosco') ? 1 : 0;
        $checklistMonitor->monitor_plano = $request->has('monitor_plano') ? 1 : 0;
        $checklistMonitor->save();

        
        $checklistComputador->id_empresa = $request->idempresa;
        $checklistComputador->espaco_excessivo = $request->has('espaco_excessivo') ? 1 : 0;
        $checklistComputador->transmite_calor_radiante = $request->has('transmite_calor_radiante') ? 1 : 0;
        $checklistComputador->nivel_excessivo_ruido = $request->has('nivel_excessivo_ruido') ? 1 : 0;
        $checklistComputador->save();

        
        $checklistComputador->id_empresa = $request->idempresa;
        $checklistComputador->espaco_excessivo = $request->has('espaco_excessivo') ? 1 : 0;
        $checklistComputador->transmite_calor_radiante = $request->has('transmite_calor_radiante') ? 1 : 0;
        $checklistComputador->nivel_excessivo_ruido = $request->has('nivel_excessivo_ruido') ? 1 : 0;
        $checklistComputador->save();

        
        $checklistLeiaute->id_empresa = $request->idempresa;
        $checklistLeiaute->posicao_correta = $request->has('posicao_correta') ? 1 : 0;
        $checklistLeiaute->area_minima = $request->has('area_minima') ? 1 : 0;
        $checklistLeiaute->distancia_terminal_operador = $request->has('distancia_terminal_operador') ? 1 : 0;
        $checklistLeiaute->tomadas_altura = $request->has('tomadas_altura') ? 1 : 0;
        $checklistLeiaute->acesso_dispositivos = $request->has('acesso_dispositivos') ? 1 : 0;
        $checklistLeiaute->fator_contracao_estatica = $request->has('fator_contracao_estatica') ? 1 : 0;
        $checklistLeiaute->headset_disponivel = $request->has('headset_disponivel') ? 1 : 0;
        $checklistLeiaute->interferencias_posicionamento = $request->has('interferencias_posicionamento') ? 1 : 0;
        $checklistLeiaute->alterna_postura_de_pe = $request->has('alterna_postura_de_pe') ? 1 : 0;
        $checklistLeiaute->clima_adequado = $request->has('clima_adequado') ? 1 : 0;
        $checklistLeiaute->nivel_sonoro_apropriado = $request->has('nivel_sonoro_apropriado') ? 1 : 0;
        $checklistLeiaute->save();

        
        $checklistSistema->id_empresa = $request->idempresa;
        $checklistSistema->pausa_10_minutos_cada_50_minutos = $request->has('pausa_10_minutos_cada_50_minutos') ? 1 : 0;
        $checklistSistema->pausa_digitacao_8000_toques_por_hora = $request->has('pausa_digitacao_8000_toques_por_hora') ? 1 : 0;
        $checklistSistema->pausa_10_minutos_cada_2_horas = $request->has('pausa_10_minutos_cada_2_horas') ? 1 : 0;
        $checklistSistema->save(); 
        
        
        $checklistIluminacao->id_empresa = $request->idempresa;
        $checklistIluminacao->iluminacao_lux = $request->has('iluminacao_lux') ? 1 : 0;
        $checklistIluminacao->iluminacao_suplementar_mais_45_anos = $request->has('iluminacao_suplementar_mais_45_anos') ? 1 : 0;
        $checklistIluminacao->visao_livre_reflexos = $request->has('visao_livre_reflexos') ? 1 : 0;
        $checklistIluminacao->fontes_deslumbramento_fora_visao = $request->has('fontes_deslumbramento_fora_visao') ? 1 : 0;
        $checklistIluminacao->postos_trabalho_posicionados_lado_janelas = $request->has('postos_trabalho_posicionados_lado_janelas') ? 1 : 0;
        $checklistIluminacao->janelas_persianas_cortinas = $request->has('janelas_persianas_cortinas') ? 1 : 0;
        $checklistIluminacao->brilho_piso_baixo = $request->has('brilho_piso_baixo') ? 1 : 0;
        $checklistIluminacao->legibilidade_documento_satisfatoria = $request->has('legibilidade_documento_satisfatoria') ? 1 : 0;
        $checklistIluminacao->save();

        $checklistNotebook->id_empresa = $request->idempresa;
        $checklistNotebook->suporte_tela_teclado_mouse = $request->has('suporte_tela_teclado_mouse') ? 1 : 0;
        $checklistNotebook->leve = $request->has('leve') ? 1 : 0;
        $checklistNotebook->teclas_separadas = $request->has('teclas_separadas') ? 1 : 0;
        $checklistNotebook->teclado_notebook_configuracao = $request->has('teclado_notebook_configuracao') ? 1 : 0;
        $checklistNotebook->teclas_dimensoes = $request->has('teclas_dimensoes') ? 1 : 0;
        $checklistNotebook->tela_dimensoes = $request->has('tela_dimensoes') ? 1 : 0;
        $checklistNotebook->dispositivos_midia = $request->has('dispositivos_midia') ? 1 : 0;
        $checklistNotebook->save();

        return redirect()->route('infoempresa', ['id' => $request->idempresa]); 

    } 
}
