@include('layouts.header-arp')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title mb-0">Editar Empresa: {{ $empresa->nome }}</h4>
                            <a href="{{ route('show-empresasarp') }}" class="btn btn-light btn-sm">
                                <i class="mdi mdi-arrow-left me-1"></i> Voltar
                            </a>
                            <a href="{{ route('form-arp', ['id' => $empresa->id]) }}"
                                class="btn btn-primary w-full shadow-md flex items-center justify-center gap-2">
                                 <i data-feather="plus" class="w-4 h-4"></i>
                                 Gerar Link para Pesquisa ARP
                             </a>
                        </div>
                        <p class="card-description"> Atualize as informações da Empresa </p>

                        {{-- Exibição de Erros --}}
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Rota de atualização passando o ID --}}
                        <form class="forms-sample" action="{{ route('updempresaarp') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST') {{-- Necessário para edição no Laravel --}}
                            <input type ="hidden" name = "id" value = "{{$empresa->id}}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome" value="{{ $empresa->nome }}" placeholder="Nome da empresa" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="CNPJ">CNPJ</label>
                                        <input type="number" class="form-control" id="CNPJ" name="cnpj" value="{{ $empresa->cnpj }}" placeholder="CNPJ da empresa" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telefone">Telefone</label>
                                        <input type="number" class="form-control" id="telefone" name="telefone" value="{{ $empresa->telefone }}" placeholder="Contato empresarial" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="setor">Ramo de Atividade</label>
                                        <input type="text" class="form-control" id="setor" name="setor" value="{{ $empresa->setor }}" placeholder="Setor" required>
                                    </div>
                                </div>
                            </div>

                        

                            <h4 class="card-title mt-4">Endereço</h4>
                            <p class="card-description"> Localização da empresa </p>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="cep">CEP</label>
                                        <input type="text" class="form-control" id="cep" name="cep" value="{{ $empresa->cep }}" placeholder="CEP" onblur="pesquisacep(this.value);" required>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="rua">Rua</label>
                                        <input type="text" class="form-control" id="rua" name="rua" value="{{ $empresa->rua }}" placeholder="Rua" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="numero">Número</label>
                                        <input type="text" class="form-control" id="numero" name="num" value="{{ $empresa->numero }}" placeholder="Nº" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="bairro">Bairro</label>
                                        <input type="text" class="form-control" id="bairro" name="bairro" value="{{ $empresa->bairro }}" placeholder="Bairro" required>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="cidade">Cidade</label>
                                        <input type="text" class="form-control" id="cidade" name="cidade" value="{{ $empresa->cidade }}" placeholder="Cidade" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="uf">Estado</label>
                                        <select class="form-control" name="uf" id="uf">
                                            @php
                                                $estados = ['AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO'];
                                            @endphp
                                            <option value="">UF</option>
                                            @foreach($estados as $uf)
                                                <option value="{{ $uf }}" {{ $empresa->estado == $uf ? 'selected' : '' }}>{{ $uf }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary me-2">Salvar Alterações</button>
                                <a href="{{ route('show-empresasarp') }}" class="btn btn-light">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h4 class="card-title mb-0">Lista de Áreas</h4>
                                <a href="{{ route('form-areas-arp', ['idempresa' => $empresa->id]) }}" class="btn btn-primary btn-sm">
                                    <i class="mdi mdi-plus me-1"></i> Cadastrar Área
                                </a>
                            </div>
            
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Área</th>
                                            <th class="text-center">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($empresa->area as $area) 
                                            <tr>
                                                <td>{{$area->id}}</td>
                                                <td>{{$area->nome}}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('info-areas-arp', ['id' => $area->id]) }}" 
                                                       class="btn btn-outline-primary btn-sm">
                                                        <i class="mdi mdi-lead-pencil me-1"></i> Editar
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach 
                                        @if($area->setores->isEmpty())
                                            <tr>
                                                <td colspan="3" class="text-center text-muted">Nenhum setor cadastrado para esta área.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(!empty($mediasGerais))

