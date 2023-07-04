<?php
include_once('../conexao.mysqli.php');
include('verifica.php');


echo "<h1>Todos usuarios</h1><br>";
// Consulta SQL para selecionar todos os usuários
$sql = "SELECT * FROM usuarios ORDER BY id DESC";
$result = $mysqli->query($sql);

// Verificando se há resultados
if ($result->num_rows > 0) {
    // Exibindo a tabela
    echo "<table>";
    echo "<tr><th>Nome</th><th>Sobrenome</th><th>Email</th><th>Instituição</th><th>Curso</th><th>Pós-Graduação</th><th>Função</th><th>Aprovação</th><th>Alterar informação</th></tr>";
    
    // Loop através dos resultados
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        
        // Verificando se há nome social
        $nomeExibicao = !empty($row["nomesocial"]) ? $row["nomesocial"] : $row["nome"];
        echo "<td>" . $nomeExibicao . "</td>";
        echo"<td>". $row["sobrenome"]."</td>";
        
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["instituicao"] . "</td>";
        echo "<td>" . $row["curso"] . "</td>";
        echo "<td>" . $row["programaposgraduacao"] . "</td>";
       
        // Traduzindo a função do usuário
        $funcao = "";
        switch ($row["funcao"]) {
            case 0:
                $funcao ="Administrador";
                break;
            case 1:
                $funcao = "Editor";
                break;
            case 2:
                $funcao = "Avaliador";
                break;
            case 3:
                $funcao = "Gerente";
                break;
            default:
                $funcao = "Função desconhecida";
                break;
        }
        
        echo "<td>" . $funcao . "</td>";

        $aprovacao ="";
        switch($row["aprovacao"]){
            case 0:
                $aprovacao = "Aguardando aprovação";
                break;
            case 1:
                $aprovacao ="Aprovado";
                break;
            case 2:
                $aprovacao ="Rejeitado";
                break;
            default:
                $aprovacao = "Desconhecido";
                break;
        }
        echo "<td>" . $aprovacao . "</td>";

        echo "<td><a href='alterar.php?id=".$row["id"]."'>Alterar informação</a></td>";
        echo "</tr>";
    }
    
    echo "</table>";

    echo "<br>";
} else {
    echo "Nenhum usuário encontrado.";
}

?>
<a href="home.php">Voltar para página anterior</a>