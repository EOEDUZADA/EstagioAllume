<?php
session_start();
$host = "localhost";
$dbname = "allume";
$username = "root";
$password = "";

// Conexão com o banco de dados MySQL
$dbcon = mysqli_connect($host, $username, $password, $dbname);

// Verifica se a conexão foi bem sucedida
if (!$dbcon) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = isset($_POST['id']) ? $_POST['id'] : null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    // Atualiza os dados do edital
    $nome_orgao = $_POST['nome_orgao'];
    $numero_edital = $_POST['numero_edital'];
    $numero_processo_edital = $_POST['numero_processo_edital'];
    $tipo_documento = $_POST['tipo_documento'];
    $tipo_fornecimento = $_POST['tipo_fornecimento'];
    $data_final_edital = $_POST['data_final_edital'];
    $data_limite_orcamento = $_POST['data_limite_orcamento'];
    $modalidade_edital = $_POST['modalidade_edital'];

    $item_edital = $_POST["item_edital"];
    $lote_produto_edital = $_POST["lote_produto_edital"];
    $valor_unit_ref_produto_edital = $_POST["valor_unit_ref_produto_edital"];
    $desc_produto_edital = $_POST["desc_produto_edital"];
    $qtd_produto_edital = $_POST["qtd_produto_edital"];
    $und_produto_edital = $_POST["und_produto_edital"];

    $query_update = "UPDATE editais SET 
        nome_orgao_edital = '$nome_orgao',
        numero_edital = '$numero_edital',
        numero_processo = '$numero_processo_edital',
        tipo_documento = '$tipo_documento',
        tipo_fornecimento = '$tipo_fornecimento',
        data_final_edital = '$data_final_edital',
        data_limite_orcamento_edital = '$data_limite_orcamento',
        modalidade_edital = '$modalidade_edital'
        WHERE id = $id";


    $query_update = "UPDATE produtos_do_edital SET 
        item_edital = '$item_edital',
        lote_produto_edital = ' $lote_produto_edital',
        valor_unit_ref_produto_edital = '$valor_unit_ref_produto_edital',
        desc_produto_edital = '$desc_produto_edital',
        qtd_produto_edital = '$qtd_produto_edital',
        und_produto_edital = '$und_produto_edital',
        WHERE id_produto = $id_produto";

    if (mysqli_query($dbcon, $query_update)) {
        header("Location: tabelaEditais.php"); 
        exit;
    } else {
        echo "Error: " . $query_update . "<br>" . mysqli_error($dbcon);
    }
}

$query_editais = "SELECT * FROM editais WHERE id = $id";
$result_editais = mysqli_query($dbcon, $query_editais);