{{-- Dicionário de Sugestões (Mantido conforme seu original) --}}
@php
    $sugestoesDict = [
        0 => [
        'Leve' => 'Realizar campanhas educativas sobre respeito mútuo e promover treinamentos periódicos de comunicação não violenta para todos os colaboradores.',
        'Moderado' => 'Implementar treinamentos obrigatórios sobre comunicação não violenta, criar e divulgar canais de denúncia confidenciais, e realizar rodas de conversa para prevenção de conflitos.',
        'Sério' => 'Adotar medidas disciplinares conforme política interna, garantir proteção e apoio psicológico às vítimas, e realizar investigação formal dos casos reportados.',
        'Severo' => 'Acionar imediatamente o setor jurídico e órgãos competentes, afastar preventivamente os envolvidos, garantir suporte integral às vítimas e revisar políticas de compliance e tolerância zero.'
    ],
    1 => [
        'Leve' => 'Incentivar o reconhecimento informal por meio de feedbacks positivos e celebrações de pequenas conquistas em reuniões de equipe.',
        'Moderado' => 'Estruturar um programa formal de reconhecimento, com critérios claros e comunicação transparente, incluindo premiações e destaque em canais internos.',
        'Sério' => 'Revisar políticas de carreira e remuneração, criar planos de desenvolvimento individual e realizar pesquisas de satisfação para identificar lacunas de reconhecimento.',
        'Severo' => 'Elaborar um plano de recuperação de confiança, implementar ações de retenção de talentos e realizar reuniões individuais para escuta ativa e reconstrução do vínculo organizacional.'
    ],
    2 => [
        'Leve' => 'Promover iniciativas de integração, como cafés da manhã e grupos de escuta, para fortalecer o senso de pertencimento.',
        'Moderado' => 'Implementar programas de mentoring e grupos de apoio, além de disponibilizar canais de acolhimento para dúvidas e dificuldades pessoais.',
        'Sério' => 'Acionar o RH para acompanhamento individualizado, oferecer suporte psicológico e monitorar casos de isolamento social.',
        'Severo' => 'Adotar medidas de proteção, como afastamento temporário de envolvidos em conflitos graves, e garantir acompanhamento profissional especializado.'
    ],
   3 => [
        'Leve' => 'Aprimorar o fluxo de informações com reuniões regulares e atualização de murais ou canais digitais internos.',
        'Moderado' => 'Estabelecer canais formais de comunicação, como newsletters e reuniões de alinhamento, e implementar rotinas de feedback estruturado.',
        'Sério' => 'Realizar auditoria dos processos de comunicação, criar um plano de crise e treinar líderes para comunicação assertiva em situações delicadas.',
        'Severo' => 'Reestruturar os processos de comunicação interna, substituir ou capacitar lideranças e adotar ferramentas digitais para garantir transparência e agilidade.'
    ],
    4 => [
        'Leve' => 'Oferecer capacitação básica em liderança e coaching para líderes, focando em escuta ativa e gestão de pessoas.',
        'Moderado' => 'Desenvolver programas de desenvolvimento de competências de liderança, com avaliações periódicas de desempenho e feedbacks 360º.',
        'Sério' => 'Elaborar planos de melhoria para líderes com desempenho insatisfatório ou realizar substituição, conforme avaliação de resultados.',
        'Severo' => 'Aplicar medidas disciplinares, revisar a governança e, se necessário, reestruturar a equipe de liderança para garantir alinhamento com os valores organizacionais.'
    ],
   5 => [
        'Leve' => 'Estabelecer rotinas de feedback informal entre líderes e equipes, incentivando a troca construtiva de percepções.',
        'Moderado' => 'Implementar avaliações de desempenho formais, definir metas SMART e promover reuniões periódicas de acompanhamento.',
        'Sério' => 'Revisar processos de avaliação, realizar calibragem dos resultados e capacitar avaliadores para garantir justiça e transparência.',
        'Severo' => 'Contratar auditoria externa para revisar processos de avaliação e cargos, corrigindo distorções e promovendo equidade.'
    ],
   6 => [
        'Leve' => 'Realizar pequenos ajustes de benefícios de baixo custo e comunicar claramente as vantagens oferecidas aos colaboradores.',
        'Moderado' => 'Realizar benchmarking de mercado, ajustar benefícios para manter competitividade e envolver colaboradores na escolha de novos benefícios.',
        'Sério' => 'Revisar a política salarial, criar um plano de compensação estruturado e comunicar as mudanças de forma transparente.',
        'Severo' => 'Negociar pacotes de retenção, abrir diálogo com representantes sindicais e, se necessário, iniciar negociação coletiva.'
    ],
    7 => [
        'Leve' => 'Realizar inspeções periódicas e treinamentos básicos de segurança para todos os colaboradores.',
        'Moderado' => 'Conduzir auditoria de segurança, implementar melhorias na infraestrutura e atualizar equipamentos de proteção.',
        'Sério' => 'Investigar incidentes, aplicar medidas corretivas imediatas e reforçar treinamentos obrigatórios conforme normas regulamentadoras.',
        'Severo' => 'Suspender atividades de risco, garantir conformidade legal e acionar órgãos fiscalizadores quando necessário.'
    ],
    8 => [
        'Leve' => 'Ajustar rotinas de trabalho, priorizar tarefas e promover reuniões de alinhamento para evitar sobrecarga.',
        'Moderado' => 'Redistribuir tarefas, revisar metas e prazos, e implementar ferramentas de gestão de tempo.',
        'Sério' => 'Reestruturar equipes, contratar reforços e revisar processos para equilibrar a carga de trabalho.',
        'Severo' => 'Investigar casos de burnout, oferecer suporte de saúde mental e adotar medidas emergenciais para redução da carga.'
    ],
 9 => [
        'Leve' => 'Realizar manutenção preventiva e oferecer suporte técnico para resolução rápida de problemas.',
        'Moderado' => 'Investir em atualização tecnológica, substituir equipamentos obsoletos e treinar colaboradores para uso eficiente.',
        'Sério' => 'Realizar substituição urgente de equipamentos críticos e implementar planos de contingência para continuidade das operações.',
        'Severo' => 'Conduzir auditoria de TI, reforçar a segurança da informação e revisar políticas de acesso e uso de ferramentas.'
    ],
    10 => [
        'Leve' => 'Padronizar processos e documentar procedimentos operacionais para garantir clareza e previsibilidade.',
        'Moderado' => 'Otimizar processos, automatizar tarefas repetitivas e revisar fluxos para eliminar gargalos.',
        'Sério' => 'Revisar completamente os processos, promover treinamentos específicos e monitorar a aderência às novas práticas.',
        'Severo' => 'Contratar consultoria externa para reengenharia de processos e implementar mudanças estruturais com acompanhamento especializado.'
    ],
   11 => [
        'Leve' => 'Definir KPIs simples para acompanhamento do clima e desempenho das equipes.',
        'Moderado' => 'Estabelecer metas SMART, utilizar ferramentas como 5W2H e realizar reuniões periódicas de acompanhamento.',
        'Sério' => 'Conduzir auditoria dos resultados, ajustar indicadores e promover reuniões de alinhamento para correção de desvios.',
        'Severo' => 'Solicitar avaliação externa, publicar relatório público de resultados e implementar plano de ação corretivo com acompanhamento independente.'
    ],
    12 => [
        'Leve' => 'Oferecer microtreinamentos e workshops temáticos para atualização contínua dos colaboradores.',
        'Moderado' => 'Implementar trilhas de desenvolvimento e incentivar certificações profissionais relevantes.',
        'Sério' => 'Elaborar planos de desenvolvimento individual (PDI) e acompanhar a evolução dos colaboradores com feedbacks regulares.',
        'Severo' => 'Promover programas de requalificação e recolocação, apoiando a transição de carreira dos colaboradores afetados.'
    ],
    13 => [
        'Leve' => 'Reforçar os valores organizacionais em campanhas de comunicação interna e eventos corporativos.',
        'Moderado' => 'Realizar workshops de alinhamento cultural, promover debates sobre missão, visão e valores.',
        'Sério' => 'Revisar missão, visão e valores da empresa, envolvendo colaboradores no processo de redefinição.',
        'Severo' => 'Implementar programa de transformação cultural, com liderança exemplar e acompanhamento de indicadores de engajamento.'
    ],
    14 => [
        'Leve' => 'Reforçar os valores organizacionais em campanhas de comunicação interna e eventos corporativos.',
        'Moderado' => 'Realizar workshops de alinhamento cultural, promover debates sobre missão, visão e valores.',
        'Sério' => 'Revisar missão, visão e valores da empresa, envolvendo colaboradores no processo de redefinição.',
        'Severo' => 'Implementar programa de transformação cultural, com liderança exemplar e acompanhamento de indicadores de engajamento.'
    ],
    15 => [
        'Leve' => 'Reforçar os valores organizacionais em campanhas de comunicação interna e eventos corporativos.',
        'Moderado' => 'Realizar workshops de alinhamento cultural, promover debates sobre missão, visão e valores.',
        'Sério' => 'Revisar missão, visão e valores da empresa, envolvendo colaboradores no processo de redefinição.',
        'Severo' => 'Implementar programa de transformação cultural, com liderança exemplar e acompanhamento de indicadores de engajamento.'
    ],
  
    ];
