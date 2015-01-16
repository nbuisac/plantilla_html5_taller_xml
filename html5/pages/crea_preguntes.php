<?php
include_once "../lib/llibreria.php";    // cridem a la llibreria
connectar(); 

$bd[0] = "minerals"; 
$bd[1] = "jugadorsacb"; 

if (isset($_REQUEST["bd"])) $bd=$_REQUEST["bd"];
else $bd=$bd[rand(0,1)]; 

switch ($bd) {
    case "minerals" :
        $res= mysql_query("SELECT nom,foto FROM minerals ORDER BY RAND() LIMIT 3 "); 
		$frase= "Identifica aquest mineral"; 
        break;
    case "jugadorsacb" : 
	     $res= mysql_query("SELECT nombre,foto FROM jugadorsacb ORDER BY RAND() LIMIT 3");
		 $frase= "Identifica aquest jugador de l'ACB: "; 
	break;
	}
	
$t = "<?xml version=\"1.0\" encoding=\"utf-8\" ?>" .chr(13).chr(10) ;  // Primera línia d'un fitxer XML 
$t .='<preguntes>' . chr(13) . chr(10) ; // etiqueta arrel

$t .='<pregunta>' . chr(13) . chr(10) ; // etiqueta inici pregunta
$t .='<enunciat>' . $frase . '</enunciat>' .  chr(13) . chr(10) ; // etiqueta enunciat
$t .= '<foto>' . mysql_result($res,0,1) . '</foto>'. chr(13) . chr(10) ; // foto de la pregunta 

// omplim la matriu amb les possibles respostes i la resposta correcta 
$resposta[0] = (mysql_result($res,0,0));  // Omplim les respostes en una array per poder ordenar aleatoriament, 
$resposta[1] = mysql_result($res,1,0);  // no surti sempre correcta la primera  
$resposta[2] = mysql_result($res,2,0); 
$correcta = mysql_result($res,0,0);   // Sempre agafem com a correcta el primer element que 

shuffle($resposta);  // ordena de manera aleatoria les possibles respostes 


// Mostrarem 3 respostes només una serà  la correcta 
for($x=0; $x < 3 ;$x++) // Bucle per recòrrer tots els registres
{
$t .= '<resposta' . ($x+1) . '>' ; // Obrim node de cada mineral
$t .= $resposta[$x];     // Escrivim la resposta que hem afegit a la matriu
$t .= '</resposta' . ($x+1) . '>' .  chr(13) . chr(10) ; // Tanquem etiqueta de  resposta
}

$t .= '<correcta>' . $correcta . "</correcta>" . chr(13) . chr(10) ; // Tanquem el node de cada mineral
$t .="</pregunta>" . chr(13) . chr(10) ; // Tanquem l'etiqueta arrel final

$t .="</preguntes>"  ; // Tanquem l'etiqueta arrel final

header("Content-type: text/xml; charset=ISO-8859-1"); // Capçalera de fitxer XML
echo $t ;
?>