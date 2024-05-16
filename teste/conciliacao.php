<?php
session_start(); 






?>


<?php



// Verificar se os dadosTabelas foram recebidos




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
    $tab = $_POST['tab'];
    // Consulta SQL para pesquisar no banco de dados
    $sql = "SELECT p.*, m.*
    FROM produtos p
    INNER JOIN marcas m ON p.id_produto = m.id_produto
    WHERE p.nome_produto LIKE :query
    ORDER BY m.vlr_custo ASC
    LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':query', '%' . $query . '%');
    $stmt->execute();
    $results = $stmt->fetchAll();

    // Mostrar os resultados da pesquisa
    if ($results) {
        // Defina uma variável para contar o número de tabelas
        $num_tabelas = $_POST['num_tabelas'];
    
        foreach ($results as $row) { 
            // Exiba a opção de pesquisa apenas uma vez para cada tabela


            if (isset($_POST['query_marca'])) {



                $host = "localhost";
                $dbname = "allume";
                $username = "root";
                $password = "";
            
                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            
                // Recuperar a consulta de pesquisa do parâmetro POST
                $query = $_POST['query'];
            
                $tab = $_POST['tab'];
          
                
                    $sql = "SELECT * FROM produtos WHERE nome_produto LIKE :query";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindValue(':query', '%' . $query . '%');
                    $stmt->execute();
                    $results = $stmt->fetchAll();

                
                    // Mostrar os resultados da pesquisa
                        // Defina uma variável para contar o número de tabelas
                    
                        $productData = array(); // Array para armazenar os dados dos produtos

                        // Iterando sobre os resultados para criar arrays associativos para cada linha
                        foreach ($results as $row) {
                            $product = array(
                                'marca' => $row['marca_produto'],
                                'modelo' => $row['modelo_produto'],
                                'valor_custo' => $row['valor_custo_produto'],
                                'valor_minimo' => $row['valor_minimo_produto'],
                                'valor_cadastro' => $row['valor_cadastro_produto'],
                                'id' => $row['id_produto'],
                                'unidade' => $row['und_produto']
                            );
                        
                            // Adicionando o array associativo do produto ao array principal
                            $productData[] = $product;
                        }
                        
                        // Agora você pode usar $productData em outro loop foreach separado
                        foreach ($productData as $product) {
                            // Acessando os valores do produto usando chaves associativas
                    



 echo "<div class='collection'>";
                echo "<a href='#' class='collection-item resultado_pesquisa_marca_produtos_$tab ' data-marca_produto_$tab='" . $product['marca'] . "' data-modelo_produto_$tab='" . $product['modelo'] .   "' data-valor_custo_produto_$tab='" . $product['valor_custo'] . "' data-valor_minimo_produto_$tab='" . $product['valor_minimo'] . "' data-valor_cadastro_produto_$tab='" . $product['valor_cadastro'] . "' data-id_produto_$tab='" .  $product['id'] . "' data-und_produto_$tab='" .  $product['unidade'] . "' >" . $product['marca'] . "</a>";
                echo "</div>";


                        }
                        

               
            

                
            }

            else {
               

            echo "<div class='collection'>";
            echo "<a href='#' class='collection-item resultado_pesquisa_$tab' data-marca_produto_$tab='" . $row['marca'] . "' data-modelo_produto_$tab='" . $row['modelo'] .   "' data-valor_custo_produto_$tab='" . $row['vlr_custo'] . "' data-valor_minimo_produto_$tab='" . $row['valor_minimo_produto'] . "' data-valor_cadastro_produto_$tab='" . $row['valor_cadastro_produto'] . "' data-id_produto_$tab='" . $row['id_produto'] . "' data-und_produto_$tab='" . $row['und_produto'] . "' >" . $row['nome_produto'] . "</a>";
            echo "</div>";


            }
            
           
        }
    }
     else {
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
    <link rel="stylesheet" href="css/styles.css" />
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
        color: black;
    }

    .container {
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .row {
        width: 100%;
    }

    .container-tabela {
        width: 100%;
    }
</style>

<body>

<nav>
    <div class="nav-wrapper white" style="display: flex; align-items: center;">
        <a href="tabelaEditais.php" id="sidebar-toggle" class="right"><i class="large material-icons" style="margin-left: 50px;color:black">arrow_back</i></a>
        <a href="paginaInicialAdmin.php" style="margin-left: auto;"><p class="black-text" style="margin-right: 60px;"> <?php echo $_SESSION['nome'] ?> </p></a>
        <i class="large material-icons brand-logo right" style="font-size: 50px;">account_circle</i>
    </div>
</nav>


    <div class="container-tabela">
        <h2>Conciliação de produtos</h2>

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




$host = "localhost";
$dbname = "allume";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);


