<?php
session_start();


?>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
$id = $_POST['id'];
$host = "localhost";
$dbname = "allume";
$username = "root";
$password = "";

// Conexão com o banco de dados MySQL
$dbcon = mysqli_connect($host, $username, $password, $dbname);

// info do produto

$sql_produtos = "SELECT * FROM produtos WHERE id_produto = $id";
$result_sql_produtos = mysqli_query($dbcon, $sql_produtos);


 if($result_sql_produtos) {

$num_rows = mysqli_num_rows($result_sql_produtos);

  if ($num_rows > 0 ) {
   while($row = mysqli_fetch_assoc($result_sql_produtos)){
    $id_produto = $row['id_produto'];
    $und = $row['und'];
    $nome_produto =  $row['nome_produto'];
    $ncm = $row['ncm'];
    $ean = $row['ean'];
    $peso = $row['peso'];
    $tamanho = $row['tamanho'];
    $cod_barra = $row['cod_barra'];
   }
  }

 }

//melhor marca

$sql_melhor_marca = "SELECT *
FROM marcas
WHERE vlr_custo = (SELECT MIN(vlr_custo) FROM marcas)
AND id_produto = $id";

$result_sql_melhor_marca = mysqli_query($dbcon, $sql_melhor_marca);


 if($result_sql_melhor_marca) {
$num_rows = mysqli_num_rows($result_sql_produtos);

  if ($num_rows > 0 ) {
   while($row = mysqli_fetch_assoc($result_sql_melhor_marca)){
    $id_melhor_marca = $row['id_marca'];
    $melhor_marca = $row['marca'];
    $melhor_marca_modelo =  $row['modelo'];
    $melhor_marca_vlr_compra = $row['vlr_compra'];
    $melhor_marca_vlr_custo = $row['vlr_custo'];
    $melhor_marca_id_produto = $row['id_produto'];
   }
  }

 }


 //marcas

// Loop para executar a consulta SELECT
    // Cria a consulta SELECT
 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
</head>

<style>
        .brand-logo { 
            color: black;
            display: flex;
           
        }
        
        nav .brand-logo {
            color:black;
        }
.container-produtos{
margin: 0 auto;
}
#foto {
    position: relative;
    top: 80px;
    left: 40px;
width: 150px;
height: 150px;
border: 1px solid #000;
}
#ncm {
    position: relative;
    bottom: 1px;
}


body {
  font-family: "Inter", sans-serif;
  font-optical-sizing: auto;
  font-weight: 400;
  font-style: normal;
  font-variation-settings:
    "slnt" 0;
}
.container-infoProduto{
  border-radius: 10px;
  margin: 50px;
  -webkit-box-shadow: 0px 0px 19px -10px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 19px -10px rgba(0,0,0,0.75);
box-shadow: 0px 0px 19px -10px rgba(0,0,0,0.75);
}
.container{
  padding: 30px;
}

    </style>
<body>

<nav>
    <div class="nav-wrapper white" style="display: flex; align-items: center;">
        <a href="tabelaprodutos.php" id="sidebar-toggle" class="right"><i class="large material-icons" style="margin-left: 50px;color: black">arrow_back</i></a>
        <a href="paginaInicialAdmin.php" style="margin-left: auto;"><p class="black-text" style="margin-right: 60px;">Bem vindo! <?php echo $_SESSION['nome'] ?> </p></a>
        <i class="large material-icons brand-logo right" style="font-size: 50px;">account_circle</i>
    </div>
</nav>
<div class="container-infoProduto">
<form action="infoProduto.php" method="post" enctype="multipart/form-data">
      
