<?php

$lefich="https://raw.githubusercontent.com/brunogml/Tibetan_Canon/refs/heads/main/Derge_Kanjur/004.txt";



  $fichier = file($lefich);
    $total = count($fichier);

    for($i = 0; $i < $total; $i++) {
    echo nl2br($fichier[$i]);
	}