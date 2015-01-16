<?php
ini_set('display_errors', 1);  // Obrim el report d'errors en fase de desenvolupament
session_start();     // Iniciem sessio imprescindible per gestionar validacions
include_once "./lib/llibreria.php";    // Incluim la nostra llibreria de funcions
connectar();    // Connectem la BD

// Validacio
if (isset($_REQUEST["accio"]) )  // Mirem quina acció hem escollit
{
if ($_REQUEST["accio"]=="logout")  logout();  // si hem escollit l'acció de sortida fem el logut cridant a la funció que tindrem a la llibreria.php
}

if(!isset($_SESSION['usuari']))     // Mirem si no estem validats
{
    if(isset($_POST['login']))   // Mirem si hem enviat la loginació
    {
//		if(loginar($_POST['user'],$_POST['password']))  // Activem la funció de validació
		if(loginar(mysql_real_escape_string($_POST['user']) , mysql_real_escape_string($_POST['password']) )) 
        {
            $_SESSION['usuari'] = $_POST['user'] ;    // Si son correctes usuarii contrasenya grava usuari a la sessió
            header("location:index.php");               // Torna a carregar la pagina
        }
    }
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Premium Series
Description: A three-column, fixed-width blog design.
Version    : 1.0
Released   : 20090303

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Taller XML - Narc&iacute;s Buisac</title>
<meta name="keywords" content="" />
<meta name="Premium Series" content="" />
<link href="./css/default.css" rel="stylesheet" type="text/css" media="screen" />
<link href="./css/propi.css" rel="stylesheet" type="text/css" media="screen" />
<script src="js/ajax.js" type="text/javascript"></script>
<script src="js/ajax1.js" type="text/javascript"></script>

    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script>
function initialize() {
  var Girona = new google.maps.LatLng(2.8086530000000675,41.964377000000006);
  var mapOptions = {
    zoom: 9,
    center: Girona
  }

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var ctaLayer = new google.maps.KmlLayer({
    url: 'http://nbuisac.netne.net/unitat2/tasca2/InstitutsInformaticaGirona.kml'
  });
  ctaLayer.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
    </script>
<script>
function cercar()
{
var cadena = '<iframe src="pages/creaAlbum.php?equip=';
cadena += document.getElementById('s').value;
cadena += '" scrolling="no" align="middle" height="300" width="500"></iframe>';
document.getElementById("flowers").innerHTML = "Els jugadors de la lliga ACB!"
document.getElementById("jugadors").innerHTML = cadena;
}
 
</script>
</head>
<body onload="temps();">
<!-- start header -->
<div id="header">
	<div id="logo">
		<h1><a href="#"><span>Taller</span>XML</a></h1>
		<p>P&agrave;gina sobre XML, RSS, KML i SVG</p>
		<!-- Capa afegida per loginar -->        
		<div id="loginar" style="width: 600px; float: right; text-align: center;">
			<br />

		<?php
			if(!isset($_SESSION['usuari']))  // Sino està validat
			{
		?>
			
		<form action="" method="post" class="login">
			<label>Usuari &nbsp; </label><input name="user" type="text" size="10" />
			<label> &nbsp; Contrasenya &nbsp; </label><input name="password" type="password" size="10" />
			<input name="login" type="submit" value="login" />
		</form>
		<?php
		}
		else     // Si està validat
		{
		echo $_SESSION["usuari"] . '<a href="index.php?accio=logout"> (Sortir) </a> ';  // Si està validat surt el nom d eusuari i l'enllaç per sortir
		}
		?>

		</div>    
		<!-- Fi de la capa de loginar --> 
	</div>
<div id='cssmenu'>
<ul>
   <li class='active '><a href='index.html'><span>Inici</span></a></li>
   <li class='has-sub '><a href='#'><span>Visors</span></a>
      <ul>
         <li><a href='#'><span>XML</span></a></li>
         <li><a href='#'><span>RSS</span></a></li>
         <li><a href='#'><span>KML</span></a></li>
         <li><a href='#'><span>SVG</span></a></li>
      </ul>
   </li>
   <li class='has-sub '><a href='#'><span>Exportació</span></a>
      <ul>
         <li><a href='#'><span>XML</span></a></li>
         <li><a href='#'><span>RSS</span></a></li>
         <li><a href='#'><span>KML</span></a></li>
         <li><a href='#'><span>SVG</span></a></li>
         <li><a href='#'><span>CSV</span></a></li>
      </ul>
   </li>
	<li class='has-sub '><a href='#'><span>Formularis</span></a>
      <ul>
         <li><a href='javascript:omplir(1);'><span>Minerals</span></a></li>
         <li><a href='javascript:omplir(2);'><span>ACB</span></a></li>
<!--
         <li><a href='#'><span>Noticies</span></a></li>
         <li><a href='#'><span>Instituts</span></a></li>
-->
     </ul>
   </li>
   <li class='has-sub '><a href='#'><span>Informació</span></a>
	<ul>
        <li><a href='javascript:Load_pagina(1);'><span>Geolocalització</span></a></li>
        <li><a href='javascript:Load_pagina(2);'><span>Preguntes</span></a></li>
        <li><a href='javascript:Load_pagina(3);'><span>Àlbum de jugadors</span></a></li>
        <li><a href='javascript:Load_pagina(4All rig
        );'><span>Àlbum de minerals</span></a></li>
<!-- 
        <li><a href='javascript:LoadElement();'><span>Bases</span></a></li>
        <li><a href='javascript:LoadElement();'><span>Alers</span></a></li>
 -->
 	</ul>
	</li>
   </ul>
   <span id="temps" class="temps">Salt actualment: </span>
</div>	
</div>
<!-- end header -->
<div id="wrapper">
	<!-- start page -->
	<div id="page">
		<div id="sidebar1" class="sidebar">
			<ul>
				<li>
					<h2>Noticies</h2>
<?php
$xslDoc = new DOMDocument();
$xslDoc->load("rss.xsl");   // carrega el fitxer XSL per donar format HTML a les dades

$xmlDoc = new DOMDocument();
$xmlDoc->load("http://www.europapress.es/rss/rss.aspx?buscar=ACB"); // en aquest cas agafara la url del RSS de l'adreça

$xsltProcessor = new XSLTProcessor();
$xsltProcessor->registerPHPFunctions();
$xsltProcessor->importStyleSheet($xslDoc);

echo $xsltProcessor->transformToXML($xmlDoc);  // Escriu el resultat de la transformació XSLT
?>

					</li>
				<li>
					<h2>Recent Comments</h2>
					<ul>
						<li><a href="#">Free CSS Templates</a> on <a href="#">Aliquam libero</a></li>
						<li><a href="#">Free CSS Templates</a> on <a href="#">Consectetuer adipiscing elit</a></li>
						<li><a href="#">Free CSS Templates</a> on <a href="#">Metus aliquam pellentesque</a></li>
						<li><a href="#">Free CSS Templates</a> on <a href="#">Suspendisse iaculis mauris</a></li>
						<li><a href="#">Free CSS Templates</a> on <a href="#">Urnanet non molestie semper</a></li>
						<li><a href="#">Free CSS Templates</a> on <a href="#">Proin gravida orci porttitor</a></li>
					</ul>
				</li>
				<li>
					<h2>Categories</h2>
					<ul>
						<li><a href="#">Aliquam libero</a></li>
						<li><a href="#">Consectetuer adipiscing elit</a></li>
						<li><a href="#">Metus aliquam pellentesque</a></li>
						<li><a href="#">Suspendisse iaculis mauris</a></li>
						<li><a href="#">Urnanet non molestie semper</a></li>
						<li><a href="#">Proin gravida orci porttitor</a></li>
					</ul>
				</li>
				<li>
					<h2>Archives</h2>
					<ul>
						<li><a href="#">September</a> (23)</li>
						<li><a href="#">August</a> (31)</li>
						<li><a href="#">July</a> (31)</li>
						<li><a href="#">June</a> (30)</li>
						<li><a href="#">May</a> (31)</li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- start content -->
		<div id="content">
<!--
			<div id="map-canvas" style="width:500px; height:300px;align:center"></div>
-->
			<div id="calendariacb" class="post" style="width:350px; height:350px;align:center">
			<iframe src="files/calendariacb.xml" height="350" width="450">
					</iframe>
			</div>
			<div class="post">
				<h1 class="title" id="flowers"><a href="#">Els jugadors de la lliga ACB!</a></h1>
				<div class="entry" id="jugadors">
					<iframe src="http://nbuisac.netne.net/unitat2/tasca2/creaAlbum.php?equip=FC%20BARCELONA" scrolling="no" align="middle" height="300" width="500">
					</iframe>
				</div>
			</div>
			<div class="post">
				<h2 class="title"><a href="#">Sample Tags</a></h2>
				<p class="byline"><small>Posted on October 1st, 2009 by <a href="#">Free CSS Templates</a></small></p>
				<div class="entry">
					<h3>An H3 Followed by a Blockquote:</h3>
					<blockquote>
						<p>&#8220;Donec leo, vivamus nibh in augue at urna congue rutrum. Quisque dictum integer nisl risus, sagittis convallis, rutrum id, congue, and nibh.&#8221;</p>
					</blockquote>
					<h3>Bulleted List:</h3>
					<ul>
						<li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
						<li>Phasellus nec erat sit amet nibh pellentesque congue.</li>
						<li>Cras vitae metus aliquam risus pellentesque pharetra.</li>
					</ul>
					<h3>Numbered List:</h3>
					<ol>
						<li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
						<li>Phasellus nec erat sit amet nibh pellentesque congue.</li>
						<li>Cras vitae metus aliquam risus pellentesque pharetra.</li>
					</ol>
					<p class="links"><a href="#" class="more">&laquo;&laquo;&nbsp;&nbsp;Read More&nbsp;&nbsp;&raquo;&raquo;</a></p>
				</div>
			</div>
			<div class="post">
				<h2 class="title"><a href="#">Lorem Ipsum Dolor </a></h2>
				<p class="byline"><small>Posted on October 1st, 2009 by <a href="#">Free CSS Templates</a></small></p>
				<div class="entry">
					<p>Consectetuer adipiscing elit. Nam pede erat, porta eu, lobortis eget, tempus et, tellus. Etiam neque. Vivamus consequat lorem at nisl. Nullam non wisi a sem semper eleifend. Donec mattis libero eget urna. Duis pretium velit ac mauris. Proin eu wisi suscipit nulla suscipit interdum. Aenean lectus lorem, imperdiet at, ultrices eget, ornare et, wisi. </p>
					<p class="links"><a href="#" class="more">&laquo;&laquo;&nbsp;&nbsp;Read More&nbsp;&nbsp;&raquo;&raquo;</a></p>
				</div>
			</div>
		</div>
		<!-- end content -->
		<!-- start sidebars -->
		<div id="sidebar2" class="sidebar">
			<ul>
				<li>
					<form id="searchform" method="get" action="#">
						<!-- <form id="searchform" > -->
						<div>
						<span id="cercar">
							<h2>Cercar</h2>
							<input type="text" name="s" id="s" size="15" value="" onkeypress="if (event.keyCode == 13) cercar()" />
						</span>
						</div>
						<!-- </form> -->
					</form>
				</li>
				<li>
					<h2>Tags</h2>
					<div itemscope itemtype="http://schema.org/Event">
						<p class="tag">
							<span itemprop="name">Sortida</span><br />
							<span itemprop="description">Sortida dels alumnes del CFGM d'informàtica</span><br />
							<div itemprop="location" itemscope itemtype="http://schema.org/Place">
								<span itemprop="name">Barcelona Super Computer Center</span>.
								<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
									<span itemprop=streetAddress">Carrer de Jordi Girona, 29</span>,&nbsp;
									<span itemprop="postalCode">08034</span>&nbsp;
									<span itemprop="addressLocallity">Barcelona</span>
								</div>
							</div>
						</p>
					</div>
				</li>
				<li>
					<h2>Calendar</h2>
					<div id="calendar_wrap">
						<table summary="Calendar">
							<caption>
							October 2009
							</caption>
							<thead>
								<tr>
									<th abbr="Monday" scope="col" title="Monday">M</th>
									<th abbr="Tuesday" scope="col" title="Tuesday">T</th>
									<th abbr="Wednesday" scope="col" title="Wednesday">W</th>
									<th abbr="Thursday" scope="col" title="Thursday">T</th>
									<th abbr="Friday" scope="col" title="Friday">F</th>
									<th abbr="Saturday" scope="col" title="Saturday">S</th>
									<th abbr="Sunday" scope="col" title="Sunday">S</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<td abbr="September" colspan="3" id="prev"><a href="#" title="View posts for September 2009">&laquo; Sep</a></td>
									<td class="pad">&nbsp;</td>
									<td colspan="3" id="next">&nbsp;</td>
								</tr>
							</tfoot>
							<tbody>
								<tr>
									<td>1</td>
									<td>2</td>
									<td>3</td>
									<td id="today">4</td>
									<td>5</td>
									<td>6</td>
									<td>7</td>
								</tr>
								<tr>
									<td>8</td>
									<td>9</td>
									<td>10</td>
									<td>11</td>
									<td>12</td>
									<td>13</td>
									<td>14</td>
								</tr>
								<tr>
									<td>15</td>
									<td>16</td>
									<td>17</td>
									<td>18</td>
									<td>19</td>
									<td>20</td>
									<td>21</td>
								</tr>
								<tr>
									<td>22</td>
									<td>23</td>
									<td>24</td>
									<td>25</td>
									<td>26</td>
									<td>27</td>
									<td>28</td>
								</tr>
								<tr>
									<td>29</td>
									<td>30</td>
									<td>31</td>
									<td class="pad" colspan="4">&nbsp;</td>
								</tr>
							</tbody>
						</table>
					</div>
				</li>
				<li>
					<h2>Categories</h2>
					<ul>
						<li><a href="#">Aliquam libero</a></li>
						<li><a href="#">Consectetuer adipiscing elit</a></li>
						<li><a href="#">Metus aliquam pellentesque</a></li>
						<li><a href="#">Suspendisse iaculis mauris</a></li>
						<li><a href="#">Urnanet non molestie semper</a></li>
						<li><a href="#">Proin gravida orci porttitor</a></li>
						<li><a href="#">Aliquam libero</a></li>
						<li><a href="#">Consectetuer adipiscing elit</a></li>
						<li><a href="#">Metus aliquam pellentesque</a></li>
						<li><a href="#">Urnanet non molestie semper</a></li>
						<li><a href="#">Proin gravida orci porttitor</a></li>
						<li><a href="#">Aliquam libero</a></li>
						<li><a href="#">Consectetuer adipiscing elit</a></li>
						<li><a href="#">Metus aliquam pellentesque</a></li>
						<li><a href="#">Suspendisse iaculis mauris</a></li>
						<li><a href="#">Urnanet non molestie semper</a></li>
						<li><a href="#">Proin gravida orci porttitor</a></li>
						<li><a href="#">Metus aliquam pellentesque</a></li>
						<li><a href="#">Suspendisse iaculis mauris</a></li>
						<li><a href="#">Urnanet non molestie semper</a></li>
						<li><a href="#">Proin gravida orci porttitor</a></li>
						<li><a href="#">Metus aliquam pellentesque</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- end sidebars -->
		<div class="separador_blanc">&nbsp;</div>
	</div>
	<!-- end page -->
</div>
<div id="footer">
	<div itemscope itemtype="http://schema.org/Organization" class="vcard">
	        <strong class="fn n">
	                <span itemprop="name">Institut Salvador Espriu</span>
   	        </strong><br />
	                <span itemprop="address" class="address">Avda. Folch i Torres s/n</span><br />
	                <span itemprop="location" class="locality">Salt</span>, <span class="country-name">catalunya</span>
	                <span itemprop="telephone">972 240 246</span>
	        
	</div>
	<p class="copyright">&copy;&nbsp;&nbsp;2009 All Rights Reserved &nbsp;&bull;&nbsp; Design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>.</p>
	<p class="link"><a href="#">Privacy Policy</a>&nbsp;&#8226;&nbsp;<a href="#">Terms of Use</a></p>
</div>
<div class="autor">This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a>
</div>
</body>
</html>
