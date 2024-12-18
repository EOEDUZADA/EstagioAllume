<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css" />
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap" rel="stylesheet">
    
    <style>
        table {
            font-weight: 800 !important;
        }

  
        table {
            width: 100%;
        }

        
    .brand-logo { 
    color: black;
    display: flex;
   
}

nav .brand-logo {
    color:black;
}

.btn-detalhes {
    /* Adicione seus estilos personalizados aqui */
    background-color: #007bff;
    z-index: +2;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    text-decoration: none;
    
}

.btn-detalhes:hover {
    background-color: #0056b3;
    color: #fff;
}


.adiferente {
    color: black;
    text-decoration: none;  
}

.adiferente:hover {
   color: #5A57FF;
    
}

.botoesPaginacao a {
    margin-top: 20px;
}
.dropdown-content {
            border-radius: 5px;   
        }
    </style>




</head>

<body>
    

<nav>
    <div class="nav-wrapper light-blue darken-3" id="nav" style="display: flex; align-items: center;">
    <img src="./img/logo3.png" id="brand-logo" style="margin: 0;">
        <ul class="right" style="margin-left: 50px;">
            <li><a href="paginainicialadmin.php">Dashboard</a></li>
            <li><a href="usuarios.php">Usuários</a></li>
            <li><a href="tabelaeditais.php">Editais</a></li>
            <li><a href="tabelaprodutos.php">Produtos</a></li>
        </ul>
        <a href="paginaInicialAdmin.php" style="margin-left: auto;">
            <p class="white-text" style="margin-right: 60px;">Bem vindo! <?php echo $_SESSION['nome'] ?> </p>
        </a>
        <i class="dropdown-trigger large material-icons brand-logo right" data-target="dropdown-account" style="font-size: 50px;color: white;">account_circle</i>
    </div>
    
</nav>

<ul id="dropdown-account" class="dropdown-content">
    <li><a href="sair.php">Sair</a></li>
</ul>


<div class="main-content">
    <h4>Produtos</h4>
    <div class="container-botao-tabelaEditais">
 <div class="row">
        <div class="col s1">
            <button class="btn"><a href="adicionarProduto.php" class="adiferente">Adicionar Produtos</a></button>
        </div>
        <div class="col s1">
        <button class="btn">Imprimir</button>
        </div>
        <div class="col s1">
        <button class="btn">Excluir</button>
        </div>
        <div class="col s1">
        <button class="btn">Mais Ações</button>

        </div>
</div>
    
    <section class="usuarios">


    
        <?php
        $host = "localhost";
        $dbname = "allume";
        $username = "root";
        $password = "";

        // Conexão com o banco de dados MySQL
        $dbcon = mysqli_connect($host, $username, $password, $dbname);

        // Verifica se a conexão foi bem sucedida

        $resultados_por_pagina = 10;

      

        // Página atual (por padrão, a página 1)
        $pagina_atual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
        $offset = ($pagina_atual - 1) * $resultados_por_pagina;
        $query_produtos = "SELECT * FROM produtos LIMIT $resultados_por_pagina OFFSET $offset";
        $result_produtos = mysqli_query($dbcon, $query_produtos);
        $tem_mais_resultados = mysqli_num_rows($result_produtos) == $resultados_por_pagina;
        // Verifique se há linhas retornadas
        if ($result_produtos) {
           $num_rows = mysqli_num_rows($result_produtos);

                
            if ($num_rows > 0) {
                // Exibir os usuários em uma tabela
                echo "<table class='funcionarios' id='tabela_usuarios'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>ID</th>";  
                echo "<th>Produto</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";


               while ($row = mysqli_fetch_assoc($result_produtos)) {

                    echo "<tr>";
                    echo "<td onclick=\"enviarFormulario('" . $row['id_produto'] . "')\">" . $row["id_produto"] . "</td>";
                    echo "<td onclick=\"enviarFormulario('" . $row['id_produto'] . "')\">" . $row["nome_produto"] . "</td>";
                   echo "
                            <form id='formulario_info_produtos' method='post' action='infoProduto.php'>
                             <input type='hidden' id='id_produto' name='id' value='" . $row['id_produto'] . "'>
                            </form>";
                   
                    echo "</td>";
                    echo "</tr>";


          }
           echo "</tbody>";
           echo "</table>";
            

            } 
        } else {
            // Erro na consulta
            echo "Erro na consulta: " . mysqli_error($dbcon);
        }

        // Fechar conexão com o banco de dados
        mysqli_close($dbcon);
        ?>




    </section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>

$('.dropdown-trigger').dropdown();


function enviarFormulario(id) {
        // Obtém o formulário pelo ID
        var form = document.getElementById('formulario_info_produtos');
        // Define o valor do input hidden com o ID da linha clicada
        document.getElementById('id_produto').value = id;
        // Envia o formulário
        form.submit();
    }


    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems, {
        alignment: 'right',
        hover: true,
        coverTrigger: false,
        constrainWidth: false
    });
});
    </script>
      <div class="botoesPaginacao">
   <?php if ($pagina_atual > 1) { ?>
    <a class="left" href="?pagina=<?php echo $pagina_atual - 1; ?>">Página Anterior</a>
<?php } ?>

    
    <?php if ($tem_mais_resultados) { ?>
    <a class='right' href="?pagina=<?php echo $pagina_atual + 1; ?>">Próxima Página</a>
<?php } ?>
</div>
</body>

            
</html>
