<?php
//require_once('../classes/ParseXml.class.php');
//$params = array('id' => $_GET['id']);   // Agafem el parametre "id" 

$xslDoc = new DOMDocument();
$xslDoc->load("preguntes.xsl");

$xmlDoc = new DOMDocument();
$xmlDoc->load("http://nbuisac.netne.net/web4/pages/crea_preguntes.php");
//$xmlDoc->load("preguntes.xml");

$xsltProcessor = new XSLTProcessor();
$xsltProcessor->registerPHPFunctions();
$xsltProcessor->importStyleSheet($xslDoc);

//foreach ($params as $key => $val)      //Serveix per aplicar paràmetres al XSL
//$xsltProcessor->setParameter('', $key, $val);

echo $xsltProcessor->transformToXML($xmlDoc);
?>