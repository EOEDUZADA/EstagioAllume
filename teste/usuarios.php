<?php


session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
    <link rel="stylesheet" href="css/styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>


<style>
table {
    width: 100%;
}

.brand-logo { 
    color: black;
    display: flex;
   
}

nav .brand-logo {
    color:black;
}

    </style>
<body>
<script>

document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.dropdown-trigger');
        var instances = M.Dropdown.init(elems, {
            alignment: 'right',
            hover: true,
            coverTrigger: false,
            constrainWidth: false
        });
    });

</script>

<nav>
    <div class="nav-wrapper light-blue darken-3" id="nav" style="display: flex; align-items: center;">
    <img src="./img/logo3.png" id="brand-logo" style="margin: 0;">
        <ul class="right" style="margin-left: 50px;">
            <li><a href="paginainicialadmin.php">Dashboard</a></li>
            <li><a href="usuarios.php">Usuários</a></li>
            <li><a href="tabelaeditais.php">Editais</a></li>
            <li><a href="tabelaprodutos.php">Produtos</a></li>
        </ul>
        <a href="paginaInicialAdmin.php" style="margin-left: auto;"><p class="white-text" style="margin-right: 60px;">Bem vindo! <?php echo $_SESSION['nome'] ?> </p></a>
        <i class="dropdown-trigger large material-icons brand-logo right "data-target="dropdown-account" style="font-size: 50px;color: white;">account_circle</i>
    </div>
    
</nav>

<ul id="dropdown-account" class="dropdown-content">
    <li><a href="sair.php">Sair</a></li>
</ul>

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
            echo "<table class='funcionarios' id='tabela_usuarios'>";
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
