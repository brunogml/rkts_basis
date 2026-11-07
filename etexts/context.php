<?php

include('../sub/unicode2.php');

$id=$_GET['id'];
$vol=explode("|",$id)[0];
$segno=explode("|",$id)[1];
$txt=explode("|",$id)[2];
$typ=explode("|",$id)[3];
$col=explode("|",$id)[4];
$txt1=str_replace("'","\'",$txt);


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

$s1=$segno-10;
$s2=$segno+10;


echo 'Volume: '.$vol.' - ';
$sqlQuery = "SELECT * FROM $colSeg WHERE segno = '$s1' AND vol LIKE '$vol'";
$resultat = $mysqlClient->prepare($sqlQuery);
$resultat->execute();
$resultats = $resultat->fetchAll();
echo $resultats[0]["pag"].'-';
$sqlQuery = "SELECT * FROM $colSeg WHERE segno = '$s2' AND vol LIKE '$vol'";
$resultat = $mysqlClient->prepare($sqlQuery);
$resultat->execute();
$resultats = $resultat->fetchAll();
echo $resultats[0]["pag"];

echo '<hr>';

$sqlQuery = "SELECT * FROM $colSeg WHERE segno > '$s1' AND segno < '$s2' AND vol LIKE '$vol'";
$resultat = $mysqlClient->prepare($sqlQuery);
$resultat->execute();
$resultats = $resultat->fetchAll();
$txtfin="";
$txtfinuni="";
foreach ($resultats as $res)
{
	if ($typ==1){
		$roug=str_replace($txt,'<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$txt.'</span>',$res["text"]);
			$txtt=$txt;
			unicode($txtt);
			$txtuni=$res["text"];
			unicode($txtuni);
			$rouguni=str_replace($txtt,'<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$txtt.'</span>',$txtuni);
			$txtfin=$txtfin.' '.$roug;
			$txtfinuni=$txtfinuni.' '.$rouguni;

	}
	if ($typ==2) {
		$natlang=simplexml_load_file('../data/natlang.xml');
		$text1=$txt.' ';
		$text1=str_replace("  "," ",$text1);
		foreach($natlang->item as $item) {$text1=str_replace($item,"#",$text1);}
		$text1=str_replace("##","#",$text1);
		$text1=str_replace("##","#",$text1);
		$text1=str_replace("##","#",$text1);
		$text1=str_replace("##","#",$text1);
		if (substr($text1,-1)=="#") {$text1=substr($text1,0,-1);}
		$bout=explode('#',$text1);
				$bout1=$bout[0];$bout2=$bout[1];$bout3=$bout[2];$bout4=$bout[3];$bout5=$bout[4];
				$roug=str_replace($bout1,'<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$bout1.'</span>',$res["text"]);
				$roug=str_replace($bout2,'<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$bout2.'</span>',$roug);
				$roug=str_replace($bout3,'<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$bout3.'</span>',$roug);
				$roug=str_replace($bout4,'<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$bout4.'</span>',$roug);
				$roug=str_replace($bout5,'<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$bout5.'</span>',$roug);
	$bout1u=$bout1;
	unicode($bout1u);
	$bout2u=$bout2;
	unicode($bout2u);
	$bout3u=$bout3;
	unicode($bout3u);
	$bout4u=$bout4;
	unicode($bout4u);
	$bout5u=$bout5;
	unicode($bout5u);
	$txtuni=$res["text"];
	unicode($txtuni);
			$rougu=str_replace($bout1u,'<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$bout1u.'</span>',$txtuni);
		$rougu=str_replace($bout2u,'<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$bout2u.'</span>',$rougu);
		$rougu=str_replace($bout3u,'<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$bout3u.'</span>',$rougu);
		$rougu=str_replace($bout4u,'<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$bout4u.'</span>',$rougu);
		$rougu=str_replace($bout5u,'<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$bout5u.'</span>',$rougu);
			$txtfin=$txtfin.' '.$roug;
			$txtfinuni=$txtfinuni.' '.$rougu;



	}
	
}
	echo '<p style="font-size:30px;">'.$txtfinuni.'</p><p style="font-size:20px;">'.$txtfin.' </p>';

?>

<br><br><a href="javascript:window.close();">CLOSE WINDOW</a>'