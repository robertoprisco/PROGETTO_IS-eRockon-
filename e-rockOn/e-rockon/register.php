<?php
 $usdb="root";
 $passdb="4815162342";
 $database="eRockOn";
 $localhost="localhost";
 
 mysql_connect($localhost,$usdb,$passdb);
 @mysql_select_db($database) or die("Impossibile selezionare il database.");
 

session_start(); 
$username  = $_SESSION['username'];
$mail      = $_SESSION['mail'];
$password  = $_SESSION['password'];
$nome      = $_SESSION['nome'];
$cognome   = $_SESSION['cognome'];
$eta       = $_SESSION['eta'];
$indirizzo = $_SESSION['indirizzo'];
$cellulare = $_SESSION['cellulare'];

$_SESSION['numeroannunci'] = 0;
$_SESSION['tipo'] = 'Normale';




	 $query="insert into utente(Username,Password,Email,Tipo,Nome,Cognome,Eta,Indirizzo,Cellulare,NumeroAnnunci)
			 values('$username','$password','$mail','Normale','$nome','$cognome','$eta','$indirizzo','$cellulare',0);";
			 mysql_query($query);
			 mysql_close();
			 header("location: home.php");








?>