<div class="container">
<div class="row">
    
      <div class="row">
        <div class="input-field col s1 m1">
          <input  id="id_produto" type="text" value="<?php if ((!empty($id_produto))) { echo $id_produto;} ; ?>"class="validate">
          <label for="id_produto">ID</label>
        </div>
        <div class="input-field col s4 m4">
          <input id="nome_produto" name="nome_produto" type="text" value="<?php if ((!empty($nome_produto))) { echo $nome_produto;} ; ?>" class="validate">
          <label for="nome_produto">Nome do produto</label>
        </div>
        <div class="input-field col s4 m4">
          <input id="ncm" name="ncm" type="text" value="<?php if ((!empty($ncm))) { echo $ncm;} ; ?>" class="validate">
          <label for="ncm">NCM</label>
        </div>
        <div class="col s3 m3" id="foto">
      <div> FOTO </div>
        </div>
      </div>
      <div class="row">
      <div class="input-field col s3">
          <input  id="und" name="und" type="text" value="<?php if ((!empty($und))) { echo $und;} ; ?>" class="validate">
          <label for="und">Unidade</label>
        </div>
        <div class="input-field col s4 offset-s2">
          <input id="cod_ean" name="cod_ean" type="text" value="<?php if ((!empty($ean))) { echo $ean;} ; ?>" class="validate">
          <label for="cod_ean">Cod/EAN</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s1">
          <input id="peso" name="peso" type="text" value="<?php if ((!empty($peso))) { echo $peso;} ; ?>" class="validate">
          <label for="peso">Peso</label>
        </div>
        <div class="input-field col s2">
          <input id="tamanho" name="tamanho" type="text" value="<?php if ((!empty($tamanho))) { echo $tamanho;} ; ?>" class="validate">
          <label for="tamanho">Tamanho</label>
        </div>
        <div class="input-field col s4 offset-s2">
          <input id="cod_barra" name="cod_barra" type="text" value="<?php if ((!empty($cod_barra))) { echo $cod_barra;} ; ?>" class="validate">
          <label for="cod_barra">Cod de barra</label>
        </div>
      </div>

  </div>
</div>


<div class="container">

<div class="row">
    <h5> Melhor marca </h5>
        <div class="input-field col s2">
          <input id="melhor_marca" name="melhor_marca" type="text" value="<?php if ((!empty($melhor_marca))) { echo $melhor_marca;} ; ?>"  class="validate">
          <label for="melhor_marca">Marca</label>
        </div>
        <div class="input-field col s2">
          <input id="melhor_modelo" name="melhor_modelo" type="text" value="<?php if ((!empty($melhor_marca_modelo))) { echo $melhor_marca_modelo;} ; ?>"  class="validate">
          <label for="melhor_modelo">Modelo</label>
        </div>
        <div class="input-field col s2">
          <input id="melhor_vlr_custo" name="melhor_vlr_custo" type="text" value="<?php if ((!empty($melhor_marca_vlr_custo))) { echo $melhor_marca_vlr_custo;} ; ?>"  class="validate">
          <label for="melhor_vlr_custo">VLR Custo</label>
        </div>
        <div class="input-field col s2">
          <input id="markup" name="markup" type="text" class="validate">
          <label for="markup">MARKUP</label>
        </div>
        <div class="input-field col s2">
          <input id="melhor_vlr_venda" name="melhor_vlr_venda" type="text"  class="validate">
          <label for="melhor_vlr_venda">VLR Venda</label>
        </div>
      </div>
</div>


<div class="container">

<div class="row">
    <h5> Estoque </h5>
        <div class="input-field col s2">
          <input id="localizacao_estoque" name="localizacao_estoque" type="text" class="validate">
          <label for="localizacao_estoque">Localização no estoque</label>
        </div>
        <div class="input-field col s2">
          <input id="estoque_atual" name="estoque_atual" type="text" class="validate">
          <label for="estoque_atual">Estoque atual</label>
        </div>
        <div class="input-field col s2">
          <input id="estoque_minimo" name="estoque_minimo" type="text" class="validate">
          <label for="estoque_minimo">Estoque mínimo</label>
        </div>
        <div class="input-field col s2">
          <input id="estoque..." type="text" class="validate">
          <label for="estoque...">Estoque...</label>
        </div>
      </div>
</div>


<div class="container">
    <h5>Marcas</h5>
