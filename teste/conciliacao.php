<?php

session_start();
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
            echo "<a href='#' class='collection-item resultado_pesquisa' data-marca_produto='" . $row['marca_produto'] . "' data-modelo_produto='" . $row['modelo_produto'] .   "' data-valor_custo_produto='" . $row['valor_custo_produto'] . "' data-valor_minimo_produto='" . $row['valor_minimo_produto'] . "' data-valor_cadastro_produto='" . $row['valor_cadastro_produto'] . "' data-id_produto='" . $row['id_produto'] . "' data-qtd_produto='" . $row['qtd_produto'] . "' data-und_produto='" . $row['und_produto'] . "' >" . $row['desc_produto'] . "</a>";

        }
    } else {
        echo "Nenhum resultado encontrado.";
    }

    exit(); 
} 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conciliação</title>
    <link rel="stylesheet" href="css/styles.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>


<style>


.brand-logo { 
    color: black;
    display: flex;
   
}

nav .brand-logo {
    color:black;
}



.container {

        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}


.row {
    width:100%;
}

.container-tabela {
    width: 100%;
}
</style>
<body>

<nav>
    <div class="nav-wrapper white" style="display: flex; align-items: center; flex-direction: row-reverse;"> 
        <i class="large material-icons brand-logo" style="font-size: 50px;">account_circle</i>
        <a href="paginaInicialAdmin.php"><p class="black-text" style="margin-right: 60px;">Bem vindo! <?php echo $_SESSION['nome'] ?> </p></a>
    </div>
</nav>



<div class="container-tabela">
<?php
        $host = "localhost";
        $dbname = "allume";
        $username = "root";
        $password = "";


        $id = $_POST['id'];

        // Conexão com o banco de dados MySQL
        $dbcon = mysqli_connect($host, $username, $password, $dbname);

        // Verifica se a conexão foi bem sucedida

        $query_editais = "SELECT * FROM produtos_do_edital WHERE id_edital = $id";
        $result_editais = mysqli_query($dbcon, $query_editais);

        // Verifique se há linhas retornadas
        if ($result_editais) {
           

                while ($row = mysqli_fetch_assoc($result_editais)) {

                     $num_rows = mysqli_num_rows($result_editais);

            if ($num_rows > 0) {
                // Exibir os usuários em uma tabela
                echo "<table class='funcionarios' id='tabela_editais'>";
                echo "<thead>";
                echo "<tr  onclick=\"enviarFormulario('" . $row['id_edital'] . "')\">";
        
                echo "<th>Item</th>";
                echo "<th>Lote</th>";
                echo "<th>QTD</th>";
                echo "<th>UND</th>";
                  echo "<th>Val Ref</th>";
                echo "<th>Produtos</th>";



                echo "<th>Pesquisa</th>";       
     echo "<th>Marca</th>";
                echo "<th>QTD</th>";
                echo "<th>UN</th>";
               
                echo "<th>Modelo</th>";
                echo "<th>Valor Mínimo</th>";
                echo "<th>Valor Cadastrado</th>";
            
              

               
                
              
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";


                    echo "<tr>";
                  echo "<td>" . $row["item_edital"] . "</td>";

                    echo "<td>" . $row["lote_produto_edital"] . "</td>";

                    echo "<td>" . $row["qtd_produto_edital"] . "</td>";

                    echo "<td>" . $row["und_produto_edital"] . "</td>";

                    echo "<td>" . $row["valor_unit_ref_produto_edital"] . "</td>";

                    echo "<td>" . $row["desc_produto_edital"] . "</td>";

                
                    echo "<form id='formulario_edital' action='conciliacao.php' method='post' enctype='multipart/form-data'>";
                   
                    echo "<td>
                            <div class='input-field'>
                                <input type='text' id='pesquisar_produtos' placeholder='Pesquisa' required>
                                <label for='pesquisar_produtos'>Produtos</label>
                            </div>
                        </td>
                      <td>
                            <div class='input-field'>
                                <input type='text' id='marca_produto' placeholder='Marca do Produto' readonly required>
                                <label for='marca_produto'>Marca</label>
                            </div>
                        </td>
                        <td>
                            <div class='input-field'>
                                <input type='text' id='qtd_produto' placeholder='QTD' readonly required>
                                <label for='qtd_produto'>QTD</label>
                            </div>
                        </td>
                        <td>
                            <div class='input-field'>
                                <input type='text' id='und_produto' placeholder='UN' readonly required>
                                <label for='und_produto'>UN</label>
                            </div>
                        </td>
                        
                        <td>
                            <div class='input-field'>
                                <input type='text' id='modelo_produto' placeholder='Modelo do Produto' readonly required>
                                <label for='modelo_produto'>Modelo</label>
                            </div>
                        </td>
                        <td>
                            <div class='input-field'>
                                <input type='text' id='valor_minimo_produto' placeholder='Valor Mínimo' readonly required>
                                <label for='valor_minimo_produto'>Valor Mínimo</label>
                            </div>
                        </td>
                        <td>
                            <div class='input-field'>
                                <input type='text' id='valor_cadastro_produto' placeholder='Valor Cadastrado' readonly required>
                                <label for='valor_cadastro_produto'>Valor Cadastrado</label>
                            </div>
                        </td>";
                    echo "</tr>";
                    echo "</form>";
                    
            echo "</tr>";
            
                   

                }

                echo "</tbody>";
                echo "</table>";

          
                echo "<div class='card-body'>
                <form id='formulario_info_editais' method='post' action='conciliacao.php'>
                    <input type='hidden' id='id_editais' name='id' value='" . $row['id_edital'] . "'>
                </form>
            </div>";
            

            } 
        } else {
            // Erro na consulta
            echo "Erro na consulta: " . mysqli_error($dbcon);
        }

        // Fechar conexão com o banco de dados
        mysqli_close($dbcon);
        ?>

