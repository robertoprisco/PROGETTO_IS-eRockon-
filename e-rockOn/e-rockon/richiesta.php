

<!--Pagina che mostra un annuncio di uno strumento-->
<!DOCTYPE html>
<html>  
    <head>
        <title>e-RockOn</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap --><link href="../e-rockon/bs/css/bootstrap.min.css" rel="stylesheet">  
		
    </head>
    <body  style="background-color:black; color:white;">  
        <div class="container">
              <div align="center">
                <img src="../e-rockon/img/logo.png" alt="logo" style="width:350px; height:200px;"></div>
             
            <div class="row">
              <div class="col-md-4 col-lg-4"></div>
			  
			  <div class="col-md-4 col-lg-4" style="background-color:white; color:black;">
			  <?php

$usdb="root";
$passdb="4815162342";
$database="eRockOn";
$localhost="localhost";


mysql_connect($localhost,$usdb,$passdb);
@mysql_select_db($database) or die("Impossibile selezionare il database.");




session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password'])){
			$username = $_SESSION['username'];
			$password = $_SESSION['password'];
			}
						else{
						header("location: index.php");
			}
			
$giorno = date("d", time());
$mese = date("m", time());
$anno = date("Y", time());
			 
 $data = $anno."-".$mese."-".$giorno;
 $inizio = $_POST['inizioNolo'];
 $fine = $_POST['fineNolo'];
 $nomeutente = $_POST['nomeutente'];
 $id = $_POST['idstsa'];
 $approva = '0';
 
  $query ="select * from richiesta where IdStSa =".$id." AND UsernameNol ='".$username."';";
  $risultati = mysql_query($query);
  $yet = mysql_num_rows($risultati);
  
if($yet == 0){
if($inizio > $fine){echo "ERRORE! La data d'inizio noleggio è successiva alla data di fine noleggio!";
  echo "<a href='annunciostr.php?id=".$id."'>Torna alla Pagina dell'annuncio</a>";
}
else if($inizio < $data){echo "ERRORE! La data d'inizio noleggio è precedente alla data odierna!";
  echo "<a href='annunciostr.php?id=".$id."'>Torna alla Pagina dell'annuncio</a>";
}

else{
$query="insert into richiesta(InizioNol,FineNol,Approva,UsernameProp,UsernameNol,IdStSa)
		values('$inizio','$fine','$approva','$nomeutente','$username','$id');";
mysql_query($query);
echo "La richiesta è stata correttamente inviata al proprietario.";
  echo "<a href='home.php'>Torna alla Home</a>";


}
}else{header("location:home.php");}

?>
			  </div>
			  
			  <div class="col-md-4 col-lg-4"></div>
			  

        </div>
    <!-- jQuery-->
        <script src="https://code.jquery.com/jquery.js"></script>  
        <!-- Include all compiled plugins (below), or include individual files              as needed -->      
        <script src="../e-rockon/bs/js/bootstrap.min.js"></script> 
    <script src="../e-rockon/bs/js/docs.min.js"></script>
    </body> 