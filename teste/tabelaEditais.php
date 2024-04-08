<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/styles.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">
    
    <style>
        table {
            font-weight: 800 !important;
        }

        li a {
            font-weight: 700 !important;
        }

        table {
            width: 100%;
        }
    </style>
</head>

<body>
    
<div class="sidebar">
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

<div class="main-content">
    <h4>Editais</h4>
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
                echo "<tr>";
                echo "<th>Id</th>";
                echo "<th>Numero do edital</th>";
                echo "<th>Numero do processo</th>"; 
                echo "<th><a href='index.php'>Nome do orgão</a></th>"; // Coluna clicável com link para "pagina_destino.php"
                echo "<th>SRP/NORMAL</th>";
                echo "<th>Tipo de fornecimento</th>";
                echo "<th>Data final do edital</th>";
                echo "<th>Data limite para orçamento</th>";
                echo "<th>Data de cadastro do edital</th>";
                echo "<th>Arquivo do Edital</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                while ($row = mysqli_fetch_assoc($result_editais)) {
                    echo "<tr>";
                    echo "<td>" . $row["id_edital"] . "</td>";
                   
                    echo "<td>" . $row["numero_edital"] . "</td>";
                    echo "<td>" . $row["numero_processo"] . "</td>";
                    echo "<td><a href='index.php'>" . $row["nome_orgao_edital"] . "</a></td>"; // Coluna clicável com link para "pagina_destino.php"
                    echo "<td>" . $row["tipo_documento"] . "</td>";
                    echo "<td>" . $row["tipo_fornecimento"] . "</td>";
                    echo "<td>" . $row["data_final_edital"] . "</td>";
                    echo "<td>" . $row["data_limite_orcamento_edital"] . "</td>";
                    echo "<td>" . $row["data_cadastro_edital"] . "</td>";
                    // Adicione um link de download para cada arquivo
                    $arquivos = explode(",", $row["arquivo_edital"]);
                    echo "<td>";
                    foreach ($arquivos as $arquivo) {
                        echo "<a href='uploads/" . $arquivo . "' download>" . $arquivo . "</a><br>";
                    }
                    echo "</td>";
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
            } else {
                // Nenhum usuário encontrado
                echo "<p>Nenhum usuário encontrado.</p>";
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

</body>
</html>
