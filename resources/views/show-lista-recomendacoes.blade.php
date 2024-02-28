@extends('layouts.header')
<style>
.menubutton{
    margin:5px;
}
</style>
@section('content')
<!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
              Lista de recomendações técnicas predefinidas
            </h2>
              <a href="{{ route('show-empresas') }}" class="btn btn-primary shadow-md mr-2"><i data-feather="skip-back" class="w-4 h-4 mr-2"></i>Voltar</a>
        </div>

       
  <!-- Lista de Função -->
    <div class="intro-y box mt-5" id="função">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                <a href="javascript:;" data-theme="light" class="tooltip"  title="Função que o trabalhador exerce. Ex: Retificador C">Função<i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a>
            </h2>
        </div>
        <div class="p-5">
            <div class="grid grid-cols-12 gap-x-5">
                <div class="col-span-12 xl:col-span-12">
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Recomendação</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Ações</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                             
                                @foreach($recomendacoes as $recomendacao)
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$recomendacao->id}}</td>
                                        <td class="border">{{$recomendacao->recomendacao}}</td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('recomendacao', ['id' => $recomendacao->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>

                                               <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                   href="{{route('delete-lista-recomendacoes', ['id' => $recomendacao->id])}}">
                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Excluir
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                                      
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <a href="{{route('form-lista-recomendacoes')}}" class="btn btn-primary mr-auto mb-2">Cadastrar Lista de recomendações</a>
            </div>    
        </div>
    </div>
    </div>
    
    </div>
<!-- Inicialize a ordenação -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Obtenha a tabela e o tbody usando os IDs
        var table = document.getElementById('sortable-table-recomendacoes');
        var tbody = document.getElementById('sortable-tbody-recomendacoes');

        // Inicialize o Sortable
        var sortable = new Sortable(tbody, {
            animation: 150,
            ghostClass: 'bg-gray-300',
            onEnd: function (evt) {
                // Atualize os IDs após a ordenação
                updateIds();
                sendAjaxRequest();
            },
        });

        // Função para atualizar os IDs
        function updateIds() {
            var rows = tbody.getElementsByTagName('tr');

            // Atualize os IDs com base na nova ordem
            for (var i = 0; i < rows.length; i++) {
                var idCell = rows[i].getElementsByTagName('td')[3];
                idCell.textContent = i + 1; // Atualiza o ID
            }
        }
      
    // Função para enviar uma solicitação AJAX
        function sendAjaxRequest() {
            var rows = tbody.getElementsByTagName('tr');
            var data = [];

            // Construa um array de objetos com id e nome
            for (var i = 0; i < rows.length; i++) {
                var id = rows[i].getElementsByTagName('td')[0].textContent;
                var ordenacao = rows[i].getElementsByTagName('td')[3].textContent;
                data.push({ id: id, ordenacao: ordenacao });
            }
            console.log(data);
        

            axios.post('/alteracao/ordem/recomendacao', { data: data,  _token: '{{ csrf_token() }}', })
                .then(function (response) {
                    console.log( response);
                })
                .catch(function (error) {
                    console.error('Erro ao enviar a solicitação', error);
                });
                
        }

        
    });
</script>
@if (session()->get('message') == 'erro_planilha')
       <!-- BEGIN: Notification With Buttons Below -->
                        <div class="intro-y box mt-5">

                            <div id="notification-with-buttons-below" class="p-5">
                                <div class="preview">
                                    <div class="text-center">
                                        <!-- BEGIN: Notification Content -->
                                        <div id="notification-with-buttons-below-content" class="toastify-content hidden flex">
                                            <i data-feather="file-text"></i> 
                                            <div class="ml-4 mr-5 sm:mr-20">
                                                <div class="font-medium">Upload de Planilha Incorreto</div>
                                                <div class="text-slate-500 mt-1">Lembre de seguir o modelo, e fazer o upload em .CSV</div>
                                                <div class="mt-2.5"> <a class="btn btn-primary py-1 px-2 mr-2" href="">Ver Planilha Modelo</a></div>
                                            </div>
                                        </div>

                                        <button id="notification-with-buttons-below-toggle" class="btn btn-primary" style="display: none">Abrir Notificação</button>

                                        <script>
                                            // Use JavaScript para encontrar o botão pelo ID e disparar um evento de clique
                                            document.addEventListener("DOMContentLoaded", function () {
                                                var botao = document.getElementById("notification-with-buttons-below-toggle");
                                                if (botao) {
                                                    botao.click(); // Clique no botão automaticamente
                                                }
                                            });
                                        </script>
                                                                            
                                    </div>
                                </div>
                              
                            </div>
                        </div>
            @endif

@endsection
@php 
$secao = session('secao');
@endphp
@if (isset($secao))
   
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Encontrar o elemento com o ID 'caracteristicas-section'
        var caracteristicasSection = document.getElementById("{{$secao}}");
 
        // Rolagem suave até a seção de características
        if (caracteristicasSection) {
            caracteristicasSection.scrollIntoView({ behavior: 'smooth' });
        } 
    });
</script>
@endif
@push('custom-scripts')





<script>
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>



@endpush
