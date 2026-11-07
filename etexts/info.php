<?php

$fichier='info/'.$_GET['fich'].'.txt';
$fich=$_GET['fich'];

echo '<h1>History of the e-texts '.substr($fich,0,-3).' volume '.substr($fich,-3).'</h1>';


$lignes = file($fichier, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

if ($lignes !== false) {
  $lignes = array_reverse($lignes);
  foreach ($lignes as $ligne) {
    echo $ligne . "<br>";
  }
} else {
  echo "Erreur lors de la lecture du fichier.";
}