</div>


    <div class="container-tabela">
    <h2>Conciliação de produtos</h2>
    <form id="formulario_edital" action="conciliacao.php" method="post" enctype="multipart/form-data">
       
    
      
    <div class="row">
    <div class="col s12 m12">
        <div class="card large white darken-1">
            <div class="card-content black-text">
                <div class="row">
                    <div class="col s1">
                        <div class="input-field">
                        <p><label for="pesquisar_produtos"> Produtos</label> <input type="text" id="pesquisar_produtos" placeholder="Pesquisa" required /></p>
                        </div>
                    </div>
                    <div class="col s1">
                        <div class="input-field">
                             <p><label for="id_produto">ID</label> <input type="text" id="id_produto" placeholder="ID" readonly required /></p>
                        </div>
                    </div>
                    <div class="col s1">
                        <div class="input-field">
                               <p><label for="qtd_produto">QTD</label> <input type="text" id="qtd_produto" placeholder="QTD" readonly required /></p>
                        </div>
                    </div>
                    <div class="col s1">
                        <div class="input-field">
                              <p><label for="und_produto">UN</label> <input type="text" id="und_produto" placeholder="UN" readonly required /></p>
                        </div>
                    </div>
                    <div class="col s1">
                        <div class="input-field">
                             <p><label for="marca_produto">Marca</label> <input type="text" id="marca_produto" placeholder="Marca do Produto" readonly required /></p>
                        </div>
                    </div>
                    <div class="col s1">
                        <div class="input-field">
                             <p><label for="modelo_produto">Modelo</label> <input type="text" id="modelo_produto" placeholder="Modelo do Produto" readonly required /></p>
                        </div>
                    </div>
                    <div class="col s2">
                        <div class="input-field">
                                    <p><label for="valor_custo_produto">Val. Custo</label> <input type="text" id="valor_custo_produto" placeholder="Valor de Custo" readonly required /></p>
                        </div>
                    </div>

                    <div class="col s2">
                        <div class="input-field">
                                   <p><label for="valor_minimo_produto">Valor Mínimo</label> <input type="text" id="valor_minimo_produto" placeholder="Valor Minimo" readonly required /></p>      
                        </div>
                    </div>
                    <div class="col s2">
                        <div class="input-field">
                                  <p><label for="valor_cadastro_produto">Valor Cadastrado</label> <input type="text" id="valor_cadastro_produto" placeholder="Valor Cadastrado" readonly required /></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

       
       

   
        
    </form>

















    <p id="erroPreencher" class="red-text"> </p>
    <div id="resultado_pesquisa_produtos" class="collection"></div>
</div>


    

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
            
            // Manipular o clique em um resultado de pesquisa
            $(document).on('click', '.resultado_pesquisa', function(){
                var descricao = $(this).text();
                var marca_produto = $(this).data('marca_produto');
                var modelo_produto = $(this).data('modelo_produto'); 
                var valor_custo_produto = $(this).data('valor_custo_produto');
                var valor_minimo_produto = $(this).data('valor_minimo_produto');
                var valor_cadastro_produto = $(this).data('valor_cadastro_produto');
                var id_produto = $(this).data('id_produto');
                var qtd_produto = $(this).data('qtd_produto');
                var und_produto = $(this).data('und_produto');
                
                $('#pesquisar_produtos').val(descricao);
                $('#marca_produto').val(marca_produto);
                $('#modelo_produto').val(modelo_produto);
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
