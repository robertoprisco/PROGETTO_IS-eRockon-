<!DOCTYPE html>
<html>  
    <head>
        <title>e-RockOn</title>
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
			
			if(isset($_GET['username']))
			{$nomeutente = $_GET['username'];}else{$nomeutente = $username;}
		
$giorno = date("d", time());
$mese = date("m", time());
$anno = date("Y", time());
			 
 $data = $anno."-".$mese."-".$giorno;
 
		    $usdb="root";
			$passdb="4815162342";
			$database="eRockOn";
			$localhost="localhost";
			 
			 
			 mysql_connect($localhost,$usdb,$passdb);
			@mysql_select_db($database) or die("Impossibile selezionare il database.");
			
		
			$query ="select * from richiesta where UsernameProp='".$nomeutente."' AND FineNol >'".$data."';";
			$risultati = mysql_query($query);
			$k = mysql_num_rows($risultati);
			
			
			
			$query ="select * from richiesta where  FineNol <'".$data."';";
			$results = mysql_query($query);
			$riga = mysql_num_rows($results);
			
			 $s=0; 
                        while($s<$riga)
                        {
							while($r =mysql_fetch_array($results) ){
							$idstsa = $r['IdStSa'];
							$numrichiesta = $r['NumRichiesta'];
							
							$query ="delete from richiesta where NumRichiesta =".$numrichiesta.";";
							mysql_query($query);
							
							$query ="update annuncio set Noleggiato = 0 where IdStSa =".$idstsa.";";
							mysql_query($query);							
							
                            $s++;}
                        }
		
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
      <p class="navbar-text navbar-right">Benvenuto, <a href="utente.php" class="navbar-link"><?php if(isset($username)){echo $username;} else {echo 'Utente';}  ?> 
																					(<a href="logout.php">Esci</a>)</a></p>
  </div>
              </nav>
         </div>
            <div class="row">
            <div class="col-md-3 col-lg-3"></div>
                <div class="col-md-6 col-lg-6" style="background-color:white;"><br>
                    <br><br>
                <table class="table" style="background-color:black; color:white;">
                    <thead style="text-align:justify; letter-spacing: 5px;">
                    <tr><th>Le mie richieste di Noleggio</th></tr>
                    </thead>
                    <tbody>
                        <?php
                        $i=0;
                        while($i<$k)
                        {
							while($r =mysql_fetch_array($risultati) ){
						 	$richiedente= $r['UsernameNol'];
							$inizio= $r['InizioNol'];
							$fine= $r['FineNol'];
							$idstsa = $r['IdStSa'];
							$numrichiesta = $r['NumRichiesta'];
							$approva = $r['Approva'];
							
							$query ="select Genere from stsa where Id=".$idstsa.";";
							$res = mysql_query($query);
							$genere = mysql_result($res,0,"Genere");	
							
							if($approva == 0){
                            echo'<tr><td>';
							echo 'Utente: <a href="user.php?username='.$richiedente.'">'.$richiedente.' </a>';
							if($genere == "STRUMENTO"){
							echo 'Vorrebbe noleggiare questo strumento: <a href="annunciostr.php?id='.$idstsa.'"  >Strumento </a>';
							}else{
								echo 'Vorrebbe noleggiare questa sala: <a href="annunciostr.php?id='.$idstsa.'"  >Sala </a>';
							}
							echo '<br>';
							echo 'Dal: '.$inizio.' ';
							echo 'Al: '.$fine.' ';
							echo'<button class="btn btn-success" onclick="approva(this.value,'.$numrichiesta.')" value='.$i.'>ACCETTA</button><button class="btn btn-warning" onclick="drop(this.value,'.$numrichiesta.')" value='.$i.'>RIFIUTA</button>';
							}
							
								else{
							echo'<tr><td>';
							echo 'Utente: <a href="user.php?username='.$richiedente.'">'.$richiedente.' </a>';
							if($genere == "STRUMENTO"){
							echo 'Ha noleggiato questo strumento: <a href="annunciostr.php?id='.$idstsa.'"  >Strumento </a>';
							}else{
								echo 'Ha noleggiato questa sala: <a href="annunciostr.php?id='.$idstsa.'"  >Sala </a>';
							}
							echo '<br>';
							echo 'Dal: '.$inizio.' ';
							echo 'Al: '.$fine.' ';
									}
									
                            $i++;}
                        }
                        
                        ?>
                    
                    </tbody>
                    
                    </table>
                    

                    <br><br>
                </div>
                  <div class="col-md-3 col-lg-3"></div>
            </div>
  
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
	<script>
            
            Element.prototype.remove = function() {
    this.parentElement.removeChild(this);
}
NodeList.prototype.remove = HTMLCollection.prototype.remove = function() {
    for(var i = this.length - 1; i >= 0; i--) {
        if(this[i] && this[i].parentElement) {
            this[i].parentElement.removeChild(this[i]);
        }
    }
}
         
		 
        function approva(x, y){
            var riga=document.getElementById(x);
           var daApprovare = document.getElementById("daApprovare");
			     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              // alert(xmlhttp.responseText);
            }
        };
		var url = "acceptRequest.php?id=" + y;
		//alert(url);
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
			
            daApprovare.innerHTML=daApprovare.innerHTML -1;
            riga.remove();
        }
		
		
		
		
             function drop(x, y){
             var riga=document.getElementById(x);
           var daApprovare = document.getElementById("daApprovare");
			     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              // alert(xmlhttp.responseText);
            }
        };
		var url = "dropRequest.php?id=" + y;
		//alert(url);
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
			
            daApprovare.innerHTML=daApprovare.innerHTML -1;
            riga.remove();
        }
            
        </script>
    </body> 
</html>     