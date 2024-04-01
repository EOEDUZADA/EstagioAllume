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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<style>
              .sidebar {
            width: 250px;
            background-color: #fdcc0a;
            color: #fff;
            padding-top: 64px; /* Ajuste para alinhar com a barra de navegação */
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
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .sidebar ul li:hover {
            background-color: #555;
        }

        li a{
          text-decoration: none;
          color: inherit;
        }
        body{
          background-color: #384043;
          color: #fff;

        }
</style>
<body>
    
<nav>
    <div class="nav-wrapper black">
        
        <a href="#" class="brand-logo yellow-text right" id="brand-nav">Allumé</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
        </ul>
    </div>
    
</nav>
<div class="sidebar">
    
    <ul>
        <li>Dashboard</li>
        <li>Usuários</li>
        <li><a href="editais.php">Produtos</a></li>
        <li>Orçamentos</li>
        <li><a href="sair.php">Sair</a></li>
    </ul>
</div>

    <main class="container">
    
    <table class="centered ">
        <thead>
          <tr>
              <th>Nome do orgão</th>
              <th>Numero Edital</th>
              <th>Numero Processo</th>
              <th>Tipo Documento</th>
              <th>Data Final</th>
              <th>Data Limite</th>
              <th>Data Cadastro</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>$0.87</td>
          </tr>
          <tr>
            <td>Alan</td>
            <td>Jellybean</td>
            <td>$3.76</td>
          </tr>
          <tr>
            <td>Jonathan</td>
            <td>Lollipop</td>
            <td>$7.00</td>
          </tr>
        </tbody>
      </table>
        
    
    </main>

       

</body>
</html>