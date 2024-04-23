<?php
session_start();
?>

<?php
// Verifica se o parâmetro 'query' foi enviado via POST
if (isset($_POST['query'])) {
    // Conectar ao banco de dados (substitua as credenciais conforme necessário)
    $host = "localhost";
    $dbname = "allume";
    $username = "root";
    $password = "";

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Recuperar a consulta de pesquisa do parâmetro POST
    $query = $_POST['query'];

    // Consulta SQL para pesquisar no banco de dados
    $sql = "SELECT * FROM produtos WHERE desc_produto LIKE :query";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':query', '%' . $query . '%');
    $stmt->execute();
    $results = $stmt->fetchAll();

    // Mostrar os resultados da pesquisa
    if ($results) {
        // Defina uma variável para contar o número de tabelas
        $num_tabelas = $_POST['num_tabelas'];
    
        foreach ($results as $row) {

            for ($i = 1; $i <= $num_tabelas; $i++) {

            
            // Exiba a opção de pesquisa apenas uma vez para cada tabela
            echo "<div class='collection'>";
            echo "<a href='#' class='collection-item resultado_pesquisa$i' data-marca_produto='" . $row['marca_produto'] . "' data-modelo_produto='" . $row['modelo_produto'] .   "' data-valor_custo_produto='" . $row['valor_custo_produto'] . "' data-valor_minimo_produto='" . $row['valor_minimo_produto'] . "' data-valor_cadastro_produto='" . $row['valor_cadastro_produto'] . "' data-id_produto='" . $row['id_produto'] . "' data-qtd_produto='" . $row['qtd_produto'] . "' data-und_produto='" . $row['und_produto'] . "' >" . $row['desc_produto'] . "</a>";
            echo "</div>";
        }}
    }
     else {
        echo "Nenhum resultado encontrado.";
    }

    exit();
}



$host = "localhost";
$dbname = "allume";
$username = "root";
$password = "";

$id = $_POST['id'];

// Conexão com o banco de dados MySQL
$dbcon = mysqli_connect($host, $username, $password, $dbname);

// Verifica se a conexão foi bem sucedida

$query_editais = "SELECT * FROM produtos_do_edital WHERE id_edital = $id";
$result_editais = mysqli_query($dbcon, $query_editais);

// Verifique se há linhas retornadas
if ($result_editais) {
    $i = 0;
    while ($row = mysqli_fetch_assoc($result_editais)) {
        $i++;
        $num_rows = mysqli_num_rows($result_editais);
        if ($num_rows > 0) {
            // Exibir os usuários em uma tabela
            echo "<table class='funcionarios' id='tabela_editais'>";
            echo "<thead>";
            echo "<tr  onclick=\"enviarFormulario('" . $row['id_edital'] . "')\">";

            echo "<th>Item</th>";
            echo "<th>Lote</th>";
            echo "<th>QTD</th>";
            echo "<th>UND</th>";
            echo "<th>Val Ref</th>";
            echo "<th>Produtos</th>";

            echo "<th>Pesquisa</th>";
            echo "<th>Marca</th>";
            echo "<th>QTD</th>";
            echo "<th>UN</th>";

            echo "<th>Modelo</th>";
            echo "<th>Valor Mínimo</th>";
            echo "<th>Valor Cadastrado</th>";

            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";


            echo "<tr>";
            echo "<td>" . $row["item_edital"] . "</td>";

            echo "<td>" . $row["lote_produto_edital"] . "</td>";

            echo "<td>" . $row["qtd_produto_edital"] . "</td>";

            echo "<td>" . $row["und_produto_edital"] . "</td>";

            echo "<td>" . $row["valor_unit_ref_produto_edital"] . "</td>";

            echo "<td>" . $row["desc_produto_edital"] . "</td>";

            echo "<form id='formulario_edital_$i' action='conciliacao.php' method='post' enctype='multipart/form-data'>";

            echo "<td>
                            <div class='input-field'>
                                <input type='text' id='pesquisar_produtos_$i' placeholder='Pesquisa' required>
                                <label for='pesquisar_produtos'>Produtos</label>
                                <div id='resultado_pesquisa_produtos_$i' class='collection'></div>
                            </div>
                        </td>
                      <td>
                            <div class='input-field'>
                                <input type='text' id='marca_produto_$i' placeholder='Marca do Produto' readonly required>
                                <label for='marca_produto'>Marca</label>
                            </div>
                        </td>
                        <td>
                            <div class='input-field'>
                                <input type='text' id='qtd_produto_$i' placeholder='QTD' readonly required>
                                <label for='qtd_produto'>QTD</label>
                            </div>
                        </td>
                        <td>
                            <div class='input-field'>
                                <input type='text' id='und_produto_$i' placeholder='UN' readonly required>
                                <label for='und_produto'>UN</label>
                            </div>
                        </td>
                        
                        <td>
                            <div class='input-field'>
                                <input type='text' id='modelo_produto_$i' placeholder='Modelo do Produto' readonly required>
                                <label for='modelo_produto'>Modelo</label>
                            </div>
                        </td>
                        <td>
                            <div class='input-field'>
                                <input type='text' id='valor_minimo_produto_$i' placeholder='Valor Mínimo' readonly required>
                                <label for='valor_minimo_produto'>Valor Mínimo</label>
                            </div>
                        </td>
                        <td>
                            <div class='input-field'>
                                <input type='text' id='valor_cadastro_produto_$i' placeholder='Valor Cadastrado' readonly required>
                                <label for='valor_cadastro_produto'>Valor Cadastrado</label>
                            </div>
                        </td>";
            echo "</tr>";
            echo "</form>";

            echo "</tr>";

            echo "</tbody>";
            echo "</table>";

            echo "<div class='card-body'>
                    <form id='formulario_info_editais' method='post' action='conciliacao.php'>
                        <input type='hidden' id='id_editais' name='id' value='" . $row['id_edital'] . "'>
                    </form>
                </div>";
        }
    }
} else {
    // Erro na consulta
    echo "Erro na consulta: " . mysqli_error($dbcon);
}

