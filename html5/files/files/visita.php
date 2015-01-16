<?php
// Recopilem les dades de l'entorn 
$ip= $_SERVER["REMOTE_ADDR"] ; 
$navegador = $_SERVER["HTTP_USER_AGENT"] ; 
$idioma= $_SERVER["HTTP_ACCEPT_LANGUAGE"] ; 
$pagina = $_SERVER["HTTP_REFERER"] ; 

require_once('../classes/geoplugin.class.php');
$geoplugin = new geoPlugin();
// If we wanted to change the base currency, we would uncomment the following line
// $geoplugin->currency = 'EUR';
$geoplugin->locate($ip);
$ip = $geoplugin->ip;

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

				
// Fem la crida a Geoplugin indicant la ip obtinguda de la variable d'entorn 				
 $geoplugin = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $ip) );

 // llegim amb format JSON el retorn del WS del Geoplugin 
    $lat = $geoplugin->longitude;
	$long = $geoplugin->longitude;
    $codi_pais = $geoplugin->countryCode;  
	$nom_pais= $geoplugin->countryName;  
	$ciutat = $geoplugin->city;   
    $coordenades = 	$geoplugin->latitude . ',' . $geoplugin->longitude;      
	
// connectem amb la BD 
include_once("../lib/llibreria.php"); 
connectar(); 
//Comanda per inserir un registre en la taula visites de la BD mysql 
$res = mysql_query("INSERT INTO visites (data,ip,pais,ciutat,idioma,navegador,coordenades) VALUES (now(),'$ip','$nom_pais','$ciutat','$idioma','$navegador','$coordenades')"); 
 
?>
