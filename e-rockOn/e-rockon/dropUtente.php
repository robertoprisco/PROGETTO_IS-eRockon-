<?php

$nomeutente = $_GET['username'];

 
 $usdb="root";
 $passdb="4815162342";
 $database="eRockOn";
 $localhost="localhost";
			 
			 
 mysql_connect($localhost,$usdb,$passdb);
 @mysql_select_db($database) or die("Impossibile selezionare il database.");
 


  $query ="select IndirizzoImmagine from stsa where UsernameProp ='".$nomeutente."';";
  $risultati = mysql_query($query);
   while($r =mysql_fetch_array($risultati) ){
	   $immagine= $r['IndirizzoImmagine']; 
	     if($immagine != "img/drum.jpg" && $immagine != "img/microphone-512.png" ){ 
		 unlink($immagine);}
   }

 $query ="delete from annuncio where UsernamePubblicatore ='".$nomeutente."';";
 mysql_query($query);
 
 $query ="delete from stsa where UsernameProp ='".$nomeutente."';";
 mysql_query($query);

 $query ="delete from utente where Username ='".$nomeutente."';";
 mysql_query($query);
 


?>