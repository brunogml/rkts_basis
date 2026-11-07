<style>
.hidden {
  display: none;
}
</style>
<a href="javascript:window.close();">CLOSE WINDOW</a>
<br><br>
<?php
include('../sub/unicode2.php');

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db12;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$id=$_GET['id'];
$col=$_GET['coll'];

$sqlQuery = "SELECT * FROM catalog WHERE ref LIKE '$id' LIMIT 1";
$resultat = $mysqlClient->prepare($sqlQuery);
$resultat->execute();
$resultats = $resultat->fetchAll();

$comment="";
if ($col=="D") {$colSeg="KanjurDerge"; $comment='e-texts based on the Esukhia Input <a href="https://github.com/OpenPecha-Data/P000001" target="_blank"><img src="../sub/link.png" width=20></a>';}
if ($col=="H") {$colSeg="KanjurLhasa"; $comment='e-texts based on the ACIP/ALL <img src="../data/scanner/ALL.png" width=70> Input <a href="https://asianlegacylibrary.org/library/" target="_blank"><img src="../sub/link.png" width=20>';}
if ($col=="J") {$colSeg="KanjurLithang"; $comment='e-texts based on the Adarsha <img src="../data/scanner/Adarsha.png" width=40> Input <a href="https://online.adarshah.org/index.html?kdb=jiangkangyur&sutra=J1&page=1-1b" target="_blank"><img src="../sub/link.png" width=20>';}
if ($col=="S") {$colSeg="KanjurStog"; $comment='e-texts produced with ocr Programm';}
if ($col=="T") {$colSeg="TanjurDerge"; $comment='e-texts based on the ACIP/ALL <img src="../data/scanner/ALL.png" width=70> Input <a href="https://asianlegacylibrary.org/library/" target="_blank"><img src="../sub/link.png" width=20>';}
if ($col=="N") {$colSeg="TanjurNarthang"; $comment='e-texts based on the ACIP/ALL <img src="../data/scanner/ALL.png" width=70> Input <a href="https://asianlegacylibrary.org/library/" target="_blank"><img src="../sub/link.png" width=20>';}
if ($col=="G") {$colSeg="OldTantra";}

$titre=$resultats[0]["tib"];
unicode($titre);

echo $id.': <span style="font-size:25px;">'.$titre.'</span><br>';
echo '<table><tr><td>
<input type="button" onclick="location.href=\'complete2pu.php?id='.$id.'&coll='.$col.'\';" value="show page break" />
<td width=150><td>
<input type="button" onclick="location.href=\'complete2lu.php?id='.$id.'&coll='.$col.'\';" value="show line break" />

<td width=150><td>
<a href="complete.php?coll='.$col.'&id='.$id.'" style=font-size:15px;">Wylie</a><td width=150><td>'.$comment.'</table><hr><p style="font-size:18px;">';



$sqlQuery = "SELECT * FROM locations WHERE ref LIKE '$id' LIMIT 1";
$resultat = $mysqlClient->prepare($sqlQuery);
$resultat->execute();
$resultats = $resultat->fetchAll();

$vol=$resultats[0]["vol"];
$sec=$resultats[0]["sec"];
$debp=$resultats[0]["debp"];
$debf=$resultats[0]["debf"];
$debl=$resultats[0]["debl"];
$finp=$resultats[0]["finp"];
$finf=$resultats[0]["finf"];
$finl=$resultats[0]["finl"];




try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr82.world4you.com;dbname=6140636db9;charset=utf8', 'sql2575617', 'q@ix2uft');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}





$sqlQuery = "SELECT * FROM $colSeg WHERE vol LIKE '$vol'";
$resultat = $mysqlClient->prepare($sqlQuery);
$resultat->execute();
$resultats = $resultat->fetchAll();
foreach ($resultats as $res)
{
	$ligne=$res["pag"];
	if (substr($ligne,-2,1)==1 or substr($ligne,-2,1)==2 or substr($ligne,-2,1)==3) {$pag=substr($ligne,0,-3);$fol=substr($ligne,-3,1);$lin=substr($ligne,-2);}
	else {$pag=substr($ligne,0,-2);$fol=substr($ligne,-2,1);$lin=substr($ligne,-1);}
	
		if ($pag==$debp and $debf=="a" and $fol=="a" and $lin>=$debl)
		{	
			$ttxt=$res["text"].' ';
			unicode($ttxt);
			echo '<span style="font-size:25px;">'.$ttxt.'</span>';
		}
		if ($pag==$debp and $debf=="a" and $fol=="b")
		{	
			$ttxt=$res["text"].' ';
			unicode($ttxt);
			echo '<span style="font-size:25px;">'.$ttxt.'</span>';
		}
		if ($pag==$debp and $debf=="b" and $fol=="b" and $lin>=$debl)
		{	
			$ttxt=$res["text"].' ';
			unicode($ttxt);
			echo '<span style="font-size:25px;">'.$ttxt.'</span>';
		}
	
		if ($pag>$debp and $pag<$finp)
		{
			$ttxt=$res["text"].' ';
			unicode($ttxt);
			echo '<span style="font-size:25px;">'.$ttxt.'</span>';
		}
		if ($pag==$finp and $finf=="b" and $fol=="b" and $lin<=$finl)
		{
			$ttxt=$res["text"].' ';
			unicode($ttxt);
			echo '<span style="font-size:25px;">'.$ttxt.'</span>';
		}
		if ($pag==$finp and $finf=="b" and $fol=="a")
		{
			$ttxt=$res["text"].' ';
			unicode($ttxt);
			echo '<span style="font-size:25px;">'.$ttxt.'</span>';
		}
		if ($pag==$finp and $finf=="a" and $fol=="a" and $lin<=$finl)
		{
			$ttxt=$res["text"].' ';
			unicode($ttxt);
			echo '<span style="font-size:25px;">'.$ttxt.'</span>';
		}
			
		
}
?>
<br><br><a href="javascript:window.close();">CLOSE WINDOW</a>

