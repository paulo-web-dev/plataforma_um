<!DOCTYPE html>
<html>
<head>
    <title>Transcrição de Fala</title>
</head>
<body>
    <button id="startButton">Iniciar Transcrição</button>
    <div id="transcription"></div>

    <script>
        const startButton = document.getElementById('startButton');
        const transcriptionDiv = document.getElementById('transcription');
        let recognition;

        startButton.addEventListener('click', () => {
            if (!('webkitSpeechRecognition' in window)) {
                console.error('Seu navegador não suporta a API de reconhecimento de fala');
                return;
            }

            recognition = new webkitSpeechRecognition();
            recognition.continuous = true;
            recognition.interimResults = true;
            recognition.lang = 'pt-BR';

            recognition.onstart = () => {
                console.log('Transcrição iniciada');
            };

            recognition.onresult = (event) => {
                let transcript = '';
                for (let i = event.resultIndex; i < event.results.length; i++) {
                    if (event.results[i].isFinal) {
                        transcript += event.results[i][0].transcript;
                    } else {
                        transcript += event.results[i][0].transcript;
                    }
                }
                transcriptionDiv.textContent = transcript;
            };

            recognition.onerror = (event) => {
                console.error('Erro ao transcrever a fala:', event.error);
                recognition.stop();
            };

            recognition.onend = () => {
                console.log('Transcrição finalizada');
                recognition.stop();
            };

            recognition.start();
        });
    </script>
</body>
</html>
