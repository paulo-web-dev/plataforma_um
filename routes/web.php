<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\AudioController;
use App\Http\Controllers\SetoresController;
use App\Http\Controllers\SubSetoresController;
use App\Http\Controllers\CargosController;
use App\Http\Controllers\DadosOrganizacionaisController;
use App\Http\Controllers\CaracteristicasController;
use App\Http\Controllers\PreDiagnosticoController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\MooreGargController;
use App\Http\Controllers\RulaController;
use App\Http\Controllers\OwasController;
use App\Http\Controllers\SueRodgersController;
use App\Http\Controllers\NioshController;
use App\Http\Controllers\PopulacaoController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\IntroducaoController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\ObjetivosController;
use App\Http\Controllers\RecomendacaoController;
use App\Http\Controllers\DisposicoesController;
use App\Http\Controllers\MapeamentoController;
use App\Http\Controllers\PlanoDeAcaoController;
use App\Http\Controllers\FotosAtividadesController;
use App\Http\Controllers\PopulacaoSubSetorController;
use App\Http\Controllers\ReponsaveisController;
use App\Http\Controllers\MetodologiaController;
use App\Http\Controllers\ConclusaoController;
use App\Http\Controllers\DadosSaudeController;
use App\Http\Controllers\DemandaController;
use App\Http\Controllers\AnaliseGlobalController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\FuncaoController;
use App\Http\Controllers\AnaliseAtividadeController;
use App\Http\Controllers\IdentidadeVisualController;
use App\Http\Controllers\DescricaoFotoController;
use App\Http\Controllers\ChecklistsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});


Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/upload/audio', [AudioController::class, 'uploadAudio'])->name('upload-audio');

//Rotas Perinentes a cadastro de empresas
Route::get('/empresas', [EmpresaController::class, 'show'])->name('show-empresas');
Route::get('/form/empresa', [EmpresaController::class, 'formempresa'])->name('formempresa');
Route::get('/info/empresa/{id}', [EmpresaController::class, 'infoempresa'])->name('infoempresa'); 
Route::post('/cadastrar/empresa', [EmpresaController::class, 'cadempresa'])->name('cadempresa');
Route::post('/update/empresa', [EmpresaController::class, 'updempresa'])->name('updempresa');
Route::post('/alteracao/ordem/setor', [EmpresaController::class, 'alteraordem'])->name('alteraordem-setor');
//Rotas Pertinentes a cadastro de Identidade visual 
Route::get('/identidades', [IdentidadeVisualController::class, 'show'])->name('show-identidade');
Route::get('/form/identidade-visual', [IdentidadeVisualController::class, 'formIdentidade'])->name('form-identidade');
Route::get('/info/identidade-visual/{id}', [IdentidadeVisualController::class, 'infoIdentidade'])->name('info-identidade'); 
Route::post('/cadastrar/identidade-visual', [IdentidadeVisualController::class, 'cadIdentidade'])->name('cad-identidade-visual');
Route::post('/update/identidade-visual', [IdentidadeVisualController::class, 'updIdentidade'])->name('upd-identidade-visual');


//Rotas Pertitentes a Áreas da empresa
Route::get('/areas', [AreaController::class, 'show'])->name('show-areas');
Route::get('/form/areas/{idempresa}', [AreaController::class, 'formAreas'])->name('form-areas');
Route::get('/info/areas/{id}', [AreaController::class, 'infoAreas'])->name('info-areas'); 
Route::get('/delete/areas/{id}', [AreaController::class, 'delete'])->name('delete-areas'); 
Route::post('/cadastrar/areas', [AreaController::class, 'cadAreas'])->name('cad-areas');
Route::post('/update/areas', [AreaController::class, 'updAreas'])->name('upd-areas');


//Rotas Pertitentes aos setores
Route::get('/setores', [SetoresController::class, 'show'])->name('show-setores');
Route::get('/form/setores/{idempresa}', [SetoresController::class, 'formSetores'])->name('form-setores');
Route::get('/info/setor/{id}', [SetoresController::class, 'infoSetores'])->name('info-setor'); 
Route::get('/delete/setor/{id}', [SetoresController::class, 'delete'])->name('delete-setor');
Route::post('/cadastrar/setor', [SetoresController::class, 'cadSetor'])->name('cad-setor');
Route::post('/update/setor', [SetoresController::class, 'updSetor'])->name('upd-setor');

