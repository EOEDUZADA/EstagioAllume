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

.dropdown-content{
    border-radius: 5px;   
}
.card-body-2{
    display: none;
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
        <a href="paginaInicialAdmin.php" style="margin-left: auto;"><p class="white-text" style="margin-right: 60px;">Bem vindo! <?php echo $_SESSION['nome'] ?> </p></a>
        <i class="dropdown-trigger large material-icons brand-logo right "data-target="dropdown-account" style="font-size: 50px;color: white;">account_circle</i>
    </div>
    
</nav>

<ul id="dropdown-account" class="dropdown-content">
    <li><a href="sair.php">Sair</a></li>
</ul>

<div class="main-content">
    <h4>Editais <a href="editais.php" class="adiferente">-> Cadastro Editais</a></h4>
<div class="container-botao-tabelaEditais">
 <div class="row">
        <div class="col s1">
            <button class="btn">cadastro</button>
        </div>
        <div class="col s1">
        <button class="btn">imprimir</button>
        </div>
        <div class="col s1">
        <button class="btn">excluir</button>
        </div>
        <div class="col s1">
        <button class="btn">mais ações</button>

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

        $query_editais = "SELECT * FROM editais";
        $result_editais = mysqli_query($dbcon, $query_editais);

        // Verifique se há linhas retornadas
        if ($result_editais) {
           $num_rows = mysqli_num_rows($result_editais);

               
            if ($num_rows > 0) {
                // Exibir os usuários em uma tabela
                echo "<table class='funcionarios' id='tabela_editais'>";
                echo "<thead>";
                echo "<tr  >";
                echo "<th>ID</th>";  
                echo "<th>Nome do orgão</th>"; // Coluna clicável com link para "pagina_destino.php"
                echo "<th>Numero do edital</th>";
                echo "<th>Numero do processo</th>"; 
                echo "<th>SRP/NORMAL</th>";
                echo "<th>Tipo de fornecimento</th>";
                echo "<th>Data final do edital</th>";
                echo "<th>Data limite para orçamento</th>";
                echo "<th>Data de cadastro do edital</th>";
                echo "<th>Mais</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

            while ($row = mysqli_fetch_assoc($result_editais)) {

                    echo "<tr>";
                    echo "<td onclick=\"enviarFormulario('" . $row['id'] . "')\">" . $row["id"] . "</td>";
                    echo "<td onclick=\"enviarFormulario('" . $row['id'] . "')\" >" . $row["nome_orgao_edital"] . "</td>"; // Coluna clicável com link para "pagina_destino.php"
                    echo "<td onclick=\"enviarFormulario('" . $row['id'] . "')\">" . $row["numero_edital"] . "</td>";
                    echo "<td onclick=\"enviarFormulario('" . $row['id'] . "')\">" . $row["numero_processo"] . "</td>";
                    echo "<td onclick=\"enviarFormulario('" . $row['id'] . "')\">" . $row["tipo_documento"] . "</td>";
                    echo "<td onclick=\"enviarFormulario('" . $row['id'] . "')\">" . $row["tipo_fornecimento"] . "</td>";
                    echo "<td onclick=\"enviarFormulario('" . $row['id'] . "')\">" . $row["data_final_edital"] . "</td>";
                    echo "<td onclick=\"enviarFormulario('" . $row['id'] . "')\">" . $row["data_limite_orcamento_edital"] . "</td>";
                    echo "<td onclick=\"enviarFormulario('" . $row['id'] . "')\">" . $row["data_cadastro_edital"] . "</td>";
                    // Adicione um link de download para cada arquivo
               
                    echo "<td>";
                   
                    echo "
                    <div class='card-body'>
                        <form method='post' action='conciliacao.php'>
                            <input type='hidden' name='id' value='" . $row['id'] . "'>
                            <button type='submit' class='btn btn-primary'>
                                <i class='fa fa-cart-plus mr-2'></i>Conciliar
                            </button>
                        </form>
                    </div>    
                   ";


            echo "<div class='card-body-2'>
                <form id='formulario_info_editais' method='post' action='infoEditais.php'>
                    <input type='hidden' id='id_editais' name='id' value='" . $row['id'] . "'>
                </form>
            </div>";

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
        var form = document.getElementById('formulario_info_editais');
        // Define o valor do input hidden com o ID da linha clicada
        document.getElementById('id_editais').value = id;
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
</body>

            
</html>
