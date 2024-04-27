<?php

$id = $_POST['id'];


if (isset($_POST['dadosTabelas'])) {


    $host = "localhost";
    $dbname = "allume";
    $username = "root";
    $password = "";

    $dbcon = mysqli_connect($host, $username, $password, $dbname);

    // Acessar os dadosTabelas
    $dadosTabelas = $_POST['dadosTabelas'];

    $id = $_POST['id'];
 $i = 0;
    // Supondo que $dadosTabelas contenha o array que você mostrou
    foreach ($dadosTabelas as $indice => $dadosTabela) {

        $i++;
        // Imprimir os valores individualmente
        $Desc=   $dadosTabela['desc_produto_' . $i] ; 
        $Marca=   $dadosTabela['marca_produto_' . $i]; 
        $Modelo=   $dadosTabela['modelo_produto_' . $i] ; 
        $Valor_Minimo=   $dadosTabela['valor_minimo_produto_' . $i];  
        $Valor_Cadastro=   $dadosTabela['valor_cadastro_produto_' . $i] ; 
        $Qtd=  $dadosTabela['qtd_produto_' . $i] ;
        $Und = $dadosTabela['und_produto_' . $i] ;


         // Adicionar uma quebra de linha para separar cada conjunto de dados


         $sql_code = "INSERT INTO produtos_conciliados (
            qtd_produto,
            und_produto,
            desc_produto,
            marca_produto,
            modelo_produto,
            valor_referencia_produto,
            valor_custo_produto,
            valor_minimo_produto,
            valor_cadastro_produto,
            id_edital
        ) VALUES (
            '$Qtd',
            '$Und',
            '$Desc', 
            '$Marca',
            '$Modelo',
            '', 
            '$Valor_Cadastro',
            '$Valor_Minimo',
            '$Valor_Cadastro',
            '$id' 
        )";
        
        
        if (mysqli_query($dbcon, $sql_code)) {
            echo "Dados inseridos com sucesso";
         } else {
             echo "Erro na consulta de inserção:";
         }
         

    }
    

    
}











?>
