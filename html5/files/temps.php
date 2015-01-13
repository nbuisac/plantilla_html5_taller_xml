<?php
function posa_temps() {
	$xslDoc = new DOMDocument();
	$xslDoc->load("files/patro_temps.xsl");
	
	$xmlDoc = new DOMDocument();
	$xmlDoc->load("http://api.openweathermap.org/data/2.5/weather?q=Salt&mode=xml&units=metric");
	
	$xsltProcessor = new XSLTProcessor();
	$xsltProcessor->registerPHPFunctions();
	$xsltProcessor->importStyleSheet($xslDoc);
	
	echo $xsltProcessor->transformToXML($xmlDoc);
}
?>