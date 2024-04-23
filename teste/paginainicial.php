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
.row{
  margin-top: 40px;
}
.nav-wrapper{
    background-color: #5A57FF;
    color: #fff;
    height: 70px;
    border-right: 1px solid black;
  
}

</style>
<body>
<nav>
    <div class="nav-wrapper" style="display: flex; align-items: center; height: 70px;">
       <img src="./img/logo3.png" id="brand-logo">
    </div>
</nav>


    <main>

    <div class="main-content">
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
  



</div>
    </main>

       

</body>
</html>