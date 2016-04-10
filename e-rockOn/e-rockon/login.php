<?php
 $usdb="root";
 $passdb="4815162342";
 $database="eRockOn";
 $localhost="localhost";
 
 mysql_connect($localhost,$usdb,$passdb);
 @mysql_select_db($database) or die("Impossibile selezionare il database.");
 

session_start(); 

$count     = 0;
$username  = $_POST['username']; 
$password  = $_POST['password'];


	        $query="SELECT username from utente";			 
			$risultati=mysql_query($query);
			$num = mysql_numrows($risultati);
	
			$i=0;
			while ($i < $num) {
				$Usrtemp=strtoupper(mysql_result($risultati,$i,"Username"));
				if($Usrtemp == strtoupper($username)){$count++;}
				$i++;
			}
			
			$query="SELECT password from utente u where username = '$username' ";			 
			$risultati=mysql_query($query);
			$num = mysql_numrows($risultati);
	
			$i=0;
			while ($i < $num) {
				$passtemp=mysql_result($risultati,$i,"password");
				if($passtemp == $password){$count++;}
				$i++;
			}
			
			mysql_close();
			
			if($count == 2)
			{
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				$_SESSION['errorelogin'] = "";
				header("location: home.php");
			}
			
			else{
				$_SESSION['errorelogin'] = "Username o Password errata";
				header("location: index.php");
			}
			
			



?>