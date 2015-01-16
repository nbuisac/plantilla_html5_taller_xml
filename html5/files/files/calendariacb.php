<?php
if (isset($_GET['jornada'])) {
	$jornada = $_GET['jornada'];
}
else {
	$jornada = "8";
}
$sx = simplexml_load_file('calendariacb.xml'); // Carrega el fitxer XML com un objecte
foreach($sx->xpath('//calendariacb[jornada=$jornada]') as $item) // Carrega filtrant amb XPath els nodes miner amb id=1 i fa un bucle que recorre tots els nodes seleccionats
{
echo $item->data . "<br>";
}
?>