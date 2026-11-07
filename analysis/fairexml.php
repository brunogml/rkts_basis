<?php

$col="Dm";

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db12;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

	$sqlQueryl = "SELECT * FROM catalog WHERE coll LIKE '$col'";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
foreach($resultats as $ress){
	
	echo '&#x3c;item>&#x3c;rkts>'.$ress["rkts"].'&#x3c;/rkts>&#x3c;ref>'.$ress["ref"].'&#x3c;/ref>&#x3c;/item><br>';
	
}