//Rotas Pèrtinentes ao subsetores
Route::get('/subsetores', [SubSetoresController::class, 'show'])->name('show-subsetor');
Route::get('/form/subsetores/{idsetor}', [SubSetoresController::class, 'formSubSetores'])->name('form-subsetores');
Route::get('/info/subsetor/{id}', [SubSetoresController::class, 'infoSubSetores'])->name('info-subsetor'); 
Route::get('/delete/subsetor/{id}', [SubSetoresController::class, 'delete'])->name('delete-subsetor'); 
Route::post('/cadastrar/subsetor', [SubSetoresController::class, 'cadSubSetor'])->name('cad-subsetor');
Route::post('/update/subsetor', [SubSetoresController::class, 'updSubSetor'])->name('upd-subsetor');

//Rotas Pertinentes aos cargos
Route::get('/cargos', [CargosController::class, 'show'])->name('show-cargos');
Route::get('/form/cargos/{idsubsetor}', [CargosController::class, 'formCargos'])->name('form-cargos');
Route::get('/info/cargo/{id}', [CargosController::class, 'infoCargos'])->name('info-cargo'); 
Route::post('/cadastrar/cargo', [CargosController::class, 'cadCargo'])->name('cad-cargo');
Route::post('/update/cargo', [CargosController::class, 'updCargo'])->name('upd-cargo');

//Rotas Pertitentes as Funções
Route::get('/funcao', [FuncaoController::class, 'show'])->name('show-areas');
Route::get('/form/funcao/{id_subsetor}', [FuncaoController::class, 'formFuncao'])->name('form-funcao');
Route::get('/info/funcao/{id}', [FuncaoController::class, 'infoFuncao'])->name('info-funcao'); 
Route::get('/delete/funcao/{id}', [FuncaoController::class, 'delete'])->name('delete-funcao'); 
Route::post('/cadastrar/funcao', [FuncaoController::class, 'cadFuncao'])->name('cad-funcao');
Route::post('/update/funcao', [FuncaoController::class, 'updFuncao'])->name('upd-funcao');

//Rotas Pertitentes as Descrições de Foto
Route::get('/descricao-foto', [DescricaoFotoController::class, 'show'])->name('show-areas');
Route::get('/form/descricao-foto/{id_subsetor}', [DescricaoFotoController::class, 'formDescricaoFoto'])->name('form-descricao-foto');
Route::get('/info/descricao-foto/{id}', [DescricaoFotoController::class, 'infoDescricaoFoto'])->name('info-descricao-foto'); 
Route::get('/delete/descricao-foto/{id}', [DescricaoFotoController::class, 'delete'])->name('delete-descricao-foto'); 
Route::post('/cadastrar/descricao-foto', [DescricaoFotoController::class, 'cadDescricaoFoto'])->name('cad-descricao-foto');
Route::post('/update/descricao-foto', [DescricaoFotoController::class, 'updDescricaoFoto'])->name('upd-descricao-foto');


//Rotas Pertitentes as Tarefas
Route::get('/tarefas', [TarefaController::class, 'show'])->name('show-areas');
Route::get('/form/tarefas/{id_subsetor}', [TarefaController::class, 'formTarefa'])->name('form-tarefa');
Route::get('/info/tarefas/{id}', [TarefaController::class, 'infoTarefa'])->name('info-tarefa'); 
Route::get('/delete/tarefas/{id}', [TarefaController::class, 'delete'])->name('delete-tarefa'); 
Route::post('/cadastrar/tarefas', [TarefaController::class, 'cadTarefa'])->name('cad-tarefa');
Route::post('/update/tarefas', [TarefaController::class, 'updTarefa'])->name('upd-tarefa');

//Rotas Pertitentes a Ánalise de Atividade
Route::get('/analise-de-atividade', [AnaliseAtividadeController::class, 'show'])->name('show-areas');
Route::get('/form/analise-de-atividade/{id_subsetor}', [AnaliseAtividadeController::class, 'formAnaliseAtividade'])->name('form-analise-de-atividade');
Route::get('/info/analise-de-atividade/{id}', [AnaliseAtividadeController::class, 'infoAnaliseAtividade'])->name('info-analise-de-atividade');
Route::get('/delete/analise-de-atividade/{id}', [AnaliseAtividadeController::class, 'delete'])->name('delete-analise-de-atividade'); 
Route::post('/cadastrar/analise-de-atividade', [AnaliseAtividadeController::class, 'cadAnaliseAtividade'])->name('cad-analise-de-atividade');
Route::post('/update/analise-de-atividade', [AnaliseAtividadeController::class, 'updAnaliseAtividade'])->name('upd-analise-de-atividade');