@endphp

<div class="row mt-4">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title mb-0">Resultados Consolidados (Geral)</h4>
                    <a href="{{route('dashboardempresaarpn', ['id' => $empresa->id])}}" class="btn btn-primary btn-sm shadow-sm">
                        <i class="mdi mdi-chart-bar me-1"></i> Ver Dashboard ARP
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover mt-3">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-center">Categoria</th>
                                <th class="text-center">Média</th>
                                <th class="text-center">Severidade</th>
                                <th class="text-center">Risco</th>
                                <th class="text-left">Plano de Ação Sugerido</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mediasGerais as $dado)
                                <tr>
                                    <td class="text-center font-weight-bold">{{ $dado['categoria'] }}</td>
                                    <td class="text-center">{{ number_format($dado['media'], 2, ',', '.') }}</td>
                                    
                                    {{-- Lógica de Nível e Cores --}}
                                    <td class="text-center">
                                        @php
                                            $corClasse = 'bg-secondary';
                                            $nivelKey = $dado['nivel']; 

                                            if ($dado['nivel'] === 'Leve') { $corClasse = 'bg-success text-white'; }
                                            elseif ($dado['nivel'] === 'Moderado') { $corClasse = 'bg-warning text-dark'; }
                                            elseif ($dado['nivel'] === 'Sério') { $corClasse = 'bg-orange text-white'; $style="background-color: #f97316;"; }
                                            else { $corClasse = 'bg-danger text-white'; $nivelKey = 'Severo'; }
                                        @endphp
                                        <label class="badge {{ $corClasse }}" @if($dado['nivel'] === 'Sério') style="background-color: #f97316; color: white;" @endif>
                                            {{ $dado['nivel'] }}
                                        </label>
                                    </td>

                                    <td class="text-center text-capitalize">
                                        @php
                                            $riscos = ['Leve' => 'Insignificante', 'Moderado' => 'Baixo', 'Sério' => 'Alto'];
                                            $risco = $riscos[$dado['nivel']] ?? 'Severo';
                                        @endphp 
                                        {{ $risco }}
                                    </td>

                                    <td class="text-left py-3">
                                        @php
                                            $idxArr = min($loop->index, 15);
                                            $fraseSugestao = $sugestoesDict[$idxArr][$nivelKey] ?? 'Sem diagnóstico definido.';
                                        @endphp
                                        <small class="text-muted" style="line-height: 1.4; display: block;">
                                            {{ $fraseSugestao }}
                                        </small>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- TABELAS POR SETOR --}}
