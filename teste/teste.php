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
            echo "<a href='#' class='collection-item resultado_pesquisa' data-marca='" . $row['marca_produto'] . "' data-modelo='" . $row['modelo_produto'] . "'>" . $row['desc_produto'] . "</a>";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>

<h2>Pesquisa em Tempo Real</h2>

<input type="text" id="pesquisar_produtos" placeholder="Digite para pesquisar...">
<input type="text" id="marca_produto" placeholder="Marca do Produto" readonly>
<input type="text" id="modelo_produto" placeholder="Modelo do Produto" readonly>

<div id="resultado_pesquisa_produtos" class="collection"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
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
        var descricao = $(this).text(); // Obtém o texto do item de pesquisa clicado
        var marca = $(this).data('marca'); // Obtém a marca do produto usando o atributo de dados 'data-marca'
        var modelo = $(this).data('modelo'); // Obtém o modelo do produto usando o atributo de dados 'data-modelo'
        
        // Define o valor do campo de pesquisa com a descrição do item clicado
        $('#pesquisar_produtos').val(descricao);
        
        // Preenche os campos de marca e modelo com os valores correspondentes
        $('#marca_produto').val(marca);
        $('#modelo_produto').val(modelo);
    });
});
</script>

</body>
</html>
