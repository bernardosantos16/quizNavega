<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="./styles/style.css" media="screen" />
        <title>Quiz</title>
    </head>
    <style>
        /* Estilos para a imagem */
        .img-responsive {   
            vertical-align: middle;
            border-radius: 10px;
            height: 550px;
            object-fit: cover;
            width: 512px ;
        }
        .titulo{
            color: #fff700;
            font-size: 380%;
            text-align: center;
        }       

    </style>

    <?php
        require 'config.php';
        // Conecção com Banco de dados
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8";
        $username = $USERNAME;
        $password = $PASSWORD;
        
        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die("Erro na conexão com o banco de dados: " . $e->getMessage());
        }
    ?>
    
 
    <?php
        // Inicialize ou retome a sessão
        session_start();
         // Consulta SQL para buscar todas as questões do banco de dados e embaralhá-las
        if (!isset($_SESSION['questoes'])) {
            $sql = "SELECT questao, alternativa1, alternativa2, alternativa3,
        alternativa4 FROM questoes ORDER BY RAND() LIMIT 10";

            try {
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $questoes = [];

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $questao = [
                        'questao' => htmlspecialchars($row['questao'], ENT_QUOTES,'UTF-8'),
                        'alternativas' => [
                            'resposta' => htmlspecialchars(
                                $row['alternativa1'],ENT_QUOTES, 'UTF-8'), // as respostas estão cadastradas como alternativa1 no BD
                            'alternativa2' => htmlspecialchars(
                                $row['alternativa2'], ENT_QUOTES, 'UTF-8'),
                            'alternativa3' => htmlspecialchars(
                                $row['alternativa3'], ENT_QUOTES, 'UTF-8'),
                            'alternativa4' => htmlspecialchars(
                                $row['alternativa4'], ENT_QUOTES, 'UTF-8'),
                        ],
                    ];
                    $questoes[] = $questao;
                }

                if (empty($questoes)) {
                    echo "Nenhuma questão encontrada no banco de dados.";
                } else {
                    $_SESSION['questoes'] = $questoes;
                }
            } catch (PDOException $e) {
                die("Erro na consulta ao banco de dados: " . $e->getMessage());
            }
        }
    ?>
    <body>
        <h1 class="titulo">QUIZ NAVEGA</h1>
        <form action="resultado.php" method="post" id="quizForm">
        <?php
            // Loop para gerar os slides com base nas questões
            foreach ($_SESSION['questoes'] as $indice => $questao) {
                // Embaralhe as alternativas
                $alternativas = $questao['alternativas'];
                $alternativas = array_values($alternativas); // Reindexar o array
                shuffle($alternativas);
                                
                // Encontre a resposta correta
                $respostaCorreta = $questao['alternativas']['resposta'];
                $_SESSION['respostaCorreta'] = $respostaCorreta;
                echo '<div class="container mySlides">';
                echo '<img src="img/image'. ($indice+1) .'.jpg" class="img-responsive">';
                echo '<div class="centered-text">';
                echo '<h3>' . ($indice + 1) . ' - ' . $questao['questao'] . '</h3>';
                foreach ($alternativas as $indiceAlternativa => $alternativa) {
                    // Adicione o número da questão como prefixo no ID e nome
                    $id = 'opcao' . ($indice + 1) . '-' . ($indiceAlternativa + 1);
                    $name = 'opcao' . ($indice + 1);

                    echo '<input type="radio" id="' . $id . '" name="' . 
                    $name . '"value="' . $alternativa . '">';
                    echo '<label for="' . $id . '">' . $alternativa . '</label>';
                
                }
                echo '</div>';
                echo '</div>';
            }
        ?>
        </form>
        <div class="w3-center">
            <button class="button buttonSlide demo"
                onclick="currentDiv(1)">
                1
            </button> 
            <button class="button buttonSlide demo"
                onclick="currentDiv(2)">
                2
            </button>
            <button class="button buttonSlide demo"
                onclick="currentDiv(3)">
                3
            </button> 
            <button class="button buttonSlide demo"
                onclick="currentDiv(4)">
                4
            </button>
            <button class="button buttonSlide demo"
                onclick="currentDiv(5)">
                5
            </button>
            <button class="button buttonSlide demo"
                onclick="currentDiv(6)">
                6
            </button>
            <button class="button buttonSlide demo"
                onclick="currentDiv(7)">
                7
            </button>
            <button class="button buttonSlide demo"
                onclick="currentDiv(8)">
                8
            </button>
            <button class="button buttonSlide demo"
                onclick="currentDiv(9)">
                9
            </button>
            <button class="button buttonSlide demo"
                onclick="currentDiv(10)">
                10
            </button>
        </div>
        <div class="w3-center">
            <input type="submit" id="submitBtn" value="Enviar Formulário" disabled>
        </div>
    </body>
    <script>
    // Script Slides
        var slideIndex = 1;
        showDivs(slideIndex);

        function currentDiv(n) {
            showDivs(slideIndex = n);
        }

        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            if (n > x.length) {slideIndex = 1}    
            if (n < 1) {slideIndex = x.length}
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" w3-blue", "");
            }
            x[slideIndex-1].style.display = "block";  
            dots[slideIndex-1].className += " w3-blue";
        }
    </script>
    <script>
        // Script para bloquear Botão submit

        // Captura todos os grupos de botÃµes de opÃ§Ã£o
        const opcoes = document.querySelectorAll('[name^="opcao"]');
        const submitBtn = document.getElementById('submitBtn');
        // Adiciona um ouvinte de evento de mudanÃ§a a cada grupo
        opcoes.forEach(opcao => {
            opcao.addEventListener('change', () => {
                // Verifica se todos os grupos tÃªm uma seleÃ§Ã£o
                const todosSelecionados = Array.from(opcoes).every(opcao => {
                    return Array.from(opcao.form.elements[opcao.name])
                    .some(input => input.checked);
                });
                // Habilita ou desabilita o botÃ£o de envio com base na verificação
                submitBtn.disabled = !todosSelecionados;
            });
        });
    </script>

    <script>
        // Envio do formulário, pois o submit está fora do form 
        document.addEventListener("DOMContentLoaded", function () {
            const submitBtn = document.getElementById('submitBtn');
            const form = document.getElementById('quizForm');

            submitBtn.addEventListener('click', function () {
                
                form.submit();
            });
        });
    </script>
</html>

