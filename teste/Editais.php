<?php
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
        $nome_orgao = mysqli_real_escape_string($dbcon, $_POST["nome_orgao"]);
        $numero_edital = mysqli_real_escape_string($dbcon, $_POST["numero_edital"]);
        $numero_processo = mysqli_real_escape_string($dbcon, $_POST["numero_processo"]);
        $tipo_documento = mysqli_real_escape_string($dbcon, $_POST["tipo_documento"]);
        
        // Convertendo datas para o formato dd/mm/aaaa
        $data_final_edital = date('Y/m/d', strtotime($_POST["data_final_edital"]));
        $data_limite_orcamento = date('Y/m/d', strtotime($_POST["data_limite_orcamento"]));
        $data_cadastro_edital = date('Y/m/d', strtotime($_POST["data_cadastro_edital"]));
        
        $ext = $_FILES['fileUpload']['type']; // Pegando extensão do arquivo
        $nome = $_FILES['fileUpload']['name'];
        $new_name = date("Y.m.d-H.i.s") . $ext; // Definindo um novo nome para o arquivo
        $dir = 'uploads/'; // Diretório para uploads
        move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir.$nome); // Fazer upload do arquivo
        
        $sql_code = "INSERT INTO editais (nome_orgao, numero_edital, numero_processo, tipo_documento, data_final_edital, data_limite_orcamento_edital, data_cadastro_edital) VALUES ('$nome_orgao', '$numero_edital', '$numero_processo', '$tipo_documento', '$data_final_edital', '$data_limite_orcamento', '$data_cadastro_edital')";
        
        // Executar a consulta SQL
        if (mysqli_query($dbcon, $sql_code)) {
            echo "Dados inseridos com sucesso";
        } else {
            echo "Erro na consulta de inserção: " . mysqli_error($dbcon);
        }
        
        mysqli_close($dbcon);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script>
        function adicionarNovoUpload() {
            // Cria um novo elemento input de tipo arquivo
            var novoInput = document.createElement("input");
            novoInput.type = "file";
            novoInput.name = "arquivo";
            
           
            
            // Adiciona o novo input e o novo botão ao formulário existente
            var formulario = document.getElementById("formulario_edital");
            formulario.appendChild(novoInput);
            formulario.insertBefore(novoInput);
     

        }
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
    <div class="container">
        <h2>Cadastro de edital</h2>
        <form id="formulario_edital" action="editais.php" method="post" enctype="multipart/form-data">
            <p>Nome do orgão <input type="text" name="nome_orgao" required /></p>
            <p>Numero do edital <input type="text" name="numero_edital" required /></p>
            <p>Numero do processo  <input type="text" name="numero_processo" /></p>
            <p>Documento é SRP?</p>
            <p>
                <label>
                    <input name="tipo_documento" type="radio" value="SRP" />
                    <span>Sim</span>
                </label>
            </p>
            <p>
                <label>
                    <input name="tipo_documento" type="radio" value="NÃO" />
                    <span>Não</span>
                </label>
            </p>
            <p>Tipo de fornecimento</p>
            <p>
                <label>
                    <input name="tipo_fornecimento" type="radio" value="PRODUTO" />
                    <span>Produto</span>
                </label>
            </p>
            <p>
                <label>
                    <input name="tipo_fornecimento" type="radio" value="SERVIÇO" />
                    <span>Serviço</span>
                </label>
            </p>
            <p>
                <label>
                    <input name="tipo_fornecimento" type="radio" value="PRODUTOS_SERVIÇOS" />
                    <span>Produtos e Serviços</span>
                </label>
            </p>
            <p>Data final  <input type="date" name="data_final_edital" required /></p>
            <p>Data limite para orçamento  <input type="date" name="data_limite_orcamento" required /></p>
            <p>Data de cadastro  <input type="date" name="data_cadastro_edital" required /></p>
            <input type="file" name="fileUpload">
           
            
        </form>
        <p onclick="adicionarNovoUpload()" class="enviar"><input type="submit" value="Adicionar novo upload"></p>
        
        <p class="enviar"><input type="submit" value="Inserir"></p> 
    </div>
    <div class="container">
        <button class="btn waves-effect waves-light black right" id="botaozao" type="submit" name="action">Editais Computados
            <i class="material-icons right">send</i>
        </button>
    </div>
    <!-- Scripts Materialize -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
