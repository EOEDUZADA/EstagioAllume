

<html>
<head>
<link rel="stylesheet" href="css/styles.css" />
    <title>Ler pdf</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>

<div class="wrapper navbar-fixed">
<nav class="nav-extended black">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo yellow-text">Allumé</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">JavaScript</a></li>
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


  <div class="formulario_upload">
    <form method="post" enctype="multipart/form-data">
        <p class="white-text">Escolha o arquivo</p>
        <input type="file" name="file" />
        <br>
        <input type="submit" value="Read PDF" name="readpdf" />

    </form>
</div>
</body>
</html>


<?php

// Arquivo PHP para converter PDF para texto

require('class.pdf2text.php');
extract($_POST);

if(isset($readpdf)){

    if($_FILES['file']['type']=="application/pdf") {
        $a = new PDF2Text();
        $a->setFilename($_FILES['file']['tmp_name']); 
        $a->decodePDF();
        $text = $a->output();


          $ext = $_FILES['file']['type']; //Pegando extensão do arquivo
           $nome = $_FILES['file']['name'];
             $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
              $dir = 'uploads/'; //Diretório para uploads
                move_uploaded_file($_FILES['file']['tmp_name'], $dir.$nome); //Fazer upload do arquivo

        // Encontrar a posição de 'Items:' no texto
        $items_position = strpos($text, 'Items:');
        
        if ($items_position !== false) {
            // Extrair o texto após 'Items:'
            $items_text = substr($text, $items_position + strlen('Items:'));
            
            // Exibir o texto após 'Items:'
            echo $items_text;
        } else {
            echo "Texto 'Items:' não encontrado no arquivo PDF.";
        }
    } else {
        echo "<p style='color:red; text-align:center'>Formato de arquivo incorreto</p>";
    }
}    
?>