//Rotas Pertinentes aos Dados Organizacionais
Route::get('/dadosorganizacionais', [DadosOrganizacionaisController::class, 'show'])->name('show-dadosorganizacionais');
Route::get('/form/dadosorganizacionais/{idsubsetor}', [DadosOrganizacionaisController::class, 'formDadosOrganizacionais'])->name('form-dadosorganizacionais');
Route::get('/info/dadosorganizacionais/{id}', [DadosOrganizacionaisController::class, 'infoDadosOrganizacionais'])->name('info-dadosorganizacionais'); 
Route::get('/delete/dadosorganizacionais/{id}', [DadosOrganizacionaisController::class, 'delete'])->name('delete-dadosorganizacionais'); 
Route::post('/cadastrar/dadosorganizacionais', [DadosOrganizacionaisController::class, 'cadDadosOrganizacionais'])->name('cad-dadosorganizacionais');
Route::post('/update/dadosorganizacionais', [DadosOrganizacionaisController::class, 'updDadosOrganizacionais'])->name('upd-dadosorganizacionais');

//Rotas Pèrtinentes as Caracteristicas Do Ambiente De Trabalho
Route::get('/caracteristicas', [CaracteristicasController::class, 'show'])->name('show-caracteristicas');
Route::get('/form/caracteristicas/{idsubsetor}', [CaracteristicasController::class, 'formCaracteristicas'])->name('form-caracteristicas');
Route::get('/info/caracteristicas/{id}', [CaracteristicasController::class, 'infoCaracteristicas'])->name('info-caracteristicas');
Route::get('/delete/caracteristicas/{id}', [CaracteristicasController::class, 'delete'])->name('delete-caracteristicas'); 
Route::post('/cadastrar/caracteristicas', [CaracteristicasController::class, 'cadCaracteristicas'])->name('cad-caracteristicas');
Route::post('/update/caracteristicas', [CaracteristicasController::class, 'updCaracteristicas'])->name('upd-caracteristicas');

//Rotas Pèrtinentes aos Pré diagnosticos
Route::get('/pre-diagnosticos', [PreDiagnosticoController::class, 'show'])->name('show-pre-diagnosticos');
Route::get('/form/pre-diagnosticos/{idsubsetor}', [PreDiagnosticoController::class, 'formPreDiagnostico'])->name('form-pre-diagnosticos');
Route::get('/info/pre-diagnosticos/{id}', [PreDiagnosticoController::class, 'infoPreDiagnostico'])->name('info-pre-diagnosticos'); 
Route::get('/delete/pre-diagnosticos/{id}', [PreDiagnosticoController::class, 'delete'])->name('delete-pre-diagnosticos'); 
Route::post('/cadastrar/pre-diagnosticos', [PreDiagnosticoController::class, 'cadPreDiagnostico'])->name('cad-pre-diagnosticos');
Route::post('/update/pre-diagnosticos', [PreDiagnosticoController::class, 'updPreDiagnostico'])->name('upd-pre-diagnosticos');

//Rotas pertinentes a conclusões idependentes
Route::get('/form/conlusao/{idsubsetor}/{ferramenta}', [ConclusaoController::class, 'formConclusao'])->name('form-conclusao');
Route::get('/info/conlusao/{conclusao}', [ConclusaoController::class, 'infoConclusao'])->name('info-conclusao');
Route::get('/delete/conlusao/{conclusao}', [ConclusaoController::class, 'delete'])->name('delete-conclusao');
Route::post('/cadastrar/conclusao', [ConclusaoController::class, 'cadConclusao'])->name('cad-conclusao');
Route::post('/upd/conclusao', [ConclusaoController::class, 'updConclusao'])->name('upd-conclusao');

