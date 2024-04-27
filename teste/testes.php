


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conciliação</title>
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>

<style>
    .brand-logo {
        color: black;
        display: flex;
    }

    nav .brand-logo {
        color: black;
    }

    .container {
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .row {
        width: 100%;
    }

    .container-tabela {
        width: 100%;
    }
</style>

<body>




    <div class="container-tabela">
    

<?php
    

if(isset($_POST['jose'])) {
echo $_POST['jose'];



}

?>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
  
                    
            $(document).ready(function() {
    // Captura o clique no botão de salvar
    $('#btnSalvar').click(function() {


        var jose = "jose";
        // Envie uma requisição AJAX para o script PHP
        $.ajax({
            url: '',
            method: 'POST',
            data: {
                // Envie os dados necessários para o script PHP
               jose:jose
            },
            success: function(data) {

              $('.container-tabela').html(data);
                // Exiba uma mensagem de sucesso ou faça qualquer outra ação necessária
                console.log(jose);
                alert('Dados salvos com sucesso!');
            },
            error: function(xhr, status, error) {
                // Trate quaisquer erros que possam ocorrer
                console.error(xhr.responseText);
                alert('Erro ao salvar os dados. Por favor, tente novamente.');
            }
        });
    });
});


         
    


        

      </script>

<div class='card-body'>
                            
                            <button type='submit' id="btnSalvar" class='btn btn-primary'>
                                <i class='fa fa-cart-plus mr-2'></i>Salvar
                            </button>
                       
                    </div> 

</body>

</html>


