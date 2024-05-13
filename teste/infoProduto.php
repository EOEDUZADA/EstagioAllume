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
          <input id="marca" type="text" class="validate">
          <label for="marca">Marca</label>
        </div>
        <div class="input-field col s2">
          <input id="modelo" type="text" class="validate">
          <label for="modelo">Modelo</label>
        </div>
        <div class="input-field col s2">
          <input id="vcr_custo" type="text" class="validate">
          <label for="vcr_custo">VCR Custo</label>
        </div>
        <div class="input-field col s2">
          <input id="markup" type="text" class="validate">
          <label for="markup">MARKUP</label>
        </div>
        <div class="input-field col s2">
          <input id="vcr_venda" type="text" class="validate">
          <label for="vcr_venda">VCR Venda</label>
        </div>
      </div>
</div>


<div class="container">

<div class="row">
    <h5> Estoque </h5>
        <div class="input-field col s2">
          <input id="localizacao_estoque" type="text" class="validate">
          <label for="localizacao_estoque">localizacao_estoque</label>
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
        <div class="input-field col s1">
          <input id="marca" type="text" class="validate">
          <label for="marca">Marca</label>
        </div>
        <div class="input-field col s1">
          <input id="modelo" type="text" class="validate">
          <label for="modelo">Modelo</label>
        </div>
        <div class="input-field col s1">
          <input id="vcr_compra" type="text" class="validate">
          <label for="vcr_compra">VCR Compra</label>
        </div>
        <div class="input-field col s1">
          <input id="ipi" type="text" class="validate">
          <label for="ipi">IPI</label>
        </div>
        <div class="input-field col s1">
          <input id="%_ipi" type="text" class="validate">
          <label for="%_ipi">%</label>
        </div>
        <div class="input-field col s1">
          <input id="icms_difal" type="text" class="validate">
          <label for="icms_difal">ICMS-DIFAL</label>
        </div>
        <div class="input-field col s1">
          <input id="%_icms_difal" type="text" class="validate">
          <label for="%_icms_difal">%</label>
        </div>
        <div class="input-field col s1">
          <input id="frete" type="text" class="validate">
          <label for="frete">Frete</label>
        </div>
        <div class="input-field col s1">
          <input id="%_frete" type="text" class="validate">
          <label for="%_frete">%</label>
        </div>
        <div class="input-field col s1">
          <input id="vcr_custo" type="text" class="validate">
          <label for="vcr_custo">VCR Custo</label>
        </div>
       
      </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>