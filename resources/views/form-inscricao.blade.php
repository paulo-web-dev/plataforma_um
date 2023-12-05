@extends('layouts.app')

@section('content')
<!DOCTYPE html> 
<!--
Template Name: Rubick - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="{{ url('dist/images/logo.svg') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Rubick admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Rubick Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Plataforma Um </title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ url('dist/css/app.css') }}" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="login">
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Rubick Tailwind HTML Admin Template" class="w-6"
                        src="{{ url('dist/images/logo.svg') }}">
                    <span class="text-white text-lg ml-3"> Plataforma<span class="font-medium">Um</span> </span>
                </a>
                <div class="my-auto">
                    <img alt="Rubick Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16"
                        src="{{ url('dist/images/illustration.svg') }}">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                       Plataforma Geradora de AET
                    </div>
                    <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-gray-500">Faça Agora Seu Cadastro e Aproveite Hoje Mesmo!</div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div
                    class="my-auto mx-auto xl:ml-20 bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        Cadastro
                    </h2>
                    <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">Faça Agora Seu Cadastro e Aproveite Hoje Mesmo!</div>
                               <form method="POST" action="{{route('cad-inscricao')}}" onsubmit="return validatePassword()">
                        @csrf
                           <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome"  required autofocus>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
    <label for="password" class="col-md-4 col-form-label text-md-end">Senha</label>
    <div class="col-md-6">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="password_confirmation" class="col-md-4 col-form-label text-md-end">Confirmar Senha</label>
    <div class="col-md-6">
        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
</div>


           <script>
    document.addEventListener("DOMContentLoaded", function () {
        var password = document.getElementById("password");
        var confirmPassword = document.getElementById("password_confirmation");

        function validatePassword() {
            if (password.value !== confirmPassword.value) {
                confirmPassword.setCustomValidity("As senhas não coincidem");
            } else {
                confirmPassword.setCustomValidity("");
            }
        }

        password.addEventListener("change", validatePassword);
        confirmPassword.addEventListener("keyup", validatePassword);
    });
</script>
            

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                

                              <button type="submit" class="btn btn-primary">
                                    Cadastrar
                                </button>
                           
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
    <!-- BEGIN: JS Assets-->
    <script src="{{ url('dist/js/app.js') }}"></script>
    <!-- END: JS Assets-->
</body>

</html>
@endsection
