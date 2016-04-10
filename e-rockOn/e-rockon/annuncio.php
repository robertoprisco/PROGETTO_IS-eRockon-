<!--Pagina per l'inserimento di un nuovo annuncio -->
<!DOCTYPE html>
<html>  
    <head>
        <title>e-RockOn -- Nuovo annuncio</title>
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
                  <li><a href="esplora.php">Esplora</a></li>
            <li  class="active"><a href="">Inserisci un annuncio!</a></li>
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
              <div class="col-md-5 col-lg-5">
            <h3>Noleggia uno strumento:</h3>
			
            <form role="form" action="inserimentoAnnuncioStrumento.php" enctype="multipart/form-data" method="post">  
                <div class="form-group">
                    <label for="name">Nome strumento:</label>
                    <input type="text" class="form-control" name="nome"   placeholder="Fender Stratocaster(esempio)" required>					
					<label for="tipo">Tipo strumento:</label>
                    <input type="text" class="form-control" name="tipo"   placeholder="Chitarra(esempio)" required>                    
					<label for="descrizione">Descrizione:</label>
                    <input type="text" class="form-control" name="descrizione"   placeholder="Scrivi una breve descrizione..(max 40 caratteri)" required>
                    <label for="city">Citt&agrave;:</label>
                    <input type="text" class="form-control" name="city" maxlength="30"  placeholder="Roma(esempio)" required>
                    <label for="provincia">Provincia:</label>
                    <select name="provincia" class="form-control" required>					
                    <option value="ag">Agrigento</option>
					<option value="al">Alessandria</option>
					<option value="an">Ancona</option>
					<option value="ao">Aosta</option>
					<option value="ar">Arezzo</option>
					<option value="ap">Ascoli Piceno</option>
					<option value="at">Asti</option>
					<option value="av">Avellino</option>
					<option value="ba">Bari</option>
					<option value="bt">Barletta-Andria-Trani</option>
					<option value="bl">Belluno</option>
					<option value="bn">Benevento</option>
					<option value="bg">Bergamo</option>
					<option value="bi">Biella</option>
					<option value="bo">Bologna</option>
					<option value="bz">Bolzano</option>
					<option value="bs">Brescia</option>
					<option value="br">Brindisi</option>
					<option value="ca">Cagliari</option>
					<option value="cl">Caltanissetta</option>
					<option value="cb">Campobasso</option>
					<option value="ci">Carbonia-iglesias</option>
					<option value="ce">Caserta</option>
					<option value="ct">Catania</option>
					<option value="cz">Catanzaro</option>
					<option value="ch">Chieti</option>
					<option value="co">Como</option>
					<option value="cs">Cosenza</option>
					<option value="cr">Cremona</option>
					<option value="kr">Crotone</option>
					<option value="cn">Cuneo</option>
					<option value="en">Enna</option>
					<option value="fm">Fermo</option>
					<option value="fe">Ferrara</option>
					<option value="fi">Firenze</option>
					<option value="fg">Foggia</option>
					<option value="fc">Forl&igrave;-Cesena</option>
					<option value="fr">Frosinone</option>
					<option value="ge">Genova</option>
					<option value="go">Gorizia</option>
					<option value="gr">Grosseto</option>
					<option value="im">Imperia</option>
					<option value="is">Isernia</option>
					<option value="sp">La spezia</option>
					<option value="aq">L'aquila</option>
					<option value="lt">Latina</option>
					<option value="le">Lecce</option>
					<option value="lc">Lecco</option>
					<option value="li">Livorno</option>
					<option value="lo">Lodi</option>
					<option value="lu">Lucca</option>
					<option value="mc">Macerata</option>
					<option value="mn">Mantova</option>
					<option value="ms">Massa-Carrara</option>
					<option value="mt">Matera</option>
					<option value="vs">Medio Campidano</option>
					<option value="me">Messina</option>
					<option value="mi">Milano</option>
					<option value="mo">Modena</option>
					<option value="mb">Monza e della Brianza</option>
					<option value="na">Napoli</option>
					<option value="no">Novara</option>
					<option value="nu">Nuoro</option>
					<option value="og">Ogliastra</option>
					<option value="ot">Olbia-Tempio</option>
					<option value="or">Oristano</option>
					<option value="pd">Padova</option>
					<option value="pa">Palermo</option>
					<option value="pr">Parma</option>
					<option value="pv">Pavia</option>
					<option value="pg">Perugia</option>
					<option value="pu">Pesaro e Urbino</option>
					<option value="pe">Pescara</option>
					<option value="pc">Piacenza</option>
					<option value="pi">Pisa</option>
					<option value="pt">Pistoia</option>
					<option value="pn">Pordenone</option>
					<option value="pz">Potenza</option>
					<option value="po">Prato</option>
					<option value="rg">Ragusa</option>
					<option value="ra">Ravenna</option>
					<option value="rc">Reggio di Calabria</option>
					<option value="re">Reggio nell'Emilia</option>
					<option value="ri">Rieti</option>
					<option value="rn">Rimini</option>
					<option value="rm">Roma</option>
					<option value="ro">Rovigo</option>
					<option value="sa">Salerno</option>
					<option value="ss">Sassari</option>
					<option value="sv">Savona</option>
					<option value="si">Siena</option>
					<option value="sr">Siracusa</option>
					<option value="so">Sondrio</option>
					<option value="ta">Taranto</option>
					<option value="te">Teramo</option>
					<option value="tr">Terni</option>
					<option value="to">Torino</option>
					<option value="tp">Trapani</option>
					<option value="tn">Trento</option>
					<option value="tv">Treviso</option>
					<option value="ts">Trieste</option>
					<option value="ud">Udine</option>
					<option value="va">Varese</option>
					<option value="ve">Venezia</option>
					<option value="vb">Verbano-Cusio-Ossola</option>
					<option value="vc">Vercelli</option>
					<option value="vr">Verona</option>
					<option value="vv">Vibo valentia</option>
					<option value="vi">Vicenza</option>
					<option value="vt">Viterbo</option>
					
                    </select><br>
                     <label for="inputImg">Carica una foto:(opzionale)</label>
                    <input name="img" type="file" id="inputImg" > <br><br>
                         <button type="submit" class="btn btn-success">Inserisci annuncio!</button><br><br>
                    <button type="reset" class="btn btn-warning">Resetta informazioni!</button>
                </div>
              </form>
			  
                  </div>
              <div class="col-md-2 col-lg-2"></div>
              <div class="col-md-5 col-lg-5">
                 <h3>Noleggia una sala prove:</h3>
				 
            <form role="form" action="inserimentoAnnuncioSala.php" enctype="multipart/form-data" method="post">  
                <div class="form-group">
				    <label for="name">Nome sala:</label>
                    <input type="text" class="form-control" name="nome"   placeholder="Sala 1(esempio)" required>
                    <label for="descrizione">Descrizione:</label>
                    <input type="text" class="form-control" name="descrizione"   placeholder="Scrivi una breve descrizione..(max 40 caratteri)" required>
                    <label for="city">Citt&agrave;:</label>
                    <input type="text" class="form-control" name="city" maxlength="30"  placeholder="Roma(esempio)" required>
                    <label for="provincia">Provincia:</label>
                    <select name = "provincia" class="form-control" required>
                    
					<option value="ag">Agrigento</option>
					<option value="al">Alessandria</option>
					<option value="an">Ancona</option>
					<option value="ao">Aosta</option>
					<option value="ar">Arezzo</option>
					<option value="ap">Ascoli Piceno</option>
					<option value="at">Asti</option>
					<option value="av">Avellino</option>
					<option value="ba">Bari</option>
					<option value="bt">Barletta-Andria-Trani</option>
					<option value="bl">Belluno</option>
					<option value="bn">Benevento</option>
					<option value="bg">Bergamo</option>
					<option value="bi">Biella</option>
					<option value="bo">Bologna</option>
					<option value="bz">Bolzano</option>
					<option value="bs">Brescia</option>
					<option value="br">Brindisi</option>
					<option value="ca">Cagliari</option>
					<option value="cl">Caltanissetta</option>
					<option value="cb">Campobasso</option>
					<option value="ci">Carbonia-iglesias</option>
					<option value="ce">Caserta</option>
					<option value="ct">Catania</option>
					<option value="cz">Catanzaro</option>
					<option value="ch">Chieti</option>
					<option value="co">Como</option>
					<option value="cs">Cosenza</option>
					<option value="cr">Cremona</option>
					<option value="kr">Crotone</option>
					<option value="cn">Cuneo</option>
					<option value="en">Enna</option>
					<option value="fm">Fermo</option>
					<option value="fe">Ferrara</option>
					<option value="fi">Firenze</option>
					<option value="fg">Foggia</option>
					<option value="fc">Forl&igrave;-Cesena</option>
					<option value="fr">Frosinone</option>
					<option value="ge">Genova</option>
					<option value="go">Gorizia</option>
					<option value="gr">Grosseto</option>
					<option value="im">Imperia</option>
					<option value="is">Isernia</option>
					<option value="sp">La spezia</option>
					<option value="aq">L'aquila</option>
					<option value="lt">Latina</option>
					<option value="le">Lecce</option>
					<option value="lc">Lecco</option>
					<option value="li">Livorno</option>
					<option value="lo">Lodi</option>
					<option value="lu">Lucca</option>
					<option value="mc">Macerata</option>
					<option value="mn">Mantova</option>
					<option value="ms">Massa-Carrara</option>
					<option value="mt">Matera</option>
					<option value="vs">Medio Campidano</option>
					<option value="me">Messina</option>
					<option value="mi">Milano</option>
					<option value="mo">Modena</option>
					<option value="mb">Monza e della Brianza</option>
					<option value="na">Napoli</option>
					<option value="no">Novara</option>
					<option value="nu">Nuoro</option>
					<option value="og">Ogliastra</option>
					<option value="ot">Olbia-Tempio</option>
					<option value="or">Oristano</option>
					<option value="pd">Padova</option>
					<option value="pa">Palermo</option>
					<option value="pr">Parma</option>
					<option value="pv">Pavia</option>
					<option value="pg">Perugia</option>
					<option value="pu">Pesaro e Urbino</option>
					<option value="pe">Pescara</option>
					<option value="pc">Piacenza</option>
					<option value="pi">Pisa</option>
					<option value="pt">Pistoia</option>
					<option value="pn">Pordenone</option>
					<option value="pz">Potenza</option>
					<option value="po">Prato</option>
					<option value="rg">Ragusa</option>
					<option value="ra">Ravenna</option>
					<option value="rc">Reggio di Calabria</option>
					<option value="re">Reggio nell'Emilia</option>
					<option value="ri">Rieti</option>
					<option value="rn">Rimini</option>
					<option value="rm">Roma</option>
					<option value="ro">Rovigo</option>
					<option value="sa">Salerno</option>
					<option value="ss">Sassari</option>
					<option value="sv">Savona</option>
					<option value="si">Siena</option>
					<option value="sr">Siracusa</option>
					<option value="so">Sondrio</option>
					<option value="ta">Taranto</option>
					<option value="te">Teramo</option>
					<option value="tr">Terni</option>
					<option value="to">Torino</option>
					<option value="tp">Trapani</option>
					<option value="tn">Trento</option>
					<option value="tv">Treviso</option>
					<option value="ts">Trieste</option>
					<option value="ud">Udine</option>
					<option value="va">Varese</option>
					<option value="ve">Venezia</option>
					<option value="vb">Verbano-Cusio-Ossola</option>
					<option value="vc">Vercelli</option>
					<option value="vr">Verona</option>
					<option value="vv">Vibo valentia</option>
					<option value="vi">Vicenza</option>
					<option value="vt">Viterbo</option>
                   
				   </select><br>
                     <label for="inputImg">Carica una foto:(opzionale)</label>
                    <input name="img" type="file" id="inputImg"> <br><br><br><br><br>
                         <button type="submit" class="btn btn-success">Inserisci annuncio!</button><br><br>
                    <button type="reset" class="btn btn-warning">Resetta informazioni!</button>
                     </form>
                </div></div>
             
            
  
           
            </div>
                 <br><br><br><br><br><br>
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