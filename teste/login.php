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
                $funcao_usuario = mysqli_query($dbcon, "SELECT funcao_usuario from usuarios WHERE email_usuario = '$email_usuario'");
              

                $result_funcao_usuario = mysqli_fetch_assoc($funcao_usuario);
                $funcao_usuario = $result_funcao_usuario['funcao_usuario'];


                echo $funcao_usuario;
                

                if($funcao_usuario == 'ADMIN') {
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
    
<div class="sidebar">
    <img src="./img/logo3.png" id="brand-logo">
    <ul>
    <li>
        <a href="paginainicial.php" style="display: flex; align-items: center;">
            <i class="tiny material-icons">arrow_back</i>
            <span style="margin-left: 5px;">Voltar</span>
        </a>
    </li>
</ul>
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
                            <button type="login":hover>Log In</button>
                        </div>
                        
                    </form>
                    
                </div>
            </div>
        </div>
    
    
        
        
    
       </main>

       

</body>
</html>