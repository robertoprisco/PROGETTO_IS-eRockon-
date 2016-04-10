<!DOCTYPE html>
<html>  
    <head>
        <title>e-RockOn</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap --><link href="../e-rockon/bs/css/bootstrap.min.css" rel="stylesheet">  
        <style>
        #warning
            {
                color: firebrick;
            }
               #default
            {
                color: darkgoldenrod;
            }
        </style>
    
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
			
			$usdb="root";
				$passdb="4815162342";
				$database="eRockOn";
				$localhost="localhost";
			 
			 
			 mysql_connect($localhost,$usdb,$passdb);
			@mysql_select_db($database) or die("Impossibile selezionare il database.");
			//conto gli annunci non approvati
			$query ="select NumeroProgressivo from annuncio where stato = 0 AND noleggiato = 0;";
			$risultati = mysql_query($query);
			$k = mysql_num_rows($risultati);
			
			//conto gli annunci
			$query ="select NumeroProgressivo from annuncio where NumeroProgressivo > 6;";
			$risultati2 = mysql_query($query);
			$riga = mysql_num_rows($risultati2);
			
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
            <div class="row" style="text-align:justify; letter-spacing: 5px;">
 
     <table class="table"><thead><span id="warning">Annunci in sospeso</span><?php echo '<span class="badge" id="daApprovare" value='.$k.'>'.$k.'</span>'?></thead><tbody>
        <?php
         $i = 0;
         while($i<$k)
         {
			 while($r =mysql_fetch_array($risultati) ){
				$numeroprogressivo= $r['NumeroProgressivo'];
				$query ="select IdStSa from annuncio where NumeroProgressivo=".$numeroprogressivo.";";
				$res = mysql_query($query);
				$idstsa=mysql_result($res,0,"IdStSa");
			
			 
             echo '<tr id="'.$i.'"><td><a href="annunciostr.php?id='.$idstsa.'"  >Annuncio'.($i+1).'</a><button class="btn btn-success" onclick="approva(this.value,'.$idstsa.')" value='.$i.'>APPROVA</button><button class="btn btn-warning" onclick="dropDaApprovare(this.value,'.$idstsa.')" value='.$i.'>ELIMINA</button></td><tr>';
		 $i++;}
		 
         }
         ?></tbody></table>
            </div>
            <div class="row" style="text-align:justify; letter-spacing: 5px;">
            <table class="table"><thead><span id="default">Tutti gli annunci</span><?php echo '<span class="badge" id="approvati" value='.$riga.'>'.$riga.'</span>'?></thead><tbody>
                 <?php
         $j = 0;
         while($j<$riga)
         {
			  while($s =mysql_fetch_array($risultati2) ){
				$numeroprogressivo= $s['NumeroProgressivo'];
				$query ="select IdStSa from annuncio where NumeroProgressivo=".$numeroprogressivo.";";
				$res = mysql_query($query);
				$idstsa=mysql_result($res,0,"IdStSa");
				
             echo '<tr id="'.$j.'"><td><a href="annunciostr.php?id='.$idstsa.'">Annuncio'.($j+1).'</a><button class="btn btn-warning" onclick="drop(this.value,'.$idstsa.')" value='.$j.'>ELIMINA</button></td><tr>';
		 $j++;}
         }
         ?></tbody></table>
            </div>
            <ul class="pagination">
  <li class="active"><a href="#">1</a></li>
  <li><a href="admin2.php">2</a></li>

</ul>
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
		var url = "changeAnnuncioState.php?id=" + y;
		//alert(url);
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
			
            daApprovare.innerHTML=daApprovare.innerHTML -1;
            riga.remove();
        }
		
		
		
		
               function dropDaApprovare(x, y){
            var riga=document.getElementById(x);
           var daApprovare = document.getElementById("daApprovare");
			     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
               //alert(xmlhttp.responseText);
            }
        };
		var url = "dropAnnuncio.php?id=" + y;
		//alert(url);
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
			
            daApprovare.innerHTML=daApprovare.innerHTML -1;
            riga.remove();
        }
		
		
		
		
             function drop(x, y){
             var riga=document.getElementById(x);
           var daApprovare = document.getElementById("approvati");
			     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
               //alert(xmlhttp.responseText);
            }
        };
		var url = "dropAnnuncio.php?id=" + y;
		//alert(url);
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
			
            daApprovare.innerHTML=daApprovare.innerHTML -1;
            riga.remove();
        }
            
        </script>
    </body> 
</html>     