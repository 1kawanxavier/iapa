<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IAPA</title>
</head>
<body>
<a href="index.php">
<img src="img/cropped-logo.png" alt="logotipo do Laima" ><span aria-label="Laboratory of Artificial Intelligence and Machine AID" lang="en-us">Laboratory of Artificial Intelligence and Machine AID</span> da Universidade Federal de Pernambuco (UFPE)</span>
</a>
<br>

<center><h1>Sobre Este Programa</h1></center>
<p>Agora são: <span id="horario"></span> <span id="saudacao"></span></p><br>

<script>
            var agora = new Date();
            var horas = agora.getHours();

            var saudacao = "";

            if (horas >= 1 && horas < 12) {
                saudacao = "Bom dia";
            } else if (horas >= 12 && horas < 18) {
                saudacao = "Boa tarde";
            } else {
                saudacao = "Boa noite";
            }

            var minutos = agora.getMinutes();
            var segundos = agora.getSeconds();

            // Formate a hora para exibir sempre dois dígitos
            if (horas < 10) {
                horas = "0" + horas;
            }
            if (minutos < 10) {
                minutos = "0" + minutos;
            }
            if (segundos < 10) {
                segundos = "0" + segundos;
            }

            // Atualize o conteúdo da span com o horário e a saudação
            document.getElementById("horario").textContent = horas + ":" + minutos + ":" + segundos;
            document.getElementById("saudacao").textContent = saudacao;
        </script>

<p>Este programa é um "Instrumento de Avaliação de Produção Acadêmica", desenvolvido pelo LAIMA-UFPE </p><p lang ='en'>(Laboratory of Artificial Intelligence and Machine Aid</p> da Universidade Federal de Pernambuco).</p>
        <p>Com o IAPA, os professores das instituições de Ensino Superior poderão avaliar trabalhos como TCCs, monografias, dissertações, teses e muitas outras produções acadêmicas, de acordo com as regras e quesitos determinados pelos PPGs ou cursos, no momento da criação dos seus respectivos instrumentos de avaliação.</p>
        <p>O IAPA permite que os professores produzam pareceres automatizados e individualizados, de acordo com o julgamento feito durante a avaliação das produções acadêmicas. Com o IAPA, é possível carregar o parecer online ou enviá-lo em PDF por e-mail, de modo seguro e rápido, para programas de pós-graduação, revistas, autores e outros, conforme a necessidade do julgador.</p>
        <p>Com o IAPA, a criação de instrumentos de avaliação de produções acadêmicas torna-se mais ágil e eficiente, permitindo que os professores dediquem mais tempo ao ensino e à pesquisa.</p>

<button onclick="window.location.href='index.php'" accesskey="1" title="Volta para a página inicial do IAPA">
  Voltar
</button>


</body>
</html>