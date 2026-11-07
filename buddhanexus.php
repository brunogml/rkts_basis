<?php
ERROR HERE

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db12;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

	$sqlQueryl = "SELECT * FROM locations WHERE ref LIKE 'Gpb%'";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$locations = $resultatl->fetchAll();

	$sqlQueryl = "SELECT * FROM catalog WHERE coll LIKE 'Gpb' ORDER BY rnb";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();

foreach($resultats as $res){
	
	echo 'G'.$res['rkts'].'####'.$res['ref'];
	foreach($locations as $loc)
	{
		if ($loc['ref']==$res['ref']) {echo '####'.$loc['vol'].'####'.$loc['sec'].'####'.$loc['debp'].$loc['debf'].$loc['debl'].'-'.$loc['finp'].$loc['finf'].$loc['finl'];}
	}
	echo '####'.$res['tib'].'<br>';
}

