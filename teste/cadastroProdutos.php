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

    
    // Verifica se o array "marca_produto" existe no $_POST
   
    if(isset($_POST["contador"])) {
        // Atribui o número de contêineres à variável $contador
        $contador = $_POST["contador"];

        // Loop para iterar sobre cada contêiner de marca
        for ($i = 1; $i <= $contador; $i++) {
            // Obtém o valor da marca do contêiner atual
            $marca = $_POST["marca_produto_$i"];
            
            // Executa o SQL correspondente para adicionar a marca
            $sql = "ALTER TABLE produtos ADD marca_produto_$i VARCHAR(255)";

            if(mysqli_query($dbcon, $sql)) {
                echo "Coluna 'marca_produto_$i' adicionada com sucesso.<br>";
            } else {
                echo "Erro ao adicionar coluna 'marca_produto_$i': " . mysqli_error($dbcon) . "<br>";
            }
        }
    } else {
        echo "Nenhum contêiner de marca foi enviado.";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

 

    function enviarFormulario() {
    
            var formulario = document.getElementById("formulario_cadastroProdutos");
            formulario.submit();
        
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







var i = 0;

function adicionarMarca() {
   i++;

  
  // Cria um novo elemento div para agrupar os inputs do produto
  var novoContainerMarcas = document.createElement("div");
    novoContainerMarcas.className = "containerMarcas";

   

   var pMarca = document.createElement("p");
    pMarca.innerHTML = "Marca";
    var inputMarca = document.createElement("input");
    inputMarca.type = "text";
    inputMarca.name = "marca_produto_" + i;
    console.log(inputMarca) // Correção: adicione [] ao nome
    pMarca.appendChild(inputMarca);

    // Cria os inputs para o novo produto
    var pModelo = document.createElement("p");
    pModelo.innerHTML = "Modelo";
    var inputModelo = document.createElement("input");
    inputModelo.type = "text";
    inputModelo.name = "modelo_produto_edital[]"; // Correção: adicione [] ao nome
    console.log(inputModelo);
    pModelo.appendChild(inputModelo);

    var pVlrCompra = document.createElement("p");
    pVlrCompra.innerHTML = "VLR Compra";
    var inputVlrCompra = document.createElement("input");
    inputVlrCompra.type = "text";
    inputVlrCompra.name = "valor_compra_produto[]"; // Correção: adicione [] ao nome
    pVlrCompra.appendChild(inputVlrCompra);

    
    var pVlrVenda = document.createElement("p");
    pVlrVenda.innerHTML = "VLR Venda";
    var inputVlrVenda = document.createElement("input");
    inputVlrVenda.type = "text";
    inputVlrVenda.name = "valor_venda_produto[]"; // Correção: adicione [] ao nome
    pVlrVenda.appendChild(inputVlrVenda);


    var pVlrCusto = document.createElement("p");
    pVlrCusto.innerHTML = "VLR Custo";
    var inputVlrCusto = document.createElement("input");
    inputVlrCusto.type = "text";
    inputVlrCusto.name = "valor_custo_produto[]"; // Correção: adicione [] ao nome
    pVlrCusto.appendChild(inputVlrCusto);


    var pValorRefProdutoEdital = document.createElement("p");
    pValorRefProdutoEdital.innerHTML = "Valor de referência";
    var InputValorRefProdutoEdital = document.createElement("input");
    InputValorRefProdutoEdital.type = "text";
    InputValorRefProdutoEdital.name = "valor_unit_ref_produto_edital[]"; // Correção: adicione [] ao nome
    pValorRefProdutoEdital.appendChild(InputValorRefProdutoEdital);

    novoContainerMarcas.appendChild(pMarca);
    novoContainerMarcas.appendChild(pModelo);
    novoContainerMarcas.appendChild(pValorRefProdutoEdital);
    novoContainerMarcas.appendChild(pVlrCompra);
    novoContainerMarcas.appendChild(pVlrVenda);
    novoContainerMarcas.appendChild(pVlrCusto);

    // Adiciona o container de produtos ao formulário
    var formulario = document.getElementById("formulario_cadastroProdutos");
    formulario.appendChild(novoContainerMarcas);


    /// input que vai levar o numero de marcas para o php
    var inputI = document.createElement("input");
    inputI.type = "hidden";
    inputI.name = "contador";
    inputI.value = i;
    formulario.appendChild(inputI);

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


<nav>
    <div class="nav-wrapper white" style="display: flex; align-items: center;">
    <a href="tabelaprodutos.php" id="sidebar-toggle" class="right"><i class="large material-icons" style="margin-left: 50px;color:black">arrow_back</i></a>
        <a href="paginaInicialAdmin.php" style="margin-left: auto;"><p class="black-text" style="margin-right: 60px;">Bem vindo! <?php echo $_SESSION['nome'] ?> </p></a>
        <i class="large material-icons brand-logo right" style="font-size: 50px;">account_circle</i>
    </div>
</nav>


<div class="container">
    <h2>Cadastro de Produtos</h2>
    <form id="formulario_cadastroProdutos" action="cadastroProdutos.php" method="post" enctype="multipart/form-data">
        <p>Descriçao Produto <input type="text" name="desc_produto" /></p>
        <p>Quantidade de Produtos<input type="text" name="qtd_produto" required /></p>
        <p>Unidade Produtos<input type="text" name="und_produto" required /></p>    
    </form>
    <p id="botaoAdicionarMarca" onclick="adicionarMarca()" class="enviar"><input type="button" class="blue-text" value="Adicionar Marca"></p>
    <p class="enviar"><input id="botaoEnviar" type="submit" value="Inserir" onclick="enviarFormulario()"></p>

    <p id="erroPreencher" class="red-text"> </p>
</div>

</div>


    


    
    <!-- Scripts Materialize -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>