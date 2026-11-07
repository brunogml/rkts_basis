<?php

$typ="K";

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db12;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

	$sqlQueryl = "SELECT * FROM rkts WHERE rkts < 500 AND rktsTyp LIKE '$typ' ORDER BY rkts";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
	
	foreach ($resultats as $res)
	{
		$ress=$res['rkts'];
	$sqlQueryl1 = "SELECT * FROM catalog WHERE rkts LIKE '$ress' AND rktsTyp LIKE '$typ' ORDER BY rkts";
	$resultatl1 = $mysqlClient->prepare($sqlQueryl1);
	$resultatl1->execute();
	$resultats1 = $resultatl1->fetchAll();
	
	echo '##item>##rkts>'.$typ.$res['rkts'].'##/rkts><br>';
	foreach ($resultats1 as $res1){ echo '##ref>'.$res1['ref'].'##/ref><br>';}
	echo '##/item><br><br>';
	
	}
