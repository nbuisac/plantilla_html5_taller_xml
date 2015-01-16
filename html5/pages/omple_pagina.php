<?php
include_once "../lib/llibreria.php";    // cridem a la llibreria
connectar();       // Fem la connexió a la BD

$pagina=mysql_real_escape_string($_REQUEST["pag"]);  // lleguim el numero de pagina i apliquem filtre de seguretat

$sql = "SELECT * FROM pagines Where id = $pagina  ";    // Consulta especifica per la pagina que volem retornar
$res = mysql_query($sql);   // executa la consulta escollida
$tipus = mysql_result($res,0,"tipus");

switch ( $tipus)
{
case 'Iframe' :    //Opció per afegir un Iframe
   $t = stripslashes(mysql_result($res,0,text)) ;
   echo $t ;
   break;
case 'Php' :   // Opció per executar una pagina php ja existent
   include stripslashes("../".mysql_result($res,0,text)) ;
   break;
}
?>