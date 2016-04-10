<?php

$id = $_GET['id'];

 
 $usdb="root";
 $passdb="4815162342";
 $database="eRockOn";
 $localhost="localhost";
			 
			 
 mysql_connect($localhost,$usdb,$passdb);
 @mysql_select_db($database) or die("Impossibile selezionare il database.");
 




  $query ="select UsernameProp from stsa where id =".$id.";";
  $risultati = mysql_query($query);
  $nomeutente = mysql_result($risultati,0,"UsernameProp");


  $query ="select IndirizzoImmagine from stsa where id =".$id.";";
  $risultati = mysql_query($query);
  $immagine = mysql_result($risultati,0,"IndirizzoImmagine");
  if($immagine != "img/drum.jpg" && $immagine != "img/microphone-512.png" ){ 
  unlink($immagine);}
  
  $query="select NumeroAnnunci from utente where username = '".$nomeutente."';";		
  $risultati = mysql_query($query);
  $numeroannunci=mysql_result($risultati,0,"NumeroAnnunci");
  $numeroannunci = $numeroannunci - 1;
  
  $query="update utente set NumeroAnnunci = '$numeroannunci' where username = '".$nomeutente."';";
		mysql_query($query);

 $query ="delete from annuncio where IdStSa =".$id.";";
 mysql_query($query);
 
 $query ="delete from stsa where Id =".$id.";";
 mysql_query($query);
?>