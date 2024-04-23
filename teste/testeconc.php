<?php
session_start();

// Verifica se o valor da variável 'nome' foi enviado via POST
if(isset($_GET['nome'])) {
    // Recupera o valor da variável 'nome'
    $nome = $_GET['nome'];

    // Faça algo com o valor recebido, como imprimir na tela
    echo "O nome recebido é: " . $nome;
} else {
    // Se 'nome' não foi enviado, retorna uma mensagem de erro
    echo "Erro: 'nome' não foi recebido.";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Seu cabeçalho aqui -->
</head>
<body>
    <!-- Seu corpo HTML aqui -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            // Valor da variável que você deseja enviar para o PHP
            var nome = "João";

            // Fazendo uma requisição AJAX para enviar a variável para o PHP
            $.ajax({
                url: 'testeconc.php', // Deixe em branco ou especifique o nome do arquivo PHP se estiver em outro arquivo
                type: 'GET',
                data: {nome: nome},
                success: function(response) {
                    // Se o script PHP responder com sucesso, você pode fazer algo com a resposta aqui
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Se houver um erro na requisição AJAX, você pode lidar com ele aqui
                    console.error(error);
                }
            });
        });
    </script>
</body>
</html>
