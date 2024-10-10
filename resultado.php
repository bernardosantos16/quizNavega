<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css" href="./styles/style.css" media="screen" />
    <title>Página de Resultados</title>
    <style>
        .titulo{
            color: #fff700;
            font-size: 380%;
            text-align: center;
        }
        .container-gabarito {
            text-align: center;
  
            background-color: rgba(0, 0, 0, 0.7); /* Cor de fundo do texto com
transparencia */
            padding: 10px 20px; /* EspaÃ§amento interno do texto */
            border-radius: 5px; /* Cantos arredondados para o texto */
            color: #fff;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <h1 class="titulo">Resultado do Quiz</h1>
    

        <?php
            session_start();
            $pontuacao = 0;
            
            for ($i = 1; $i <= count($_SESSION['questoes']); $i++) {
                $name = 'opcao' . $i;
                $selectedOption = $_POST[$name] ?? null;
                $value = ($selectedOption === $_SESSION['questoes'][$i - 1]
                ['alternativas']['resposta']) ? 'correta' : 'errada';

                // Verifica se a opção selecionada é "correta" e atualize apontuação
                if ($value === 'correta') {
                    $pontuacao++;
                }
            }
        ?>
        <!-- Exibe a pontuação final no topo da página -->
        <center>
            <div 
                role="progressbar" aria-valuenow = <?= $pontuacao*10 ?> 
                ariavaluemin="0" aria-valuemax="100" style="--value: <?= $pontuacao*10 ?>;">
            </div>
            <br>
            <button
                id="mostrarPerguntas"
                class="btn-azul">MOSTRAR MEU GABARITO
            </button>
            <br>
            <br>
            <a href="index.php">
                <button
                    class="btn-vermelho"
                    id="voltarInicial"
                    onclick="fecharSessao()">VOLTAR PARA O INÍCIO
                </button>
            </a>
            <br>

        </center>

        <div id="perguntasRespostas" class="hidden">
            <?php
            /* Loop para verificar as respostas do 
            usuário e exibir as perguntas e respostas */
                for ($i = 1; $i <= count($_SESSION['questoes']); $i++) {
                    $name = 'opcao' . $i;
                    $selectedOption = $_POST[$name] ?? null;
                    $value = ($selectedOption === $_SESSION['questoes'][$i - 1]
                    ['alternativas']['resposta']) ? 'correta' : 'errada';
                    // Exibir a pergunta
                    echo '<div class="container-gabarito">';
                    echo '<h3><u>Pergunta ' . $i . ': ' . $_SESSION['questoes']
                    [$i - 1]['questao'] . '</u></h3>';
                    // Exibir a alternativa selecionada pelo usuário
                    echo 'SUA RESPOSTA:';
                    if ($value === 'correta') {
                        echo $_SESSION['questoes'][$i - 1]['alternativas']
                        ['resposta']. ' - <span style="color:green">CORRETA</span>';
                    } elseif ($value === 'errada') {
                        echo $selectedOption . ' - <span style="color:red"> ERRADA </span> <br>';
                        echo 'RESPOSTA CORRETA: ' . $_SESSION['questoes'][$i - 1]['alternativas']
                        ['resposta'];
                    } else {
                        echo 'Nenhuma opção selecionada';
                    }

                    echo '</div>';
                    echo '<br>';
                }
            ?>
        </div>

    <script>
        // Função para mostrar as perguntas e respostas quando o botão for pressionado
        document.getElementById('mostrarPerguntas').addEventListener('click', function() {
            document.getElementById('perguntasRespostas').classList.remove('hidden');
        });
    </script>
</body>
</html>
 
