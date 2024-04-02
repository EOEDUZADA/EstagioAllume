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
        $nome_orgao = mysqli_real_escape_string($dbcon, $_POST["nome_orgao_edital"]);
        $numero_edital = mysqli_real_escape_string($dbcon, $_POST["numero_edital"]);
        $numero_processo = mysqli_real_escape_string($dbcon, $_POST["numero_processo"]);
        $tipo_documento = mysqli_real_escape_string($dbcon, $_POST["tipo_documento"]);
        $tipo_fornecimento = mysqli_real_escape_string($dbcon, $_POST["tipo_fornecimento"]);
        $data_final_edital = mysqli_real_escape_string($dbcon, $_POST["data_final_edital"]);
        $data_limite_orcamento = mysqli_real_escape_string($dbcon, $_POST["data_limite_orcamento"]);
        $data_cadastro_edital = mysqli_real_escape_string($dbcon, $_POST["data_cadastro_edital"]);
    

        $arquivos = array();
      // Verifica se $arquivos é um array
if (is_array($arquivos)) {
    // Realiza o upload dos arquivos PDF
    $dir = 'uploads/'; // Diretório para uploads
    foreach ($_FILES['fileUpload']['tmp_name'] as $key => $tmp_name) {
        $nome_arquivo = $_FILES['fileUpload']['name'][$key];
        $caminho_arquivo = $dir . $nome_arquivo;
        
        if (move_uploaded_file($tmp_name, $caminho_arquivo)) {
            // Adiciona o nome do arquivo à lista de arquivos
            $arquivos[] = $nome_arquivo;
        } else {
            // Se ocorrer um erro ao fazer o upload do arquivo, exiba uma mensagem de erro
            echo "Erro ao fazer o upload do arquivo.";
        }
    }

    // Concatena os nomes dos arquivos em uma única string separada por vírgulas
    $arquivos_string = implode(",", $arquivos);

    // Insere a string de nomes de arquivos no banco de dados
    $sql_code = "INSERT INTO editais (nome_orgao_edital, numero_edital, numero_processo, tipo_documento, tipo_fornecimento, data_final_edital, data_limite_orcamento_edital, data_cadastro_edital, arquivo_edital) VALUES ('$nome_orgao', '$numero_edital', '$numero_processo', '$tipo_documento', '$tipo_fornecimento', '$data_final_edital', '$data_limite_orcamento', '$data_cadastro_edital', '$arquivos_string')";

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
    <script>
        function adicionarNovoUpload() {
            // Cria um novo elemento input de tipo arquivo
            var novoInput = document.createElement("input");
            novoInput.type = "file";
            novoInput.name = "fileUpload";
            
           
            
            // Adiciona o novo input e o novo botão ao formulário existente
            var formulario = document.getElementById("formulario_edital");
            formulario.appendChild(novoInput);
            formulario.insertBefore(novoInput);
     

        }

        function enviarFormulario() {
        var formulario = document.getElementById("formulario_edital");
        document.getElementById("botaoEnviar").click();
        formulario.submit();
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
    
<div class="sidebar">
    <img src="./img/logo3.png" id="brand-logo">
    <ul>
        <li><a href="paginainicialadmin.php">Dashboard</a></li>
        <li><a href="usuarios.php">Usuários</a></li>
        <li><a href="editais.php">Produtos</a></li>
        <li><a href="tabelaeditais.php">Editais</a></li>
        <li><a href="sair.php">Sair</a></li>
    </ul>
</div>

<div class="container">
    <h2>Cadastro de edital</h2>
    <form id="formulario_edital" action="editais.php" method="post" enctype="multipart/form-data">
        <p>Nome do orgão <input type="text" name="nome_orgao_edital" required /></p>
        <p>Numero do edital <input type="text" name="numero_edital" required /></p>
        <p>Numero do processo <input type="text" name="numero_processo" /></p>
        <p>Documento é SRP?</p>
        <p>
            <label>
                <input name="tipo_documento" type="radio" value="SRP" />
                <span>Sim</span>
            </label>
        </p>
        <p>
            <label>
                <input name="tipo_documento" type="radio" value="NORMAL" />
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
        <p>Data final <input type="date" name="data_final_edital" required /></p>
        <p>Data limite para orçamento <input type="date" name="data_limite_orcamento" required /></p>
        <p>Data de cadastro <input type="date" name="data_cadastro_edital" required /></p>
        <input type="file" name="fileUpload[]" multiple>


    
    </form>
    <p onclick="adicionarNovoUpload()" class="enviar"><input type="submit" value="Adicionar novo upload"></p>
    <p class="enviar"><input id="botaoEnviar" type="submit" value="Inserir" onclick="enviarFormulario()"></p>
</div>


    <div class="container">
       <a href="tabelaEditais.php"> <button class="btn waves-effect waves-light black right" id="botaozao" type="submit" name="action">Editais Computados </a>
            <i class="material-icons right">send</i>
        </button>
    </div>
    <!-- Scripts Materialize -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
