<!DOCTYPE html>
<html>  
    <head>
        <title>e-RockOn</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap --><link href="../e-rockon/bs/css/bootstrap.min.css" rel="stylesheet">  
        <style>
        #users
            {
                color: indianred;
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
			
			$query ="select Username from utente where tipo != 'Admin';";
			$risultati = mysql_query($query);
			$k = mysql_num_rows($risultati);
			
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
            <table class="table"><thead><span id="users">Tutti gli utenti</span><?php echo '<span class="badge" id="utenti" value='.$k.'>'.$k.'</span>'?></thead><tbody>
                 <?php
         $i = 0;
         while($i<$k)
         {
			  while($r =mysql_fetch_array($risultati) ){
			  $nomeutente= $r['Username'];
				
             echo '<tr id="'.$i.'"><td><a href="user.php?username='.$nomeutente.'">Utente: '.$nomeutente.'</a><button class="btn btn-warning" onclick="drop(this.value,'."'".$nomeutente."'".')" value='.$i.'>Elimina da e-RockOn</button></td><tr>';
			  $i++;}
         }
		 
         ?></tbody></table>
            </div>
            <ul class="pagination">
  <li><a href="admin.php">1</a></li>
  <li class="active"><a href="#">2</a></li>

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
            

         
             function drop(x,nome){
			var riga=document.getElementById(x);
           var daApprovare = document.getElementById("utenti");
			     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
               //alert(xmlhttp.responseText);
            }
        };
		var url = "dropUtente.php?username=" + nome;
		//alert(url);
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
			
            daApprovare.innerHTML=daApprovare.innerHTML -1;
            riga.remove();
        }
            
        </script>
    </body> 
</html>     