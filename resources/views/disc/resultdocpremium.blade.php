<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório DISC Premium - Dominante</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            background: #e0e0e0;
            margin: 0;
            padding: 20px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }
        .page {
            width: 210mm;
            height: 297mm;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            position: relative;
            background-size: 100% 100%;
            background-repeat: no-repeat;
            padding: 40mm 20mm 30mm 20mm;
            page-break-after: always;
            overflow: hidden;
        }
        .capa { background-image: url('https://unyflex.com.br/storage/fav/1.png'); padding: 0; }
        .conteudo { background-image: url('https://unyflex.com.br/storage/fav/2.png'); }
        .final { background-image: url('https://unyflex.com.br/storage/fav/4.png'); page-break-after: auto; }
        
        h1, h2, h3 { color: #333; margin-top: 0; text-transform: uppercase; }
        h3 { border-bottom: 2px solid #e74c3c; padding-bottom: 5px; margin-top: 20px; }
        p { font-size: 14px; line-height: 1.6; text-align: justify; margin-bottom: 15px; }
        strong { color: #000; }
        
        .grafico-container { margin-top: 50px; height: 400px; width: 100%; }
        .valores { display: flex; justify-content: space-around; margin-top: 20px; font-weight: bold; font-size: 18px; }
        
        @media print {
            body { background: none; padding: 0; margin: 0; }
            .page { box-shadow: none; -webkit-print-color-adjust: exact !important; }
            @page { size: A4; margin: 0; }
        }
    </style>   
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="page capa">
        <div style="margin-top: 455px; margin-left: 120px; color: #ffffff; font-family: 'Poppins', sans-serif; font-weight: bold;">
            <p style="margin: 0;">{{ $funcionario->nome }}</p>
        </div>
    </div>


<div class="page conteudo">
    <h1>Resultado do Perfil</h1>
    <div class="grafico-container">
        <canvas id="discChart"></canvas>
    </div>
    <div class="valores">
        <div style="color: #ff6384;">D: {{ $percentages['D'] }}%</div>
        <div style="color: #ffcd56;">I: {{ $percentages['I'] }}%</div>
        <div style="color: #4bc0c0;">S: {{ $percentages['S'] }}%</div>
        <div style="color: #36a2eb;">C: {{ $percentages['C'] }}%</div>
    </div>
</div>
 @if($perfilDominante === 'D')
    <div class="page conteudo">
        <h1>Relatório DISC</h1>
        <p>Olá, <strong>{{ $funcionario->nome }}</strong>, seja muito bem-vindo (a)!</p>
        <p>Gostaríamos de te parabenizar pelo grande passo dado em busca de autoconhecimento.</p>
        <p>Este relatório é, frequentemente, utilizado no mundo por diversos profissionais especialistas comportamentais, como Coaches, Terapeutas, Profissionais de RH, entre outros, com o objetivo de maximizar a performance de seus clientes, colaboradores, candidatos, pacientes e alunos. Entretanto é muito importante ressaltar que o processo chamado de “Devolutiva DISC” apenas deve ser aplicado por um profissional capacitado e habilitado na ferramenta DISC, assim, as chances de sucesso e desenvolvimento serão muito mais assertivas e consistentes.</p>
        
        <h3>Perfil Dominante (Padrão D)</h3>
        <p><strong>Como tomo DECISÕES:</strong></p>
        <p>Pessoas do padrão D tendem a tomar decisões apressadas, com autonomia e convicção. Sabem conduzir situações de mudança, estabelecendo, em pouco tempo, o que deve ser feito e as consequências das ações.</p>
        <p>Tendem a envolverem-se em situações de alto risco, confiando na sua competência para obter resultados positivos. Na maioria das vezes não analisa fatos e dados para tomar uma decisão mais lógica.</p>

        <h3>Como me COMUNICO</h3>
        <p>As pessoas do padrão D gostam de abordar os assuntos de forma clara e direta, sempre com o direcionamento para a solução e alcance de resultados. Procuram sempre otimizar o seu tempo, ficando impacientes com conversas longas sem propósito. Podem passar a impressão de pessoas duras e grosseiras.</p>
        <p>Mesmo que não tenham sido questionas, gostam de mostrar ao grupo como fazer as coisas, colocar a sua opinião e ponto de vista é muito importante para as pessoas do padrão D. Mostram-se mais tranquilas ao falar de desempenho e resultados, ocultando, muitas vezes, suas reais emoções. Pode ficar incomodada com manifestações de sentimentos do grupo.</p>
        
      
    </div>

   
    <div class="page conteudo">
        <h3>Como GERENCIO MEU TEMPO</h3>
        <p>São apressadas, seja na tomada de decisão, na realização de tarefas e nas conversar. Muitas vezes pulam etapas para alcançar o seu objetivo. Com frequência, não dão a devida atenção aos prazos estipulados, pois tendem a resumir suas ações para a execução da tarefa em tempo hábil.</p>
        <h3>Como sou SOB PRESSÃO</h3>
        <p>Escolhem sempre as opções mais simples e rápidas, exibe uma dose de ansiedade e imediatismo. Tendem a sair executando sem pensar nas consequências e impactos a longo prazo. Tornam-se agressivas, perdem a paciência e pressionam os outros.</p>
        
        <h3>Como criar RAPPORT / SINERGIA COMIGO</h3>
        <p>Deixe-os livre para agirem e mudarem. Sempre que possível destaque o empenho empregado por eles nas tarefas, e valorize os feitos e resultados alcançados. Escute-os atentamente e identifique quais são suas vontades e anseios. Evite falar ou fazer análises emocionais profundas na frente de outros.</p>

        <h3>Como ELOGIAR as pessoas DOMINANTES</h3>
        <p>A melhor forma de elogiar é falar sobre desempenho, habilidades e resultados. Utilize frases curtas e precisas. Evidencie a competência de liderar em circunstâncias complexas e o senso de responsabilidade.</p>
        
        <h3>Como LIDAR COMIGO SOB PRESSÃO</h3>
        <p>Evite discussões acirradas sobre erros e procure não emitir juízo de valor. Se for o caso, minimize sua posição defensiva. Se for questionar, foque na solução do conflito e não no erro cometido. Prorrogue o prazo se o clima estiver hostil.</p>
    </div>

   

    <div class="page conteudo">
        <h3>Como DAR UM FEEDBACK para pessoas DOMINANTES</h3>
        <p>Seja direto, claro e objetivo. Dê exemplos baseados em fatos e informe os impactos no resultado final. Exponha os pontos a serem melhorados e o que ele ganhará ao seguir as orientações.</p>
        <p>Lembre-se que o padrão D é focado em resultado, sendo assim forneça os feedbacks o mais rápido possível para que ele ajuste a rota imediatamente.</p>
        <h3>COMO O DOMINANTE LIDERA</h3>
        <p><strong>Desenvolvendo pessoas:</strong> Colocam a equipe para atuar rapidamente. Podem ser intolerantes com quem precisa de muito tempo para aprender.</p>
        <p><strong>Delegando:</strong> Estabelecem o resultado esperado e dão autonomia. Se desconfiarem, tendem ao microgerenciamento.</p>
        <p><strong>Corrigindo:</strong> Corrigem com firmeza e objetividade, às vezes sendo hostis.</p>
        <p><strong>Motivando:</strong> Elevam a moral com foco em resultados e metas claras.</p>

        <h3>COMO LIDERAR PESSOAS DOMINANTES</h3>
        <p><strong>Para ser desenvolvido:</strong> Estimule atitudes ágeis e delimite o seu poder de decisão para evitar que ultrapassem limites.</p>
        <p><strong>Para delegar:</strong> Exponha o objetivo, dê um prazo e forneça autonomia dentro dessas regras.</p>
        <p><strong>Para corrigir:</strong> Seja franco e direto. Eles gostam de se comparar e buscarão provar que são capazes.</p>
        <p><strong>Para motivar:</strong> Dê autonomia e estimule a competitividade para que alcancem a vitória.</p>
    </div>

   
@elseif($perfilDominante =='I')
<div class="page conteudo">
    <h1>Relatório DISC</h1>
    <p>Olá, <strong>{{ $funcionario->nome }}</strong>, seja muito bem-vindo (a)!</p>
    <p>Gostaríamos de te parabenizar pelo grande passo dado em busca de autoconhecimento.</p>
    <p>Este relatório é, frequentemente, utilizado no mundo por diversos profissionais especialistas comportamentais, como Coaches, Terapeutas, Profissionais de RH, entre outros, com o objetivo de maximizar a performance de seus clientes, colaboradores, candidatos, pacientes e alunos. Entretanto é muito importante ressaltar que o processo chamado de “Devolutiva DISC” apenas deve ser aplicado por um profissional capacitado e habilitado na ferramenta DISC, assim, as chances de sucesso e desenvolvimento serão muito mais assertivas e consistentes.</p>
    
    <hr>
    
    <h3>Perfil Influente (Padrão I)</h3>
    <p><strong>Como tomo DECISÕES:</strong></p>
    <p>Pessoas do padrão I geralmente tomam decisões baseadas em uma abordagem emocional e no instinto pessoal. Consideram sua própria experiência como uma referência valiosa para suas escolhas.</p>
    <p>Tendem a manter expectativas otimistas sobre pessoas e situações. Por acreditarem no melhor e evitarem conflitos interpessoais, podem responder impulsivamente, sem coletar todos os dados necessários ou avaliar possíveis consequências negativas de forma realista.</p>

    <h3>Como me COMUNICO</h3>
    <p>Pessoas deste padrão são amigáveis, informais e muito espontâneas. Possuem grande facilidade em transitar por assuntos variados e utilizam a emoção para convencer e encantar os outros. Sentem-se confortáveis quando há reciprocidade emocional e adoram conversar sobre planos otimistas.</p>
    <p>Por evitarem a crueza dos fatos, podem ter dificuldade em transmitir notícias negativas ou serem diretos em situações que exigem firmeza. Podem sentir-se rejeitados por pessoas mais reservadas ou sérias.</p>
</div>

<div class="page conteudo">
    <h3>Como GERENCIO MEU TEMPO</h3>
    <p>Preferem estruturas flexíveis e agendas abertas. Como priorizam o relacionamento humano, tendem a perder a noção do tempo em conversas, o que pode gerar atrasos em prazos técnicos. Iniciam o dia pelas tarefas mais prazerosas ou que envolvam interação social, sentindo-se sobrecarregados quando precisam lidar sozinhos com grandes volumes de processos metódicos.</p>

    <h3>Como sou SOB PRESSÃO</h3>
    <p>Sob estresse, buscam soluções rápidas através do diálogo e da intuição, tornando-se impacientes com métodos excessivamente lentos. Em ambientes hostis, utilizam o desabafo emocional ou o humor como válvula de escape. Curiosamente, sob mudanças extremas, podem agir de forma oposta à sua natureza, tornando-se calados e inexpressivos.</p>
    
    <h3>Como criar RAPPORT / SINERGIA COMIGO</h3>
    <p>Demonstre interesse genuíno por suas opiniões e sentimentos. Crie espaços para que possam expressar sua criatividade e entusiasmo. Escute-os com sensibilidade e reconheça o esforço que fazem para manter o grupo unido. O Influente valoriza estar no centro das atenções e ser validado pelo grupo.</p>

    <h3>Como ELOGIAR as pessoas INFLUENTES</h3>
    <p>Seja generoso nas palavras e, preferencialmente, elogie em público. Destaque suas habilidades interpessoais, seu poder de persuasão e sua capacidade de manter o ambiente harmonioso mesmo em tempos difíceis. Reforce o quanto a presença deles é essencial para a energia da equipe.</p>
</div>

<div class="page conteudo">
    <h3>Como LIDAR COMIGO SOB PRESSÃO</h3>
    <p>Auxilie-os a separar o problema profissional da identidade pessoal, pois eles tendem a se culpar emocionalmente em conflitos. Ofereça um ambiente seguro para que verbalizem o que sentem. Use frases como "eu entendo sua frustração", focando na solução do fato específico e não no julgamento da pessoa.</p>

    <h3>Como DAR UM FEEDBACK para pessoas INFLUENTES</h3>
    <p>Inicie com uma abordagem informal para evitar que se sintam rejeitados. Seja claro sobre as consequências reais dos problemas, ajudando-os a sair do otimismo exagerado para uma análise lógica. No fechamento, forneça um resumo estruturado do que se espera deles para que não se percam em subjetividades.</p>

    <h3>COMO O INFLUENTE LIDERA</h3>
    <ul>
        <li><strong>Desenvolvendo pessoas:</strong> Age com entusiasmo e incentivo verbal constante. Pode ser genérico nas instruções, mas é extremamente paciente ao ensinar o passo a passo.</li>
        <li><strong>Delegando:</strong> Prefere um estilo persuasivo. Por gostar de participar do processo social, pode ter dificuldade em delegar totalmente, criando dependência na equipe.</li>
        <li><strong>Corrigindo:</strong> Evita confrontos diretos. Prefere corrigir através de exemplos, analogias ou "indiretas" amigáveis para não ferir o relacionamento.</li>
        <li><strong>Motivando:</strong> É o motor da equipe. Motiva através do espírito de união, confiança e reforço positivo constante.</li>
    </ul>

    <h3>COMO LIDERAR PESSOAS INFLUENTES</h3>
    <ul>
        <li><strong>Para ser desenvolvido:</strong> Use elogios rápidos, forneça visibilidade e limite o excesso de detalhes técnicos para não desmotivá-los.</li>
        <li><strong>Para delegar:</strong> Certifique-se de que o prazo foi compreendido. Ajude-os na estruturação lógica da tarefa e mostre-se disponível para tirar dúvidas.</li>
        <li><strong>Para corrigir:</strong> Seja firme sobre as consequências profissionais, mas reafirme que a relação pessoal continua sólida. Determine prazos claros para a mudança.</li>
        <li><strong>Para motivar:</strong> Dê oportunidades de trabalho em equipe, espaços de fala e reconhecimento público pelos resultados alcançados.</li>
    </ul>
</div>

@elseif($perfilDominante == 'S')
<div class="page conteudo">
    <h1>Relatório DISC</h1>
    <p>Olá, <strong>{{ $funcionario->nome }}</strong>, seja muito bem-vindo (a)!</p>
    <p>Gostaríamos de te parabenizar pelo grande passo dado em busca de autoconhecimento.</p>
    <p>Este relatório é, frequentemente, utilizado no mundo por diversos profissionais especialistas comportamentais, como Coaches, Terapeutas, Profissionais de RH, entre outros, com o objetivo de maximizar a performance de seus clientes, colaboradores, candidatos, pacientes e alunos. Entretanto é muito importante ressaltar que o processo chamado de “Devolutiva DISC” apenas deve ser aplicado por um profissional capacitado e habilitado na ferramenta DISC, assim, as chances de sucesso e desenvolvimento serão muito mais assertivas e consistentes.</p>
    
    <hr>
    
    <h3>Perfil Estável (Padrão S)</h3>
    <p><strong>Como tomo DECISÕES:</strong></p>
    <p>Pessoas do padrão S decidem com base em métodos validados e na experiência acumulada, evitando agir por impulso. Elas analisam o processo como um todo, observando impactos de curto, médio e longo prazo.</p>
    <p>Possuem uma natureza conservadora, preferindo a segurança e a previsibilidade ao risco. Suas decisões equilibram resultados e o bem-estar das pessoas envolvidas, tendendo a assumir tarefas para não sobrecarregar o grupo e buscando especialistas quando algo foge de suas habilidades.</p>

    <h3>Como me COMUNICO</h3>
    <p>A receptividade define este perfil. São excelentes ouvintes, acolhedores em conversas emocionais e buscam uma comunicação equilibrada para evitar conflitos ou desagrados. Sua abordagem é sensata, positiva e constante.</p>
    <p>Expressam-se de forma informal e amigável, mantendo um padrão previsível em suas interações. Dificilmente mudam seu jeito de comunicar radicalmente, pois valorizam a estabilidade nas relações.</p>
</div>

<div class="page conteudo">
    <h3>Como GERENCIO MEU TEMPO</h3>
    <p>São extremamente estruturados e organizados. Utilizam sistemas de classificação, listas e check-lists para garantir que nada seja esquecido. Planejam cada etapa antes de iniciar uma execução, o que os torna excelentes no cumprimento de prazos.</p>
    <p>Evitam o improviso e o desperdício de energia. Para o padrão S, a organização é uma fonte de segurança. Essa capacidade de gestão metódica agrega alto valor e estabilidade aos processos da empresa.</p>

    <h3>Como sou SOB PRESSÃO</h3>
    <p>Sob pressão, tendem à introspecção, apegando-se a padrões conhecidos e ao "status quo" em vez de inovar. Mudanças repentinas de rota podem causar ansiedade e esgotamento, gerando uma resistência natural ao inesperado.</p>
    <p>Para recuperar o equilíbrio, buscam o conforto do ambiente familiar e dos amigos. Em níveis elevados de estresse, podem se desdobrar no trabalho de forma exaustiva apenas para tentar restabelecer a ordem e a normalidade das coisas.</p>
    
    <h3>Como criar RAPPORT / SINERGIA COMIGO</h3>
    <p>Respeite seu ritmo e dê oportunidade para que criem uma rotina. Valorize o empenho que dedicam aos outros e envolva-os em atividades previsíveis. Ao propor mudanças, apresente um planejamento sólido e evite confrontações diretas ou disputas agressivas.</p>

    <h3>Como ELOGIAR as pessoas ESTÁVEIS</h3>
    <p>Destaque seus métodos, o planejamento e a confiança que transmitem ao time. O elogio deve ser sincero, amigável e focado em fatos específicos. Evite abordagens excessivamente invasivas no campo pessoal ou elogios genéricos sem fundamento.</p>
</div>

<div class="page conteudo">
    <h3>Como LIDAR COMIGO SOB PRESSÃO</h3>
    <p>Mantenha um tom de voz calmo e evite discussões acirradas. Peça a opinião do Estável em um ambiente seguro, respeitando se houver timidez inicial. O segredo é criar um cenário previsível para que os níveis de estresse baixem e ele se sinta seguro para colaborar.</p>

    <h3>Como DAR UM FEEDBACK para pessoas ESTÁVEIS</h3>
    <p>Utilize uma abordagem estruturada, amigável e baseada em fatos. O Estável precisa entender o "caminho completo" (começo, meio e fim) para otimizar seu desempenho. Ajude-o a priorizar o que exige ação imediata e o que precisa de análise, evitando tons pragmáticos demais que possam soar como agressividade.</p>

    <h3>COMO O ESTÁVEL LIDERA</h3>
    <ul>
        <li><strong>Desenvolvendo pessoas:</strong> Ensina de forma específica, organizada e paciente. Valoriza a bagagem do liderado, mas pode ter atritos com perfis de raciocínio muito rápido que se impacientam com seu ensino sistemático.</li>
        <li><strong>Delegando:</strong> Prefere instruções formais e por escrito, detalhando expectativas. Mantém-se sempre disponível para suporte e acompanhamento (follow-up).</li>
        <li><strong>Corrigindo:</strong> Age com suavidade e respeito, prezando pela relação interpessoal. Pode ter dificuldade em ser "duro" ou firme quando a situação exige.</li>
        <li><strong>Motivando:</strong> Motiva através da confiança, da segurança e do exemplo técnico. É o líder que se torna referência por ser especialista no que faz.</li>
    </ul>

    <h3>COMO LIDERAR PESSOAS ESTÁVEIS</h3>
    <ul>
        <li><strong>Para ser desenvolvido:</strong> Ofereça planos detalhados e faça correções sempre em particular. Use comunicações formais (e-mail ou mensagens) para reforçar as orientações.</li>
        <li><strong>Para delegar:</strong> Seja detalhista e explique os meios disponíveis para atingir o resultado. Acompanhe o progresso de perto para sanar dúvidas.</li>
        <li><strong>Para corrigir:</strong> Aponte o que precisa melhorar, mas não esqueça de ressaltar o progresso já alcançado. Transmita segurança durante a correção.</li>
        <li><strong>Para motivar:</strong> Valorize seu comprometimento e deixe claro o quanto o trabalho deles é vital para a harmonia e saúde da empresa.</li>
    </ul>
</div>

@else
<div class="page conteudo">
    <h1>Relatório DISC</h1>
    <p>Olá, <strong>{{ $funcionario->nome }}</strong>, seja muito bem-vindo (a)!</p>
    <p>Gostaríamos de te parabenizar pelo grande passo dado em busca de autoconhecimento.</p>
    <p>Este relatório é, frequentemente, utilizado no mundo por diversos profissionais especialistas comportamentais, como Coaches, Terapeutas, Profissionais de RH, entre outros, com o objetivo de maximizar a performance de seus clientes, colaboradores, candidatos, pacientes e alunos. Entretanto é muito importante ressaltar que o processo chamado de “Devolutiva DISC” apenas deve ser aplicado por um profissional capacitado e habilitado na ferramenta DISC, assim, as chances de sucesso e desenvolvimento serão muito mais assertivas e consistentes.</p>
    
    <hr>
    
    <h3>Perfil Cauteloso (Padrão C)</h3>
    <p><strong>Como tomo DECISÕES:</strong></p>
    <p>Pessoas do padrão C são extremamente precavidas. Suas decisões são fundamentadas em análises profundas, comparações racionais e avaliação minuciosa de riscos. Devido ao seu alto nível de perfeccionismo, demandam tempo e dados precisos para agir.</p>
    <p>Em situações de incerteza, podem buscar o suporte de especialistas ou transferir a decisão para alguém com maior capacitação técnica. Tendem a ser autocríticos, reavaliando constantemente escolhas passadas para aperfeiçoar processos futuros e eliminar qualquer margem de erro.</p>

    <h3>Como me COMUNICO</h3>
    <p>A comunicação do padrão C é formal, discreta e fundamentada. Em novos contatos, tendem à timidez e à observação, compartilhando informações pessoais apenas após estabelecerem confiança e credibilidade. </p>
    <p>Preferem argumentos concretos, números e evidências em vez de apelos emocionais. São excelentes debatedores técnicos, pois baseiam seus pontos de vista em estudos e fatos comprovados, mantendo sempre a polidez e a objetividade.</p>
</div>

<div class="page conteudo">
    <h3>Como GERENCIO MEU TEMPO</h3>
    <p>Sua gestão de tempo é pautada pela lógica e pela busca da solução impecável. Por focarem na qualidade extrema, podem investir mais tempo que a média na revisão e coleta de dados, o que por vezes compromete o cumprimento de prazos rígidos.</p>
    <p>A dificuldade em delegar tarefas — por medo de que o resultado não atenda aos seus critérios de perfeição — pode gerar sobrecarga. Para o Cauteloso, o tempo deve servir à precisão, nunca à pressa.</p>

    <h3>Como sou SOB PRESSÃO</h3>
    <p>Sob estresse, o padrão C tende ao isolamento e ao hiperfoco no trabalho. Tornam-se ainda mais metódicos, mergulhando no racional e ignorando necessidades emocionais próprias ou da equipe. </p>
    <p>A frustração surge quando os resultados não atingem o nível de perfeição imaginado. Nesses momentos, podem tornar-se irônicos, questionadores e excessivamente fiscalizadores, encontrando dificuldade em relaxar antes que a ordem técnica seja restabelecida.</p>
    
    <h3>Como criar RAPPORT / SINERGIA COMIGO</h3>
    <p>Respeite sua necessidade de solidão e reflexão; não force a exposição emocional. Valorize sua competência analítica e dê tempo para que ele demonstre suas habilidades. O Rapport com o Cauteloso é construído através do respeito aos processos e da aceitação de seu perfil observador.</p>

    <h3>Como ELOGIAR as pessoas CAUTELOSAS</h3>
    <p>Elogie de forma discreta e particular, evitando exposições desnecessárias. Foque na sua capacidade de resolver problemas complexos com máxima qualidade e na sua imparcialidade técnica. Reconheça a precisão e o equilíbrio que ele mantém em situações de crise.</p>
</div>

<div class="page conteudo">
    <h3>Como LIDAR COMIGO SOB PRESSÃO</h3>
    <p>Evite abordagens emocionais ou cobranças subjetivas. Concentre-se em fatos, regras e no que pode ser feito agora para resolver o problema. Forneça um ambiente seguro para que ele reflita antes de opinar e acolha suas sugestões técnicas, minimizando posturas defensivas.</p>

    <h3>Como DAR UM FEEDBACK para pessoas CAUTELOSAS</h3>
    <p>Seja racional e utilize comparações justas baseadas em evidências. Como o perfeccionismo pode paralisar a tomada de decisão, ajude-o delimitando prazos claros para ações imediatas. Ajuste as expectativas de qualidade em relação ao tempo disponível para evitar buscas inalcançáveis.</p>

    <h3>COMO O CAUTELOSO LIDERA</h3>
    <ul>
        <li><strong>Desenvolvendo pessoas:</strong> Instruem através de metodologias validadas e detalhadas. Podem parecer intolerantes quando suas ideias são reprovadas sem base técnica.</li>
        <li><strong>Delegando:</strong> Fornecem especificações claríssimas. Por zelarem pela qualidade, tendem a realizar as tarefas mais críticas por conta própria ou a monitorar os liderados tão de perto que parece fiscalização.</li>
        <li><strong>Corrigindo:</strong> São diretos e estruturados, focando no "como" e "porquê". Podem soar frios ou duros por priorizarem a correção do processo em vez do conforto emocional do liderado.</li>
        <li><strong>Motivando:</strong> Motivam através da clareza de dados e metas. Esclarecem a importância de cada um no sistema e oferecem segurança através de informações precisas sobre o que se espera.</li>
    </ul>

    <h3>COMO LIDERAR PESSOAS CAUTELOSAS</h3>
    <ul>
        <li><strong>Para ser desenvolvido:</strong> Forneça subsídios teóricos e prazos equilibrados. Crie oportunidades para que ele aplique suas aptidões técnicas de forma autônoma.</li>
        <li><strong>Para delegar:</strong> Seja o mais detalhista possível. Quanto mais informações o padrão C tiver sobre o valor do trabalho estruturado, maior será a excelência da entrega.</li>
        <li><strong>Para corrigir:</strong> Evidencie o erro com detalhes e aponte o caminho técnico para o acerto. Dê tempo para que ele processe a falha e apresente seu próprio plano de aperfeiçoamento.</li>
        <li><strong>Para motivar:</strong> Apoie sua busca pela eficiência e dê espaço para suas análises. Valorize o êxito alcançado através do método e do esforço racional.</li>
    </ul>
</div>
@endif
    

    <div class="page final">

    </div>

    <script>
        const ctx = document.getElementById('discChart');
    
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Dominância (D)', 'Influência (I)', 'Estabilidade (S)', 'Conformidade (C)'],
                datasets: [{
                    data: [
                        {{ $percentages['D'] ?? 0 }},
                        {{ $percentages['I'] ?? 0 }},
                        {{ $percentages['S'] ?? 0 }},
                        {{ $percentages['C'] ?? 0 }}
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(255, 205, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(54, 162, 235, 0.8)'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
        </script>
</body>
</html>