// Fechar conexão com o banco de dados
mysqli_close($dbcon);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conciliação</title>
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>

<style>
    .brand-logo {
        color: black;
        display: flex;
    }

    nav .brand-logo {
        color: black;
    }

    .container {
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .row {
        width: 100%;
    }

    .container-tabela {
        width: 100%;
    }
</style>

<body>
    <div class="container-tabela">
        <h2>Conciliação de produtos</h2>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        function configurarEventos(i) {
            $('#pesquisar_produtos_' + i).keyup(function() {
                var query = $(this).val();
                var num_tabelas = document.querySelectorAll("#tabela_editais").length;
                console.log(num_tabelas);
                if (query.length > 0) {
                    $.ajax({
                        url: 'conciliacao.php',
                        method: 'POST',
                        data: {
                            query: query,
                            num_tabelas:num_tabelas
                        },
                        success: function(data) {
                            $('#resultado_pesquisa_produtos_' + i).html(data);
                        }
                    });
                } else {
                    $('#resultado_pesquisa_produtos_' + i).html('');
                }
            });

            // Manipular o clique em um resultado de pesquisa
            $(document).on('click', '.resultado_pesquisa' + i, function() {
                var descricao = $(this).text();
                var marca_produto = $(this).data('marca_produto');
                var modelo_produto = $(this).data('modelo_produto');
                var valor_custo_produto = $(this).data('valor_custo_produto');
                var valor_minimo_produto = $(this).data('valor_minimo_produto');
                var valor_cadastro_produto = $(this).data('valor_cadastro_produto');

                var qtd_produto = $(this).data('qtd_produto');
                var und_produto = $(this).data('und_produto');

                $('#pesquisar_produtos_' + i).val(descricao);
                $('#marca_produto_' + i).val(marca_produto);
                $('#modelo_produto_' + i).val(modelo_produto);
                $('#valor_custo_produto_' + i).val(valor_custo_produto);
                $('#valor_minimo_produto_' + i).val(valor_minimo_produto);
                $('#valor_cadastro_produto_' + i).val(valor_cadastro_produto);

                $('#qtd_produto_' + i).val(qtd_produto);
                $('#und_produto_' + i).val(und_produto);
            });
        }

        $(document).ready(function() {
            // Inicialização do Materialize
            M.AutoInit();

            <?php
            // Inicialização do valor de i
            $i = 0;
            ?>

            <?php foreach ($result_editais as $row) : ?>
                <?php $i++; ?>
                console.log("oi<?php echo $i; ?>");
                configurarEventos(<?php echo $i; ?>);
            <?php endforeach; ?>
        });
    </script>
</body>

</html>
