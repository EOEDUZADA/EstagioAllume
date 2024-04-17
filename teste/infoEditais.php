<?php
session_start();
$id = $_POST['id'];
$host = "localhost";
$dbname = "allume";
$username = "root";
$password = "";

// Conexão com o banco de dados MySQL
$dbcon = mysqli_connect($host, $username, $password, $dbname);

// Verifica se a conexão foi bem sucedida

$query_editais = "SELECT * FROM editais WHERE id = $id";
$result_editais = mysqli_query($dbcon, $query_editais);


if($result_editais) {


$num_rows = mysqli_num_rows($result_editais);


if ($num_rows > 0 ) {


while($row = mysqli_fetch_assoc($result_editais)){


echo $row['id'];

$nome_orgao = $row['nome_orgao_edital'];

$numero_edital = $row['numero_edital'];



   $numero_processo_edital =  $row['numero_processo'];

    $modalidade_edital = $row['modalidade_edital'];

    $tipo_documento = $row['tipo_documento'];

    $tipo_fornecimento = $row['tipo_fornecimento'];

    $data_final_edital = $row['data_final_edital'];

    $data_cadastro_edital = $row['data_cadastro_edital'];

    $data_limite_orcamento_edital = $row['data_limite_orcamento_edital'];

    $valor_referencia_produto = $row['valor_referencia_produto'];





}



}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicial do Admin</title>
    <link rel="stylesheet" href="css/styles.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
        }
        nav{
            height: 85px;
        }
  

        .sidebar ul {
            list-style-type: none;
            padding-left: 0;
            margin: 0;
        }

        .sidebar ul li {
            display: flex;
            justify-content: center;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        


        .dashboard-square {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            margin: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .dashboard-square:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        li a{
            text-decoration: none;
            color: inherit;
        }
        .brand-logo { 
            color: black;
            display: flex;
           
        }
        
        nav .brand-logo {
            color:black;
        }

        .main-content{
            background-color:white;
        }
      
        
    </style>
</head>

<body>


<nav>
    <div class="nav-wrapper white" style="display: flex; align-items: center; flex-direction: row-reverse;"> 
        <i class="large material-icons brand-logo" style="font-size: 50px;">account_circle</i>
        <a href="paginaInicialAdmin.php"><p class="black-text" style="margin-right: 60px;">Bem vindo! <?php echo $_SESSION['nome'] ?> </p></a>
    </div>
</nav>



<div class="sidebar">
<img src="./img/logo3.png" id="brand-logo">
    <ul>
        <li><a href="registro.php">Registro de Usuarios</a></li>
        <li><a href="usuarios.php">Usuários</a></li>
        <li><a href="editais.php">Registro De Editais</a></li>
        <li><a href="tabelaeditais.php">Editais</a></li>
        <li><a href="cadastroProdutos.php">Cadastro Produtos</a></li>
        <li><a href="sair.php">Sair</a></li>
    </ul>
</div>

<div class="main-content">
    
    <h5 class="card-title blue-text">Dados do orçamento</h5> <hr><br>
    
    <div class="row">
        <div class="col s6 m6">
            <div class="card large white darken-1">
                <div class="card-content black-text">
                
                            <p> Cliente <input type="text" value=<?php echo $nome_orgao;?> /></p>
                </div>
                
            </div>
        </div>

        <div class="col s6 m6">
            <div class="card large white darken-1">
                <div class="card-content black-text">
                            
                            <p> Número do Edital <input type="text" value=<?php echo $numero_edital;?> /></p>
                </div>
                
            </div>
            <br><br>
        </div>


        <h5 class="card-title blue-text">Produtos</h5> <hr><br>
    
    <div class="row">
        <div class="col s6 m12">
            <div class="card large white darken-1">
                <div class="card-content black-text">
                <?php
        

        $host = "localhost";
$dbname = "allume";
$username = "root";
$password = "";

// Conexão com o banco de dados MySQL
$dbcon = mysqli_connect($host, $username, $password, $dbname);

// Verifica se a conexão foi bem sucedida

$query_editais = "SELECT * FROM produtos_do_edital WHERE id_edital = $id";
$result_editais = mysqli_query($dbcon, $query_editais);


if($result_editais) {


$num_rows = mysqli_num_rows($result_editais);


if ($num_rows > 0 ) {


while($row = mysqli_fetch_assoc($result_editais)){

    echo "<p>" . $row['desc_produto_edital'] . "</p>";

    echo "<p>" . $row['lote_produto_edital'] . "</p>";
    


echo $row['lote_produto_edital'];

echo $row['item_edital'];

echo $row['valor_unit_ref_produto_edital'];

echo $row['qtd_produto_edital'];

echo $row['und_produto_edital'];











}



}

}

?>
                </div>
                
            </div>
        </div>



        <h5 class="card-title blue-text">Totais do orçamento</h5> <hr><br>
    
    <div class="row">
        <div class="col s6 m12">
            <div class="card large white darken-1">
                <div class="card-content black-text">
                <?php
        

        $host = "localhost";
$dbname = "allume";
$username = "root";
$password = "";

// Conexão com o banco de dados MySQL
$dbcon = mysqli_connect($host, $username, $password, $dbname);

// Verifica se a conexão foi bem sucedida

$query_editais = "SELECT * FROM produtos_do_edital WHERE id_edital = $id";
$result_editais = mysqli_query($dbcon, $query_editais);


if($result_editais) {


$num_rows = mysqli_num_rows($result_editais);


if ($num_rows > 0 ) {


    echo "<table class='funcionarios' id='tabela_editais'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th></th>";  
    echo "<th></th>"; 
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";


    while ($row = mysqli_fetch_assoc($result_editais)) {
        echo "<tr>";
   
        
   
        echo "<td>";
      
 echo "<p class='red-text'>Valor total dos produtos<br><p>" . $row['desc_produto_edital'] . "</p>";
        echo "</td>";
        echo "</tr>";

    }

    echo "</tbody>";
    echo "</table>";
   


    echo "<p>" . $row['lote_produto_edital'] . "</p>";
    


echo $row['lote_produto_edital'];

echo $row['item_edital'];

echo $row['valor_unit_ref_produto_edital'];

echo $row['qtd_produto_edital'];

echo $row['und_produto_edital'];















}

}

?>
                </div>
                
            </div>
        </div>
    </div>
       

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
