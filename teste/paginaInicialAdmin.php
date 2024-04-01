<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicial do Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #D8D4F2;
            margin: 0;
            padding: 0;
        }

        .nav-wrapper.black .brand-logo.right {
            position: absolute;
            right: 10px;
        }

        #brand-logo{
         
            margin-left: 50px;
            margin-bottom: 3vh;
        }

        .sidebar {
            width: 250px;
            background-color: #182833;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            overflow-y: auto;
            transition: width 0.3s ease;
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

        .sidebar ul li:hover {
            background-color: #555;
        }

        .main-content {
            padding: 20px;
            margin-left: 250px; /* Ajuste para deixar espaço para a barra lateral */
            transition: margin-left 0.3s ease;
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
            display: flex;
            justify-content: flex-star;
        }
    </style>
</head>
<body>
        

<div class="sidebar">
<img src="./img/logo3.png" id="brand-logo">
    <ul>
        <li>Dashboard</li>
        <li><a href="usuarios.php">Usuários</a></li>
        <li><a href="editais.php">Produtos</a></li>
        <li>Orçamentos</li>
        <li><a href="sair.php">Sair</a></li>
    </ul>
</div>

<div class="main-content">
    <h1 class="white-text">Bem vindo! <?php echo $_SESSION['nome'] ?></h1>
    <div class="row">
        <div class="col s12 m4">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Total de Editais</span>
                    <p>50</p>
                </div>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Total de Produtos</span>
                    <p>500</p>
                </div>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
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
