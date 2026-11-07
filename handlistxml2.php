<?php
$id=$_GET['id'];

if (isset($id)){
	
	
$xml='<handlist>'.PHP_EOL.PHP_EOL;

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db12;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

	$typ=substr($id,0,1);
	$col=substr($id,1);
	

$sqlQueryl = "SELECT * FROM catalog WHERE rktsTyp LIKE '$typ' AND coll LIKE '$col' ORDER BY rnb";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();


foreach ($resultats as $res)
{
	$ref=$res['ref'];
	$xml .='<item>'.PHP_EOL;	
	$xml .='<ref>'.$res['ref'].'</ref>'.PHP_EOL;
	$xml .='<tib>'.$res['tib'].'</tib>'.PHP_EOL;
$sqlQueryl2 = "SELECT * FROM locations WHERE ref LIKE '$ref' ORDER BY vol";
	$resultatl2 = $mysqlClient->prepare($sqlQueryl2);
	$resultatl2->execute();
	$resultats2 = $resultatl2->fetchAll();
	foreach ($resultats2 as $res2)
	{
		$xml .='<loc>';
		$xml .='<set>'.$res2['setid'].'</set>';
		$xml .='<vol>'.$res2['vol'].'</vol>';
		$xml .='<section>'.$res2['sec'].'</section>';
		$xml .='<page>'.$res2['debp'].$res2['debf'].$res2['debl'].'-'.$res2['finp'].$res2['finf'].$res2['finl'].'</page>';
		$xml .='</loc>'.PHP_EOL;
		
	}

	$xml .='<coloph>'.$res['coloph'].'</coloph>'.PHP_EOL;
	$xml .='</item>'.PHP_EOL.PHP_EOL;
}

	
	$xml .='</handlist>';




$fp = fopen('0.xml','w');
$write = fwrite($fp,$xml);

$file_url = '0.xml';
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");
readfile($file_url); // do the double-download-dance (dirty but worky)

header("Location: handlistxml.php");
}