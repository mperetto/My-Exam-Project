<?php include('./include/head_foot.php'); ?>
<HTML>
<HEAD>
<TITLE>Dettagli</TITLE>
<link href="./stile_css/style2.css" rel="stylesheet" type="text/css"/>
<link href="./stile_css/menu.css" rel="stylesheet" type="text/css"/>
<link href="./stile_css/contact.css" rel="stylesheet" type="text/css"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script type="text/javascript" src="./scripts/j_control_search.js"></script>
</HEAD>
<BODY>
<div id="container">

<?php
	head();
	menu();
?>

<div id="main">

<center><p class="titleh3">Visualizza Dettagli</p></center>
<?php
$tick_id = $_REQUEST["tick_id"];
?>
<div class="w3-content w3-display-container">
<?php
			$cartella = ".\\data_base\\immagini\\ID_".$tick_id;
			
			if(!is_dir($cartella))
				$immag = './img/img.png';//setto immagine di default
			else
			{
				$risorsa = opendir($cartella);
				
				while($file = readdir($risorsa))
				{
					if($file != "." && $file != "..")
					{
						$immag = $cartella."\\".$file;
						
						echo"<img class='mySlides' src='".$immag."' style='width:100%; height:500px'>";
					}
				}
			}
?>
  <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
</div>
<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>
<?php
	
	//echo$tick_id."<br>";
	include("./data_base/include/connetti.php");//includo codice necessario per la connessione
	
	$sql = "SELECT * FROM ticket WHERE ticket_ID='".$tick_id."'";
	$result = mysqli_query($conn, $sql);
?>
<div class="divcontainer">
	<div class="divform" style="background-color: #D2D2D2">
<?php
if(mysqli_num_rows($result) > 0)
{
	$row = $result->fetch_assoc();
	

?>
		<p class="cont"><b>Descrizione: </b><?php echo$row["Descrizione"] ?></p>
		<p class="cont"><b>Indirizzo: </b><?php echo$row["via"] ?></p>
		<p class="cont"><b>Metri Quadri: </b><?php echo$row["mq"] ?> mc<sup>2</sup> </p>
		<p class="cont"><b>Provincia: </b><?php echo$row["provincia"] ?></p>
		<p class="cont"><b>Prezzo: </b><?php echo$row["prezzo"] ?> &euro;</p>
	</div>
<?php
}
?>
</div>
</div>
<!--<div id="sidebar"></div>-->
<?php
	mysqli_close($conn);//chiudo la connessione
	footer();
?>
</div>
</BODY>
</HTML>