$sql = "SELECT * FROM produtos_conciliados WHERE id_edital = $id";
$dbcon = mysqli_connect($host, $username, $password, $dbname);
$ultimo_dado = mysqli_query($dbcon, $sql);


$jatem = "";


echo $jatem;


// Verifique se há linhas retornadas
if (mysqli_num_rows($result_editais) > 0  and  mysqli_num_rows($ultimo_dado) > 0 ) {
    $i = 0;
    while ($row = mysqli_fetch_assoc($result_editais) and ($row2 = mysqli_fetch_assoc($ultimo_dado))){
        $i++;
        $num_rows = mysqli_num_rows($result_editais);
        $num_rows2 = mysqli_num_rows($ultimo_dado);
        if ($num_rows > 0 and $num_rows2 > 0) {
            // Exibir os usuários em uma tabela
            echo "<table class='funcionarios' id='tabela_editais'>";
            echo "<thead>";
            echo "<tr  onclick=\"enviarFormulario('" . $row['id_edital'] . "')\">";


            

            echo "<th>Lote</th>";
            echo "<th>Item</th>";
            echo "<th>QTD</th>";
            echo "<th>UND</th>";
        
            echo "<th>Produtos</th>";

            echo "<th>Pesquisa</th>";
            echo "<th>Marca</th>";
            echo "<th>UN</th>";
            echo "<th>Modelo</th>";
            echo "<th>Val Ref</th>";
         
            echo "<th>Valor Mínimo</th>";
            echo "<th>Valor Cadastrado</th>";

            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";


            echo "<tr>"; 
            echo "<td>" . $row["lote_produto_edital"] . "</td>";
            echo "<td>" . $row["item_edital"] . "</td>";

         

            echo "<td id='qtd_produto_$i'>" . $row["qtd_produto_edital"] . "</td>";

            echo "<td>" . $row["und_produto_edital"] . "</td>";

            
            echo "<td>" . $row["desc_produto_edital"] . "</td>";

            echo "<form id='formulario_edital_$i' action='conciliacao.php' method='post' enctype='multipart/form-data'>";



            echo "<td>
            <div class='input-field'>
                <input type='text' id='pesquisar_produtos_$i' placeholder='Pesquisa' value='" . $row2['desc_produto'] . "' required>
                <label for='pesquisar_produtos_$i'>Produtos</label>
                <div id='resultado_pesquisa_produtos_$i' class='collection'></div>
            </div>
        </td>
        <td>

                            <div class='input-field'>
                                <input type='text' id='marca_produto_$i' placeholder='Marca do Produto' value='" . $row2['marca_produto'] . "' required>
                                <label for='marca_produto_$i'>Marca</label>
                                <div id='resultado_pesquisa_marca_produtos_$i' class='collection'></div>
                            </div>
                        </td>
                        <td>
                            <div class='input-field'>
                                <input type='text' id='und_produto_$i' placeholder='UN' value='" . $row2['und_produto'] . "' readonly required>
                                <label for='und_produto_$i'>UN</label>
                                
                            </div>
                        </td>
                        
                        <td>
                            <div class='input-field'>
                                <input type='text' id='modelo_produto_$i' placeholder='Modelo do Produto' value='" . $row2['modelo_produto'] . "' readonly required>
                                <label for='modelo_produto_$i'>Modelo</label>
                            </div>
                        </td>
                        
                        
                        
                        <td>" . $row["valor_unit_ref_produto_edital"] . "</td>

                        <td>
                            <div class='input-field'>
                                <input type='text' id='valor_minimo_produto_$i' placeholder='Valor Mínimo' value='" . $row2['valor_minimo_produto'] . "' readonly required>
                                <label for='valor_minimo_produto'>Valor Mínimo</label>
                            </div>
                        </td>
                        <td>
                            <div class='input-field'>
                                <input type='text' id='valor_cadastro_produto_$i' placeholder='Valor Cadastrado' value='" . $row2['valor_cadastro_produto'] . "' readonly required>
                                <label for='valor_cadastro_produto'>Valor Cadastrado</label>
                            </div>
                        </td>";
            echo "</tr>";

           echo " <button type='submit' id='botaoSubmit' style='display: none;'>Enviar</button>";
            echo "</form>";

            echo "</tr>";

            echo "</tbody>";


            if($row["und_produto_edital"] !== $row2['und_produto'] ) {





            }

            else {


                echo "ta certinho";

            }

            echo "</table>";

            echo "<div class='card-body'>
                    <form id='formulario_info_editais' method='post' action='conciliacao.php'>
                        <input type='hidden' id='id_editais' name='id' value='" . $row['id_edital'] . "'>
                    </form>
                </div>";
        }

$jatem = 'true';

    }



} else {


    if ($result_editais) {
        $i = 0;
        while ($row = mysqli_fetch_assoc($result_editais)) {
            $i++;
            $num_rows = mysqli_num_rows($result_editais);
            if ($num_rows > 0) {
                // Exibir os usuários em uma tabela
                echo "<table class='funcionarios' id='tabela_editais'>";
                echo "<thead>";
                echo "<tr  onclick=\"enviarFormulario('" . $row['id_edital'] . "')\">";
    
                echo "<th>Lote</th>";
                echo "<th>Item</th>";
                echo "<th>QTD</th>";
                echo "<th>UND</th>";
            
                echo "<th>Produtos</th>";
    
                echo "<th>Pesquisa</th>";
                echo "<th>Marca</th>";
                echo "<th>UN</th>";
                echo "<th>Modelo</th>";
                echo "<th>Val Ref</th>";
             
                echo "<th>Valor Mínimo</th>";
                echo "<th>Valor Cadastrado</th>";
    
    
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
    
    
                echo "<tr>"; 
                echo "<td>" . $row["lote_produto_edital"] . "</td>";
                echo "<td>" . $row["item_edital"] . "</td>";
    
              
    
                echo "<td id='qtd_produto_$i' >" . $row["qtd_produto_edital"] . "</td>";

    
                echo "<td>" . $row["und_produto_edital"] . "</td>";
    
              
    
                echo "<td>" . $row["desc_produto_edital"] . "</td>";
    
                echo "<form id='formulario_edital_$i' action='conciliacao.php' method='post' enctype='multipart/form-data'>";
    
    
            
    
                echo "<td>
                                <div class='input-field'>
                                    <input type='text' id='pesquisar_produtos_$i' placeholder='Pesquisa' required>
                                    <label for='pesquisar_produtos_$i'>Produtos</label>
                                    <div id='resultado_pesquisa_produtos_$i' class='collection'></div>
                                </div>
                            </td>
                          <td>
    
                                <div class='input-field'>
                                    <input type='text' id='marca_produto_$i' placeholder='Marca do Produto'  required>
                                    <label for='marca_produto_$i'>Marca</label>
                                    <div id='resultado_pesquisa_marca_produtos_$i' class='collection'></div>
                                </div>
                            </td>
                            <td>
                                <div class='input-field'>
                                    <input type='text' id='und_produto_$i' placeholder='UN' readonly required>
                                    <label for='und_produto_$i'>UN</label>
                                </div>
                            </td>
                            
                            <td>
                                <div class='input-field'>
                                    <input type='text' id='modelo_produto_$i' placeholder='Modelo do Produto' readonly required>
                                    <label for='modelo_produto_$i'>Modelo</label>
                                </div>
                            </td> 
                            <td>" . $row["valor_unit_ref_produto_edital"] . "</td>
                            <td>
                                <div class='input-field'>
                                    <input type='text' id='valor_minimo_produto_$i' placeholder='Valor Mínimo' readonly required>
                                    <label for='valor_minimo_produto'>Valor Mínimo</label>
                                </div>
                            </td>
                            <td>
                                <div class='input-field'>
                                    <input type='text' id='valor_cadastro_produto_$i' placeholder='Valor Cadastrado' readonly required>
                                    <label for='valor_cadastro_produto'>Valor Cadastrado</label>
                                </div>
                            </td>";
                echo "</tr>";
    
               echo " <button type='submit' id='botaoSubmit' style='display: none;'>Enviar</button>";
                echo "</form>";
    
                echo "</tr>";
    
                echo "</tbody>";
                echo "</table>";
    
                echo "<div class='card-body'>
                        <form id='formulario_info_editais' method='post' action='conciliacao.php'>
                            <input type='hidden' id='id_editais' name='id' value='" . $row['id_edital'] . "'>
                        </form>
                    </div>";
            }
    
    
    
        }
    
    
    
    }


echo "Else está funcionando";


    // Erro na consulta
    
}

