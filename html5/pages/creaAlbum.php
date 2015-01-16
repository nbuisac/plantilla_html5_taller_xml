<?php
include_once "../lib/llibreria.php";    // Incluim la nostra llibreria de funcions
connectar();    // Connectem la BD

if (isset($_REQUEST["equip"])) $grup = $_REQUEST["equip"];
else  $grup="VALENCIA BASKET" ;

$sql ="SELECT * FROM jugadorsacb Where equip like '%" . $grup . "%'"   ;
$res=mysql_query($sql); // consulta SQL
 
$t = '<?xml version="1.0" encoding="UTF-8"?>' . chr(13) . chr(10);
$t .= '<svg width="500" height="300" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">' .chr(13) . chr(10);  
$t .= '<!-- Created with SVG-edit - http://svg-edit.googlecode.com/ -->' . chr(13) . chr(10);  
$t .='<!-- Generat amb un script creat pel Taller XML per la Tasca 2 -->' . chr(13) . chr(10);  
$t .=' <g> ' . chr(13) . chr(10) ;
$t .='<title>' . $grup . '</title>' . chr(13) . chr(10);
$t .= '<text transform="matrix(5.47483, 0, 0, 2.80, -2268, -260.267)" xml:space="preserve" text-anchor="middle" font-family="serif" font-size="5" id="titol" y="99.7531" x="446.27959">' . $grup . '</text>' . chr(13) . chr(10);
$c = 0;
$f = 0;

for($x=0; $x < mysql_num_rows($res); $x++)
{
if (strlen(mysql_result($res,$x,"foto"))>1)
{
$c++;
if( ($c % 7) == 0 )
{
$c = 1;
$f = $f + 1;
}

$posy_i= 30 + (60 * $f)  ;
$posx_i=(50 * ($c - 1) ) + 50 ;  
$posy_t=70 +  (60 * $f) ;
$posx_t= $posx_i + 20 ;

$t .= '<image xlink:href="' . mysql_result($res,$x,"foto") . '" id="jugador' . $x .'" height="30" width="40"  y="' . $posy_i . '" x="' . $posx_i .'"/> ' . chr(13) . chr(10) ;
$t .= '<text  xml:space="preserve" text-anchor="middle" font-family="serif" font-size="6" id="svg_' . $x .'" y="' . $posy_t .'" x="' . $posx_t .'" stroke-width="0" stroke="#000000" fill="#0000FF">' . utf8_encode(mysql_result($res,$x,"nombre")) ." (". utf8_encode(mysql_result($res,$x,"posicion")) .')</text>' . chr(13) . chr(10) ;
}
}

$t .= ' </g> ' . chr(13) . chr(10) ;
$t .= ' </svg> ' . chr(13) . chr(10) ;
 
// Capçalera fitxer XML a generar


header("Content-type: text/xml; charset=utf-8"); // Capçalera de fitxer XML
echo $t ;
?>