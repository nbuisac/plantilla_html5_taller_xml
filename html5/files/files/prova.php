<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Pàgina de prova</title>
<link href="../css/default.css" rel="stylesheet" type="text/css" media="screen" />
<link href="../css/propi.css" rel="stylesheet" type="text/css" media="screen" />
<script src="../js/ajax1.js" type="text/javascript"></script>
</head>
<body>
<iframe src="../pages/preguntes.php" height="400" width="500"></iframe>
<div id='cssmenu'>
<ul>
	<li class='has-sub'><a href='#'><span>Informació</span></a>
	<ul>
		<li><a href='javascript:LoadElement();'><span>Bases</span></a></li>
        <li><a href='javascript:LoadElement();'><span>Alers</span></a></li>
        <li><a href='javascript:Load_pagina(2);'><span>Àlbum ACB</span></a></li>
        <li><a href='javascript:Load_pagina(1);'><span>Preguntes </span></a></li>
        <li><a href='javascript:Load_pagina(3);'><span>Calendari de Partits</span></a></li>
	</ul>
	</li>
</ul>
</div>
<?php
require_once('../classes/geoplugin.class.php');
$geoplugin = new geoPlugin();
// If we wanted to change the base currency, we would uncomment the following line
// $geoplugin->currency = 'EUR';
$geoplugin->locate();

echo "Geolocation results for {$geoplugin->ip}: <br />\n".
		"City: {$geoplugin->city} <br />\n".
		"Region: {$geoplugin->region} <br />\n".
		"Area Code: {$geoplugin->areaCode} <br />\n".
		"DMA Code: {$geoplugin->dmaCode} <br />\n".
		"Country Name: {$geoplugin->countryName} <br />\n".
		"Country Code: {$geoplugin->countryCode} <br />\n".
		"Longitude: {$geoplugin->longitude} <br />\n".
		"Latitude: {$geoplugin->latitude} <br />\n".
		"Currency Code: {$geoplugin->currencyCode} <br />\n".
		"Currency Symbol: {$geoplugin->currencySymbol} <br />\n".
		"Exchange Rate: {$geoplugin->currencyConverter} <br />\n";

if ( $geoplugin->currency != $geoplugin->currencyCode ) {
	//our visitor is not using the same currency as the base currency
	echo "<p>Al canvi d'avui, 100€uros són " . $geoplugin->convert(100) ." </p>\n";
}

require_once('../classes/ParseXml.class.php');

if ( is_numeric($geoplugin->latitude) && is_numeric($geoplugin->longitude) ) {
	$lat = $geoplugin->latitude;
	$long = $geoplugin->longitude;
	//set farenheight for US
	if ($geoplugin->countryCode == 'US') {
		$tempScale = 'fahrenheit';
		$tempUnit = '&deg;F';
	} else {
		$tempScale = 'celsius';
		$tempUnit = '&deg;C';
	}
 
	$xml = new ParseXml();   // Cridem a un altre WS(servei web que amb la latitud i longitud ens retrorna el temps dels propers 7 dies 
	$xml->LoadRemote("http://api.wunderground.com/auto/wui/geo/ForecastXML/index.xml?query={$lat},{$long}", 3);
	$dataArray = $xml->ToArray();
 
	$html = "<center><h2>Temps previst per " . $geoplugin->city;
	$html .= "</h2><table cellpadding=5 cellspacing=10><tr>";
 
	foreach ($dataArray['simpleforecast']['forecastday'] as $arr) {
 
		$html .= "<td align='center'>" . $arr['date']['weekday'] . "<br />";
		$html .= "<img src='http://icons-pe.wxug.com/i/c/a/" . $arr['icon'] . ".gif' border=0 /><br />";
		$html .= "<font color='red'>" . $arr['high'][$tempScale] . $tempUnit . " </font>";
		$html .= "<font color='white'>" . $arr['low'][$tempScale] . $tempUnit . "</font>";
		$html .= "</td>";
 
 
	}
	$html .= "</tr></table>";
 
	echo $html;
}
 ?>
 				<div class="entry" id="jugadors">
					<iframe src="http://nbuisac.netne.net/unitat2/tasca2/creaAlbum.php?equip=FC%20BARCELONA" scrolling="no" align="middle" height="300" width="500">
					</iframe>
				</div>
 
 </body>
</html>
 