// Fechar conexão com o banco de dados
mysqli_close($dbcon);
?>

    </div>


    <div class="novadiv"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        function configurarEventos(i) {
            $('#pesquisar_produtos_' + i).keyup(function() {
                var query = $(this).val();
                var num_tabelas = document.querySelectorAll("#tabela_editais").length;
                var id = <?php echo $_POST['id']; ?>;
                var tab = i;
                console.log(tab);
                if (query.length > 0) {
                    $.ajax({
                        url: 'conciliacao.php',
                        method: 'POST',
                        data: {
                            id:id,
                            query: query,
                            num_tabelas:num_tabelas,
                            tab:tab
                        },
                        success: function(data) {
                            $('#resultado_pesquisa_produtos_' + i).html(data);
                        }
                    });
                } else {
                    $('#resultado_pesquisa_produtos_' + i).html('');
                } 
                
                
            $(document).on('click', '.resultado_pesquisa_' + i, function() {
                $('#resultado_pesquisa_produtos_' + i).html('');
                var descricao = $(this).text();
                var marca_produto = $(this).data('marca_produto_'+i);
                var modelo_produto = $(this).data('modelo_produto_'+i);
                var valor_custo_produto = $(this).data('valor_custo_produto_'+i);
                var valor_minimo_produto = $(this).data('valor_minimo_produto_'+i);
                var valor_cadastro_produto = $(this).data('valor_cadastro_produto_'+i);

               
                var und_produto = $(this).data('und_produto_'+i);
                $('#pesquisar_produtos_' + i).val(descricao);
                $('#marca_produto_' + i).val(marca_produto);
                $('#modelo_produto_' + i).val(modelo_produto);
                $('#valor_custo_produto_' + i).val(valor_custo_produto);
                $('#valor_minimo_produto_' + i).val(valor_minimo_produto);
                $('#valor_cadastro_produto_' + i).val(valor_cadastro_produto);
                $('#und_produto_' + i).val(und_produto);
            });



 ///MARCA

                $('#marca_produto_' + i).click(function() {
                  
                var num_tabelas = document.querySelectorAll("#tabela_editais").length;
                var tab = i;
                var query_marca = query;
                console.log(tab);
                if (query.length > 0) {
                    $.ajax({
                        url: 'conciliacao.php',
                        method: 'POST',
                        data: {
                            query: query,
                            query_marca:query_marca,
                            num_tabelas:num_tabelas,
                            tab:tab
                        },
                        success: function(data) {
                            $('#resultado_pesquisa_marca_produtos_' + i).html(data);
                        }
                    });
                } else {
                    $('#resultado_pesquisa_marca_produtos_' + i).html('');
                }
            });

            

            $(document).on('click', '.resultado_pesquisa_marca_produtos_' + i, function() {
                $('#resultado_pesquisa_marca_produtos_' + i).html('');
                var descricao = $('#pesquisar_produtos_' + i).val();
                console.log(descricao);
                var marca_produto = $(this).data('marca_produto_'+i);
                console.log(marca_produto);
                var modelo_produto = $(this).data('modelo_produto_'+i);
                var valor_custo_produto = $(this).data('valor_custo_produto_'+i);
                var valor_minimo_produto = $(this).data('valor_minimo_produto_'+i);
                var valor_cadastro_produto = $(this).data('valor_cadastro_produto_'+i);
                var und_produto = $(this).data('und_produto_'+i);
                $('#pesquisar_produtos_' + i).val(descricao);
                $('#marca_produto_' + i).val(marca_produto);
                $('#modelo_produto_' + i).val(modelo_produto);
                $('#valor_custo_produto_' + i).val(valor_custo_produto);
                $('#valor_minimo_produto_' + i).val(valor_minimo_produto);
                $('#und_produto_' + i).val(und_produto);


                
            
            });
            });


           

           
         


         
         





        }




        $(document).ready(function() {
    $('#btnSalvar').click(function() {
        // Array para armazenar os dados de todas as tabelas
        var dadosTabelas = [];

        // Iterar sobre todas as tabelas com a classe '.funcionarios'
        $('table').each(function(i) {
            i++;

            // Objeto para armazenar os dados de uma tabela específica
            var dadosTabela = {};

            // Obter os valores dos inputs dentro da tabela atual
            var desc_produto = $(this).find('#pesquisar_produtos_' + i).val();
            var marca = $(this).find('#marca_produto_' + i).val();
            var modelo = $(this).find('#modelo_produto_' + i).val();
            var valor_minimo = $(this).find('#valor_minimo_produto_' + i).val();
            var valor_custo = $(this).find('#valor_custo_produto_' + i).val();
            var valor_cadastro = $(this).find('#valor_cadastro_produto_' + i).val();
            var und = $(this).find('#und_produto_' + i).val();

            // Para pegar o valor da célula com o ID específico usando getElementById
var qtdProduto = document.getElementById('qtd_produto_' + i).innerText;
console.log(qtdProduto);




            console.log(qtdProduto);
           
            

            // Adicionar os dados ao objeto dadosTabela
            
            dadosTabela['desc_produto_' + i] = desc_produto;
            dadosTabela['marca_produto_' + i] = marca;
            dadosTabela['modelo_produto_' + i] = modelo;
            dadosTabela['valor_minimo_produto_' + i] = valor_minimo;
            dadosTabela['valor_cadastro_produto_' + i] = valor_cadastro;
            dadosTabela['und_produto_' + i] = und;
            dadosTabela['qtd_produto_' + i] = qtdProduto;

            // Adicionar os dados da tabela atual ao array dadosTabelas
            dadosTabelas.push(dadosTabela);

            console.log(dadosTabela);
        });

        var id = <?php echo $_POST['id']; ?>

        // Enviar os dados para o PHP via AJAX
        $.ajax({
            type: "POST",
            url: "inserir_produtos_conciliados.php",
            data: { 
                id:id,
                dadosTabelas: dadosTabelas },
            success: function(data) {
                // Lidar com a resposta do servidor, se necessário
                console.log(data);
                console.log(dadosTabelas);
                $('.novadiv').html(data);
            },
            error: function(xhr, status, error) {
                // Lidar com erros de requisição, se necessário
                console.error(xhr.responseText);
            }
        });
    });
});


