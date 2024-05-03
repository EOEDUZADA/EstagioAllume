<?php

$id = $_POST['id'];


if (isset($_POST['dadosTabelas'])) {


    $host = "localhost";
    $dbname = "allume";
    $username = "root";
    $password = "";

    $dbcon = mysqli_connect($host, $username, $password, $dbname);



    
    // Fazer o SELECT para obter os IDs dos produtos
    $query = "SELECT id_produto FROM produtos_conciliados WHERE id_edital = $id";
    $result = mysqli_query($dbcon, $query);
    $i = 0;

    // Verificar se a consulta foi bem-sucedida
 
  

    if ($result) {      
        while ($row = mysqli_fetch_assoc($result)) {
       // Verificar se há linhas retornadas
       $num_rows = mysqli_num_rows($result);
       if ($num_rows > 0) {
           $id_produto = $row['id_produto']; // Obtém o valor de id_produto
           $id_produtos[] = $id_produto;
           }
       } 
   
   } 

   print_r($id_produtos);

$i++;

 $dadosTabelas = $_POST['dadosTabelas'];
    
    $j = 0;
    $id = $_POST['id'];

    // Supondo que $dadosTabelas contenha o array que você mostrou
    foreach ($dadosTabelas as $indice => $dadosTabela) {

$j++;


    

        echo 'Marca ' . $dadosTabela['marca_produto_'. $j];

        $sql_code = "UPDATE produtos_conciliados SET
        und_produto = '" . $dadosTabela['und_produto_' . $j] . "',
        qtd_produto = '" . $dadosTabela['qtd_produto_' . $j] . "',
        desc_produto = '" . $dadosTabela['desc_produto_' . $j] . "',
        marca_produto = '" . $dadosTabela['marca_produto_' . $j] . "',
        modelo_produto = '" . $dadosTabela['modelo_produto_' . $j] . "',
        valor_minimo_produto = '" . $dadosTabela['valor_minimo_produto_' . $j] . "',
        valor_cadastro_produto = '" . $dadosTabela['valor_cadastro_produto_' . $j] . "'
     WHERE id_produto = $id_produtos[$indice]";



       
       
       if (mysqli_query($dbcon, $sql_code)) {
           echo "Dados atualizados com sucesso";

           print_r($sql_code);
           echo $id;
        } else {
            echo "Erro na consulta de inserção:";
        }

        
        echo " UPDATE $id_produtos[$indice] ";

    }



  







        }
   
 else {
    echo "Erro ao consultar o banco de dados: " . mysqli_error($dbcon);
}



    // Acessar os dadosTabelas
   
    

    












?>
