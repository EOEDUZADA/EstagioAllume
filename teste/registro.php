<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $host = "localhost";
    $dbname = "allume";
    $username = "root";
    $password = "";

    // Conexão com o banco de dados MySQL
    $dbcon = mysqli_connect($host, $username, $password, $dbname);

    // Verifica se a conexão foi bem sucedida
    //if (!$dbcon) {
    //    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
    //} else {
    //    echo "Conectado ao banco de dados";
    //}

    if (isset($_GET["email_usuario"]) && isset($_GET["password_usuario"]) && isset($_GET["nome_usuario"])) {
        $nome_usuario = mysqli_real_escape_string($dbcon, $_GET["nome_usuario"]);
        $email_usuario = mysqli_real_escape_string($dbcon, $_GET["email_usuario"]);
        $hash = password_hash($_GET["password_usuario"], PASSWORD_DEFAULT);

            $verifica_usuario_existente = "SELECT email_usuario FROM usuarios WHERE email_usuario = '$email_usuario'";
            $result = mysqli_query($dbcon, $verifica_usuario_existente);

            if ($result) {
                $num_rows = mysqli_num_rows($result);

                if ($num_rows > 0) {
                    echo 'Usuário já existe';
                    $valor_verifica_usuario = mysqli_fetch_assoc($result)['email_usuario'];
                    echo "ID do usuário: " . $valor_verifica_usuario;
                } else {
                    $funcao_usuario = mysqli_real_escape_string($dbcon, $_GET["funcao_usuario"]);
                    $query_insert = "INSERT INTO usuarios (nome_usuario, email_usuario, password_usuario, funcao_usuario) VALUES ('$nome_usuario','$email_usuario','$hash','$funcao_usuario')";

                    if (mysqli_query($dbcon, $query_insert)) {
                        header("Location: login.php");
                    } else {
                        echo "Erro na consulta de inserção: " . mysqli_error($dbcon);
                    }
                }
            }
        }
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($dbcon);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/styles.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>

<div class="sidebar">
    <img src="./img/logo3.png" id="brand-logo">
    <ul>
        <li>Dashboard</li>
        <li><a href="editais.php">Usuários</a></li>
        <li><a href="editais.php">Produtos</a></li>
        <li><a href="tabelaeditais.php">Editais</a></li>
        <li><a href="sair.php">Sair</a></li>
    </ul>
</div>

    <main>

    <div class="main-content">
    <div class="formulario">
        <div class="form-toggle"></div>
        <div class="form-panel one">
            <div class="form-header">
                <h1>Registre-se</h1>
            </div>
            <div class="form-content">
                <form action="registro.php" method="GET">
                    <div class="form-group">
                        <label for="nome_usuario">Nome de Usuário</label>
                        <input type="text" id="nome_usuario" name="nome_usuario" required="required" />
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" id="password" name="password_usuario" required="required" />
                    </div>
                    <div class="form-group">
                    <label>
                        Email: <input type="email" name="email_usuario" required>
                    </label>
                </div>

             
                <p>Função do funcionário</p>

                
            <p>
                <label>
                    <input name="funcao_usuario" type="radio" value="OPERACIONAL" />
                    <span>Operacional</span>
                </label>
            </p>
            <p>
                <label>
                    <input name="funcao_usuario" type="radio" value="ADMIN" />
                    <span>Admin</span>
                </label>
            </p>

            <p>
                <label>
                    <input name="funcao_usuario" type="radio" value="FINANCEIRO" />
                    <span>Financeiro</span>
                </label>
            </p>

          
                    <div class="form-group">
                        <button type="submit">Registrar</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

</div>
    </main>
</body>
</html>



