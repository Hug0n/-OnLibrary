-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Nov-2019 às 09:37
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlibrary`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario_livro`
--

CREATE TABLE `comentario_livro` (
  `COD_COMENTARIO` int(11) NOT NULL,
  `ID_LIVRO_COMENTADO` int(11) NOT NULL,
  `ID_USUARIO_COMENTOU` int(11) NOT NULL,
  `COMENTARIO` varchar(5000) DEFAULT NULL,
  `DATA_COMENTARIO` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comentario_livro`
--

INSERT INTO `comentario_livro` (`COD_COMENTARIO`, `ID_LIVRO_COMENTADO`, `ID_USUARIO_COMENTOU`, `COMENTARIO`, `DATA_COMENTARIO`) VALUES
(1, 13, 84, 'Muito bom!!!!!', '2019-11-03 19:05:25'),
(2, 13, 4, 'Definitivamente a melhor série que já li! Podem comprar/alugar :))', '2019-11-03 19:06:27'),
(3, 11, 4, 'Inspirador!!', '2019-11-03 19:07:05'),
(17, 8, 84, 'incrível', '2019-11-09 18:02:53'),
(22, 8, 4, 'Muito boooomm', '2019-11-09 23:08:14'),
(23, 14, 84, 'Esse livro me fez refletir profundamente sobre as questões sociais e políticas durante a 2° Guerra Mundial. É emociante pois tudo se trata de uma história verídica.', '2019-11-10 11:33:01'),
(33, 9, 84, 'Muito bom. Pode revolucionar sua vida, se por os conhecimentos em prática! Podem alugar!', '2019-11-10 20:06:56'),
(52, 10, 4, 'Estou aprendendo a programar em Java com esse livro. Tem muito conteúdo e é descontraído, diferente da maioria dos livros do gênero do mercado.', '2019-11-10 20:24:59'),
(53, 9, 4, '', '2019-11-10 22:25:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco_usuario`
--

CREATE TABLE `endereco_usuario` (
  `id_end` int(11) NOT NULL,
  `id_usuario_end` int(11) NOT NULL,
  `rua` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `endereco_usuario`
--

INSERT INTO `endereco_usuario` (`id_end`, `id_usuario_end`, `rua`, `bairro`, `cidade`, `uf`, `complemento`) VALUES
(4, 4, 'Cachões', 'Copacabana', 'Rio', 'RJ', '223'),
(5, 5, 'Limões molhados', 'Golfinho Verde', 'João Pessoa', 'PB', '890-c'),
(47, 84, 'Rua Travessa Da Cachoeira, 22', 'Mangueira', 'Moreno', 'PE', 'sdsd'),
(49, 86, 'Rua Travessa Da Cachoeira, 22', 'Mangueira', 'Moreno', 'PE', '22'),
(50, 87, 'Travessa da Cachoeira', 'Mangueira', 'Recife', 'PE', '32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico_usuario`
--

CREATE TABLE `historico_usuario` (
  `id_historico` int(11) NOT NULL,
  `id_usuario_historico` int(11) NOT NULL,
  `data_inicio_hist` varchar(10) DEFAULT NULL,
  `data_fim_hist` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `id_livro` int(11) NOT NULL,
  `nome_livro` varchar(50) DEFAULT NULL,
  `autor` varchar(50) DEFAULT NULL,
  `ano` varchar(4) DEFAULT NULL,
  `sinopse` varchar(1000) DEFAULT NULL,
  `data_prazo_aluguel` int(10) DEFAULT NULL,
  `categoria` varchar(50) NOT NULL,
  `fora_de_linha` varchar(4) NOT NULL,
  `idioma` varchar(20) NOT NULL,
  `numero_edicao` varchar(4) NOT NULL,
  `quantidade_paginas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`id_livro`, `nome_livro`, `autor`, `ano`, `sinopse`, `data_prazo_aluguel`, `categoria`, `fora_de_linha`, `idioma`, `numero_edicao`, `quantidade_paginas`) VALUES
(8, 'A Menina Que Roubava Livros', 'Markus Zusak', '2005', 'A Menina Que Roubava Livros é um drama do escritor australiano Markus Zusak, publicado em 2005 pela editora Picador. No Brasil e em Portugal, foi lançado pela Intrínseca e a Presença, respectivamente. O livro é sobre Liesel Meminger, uma garota que encontra a Morte três vezes durante 1939–43 na Alemanha nazista.', 15, 'Ficção juvenil', 'Não', 'Português', '1', 345),
(9, 'O Poder do Hábito', 'Charles Duhigg', '2012', 'A importância de se criar hábitos corretos: Em “O Poder do Hábito - Por Que Fazemos o Que Fazemos na Vida e Nos Negócios” o autor toca em outro assunto importantíssimo, que é a criação de hábitos corretos. À primeira vista, isso pode parecer pequeno. No entanto, ao longo do livro você vai ver que, saber corrigir atitudes no momento certo pode contribuir com o seu sucesso. Como exemplo, Duhigg conta casos de mudanças e correções de hábitos. Dentre eles, há histórias do próprio autor, mas também de outras pessoas. Você vai descobrir, por exemplo, como hábitos corretos foram importantes para garantir o sucesso do diretor executivo da Starbucks, Howard Schultz, de um dos maiores nomes da luta por direitos civis, Martim Luther King, e até do nadador Micheal Phelps, que já conquistou mais de 20 medalhas olímpicas de ouro.', 10, 'Administração Pessoal/Organizacional', 'Não', 'Português', '1', 378),
(10, 'Use a cabeça! Java', 'Kathy Sierra, Bert Bates', '2003', 'Use a cabeça! - Java é uma experiência de aprendizado em programação orientada a objetos (OO) e Java. Projetado de acordo com princípios de aprendizado mentalmente amigáveis, este livro procura mostrar desde aspectos considerados básicos da linguagem a tópicos avançados que incluem segmentos, soquetes de rede e programação distribuída. Alguns conteúdos - A linguagem Java, Desenvolvimento orientado a objetos, Criação, teste e implantação de aplicativos, Uso da biblioteca do API Java, Manipulação de exceções, Uso de vários segmentos, Programação de GUI com o Swing, Rede com RMI e soquetes, Conjuntos e tipos genéricos.', 20, 'Universitários, Técnicos e Profissionais', 'Não', 'Português', '1', 483),
(11, 'Nunca desista de seus sonhos ', 'Augusto Cury', '2004', 'Não se esqueça de que você vai falhar 100% das vezes em que não tentar, vai perder 100% das vezes em que não procurar, vai estacionar 100% das vezes em que não ousar caminhar.” – Augusto Cury debruça-se aqui sobre nossa capacidade de sonhar e quanto ela é fundamental na realização de nossos projetos de vida. Os sonhos são como uma bússola, indicando os caminhos que seguiremos e as metas que queremos alcançar. São eles que nos impulsionam, nos fortalecem e nos permitem crescer. Se os sonhos são pequenos, nossas possibilidades de sucesso também serão limitadas. Desistir dos sonhos é abrir mão da felicidade, porque quem não persegue seus objetivos está condenado a fracassar 100% das vezes. Analisando a trajetória vitoriosa de grandes sonhadores, como Jesus Cristo, Abraham Lincoln e Martin Luther King, Cury nos faz repensar nossa vida e nos inspira a não deixar nossos sonhos morrerem.', 25, 'Livro de autoajuda', 'Não', 'Português', '3', 176),
(12, 'O Vendedor de Sonhos', 'Augusto Cury', '2008', 'Um homem desconhecido tenta salvar da morte um suicida. Ninguém sabe sua origem, seu nome sua história. Proclama aos quatro ventos que a sociedades modernas se converteram num hospício Global. Com uma eloquência cativante, começa a chamar seguidores para vender sonhos. Ao mesmo tempo em que arrebata as pessoas e as liberta do cárcere da rotina, arruma muitos inimigos. Será ele um sábio ou um louco?', 30, 'Romance', 'Não', 'Português', '5', 281),
(13, 'Maze Runner: Correr ou Morrer', 'James Dashner', '2009', 'Ao acordar dentro de um escuro elevador em movimento, Thomas não consegue se lembrar de nada relacionado à sua vida, consegue se lembrar apenas do seu nome. A sua memória está completamente apagada. Mas ele não está completamente sozinho.\r\n\r\nA caixa metálica chega ao seu destino e as portas se abrem, Thomas vê-se rodeado por garotos que o acolhem e o apresentam à Clareira, um espaço aberto cercado por muros gigantescos. Assim como Thomas, nenhum deles sabe como foi parar ali, nem por quê. Sabem apenas que todas as manhãs as portas de pedra do Labirinto que os cerca se abrem, e, à noite, se fecham. E que a cada trinta dias um novo garoto é entregue pelo elevador. Porém, um fato altera de forma radical a rotina do lugar - chega uma garota, a primeira enviada à Clareira. E mais surpreendente ainda é a mensagem que ela traz consigo.\r\n\r\nThomas será mais importante do que imagina, mas para isso terá de descobrir os sombrios segredos guardados em sua mente e correr, correr muito.', 7, 'Ficção científica', 'Não', 'Português', '2', 368),
(14, 'O Diário de Anne Frank', 'Anne Frank', '1947', 'O Diário de Anne Frank é um livro escrito por Anne Frank entre 12 de junho de 1942 e 1.º de agosto de 1944 durante a Segunda Guerra Mundial. É conhecido por narrar momentos vivenciados pelo grupo de judeus confinado num esconderijo durante a ocupação nazista dos Países Baixos. Publicado originalmente com o título de Het Achterhuis. Dagboekbrieven 14 Juni 1942 – 1 Augustus 1944 (O Anexo: Notas do Diário 14 de junho de 1942 - 1º de agosto de 1944) pela editora \"Contact Publishing\" em Amsterdã em 1947, o diário recebeu ampla atenção popular e da crítica após sua publicação inglês intitulada \"Anne Frank: The Diary of a Young Girl\" pela Doubleday & Company (Estados Unidos) e Vallentine Mitchell (Reino Unido) em 1952.\r\n\r\nSuas anotações foram declaradas pela Organização das Nações Unidas para a Educação, a Ciência e a Cultura (Unesco) como patrimônio da humanidade. Além disso, o livro figura na 19a posição da lista Os 100 livros do século segundo o Le Monde', 15, 'Autobiografia', 'Não', 'Português', '3', 294);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro_favorito`
--

CREATE TABLE `livro_favorito` (
  `id_favorito` int(11) NOT NULL,
  `id_livro_favorito` int(11) NOT NULL,
  `id_usuario_favorito` int(11) NOT NULL,
  `data_favorito` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `livro_favorito`
--

INSERT INTO `livro_favorito` (`id_favorito`, `id_livro_favorito`, `id_usuario_favorito`, `data_favorito`) VALUES
(7, 8, 4, '2019-11-10 23:21:30'),
(8, 8, 4, '2019-11-10 23:33:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `id_usuario_post` int(11) NOT NULL,
  `post` varchar(2000) DEFAULT NULL,
  `data_inclusao` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`id_post`, `id_usuario_post`, `post`, `data_inclusao`) VALUES
(1, 1, '123', '2019-08-31 14:02:18'),
(2, 123, 'sd', '2019-08-31 15:53:03'),
(3, 0, 'ddfcddf', '2019-08-31 15:54:53'),
(4, 0, 'oi', '2019-08-31 16:51:26'),
(5, 0, 'oioi', '2019-08-31 16:51:40'),
(6, 0, 'test', '2019-08-31 16:58:01'),
(7, 0, 'test', '2019-08-31 16:58:50'),
(31, 6, 'h', '2019-10-06 23:11:42'),
(32, 6, 'hhh', '2019-10-06 23:11:53'),
(33, 6, 'oi', '2019-10-06 23:13:45'),
(34, 6, 'oi', '2019-10-06 23:13:50'),
(35, 6, 'oi', '2019-10-06 23:13:58'),
(43, 4, 'O que farei hoje? Fim de semana em casa? ;D', '2019-10-26 10:25:04'),
(44, 4, 'heyyy, estou viajando, pessoal!', '2019-10-26 10:25:17'),
(48, 4, 'Estou tão cansadinha hoje! Qual livros vocês estam lendo hoje?', '2019-10-26 10:32:26'),
(49, 84, 'Pessoal, estou acabando de ler a Sutil Arte de Ligar o Fod*-se! Muito Bom recomendo!', '2019-10-26 10:33:15'),
(54, 4, 'hey', '2019-10-26 10:35:06'),
(56, 87, 'Oi, gente. Comecei a usar esse app hoje! O que se passa por aqui?', '2019-10-27 15:22:20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone_usuario`
--

CREATE TABLE `telefone_usuario` (
  `id_fone` int(11) NOT NULL,
  `id_usuario_fone` int(11) NOT NULL,
  `telefone1` varchar(13) DEFAULT NULL,
  `telefone2` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `telefone_usuario`
--

INSERT INTO `telefone_usuario` (`id_fone`, `id_usuario_fone`, `telefone1`, `telefone2`) VALUES
(10, 4, '11 9 8978 425', '7654 1620'),
(11, 5, '81 9 8905 948', '3535 4202'),
(25, 84, '81999533151', '81999533151'),
(27, 86, '81999533151', '81999533151'),
(28, 87, '33678899', '21314567');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(12) NOT NULL,
  `data_nasc` varchar(10) NOT NULL,
  `sexo` char(1) NOT NULL,
  `sobrenome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`, `data_nasc`, `sexo`, `sobrenome`) VALUES
(4, 'Lúcia Maranhão', 'luci.mara@yahoo.com', '444123', '22-09-2001', 'F', ''),
(5, 'Ricardo Roberto', 'ricardo_rob@hotmail.com', '123@321', '31-11-1995', 'M', ''),
(84, 'hugon', 'hugon@hot.com', '123', '2019-08-02', 'M', 'Campos'),
(86, 'Hug0x', 'hugox@hot.com', '123', '2019-10-12', 'M', 'Campos'),
(87, 'Bruno', 'bruno@hot.com', '4321', '1996-04-25', 'M', 'Telles');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_aluga`
--

CREATE TABLE `usuario_aluga` (
  `id_usuario_alug` int(11) NOT NULL,
  `id_livro_alug` int(11) NOT NULL,
  `data_aluguel` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario_aluga`
--

INSERT INTO `usuario_aluga` (`id_usuario_alug`, `id_livro_alug`, `data_aluguel`) VALUES
(4, 8, '2019-05-12 20:08:09'),
(5, 14, '2019-05-12 20:08:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_seguidores`
--

CREATE TABLE `usuario_seguidores` (
  `cod_usuario_seguidor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_usuario_que_sigo` int(11) NOT NULL,
  `data_registro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario_seguidores`
--

INSERT INTO `usuario_seguidores` (`cod_usuario_seguidor`, `id_usuario`, `id_usuario_que_sigo`, `data_registro`) VALUES
(78, 4, 84, '2019-10-25 20:16:15'),
(79, 4, 86, '2019-10-25 20:16:20'),
(80, 84, 86, '2019-10-27 12:02:42'),
(81, 87, 4, '2019-10-27 15:22:28'),
(82, 87, 84, '2019-10-27 15:22:30'),
(83, 87, 86, '2019-10-27 15:22:32'),
(84, 84, 5, '2019-10-27 15:25:02'),
(90, 84, 4, '2019-11-08 20:44:44'),
(92, 84, 87, '2019-11-10 11:24:35'),
(93, 4, 87, '2019-11-10 23:40:14'),
(94, 4, 5, '2019-11-10 23:40:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentario_livro`
--
ALTER TABLE `comentario_livro`
  ADD PRIMARY KEY (`COD_COMENTARIO`),
  ADD KEY `ID_LIVRO_COMENTADO` (`ID_LIVRO_COMENTADO`),
  ADD KEY `ID_USUARIO_COMENTOU` (`ID_USUARIO_COMENTOU`);

--
-- Indexes for table `endereco_usuario`
--
ALTER TABLE `endereco_usuario`
  ADD PRIMARY KEY (`id_end`),
  ADD KEY `id_usuario` (`id_usuario_end`);

--
-- Indexes for table `historico_usuario`
--
ALTER TABLE `historico_usuario`
  ADD PRIMARY KEY (`id_historico`),
  ADD KEY `id_usuario_historico` (`id_usuario_historico`);

--
-- Indexes for table `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id_livro`);

--
-- Indexes for table `livro_favorito`
--
ALTER TABLE `livro_favorito`
  ADD PRIMARY KEY (`id_favorito`),
  ADD KEY `id_livro_favorito` (`id_livro_favorito`),
  ADD KEY `id_usuario_favorito` (`id_usuario_favorito`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `telefone_usuario`
--
ALTER TABLE `telefone_usuario`
  ADD PRIMARY KEY (`id_fone`),
  ADD KEY `id_usuario` (`id_usuario_fone`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indexes for table `usuario_aluga`
--
ALTER TABLE `usuario_aluga`
  ADD PRIMARY KEY (`id_usuario_alug`,`id_livro_alug`,`data_aluguel`),
  ADD KEY `id_livro_alug` (`id_livro_alug`);

--
-- Indexes for table `usuario_seguidores`
--
ALTER TABLE `usuario_seguidores`
  ADD PRIMARY KEY (`cod_usuario_seguidor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentario_livro`
--
ALTER TABLE `comentario_livro`
  MODIFY `COD_COMENTARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `endereco_usuario`
--
ALTER TABLE `endereco_usuario`
  MODIFY `id_end` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `historico_usuario`
--
ALTER TABLE `historico_usuario`
  MODIFY `id_historico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `livro`
--
ALTER TABLE `livro`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `livro_favorito`
--
ALTER TABLE `livro_favorito`
  MODIFY `id_favorito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `telefone_usuario`
--
ALTER TABLE `telefone_usuario`
  MODIFY `id_fone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `usuario_seguidores`
--
ALTER TABLE `usuario_seguidores`
  MODIFY `cod_usuario_seguidor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
  
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comentario_livro`
--
ALTER TABLE `comentario_livro`
  ADD CONSTRAINT `comentario_livro_ibfk_1` FOREIGN KEY (`ID_LIVRO_COMENTADO`) REFERENCES `livro` (`id_livro`),
  ADD CONSTRAINT `comentario_livro_ibfk_2` FOREIGN KEY (`ID_USUARIO_COMENTOU`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `endereco_usuario`
--
ALTER TABLE `endereco_usuario`
  ADD CONSTRAINT `endereco_usuario_ibfk_1` FOREIGN KEY (`id_usuario_end`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `historico_usuario`
--
ALTER TABLE `historico_usuario`
  ADD CONSTRAINT `historico_usuario_ibfk_1` FOREIGN KEY (`id_usuario_historico`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `livro_favorito`
--
ALTER TABLE `livro_favorito`
  ADD CONSTRAINT `livro_favorito_ibfk_1` FOREIGN KEY (`id_livro_favorito`) REFERENCES `livro` (`id_livro`),
  ADD CONSTRAINT `livro_favorito_ibfk_2` FOREIGN KEY (`id_usuario_favorito`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `telefone_usuario`
--
ALTER TABLE `telefone_usuario`
  ADD CONSTRAINT `telefone_usuario_ibfk_1` FOREIGN KEY (`id_usuario_fone`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `usuario_aluga`
--
ALTER TABLE `usuario_aluga`
  ADD CONSTRAINT `usuario_aluga_ibfk_1` FOREIGN KEY (`id_usuario_alug`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `usuario_aluga_ibfk_2` FOREIGN KEY (`id_livro_alug`) REFERENCES `livro` (`id_livro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
