<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
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
//excluir os produtos conciliados
    if (isset($_POST['ids']) && is_array($_POST['ids'])) {
        $ids = $_POST['ids'];
        foreach ($ids as $id) {
            $id = intval($id);
            $query = "DELETE FROM produtos_conciliados WHERE id_edital = $id";
            mysqli_query($dbcon, $query);
        }
    }
// Excluir registros relacionados na tabela produtos_do_edital
if (isset($_POST['ids']) && is_array($_POST['ids'])) {
    $ids = $_POST['ids'];
    foreach ($ids as $id) {
        $id = intval($id);
        $query = "DELETE FROM produtos_do_edital WHERE id_edital = $id";
        mysqli_query($dbcon, $query);
    }
}

// Excluir os editais
if (isset($_POST['ids']) && is_array($_POST['ids'])) {
    $ids = $_POST['ids'];
    foreach ($ids as $id) {
        $id = intval($id);
        $query = "DELETE FROM editais WHERE id = $id";
        mysqli_query($dbcon, $query);
    }
}

    // Fechar conexão com o banco de dados
    mysqli_close($dbcon);

    // Redirecionar de volta para a página dos editais
    header("Location: tabelaEditais.php");
    exit;
}
?>