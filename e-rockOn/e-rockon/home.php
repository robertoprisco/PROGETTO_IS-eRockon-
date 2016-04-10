<!--Home del sito. -->
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
			
			$query ="select tipo from utente where username ='".$username."';";
			$risultati = mysql_query($query);
			$kind=mysql_result($risultati,0,"Tipo");
			
			$_SESSION['tipo'] = $kind;
			
	?>
		
	</head>
	
    <body  style="background-color:black;"> 


        
        <div class="container">
             <div align="center">
                <img src="../e-rockon/img/logo.png" alt="logo" style="width:350px; height:200px;"></div>
             
          <div class="row">       
<nav class="navbar navbar-default">
<div class="navbar-header">
      <ul class="nav navbar-nav">
        <li class="active"><a href="">Home</a></li>
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
                 
                 
              <!-- </div>
              <div class="col-md-2 col-lg-2"></div>
              <div class="col-md-5 col-lg-5" style="background-color:red;   "></div>
              -->

              <div id="myCarousel" class="carousel slide" style=" position: relative; margin: 0 auto;
        top: 0px; left: 0px; width: 800px; height: 300px; overflow: hidden;">
                  
                  <!-- Carousel indicators -->    
                  <ol class="carousel-indicators">     
                      <li data-target="#myCarousel" data-slide-to="0" class="active"></li> 
                      <li data-target="#myCarousel" data-slide-to="1"></li> 
                      <li data-target="#myCarousel" data-slide-to="2"></li> 
                  </ol>       <!-- Carousel items --> 
                  <div class="carousel-inner" style="position: absolute; left: 0px; top: 0px; overflow: hidden;">    
                       
					  <div class="item active">   <img src="../e-rockon/img/blue.jpg" alt="First slide" width="100%;"></div>
                      <div class="item">          <img src="../e-rockon/img/purple.jpg" alt="Second slide" width="100%;">       </div> 
                      <div class="item">          <img src="../e-rockon/img/red.jpg" alt="Third slide" width="100%;">       </div>
                  </div> 
                  <!-- Carousel nav -->
                  <a class="carousel-control left" href="#myCarousel"        data-slide="prev">&lsaquo;</a>
                  <a class="carousel-control right" href="#myCarousel"        data-slide="next">&rsaquo;</a>
     </div>
              
              <br><br><br>
<?php

			
			  $query ="select NumeroProgressivo as Id from annuncio where stato = 1 AND noleggiato=0; ";
			  $risultati = mysql_query($query);
			  $num = mysql_num_rows($risultati);
			  $id = mysql_result($risultati,$num-1,"Id");
			  $id2= mysql_result($risultati,$num-2,"Id");
			  $id3= mysql_result($risultati,$num-3,"Id");
			  $id4= mysql_result($risultati,$num-4,"Id");
			  $id5= mysql_result($risultati,$num-5,"Id");
			  $id6= mysql_result($risultati,$num-6,"Id");
			  
			
			  $query ="select nomestsa from stsa where id =".$id.";";
			  $risultati = mysql_query($query);
			  $nome1=mysql_result($risultati,0,"nomestsa");

			 
			  $query ="select nomestsa from stsa where id =".$id2.";";
			  $risultati = mysql_query($query);
			  $nome2=mysql_result($risultati,0,"nomestsa");

			 
			  $query ="select nomestsa from stsa where id =".$id3.";";
			  $risultati = mysql_query($query);
			  $nome3=mysql_result($risultati,0,"nomestsa");

			  
			  $query ="select nomestsa from stsa where id =".$id4.";";
			  $risultati = mysql_query($query);
			  $nome4=mysql_result($risultati,0,"nomestsa");

			 
			  $query ="select nomestsa from stsa where id =".$id5.";";
			  $risultati = mysql_query($query);
			  $nome5=mysql_result($risultati,0,"nomestsa");

			  
			  $query ="select nomestsa from stsa where id =".$id6.";";
			  $risultati = mysql_query($query);
			  $nome6=mysql_result($risultati,0,"nomestsa");
			  
			  
			  $query ="select descrizione from annuncio where NumeroProgressivo =".$id.";";
			  $risultati = mysql_query($query);
			  $descrizione1=mysql_result($risultati,0,"descrizione");

			  
			  $query ="select descrizione from annuncio where NumeroProgressivo =".$id2.";";
			  $risultati = mysql_query($query);
			  $descrizione2=mysql_result($risultati,0,"descrizione");

			  
			  $query ="select descrizione from annuncio where NumeroProgressivo =".$id3.";";
			  $risultati = mysql_query($query);
			  $descrizione3=mysql_result($risultati,0,"descrizione");

			  
			  $query ="select descrizione from annuncio where NumeroProgressivo =".$id4.";";
			  $risultati = mysql_query($query);
			  $descrizione4=mysql_result($risultati,0,"descrizione");

			  
			  $query ="select descrizione from annuncio where NumeroProgressivo =".$id5.";";
			  $risultati = mysql_query($query);
			  $descrizione5=mysql_result($risultati,0,"descrizione");

			  
			  $query ="select descrizione from annuncio where NumeroProgressivo =".$id6.";";
			  $risultati = mysql_query($query);
			  $descrizione6=mysql_result($risultati,0,"descrizione");
				
				
				
				
				
				?>
				
				<form method="get" action="annunciostr.php">
				
				
				
				<div style='text-align:center;'>Ultimi Annunci </div><br>
               <div  class="col-md-2 col-lg-2"></div>
            <div  class="col-md-4 col-lg-4">
                <dl>   <dt><a href="../e-rockon/annunciostr.php?id=<?php echo $id;?>"><?php echo $nome1;?></a></dt>   <dd><?php echo $descrizione1;?></dd> <br>
<dt><a href="../e-rockon/annunciostr.php?id=<?php echo $id2;?>"><?php echo $nome2;?></a></dt>   <dd><?php echo $descrizione2;?></dd> <br>
<dt><a href="../e-rockon/annunciostr.php?id=<?php echo $id3;?>"><?php echo $nome3;?></a></dt>   <dd><?php echo $descrizione3;?></dd> <br>				<br> <br>
                </dl>          

            </div>
              <div  class="col-md-2 col-lg-2"></div>
               <div  class="col-md-4 col-lg-4">
               <dl>   <dt><a href="../e-rockon/annunciostr.php?id=<?php echo $id4;?>"><?php echo $nome4;?></a></dt>   <dd><?php echo $descrizione4;?></dd> <br>
<dt><a href="../e-rockon/annunciostr.php?id=<?php echo $id5;?>"><?php echo $nome5;?></a></dt>   <dd><?php echo $descrizione5;?></dd> <br>
<dt><a href="../e-rockon/annunciostr.php?id=<?php echo $id6;?>"><?php echo $nome6;?></a></dt>   <dd><?php echo $descrizione6;?></dd> <br>				<br> <br>
                </dl>                

            </div>
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
    </body> 
</html>     