<div class="row">
    @foreach($mediasPorSetor as $setor => $dadosDoSetor)
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-header bg-white pt-4">
                <h5 class="card-title mb-0">
                    <i class="mdi mdi-account-group text-primary me-2"></i>
                    Setor: <span class="text-primary">{{ $setor }}</span>
                    <span class="text-muted small ms-2">({{ $dadosDoSetor['totalParticipantes'] }} respondente(s))</span>
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">Categoria</th>
                                <th class="text-center">Média</th>
                                <th class="text-center">Nível</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dadosDoSetor['medias'] as $dado)
                                <tr>
                                    <td class="text-center">{{ $dado['categoria'] }}</td>
                                    <td class="text-center font-weight-bold">{{ number_format($dado['media'], 2, ',', '.') }}</td>
                                    <td class="text-center">
                                        @php
                                            $corSetor = 'bg-secondary';
                                            if ($dado['nivel'] === 'Leve') $corSetor = 'bg-success';
                                            elseif ($dado['nivel'] === 'Moderado') $corSetor = 'bg-warning';
                                            elseif ($dado['nivel'] === 'Sério') $corSetor = 'bg-orange';
                                            else $corSetor = 'bg-danger';
                                        @endphp
                                        <label class="badge {{ $corSetor }} text-white" @if($dado['nivel'] === 'Sério') style="background-color: #f97316;" @endif>
                                            {{ $dado['nivel'] }}
                                        </label>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="3" class="text-center p-4">Nenhum dado encontrado</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@else
<div class="row mt-4">
    <div class="col-12 text-center">
        <div class="alert alert-light border p-5">
            <i class="mdi mdi-database-off mdi-48px text-muted"></i>
            <p class="mt-3">Nenhum resultado de pesquisa encontrado para esta empresa.</p>
        </div>
    </div>
</div>
@endif
        </div>
    </div>
</div>

{{-- Mantive seus scripts de CEP e File Upload --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.getElementById('file').onchange = function() {
        var input = this;
        var fileName = input.value.split('\\').pop();
        var textInput = document.querySelector('.file-upload-info');
        if(textInput) { textInput.value = fileName; }
    };

    function limpa_formulário_cep() {
        document.getElementById('rua').value = ("");
        document.getElementById('bairro').value = ("");
        document.getElementById('cidade').value = ("");
        document.getElementById('uf').value = ("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            document.getElementById('rua').value = (conteudo.logradouro);
            document.getElementById('bairro').value = (conteudo.bairro);
            document.getElementById('cidade').value = (conteudo.localidade);
            document.getElementById('uf').value = (conteudo.uf);
        } else {
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacep(valor) {
        var cep = valor.replace(/\D/g, '');
        if (cep != "") {
            var validacep = /^[0-9]{8}$/;
            if (validacep.test(cep)) {
                document.getElementById('rua').value = "...";
                document.getElementById('bairro').value = "...";
                document.getElementById('cidade').value = "...";
                document.getElementById('uf').value = "...";
                var script = document.createElement('script');
                script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';
                document.body.appendChild(script);
            } else {
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        }
    }
</script>
<div>
@include('layouts.footer-arp')