<?php
$i= 0;
    $resultados = array();
    $sql_marcas = "SELECT * FROM marcas where id_produto = $id ";
    $result_query_marcas = mysqli_query($dbcon,$sql_marcas);
    while($i < 5) {
$row = mysqli_fetch_assoc($result_query_marcas);

$i++;

    echo '<div class="row">' . PHP_EOL;
    echo '<div class="col s1">' . $i . '</div>' . PHP_EOL;
    echo '<div class="input-field col s1">' . PHP_EOL;
    echo '<input id="marca_' . $i . '" name="marca_' . $i . '" value="' . ($row['marca'] ?? '') . '" type="text" class="validate">' . PHP_EOL;
    echo '<label for="marca_' . $i . '">Marca</label>' . PHP_EOL;
    echo '</div>' . PHP_EOL;
    echo '<div class="input-field col s2">' . PHP_EOL;
    echo '<input id="modelo_' . $i . '" name="modelo_' . $i . '" value="' . ($row['modelo'] ?? '') . '" type="text" class="validate">' . PHP_EOL;
    echo '<label for="modelo_' . $i . '">Modelo</label>' . PHP_EOL;
    echo '</div>' . PHP_EOL;
    echo '<div class="input-field col s1">' . PHP_EOL;
    echo '<input id="vlr_compra_' . $i . '" name="vlr_compra_' . $i . '" value="' . ($row['vlr_compra'] ?? '') . '" type="text" class="validate">' . PHP_EOL;
    echo '<label for="vlr_compra_' . $i . '">VLR Compra</label>' . PHP_EOL;
    echo '</div>' . PHP_EOL;
    echo '<div class="input-field col s1">' . PHP_EOL;
    echo '<input id="ipi_' . $i . '" name="ipi_' . $i . '"  type="text" class="validate">' . PHP_EOL;
    echo '<label for="ipi_' . $i . '">IPI</label>' . PHP_EOL;
    echo '</div>' . PHP_EOL;
    echo '<div class="input-field col s1">' . PHP_EOL;
    echo '<input id="%_ipi_' . $i . '" name="%_ipi_' . $i . '" type="text" class="validate">' . PHP_EOL;
    echo '<label for="%_ipi_' . $i . '">%</label>' . PHP_EOL;
    echo '</div>' . PHP_EOL;
    echo '<div class="input-field col s1">' . PHP_EOL;
    echo '<input id="icms_difal_' . $i . '" name="icms_difal_' . $i . '" type="text" class="validate">' . PHP_EOL;
    echo '<label for="icms_difal_' . $i . '">ICMS-DIFAL</label>' . PHP_EOL;
    echo '</div>' . PHP_EOL;
    echo '<div class="input-field col s1">' . PHP_EOL;
    echo '<input id="%_icms_difal_' . $i . '" name="%_icms_difal_' . $i . '" type="text" class="validate">' . PHP_EOL;
    echo '<label for="%_icms_difal_' . $i . '">%</label>' . PHP_EOL;
    echo '</div>' . PHP_EOL;
    echo '<div class="input-field col s1">' . PHP_EOL;
    echo '<input id="frete_' . $i . '" name="frete_' . $i . '" type="text" class="validate">' . PHP_EOL;
    echo '<label for="frete_' . $i . '">Frete</label>' . PHP_EOL;
    echo '</div>' . PHP_EOL;
    echo '<div class="input-field col s1">' . PHP_EOL;
    echo '<input id="%_frete_' . $i . '" name="%_frete_' . $i . '" type="text" class="validate">' . PHP_EOL;
    echo '<label for="%_frete_' . $i . '">%</label>' . PHP_EOL;
    echo '</div>' . PHP_EOL;
    echo '<div class="input-field col s1">' . PHP_EOL;
    echo '<input id="vlr_custo_' . $i . '" name="vlr_custo_' . $i . '" value="' . ($row['vlr_custo_'] ?? '') . '" type="text" class="validate">' . PHP_EOL;
    echo '<label for="vlr_custo_' . $i . '">VLR Custo</label>' . PHP_EOL;
    echo '</div>' . PHP_EOL;
    echo '</div>' . PHP_EOL;

    }

    
   
    ?>
</div>
      
            <p class="enviar right"><input type="submit" value="Salvar"></p>
        </form>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>