if($result_editais) {
    $num_rows = mysqli_num_rows($result_editais);
    if ($num_rows > 0 ) {
        while($row = mysqli_fetch_assoc($result_editais)){
            $nome_orgao = $row['nome_orgao_edital'];
            $numero_edital = $row['numero_edital'];
            $numero_processo_edital =  $row['numero_processo'];
            $modalidade_edital = $row['modalidade_edital'];
            $tipo_documento = $row['tipo_documento'];
            $tipo_fornecimento = $row['tipo_fornecimento'];
            $data_final_edital = $row['data_final_edital'];
            $data_cadastro_edital = $row['data_cadastro_edital'];
            $data_limite_orcamento = $row['data_limite_orcamento_edital'];
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
    <script>
        function adicionarNovoProduto() {
        var novaLinha = document.createElement('div');
        novaLinha.className = 'row';

        novaLinha.innerHTML = `
            <div class="col s4">
                <div class="input-field">
                    <input id="input1" type="text" name="desc_produto_edital[]" class="validate">
                    <label for="input1">Descrição Produto</label>
                </div>
            </div>
            <div class="col s1">
                <div class="input-field">
                    <input id="input2" type="text" name="item_edital[]" class="validate">
                    <label for="input2">Item</label>
                </div>
            </div>
            <div class="col s2">
                <div class="input-field">
                    <input id="input3" type="text" name="valor_unit_ref_produto_edital[]" class="validate">
                    <label for="input3">Valor de referência</label>
                </div>
            </div>
            <div class="col s1">
                <div class="input-field">
                    <input id="input4" type="text" name="lote_produto_edital" class="validate">
                    <label for="input4">lote</label>
                </div>
            </div>
            <div class="col s2">
                <div class="input-field">
                    <input id="input5" type="text" name="qtd_produto_edital" class="validate">
                    <label for="input5">Quantidade</label>
                </div>
            </div>
            <div class="col s2">
                <div class="input-field">
                    <input id="input6" type="text" name="und_produto_edital" class="validate">
                    <label for="input6">UND</label>
                </div>
            </div>
        `;

        document.querySelector('.produtos').appendChild(novaLinha);
    }
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
        }
        nav {
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
        li a {
            text-decoration: none;
            color: inherit;
        }
        .brand-logo {
            color: black;
            display: flex;
        }
        nav .brand-logo {
            color: black;
        }
        .main-content {
            background-color: white;
            width: 85vw;
        }
        .container-infoEditais {
            margin-top: 100px;
            display: flex;
            justify-content: center;
        }
        .card.small {
            height: auto;
        }
        .card {
            border-radius: 15px;
        }
        .card-title {
            font-weight: bold;
        }
        .botao{
            text-align: center;
            line-height: 15px; /* Adicione esta linha */
            background-color: #dedede;
            padding: 5px;
            font-size: 15px;
            margin: 10px;
            border: 1px solid grey;
            color: #3e3e3e;
            cursor: pointer;
            border-radius: 10px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
            transition: .4s;

        }
        .botao:hover {
            transition: .4s;
            border: 1px solid #0fad41;
            background-color: #fff;
            color: #0fad41;
        }
    </style>
</head>

<body>

<nav>
    <div class="nav-wrapper white" style="display: flex; align-items: center;">
        <a href="tabelaEditais.php" id="sidebar-toggle" class="right"><i class="large material-icons" style="margin-left: 50px;color: black">arrow_back</i></a>
        <a href="paginaInicialAdmin.php" style="margin-left: auto;"><p class="black-text" style="margin-right: 60px;">Bem vindo! <?php echo $_SESSION['nome'] ?> </p></a>
        <i class="large material-icons brand-logo right" style="font-size: 50px;">account_circle</i>
    </div>
</nav>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
<div class="container-infoEditais">
    <div class="main-content">
        <h5 class="card-title black-text">Dados do Edital</h5>
        <hr><br>


            <div class="row">
                <div class="col s12 m12">
                    <div class="row">
                        <div class="card small white darken-1">
                            <div class="card-content black-text">
                                <div class="col s9">
                                    <p> Cliente <input type="text" name="nome_orgao" value="<?php echo $nome_orgao;?>" /></p>
                                </div>
                                <div class="col s3">
                                    <p> Número do Edital <input type="text" name="numero_edital" value="<?php echo $numero_edital;?>" /></p>
                                    <br>
                                </div>
                                <div class="col s3">
                                    <p> Número do processo <input type="text" name="numero_processo_edital" value="<?php echo $numero_processo_edital;?>" /></p>
                                </div>
                                <div class="col s12">
                                    <br>
                                    <div class="row">
                                        <div class="col s6">
                                            <p>Documento é SRP?</p>
                                            <p>
                                                <label>
                                                    <input name="tipo_documento" type="radio" value="SRP" <?php if ($tipo_documento == 'SRP') echo 'checked'; ?> />
                                                    <span>Sim</span>
                                                </label>
                                            </p>
                                            <p>
                                                <label>
                                                    <input name="tipo_documento" type="radio" value="NORMAL" <?php if ($tipo_documento == 'NORMAL') echo 'checked'; ?>/>
                                                    <span>Não</span>
                                                </label>
                                            </p>
                                        </div>
                                        <div class="col s2 offset-s4">
                                            <p>Data final <input type="datetime-local" name="data_final_edital" value="<?php echo  $data_final_edital;?>" /></p> <!-- Colocar hora -->
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col s12">
                                    <br>
                                    <div class="row">
                                        <div class="col s6">
                                            <p>Tipo de fornecimento</p>
                                            <p>
                                                <label>
                                                    <input name="tipo_fornecimento" type="radio" value="PRODUTO" <?php if ($tipo_fornecimento == 'PRODUTO') echo 'checked'; ?>/>
                                                    <span>Produto</span>
                                                </label>
                                            </p>
                                            <p>
                                                <label>
                                                    <input name="tipo_fornecimento" type="radio" value="SERVIÇO" <?php if ($tipo_fornecimento == 'SERVIÇO') echo 'checked'; ?>/>
                                                    <span>Serviço</span>
                                                </label>
                                            </p>
                                            <p>
                                                <label>
                                                    <input name="tipo_fornecimento" type="radio" value="PRODUTOS_SERVIÇOS" <?php if ($tipo_fornecimento == 'PRODUTOS_SERVIÇOS') echo 'checked'; ?>/>
                                                    <span>Produtos e Serviços</span>
                                                </label>
                                            </p>
                                        </div>
                                        <div class="col s2 offset-s4">
                                            <p>Data limite orçamento<input type="datetime-local" name="data_limite_orcamento" value="<?php echo  $data_limite_orcamento;?>" /></p> <!-- Colocar hora -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <br>
                                    <p>Modalidade</p>
                                    <p>
                                        <label>
                                            <input name="modalidade_edital" type="radio" value="SRP" <?php if ($modalidade_edital == 'SRP') echo 'checked'; ?>/>
                                            <span>Sim</span>
                                        </label>
                                    </p>
                                    <p>
                                        <label>
                                            <input name="modalidade_edital" type="radio" value="NORMAL" <?php if ($modalidade_edital == 'NORMAL') echo 'checked'; ?>/>
                                            <span>Não</span>
                                        </label>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        

        <h5 class="card-title black-text">Produtos</h5>
        <hr><br>

        <div class="row"> 
            <div class="col s12 m12">
                <div class="card small white darken-1">
                    <div class="card-content black-text">
                    <p id="botaoAdicionarProduto" onclick="adicionarNovoProduto()" class="enviar">
                        <a class="btn-floating btn-small waves-effect waves-light black">
                        <i class="material-icons">add</i>
                        </a>
                    </p>
                    <div class="produtos"></div>
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

                        if ($result_editais) {
                            $num_rows = mysqli_num_rows($result_editais);
                            if ($num_rows > 0) {
                                while ($row = mysqli_fetch_assoc($result_editais)) {
                                    echo  '<div class="row">
                                            <div class="col s4">
                                                <div class="input-field">
                                                    <input id="input1" type="text" class="validate " value="' . $row['desc_produto_edital'] . '">
                                                    <label for="input1">Descrição</label>
                                                </div>
                                            </div>
                                            <div class="col s1">
                                                <div class="input-field">
                                                    <input id="input2" type="text" class="validate " value="' . $row['item_edital'] . '">
                                                    <label for="input2">Item</label>
                                                </div>
                                            </div>
                                            <div class="col s2">
                                                <div class="input-field">
                                                    <input id="input3" type="text" class="validate " value="' . $row['valor_unit_ref_produto_edital'] . '">
                                                    <label for="input3">Valor de Referencia</label>
                                                </div>
                                            </div>
                                            <div class="col s1">
                                                <div class="input-field">
                                                    <input id="input4" type="text" class="validate " value="' . $row['lote_produto_edital'] . '">
                                                    <label for="input4">Lote</label>
                                                </div>
                                            </div>
                                            <div class="col s2">
                                                <div class="input-field">
                                                    <input id="input5" type="text" class="validate " value="' . $row['qtd_produto_edital'] . '">
                                                    <label for="input5">QTD</label>
                                                </div>
                                            </div>
                                            <div class="col s2">
                                                <div class="input-field">
                                                    <input id="input6" type="text" class="validate " value="' . $row['und_produto_edital'] . '">
                                                    <label for="input6">UND</label>
                                                </div>
                                            </div>
                                        </div>';
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <h5 class="card-title black-text">Totais do Edital</h5>
        <hr><br>
        
        <div class="row">
            <div class="card small white darken-1">
                <div class="card-content black-text">
                    <div class="col s3 m3">
                        <p>Valor Dos Produtos<input type="text"/></p>
                    </div>
                    <div class="col s3 m3">
                        <p>Valor do IPI<input type="text"/></p>
                    </div>
                    <div class="col s3 m3">
                        <p>Valor do Frete <input type="text"/></p>
                    </div>
                    <div class="col s3 m3">
                        <p>Valor Do Desconto <input type="text"/></p>
                        <br>
                    </div>
                    <div class="col s6 m6">
                        <p>Valor Total Do Orçamento<input type="text"/></p>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <h5 class="card-title black-text">Transporte</h5>
        <hr><br>
        
        <div class="row">
            <div class="card small white darken-1">
                <div class="card-content black-text">
                    <div class="col s6 m6">
                        <p>Modalidade do Frete<input type="text"/></p>
                    </div>
                    <div class="col s6 m6">
                        <p>Transportadora<input type="text"/></p>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <h5 class="card-title black-text">Detalhes do Orçamento</h5>
        <hr><br>
        
        <div class="row">
            <div class="card small white darken-1">
                <div class="card-content black-text">
                    <div class="col s2 m2">
                        <p>Data Do Orçamento<input type="text" /></p>
                    </div>
                    <div class="col s2 m2">
                        <p>Prazo de Entrega<input type="text" /></p>
                    </div>
                    <div class="col s1 m1">
                        <p>Validade<input type="text" /></p>
                    </div>
                    <div class="col s6 m6">
                        <p>Referencia<input type="text" /></p>
                        <br><br>
                    </div>
                    <div class="col s6 m6">
                        <p>Observaçao<input type="text" /></p>
                    </div>
                </div>
            </div>
        </div>
        <button class="botao" type="submit" name="update">Atualizar</button>
    </div>
</div>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
