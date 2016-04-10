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
			
		 $nomeutente = $_GET['username'];
		
	
			 $usdb="root";
			 $passdb="4815162342";
	 		 $database="eRockOn";
			 $localhost="localhost";
			 
			 
			mysql_connect($localhost,$usdb,$passdb);
			@mysql_select_db($database) or die("Impossibile selezionare il database.");
			
			$query ="select * from utente where Username ='".$nomeutente."';";
			$risultati = mysql_query($query);
			$r =mysql_fetch_array($risultati);
			$nome= $r['Nome']; 
 			$cognome= $r['Cognome']; 
 			$eta= $r['Eta']; 
 			$indirizzo= $r['Indirizzo']; 
			$mail= $r['Email']; 
			$cellulare= $r['Cellulare']; 
			$annunci= $r['NumeroAnnunci']; 
 
 

 
			
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
                  <li><a href="../e-rockon/esplora.php">Esplora</a></li>
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
      <p class="navbar-text navbar-right">Benvenuto, <a href="utente.php" class="navbar-link"><?php if(isset($username)){echo $username;} else {echo 'Utente';}  ?> 
																					(<a href="logout.php">Esci</a>)</a></p>
  </div>
              </nav>
         </div>

            <div class="row">
            <div class="col-md-3 col-lg-3"></div>
                <div class="col-md-6 col-lg-6" style="background-color:white;"><br>
                    <img src="img/default-user-icon-profile.png">
                    <br><br>
                <table class="table" style="background-color:black; color:white;">
                    <thead>
                    <tr><td>Dati Personali</td></tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Username:</td>
                        <td><?php echo $nomeutente;?></td>
                        </tr>
                          <tr>
					<tr>
                        <td>Nome:</td>
                        <td><?php echo $nome;?></td>
                        </tr>
                          <tr>
                        <td>Cognome:</td>
                        <td><?php echo $cognome;?></td>
                        </tr>
                          <tr>
                        <td>Et&aacute;:</td>
                        <td><?php echo $eta;?></td>
                        </tr>
                          <tr>
                        <td>Indirizzo:</td>
                        <td><?php echo $indirizzo;?></td>
                        </tr>
						<tr>
                        <td>Email:</td>
                        <td><?php echo $mail;?></td>
                        </tr>
						<?php
						if($kind == "Admin"){
							
						
						?>
						<tr>
                        <td>Cellulare:</td>
                        <td><?php echo $cellulare;?></td>
                        </tr><?php }?>
						<tr>
                        <td>Numero di Annunci:</td>
                        <td><?php echo $annunci;?></td>
                        </tr>
                    </tbody>
                   
                    </table>
                    
                    <?php 
                    if($kind == "Admin")
                    {
                        echo '<a href="myannunci.php?username='.$nomeutente.'" class="btn btn-warning">Visualizza tutti gli annunci di '.$nome.' </a>';
                    }
                    ?>
                    <br><br>
                </div>
                  <div class="col-md-3 col-lg-3"></div>
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