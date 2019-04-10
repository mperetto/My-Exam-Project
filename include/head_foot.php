<?php
function head()
{
?>
<div id="header">
	<a href="index.php"><img src="./img/head_logo.jpg" class="logo"></a>
</div>
<?php
}
function menu()
{
?>
<div id="menu">
	<ul>
		<a href="index.php"><li>HOME</li></a>
		<a href="chi_siamo.php"><li>CHI SIAMO</li></a>
		<a href="offerte.php"><li>LE NOSTRE OFFERTE</li></a>
		<a href="contatti.php"><li>CONTATTI</li></a>
		<!--<a href="#"><li><img src="./img/login.png" id="login">LOGIN</li></a>-->
	</ul>
	<form name="fsearch" action="#">
					<input type="text" name="search" placeholder=" Cerca..." id="txt_cerca">
					<input type="button" value="cerca" id="btn_cerca" onclick="controllo()">
	</form>
</div>
<?php
}
function footer()
{
?>
<div id="footer">
	<div class="divfooter">
		<p class="pfooter">
			Indice:
			<ul class="ulfooter">
				<li><a href="index.php">Home</a></li>
				<li><a href="chi_siamo.php">Chi Siamo</a></li>
				<li><a href="offerte.php">Le Nostre Offerte</a></li>
				<li><a href="contatti.php">Contatti</a></li>
			</ul>
		</p>
	</div>
	<div class="divfooter">
		<p>Contattaci</p>
		<p class="pcontfoo">Via roma, 54</p>
		<p class="pcontfoo">Num Tel: <a href="tel:+39012345678" style="color: white">012345678</a></p>
	</div>
	<div class="divfooter">
		<p>Seguici sui social</p>
			<ul class="social">
				<a href="https://it-it.facebook.com/"><li><img src="./img/facebook_logo.png" class="soc_logo"></li></a>
				<a href="https://twitter.com/login?lang=it"><li><img src="./img/twitter_logo.png" class="soc_logo"></li></a>
				<a href="https://www.instagram.com/?hl=it"><li><img src="./img/instagram_logo.png" class="soc_logo"></li></a>
			</ul><BR>
	</div>
	<div class="divfooter">
		<p>Accedi all'area Personale:</p>
		<center><a href="./data_base/login.php"><img src="./img/login.png" id="login"></a></center>
	</div>
</div>
<?php
}
?>
