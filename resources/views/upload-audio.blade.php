<!DOCTYPE html>
<html>
<head>
    <title>Reconhecimento de Voz a partir de Arquivo de Áudio</title>
</head>
<body>
    <h1>Reconhecimento de Voz a partir de Arquivo de Áudio</h1>
    
    <input type="file" id="audioFileInput">
    <button id="startButton">Transcrever</button>
    <textarea id="outputText" rows="50" cols="50"></textarea>

    <script>
        const audioFileInput = document.getElementById('audioFileInput');
        const startButton = document.getElementById('startButton');
        const outputText = document.getElementById('outputText');

        startButton.addEventListener('click', () => {
            const file = audioFileInput.files[0];
            if (file) {
                outputText.value = 'Transcrevendo...';

                const audio = new Audio(URL.createObjectURL(file));
                const recognition = new webkitSpeechRecognition() || new SpeechRecognition();
                recognition.lang = 'pt-BR'; // Defina o idioma para o reconhecimento

                recognition.onresult = (event) => {
                    const transcript = event.results[event.results.length - 1][0].transcript;
                    outputText.value = transcript;
                };

                audio.oncanplaythrough = () => {
                    recognition.start();
                    audio.play();
                };

                audio.load();
            } else {
                outputText.value = 'Selecione um arquivo de áudio WAV.';
            }
        });
    </script>
</body>
</html>
