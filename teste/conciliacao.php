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
        foreach ($results as $row) {
            echo "<a href='#' class='collection-item resultado_pesquisa' data-marca_produto='" . $row['marca_produto'] . "' data-modelo_produto='" . $row['modelo_produto'] . "' data-valor_referencia_produto='" . $row['valor_referencia_produto'] .  "' data-valor_custo_produto='" . $row['valor_custo_produto'] . "' data-valor_minimo_produto='" . $row['valor_minimo_produto'] . "' data-valor_cadastro_produto='" . $row['valor_cadastro_produto'] . "' data-id_produto='" . $row['id_produto'] . "' data-qtd_produto='" . $row['qtd_produto'] . "' data-und_produto='" . $row['und_produto'] . "' >" . $row['desc_produto'] . "</a>";

        }
    } else {
        echo "Nenhum resultado encontrado.";
    }

    exit(); 
} else {
    echo "Nenhum parâmetro de pesquisa enviado.";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa em Tempo Real</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>
<body>



    <h2>Pesquisa em Tempo Real</h2>

    <input type="text" id="pesquisar_produtos" placeholder="Digite para pesquisar...">
    <input type="text" id="id_produto" placeholder="ID" readonly>
    <input type="text" id="qtd_produto" placeholder="QTD" readonly>
    <input type="text" id="und_produto" placeholder="UN" readonly>
    <input type="text" id="marca_produto" placeholder="Marca do Produto" readonly>
    <input type="text" id="modelo_produto" placeholder="Modelo do Produto" readonly>
    <input type="text" id="valor_referencia_produto" placeholder="Valor de Referencia" readonly>
    <input type="text" id="valor_custo_produto" placeholder="Valor de Custo" readonly>
    <input type="text" id="valor_minimo_produto" placeholder="Valor Minimo" readonly>
    <input type="text" id="valor_cadastro_produto" placeholder="Valor Cadastrado" readonly>

    <div id="resultado_pesquisa_produtos" class="collection"></div>

     <!-- Dropdown Trigger -->
  <a class='dropdown-trigger btn' href='#' data-target='dropdown1'>Drop Me!</a>

<!-- Dropdown Structure -->
<ul id='dropdown1' class='dropdown-content'>
  <li><a href="#!">one</a></li>
  <li><a href="#!">two</a></li>
  <li class="divider" tabindex="-1"></li>
  <li><a href="#!">three</a></li>
  <li><a href="#!"><i class="material-icons">view_module</i>four</a></li>
  <li><a href="#!"><i class="material-icons">cloud</i>five</a></li>
</ul>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            // Inicialização do Materialize
            M.AutoInit();

            $('#pesquisar_produtos').keyup(function(){
                var query = $(this).val();
                if(query.length > 0){
                    $.ajax({
                        url: 'teste.php',
                        method: 'POST',
                        data: {query: query},
                        success: function(data){
                            $('#resultado_pesquisa_produtos').html(data);
                        }
                    });
                } else {
                    $('#resultado_pesquisa_produtos').html('');
                }
            });
            
            // Manipular o clique em um resultado de pesquisa
            $(document).on('click', '.resultado_pesquisa', function(){
                var descricao = $(this).text();
                var marca_produto = $(this).data('marca_produto');
                var modelo_produto = $(this).data('modelo_produto');
                var valor_referencia_produto = $(this).data('valor_referencia_produto'); 
                var valor_custo_produto = $(this).data('valor_custo_produto');
                var valor_minimo_produto = $(this).data('valor_minimo_produto');
                var valor_cadastro_produto = $(this).data('valor_cadastro_produto');
                var id_produto = $(this).data('id_produto');
                var qtd_produto = $(this).data('qtd_produto');
                var und_produto = $(this).data('und_produto');
                
                $('#pesquisar_produtos').val(descricao);
                $('#marca_produto').val(marca_produto);
                $('#modelo_produto').val(modelo_produto);
                $('#valor_referencia_produto').val(valor_referencia_produto);
                $('#valor_custo_produto').val(valor_custo_produto);
                $('#valor_minimo_produto').val(valor_minimo_produto);
                $('#valor_cadastro_produto').val(valor_cadastro_produto);
                $('#id_produto').val(id_produto);
                $('#qtd_produto').val(qtd_produto);
                $('#und_produto').val(und_produto);
            });
        });
    </script>
</body>
</html>
