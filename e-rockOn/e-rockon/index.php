<!--Pagina iniziale con login, link alla pagina di registrazione e link su about.-->
<!DOCTYPE html>
<html>  
    <head>
        <title>Benvenuto in e-RockOn</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap --><link href="../e-rockon/bs/css/bootstrap.min.css" rel="stylesheet">  
		
		
		<?php 
			session_start(); 
			if(isset($_SESSION['errorelogin'])){
			$errlogin = $_SESSION['errorelogin'];}
		?>
    </head>
    <body  style="background-color:black; color:white;">  
        <div class="container">
                             <br>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="">Home</a></li>
		<li><a href="../e-rockon/about.php">About</a></li>
      </ul>
    </div>
  </div>
</nav>
            
            <div align="center">
                <img src="../e-rockon/img/logo.png" alt="logo" style="width:700px; height:400px;">
            </div>
            
            
            
            
            
            <div class="row">
                <div class="col md-4 col-lg-4"></div>
         <div class="col-md-5 col-lg-3">
            <form role="form" action="login.php" method="post">
                <div class="form-group"> 
                    <input type="text" class="form-control" name="username" placeholder="Il tuo username.." required><br>
                    <input type="password"  class="form-control" name="password" placeholder="La tua password.." required><?php if(isset($errlogin))
																																{echo $errlogin;} ?>
                </div>
                <button type="submit" class="btn btn-success">Entra in e-RockOn</button>
                <a href="../e-rockon/reg.php" class="btn btn-default">Registrati ora!</a>
                </form>
                </div> 
                
            </div>
            <br><br><br><br><br><br>
            <footer>
        <p class="pull-right"><a href="#">Torna al top della pagina</a></p>
        <p>&copy; 2015 Roberto Prisco - Luigi Russo &middot;</p>
      </footer>
        </div>
    <!-- jQuery-->
        <script src="https://code.jquery.com/jquery.js"></script>  
        <!-- Include all compiled plugins (below), or include individual files              as needed -->      
        <script src="../e-rockon/bs/js/bootstrap.min.js"></script> 
    <script src="../e-rockon/bs/js/docs.min.js"></script> 
    </body> 
</html>