//Rotas Pertinentes ao cadastro de Moore e Garg
Route::get('/moore', [MooreGargController::class, 'show'])->name('show-pre-diagnosticos');
Route::get('/form/moore/{idsubsetor}', [MooreGargController::class, 'formMoore'])->name('form-moore');
Route::get('/form/simplificado/moore/{idsubsetor}', [MooreGargController::class, 'formMooreSimplificado'])->name('form-moore-simplificado');
Route::get('/info/moore/{id}', [MooreGargController::class, 'infoMoore'])->name('info-moore'); 
Route::get('/delete/moore/{id}', [MooreGargController::class, 'delete'])->name('delete-moore'); 
Route::post('/cadastrar/moore', [MooreGargController::class, 'cadMoore'])->name('cad-moore');
Route::post('/cadastrar/simplificado/moore', [MooreGargController::class, 'cadMooreSimplificado'])->name('cad-moore-simplificado');
Route::post('/update/moore', [MooreGargController::class, 'updMoore'])->name('upd-moore');

//Rotas Pertinentes ao cadastro de Rula
Route::get('/rula', [RulaController::class, 'show'])->name('show-pre-diagnosticos');
Route::get('/form/rula/{idsubsetor}', [RulaController::class, 'formRula'])->name('form-rula');
Route::get('/info/rula/{id}', [RulaController::class, 'infoRula'])->name('info-rula'); 
Route::get('/delete/rula/{id}', [RulaController::class, 'delete'])->name('delete-rula'); 
Route::post('/cadastrar/rula', [RulaController::class, 'cadRula'])->name('cad-rula');
Route::post('/update/rula', [RulaController::class, 'updRula'])->name('upd-rula');

//Rotas Pertinentes ao cadastro de OWAS
Route::get('/owas', [OwasController::class, 'show'])->name('show-pre-diagnosticos');
Route::get('/form/owas/{idsubsetor}', [OwasController::class, 'formOwas'])->name('form-owas');
Route::get('/info/owas/{id}', [OwasController::class, 'infoOwas'])->name('info-owas'); 
Route::get('/delete/owas/{id}', [OwasController::class, 'delete'])->name('delete-owas'); 
Route::post('/cadastrar/owas', [OwasController::class, 'cadOwas'])->name('cad-owas');
Route::post('/update/owas', [OwasController::class, 'updOwas'])->name('upd-owas');


//Rotas Pertinentes ao cadastro de Sue Rodgers
Route::get('/suerodgers', [SueRodgersController::class, 'show'])->name('show-pre-diagnosticos');
Route::get('/form/suerodgers/{idsubsetor}', [SueRodgersController::class, 'formSueRodgers'])->name('form-suerodgers');
Route::get('/info/suerodgers/{id}', [SueRodgersController::class, 'infoSueRodgers'])->name('info-suerodgers'); 
Route::get('/delete/suerodgers/{id}', [SueRodgersController::class, 'delete'])->name('delete-sue'); 
Route::post('/cadastrar/suerodgers', [SueRodgersController::class, 'cadSueRodgers'])->name('cad-suerodgers');
Route::post('/update/suerodgers', [SueRodgersController::class, 'updSueRodgers'])->name('upd-suerodgers');

//Rotas Pertinentes ao cadatros de Niosh
Route::get('/niosh', [NioshController::class, 'show'])->name('show-pre-diagnosticos');
Route::get('/form/niosh/{idsubsetor}', [NioshController::class, 'formNiosh'])->name('form-niosh');
Route::get('/info/niosh/{id}', [NioshController::class, 'infoNiosh'])->name('info-niosh'); 
Route::get('/delete/niosh/{id}', [NioshController::class, 'delete'])->name('delete-niosh'); 
Route::post('/cadastrar/niosh', [NioshController::class, 'cadNiosh'])->name('cad-niosh');
Route::post('/update/niosh', [NioshController::class, 'updNiosh'])->name('upd-niosh');

