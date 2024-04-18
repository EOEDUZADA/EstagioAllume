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
        <li><a href="paginainicialadmin.php">Dashboard</a></li>
        <li><a href="usuarios.php">Usuários</a></li>
        <li><a href="editais.php">Registro De Editais</a></li>
        <li><a href="tabelaeditais.php">Editais</a></li>
        <li><a href="cadastroProdutos.php">Cadastro Produtos</a></li>
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
</body>
</html>
