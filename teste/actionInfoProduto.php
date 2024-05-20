<?php

var_dump($_FILES);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $host = "localhost";
    $dbname = "allume";
    $username = "root";
    $password = "";

    $dbcon = mysqli_connect($host, $username, $password, $dbname);

    var_dump($_POST);

    $id = $_POST['id_produto'];

    $sql_marcas = "SELECT * FROM marcas WHERE id_produto = $id";
    $result_query_marcas = mysqli_query($dbcon, $sql_marcas);

    $i = 1;
    $j = 1;

    while ($i < 5) {
        $row = mysqli_fetch_assoc($result_query_marcas);

        if (empty($row['marca']) && !empty($_POST['marca_' . $i])) {
            echo "A linha 'marca' está vazia, mas o POST 'marca_$i' não está vazio.";
            // Inserir a nova marca no banco de dados
            $nova_marca = $_POST['marca_' . $i];
            $novo_modelo = $_POST['modelo_' . $i];
            $novo_vlr_compra = $_POST['vlr_compra_' . $i];
            $novo_ipi = $_POST['ipi_' . $i];
            $novo_percent_ipi = $_POST['%_ipi_' . $i];
            $novo_icms_difal = $_POST['icms_difal_' . $i];
            $novo_percent_icms_difal = $_POST['%_icms_difal_' . $i];
            $novo_frete = $_POST['frete_' . $i];
            $novo_percent_frete = $_POST['%_frete_' . $i];
            $novo_vlr_custo = $_POST['vlr_custo_' . $i];

            $sql_inserir = "INSERT INTO marcas (id_produto, marca, modelo, vlr_compra, vlr_custo) 
                           VALUES ($id, '$nova_marca', '$novo_modelo', '$novo_vlr_compra','$novo_vlr_custo')";

            if ($dbcon->query($sql_inserir) === TRUE) {
                echo "Nova marca inserida com sucesso.";
            } else {
                echo "Erro: " . $sql_inserir . "<br>" . $dbcon->error;
            }
        } else if (!empty($row['marca']) && ($row['marca'] !== $_POST['marca_' . $i] || $row['modelo'] !== $_POST['modelo_' . $i])) {
            echo "Algo foi modificado";
            // Atualizar a marca existente no banco de dados
            $marca_modificada = $_POST['marca_' . $i];
            $modelo_modificado = $_POST['modelo_' . $i];
            $vlr_compra_modificado = $_POST['vlr_compra_' . $i];
            $ipi_modificado = $_POST['ipi_' . $i];
            $percent_ipi_modificado = $_POST['%_ipi_' . $i];
            $icms_difal_modificado = $_POST['icms_difal_' . $i];
            $percent_icms_difal_modificado = $_POST['%_icms_difal_' . $i];
            $frete_modificado = $_POST['frete_' . $i];
            $percent_frete_modificado = $_POST['%_frete_' . $i];
            $vlr_custo_modificado = $_POST['vlr_custo_' . $i];

            $sql_atualizar = "UPDATE marcas 
                           SET marca='$marca_modificada', modelo='$modelo_modificado', vlr_compra='$vlr_compra_modificado', vlr_custo='$vlr_custo_modificado' 
                           WHERE id_produto=$id AND marca='$row[marca]' AND modelo='$row[modelo]'";

            if ($dbcon->query($sql_atualizar) === TRUE) {
                echo "Marca atualizada com sucesso.";
            } else {
                echo "Erro: " . $sql_atualizar . "<br>" . $dbcon->error;
            }
        } else if (empty($_POST['marca_' . $i])) {
            $j++;
            echo "Há " . $j . " entradas de marca vazias.";
        }

        $i++;
    }


$sql_produtos = "SELECT * FROM produtos WHERE id_produto = $id";
$result_sql_produtos = mysqli_query($dbcon, $sql_produtos);


 if($result_sql_produtos) {

$num_rows = mysqli_num_rows($result_sql_produtos);

  if ($num_rows > 0 ) {
   while($row = mysqli_fetch_assoc($result_sql_produtos)){

    if($row['und'] !== $_POST['und'] || $row['nome_produto'] !== $_POST['nome_produto'] || $row['ncm'] !== $_POST['ncm'] || $row['ean'] !== $_POST['cod_ean'] || $row['peso'] !== $_POST['peso'] || $row['tamanho'] !== $_POST['tamanho'] || $row['cod_barra'] !== $_POST['cod_barra']){
      $id_produto = $row['id_produto'];
      $und = $_POST['und'];
      $nome_produto = $_POST['nome_produto'];
      $ncm = $_POST['ncm'];
      $ean = $_POST['cod_ean'];
      $peso = $_POST['peso'];
      $tamanho = $_POST['tamanho'];
      $cod_barra = $_POST['cod_barra'];

      $sql_atualizar_produtos = "UPDATE produtos 
      SET und='$und', nome_produto='$nome_produto', ncm='$ncm', ean='$ean', peso='$peso',tamanho='$tamanho', cod_barra='$cod_barra' 
      WHERE id_produto=$id";
      
      if ($dbcon->query($sql_atualizar_produtos) === TRUE) {
        echo "Marca atualizada com sucesso.";
    } else {
        echo "Erro: " . $sql_atualizar . "<br>" . $dbcon->error;
    }

echo "deu update";
    }
   }
  }

}



}
?>