//Rotas Pertinentes ao cadatros de Dados de Saúde
Route::get('/dados-de-saude', [DadosSaudeController::class, 'show'])->name('show-pre-diagnosticos');
Route::get('/form/dados-de-saude/{idsubsetor}', [DadosSaudeController::class, 'formDadosDeSaude'])->name('form-dados-de-saude');
Route::get('/info/dados-de-saude/{dado}', [DadosSaudeController::class, 'infoDadosDeSaude'])->name('info-dados-de-saude'); 
Route::get('/delete/dados-de-saude/{id}', [DadosSaudeController::class, 'delete'])->name('delete-dados-de-saude'); 
Route::post('/cadastrar/dados-de-saude', [DadosSaudeController::class, 'cadDadosDeSaude'])->name('cad-dados-de-saude');
Route::post('/update/dados-de-saude', [DadosSaudeController::class, 'updDadosDeSaude'])->name('upd-dados-de-saude');


//Rotas Pertinentes ao cadatros de Introdução
Route::get('/introducao', [IntroducaoController::class, 'show'])->name('show-pre-diagnosticos');
Route::get('/form/introducao/{empresa}', [IntroducaoController::class, 'formIntroducao'])->name('form-introducao');
Route::get('/info/introducao/{id}', [IntroducaoController::class, 'infoIntroducao'])->name('info-introducao'); 
Route::get('/delete/introducao/{id}', [IntroducaoController::class, 'delete'])->name('delete-introducao'); 
Route::post('/cadastrar/introducao', [IntroducaoController::class, 'cadIntroducao'])->name('cad-introducao');
Route::post('/update/introducao', [IntroducaoController::class, 'updIntroducao'])->name('upd-introducao');

//Rotas Pertinentes ao cadatros de Demanda
Route::get('/demanda', [DemandaController::class, 'show'])->name('show-pre-diagnosticos');
Route::get('/form/demanda/{empresa}', [DemandaController::class, 'formDemanda'])->name('form-demanda');
Route::get('/info/demanda/{demanda}', [DemandaController::class, 'infoDemanda'])->name('info-demanda'); 
Route::get('/delete/demanda/{id}', [DemandaController::class, 'delete'])->name('delete-demanda'); 
Route::post('/cadastrar/demanda', [DemandaController::class, 'cadDemanda'])->name('cad-demanda');
Route::post('/update/demanda', [DemandaController::class, 'updDemanda'])->name('upd-demanda');


//Rotas Pertinentes ao cadatros de Analise Global
Route::get('/analise-global', [AnaliseGlobalController::class, 'show'])->name('show-pre-diagnosticos');
Route::get('/form/analise-global/{empresa}', [AnaliseGlobalController::class, 'formAnaliseGlobal'])->name('form-analise-global');
Route::get('/info/analise-global/{analise}', [AnaliseGlobalController::class, 'infoAnaliseGlobal'])->name('info-analise-global'); 
Route::get('/delete/analise-global/{id}', [AnaliseGlobalController::class, 'delete'])->name('delete-analise-global'); 
Route::post('/cadastrar/analise-global', [AnaliseGlobalController::class, 'cadAnaliseGlobal'])->name('cad-analise-global');
Route::post('/update/analise-global', [AnaliseGlobalController::class, 'updAnaliseGlobal'])->name('upd-analise-global');

//Rotas Pertinentes ao cadatros de Metodologia
Route::get('/metodologia', [MetodologiaController::class, 'show'])->name('show-pre-diagnosticos');
Route::get('/form/metodologia/{empresa}', [MetodologiaController::class, 'formMetodologia'])->name('form-metodologia');
Route::get('/info/metodologia/{id}', [MetodologiaController::class, 'infoMetodologia'])->name('info-metodologia'); 
Route::get('/delete/metodologia/{id}', [MetodologiaController::class, 'delete'])->name('delete-metodologia');
Route::post('/cadastrar/metodologia', [MetodologiaController::class, 'cadMetodologia'])->name('cad-metodologia');
Route::post('/update/metodologia', [MetodologiaController::class, 'updMetodologia'])->name('upd-metodologia');


//Rotas Pertinentes ao cadatros de Equipe Técnica
Route::get('/equipe', [EquipeController::class, 'show'])->name('show-pre-diagnosticos');
Route::get('/form/equipe/{empresa}', [EquipeController::class, 'formEquipe'])->name('form-equipe');
Route::get('/info/equipe/{id}', [EquipeController::class, 'infoEquipe'])->name('info-equipe'); 
Route::get('/delete/equipe/{id}', [EquipeController::class, 'delete'])->name('delete-equipe'); 
Route::post('/cadastrar/equipe', [EquipeController::class, 'cadEquipe'])->name('cad-equipe');
Route::post('/update/equipe', [EquipeController::class, 'updEquipe'])->name('upd-equipe');

