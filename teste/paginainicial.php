<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<style>
.admin{
    border: 2px solid black;
    width: auto;
    height: auto;
}
.card{
    border-radius: 20px;
    box-shadow: 2px 2px 2px black;
}
h3{
    text-align: center;
}

</style>
<body>
    

    <div class="wrapper navbar-fixed">
        <nav class="nav-extended black">
            <div class="nav-wrapper">
              <a href="#" class="brand-logo yellow-text" id="brand-nav">Allumé</a>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                
              </ul>
            </div>
            <!--<div class="nav-content">
              <ul class="tabs tabs-transparent hide-on-med-and-up ">
                <li class="tab"><a href="#test1">Test 1</a></li>
                <li class="tab"><a class="active" href="#test2">Test 2</a></li>
                <li class="tab disabled"><a href="#test3">Disabled Tab</a></li>
                <li class="tab"><a href="login.php">Login</a></li>
              </ul>
            </div>
-->
          </nav>
        
          </div>

    <main>

    <div class="container">
    <h3>Login</h3>
    <div class="row">
      <div class="col s12 m4">
        <div class="card">
          <div class="card-content center-align">
            <i class="material-icons large">admin_panel_settings</i>
            <h5>Admin</h5>
            <p>Login como administrador</p>
            <a href="login.php" class="btn">Entrar</a>
          </div>
        </div>
      </div>
      <div class="col s12 m4">
        <div class="card">
          <div class="card-content center-align">
            <i class="material-icons large">attach_money</i>
            <h5>Financeiro</h5>
            <p>Login como financeiro</p>
            <a href="login.php" class="btn">Entrar</a>
          </div>
        </div>
      </div>
      <div class="col s12 m4">
        <div class="card">
          <div class="card-content center-align">
            <i class="material-icons large">people_alt</i>
            <h5>Operacional</h5>
            <p>Login da Operacional</p>
            <a href="login.php" class="btn">Entrar</a>
          </div>
        </div>
      </div>
    </div>
  

    <h3>Registro</h3>
    <div class="row">
    <div class="col s12 m4 offset-m4">
        <div class="card">
          <div class="card-content center-align">
            <i class="material-icons large">person_add</i>
            <h5>Registro de conta</h5>
            <p>faça seu registro aqui</p>
            <br>
            <a href="registro.php" class="btn">Entrar</a>
          </div>
        </div>
    </div>
    </div>


</div>
    </main>

       

</body>
</html>