@extends('layouts.header')

@section('content')

 <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Cadastrar Identidade Visual
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: Profile Menu -->

        {{-- <div class="col-span-12 lg:col-span-4 xxl:col-span-3 flex lg:block flex-col-reverse">
            <div class="intro-y box mt-5 lg:mt-0">
                <div class="p-5 border-t nav-tab border-gray-200 dark:border-dark-5">
                    <a id="informacoes-pessoais-tab" data-toggle="tab" data-target="#informacoes-pessoais" href="javascript:;"
                        role="tab" class="flex items-center">
                        <i data-feather="user" class="w-4 h-4 mr-2"></i> Informações Pessoais </a>
                </div>
            </div>
        </div> --}}
        <!-- END: Profile Menu -->

        <div class="col-span-12 lg:col-span-12 xxl:col-span-12 tab-content">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert">
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <i data-feather="x" class="w-4 h-4"></i>
                    </button>
                </div>
            @endforeach
            <form action="{{route('cad-identidade-visual')}}" method="post" enctype="multipart/form-data" data-single="true"
                method="post">
                @csrf
                <div id="informacoes-pessoais" role="tabpanel" aria-labelledby="informacoes-pessoais-tab"
                    class="grid grid-cols-12 gap-6 tab-pane active">
                    <!-- BEGIN: Products -->
                    <div class="intro-y box col-span-12 xxl:col-span-12">
                        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                            <h2 class="font-medium text-base mr-auto">
                               Informações da Identidade Visual
                            </h2><br>
                             <a href="{{ route('home') }}" class="btn btn-primary shadow-md mr-2"><i data-feather="skip-back" class="w-4 h-4 mr-2"></i>Voltar</a>
                        </div>

                              
                                
                        
                    </div> 
                    <div class="intro-y box col-span-12 xxl:col-span-12 p-5">
                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="cor_principal" class="form-label"><strong>Cor Principal</strong></label>
                                    <input id="cor_principal" type="color" name="cor_principal" class="form-control"
                                       value="{{$identidade->cor_principal}}" required>
                                </div>
                                <div class="mt-3">
                                    <label for="cor_secundaria" class="form-label"><strong>Cor Secundaria</strong></label>
                                    <input id="cor_secundaria" type="color" name="cor_secundaria" class="form-control"
                                       value="{{$identidade->cor_secundaria}}" required>
                                </div>
                                  <div class="mt-3">
                                <label for="empresa" class="form-label"><strong>Estado</strong></label>
                                <input type="hidden" value="{{$identidade->foto_empresa}}" name="foto">
                                    <select class="form-control" name="empresa" id="empresa"
                                         required>
                                         <option >Escolha a Empresa</option>
                                        @foreach ($empresas as $empresa)
                                             <option value="{{$empresa->id}}">{{$empresa->nome}}</option>
                                        @endforeach
                                       
                                       
                                    </select>
                                    <br><br>
                                </div>
                               
                            
                            </div>
                    <div class="col-span-12 xl:col-span-6">
                        <label class="form-label"><strong>Imagem</strong></label>
                        <div class="border-2 border-dashed dark:border-dark-5 rounded-md pt-4">
                          <img src="/fotos-identidade/{{$identidade->foto_empresa}}" style="max-width:200px">
                        </div>
                    </div>
                       <div class="col-span-12 xl:col-span-6">
                        <label class="form-label"><strong>Upload de Marca D'agua</strong></label>
                        <div class="border-2 border-dashed dark:border-dark-5 rounded-md pt-4">
                            <div class="px-4 pt-24 pb-24 flex items-center justify-center cursor-pointer relative">
                                <div id="areaArquivo">
                                    <i data-feather="image" class="w-4 h-4 mr-2"></i>
                                    <span class="mr-1 font-bold">Adicionar Imagem</span>
                                </div>
                                <input type="file" id="file" name="marca"
                                    class="w-full h-full top-0 left-0 absolute opacity-0" required>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                 
                 

                        <div class="intro-y box col-span-12 xxl:col-span-12">
                            <button type="submit" class="btn btn-primary w-full  mr-2 mb-2"> <i data-feather="activity"
                                    class="w-4 h-4 mr-2"></i>
                                Adicionar Identidade Visual </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
@push('custom-scripts')
    
    <script>
        $(document).ready(function() {

            $("#cpf").bind('paste', function(e) {
                e.preventDefault();
            });

        });
    </script>
    <script>
        (function(cash) {
            document.getElementById('file').onchange = function() {
                var arquivo = document.getElementById('file').value;
                var nomearquivo = arquivo.substring(12);
                var modeloArquivo =
                    '<div class="file box rounded-md px-5 sm:px-5 relative zoom-in">' +
                    '<p class="w-1/5 file__icon file__icon--file mx-auto">' +
                    '</p>' +
                    '<p class="block font-medium mt-4 text-center truncate">' + nomearquivo + '</p>' +
                    '</div>';
                cash('#areaArquivo').html(modeloArquivo);
            }
        })(cash);
    </script>

    <!-- Adicionando Javascript -->
    <script>
        function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value = ("");
            document.getElementById('bairro').value = ("");
            document.getElementById('cidade').value = ("");
            document.getElementById('uf').value = ("");
            document.getElementById('ibge').value = ("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('rua').value = (conteudo.logradouro);
                document.getElementById('bairro').value = (conteudo.bairro);
                document.getElementById('cidade').value = (conteudo.localidade);
                document.getElementById('uf').value = (conteudo.uf);
                document.getElementById('ibge').value = (conteudo.ibge);
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }

        function pesquisacep(valor) {

            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('rua').value = "...";
                    document.getElementById('bairro').value = "...";
                    document.getElementById('cidade').value = "...";
                    document.getElementById('uf').value = "...";
 

                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        };
    </script>

         <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>  <!--Script do iconify-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="dist/js/app.js"></script>
     
        
        <!-- END: JS Assets-->
    </body>
</html>

@push('custom-scripts')





@endpush
