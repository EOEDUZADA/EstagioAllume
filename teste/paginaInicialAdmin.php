<?php
session_start();

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
     
       nav .brand-logo {
            color:black;
        }


    </style>
</head>

<body>


<nav>
    <div class="nav-wrapper white" style="display: flex; align-items: center;">
        <a href="#" id="sidebar-toggle" class="right"><i class="large material-icons" style="margin-left: 50px;">menu</i></a>
        <a href="paginaInicialAdmin.php" style="margin-left: auto;"><p class="black-text" style="margin-right: 60px;">Bem vindo! <?php echo $_SESSION['nome'] ?> </p></a>
        <i class="large material-icons brand-logo right" style="font-size: 50px;">account_circle</i>
    </div>
</nav>



<div id="sidebar" class="sidenav">
<img src="./img/logo3.png" id="brand-logo">
    <ul>
        <li><a href="paginainicialadmin.php">Dashboard</a></li>
        <li><a href="usuarios.php">Usuários</a></li>
        <li><a href="tabelaeditais.php">Editais</a></li>
        <li><a href="tabelaprodutos.php">Produtos</a></li>
        <li><a href="sair.php">Sair</a></li>
    </ul>
</div>

<div class="main-content">
    

    
    <div class="row">
        <div class="col s12 m2">
            <div class="card white darken-1" style="border-radius: 20px;">
                <div class="card-content black-text" style="display: flex; justify-content: center; align-items: center;">
                
                <a href="registro.php"> <i class="medium material-icons">group_add</i></a>
                <span style="margin-left: 15px;">Registro de Funcionarios</span>
                </div>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="card white  arken-1">
                <div class="card-content black-text">
                    <span class="card-title">Total de Produtos</span>
                    <p>500</p>
                </div>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="card white darken-1">
                <div class="card-content black-text">
                    <span class="card-title">Total de Algo</span>
                    <p>300</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.sidenav');
  var instances = M.Sidenav.init(elems);

  var sidebarToggle = document.getElementById('sidebar-toggle');
  sidebarToggle.addEventListener('click', function() {
    var sidenavInstance = M.Sidenav.getInstance(elems[0]);
    sidenavInstance.isOpen ? sidenavInstance.close() : sidenavInstance.open();
    
    
    sidebarToggle.innerHTML = sidenavInstance.isOpen ? '<i class="material-icons" style="margin-left: 50px;">menu</i>' : '<i class="material-icons" style="margin-left: 50px;">menu</i>';
  });
});
</script>

</body>
</html>