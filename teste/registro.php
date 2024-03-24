<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/styles.css" />
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


    <main>


    <div class="formulario">
        <div class="form-toggle"></div>
        <div class="form-panel one">
            <div class="form-header">
                <h1>Registre-se</h1>
            </div>
            <div class="form-content">
                <form action="registro.php" method="GET">
                    <div class="form-group">
                        <label for="nome_usuario">Nome de Usuário</label>
                        <input type="text" id="nome_usuario" name="nome_usuario" required="required" />
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" id="password" name="password_usuario" required="required" />
                    </div>
                    <div class="form-group">
                    <label>
                        Email: <input type="email" name="email_usuario">
                    </label>
                </div>

            
                    <div class="form-group">
                        <button type="submit">Registrar</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

    </main>
</body>
</html>



