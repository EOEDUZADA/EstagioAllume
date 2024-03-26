<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<style>



body {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-color: #f5f5f5;
}

.container {
    max-width: 700px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #333;
    text-align: center;
}

form {
    display: flex;
    flex-direction: column;
}

p {
    margin-bottom: 15px;
}

input[type="text"],
input[type="file"],
input[type="submit"] {
    margin-bottom: 15px;
    padding: 10px;
    border-bottom: 1px solid yellow;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 100%;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: black;
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: green;
}

[type="radio"]:checked+span:after,[type="radio"].with-gap:checked+span:after {
    background-color: yellow;
}
[type="radio"]:checked+span:after,[type="radio"].with-gap:checked+span:before,[type="radio"].with-gap:checked+span:after {
    border: 2px solid #ffffff
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
            <div class="nav-content">
              <ul class="tabs tabs-transparent hide-on-med-and-up ">
                <li class="tab"><a href="#test1">Test 1</a></li>
                <li class="tab"><a class="active" href="#test2">Test 2</a></li>
                <li class="tab disabled"><a href="#test3">Disabled Tab</a></li>
                <li class="tab"><a href="login.php">Login</a></li>
              </ul>
            </div>
          </nav>
        
          </div>

    <div class="container">
        <h2>Cadastro de edital</h2>
           <form action="adminpage.php" method="post" enctype="multipart/form-data">
           <p>Nome do orgão <input type="text" name="nome_orgao" /></p>
            <p>Numero do edital <input type="text" name="numero_edital" /></p>
            <p>Numero do processo  <input type="text" name="numero_processo" /></p>


            <p>Documento é SRP? </p>
            <p>
      <label>
        <input name="group1" id="srp"  type="radio" />
        <span>Sim</span>
      </label>
    </p>
    <p>
      <label>
        <input  name="group1" id="normal" type="radio" />
        <span>Não</span>
      </label>
    </p>



    <p>Data final  <input type="date" name="data_final_edital" /></p>

    <p>Data limite para orçamento  <input type="date" name="data_limite_orcamento" /></p>

    <p>Data de cadastro  <input type="date" name="data_cadastro_edital" /></p>

      <input type="file" name="fileUpload">


      
            <p class="enviar"><input type="submit" value="Inserir"></p>
        </form>

</body>
</html> 
 
 
 
