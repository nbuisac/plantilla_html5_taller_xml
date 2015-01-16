<?php
$xslDoc = new DOMDocument();
$xslDoc->load("./rss.xsl");   // carrega el fitxer XSL per donar format HTML a les dades

$xmlDoc = new DOMDocument();
$xmlDoc->load("http://www.europapress.es/rss/rss.aspx?buscar=ACB"); // en aquest cas agafara la url del RSS de l'adreça

$xsltProcessor = new XSLTProcessor();
$xsltProcessor->registerPHPFunctions();
$xsltProcessor->importStyleSheet($xslDoc);

echo $xsltProcessor->transformToXML($xmlDoc);  // Escriu el resultat de la transformació XSLT
?>
 