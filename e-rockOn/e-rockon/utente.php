<!DOCTYPE html>
<html>  
    <head>
        <title>e-RockOn</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap --><link href="../e-rockon/bs/css/bootstrap.min.css" rel="stylesheet">  
    
	<?php 
			session_start(); 
			if(isset($_SESSION['username']) && isset($_SESSION['password'])){
			$username = $_SESSION['username'];
			$password = $_SESSION['password'];
			$kind = $_SESSION['tipo'];
			}
						else{
						header("location: index.php");
			}
			
			
			$usdb="root";
			$passdb="4815162342";
			$database="eRockOn";
			$localhost="localhost";
			 
			 
			 mysql_connect($localhost,$usdb,$passdb);
			@mysql_select_db($database) or die("Impossibile selezionare il database.");
			
			$query ="select * from utente where username ='".$username."';";
			$risultati = mysql_query($query);
			$r= mysql_fetch_array($risultati, MYSQL_ASSOC);
		?>
	</head>
    
	<body  style="background-color:black; color:white;"> 


        
        <div class="container">
             <div align="center">
                <img src="../e-rockon/img/logo.png" alt="logo" style="width:350px; height:200px;"></div>
             
          <div class="row">       
<nav class="navbar navbar-default">
<div class="navbar-header">
      <ul class="nav navbar-nav">
        <li ><a href="../e-rockon/home.php">Home</a></li>
                  <li><a href="esplora.php">Esplora</a></li>
            <li><a href="../e-rockon/annuncio.php">Inserisci un annuncio!</a></li>
        </ul>
    </div>
    <div>
       <form class="navbar-form navbar-right" role="search" action="searchInstrument.php" method="get">
           <div class="form-group">
             <input type="text" class="form-control" name="instrument" placeholder="Cerca uno strumento.." required>
           </div>
      <button type="button" class="btn btn-info">
      <span class="glyphicon glyphicon-search"></span> Cerca
           </button> </form>
      <p class="navbar-text navbar-right">Benvenuto, <a href="#" class="navbar-link"><?php if(isset($username)){echo $username;} else {echo 'Utente';}  ?> 
																					(<a href="logout.php">Esci</a>)</a></p>
  </div>
              </nav>
         
            </div>
            <div class="row" style="text-align:justify; letter-spacing: 5px;">
             
                <div class="col-md-4 col-lg-4" ><img src="img/default-user-icon-profile.png"><br><b>Dati personali:</b><br><br><?php echo "Nome: ".ucfirst($r['Nome']);?><br><?php echo "Cognome: ".ucfirst($r['Cognome']);?><br>
				<?php echo "Cellulare: ".$r['Cellulare'];?><br><?php echo "Indirizzo: ".ucfirst($r['Indirizzo']);?><br><?php echo "Età: ".$r['Eta'];?><br><?php echo "Numero di Annunci: ".$r['NumeroAnnunci'];?><br><br>
                </div>
                   <div class="col-md-4 col-lg-4"><a href="myannunci.php" class="btn btn-warning">I miei annunci</a></div>
                <div class="col-md-4 col-lg-4"><a href="requests.php" class="btn btn-warning">Le mie richieste</a>
                
                </div>
            </div>
  <footer>
        <p class="pull-right"><a href="#">Torna al top della pagina</a></p>
        <p>&copy; 2015 Roberto Prisco - Luigi Russo &middot;<?php if($kind == "Admin"){echo "<a href='admin.php'> Sezione Admin </a>";}?></p>
      </footer>
        </div>  
    <!-- jQuery-->
        
        <script src="https://code.jquery.com/jquery.js"></script>  
        <!-- Include all compiled plugins (below), or include individual files              as needed -->      
        <script src="../e-rockon/bs/js/bootstrap.min.js"></script> 
    <script src="../e-rockon/bs/js/docs.min.js"></script>
    </body> 
</html>     