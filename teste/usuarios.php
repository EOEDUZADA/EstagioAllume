<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/styles.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Document</title>
</head>


<style>
table {
    width: 100%;
}
    </style>
<body>
    
<div class="sidebar">
    <img src="./img/logo3.png" id="brand-logo">
    <ul>
        <li>Dashboard</li>
        <li><a href="editais.php">Usuários</a></li>
        <li><a href="editais.php">Produtos</a></li>
        <li>Orçamentos</li>
        <li><a href="sair.php">Sair</a></li>
    </ul>
</div>

<div class="main-content">
<h4>Usuários</h4>
<section class="usuarios">
    <?php
    $host = "localhost";
    $dbname = "allume";
    $username = "root";
    $password = "";

    // Conexão com o banco de dados MySQL
    $dbcon = mysqli_connect($host, $username, $password, $dbname);

    // Verifica se a conexão foi bem sucedida

    $query_usuarios = "SELECT * FROM usuarios";
    $result_usuarios = mysqli_query($dbcon, $query_usuarios);

    // Verifique se há linhas retornadas
    if ($result_usuarios) {
        $num_rows = mysqli_num_rows($result_usuarios);

        if ($num_rows > 0) {
            // Exibir os usuários em uma tabela
            echo "<table class='responsive-table centered' id='tabela_usuarios'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Nome</th>";
            echo "<th>Email</th>";
            echo "<th>Função</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($row = mysqli_fetch_assoc($result_usuarios)) {
                echo "<tr>";
                echo "<td>" . $row["nome_usuario"] . "</td>";
                echo "<td>" . $row["email_usuario"] . "</td>";
                echo "<td>" . $row["funcao_usuario"] . "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            // Nenhum usuário encontrado
            echo "<p>Nenhum usuário encontrado.</p>";
        }
    } else {
        // Erro na consulta
        echo "Erro na consulta: " . mysqli_error($dbcon);
    }

    // Fechar conexão com o banco de dados
    mysqli_close($dbcon);
    ?>
</section>
</div>

</body>
</html>
