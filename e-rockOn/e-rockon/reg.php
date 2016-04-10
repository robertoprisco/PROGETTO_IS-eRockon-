<!--Pagina di registrazione al sito. -->
<!DOCTYPE html>
<html>  
    <head>
        <title>Benvenuto in e-RockOn</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap --><link href="../e-rockon/bs/css/bootstrap.min.css" rel="stylesheet">  


    </head>
    <body  style="background-color:black; color:white;">  
	
	
	<?php

	session_start();

	$usdb="root";
	$passdb="4815162342";
	$database="eRockOn";
	$localhost="localhost";


	$errore = 0;
	$userform = $mailform = $nomeform = $cogform = $indform = $cellform = $etaform = $passform = $passform2= "";
	$userformerr = $mailformerr = $nomeformerr = $cogformerr = $indformerr = $etaformerr = $passformerr =$cellformerr= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
     $userform  = $_POST["username"];
     $mailform  = $_POST["mail"];
     $nomeform  = $_POST["nome"];
	 $cogform   = $_POST["cognome"];
     $indform   = $_POST["indirizzo"];
	 $etaform   = $_POST["eta"];
     $passform  = $_POST["password"];
	 $passform2 = $_POST["password_2"];
	 $cellform  = $_POST["cellulare"];
	 
	 
	mysql_connect($localhost,$usdb,$passdb);
    @mysql_select_db($database) or die("Impossibile selezionare il database.");
	

	$query="SELECT username FROM utente";
	$risultati=mysql_query($query);
	$num = mysql_numrows($risultati);
	
	$i=0;
	while ($i < $num) {
		$Usrtemp=strtoupper(mysql_result($risultati,$i,"Username"));
		if($Usrtemp == strtoupper($userform)){$userformerr="Nome già esistente, scegliere un nuovo nome utente"; $errore++;}
		$i++;
    }
	
	$query="SELECT email FROM utente";
	$risultati=mysql_query($query);
	$num = mysql_numrows($risultati);

	$i=0;
	while ($i < $num) {
		$mailtemp=strtoupper(mysql_result($risultati,$i,"Email"));
		if($mailtemp == strtoupper($mailform)){$mailformerr="Email già associata ad un account"; $errore++;}
		$i++;
    }

	 if (!preg_match("/^[a-zA-Z ]*$/",$nomeform)) {
       $nomeformerr = "Solo lettere per il nome"; $errore++;
     }
	 

	 if (!preg_match("/^[a-zA-Z ]*$/",$cogform)) {
       $cogformerr = "Solo lettere per il cognome"; $errore++;
     }
	
	if (!preg_match('/^[0-9]*$/', $cellform)) {
		   $cellformerr = "Solo numeri per il numero di telefono"; $errore++;
     }
	

	if($passform != $passform2){
		$passformerr = "Le due password non coincidono"; $errore++;
	}

	
	if(!is_numeric($etaform) || $etaform <12 || $etaform > 110){$etaformerr="Età non valida";$errore++;}
	
	

	if($errore == 0){

	 $_SESSION['username'] = $userform;
	 $_SESSION['mail'] = $mailform;
	 $_SESSION['nome'] = $nomeform;
	 $_SESSION['cognome'] = $cogform;
	 $_SESSION['indirizzo'] = $indform;
	 $_SESSION['eta'] = $etaform;
	 $_SESSION['password'] = $passform;
	 $_SESSION['cellulare'] = $cellform;
	 
		header("location: register.php");}  
}
?>
	
	
	
        <div class="container">
        <br>
 <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div>
      <ul class="nav navbar-nav">
        <li><a href="../e-rockon/index.php">Home</a></li>
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
            <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="modulo" >
                <div class="form-group"> 
                    Username:<input type="text" class="form-control" name="username" maxlength="29" value="<?php echo $userform;?>" placeholder="Scegli un username..." required>  <span class="error"> <?php echo $userformerr;?></span><br>
                    Email:<input type="text"  class="form-control" name="mail" maxlength="29" value="<?php echo $mailform;?>" placeholder="La tua e-mail..." required>  <span class="error"> <?php echo $mailformerr;?></span><br>
                    Nome:<input type="text" class="form-control" name="nome" maxlength="19" value="<?php echo $nomeform;?>" placeholder="Il tuo nome..." required>  <span class="error"><?php echo $nomeformerr;?></span><br>
					Cognome:<input type="text" class="form-control" name="cognome" maxlength="19" value="<?php echo $cogform;?>" placeholder="Il tuo cognome..." required>  <span class="error"> <?php echo $cogformerr;?></span><br>
                    Cellulare:<input type="text" class="form-control" name="cellulare" maxlength="19" value="<?php echo $cellform;?>" placeholder="Il tuo cellulare..." required>  <span class="error"></span><?php echo $cellformerr;?><br>
					Indirizzo:<input type="text" class="form-control" name="indirizzo" maxlength="99" value="<?php echo $indform;?>" placeholder="Il tuo indirizzo..." required><br>
					Età:<input type="text" class="form-control" name="eta" maxlength="3" value="<?php echo $etaform;?>" placeholder="La tua età..." required><span class="error"> <?php echo $etaformerr;?></span><br>
					Password:<input type="password" class="form-control" name="password" maxlength="29" value="<?php echo $passform;?>" placeholder="Scegli una password..." required>  <span class="error"> <?php echo $passformerr;?></span><br>
					Ripeti Password:<input type="password"  class="form-control" name="password_2" maxlength="29" value="<?php echo $passform2;?>" placeholder="Ripeti la password..." required>
                </div>
                <button type="submit" class="btn btn-success">Registrati ora!</button>
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