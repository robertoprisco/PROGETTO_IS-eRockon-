<!--Pagina che mostra un annuncio di uno strumento-->
<!DOCTYPE html>
<html>  
    <head>
        <title>e-RockOn -- Nuovo annuncio</title>
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
  
  $id = $_GET['id'];
  
  $query ="select genere from stsa where id =".$id.";";
  $risultati = mysql_query($query);
  $genere = mysql_result($risultati,0,"Genere");
  
  $query ="select UsernameProp from stsa where id =".$id.";";
  $risultati = mysql_query($query);
  $nomeutente = mysql_result($risultati,0,"UsernameProp");
  
  $query ="select * from stsa where id =".$id.";";
  $risultati = mysql_query($query);
  $row = mysql_fetch_array($risultati, MYSQL_ASSOC);
  
  $query ="select descrizione from annuncio where idstsa =".$id.";";
  $risultati = mysql_query($query);
  $desc = mysql_result($risultati,0,"Descrizione");
  
  $query ="select * from richiesta where IdStSa =".$id." AND UsernameNol ='".$username."';";
  $risultati = mysql_query($query);
  $yet = mysql_num_rows($risultati);
  
  
  
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
      <button type="submit" class="btn btn-info" >
      <span class="glyphicon glyphicon-search"></span> Cerca
           </button></form>
      <p class="navbar-text navbar-right">Benvenuto,<a href="utente.php" class="navbar-link"><?php if(isset($username)){echo $username;} else {echo 'Utente';}  ?> 
																						(<a href="logout.php">Esci</a>)</a></p>
  </div>
</nav>

            

            </div>
            <div class="row">
              <div class="col-md-4 col-lg-4"><h3><?php echo ucfirst($row['NomeStSa']);?></h3><h3> <small>Inserito da: <?php echo "<a href='user.php?username=".$nomeutente."'> ".$nomeutente."</a>"; ?></small></h3><br><img src="<?php echo $row['IndirizzoImmagine']; ?>" alt="strumento" width="200px" height="200px"></div>
                <div class="col-md-4 col-lg-4"></div>
				<?php if($username != $nomeutente && $yet == 0){ ?>
              <div class="col-md-4 col-lg-4"><h3>Richiesta di noleggio:</h3>
                <form role="form" action="richiesta.php" method="post">  
                    <div class="form-group">
                    <?php
					if($genere == "STRUMENTO"){echo "Desidero noleggiare questo strumento dal:";}
					else{echo "Desidero noleggiare questa sala dal:";}
					?>
					
                    
					<input type="date" class="form-control" name="inizioNolo">
                        fino al
                           <input type="date" class="form-control" name="fineNolo">
                        <h5>
						Acconsenti al trattamento dei dati?
						</h5><input type="checkbox"  class="form-control" name="acconsenti" required><input type="text" name="nomeutente" value ="<?php echo $nomeutente; ?>" hidden><input type="text" name="idstsa" value ="<?php echo $id; ?>" hidden>
                          <button type="submit" class="btn btn-success">Invia Richiesta!</button><br><br>
                    </div></form>
                </div>  <?php } ?>
            </div>
            
             <div class="row">
              <div class="col-md-4 col-lg-4"><h3><?php echo ucfirst($desc);?></h3></div>
            </div>
            <div class="row">
              <div class="col-md-4 col-lg-4"><h3>Situato in <?php echo $row['Citta']; echo"(".$row['Provincia'].")";?></h3></div>
            </div>
                 <br><br><br><br><br><br>
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