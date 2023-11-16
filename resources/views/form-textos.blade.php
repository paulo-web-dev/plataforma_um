@extends('layouts.header')

@section('content')
<!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Cadastro de Textos Padrão
            </h2>
        <a href="{{ route('home') }}" class="btn btn-primary shadow-md mr-2"><i data-feather="skip-back" class="w-4 h-4 mr-2"></i>Voltar</a>
        </div>

        <form action="{{ route('cad-textos') }}" enctype="multipart/form-data" data-single="true" method="post">
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
                    <input type="hidden" name="id_empresa" value="">
                    <div class="col-span-12 xl:col-span-6">
                     
                   
                         <div class="mt-3"  id="link">
                            <label for="update-profile-form-7" class="form-label"><strong><a href="javascript:;" data-theme="light" class="tooltip"  title="Este Texto será o padrão, para assim que cadastrar uma noa empresa para a AET, ele será cadastrado junto para economizar tempo :)">Introdução </a> </strong></label>
                            <textarea class="form-control editor" name="introducao" id="editor" cols="30" rows="15" required>
Podemos definir ergonomia como o estudo científico das relações entre homem e
máquina, visando uma segurança e eficiência ideal no modo como um e outro
interagem. Também pode ser definida como o trabalho multidisciplinar que,
baseado num conjunto de ciências e tecnologias, procura o ajuste mútuo entre o
ser humano em seu ambiente de trabalho de forma confortável, produtiva e
segura, basicamente procurando adaptar o trabalho às pessoas (Couto, 2007).
Sendo também um conjunto de estudos que visam à organização metódica do
trabalho e das relações entre o homem e a máquina.
Este trabalho tem o objetivo de levantar dados para análise ergonômica do
trabalho nos ambientes da empresa, visando à integridade física e a saúde dos
trabalhadores, analisandos agentes ergonômicos peculiares à atividade
desenvolvida. A Legislação Brasileira, por meio da Secretaria de Segurança e
Saúde no Trabalho, do Ministério do Trabalho, estabelece através da Portaria nº.
3.751/90 a Norma Regulamentadora número 17, parâmetros sobre Ergonomia e
a obrigatoriedade da realização de uma análise ergonômica do trabalho. Segundo
Ferro (2008), a análise Ergonômica do Trabalho se propõe à realização de uma
análise das atividades em uma organização, tendo como pressuposto o que o
trabalhador faz em todo o processo produtivo, identificando os riscos
ergonômicos em que o mesmo se encontra exposto.
Para sobreviver dentro de um mercado globalizado, as empresas tornam-se mais
competitivas, dessa forma, a Ergonomia apresenta-se como uma estratégia para
otimizar as condições de trabalho, minimizando os efeitos nocivos a saúde física
e mental dos colaboradores e com isso, proporcionando maior participação dos
mesmos em suas organizações.
Um projeto ergonômico do posto de trabalho proporciona benefícios para a
melhoria da qualidade e da competitividade das empresas, além de levar em
consideração a preservação da saúde física, mental e social dos colaboradores,
harmonizando a relação entre capital, trabalho e qualidade de vida. Ambientes
de trabalho com projetos inadequados promovem a redução da eficiência, da
Operação e da qualidade, consequentemente, oneram os custos da Operação e
ainda aumentam o absenteísmo no setor.
O presente trabalho foi elaborado pelo método de observação visual dos postos
de trabalho, que foram posteriormente estudados e transformados em relatório,
com considerações e constatações que corrigidas irão melhorar substancialmente
as condições ergonômicas na realização das tarefas na empresa.
Visa, portanto, à ergonomia do posto de trabalho, verificar as exigências
biomecânicas posturais do trabalhador (boa postura, ferramentas e objetos ao
alcance dos movimentos corporais) e o esforço físico exigido (fator mais
importante, pois revela índice elevado de afastamento nas indústrias e outros
setores), o tempo gasto na operação, a repetitividade dos movimentos, os
acidentes na execução de tarefas, dores generalizadas para a execução das
tarefas, principalmente nos músculos e tendões; as condições do ambiente de
trabalho (iluminação, ruído, temperatura, etc., que possam causar sobrecarga ao
trabalhador); transporte, armazenamento e levantamento de cargas,
preocupando-se com a interface.
                            </textarea>
                        </div>

                        
                         <div class="mt-3"  id="link">
                            <label for="update-profile-form-7" class="form-label"><strong><a href="javascript:;" data-theme="light" class="tooltip"  title="Este Texto será o padrão, para assim que cadastrar uma noa empresa para a AET, ele será cadastrado junto para economizar tempo :)">Equipe </a> </strong></label>
                            <textarea class="form-control editor" name="equipe" id="equipe" cols="30" rows="15" required>
                                O trabalho de levantamento físico e a elaboração deste documento foram realizados pela equipe técnica formada pela Sr. "xxxxx", Fisioterapeuta – CREFITO 'xxxx'
                            </textarea>
                        </div>

                       <div class="mt-3"  id="link">
                            <label for="update-profile-form-7" class="form-label"><strong><a href="javascript:;" data-theme="light" class="tooltip"  title="Este Texto será o padrão, para assim que cadastrar uma noa empresa para a AET, ele será cadastrado junto para economizar tempo :)">Disposições Finais </a> </strong></label>
                            <textarea class="form-control editor" name="disposicao" id="disposicao" cols="30" rows="15" required>
                               <p>Os postos de trabalho analisados apresentam oportunidades de melhorias conforme descrição na análise. Devido às características do posto de trabalho e das atividades, constatou-se fatores que necessitam de modificações.</p><p>As recomendações do relatório seguem o princípio da correção dos pontos críticos e devem ser analisadas quanto a sua viabilidade, e substituídos caso necessário.</p><p>Os benefícios da implementação de melhorias ergonômicas estão diretamente ligados ao bem-estar dos usuários, bem como a possíveis ganhos de produtividade e qualidade de vida para o trabalhador.</p><p>&nbsp;</p><p><strong>RESPONSABILIDADES</strong></p><p>De posse das informações a empresa '.$empresa->nome.'., sendo responsável pela implantação das melhorias, compromete-se a cumprir as ações estabelecidas de acordo com a identificação dos riscos no ambiente de trabalho.</p>
                            </textarea>
                        </div>

                        <div class="mt-3"  id="link">
                            <label for="update-profile-form-7" class="form-label"><strong><a href="javascript:;" data-theme="light" class="tooltip"  title="Este Texto será o padrão, para assim que cadastrar uma noa empresa para a AET, ele será cadastrado junto para economizar tempo :)">Metodologia </a> </strong></label>
                            <textarea class="form-control editor" name="metodologia" id="metodologia" cols="30" rows="15" required>
                               <p>A Análise Ergonômica do Trabalho é realizada por função e tarefa, através de técnica e metodologia específica, a partir da observação sistemática do ambiente laboral, da identificação do processo, da análise das atividades e da caracterização dos fatores biomecânicos, possibilitando &nbsp;assim, levantar os riscos existentes gerando recomendações de ações de melhorias à empresa. A metodologia de trabalho baseia-se:</p><p>&nbsp;</p><p><strong>MÉTODOS UTILIZADOS:</strong></p><p>OBSERVAÇÕES IN LOCO E FOTOS – ANÁLISE DA ATIVIDADE</p><p>A fim de se obter informações complementares e a confirmação dos dados obtidos até o momento registrados, foi realizada a observação dos trabalhadores em seus próprios postos de trabalho, de forma aleatória e durante um dia normal de trabalho. Foram observados os modos operatórios, o conteúdo das tarefas, o ritmo de trabalho, as exigências cognitivas.<br><br>MODO OPERATÓRIO – Observa neste item quais movimentos são realizados para completar o ciclo do trabalho (no início, meio e no fim da tarefa). Como na empresa existem tarefas diversificadas fizemos uma análise por setor e por atividade.<br><br><strong>CONTEÚDO DAS TAREFAS</strong> – Designa o modo como o trabalhador percebe as condições de seu trabalho: estimulante, monótono, aquém de suas capacidades, socialmente importante e outros. Na empresa alguns consideraram o trabalho monótono principalmente os que geram repetitividade, com grau leve de dificuldade e boa colaboração entre os funcionários.<br><strong>RITMO DE TRABALHO</strong> – Existe uma distinção entre ritmo e cadência. A cadência tem um aspecto quantitativo, o ritmo qualitativo. A cadência refere-se à velocidade dos movimentos quase repete em uma dada unidade de tempo, o ritmo é a maneira como as cadências são ajustadas ou arranjadas: pode ser livre (quando o indivíduo tem autonomia para determinar sua própria cadência) ou imposto (por uma máquina, pela esteira da linha de montagem e até por incentivos à Operação) - Teiger, 1985. Na empresa encontramos: o trabalho livre.<br><strong>EXIGÊNCIAS COGNITIVAS</strong> – Detectamos que quanto ao conhecimento, à percepção para a realização das atividades, a maioria dos colaboradores tinha um bom preparo para a efetivação do trabalho</p>
                            </textarea>
                        </div>
                    
                <div class="flex justify-end mt-4">
                    <button type="submit" class="btn btn-primary w-40 mr-auto">Cadastrar Textos Padrões</button>
                </div>
            </div>
        </form>
    </div>
    <!-- END: Personal Information -->
    <!-- END: Users Layout -->
    </div>

    
<script>
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );

                                
                        ClassicEditor
                                .create( document.querySelector( '#equipe' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );

                        ClassicEditor
                                .create( document.querySelector( '#disposicao' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );

                            ClassicEditor
                                .create( document.querySelector( '#metodologia' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script> 
@endsection

@push('custom-scripts')





@endpush
