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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">
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
  var elems = document.querySelectorAll('.sidenav');
  var instances = M.Sidenav.init(elems);

  var sidebarToggle = document.getElementById('sidebar-toggle');
  sidebarToggle.addEventListener('click', function() {
    var sidenavInstance = M.Sidenav.getInstance(elems[0]);
    sidenavInstance.isOpen ? sidenavInstance.close() : sidenavInstance.open();
    sidebarToggle.innerHTML = sidenavInstance.isOpen ? '<i class="material-icons" style="margin-left: 50px;">menu</i>' : '<i class="material-icons" style="margin-left: 50px;">menu</i>';

  });
});


document.addEventListener('DOMContentLoaded', function() {
        var dropdowns = document.querySelectorAll('.dropdown-trigger');
        M.Dropdown.init(dropdowns, {
            coverTrigger: false
        });
    });
</script>

<nav>
    <div class="nav-wrapper white" style="display: flex; align-items: center;">
        <a href="#" id="sidebar-toggle" class="right"><i class="material-icons" style="margin-left: 50px;">menu</i></a>
        <a href="paginaInicialAdmin.php" style="margin-left: auto;"><p class="black-text" style="margin-right: 60px;">Bem vindo! <?php echo $_SESSION['nome'] ?> </p></a>
        <i class="large material-icons brand-logo right" style="font-size: 50px;">account_circle</i>
    </div>
</nav>

    
<div id="sidebar" class="sidenav">
    <img src="./img/logo3.png" id="brand-logo">
    <ul>
        <li><a href="paginainicialadmin.php">Dashboard</a></li>
        <li><a href="usuarios.php">Usuários</a></li>
        <li><a href="tabelaeditais.php">Editais</a></li>
        <li><a href="tabelaprodutos.php">Produtos</a></li>
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
