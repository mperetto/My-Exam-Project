<?php include('./include/head_foot.php'); ?>
<HTML>
<HEAD>
<TITLE>Cerca</TITLE>
<link href="./stile_css/style2.css" rel="stylesheet" type="text/css"/>
<link href="./stile_css/menu.css" rel="stylesheet" type="text/css"/>
<link href="./stile_css/main_index.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="./scripts/j_control_search.js"></script>
</HEAD>
<BODY>
<div id="container">

<?php
	head();
	menu();
?>

<div id="main">
<?php
$ricerca = strtolower($_REQUEST["search"]);
include("./data_base/include/connetti.php");//includo codice necessario per la connessione

$sql = "SELECT * FROM ticket WHERE LOWER(prezzo) like '%".$ricerca."%' OR LOWER(provincia) like '%".$ricerca."%' OR LOWER(Descrizione) like '%".$ricerca."%' OR LOWER(via) like '%".$ricerca."%' OR LOWER(mq) like '%".$ricerca."%'";
$result = mysqli_query($conn, $sql);

?>
<center><p class="titleh3">La Ricerca Per <u><i><?php echo$ricerca ?></i></u> Ha Prodotto...</p></center>
<!--<div class="divcontainer">-->
<?php
if(mysqli_num_rows($result) > 0)
{
	$immag = "";
	$cont = 0;
	while($row = $result->fetch_assoc())
	{	
		if($cont==0)
			echo"<div class='divcontainer'>";
		else if($cont%3==0)
			echo"<div class='divcontainer'>";
			
		include("./include/rec_img.php");//recupero l'immagine da visualizzare
			
		include("./include/vis_divform.php");//visualizzo i dettagli del record
		
		$cont++;
		
		if($cont%3==0)
			echo"</div>";
	}
}
?>
<!--</div>-->
</div>

<?php
	mysqli_close($conn);//chiudo la connessione
	footer();
?>

</div>
</BODY>
</HTML>