<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>IAPA - Instrumento de Avaliação de Produção Acadêmica</title>
    <style>
        /* Estilos adicionais para melhorar a visualização */
        body {
            font-family: Arial, sans-serif;
        }
        
        h1 {
            font-size: 24px;
        }
        
        h3 {
            font-size: 18px;
        }
        
        a {
            display: block;
            margin-bottom: 10px;
        }
        
        .tooltip {
            position: relative;
            display: inline-block;
        }
        
        .tooltip .tooltiptext {
            visibility: hidden;
            width: 200px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -100px;
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
    </style>
</head>
<body>
<img src="img/cropped-logo.png" alt="Logotipo do Laima" lang='en'><span aria-label="Laboratory of Artificial Intelligence and Machine AID" lang="en-us">Laboratory of Artificial Intelligence and Machine AID</span> da Universidade Federal de Pernambuco (UFPE)</span>
    <?php
    include('conexao.mysqli.php');
    session_start();
    
    // Verifique se o usuário está logado (se o ID do usuário está definido na sessão)
    if (isset($_SESSION['id'])) {
        $idUsuario = $_SESSION['id'];
    
        // Consulta para obter todos os dados do usuário com base no ID
        $sql = "SELECT * FROM usuarios WHERE id = $idUsuario AND aprovacao = 1";
        $result = $mysqli->query($sql);
    
        if ($result->num_rows > 0) {
            // Exibe os dados do usuário
            $row = $result->fetch_assoc();
            $nomeUsuario = $row["nome"];
            $sobrenomeUsuario = $row["sobrenome"];
            $emailUsuario = $row["email"];
            $pronomeTratamento = $row["pronomeTratamento"];
            $pronomeReferencia = $row["pronomeReferencia"];
            $nomesocial = $row["nomesocial"];
            $funcao = $row["funcao"];
            // ... outros campos que você possui no banco de dados
    
            ?>
            <h1>Instrumento de avaliação de produção Acadêmica</h1>
            <p>Agora são: <span id="horario"></span> <span id="saudacao"></span></p><br>

            <strong>Oi, <?php echo $pronomeTratamento; echo " "; if ($nomesocial != null){echo $nomesocial;}else{echo $nomeUsuario; echo " "; echo $sobrenomeUsuario;} ?>, seja bem-vindo(a) ao IAPA.</strong>
    
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
    
    
            <br>
            <h2>
            <p>Sou, Laima, seu assistente online e estou aqui para ajudá-lo(a) a criar seu instrumento de avaliação de Produção acadêmica, ou se você desejar, guia-lo(a) a avaliar uma produção acadêmica, de forma simples e eficiente.</p>

            <p> Fique tranquilo(a), ou ajudá-lo(a) em todas as etapas do processo e garantir que você aproveite ao máximo todos os recursos que o IAPA tem a oferecer.</p>Siga minhas orientações e verá como vai ser fácil!</h2>

            <p>Para que eu saiba o que você pretende fazer, basta pressionar um dos botões abaixo. Estamos entendidos? Então, vamos começar. É com você agora.</p>

            <br>
            <?php
            if($funcao == 2 || $funcao == 3  || $funcao == 0){
                ?>
                <div class="tooltip">
                <a href="avaliacao.php"  accesskey="1" title="Alt + 1: Permite iniciar a avaliação de uma PA">
                    Avaliar uma Produção Acadêmica
                </a>
            </div><br>
            <?php
            }
            if($funcao == 2 || $funcao == 3  || $funcao == 0){
                ?>
            <div class="tooltip">
                <a href="http://" accesskey="2" title="Alt + 2: Permite retomar a avaliação de uma PA">
                    Continuar avaliação de uma produção acadêmica
                </a>
            </div><br>
                <?php } ?>
            <div class="tooltip">
                <a href="upload.php" accesskey="3" title="Alt + 3: Permite ver e interagir com suas avaliações salvas">
                   Banco de avaliações
                </a>
            </div><br>
            <?php
            if($funcao == 1 || $funcao == 3  || $funcao == 0){
                ?>
            <div class="tooltip">
                <a href="pagina_categoria.php" title="Alt + 4: Permite criar um novo IAPA" accesskey="4">
                    Criar um Instrumento de Avaliação de Produção Acadêmica
                </a>
            </div><br>
            <?php
            }if($funcao == 1 || $funcao == 3  || $funcao == 0){
                ?>
            <div class="tooltip">
                <a href="http://" accesskey="5" title="Alt + 5: Permite editar um IAPA em construção">
                    Continuar a edição de um Instrumento de Avaliação Acadêmica
                </a>
            </div><br><?php }?>
            <div class="tooltip">
                <a href="sair.php" title="Alt + 6: Será necessário fazer login para entrar no IAPA novamente" accesskey="6">
                    Voltar para a página inicial
                </a>
            </div>

            <br>

            <?php
           
        } else {
            echo "Nenhum usuário encontrado.";
        }
    
        $mysqli->close();
    } else {
        // Se o usuário não estiver logado, redirecione-o para a página de login
        header("Location: index.php");
        exit();
    }
    ?>
</body>
</html>
