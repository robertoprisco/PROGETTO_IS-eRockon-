<?php

$usdb="root";
$passdb="4815162342";
$database="eRockOn";
$localhost="localhost";


mysql_connect($localhost,$usdb,$passdb);
@mysql_select_db($database) or die("Impossibile selezionare il database.");


session_start();
$citta = $_POST['city'];
$provincia = $_POST['provincia'];

$nomestsa1 = $_POST['nome'];
$nomestsa = substr($nomestsa1,0,19);

$tipo1 = $_POST['tipo'];
$tipo = substr($tipo1,0,19);

$username = $_SESSION['username'];
$genere = "STRUMENTO";

$desc = $_POST['descrizione'];
$descrizione = substr($desc,0,199);

$stato = '0';
$noleggiato = '0';



$giorno = date("d", time());
$mese = date("m", time());
$anno = date("Y", time());
			 
$data = $anno."-".$mese."-".$giorno;





$query ="select max(Id) as Id from stsa;";
$risultati = mysql_query($query);
$num = mysql_numrows($risultati);
$id=mysql_result($risultati,0,"Id");

$id = $id +1;  


$query ="select max(NumeroProgressivo) as NumeroProgressivo from annuncio;";
$risultati = mysql_query($query);
$num = mysql_numrows($risultati);
$numeroProgressivo=mysql_result($risultati,0,"NumeroProgressivo");

$numeroProgressivo = $numeroProgressivo +1;  


		
  function file_exensiont($filename) {
  $ext = explode(".", $filename);
  return $ext[count($ext)-1];  
}
		

$upload_percorso = '../e-rockon/img/';
$file_tmp = $_FILES['img']['tmp_name'];
$file_nome = $_FILES['img']['name']; 
$file_nome = str_replace(' ','',$file_nome);
$nomefile = $username.$id.".".$extension = file_exensiont($file_nome);  
if($file_nome == null){$nomefile = "drum.jpg";}
$indirizzo = "img/".$nomefile; 

			
move_uploaded_file($file_tmp, $upload_percorso.$nomefile);		



$query="insert into stsa(Id,Citta,Provincia,Genere,NomeStSa,TipoStrumento,UsernameProp,IndirizzoImmagine)
		values('$id','$citta','$provincia','$genere','$nomestsa','$tipo','$username','$indirizzo');";
		mysql_query($query);
		



$query="insert into annuncio(NumeroProgressivo,DataPub,Descrizione,Stato,Noleggiato,UsernamePubblicatore,IdStSa)
		values('$numeroProgressivo','$data','$descrizione','$stato','$noleggiato','$username','$id');";
		mysql_query($query);
		
		

		
		mysql_close();
		header("location: home.php");

?>