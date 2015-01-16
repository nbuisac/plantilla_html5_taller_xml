<?php
//connexió BD
include("./lib/llibreria.php");
connectar();

$res=mysql_query("SELECT * FROM minerals "); // consulta SQL

// Capçalera fitxer XML a generar


$t = "<?xml version=\"1.0\" encoding=\"utf-8\" ?>" .chr(13).chr(10) ;
$t .='<minerals>' . chr(13) . chr(10) ; // etiqueta arrel

// A partir de la consulta anirem omplint cada node
for($x=0; $x < mysql_num_rows($res);$x++) // Bucle per recorrer tots els registres
{
$t .= '<mineral>' . chr(13) . chr(10) ; // Obrim node de cada mineral
for ($y=0; $y < mysql_num_fields($res);$y++) // Bucle per recorrer tots els camps d'un registre
{
$t .= '<'. mysql_field_name($res,$y) . '>' ; // Obrim etiqueta amb nom del camp
//$t .= utf8_encode(mysql_result($res,$x,$y)); // Valor del camp cofidificat a ISO-8859-1
$t .= mysql_result($res,$x,$y); // Valor del camp 
$t .= '</'. mysql_field_name($res,$y) . '>' . chr(13) . chr(10) ; // Tanquem etiqueta amb nom del camp
}
$t .= '</mineral>' . chr(13) . chr(10) ; // Tanquem el node de cada mineral
}

$t .="</minerals>" . chr(13) . chr(10) ; // Tanquem l'etiqueta arrel final

header("Content-type: text/xml; charset=ISO-8859-1"); // Capçalera de fitxer XML
// header('Content-Disposition: attachment; filename="ws_minerals.xml"'); // Tractament com attach per gestionar la gravació
echo $t ;

?>