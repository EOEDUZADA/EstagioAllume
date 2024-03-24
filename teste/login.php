<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                    <h1>Entrar</h1>
                </div>
                <div class="form-content">
                    <form action="login.php" method="get">
                        <div class="form-group">
                            <label for="username">Email</label>
                            <input type="text" id="email_usuario" name="email_usuario" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" id="password" name="password_usuario" required="required" />
                        </div>
                        <div class="form-group">
                            <a class="form-recovery" href="#">Esqueceu a sua senha?</a>
                        </div>
                        <div class="form-group">
                            <a class="form-recovery" href="registro.php">Registre-se</a>
                        </div>
                        <div class="form-group">
                            <button type="login":hover>Log In</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    
    
        
        
    
       </main>

       

</body>
</html>