/// BOTAO UPDATE

$(document).ready(function() {
    $('#btnUpdate').click(function() {
        // Array para armazenar os dados de todas as tabelas
        var dadosTabelas = [];

        // Iterar sobre todas as tabelas com a classe '.funcionarios'
        $('table').each(function(i) {
            i++;

            // Objeto para armazenar os dados de uma tabela específica
            var dadosTabela = {};

            // Obter os valores dos inputs dentro da tabela atual
            var desc_produto = $(this).find('#pesquisar_produtos_' + i).val();
            var marca = $(this).find('#marca_produto_' + i).val();
            var modelo = $(this).find('#modelo_produto_' + i).val();
            var valor_minimo = $(this).find('#valor_minimo_produto_' + i).val();
            var valor_custo = $(this).find('#valor_custo_produto_' + i).val();
            var valor_cadastro = $(this).find('#valor_cadastro_produto_' + i).val();
            var und = $(this).find('#und_produto_' + i).val();
            
            
            // Para pegar o valor da célula com o ID específico usando getElementById
var qtdProduto = document.getElementById('qtd_produto_' + i).innerText;
console.log(qtdProduto);




            console.log(qtdProduto);
           
            

            // Adicionar os dados ao objeto dadosTabela
            
            dadosTabela['desc_produto_' + i] = desc_produto;
            dadosTabela['marca_produto_' + i] = marca;
            dadosTabela['modelo_produto_' + i] = modelo;
            dadosTabela['valor_minimo_produto_' + i] = valor_minimo;
            dadosTabela['valor_cadastro_produto_' + i] = valor_cadastro;
            dadosTabela['und_produto_' + i] = und;
            dadosTabela['qtd_produto_' + i] = qtdProduto;

            // Adicionar os dados da tabela atual ao array dadosTabelas
            dadosTabelas.push(dadosTabela);

            console.log(dadosTabela);
        });

        var id = <?php echo $_POST['id']; ?>

        // Enviar os dados para o PHP via AJAX
        $.ajax({
            type: "POST",
            url: "atualizar_produtos_conciliados.php",
            data: { 
                id:id,
                dadosTabelas: dadosTabelas },
            success: function(data) {
                // Lidar com a resposta do servidor, se necessário
                console.log(data);
                console.log(dadosTabelas);
                $('.novadiv').html(data);
            },
            error: function(xhr, status, error) {
                // Lidar com erros de requisição, se necessário
                console.error(xhr.responseText);
            }
        });
    });
});








        $(document).ready(function() {
            // Inicialização do Materialize
            M.AutoInit();
            <?php
            // Inicialização do valor de i
            $i = 0;
            ?>
            <?php foreach ($result_editais as $row) : ?>
                <?php $i++; ?>
                console.log("oi<?php echo $i; ?>");
                configurarEventos(<?php echo $i; ?>);
            <?php endforeach; ?>
        });


      



      



    </script>

<?php

if($jatem !== "true") {


echo " <div class='card-body'>
                        
    <button type='submit' id='btnSalvar' class='btn btn-primary'>
    <i class='fa fa-cart-plus mr-2'></i>Salvar
</button>

</div> ";


}

?>


                    <?php

if($jatem == "true") {


echo " <div class='card-body'>
                        
    <button type='submit' id='btnUpdate' class='btn btn-primary'>
    <i class='fa fa-cart-plus mr-2'></i>Update
</button>

</div> ";


}

?>

</body>

</html>


