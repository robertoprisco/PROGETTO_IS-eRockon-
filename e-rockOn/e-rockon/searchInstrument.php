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
            <li><a href="">Inserisci un annuncio!</a></li>
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
      <p class="navbar-text navbar-right">Benvenuto, <a href="#" class="navbar-link"><?php if(isset($username)){echo $username;} else {echo 'Utente';}  ?> 
																					(<a href="logout.php">Esci</a>)</a></p>
  </div>
</nav>
<?php
			


if(isset($_GET['instrument']))
{$instrument = $_GET['instrument'];
  
  $query ="select id from stsa where nomestsa like'%".$instrument."%' and genere ='strumento';";
  $risultati = mysql_query($query);
  $i = 0;
  $row = mysql_num_rows($risultati);
  echo '<table class="table"><thead><th>Risultati</th></thead><tbody>';
  while($i < $row){
	$id=mysql_result($risultati,$i,"Id");
	$res = mysql_query("select * from annuncio where idstsa =".$id." AND stato = 1;");
	while($r= mysql_fetch_array($res, MYSQL_ASSOC)){
		echo'<tr><td>';
		echo "<a href='annunciostr.php?id=".$r["IdStSa"]."'>".ucfirst($r['Descrizione'])."</a><br></td></tr>";
	}
	$i++;
  }

 echo '</tbody></table>';
}
else if(isset($_GET['tipo'])){
  $tipo = $_GET['tipo'];
  
  $query ="select id from stsa where tipostrumento like'%".$tipo."%' and genere ='strumento';";
  $risultati = mysql_query($query);
  $i = 0;
  $row = mysql_num_rows($risultati);
    echo '<table class="table"><thead><th>Risultati</th></thead><tbody>';
  while($i < $row){
	$id=mysql_result($risultati,$i,"Id");
	$res = mysql_query("select * from annuncio where idstsa =".$id." AND stato = 1;");
	while($r= mysql_fetch_array($res, MYSQL_ASSOC)){
		echo'<tr><td>';
		echo "<a href='annunciostr.php?id=".$r["IdStSa"]."'>".ucfirst($r['Descrizione'])."</a><br></td></tr>";
	}
	$i++;
  }
	 echo '</tbody></table>';
}


else if(isset($_GET['provincia'])){
  $provincia = $_GET['provincia'];
  
  $query ="select id from stsa where provincia ='".$provincia."' and genere ='strumento';";
  $risultati = mysql_query($query);
  $i = 0;
  $row = mysql_num_rows($risultati);
   echo '<table class="table"><thead><th>Risultati</th></thead><tbody>';
  while($i < $row){
	$id=mysql_result($risultati,$i,"Id");
	$res = mysql_query("select * from annuncio where idstsa =".$id." AND stato = 1;");
	while($r= mysql_fetch_array($res, MYSQL_ASSOC)){
		echo'<tr><td>';
		echo "<a href='annunciostr.php?id=".$r["IdStSa"]."'>".ucfirst($r['Descrizione'])."</a><br></td></tr>";
	}
	$i++;
  }
		 echo '</tbody></table>';
}

else if(isset($_GET['provinciasa'])){
  $provincia = $_GET['provinciasa'];
  
  $query ="select id from stsa where provincia ='".$provincia."' and genere ='sala';";
  $risultati = mysql_query($query);
  $i = 0;
  $row = mysql_num_rows($risultati);
  echo '<table class="table"><thead><th>Risultati</th></thead><tbody>';
  while($i < $row){
	$id=mysql_result($risultati,$i,"Id");
	$res = mysql_query("select * from annuncio where idstsa =".$id." AND stato = 1;");
	while($r= mysql_fetch_array($res, MYSQL_ASSOC)){
		echo'<tr><td>';
		echo "<a href='annunciostr.php?id=".$r["IdStSa"]."'>".ucfirst($r['Descrizione'])."</a><br></td></tr>";
	}
	$i++;
  }
		 echo '</tbody></table>';
}

?>
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

