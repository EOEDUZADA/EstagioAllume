<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "localhost";
    $dbname = "allume";
    $username = "root";
    $password = "";

    $dbcon = mysqli_connect($host, $username, $password, $dbname);

    if (!$dbcon) {
        die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
    }

    if (!isset($_POST["fileUpload"])) {
        $qtdproduto = mysqli_real_escape_string($dbcon, $_POST["qtd_produto"]);
        $undproduto = mysqli_real_escape_string($dbcon, $_POST["und_produto"]);
        $descproduto = mysqli_real_escape_string($dbcon, $_POST["desc_produto"]);
        $marcaproduto = mysqli_real_escape_string($dbcon, $_POST["marca_produto"]);
        $modeloproduto = mysqli_real_escape_string($dbcon, $_POST["modelo_produto"]);
        $valorcusto_produto = mysqli_real_escape_string($dbcon, $_POST["valor_custo_produto"]);
        $valorminimo_produto = mysqli_real_escape_string($dbcon, $_POST["valor_minimo_produto"]);
        $valorcadastro_produto = mysqli_real_escape_string($dbcon, $_POST["valor_cadastro_produto"]);
    

    // Insere a string de nomes de arquivos no banco de dados
    $sql_code = "INSERT INTO produtos (qtd_produto, und_produto, desc_produto, marca_produto, modelo_produto, valor_custo_produto, valor_minimo_produto, valor_cadastro_produto) VALUES ('$qtdproduto', '$undproduto', '$descproduto', '$marcaproduto', '$modeloproduto', '$valorcusto_produto', '$valorminimo_produto', '$valorcadastro_produto')";


    // Executar a consulta SQL
    if (mysqli_query($dbcon, $sql_code)) {
        echo "Dados inseridos com sucesso";
    } else {
        echo "Erro na consulta de inserção: " . mysqli_error($dbcon);
    }
} else {
    // Se $arquivos não for um array, exiba uma mensagem de erro
    echo "Erro ao processar os arquivos.";
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">

    <style>

.brand-logo { 
    color: black;
    display: flex;
   
}

nav .brand-logo {
    color:black;
}
        </style>
    <script>

    function validarFormulario() {
        var qtdproduto = document.getElementsByName("qtd_produto")[0].value;
        var undproduto = document.getElementsByName("und_produto")[0].value;
        var descproduto = document.getElementsByName("desc_produto")[0].value;
        var marcaproduto = document.getElementsByName("marca_produto")[0].value;
        var modeloproduto = document.getElementsByName("modelo_produto")[0].value;
        var valorcusto_produto = document.getElementsByName("valor_custo_produto")[0].value;
        var valorminimo_produto = document.getElementsByName("valor_minimo_produto")[0].value;
        var valorcadastro_produto = document.getElementsByName("valor_cadastro_produto")[0].value;

        var erroPreencher = document.getElementById("erroPreencher");

        if (qtdproduto === "" || undproduto === "" || descproduto === "" || marcaproduto === "" || modeloproduto === "" || valorcusto_produto === "" || valorminimo_produto === "" || valorcadastro_produto === "" ) {

            erroPreencher.innerHTML = "Preencha todos os campos obrigatórios!";
          
            return false; // Impede o envio do formulário
        }

        erroPreencher.innerHTML = "";

        return true; // Permite o envio do formulário
    }

    function enviarFormulario() {
        if (validarFormulario()) {
            var formulario = document.getElementById("formulario_edital");
            formulario.submit();
        }
    }

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

</head>
<style>
  body {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-color: #f5f5f5;
}

.container {
    max-width: 700px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #333;
    text-align: center;
}

form {
    display: flex;
    flex-direction: column;
}

p {
    margin-bottom: 15px;
}

input[type="text"],
input[type="file"],
input[type="submit"] {
    margin-bottom: 15px;
    padding: 10px;
    border-bottom: 1px solid yellow;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 100%;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: black;
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: green;
}
button{
    width: 100%;
    border: 1px solid #ccc;
}

[type="radio"]:checked+span:after,[type="radio"].with-gap:checked+span:after {
    background-color: yellow;
}
[type="radio"]:checked+span:after,[type="radio"].with-gap:checked+span:before,[type="radio"].with-gap:checked+span:after {
    border: 2px solid #ffffff
}

</style>
<body>


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
        <li><a href="editais.php">Registro De Editais</a></li>
        <li><a href="tabelaeditais.php">Editais</a></li>
        <li><a href="cadastroProdutos.php">Cadastro Produtos</a></li>
        <li><a href="sair.php">Sair</a></li>
    </ul>
</div>

<div class="container">
    <h2>Cadastro de Produtos</h2>
    <form id="formulario_edital" action="cadastroProdutos.php" method="post" enctype="multipart/form-data">
        <p>Descriçao Produto <input type="text" name="desc_produto" /></p>
        <p>Quantidade de Produtos<input type="text" name="qtd_produto" required /></p>
        <p>Unidade Produtos<input type="text" name="und_produto" required /></p>
        <p>Marca Produto <input type="text" name="marca_produto" /></p>
        <p>Modelo Produto <input type="text" name="modelo_produto" /></p>
        <p>Valor de Custo <input type="text" name="valor_custo_produto" /></p>
        <p>Valor Minimo do Produto<input type="text" name="valor_minimo_produto" /></p>
        <p>Valor de Cadastro<input type="text" name="valor_cadastro_produto" /></p>
        
    
    </form>
    <p class="enviar"><input id="botaoEnviar" type="submit" value="Inserir" onclick="enviarFormulario()"></p>

    <p id="erroPreencher" class="red-text"> </p>
</div>

</div>


    


    
    <!-- Scripts Materialize -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>