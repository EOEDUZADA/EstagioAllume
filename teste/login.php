<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $host = "localhost";
    $dbname = "allume";
    $username = "root";
    $password = "";

    $dbcon = mysqli_connect($host, $username, $password, $dbname);

    if (!$dbcon) {
        die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
    }

    if (isset($_GET["email_usuario"]) && isset($_GET["password_usuario"])) {
        $email_usuario = mysqli_real_escape_string($dbcon, $_GET["email_usuario"]);
        $senha_usuario = mysqli_real_escape_string($dbcon, $_GET["password_usuario"]);
        $dados_incorretos = '';

        $select_senha = mysqli_query($dbcon, "SELECT password_usuario, nome_usuario, id_usuario,funcao_usuario FROM usuarios WHERE email_usuario = '$email_usuario'");
        $result = mysqli_fetch_assoc($select_senha);

        if ($result) {
            $hash_senha = $result["password_usuario"];
            $verificar_senha = password_verify($senha_usuario, $hash_senha);

            if ($verificar_senha) {
                // Autenticação bem-sucedida
                $_SESSION['email'] = $email_usuario;
                $_SESSION['nome'] = $result["nome_usuario"];
                $_SESSION['id_usuario'] = $result["id_usuario"];

                if ($email_usuario == 'jonathan@allumers.com.br') {
                    header("Location: paginaInicialAdmin.php?id=" . $_SESSION['id_usuario']);
                }  elseif($funcao_usuario == 'OPERACIONAL'){
                    header("Location: index.php?id=" . $_SESSION['id_usuario']);
                }
                   elseif($funcao_usuario == 'ADMIN'){
                    header("Location: index.php?id=" . $_SESSION['id_usuario']);
                   }
                   elseif($funcao_usuario == 'FINANCEIRO'){
                    header("Location: index.php?id=" . $_SESSION['id_usuario']);
                   }
                exit;
            } else {
                $erro = "Senha incorreta. Tente novamente.";
            }
        } else {
            $erro = "Usuário não encontrado. Verifique o email e tente novamente.";
        }
    }

    mysqli_close($dbcon);
}
?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">
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

    <main>

    
        <div class="formulario">
            <div class="form-toggle"></div>
            <div class="form-panel one">
                <div class="form-header">
                    <h1>Entrar</h1>
                </div>
                <div class="form-content">
                    <form action="login.php" method="get">
                        <div class="form-group">
                            <label for="username">Email</label>
                            <input type="text" id="email_usuario" name="email_usuario" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" id="password" name="password_usuario" required="required" />
                        </div>

                        <?php

if (isset($erro)) {
    echo '<div class="erro red-text">' . $erro . '</div>';
}
   ?>

                        <div class="form-group">
                            <a class="form-recovery" href="#">Esqueceu a sua senha?</a>
                        </div>
                        <div class="form-group">
                            <a class="form-recovery" href="registro.php">Registre-se</a>
                        </div>
                        
                        <div class="form-group">
                            <button type="login":hover>Log In</button>
                        </div>
                        
                    </form>
                    
                </div>
            </div>
        </div>
    
    
        
        
    
       </main>

       

</body>
</html>