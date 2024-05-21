<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Julia garcia ainda me ama?</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            text-align: center;
        }
        button {
            padding: 10px 20px;
            margin: 20px;
            font-size: 16px;
            cursor: pointer;
        }
        #no-btn {
            position: absolute;
        }
    </style>
</head>
<body style="background-color: green">
<h1>Você ainda me ama?</h1><br>
    <div class="container">
        <button id="yes-btn" onclick="alert('te amo mil milhões minha princesa. obs: viu que não tem a opção de clicar em não né kakaksks te amo te amo te amo')">Sim</button><br>
        <button id="no-btn">Não</button>
    </div>

    <script>
        const noBtn = document.getElementById('no-btn');

        function moveButton() {
            const x = Math.random() * (window.innerWidth - noBtn.clientWidth);
            const y = Math.random() * (window.innerHeight - noBtn.clientHeight);
            noBtn.style.left = `${x}px`;
            noBtn.style.top = `${y}px`;
        }

        noBtn.addEventListener('mouseover', moveButton);
        noBtn.addEventListener('touchstart', moveButton);
    </script>
</body>
</html>
