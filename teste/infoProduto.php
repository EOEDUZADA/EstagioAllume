<?php
session_start();

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

<div class="container">
<div class="row">
    <form class="col s12 m12">
      <div class="row">
        <div class="input-field col s1 m1">
          <input  id="id_produto" type="text" class="validate">
          <label for="id_produto">ID</label>
        </div>
        <div class="input-field col s4 m4">
          <input id="nome_produto" type="text" class="validate">
          <label for="nome_produto">Nome do produto</label>
        </div>
        <div class="input-field col s4 m4">
          <input id="ncm" type="text" class="validate">
          <label for="ncm">NCM</label>
        </div>
        <div class="col s3 m3" id="foto">
      <div> FOTO </div>
        </div>
      </div>
      <div class="row" id="ncm">
      <div class="input-field col s3">
          <input  id="unidade" type="text" class="validate">
          <label for="unidade">Unidade</label>
        </div>
        <div class="input-field col s4 offset-s2">
          <input id="cod_ean" type="text" class="validate">
          <label for="cod_ean">Cod/EAN</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s1">
          <input id="peso" type="text" class="validate">
          <label for="peso">Peso</label>
        </div>
        <div class="input-field col s2">
          <input id="tamanho" type="text" class="validate">
          <label for="tamanho">Tamanho</label>
        </div>
        <div class="input-field col s4 offset-s2">
          <input id="cod_barra" type="text" class="validate">
          <label for="cod_barra">Cod de barra</label>
        </div>
      </div>
    </form>
  </div>
</div>


<div class="container">

<div class="row">
    <h5> Melhor marca </h5>
        <div class="input-field col s2">
          <input id="melhor_marca" type="text" class="validate">
          <label for="melhor_marca">Marca</label>
        </div>
        <div class="input-field col s2">
          <input id="melhor_modelo" type="text" class="validate">
          <label for="melhor_modelo">Modelo</label>
        </div>
        <div class="input-field col s2">
          <input id="melhor_vcr_custo" type="text" class="validate">
          <label for="melhor_vcr_custo">VCR Custo</label>
        </div>
        <div class="input-field col s2">
          <input id="melhor_markup" type="text" class="validate">
          <label for="melhor_markup">MARKUP</label>
        </div>
        <div class="input-field col s2">
          <input id="melhor_vcr_venda" type="text" class="validate">
          <label for="melhor_vcr_venda">VCR Venda</label>
        </div>
      </div>
</div>


<div class="container">

<div class="row">
    <h5> Estoque </h5>
        <div class="input-field col s2">
          <input id="localizacao_estoque" type="text" class="validate">
          <label for="localizacao_estoque">Localização no estoque</label>
        </div>
        <div class="input-field col s2">
          <input id="estoque_atual" type="text" class="validate">
          <label for="estoque_atual">Estoque atual</label>
        </div>
        <div class="input-field col s2">
          <input id="estoque_minimo" type="text" class="validate">
          <label for="estoque_minimo">Estoque mínimo</label>
        </div>
        <div class="input-field col s2">
          <input id="estoque..." type="text" class="validate">
          <label for="estoque...">Estoque...</label>
        </div>
      </div>
</div>


<div class="container">

<div class="row">
<div class=" col s1">
         1
        </div>
        <div class="input-field col s1">
          <input id="marca_1" type="text" class="validate">
          <label for="marca_1">Marca</label>
        </div>
        <div class="input-field col s1">
          <input id="modelo_1" type="text" class="validate">
          <label for="modelo_1">Modelo</label>
        </div>
        <div class="input-field col s1">
          <input id="vcr_compra_1" type="text" class="validate">
          <label for="vcr_compra_1">VCR Compra</label>
        </div>
        <div class="input-field col s1">
          <input id="ipi_1" type="text" class="validate">
          <label for="ipi_1">IPI</label>
        </div>
        <div class="input-field col s1">
          <input id="%_ipi_1" type="text" class="validate">
          <label for="%_ipi_1">%</label>
        </div>
        <div class="input-field col s1">
          <input id="icms_difal_1" type="text" class="validate">
          <label for="icms_difal_1">ICMS-DIFAL</label>
        </div>
        <div class="input-field col s1">
          <input id="%_icms_difal_1" type="text" class="validate">
          <label for="%_icms_difal_1">%</label>
        </div>
        <div class="input-field col s1">
          <input id="frete_1" type="text" class="validate">
          <label for="frete_1">Frete</label>
        </div>
        <div class="input-field col s1">
          <input id="%_frete_1" type="text" class="validate">
          <label for="%_frete_1">%</label>
        </div>
        <div class="input-field col s1">
          <input id="vcr_custo_1" type="text" class="validate">
          <label for="vcr_custo_1">VCR Custo</label>
        </div>
       
      </div>


      <div class="row">
