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


        $item_edital = mysqli_real_escape_string($dbcon, $_POST["item_edital[]"]);
        $lote_produto_edital = mysqli_real_escape_string($dbcon, $_POST["lote_produto_edital[]"]);  
        $valor_ref_produto_edital = mysqli_real_escape_string($dbcon, $_POST["valor_unit_ref_produto_edital[]"]);   

        
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
            // Cria um novo elemento input de tipo arquivo
            var novoInput = document.createElement("input");
            novoInput.type = "file";
            novoInput.name = "fileUpload";
            
           
            
            // Adiciona o novo input e o novo botão ao formulário existente
            var formulario = document.getElementById("formulario_edital");
            formulario.appendChild(novoInput);
            formulario.insertBefore(novoInput);
     

        }


         
function adicionarNovoProduto() {



    var contador = 0;
    botaoAdicionarProduto = document.querySelector('#botaoAdicionarProduto'); 

            botaoAdicionarProduto.addEventListener('click', function() {


                contador++;

        // Cria um novo elemento div para agrupar os inputs do produto
        var novoProdutoDiv = document.createElement("div");
            novoProdutoDiv.className = "novo-produto";
            novoProdutoDiv.innerHTML = "Produto " + contador;

    


            var pItemEdital = document.createElement("p");
            pItemEdital.innerHTML = "Item do edital";



            var InputItemEdital = document.createElement("input");
            pItemEdital.appendChild(InputItemEdital);
            InputItemEdital.type = "text";
            InputItemEdital.name = "item_edital[]";


            var pLoteProdutoEdital = document.createElement("p");
            pLoteProdutoEdital.innerHTML = "Lote";

            var InputLoteProdutoEdital = document.createElement("input");
            pLoteProdutoEdital.appendChild(InputLoteProdutoEdital);
            InputLoteProdutoEdital.type = "text";
            InputLoteProdutoEdital.name = "lote_produto_edital[]";


            var pValorRefProdutoEdital = document.createElement("p");
            pValorRefProdutoEdital.innerHTML = "Valor de referência";

            var InputValorRefProdutoEdital = document.createElement("input");
            pValorRefProdutoEdital.appendChild(InputValorRefProdutoEdital);
            InputValorRefProdutoEdital.type = "text";
            InputValorRefProdutoEdital.name = "valor_unit_ref_produto_edital[]";


            // Adiciona o novo elemento div ao formulário
            var formulario = document.getElementById("formulario_edital");
            formulario.appendChild(novoProdutoDiv);
            formulario.appendChild(pItemEdital);
            formulario.appendChild(InputItemEdital);
            formulario.appendChild(pLoteProdutoEdital);
            formulario.appendChild(InputLoteProdutoEdital);
            formulario.appendChild(pValorRefProdutoEdital);
            formulario.appendChild(InputValorRefProduto);

            

            // Adiciona os inputs do produto dentro do novo elemento div
          
        });

            // Adiciona os inputs do produto dentro do novo elemento div
          
    }


    function enviarFormulario() {
        if (validarFormulario()) {
            var formulario = document.getElementById("formulario_edital");
            formulario.submit();
        }
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
button{
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
    
<div class="container">
    <h2>Cadastro de edital</h2>
    <form id="formulario_edital" action="testes.php" method="post" enctype="multipart/form-data">


    <p class="enviar"><input id="botaoEnviar" type="submit" value="Inserir" ></p>

    </form> 
    
    
    <p id="botaoAdicionarProduto" onclick="adicionarNovoProduto()" class="enviar"><input  type="button" class="blue-text" value="Adicionar novo Produto"></p>
    
</body>
</html>
