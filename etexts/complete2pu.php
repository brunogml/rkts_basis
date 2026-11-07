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
<input type="button" onclick="location.href=\'complete2u.php?id='.$id.'&coll='.$col.'\';" value="hide page break" />
<td width=150><td>
<input type="button" onclick="location.href=\'complete2lu.php?id='.$id.'&coll='.$col.'\';" value="show line break" />

<td width=150><td>
<a href="complete2p.php?coll='.$col.'&id='.$id.'" style=font-size:15px;">Wylie</a><td width=150><td>'.$comment.'</table><hr><p style="font-size:18px;">';



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

$pagecour1="";
$second="";



$sqlQuery = "SELECT * FROM $colSeg WHERE vol LIKE '$vol'";
$resultat = $mysqlClient->prepare($sqlQuery);
$resultat->execute();
$resultats = $resultat->fetchAll();
foreach ($resultats as $res)
{
	$ligne=$res["pag"];
	if (substr($ligne,-2,1)==1 or substr($ligne,-2,1)==2 or substr($ligne,-2,1)==3) {$pag=substr($ligne,0,-3);$fol=substr($ligne,-3,1);$lin=substr($ligne,-2);}
	else {$pag=substr($ligne,0,-2);$fol=substr($ligne,-2,1);$lin=substr($ligne,-1);}
	$pagecour=$pag.$fol;
		$imgcol=$col;
	if ($col=="D") {$imgclass=1;$imgset="MW22084";}
	if ($col=="J") {$imgclass=1;$imgset="MW4CZ7445";}
	if ($col=="H") {$imgclass=1;$imgset="MW26071";}
	if ($col=="S") {$imgclass=1;$imgset="MW22083";}
	if ($col=="T") {$imgclass=2;$imgset="MW23703";$imgcol="D";}
	if ($col=="N") {$imgclass=2;$imgset="MW22704";}
	if ($col=="G") {$imgclass=3;$imgset="MW1KG14783";$imgcol="Gpb";}
	$imgvol=$res["vol"];
	$imgsec=$res["sec"];
	
		if ($pag==$debp and $debf=="a" and $fol=="a" and $lin>=$debl)
		{	
			if ($pagecour!=$pagecour1) {echo '<br><br><span style="font-size:15px;"><a href="../images.php?id='.$imgclass.'|'.$imgcol.'|'.$imgset.'|I'.$imgvol.'|'.$imgsec.'|'.$pagecour.'" target="_blank">'.$pagecour.'</a></span><br>';}
			$bout1=substr($res["text"],0,$res["pgbreak"]);
			$bout2=substr($res["text"],$res["pgbreak"]);
			unicode($second); unicode($bout1);
			echo '<span style="font-size:25px;">'.$second.$bout1.'་</span>';
			$pagecour1=$pagecour;
			$second=$bout2;
		}
		if ($pag==$debp and $debf=="a" and $fol=="b")
		{	
			if ($pagecour!=$pagecour1) {echo '<br><br><span style="font-size:15px;"><a href="../images.php?id='.$imgclass.'|'.$imgcol.'|'.$imgset.'|I'.$imgvol.'|'.$imgsec.'|'.$pagecour.'" target="_blank">'.$pagecour.'</a></span><br>';}
			$bout1=substr($res["text"],0,$res["pgbreak"]);
			$bout2=substr($res["text"],$res["pgbreak"]);
			unicode($second); unicode($bout1);
			echo '<span style="font-size:25px;">'.$second.$bout1.'་</span>';
			$pagecour1=$pagecour;
			$second=$bout2;
		}
		if ($pag==$debp and $debf=="b" and $fol=="b" and $lin>=$debl)
		{	
			if ($pagecour!=$pagecour1) {echo '<br><br><span style="font-size:15px;"><a href="../images.php?id='.$imgclass.'|'.$imgcol.'|'.$imgset.'|I'.$imgvol.'|'.$imgsec.'|'.$pagecour.'" target="_blank">'.$pagecour.'</a></span><br>';}
			$bout1=substr($res["text"],0,$res["pgbreak"]);
			$bout2=substr($res["text"],$res["pgbreak"]);
			unicode($second); unicode($bout1);
			echo '<span style="font-size:25px;">'.$second.$bout1.'་</span>';
			$pagecour1=$pagecour;
			$second=$bout2;
		}


	
		if ($pag>$debp and $pag<$finp)
		{
			if ($pagecour!=$pagecour1) {echo '<br><br><span style="font-size:15px;"><a href="../images.php?id='.$imgclass.'|'.$imgcol.'|'.$imgset.'|I'.$imgvol.'|'.$imgsec.'|'.$pagecour.'" target="_blank">'.$pagecour.'</a></span><br>';}
			$bout1=substr($res["text"],0,$res["pgbreak"]);
			$bout2=substr($res["text"],$res["pgbreak"]);
			unicode($second); unicode($bout1);
			echo '<span style="font-size:25px;">'.$second.$bout1.'་</span>';
			$pagecour1=$pagecour;
			$second=$bout2;
		}



		if ($pag==$finp and $finf=="b" and $fol=="b" and $lin<=$finl)
		{
			if ($pagecour!=$pagecour1) {echo '<br><br><span style="font-size:15px;"><a href="../images.php?id='.$imgclass.'|'.$imgcol.'|'.$imgset.'|I'.$imgvol.'|'.$imgsec.'|'.$pagecour.'" target="_blank">'.$pagecour.'</a></span><br>';}
			$bout1=substr($res["text"],0,$res["pgbreak"]);
			$bout2=substr($res["text"],$res["pgbreak"]);
			unicode($second); unicode($bout1);
			echo '<span style="font-size:25px;">'.$second.$bout1.'་</span>';
			$pagecour1=$pagecour;
			$second=$bout2;
		}
		if ($pag==$finp and $finf=="b" and $fol=="a")
		{
			if ($pagecour!=$pagecour1) {echo '<br><br><span style="font-size:15px;"><a href="../images.php?id='.$imgclass.'|'.$imgcol.'|'.$imgset.'|I'.$imgvol.'|'.$imgsec.'|'.$pagecour.'" target="_blank">'.$pagecour.'</a></span><br>';}
			$bout1=substr($res["text"],0,$res["pgbreak"]);
			$bout2=substr($res["text"],$res["pgbreak"]);
			unicode($second); unicode($bout1);
			echo '<span style="font-size:25px;">'.$second.$bout1.'་</span>';
			$pagecour1=$pagecour;
			$second=$bout2;
		}
		if ($pag==$finp and $finf=="a" and $fol=="a" and $lin<=$finl)
		{
			if ($pagecour!=$pagecour1) {echo '<br><br><span style="font-size:15px;"><a href="../images.php?id='.$imgclass.'|'.$imgcol.'|'.$imgset.'|I'.$imgvol.'|'.$imgsec.'|'.$pagecour.'" target="_blank">'.$pagecour.'</a></span><br>';}
			$bout1=substr($res["text"],0,$res["pgbreak"]);
			$bout2=substr($res["text"],$res["pgbreak"]);
			unicode($second); unicode($bout1);
			echo '<span style="font-size:25px;">'.$second.$bout1.'་</span>';
			$pagecour1=$pagecour;
			$second=$bout2;
		}
			
		
}
?>
<br><br><a href="javascript:window.close();">CLOSE WINDOW</a>