//Rotas Pertinentes ao cadatros de Objetivos
Route::get('/objetivo', [ObjetivosController::class, 'show'])->name('show-pre-diagnosticos');
Route::get('/form/objetivo/{empresa}', [ObjetivosController::class, 'formObjetivo'])->name('form-objetivo');
Route::get('/info/objetivo/{id}', [ObjetivosController::class, 'infoObjetivo'])->name('info-objetivo'); 
Route::get('/delete/objetivo/{id}', [ObjetivosController::class, 'delete'])->name('delete-objetivo'); 
Route::post('/cadastrar/objetivo', [ObjetivosController::class, 'cadObjetivo'])->name('cad-objetivo');
Route::post('/update/objetivo', [ObjetivosController::class, 'updObjetivo'])->name('upd-objetivo');

//Rotas Pertinentes ao cadatros de Recomendações Técnicas
Route::get('/recomendacao', [RecomendacaoController::class, 'show'])->name('show-pre-diagnosticos');
Route::get('/form/recomendacao/{id_subsetor}', [RecomendacaoController::class, 'formRecomendacao'])->name('form-recomendacao');
Route::get('/info/recomendacao/{id}', [RecomendacaoController::class, 'infoRecomendacao'])->name('info-recomendacao'); 
Route::get('/delete/recomendacao/{id}', [RecomendacaoController::class, 'delete'])->name('delete-recomendacao'); 
Route::post('/cadastrar/recomendacao', [RecomendacaoController::class, 'cadRecomendacao'])->name('cad-recomendacao');
Route::post('/update/recomendacao', [RecomendacaoController::class, 'updRecomendacao'])->name('upd-recomendacao');

//Rotas Pertinentes ao cadatros de Disposições Finais
Route::get('/disposicao', [DisposicoesController::class, 'show'])->name('show-pre-diagnosticos');
Route::get('/form/disposicao/{empresa}', [DisposicoesController::class, 'formDisposicao'])->name('form-disposicao');
Route::get('/info/disposicao/{id}', [DisposicoesController::class, 'infoDisposicao'])->name('info-disposicao'); 
Route::get('/delete/disposicao/{id}', [DisposicoesController::class, 'delete'])->name('delete-disposicao'); 
Route::post('/cadastrar/disposicao', [DisposicoesController::class, 'cadDisposicao'])->name('cad-disposicao');
Route::post('/update/disposicao', [DisposicoesController::class, 'updDisposicao'])->name('upd-disposicao');


//Rotas referente a upload de população 
Route::get('/form/populacao/{empresa}', [PopulacaoController::class, 'formPopulacao'])->name('form-populacao');
Route::post('/upload/populacao', [PopulacaoController::class, 'uploadPopulacao'])->name('upload-populacao');

//Rotas referente a upload de população de subsetor
Route::get('/form/subsetor/populacao/{id_subsetor}', [PopulacaoSubSetorController::class, 'formPopulacao'])->name('form-populacao-subsetor');
Route::get('/form/subsetor/campos/populacao/{id_subsetor}', [PopulacaoSubSetorController::class, 'formPopulacaoCampos'])->name('form-populacao-subsetor-campos');
Route::get('/info/subsetor/populacao/{id}', [PopulacaoSubSetorController::class, 'infoPopulacao'])->name('info-populacao-subsetor');
Route::get('/delete/subsetor/populacao/{id}', [PopulacaoSubSetorController::class, 'delete'])->name('delete-populacao-subsetor');
Route::post('/upload/subsetor/populacao', [PopulacaoSubSetorController::class, 'uploadPopulacao'])->name('upload-populacao-subsetor');
Route::post('/update/subsetor/populacao', [PopulacaoSubSetorController::class, 'updPopulacao'])->name('update-populacao-subsetor');
Route::post('/cad/subsetor/populacao', [PopulacaoSubSetorController::class, 'cadPopulacao'])->name('cad-populacao-subsetor');

