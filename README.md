### Criação Banco de dados
Crie um banco de dados chamado de quiz e popule da seguinte forma:
```sql
CREATE TABLE `questoes` (
  `id` int(11) NOT NULL,
  `questao` varchar(500) CHARACTER SET latin1 NOT NULL,
  `alternativa1` varchar(500) CHARACTER SET latin1 NOT NULL,
  `alternativa2` varchar(500) CHARACTER SET latin1 NOT NULL,
  `alternativa3` varchar(500) CHARACTER SET latin1 NOT NULL,
  `alternativa4` varchar(500) CHARACTER SET latin1 NOT NULL,
  `correta_incorreta_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `questoes`
--

INSERT INTO `questoes` (`id`, `questao`, `alternativa1`, `alternativa2`, `alternativa3`, `alternativa4`, `correta_incorreta_id`) VALUES
(1, 'Qual a origem do nome Navegantes?', 'Homenageando a vocação marinheira, natural dos habitantes do povoado de Santo Amaro e, a devoção dedicada a Nossa Senhora dos Navegantes.', 'Em homenagem a um famoso explorador marítimo', 'Por causa da localização geográfica da cidade.', 'Por influência de um antigo nome indígena da região.', NULL),
(2, 'O que representa a cruz no símbolo de Navegantes?', 'É sinal da Fé Cristã do Povo', 'Um elemento decorativo tradicional.', 'Uma referência a um antigo evento histórico.', 'Um marco geográfico importante.', NULL),
(3, 'Quando aconteceu a emancipação política e administrativa de Navegantes à Itajaí?', '26 de agosto de 1962', '28 de setembro de 1968', '8 de outubro de 1841\r\n', '15 de março de 1945', NULL),
(4, 'Com quais cidades Navegantes faz fronteira?', 'Penha, Balneário Piçarras, Ilhota, Luiz Alves e Itajaí ', 'Blumenau, Jaraguá do Sul, Itajaí', 'Gravatá, Penha, Itajaí, Luis Alves', 'Balneário Camburiú, Itajaí, Penha e Luiz Alves', NULL),
(5, 'Qual é a data que se comemora a festa de Nossa Senhora dos Navegantes?', '2 de fevereiro', '2 de agosto', '2 de maio', '2 de março', NULL),
(6, 'Os Navegantinos são popularmente chamados de Dengo Dengo, qual a origem desse termo? ', 'Vem do soar do sino da capela dos Amaros.', 'Antigo nome de um rio na região.', 'Influência de uma tribo indígena local.', 'Por causa das buzinas dos barcos.', NULL),
(7, 'O que representa a âncora no símbolo de Navegantes?', 'Emblema dos marítimos. Navegantes era a terra dos homens do mar. Marítimos e pescadores povoaram aquela região criada entre o rio e o mar. Navegantes nasceu com eles.', 'Símbolo artístico da cidade.', 'Representação da agricultura.', 'Um elemento decorativo tradicional', NULL),
(8, 'O que representa o avião no símbolo de Navegantes?', 'O aeroporto de Navegantes', 'Representação da tecnologia.\r\n', 'Símbolo de Navegantes.', 'A inovação na cidade.', NULL),
(9, 'O que representa o barco no símbolo de Navegantes?', 'Simboliza a navegação desde o tempo dos navios veleiros que marcam uma época.', 'Representação do comércio local.', 'Representa as divisas maritímas de Navegantes.', 'Faz uma analogia a hifrografia de Navegantes', NULL),
(10, 'Qual é a bioma está presente em Navegantes?', 'Mata Atlântica', 'Paisagem natural', 'Pampa', 'Restinga', NULL),
(11, 'Qual região do estado de Santa Catarina, Navegantes pertence?', 'Vale do Itajaí', 'Região Sul', 'Planalto Norte', 'Norte Catarinese', NULL),
(12, 'Fundado em 10 de dezembro de 1949, qual o nome do tradicional clube de futebol situado no centro de Navegantes?', 'União Futebol Clube', 'Atletico Navegantes', 'Portuguesa', 'Clube 1° de Maio', NULL),
(13, 'Em qual praia está localizada a Pedra do Miraguaia?', 'Praia do Gravatá', 'Praia do Pontal', 'Praia Central', 'Praia de São Miguel', NULL),
(14, 'O “molhe” está situado em qual bairro?', 'São Pedro', 'Centro', 'São Domingos', 'Nossa Senhora das Graças', NULL),
(15, 'Qual é a principal atividade econômica tradicional de Navegantes?', 'Pesca', 'Indústria automobilística', 'Indústria metalúrgica', 'Fabricação de alimentos processados', NULL),
(16, 'Que evento tradicional de Navegantes atrai milhares de visitantes e envolve uma procissão marítima e terrestre?', 'Festa de Nossa Senhora dos Navegantes', 'Carnaval', 'Festa de São João', 'Oktoberfest', NULL),
(17, 'Quem foi o primeiro prefeito de Navegantes?', 'Athanásio Joaquim Rodrigues', 'Roberto Carlos de Souza', 'Adherbal Ramos Cabral', 'Liba Fronza', NULL),
(18, 'Porque é importante a preservação da Restinga da Praia de Navegantes?', 'As restingas exercem uma série de funções socioambientais, dentre elas a fixação de dunas litorâneas, protegendo o litoral de eventos erosivos das ondas e marés.', 'Tem valor histórico para a cidade.', 'Promove atividades recreativas.', 'Para o lixo não chegar nas ruas.', NULL),
(19, 'Como é popularmente conhecido o ponto turístico do Farol da Barra?', 'Molhe', 'Farol da Alegria', 'Ponto de Referência Navegantino', 'Mirante do Mar', NULL),
(20, 'Qual o nome do Rio que faz fronteira entre Itajaí e Navegantes?', 'Rio Itajaí-açu', 'Rio Navegantes', 'Rio dos Barcos', 'Rio N. Sra. dos Navegantes', NULL),
(21, 'Qual é a importante rodovia de ligação no Sul do Brasil, que contempla 472,3 km entre Navegantes e Camaquã (RS).', 'BR-470', 'BR-101', 'BR-282', 'BR-492', NULL),
(22, 'Quais são os principais esportes populares na cidade?', 'Surfe, Futebol, Xadrez e Atletismo', 'Vôlei, Ciclismo, Badminton', 'Tênis, Tiro ao alvo, Esgrima', 'Luta greco-romana, Natação, Futebol, Basquete', NULL),
(23, 'Quando a Paróquia Nossa Senhora dos Navegantes foi inaugurada?', '2 de fevereiro de 1901', '10 de agosto de 1935', '27 de maio de 1910', '5 de dezembro de 1948', NULL),
(24, 'Segundo o último censo do IBGE (2022), aproximadamente quantos habitantes residem em Navegantes?', 'cerca de 86 mil habitantes', 'cerca de 70 mil habitantes', 'cerca de 95 mil habitantes', 'cerca de 110 mil habitantes', NULL),
(25, 'Qual a escola mais antiga de Navegantes?', 'Escola Municipal Professora Idília Machado Ferreira', 'Escola Vila da Paz', 'Escola Municipal Almirante Barroso', 'Escola Navegante das Letras', NULL),
(26, 'Qual prato típico de Navegantes, Santa Catarina, é especialmente apreciado por sua relação com a cultura de pesca da região?', 'Ensopado de Tainha', 'Moqueca de Peixe', 'Tucunaré assado', 'Ceviche ', NULL),
(27, 'Como é chamado popularmente o meio de transporte aquático que mais utilizado na travessia entre Navegantes e Itajaí?', 'Ferry Boat', 'Navio de Passagem', 'Ponto de Travessia\r\n', 'Barca', NULL),
(28, 'Em que bairro está localizada a Gruta Nossa Senhora de Guadalupe?', 'Pedreiras', 'Machados', 'Centro', 'São Pedro', NULL),
(29, 'Qual foi a forma em que as pedras do molhe foram transportadas para sua construção?', 'Trem', 'Caminhão', 'Barco', 'Carroça', NULL),
(30, 'Qual é a festa tradicional que celebra a cultura pesqueira e reúne pescadores e turistas em Navegantes?', 'Festa da Tainha', 'Celebração Marítima', 'Encontro da Praia', 'Festival Cultural', NULL),
(31, 'Qual é a importância histórica da Casa da Cultura de Navegantes e que tipo de atividades culturais são realizadas lá?', 'É importante para preservar a cultura local e realiza atividades culturais, como exposições, apresentações e oficinas relacionadas à história e à tradição da região.', 'É um prédio antigo sem importância histórica.', 'Local de encontros sociais sem atividades culturais.', 'A Casa da Cultura não tem relevância na comunidade.', NULL);
```

### Configuração Banco de Dados
Crie Um arquivo chamado `config.php`
adicione as configurações do banco de dados mysql da seguinte forma:
```php
<?php
#DB Config
$HOST = "localhost";
$DBNAME = "quiz";
$USERNAME = "root";
$PASSWORD = "root";
```

### Driver para funcionamento do PDO
Para realizar as requisições no php via PDO é necessário que o driver esteja configurado no seu server (xammp, Uwamp, Apache, etc..)
 - no diretório root de seu server procure por `php/php.ini`
 - abra o arquivo com um editor de texto
 - procure por `;extension=pdo_mysql` e `;extension_dir = "ext"`
 - remova o ; da linha `extension=pdo_mysql` e remova também o ; na linha `extension_dir = "ext"`
 - caso não houver essas configurações adicione-as.