<div class=" col s1">
         2
        </div>
        <div class="input-field col s1">
          <input id="marca_2" type="text" class="validate">
          <label for="marca_2">Marca</label>
        </div>
        <div class="input-field col s1">
          <input id="modelo_2" type="text" class="validate">
          <label for="modelo_2">Modelo</label>
        </div>
        <div class="input-field col s1">
          <input id="vcr_compra_2" type="text" class="validate">
          <label for="vcr_compra_2">VCR Compra</label>
        </div>
        <div class="input-field col s1">
          <input id="ipi_2" type="text" class="validate">
          <label for="ipi_2">IPI</label>
        </div>
        <div class="input-field col s1">
          <input id="%_ipi_2" type="text" class="validate">
          <label for="%_ipi_2">%</label>
        </div>
        <div class="input-field col s1">
          <input id="icms_difal_2" type="text" class="validate">
          <label for="icms_difal_2">ICMS-DIFAL</label>
        </div>
        <div class="input-field col s1">
          <input id="%_icms_difal_2" type="text" class="validate">
          <label for="%_icms_difal_2">%</label>
        </div>
        <div class="input-field col s1">
          <input id="frete_2" type="text" class="validate">
          <label for="frete_2">Frete</label>
        </div>
        <div class="input-field col s1">
          <input id="%_frete_2" type="text" class="validate">
          <label for="%_frete_2">%</label>
        </div>
        <div class="input-field col s1">
          <input id="vcr_custo_2" type="text" class="validate">
          <label for="vcr_custo_2">VCR Custo</label>
        </div>
       
      </div>

      <div class="row">
<div class=" col s1">
         3
        </div>
        <div class="input-field col s1">
          <input id="marca_3" type="text" class="validate">
          <label for="marca_3">Marca</label>
        </div>
        <div class="input-field col s1">
          <input id="modelo_3" type="text" class="validate">
          <label for="modelo_3">Modelo</label>
        </div>
        <div class="input-field col s1">
          <input id="vcr_compra_3" type="text" class="validate">
          <label for="vcr_compra_3">VCR Compra</label>
        </div>
        <div class="input-field col s1">
          <input id="ipi_3" type="text" class="validate">
          <label for="ipi_3">IPI</label>
        </div>
        <div class="input-field col s1">
          <input id="%_ipi_3" type="text" class="validate">
          <label for="%_ipi_3">%</label>
        </div>
        <div class="input-field col s1">
          <input id="icms_difal_3" type="text" class="validate">
          <label for="icms_difal_3">ICMS-DIFAL</label>
        </div>
        <div class="input-field col s1">
          <input id="%_icms_difal_3" type="text" class="validate">
          <label for="%_icms_difal_3">%</label>
        </div>
        <div class="input-field col s1">
          <input id="frete_3" type="text" class="validate">
          <label for="frete_3">Frete</label>
        </div>
        <div class="input-field col s1">
          <input id="%_frete_3" type="text" class="validate">
          <label for="%_frete_3">%</label>
        </div>
        <div class="input-field col s1">
          <input id="vcr_custo_3" type="text" class="validate">
          <label for="vcr_custo_3">VCR Custo</label>
        </div>
       
      </div>

      <div class="row">
<div class=" col s1">
         4
        </div>
        <div class="input-field col s1">
          <input id="marca_4" type="text" class="validate">
          <label for="marca_4">Marca</label>
        </div>
        <div class="input-field col s1">
          <input id="modelo_4" type="text" class="validate">
          <label for="modelo_4">Modelo</label>
        </div>
        <div class="input-field col s1">
          <input id="vcr_compra_4" type="text" class="validate">
          <label for="vcr_compra_4">VCR Compra</label>
        </div>
        <div class="input-field col s1">
          <input id="ipi_4" type="text" class="validate">
          <label for="ipi_4">IPI</label>
        </div>
        <div class="input-field col s1">
          <input id="%_ipi_4" type="text" class="validate">
          <label for="%_ipi_4">%</label>
        </div>
        <div class="input-field col s1">
          <input id="icms_difal_4" type="text" class="validate">
          <label for="icms_difal_4">ICMS-DIFAL</label>
        </div>
        <div class="input-field col s1">
          <input id="%_icms_difal_4" type="text" class="validate">
          <label for="%_icms_difal_4">%</label>
        </div>
        <div class="input-field col s1">
          <input id="frete_4" type="text" class="validate">
          <label for="frete_4">Frete</label>
        </div>
        <div class="input-field col s1">
          <input id="%_frete_4" type="text" class="validate">
          <label for="%_frete_4">%</label>
        </div>
        <div class="input-field col s1">
          <input id="vcr_custo_4" type="text" class="validate">
          <label for="vcr_custo_4">VCR Custo</label>
        </div>
       
      </div>

      <div class="row">
<div class=" col s1">
         5
        </div>
        <div class="input-field col s1">
          <input id="marca_5" type="text" class="validate">
          <label for="marca_5">Marca</label>
        </div>
        <div class="input-field col s1">
          <input id="modelo_5" type="text" class="validate">
          <label for="modelo_5">Modelo</label>
        </div>
        <div class="input-field col s1">
          <input id="vcr_compra_5" type="text" class="validate">
          <label for="vcr_compra_5">VCR Compra</label>
        </div>
        <div class="input-field col s1">
          <input id="ipi_5" type="text" class="validate">
          <label for="ipi_5">IPI</label>
        </div>
        <div class="input-field col s1">
          <input id="%_ipi_5" type="text" class="validate">
          <label for="%_ipi_5">%</label>
        </div>
        <div class="input-field col s1">
          <input id="icms_difal_5" type="text" class="validate">
          <label for="icms_difal_5">ICMS-DIFAL</label>
        </div>
        <div class="input-field col s1">
          <input id="%_icms_difal_5" type="text" class="validate">
          <label for="%_icms_difal_5">%</label>
        </div>
        <div class="input-field col s1">
          <input id="frete_5" type="text" class="validate">
          <label for="frete_5">Frete</label>
        </div>
        <div class="input-field col s1">
          <input id="%_frete_5" type="text" class="validate">
          <label for="%_frete_5">%</label>
        </div>
        <div class="input-field col s1">
          <input id="vcr_custo_5" type="text" class="validate">
          <label for="vcr_custo_5">VCR Custo</label>
        </div>
       
      </div>







</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>