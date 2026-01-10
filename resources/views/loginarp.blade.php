<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login | Avalia.One</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Recaptcha -->
    <script src="https://www.google.com/recaptcha/enterprise.js" async defer></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            background: linear-gradient(
                rgba(0,0,0,0.55),
                rgba(0,0,0,0.55)
            ),
            url('https://blog.safesst.com.br/wp-content/uploads/2017/09/125620-entregar-revisao-quinta-219-16h-entenda-agora-a-importancia-da-ergonomia-no-ambiente-de-trabalho.jpg')
            no-repeat center center / cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            background: #fff;
            border-radius: 18px;
            padding: 40px 32px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.25);
            animation: fadeUp 0.6s ease;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-logo {
            text-align: center;
            margin-bottom: 25px;
        }

        .login-logo img {
            max-width: 160px;
        }

        .login-title {
            text-align: center;
            font-weight: 600;
            font-size: 20px;
            margin-bottom: 30px;
            color: #111827;
        }

        .form-control {
            height: 48px;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }

        .btn-login {
            height: 48px;
            border-radius: 12px;
            background: linear-gradient(135deg, #2563eb, #1e40af);
            border: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.4);
        }

        .login-footer {
            text-align: center;
            font-size: 13px;
            color: #6b7280;
            margin-top: 20px;
        }

        @media (max-width: 576px) {
            .login-card {
                padding: 30px 22px;
            }
        }
    </style>
</head>

<body>

    <div class="login-card">
        <form id="form" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="login-logo">
                <img src="{{ url('avalia.one.png') }}" alt="Ergo.One">
            </div>

            <div class="login-title">
                Acesso ao Sistema Avalia.One
            </div>

            <div class="mb-3">
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control"
                    placeholder="E-mail"
                    required
                >
            </div>

            <div class="mb-4">
                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Senha"
                    required
                >
            </div>

            <div class="mb-3 text-center">
                <div class="g-recaptcha"
                     data-sitekey="6LdlEaspAAAAAAVfRmpMCkcrD9z9xBQKE4WW5_XS"
                     data-action="LOGIN">
                </div>
            </div>

            <div class="d-grid">
                <button class="btn btn-login text-white" onclick="validateForm(event)">
                    Entrar no Sistema
                </button>
            </div>

            <div class="login-footer">
                * Por padrão, sua senha é o CPF
            </div>
        </form>
    </div>

    <script>
        function validateForm(event) {
            event.preventDefault();
            const recaptcha = document.querySelector('.g-recaptcha-response');

            if (!recaptcha || recaptcha.value === '') {
                alert('Por favor, confirme o captcha antes de continuar.');
                return;
            }

            document.getElementById("form").submit();
        }
    </script>

</body>
</html>