//Rotas referente a upload de mapeamento ergonômico 
Route::get('/form/mapeamento/{empresa}', [MapeamentoController::class, 'formMapeamento'])->name('form-mapeamento');
Route::get('/form/campos/mapeamento/{empresa}', [MapeamentoController::class, 'formMapeamentocampos'])->name('form-mapeamento-campos');
Route::get('/info/mapeamento/{id}', [MapeamentoController::class, 'infoMapeamento'])->name('info-mapeamento');
Route::get('/delete/mapeamento/{id}', [MapeamentoController::class, 'delete'])->name('delete-mapeamento');
Route::post('/update/mapeamento', [MapeamentoController::class, 'updMapeamento'])->name('upd-mapeamento');
Route::post('/cadastrar/mapeamento', [MapeamentoController::class, 'cadMapeamento'])->name('cad-mapeamento');
Route::post('/upload/mapeamento', [MapeamentoController::class, 'uploadMapeamento'])->name('upload-mapeamento');

//Rotas referente a upload de plano de ação 
Route::get('/form/plano-de-acao/{empresa}', [PlanoDeAcaoController::class, 'formPlanoDeAcao'])->name('form-plano-de-acao');
Route::get('/form/campos/plano-de-acao/{empresa}', [PlanoDeAcaoController::class, 'formPlanoDeAcaoCampos'])->name('form-plano-de-acao-campos');
Route::get('/info/plano-de-acao/{id}', [PlanoDeAcaoController::class, 'infoPlanoDeAcao'])->name('info-plano-de-acao');
Route::post('/upload/plano-de-acao', [PlanoDeAcaoController::class, 'uploadPlanoDeAcao'])->name('upload-plano-de-acao');
Route::post('/cadastrar/plano-de-acao', [PlanoDeAcaoController::class, 'cadPlanoDeAcao'])->name('cad-plano-de-acao');
Route::post('/upd/plano-de-acao', [PlanoDeAcaoController::class, 'updPlanoDeAcao'])->name('upd-plano-de-acao');
Route::get('/delete/plano-de-acao/{id}', [PlanoDeAcaoController::class, 'delete'])->name('delete-plano-de-acao');

//Rotas referente a upload de fotos 
Route::get('/form/foto/{id_subsetor}', [FotosAtividadesController::class, 'formFoto'])->name('form-foto');
Route::post('/upload/foto', [FotosAtividadesController::class, 'uploadFoto'])->name('upload-foto');
Route::get('/delete/foto/{foto}', [FotosAtividadesController::class, 'deleteFoto'])->name('delete-foto');
 
//Rotas referentes ao controle de responsáveis 

Route::get('/responsaveis', [ReponsaveisController::class, 'show'])->name('show-setores');
Route::get('/form/responsaveis/{id_empresa}', [ReponsaveisController::class, 'formResponsaveis'])->name('form-responsaveis');
Route::get('/info/responsaveis/{id}', [ReponsaveisController::class, 'infoResponsaveis'])->name('info-responsaveis'); 
Route::get('/delete/responsaveis/{id}', [ReponsaveisController::class, 'delete'])->name('delete-responsaveis');
Route::post('/cadastrar/responsaveis', [ReponsaveisController::class, 'cadResponsaveis'])->name('cad-responsaveis');
Route::post('/update/responsaveis', [ReponsaveisController::class, 'updResponsaveis'])->name('upd-responsaveis');

//Rotas Pertinentes ao cadastro de Checklists
Route::get('/checklists', [ChecklistsController::class, 'show'])->name('show-pre-diagnosticos');
Route::get('/form/checklists/{idempresa}', [ChecklistsController::class, 'formChecklists'])->name('form-checklists');
Route::get('/info/checklists/{id}', [ChecklistsController::class, 'infoChecklists'])->name('info-checklists'); 
Route::get('/delete/checklists/{idempresa}', [ChecklistsController::class, 'delete'])->name('delete-checklists'); 
Route::post('/cadastrar/checklists', [ChecklistsController::class, 'cadChecklists'])->name('cad-checklists');
Route::post('/update/checklists', [ChecklistsController::class, 'updChecklists'])->name('upd-checklists');

//Rotas referentes ao relatório

Route::get('/relatorio/{id}', [RelatorioController::class, 'gerarRelatorio'])->name('gera-relatorio');
Route::get('/laravel-version', function() {
    $laravel = app();
    return "Your Laravel version is ".$laravel::VERSION;
});
require __DIR__.'/auth.php';
