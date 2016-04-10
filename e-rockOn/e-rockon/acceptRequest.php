<?php

$numrichiesta = $_GET["id"];

$usdb="root";
 $passdb="4815162342";
 $database="eRockOn";
 $localhost="localhost";
			 
			 
 mysql_connect($localhost,$usdb,$passdb);
 @mysql_select_db($database) or die("Impossibile selezionare il database.");
 
 $query ="update richiesta set Approva = 1 where NumRichiesta =".$numrichiesta.";";
 mysql_query($query);
 
  $query ="select IdStSa from richiesta where NumRichiesta =".$numrichiesta.";";
  $risultati = mysql_query($query);
  $idstsa = mysql_result($risultati,0,"IdStSa");
  
 $query ="update annuncio set Noleggiato = 1 where IdStSa =".$idstsa.";";
 mysql_query($query);

?>