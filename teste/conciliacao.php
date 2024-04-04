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
            echo "<p>" . $row['desc_produto'] . "</p>";
           



echo "<script>";
echo "alert('Este é um alerta JavaScript dentro de um script PHP!');";
echo "</script>";


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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa em Tempo Real</title>
    <link rel="stylesheet" href="css/styles.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>

<h2>Pesquisa em Tempo Real</h2>

<input type="text" id="pesquisar_produtos" placeholder="Digite para pesquisar...">

<div id="resultado_pesquisa_produtos" onclick=BotaoDropDown()></div>

<div class="marca" onclick=BotaoDropDown()></div>


<a class='dropdown-trigger btn' href='#' data-target='dropdown1'>Drop Me!</a>


<script>
$(document).ready(function(){
    $('#pesquisar_produtos').keyup(function(){
        var query = $(this).val();
        if(query.length > 0){
            $.ajax({
                url: 'conciliacao.php',
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
});



function BotaoDropDown() {




    alert("clicou");
}
</script>

</body>
</html>

