<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "localhost";
    $dbname = "allume";
    $username = "root";
    $password = "";

    $dbcon = mysqli_connect($host, $username, $password, $dbname);

    if (!$dbcon) {
        die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
    }


    if (!isset($_POST["fileUpload"])) {
        

        $ext = $_FILES['fileUpload']['type']; //Pegando extensão do arquivo
$nome = $_FILES['fileUpload']['name'];
$new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
$dir = 'uploads/'; //Diretório para uploads
move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir.$nome); //Fazer upload do arquivo



       print_r($_FILES);
    

    

        
        mysqli_close($dbcon);
    }

        
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">
    <script>


function adicionarNovoUpload() {
            // Cria um novo elemento input de tipo arquivo
            var novoInput = document.createElement("input");
            novoInput.type = "file";
            novoInput.name = "fileUpload";
            
           
            
            // Adiciona o novo input e o novo botão ao formulário existente
            var formulario = document.getElementById("formulario_edital");
            formulario.appendChild(novoInput);
            formulario.insertBefore(novoInput);
     

        }


         


    
</script>

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




input[type="button"] {
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
button{
    width: 100%;
    border: 1px solid #ccc;
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
button{
    width: 100%;
    border: 1px solid #ccc;
}

[type="radio"]:checked+span:after,[type="radio"].with-gap:checked+span:after {
    background-color: yellow;
}
[type="radio"]:checked+span:after,[type="radio"].with-gap:checked+span:before,[type="radio"].with-gap:checked+span:after {
    border: 2px solid #ffffff
}

</style>
<body>
    
<div class="container">
    <h2>Cadastro de edital</h2>
    <form id="formulario_edital" action="testes.php" method="post" enctype="multipart/form-data">


    <p class="enviar"><input id="botaoEnviar" type="submit" value="Inserir" ></p>

    <input type="file" name="fileUpload" multiple>

    


    </form> 
    <p onclick="adicionarNovoUpload()" class="enviar"><input type="submit" value="Adicionar novo upload"></p>

    
</body>
</html>
