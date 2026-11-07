<style>
.hidden {
  display: none;
}
</style>
<a href="javascript:window.close();">CLOSE WINDOW</a>
<br><br>
<?php

$id=$_GET['id'];
$col=$_GET['coll'];

echo $id.'<br>';
echo '<table><tr><td>
<input type="button" onclick="location.href=\'complete.php?id='.$id.'&coll='.$col.'\';" value="hide line break" />
<td width=150><td>
<input type="button" onclick="location.href=\'completep.php?id='.$id.'&coll='.$col.'\';" value="show page break" />
<td width=150><td>
<a href="completeu.php?coll='.$col.'&id='.$id.'" style=font-size:25px;">བོད་ཡིག</a></table><hr><p style="font-size:18px;">';



try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr82.world4you.com;dbname=6140636db9;charset=utf8', 'sql2575617', 'q@ix2uft');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


if ($col=="D") {$colSeg="KanjurDerge";}
if ($col=="H") {$colSeg="KanjurLhasa";}
if ($col=="J") {$colSeg="KanjurLithang";}
if ($col=="S") {$colSeg="KanjurStog";}
if ($col=="T") {$colSeg="TanjurDerge";}
if ($col=="G") {$colSeg="OldTantra";}

$refm=substr($id,1);
$sqlQuery = "SELECT * FROM LocationDergeKanjur WHERE ref LIKE '$refm' LIMIT 1";
$resultat = $mysqlClient->prepare($sqlQuery);
$resultat->execute();
$resultats = $resultat->fetchAll();
$finloc=$resultats[0]['finloc'];
$enplus=$resultats[0]["finpag"];
$debloc=$resultats[0]['debloc'];
$debpag=$resultats[0]["debpag"];





$sqlQuery = "SELECT * FROM $colSeg WHERE ref LIKE '$id' ORDER BY vol, segno";
$resultat = $mysqlClient->prepare($sqlQuery);
$resultat->execute();
$resultats = $resultat->fetchAll();
$tamp="";
$dern="";
foreach ($resultats as $res)
{
	if (strcmp($res["pag"],$debpag)==0) {$couper=$debloc;} else {$couper=0;}
	if ($res["pgbreak"]!=0) {$tamp1=substr($res["text"],$res["pgbreak"]);$rest=substr($res["text"],0,$res["pgbreak"]);}
	else {$tamp1="";$rest=$res["text"];}
	$ligne=$tamp.$rest;
	
		$imgcol=$col;
	if ($col=="D") {$imgclass=1;$imgset="MW22084";}
	if ($col=="J") {$imgclass=1;$imgset="MW4CZ7445";}
	if ($col=="H") {$imgclass=1;$imgset="MW26071";}
	if ($col=="T") {$imgclass=2;$imgset="MW23703";$imgcol="D";}
	if ($col=="G") {$imgclass=3;$imgset="MW1KG14783";$imgcol="Gpb";}
	$imgvol=$res["vol"];
	$imgsec=$res["sec"];
	$imgpag=substr($res["pag"],0,-1);

	
	
	echo ' <span style="font-size:15px;"><a href="../images.php?id='.$imgclass.'|'.$imgcol.'|'.$imgset.'|I'.$imgvol.'|'.$imgsec.'|'.$imgpag.'" target="_blank">'.$res["pag"].'</a></span> '.substr($ligne,$couper).' <span style="font-size:15px;"><br></span> ';
	$tamp=$tamp1;
}
/*fin de la ligne*/
if ($res["pgbreak"]!=0) {
echo ' '.substr($res["text"],$res["pgbreak"]);
}
/*fin du texte*/
if (strcmp($enplus,$res['pag'])!=0)
{
$sqlQuery = "SELECT * FROM KanjurDerge WHERE vol LIKE '$imgvol' AND sec LIKE '$imgsec'  AND pag LIKE '$enplus' LIMIT 1";
$resultat = $mysqlClient->prepare($sqlQuery);
$resultat->execute();
$resultats = $resultat->fetchAll();
echo ' '.substr($resultats[0]['text'],0,$finloc);
}



?>
<br><br><a href="javascript:window.close();">CLOSE WINDOW</a>
<script>
function toggleSpans() {
  const spans = document.querySelectorAll('span'); // Get all spans

  // Loop through each span and toggle its display property
  for (const span of spans) {
    if (span.classList.contains('hidden')) {
      span.classList.remove('hidden');
    } else {
      span.classList.add('hidden');
    }
  }
}
</script>

