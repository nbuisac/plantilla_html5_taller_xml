<?php
$xmlDoc = new DOMDocument();  // Creem l'objecte DOM
$xmlDoc->load("http://nbuisac.netne.net/unitat2/minerals_simple.xml");  // Llegim el fitxer XML

$x = $xmlDoc->documentElement;  // Ens situem a l'arrel del Document
foreach ($x->childNodes AS $item) {  // Anem agafant cada nodeName

echo $item->nodeName . " = " . $item->nodeValue . "<br />";  // Legim tot el node de cop
foreach ($item->childNodes as $subNode)       // Recorrem tot el node element a element
         {
           echo "Node name: ".$subNode->nodeName."<br />";
           echo "Node value: ".$subNode->nodeValue. "<br />";
            }
           echo $item->nodeName . " = " . $item->nodeValue . "<br />";
  }

?>