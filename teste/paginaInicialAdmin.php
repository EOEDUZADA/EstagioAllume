<?php
session_start();


$host = "localhost";
$dbname = "allume";
$username = "root";
$password = "";

$dbcon = mysqli_connect($host, $username, $password, $dbname);

if (!$dbcon) {
    die("Erro ao conectar ao banco de dados: " . mysqli_last_error());
}



$query_usuarios = "SELECT * from usuarios";

// Fecha a conexão

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicial do Admin</title>
    <link rel="stylesheet" href="css/styles.css">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>



<div class="wrapper navbar-fixed">
        <nav class="nav-extended black">
            <div class="nav-wrapper">
              <a href="#" class="brand-logo yellow-text" id="brand-nav">Allumé</a>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                
              </ul>
            </div>
            <div class="nav-content">
              <ul class="tabs tabs-transparent hide-on-med-and-up ">
                <li class="tab"><a href="#test1">Test 1</a></li>
                <li class="tab"><a class="active" href="#test2">Test 2</a></li>
                <li class="tab disabled"><a href="#test3">Disabled Tab</a></li>
                <li class="tab"><a href="login.php">Login</a></li>
              </ul>
            </div>
          </nav>
        
          </div>


    <header>
        <h1>Perfil de <?php echo $_SESSION['nome']; ?></h1>
    </header>

    <section class="borrowed-books">
        <h2>Usuários cadastrados</h2>

        <?php
    $result_emprestimos = mysqli_query($dbcon, $query_usuarios);


    if ($result_emprestimos) {
        $num_rows = mysqli_num_rows($result_emprestimos);
        
        if ($num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result_emprestimos)) {
                echo "<div class='book'>";
                echo "<h3> Nome:" . $row["nome_usuario"] . "</h3>";
                echo "<p>Email: " . $row["email_usuario"] . "</p>";
    
             
                echo "<form action='excluir_usuario.php' method='post'>";
                echo "<input type='hidden' name='id_usuario' value='" . $row["id_usuario"] . "'>";
                echo "<input type='submit' value='Excluir'></form>";
    
                echo "<form action='atualizar_usuario.php' method='post'>";
                echo "<input type='hidden' name='id_usuario' value='" . $row["id_usuario"] . "'>";
                echo "<input type='submit' value='Atualizar'></form>";
    

                echo "<form action='livros_emprestados_usuario.php' method='post'>";
                echo "<input type='hidden' name='id_usuario' value='" . $row["id_usuario"] . "'>";
                echo "<input type='submit' value='Ver livros emprestados'></form>";

                
    

                echo "</div>";
            }
        } else {
            echo "<p>Nenhum livro emprestado no momento.</p>";
        }
    
    }
        ?>
    </section>



</body>
</html>
