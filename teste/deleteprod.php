<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteprod'])) {
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

    if (isset($_POST['ids']) && is_array($_POST['ids'])) {
        $ids = $_POST['ids'];
        foreach ($ids as $id_produto) {
            $id_produto = intval($id_produto);
            $query = "DELETE FROM marcas WHERE id_produto = $id_produto";
            mysqli_query($dbcon, $query);
        }
    }
// Excluir os produtos
if (isset($_POST['ids']) && is_array($_POST['ids'])) {
    $ids = $_POST['ids'];
    foreach ($ids as $id_produto) {
        $id_produto = intval($id_produto);
        $query = "DELETE FROM produtos WHERE id_produto = $id_produto";
        mysqli_query($dbcon, $query);
    }
}

    // Fechar conexão com o banco de dados
    mysqli_close($dbcon);

    // Redirecionar de volta para a página dos editais
    header("Location: tabelaprodutos.php");
    exit;
}
?>