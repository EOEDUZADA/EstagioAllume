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
        $nome_orgao = mysqli_real_escape_string($dbcon, $_POST["nome_orgao_edital"]);
        $numero_edital = mysqli_real_escape_string($dbcon, $_POST["numero_edital"]);
        $numero_processo = mysqli_real_escape_string($dbcon, $_POST["numero_processo"]);
        $tipo_documento = mysqli_real_escape_string($dbcon, $_POST["tipo_documento"]);
        $tipo_fornecimento = mysqli_real_escape_string($dbcon, $_POST["tipo_fornecimento"]);
        $data_final_edital = date("Y-m-d H:i:s", strtotime($_POST["data_final_edital"]));
        $data_limite_orcamento = date("Y-m-d H:i:s", strtotime($_POST["data_limite_orcamento"]));
        date_default_timezone_set('America/Sao_Paulo');
        $data_cadastro_edital = date('Y-m-d H:i:s' , time());
        $nome_edital = $nome_orgao . ' - N° ' . $numero_edital;
    

        $item_edital = $_POST["item_edital"];
        $lote_produto_edital = $_POST["lote_produto_edital"];
        $valor_unit_ref_produto_edital = $_POST["valor_unit_ref_produto_edital"];
        $desc_produto_edital = $_POST["desc_produto_edital"];
        $qtd_produto_edital = $_POST["qtd_produto_edital"];
        $und_produto_edital = $_POST["und_produto_edital"];


        $arquivos = array();

        if (is_array($arquivos)) {

             $dir = 'uploads/';

            $nome_nova_pasta = " '$nome_orgao' '-' '$numero_edital'" ; // Remova a barra no final
            $nova_pasta = mkdir("uploads/$nome_nova_pasta", 0777, true); // Ajuste o caminho da pasta

            foreach ($_FILES['fileUpload']['tmp_name'] as $key => $tmp_name) {
                $nome_arquivo = $_FILES['fileUpload']['name'][$key];
                $caminho_arquivo = $dir . $nova_pasta . $nome_arquivo;
                $caminho_arquivo = "uploads/$nome_nova_pasta/$nome_arquivo"; // Caminho corrigido

                if (move_uploaded_file($tmp_name, $caminho_arquivo)) {
                    $arquivos[] = $nome_arquivo;
                } else {
                    echo "Erro ao fazer o upload do arquivo.";
                }
            }
        }

        $arquivos_string = implode(",", $arquivos);


        $sql_code_editais = "INSERT INTO editais (nome_orgao_edital, numero_edital, numero_processo, tipo_documento, tipo_fornecimento, data_final_edital, data_limite_orcamento_edital, data_cadastro_edital , arquivo_edital) 
        VALUES ('$nome_orgao', '$numero_edital', '$numero_processo', '$tipo_documento', '$tipo_fornecimento', NOW(), NOW(), '$data_cadastro_edital', '$arquivos_string')";
        

        if ($dbcon->query($sql_code_editais) === TRUE) {
            $edital_id = $dbcon->insert_id;

            $sql_code_produtos = "INSERT INTO produtos_do_edital (id_edital, item_edital, lote_produto_edital, valor_unit_ref_produto_edital, desc_produto_edital, qtd_produto_edital, und_produto_edital) VALUES  ";
            $values = array();

            
            foreach ($item_edital as $key => $item) {
                // Obtém e escapa os valores dos campos
                $item_edital_value = mysqli_real_escape_string($dbcon, $item);
                $lote_produto_edital_value = mysqli_real_escape_string($dbcon, $lote_produto_edital[$key]);
                $valor_unit_ref_produto_edital_value = mysqli_real_escape_string($dbcon, $valor_unit_ref_produto_edital[$key]);
                $desc_produto_edital_value = mysqli_real_escape_string($dbcon, $desc_produto_edital[$key]);
                $qtd_produto_edital_value = mysqli_real_escape_string($dbcon, $qtd_produto_edital[$key]);
                $und_produto_edital_value = mysqli_real_escape_string($dbcon, $und_produto_edital[$key]);
            
                // Adiciona os valores escapados ao array de valores
                $values[] = "('$edital_id', '$item_edital_value', '$lote_produto_edital_value', '$valor_unit_ref_produto_edital_value','$desc_produto_edital_value','$qtd_produto_edital_value','$und_produto_edital_value')";
            }


           
            $sql_code_produtos .= implode(",", $values);

      

            if ($dbcon->query($sql_code_produtos) === TRUE) {
                echo "Produtos inseridos com sucesso!";
            } else {
                echo "Erro ao inserir produtos: " . $dbcon->error;
            }
        } else {
            echo "Erro ao inserir edital: " . $dbcon->error;
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">
    <script>
        function adicionarNovoUpload() {
            var novoInput = document.createElement("input");
            novoInput.type = "file";
            novoInput.name = "fileUpload";

            var formulario = document.getElementById("formulario_edital");
            formulario.appendChild(novoInput);
        }

    

function adicionarNovoProduto() {
    

    // Cria um novo elemento div para agrupar os inputs do produto
    var novoContainerProdutos = document.createElement("div");
    novoContainerProdutos.className = "containerProdutos";
   
   var pLoteProdutoEdital = document.createElement("p");
    pLoteProdutoEdital.innerHTML = "Lote";
    var InputLoteProdutoEdital = document.createElement("input");
    InputLoteProdutoEdital.type = "text";
    InputLoteProdutoEdital.name = "lote_produto_edital"; // Correção: adicione [] ao nome
    pLoteProdutoEdital.appendChild(InputLoteProdutoEdital);

    // Cria os inputs para o novo produto
    var pItemEdital = document.createElement("p");
    pItemEdital.innerHTML = "Item";
    var InputItemEdital = document.createElement("input");
    InputItemEdital.type = "text";
    InputItemEdital.name = "item_edital[]"; // Correção: adicione [] ao nome
    pItemEdital.appendChild(InputItemEdital);

    var pDescProdutoEdital = document.createElement("p");
    pDescProdutoEdital.innerHTML = "Descrição do produto";
    var InputDescProdutoEdital = document.createElement("input");
    InputDescProdutoEdital.type = "text";
    InputDescProdutoEdital.name = "desc_produto_edital[]"; // Correção: adicione [] ao nome
    pDescProdutoEdital.appendChild(InputDescProdutoEdital);

    
    var pQuantidadeProdutoEdital = document.createElement("p");
    pQuantidadeProdutoEdital.innerHTML = "Quantidade";
    var InputQuantidadeProdutoEdital = document.createElement("input");
    InputQuantidadeProdutoEdital.type = "text";
    InputQuantidadeProdutoEdital.name = "qtd_produto_edital"; // Correção: adicione [] ao nome
    pQuantidadeProdutoEdital.appendChild(InputQuantidadeProdutoEdital);


    var pUndProdutoEdital = document.createElement("p");
    pUndProdutoEdital.innerHTML = "UND";
    var InputUndProdutoEdital = document.createElement("input");
    InputUndProdutoEdital.type = "text";
    InputUndProdutoEdital.name = "und_produto_edital"; // Correção: adicione [] ao nome
    pUndProdutoEdital.appendChild(InputUndProdutoEdital);


    var pValorRefProdutoEdital = document.createElement("p");
    pValorRefProdutoEdital.innerHTML = "Valor de referência";
    var InputValorRefProdutoEdital = document.createElement("input");
    InputValorRefProdutoEdital.type = "text";
    InputValorRefProdutoEdital.name = "valor_unit_ref_produto_edital[]"; // Correção: adicione [] ao nome
    pValorRefProdutoEdital.appendChild(InputValorRefProdutoEdital);

    novoContainerProdutos.appendChild(pLoteProdutoEdital);
    novoContainerProdutos.appendChild(pItemEdital);
    novoContainerProdutos.appendChild(pValorRefProdutoEdital);
    novoContainerProdutos.appendChild(pDescProdutoEdital);
    novoContainerProdutos.appendChild(pQuantidadeProdutoEdital);
    novoContainerProdutos.appendChild(pUndProdutoEdital);

    // Adiciona o container de produtos ao formulário
    var formulario = document.getElementById("formulario_edital");
    formulario.appendChild(novoContainerProdutos);
}


        function validarFormulario() {
            var nomeOrgao = document.getElementsByName("nome_orgao_edital")[0].value;
            var numeroEdital = document.getElementsByName("numero_edital")[0].value;
            var dataFinalEdital = document.getElementsByName("data_final_edital")[0].value;
            var dataLimiteOrcamento = document.getElementsByName("data_limite_orcamento")[0].value;
            var tipoDocumento = document.querySelector('input[name="tipo_documento"]:checked');
            var tipoFornecimento = document.querySelector('input[name="tipo_fornecimento"]:checked');
            var erroPreencher = document.getElementById("erroPreencher");

            if (nomeOrgao === "" || numeroEdital === "" || dataFinalEdital === "" || dataLimiteOrcamento === "" || !tipoDocumento) {
                erroPreencher.innerHTML = "Preencha todos os campos obrigatórios!";
                return false;
            }

            erroPreencher.innerHTML = "";
            return true;
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

    
    </script>
</head>
<style>

    .brand-logo { 
    color: black;
    display: flex;
   
}

nav .brand-logo {
    color:black;
}

.containerProdutos{
    padding: 20px;
  
  border-radius: 5px;
width:100%;

margin-top: 20px;
box-shadow: 0px 0px 6px 0px rgba(59,59,59,0.75);
-webkit-box-shadow: 0px 0px 6px 0px rgba(59,59,59,0.75);
-moz-box-shadow: 0px 0px 6px 0px rgba(59,59,59,0.75);
}

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

    input[type="button"] {
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

    button {
        width: 100%;
        border: 1px solid #ccc;
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

    button {
        width: 100%;
        border: 1px solid #ccc;
    }

    [type="radio"]:checked+span:after,
    [type="radio"].with-gap:checked+span:after {
        background-color: yellow;
    }

    [type="radio"]:checked+span:after,
    [type="radio"].with-gap:checked+span:before,
    [type="radio"].with-gap:checked+span:after {
        border: 2px solid #ffffff;
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
        <li><a href="tabelaeditais.php">Editais</a></li>
        <li><a href="tabelaprodutos.php">Produtos</a></li>
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

        <p>Modalidade do edital</p>
        <p>
            <label>
                <input name="modalidade_edital" type="radio" value="SRP" />
                <span>Sim</span>
            </label>
        </p>
        <p>
            <label>
                <input name="modalidade_edital" type="radio" value="NORMAL" />
                <span>Não</span>
            </label>
      
        <p>Data final <input type="datetime-local" name="data_final_edital" required /></p> <!-- Colocar hora -->
        <p>Data limite para orçamento <input type="datetime-local" name="data_limite_orcamento" required /></p>  <!-- Colocar hora -->

        <input type="file" name="fileUpload[]" multiple>
    </form>
    <p id="botaoAdicionarProduto" onclick="adicionarNovoProduto()" class="enviar"><input type="button" class="blue-text" value="Adicionar novo Produto"></p>
    <p onclick="adicionarNovoUpload()" class="enviar"><input type="submit" value="Adicionar novo upload"></p>
    <p class="enviar"><input id="botaoEnviar" type="submit" value="Inserir" onclick="enviarFormulario()"></p>
    <p id="erroPreencher" class="red-text"> </p>
</div>


<!-- Scripts Materialize -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
