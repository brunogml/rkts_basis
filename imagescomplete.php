

<?php

$id=$_GET['id'];
$set=$_GET['set'];
$volcur=$_GET['volcur'];
if ($volcur=="") {$volcur=0;}

try
{
$mysqlClient1  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db12;charset=utf8', 'sql4629280', 'aku@5mp7');
$mysqlClient2  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db11;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

	$sqlQueryl = "SELECT * FROM locations WHERE ref LIKE '$id' AND setid LIKE '$set'";
	$resultatl = $mysqlClient1->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();

if (count($resultats)>1) {
	echo 'text in '.count($resultats).' volumes<br><br>';
for ($x = 0; $x < count($resultats); $x++) {
	$volcur1=$x+1;
	if ($volcur==$x) { echo '<span style="color:red;border: 2px solid red;border-radius: 5px;padding:3px;">volume '.$volcur1.'</span> - ';}
	else {echo '<a href="imagescompleteess.php?id='.$id.'&coll='.$col.'&set='.$set.'&volcur='.$x.'">volume '.$volcur1.' </a> - ';}
}
echo '<br><br>';
	}
	

$res=$resultats[$volcur];

	
	$vol=$res['vol'];
	$sec=$res['sec'];
	$deb=$res['debp'].$res['debf'];
	$fin=$res['finp'].$res['finf'];
	
	$sql1 = "SELECT * FROM Sets WHERE S_Ref LIKE '$set' LIMIT 1";
	$res1= $mysqlClient2->prepare($sql1);
	$res1->execute();
	$ress1= $res1->fetchAll();
	
	$collno=$ress1[0]['C_ID'];

	$sql1 = "SELECT * FROM Collections WHERE id LIKE '$collno' LIMIT 1";
	$res1= $mysqlClient2->prepare($sql1);
	$res1->execute();
	$ress1= $res1->fetchAll();
	
$chemin="data/Collections/".$ress1[0]['C_Sigla']." ".$ress1[0]['C_Name']."/".substr($set,2)."/".$vol.".json";

	$json=file_get_contents($chemin);
	$jsona=json_decode($json,true);
	
	$debd=0;
	$find=0;
	
	foreach($jsona as $ligne)
	{
		if (strcmp($ligne['pagination'],$deb)==0) {$debd=1;}

			if ($debd==1 AND $find==0) { 
					echo '<br>'.$ligne['pagination'].'<br>';
					echo '<a href="https://iiif.bdrc.io/'.$ligne['file'].'/full/max/0/default.png" target="_blank"><img src="https://iiif.bdrc.io/'.$ligne['file'].'/full/max/0/default.png" style="width:95%"></a>';
					
					}


		if (strcmp($ligne['pagination'],$fin)==0) {$find=1;}
	}		


	

