<?php

$numrichiesta = $_GET["id"];

$usdb="root";
 $passdb="4815162342";
 $database="eRockOn";
 $localhost="localhost";
			 
			 
 mysql_connect($localhost,$usdb,$passdb);
 @mysql_select_db($database) or die("Impossibile selezionare il database.");
 
 
  $query ="delete from richiesta where NumRichiesta =".$numrichiesta.";";
 mysql_query($query);

?>