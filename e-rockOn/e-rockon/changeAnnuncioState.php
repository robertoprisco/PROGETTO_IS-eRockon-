<?php
 $id = $_GET['id'];

 
 $usdb="root";
 $passdb="4815162342";
 $database="eRockOn";
 $localhost="localhost";
			 
			 
 mysql_connect($localhost,$usdb,$passdb);
 @mysql_select_db($database) or die("Impossibile selezionare il database.");
 
 $query ="update annuncio set stato = 1 where IdStSa =".$id.";";
 mysql_query($query);
 
 

 
  $query ="select UsernameProp from stsa where id =".$id.";";
  $risultati = mysql_query($query);
  $nomeutente = mysql_result($risultati,0,"UsernameProp");
  
  
  $query="select NumeroAnnunci from utente where username = '".$nomeutente."';";		
  $risultati = mysql_query($query);
  $numeroannunci=mysql_result($risultati,0,"NumeroAnnunci");
  $numeroannunci = $numeroannunci + 1;
  
  $query="update utente set NumeroAnnunci = '$numeroannunci' where username = '".$nomeutente."';";
		mysql_query($query);
		
		mysql_close();

?>