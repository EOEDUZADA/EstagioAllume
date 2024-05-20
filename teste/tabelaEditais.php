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
            width: 100%;
        }

        .brand-logo { 
            color: black;
            display: flex;
        }

        nav .brand-logo {
            color: black;
        }

        .btn-detalhes {
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

        .dropdown-content {
            border-radius: 5px;   
        }

        .card-body-2 {
            display: none;
        }
        .botoesPaginacao a {
            margin-top: 20px;
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
    <br>
    <h4>Editais</h4>
    <div class="container-botao-tabelaEditais">
        <div class="row">
            <div class="col s1">
                <button class="btn"><a href="cadastroedital.php" class="adiferente">Cadastro</a></button>
            </div>
            <div class="col s1">
                <button class="btn" id="btn-excluir">Excluir</button>
            </div>
            <div class="col s1">
                <button class="btn">Imprimir</button>
            </div>
            
            <div class="col s1">
                <button class="btn">Mais Ações</button>
            </div>
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
            if (!$dbcon) {
                die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
            }

            $query_editais = "SELECT * FROM editais";
            $result_editais = mysqli_query($dbcon, $query_editais);
            $resultados_por_pagina = 10;

      

            // Página atual (por padrão, a página 1)
            $pagina_atual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
            $offset = ($pagina_atual - 1) * $resultados_por_pagina;
            $query_editais = "SELECT * FROM editais LIMIT $resultados_por_pagina OFFSET $offset";
            $result_editais = mysqli_query($dbcon, $query_editais);
            $tem_mais_resultados = mysqli_num_rows($result_editais) == $resultados_por_pagina  ;
            
            // Verifique se há linhas retornadas
            if ($result_editais) {
                $num_rows = mysqli_num_rows($result_editais);
                if ($num_rows > 0) {
                    echo "<table class='funcionarios' id='tabela_editais'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th></th>";
                    echo "<th>ID</th>";
                    echo "<th>Nome do orgão</th>";
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
                        echo "<td><label><input type='checkbox' name='ids[]' value='" . $row['id'] . "'><span></span></label></td>";  // Checkbox for each row
                        echo "<td onclick=\"enviarFormulario('" . $row['id'] . "')\">" . $row["id"] . "</td>";
                        echo "<td onclick=\"enviarFormulario('" . $row['id'] . "')\">" . $row["nome_orgao_edital"] . "</td>";
                        echo "<td onclick=\"enviarFormulario('" . $row['id'] . "')\">" . $row["numero_edital"] . "</td>";
                        echo "<td onclick=\"enviarFormulario('" . $row['id'] . "')\">" . $row["numero_processo"] . "</td>";
                        echo "<td onclick=\"enviarFormulario('" . $row['id'] . "')\">" . $row["tipo_documento"] . "</td>";
                        echo "<td onclick=\"enviarFormulario('" . $row['id'] . "')\">" . $row["tipo_fornecimento"] . "</td>";
                        echo "<td onclick=\"enviarFormulario('" . $row['id'] . "')\">" . $row["data_final_edital"] . "</td>";
                        echo "<td onclick=\"enviarFormulario('" . $row['id'] . "')\">" . $row["data_limite_orcamento_edital"] . "</td>";
                        echo "<td onclick=\"enviarFormulario('" . $row['id'] . "')\">" . $row["data_cadastro_edital"] . "</td>";
                        echo "<td>";

                        echo "
                            <div class='card-body'>
                                <form method='post' action='conciliacao.php'>
                                    <input type='hidden' name='id' value='" . $row['id'] . "'>
                                        <button type='submit' class='btn btn-primary'>
                                            <i class='fa fa-cart-plus mr-2'></i>Conciliar
                                        </button>
                                </form>
                            </div>";

                        
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

document.getElementById('btn-excluir').addEventListener('click', function() {
    var checkboxes = document.querySelectorAll('input[name="ids[]"]:checked');
    var ids = Array.from(checkboxes).map(function(checkbox) {
        return checkbox.value;
    });

    if (ids.length > 0) {
        if (confirm('Tem certeza de que deseja excluir o/os Editais selecionados?')) {
            var formData = new FormData();
            formData.append('delete', '1');
            ids.forEach(function(id) {
                formData.append('ids[]', id);
            });

            fetch('delete.php', {
                method: 'POST',
                body: formData
            }).then(function(response) {
                if (response.ok) {
                    location.reload();
                } else {
                    alert('Erro ao excluir registros.');
                }
            }).catch(function(error) {
                console.error('Erro ao excluir registros:', error);
                alert('Erro ao excluir registros.');
            });
        }
    } else {
        alert('Nenhum Edital selecionado para exclusão.');
    }
});

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
