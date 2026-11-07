<?php
include('../sub/unicode2.php');

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr82.world4you.com;dbname=6140636db9;charset=utf8', 'sql2575617', 'q@ix2uft');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


$txt=$_GET['txt'];
$txt1=str_replace("'","\'",$txt);
$col=$_GET['col'];


echo '<table><tr><td><a href="../index.php" style="text-decoration:none;"><img src="../sub/logo.png" width=100></a>';

echo '<td><form action="results.php">';
echo '<input type="hidden" id="col" name="col" value="D">';
echo '<input type="text" id="txt" name="txt" size=100>';
echo '<input type="submit" value="Send Request" />';
echo '</form>';

echo '<td width=50><td>';
echo '<form action="results2.php">';
echo '<input type="hidden" id="txt" name="txt" value="'.$txt.'">';
echo '<select id="col" name="col" onchange="this.form.submit()" >';
echo '<option value="xxx">---</option>';
if ($col=="D") {echo '<option value="D" selected>Derge Kanjur</option>';} else {echo '<option value="D">Derge Kanjur</option>';} 
if ($col=="H") {echo '<option value="H" selected>Lhasa Kanjur</option>';} else {echo '<option value="H">Lhasa Kanjur</option>';} 
if ($col=="J") {echo '<option value="J" selected>Lithang Kanjur</option>';} else {echo '<option value="J">Lithang Kanjur</option>';} 
if ($col=="T") {echo '<option value="T" selected>Derge Tanjur</option>';} else {echo '<option value="T">Derge Tanjur</option>';} 
if ($col=="G") {echo '<option value="G" selected>Old Tantra</option>';} else {echo '<option value="G">Old Tantra</option>';} 
echo '</select>';
echo '</form>';
echo '<td width=50><td><a hreF="results.php?txt='.$txt.'&col='.$col.'">Exact matches</a>';
echo '</table>';

if ($col=="D") {$colSeg="KanjurDerge";$colname="Derge Kanjur";}
if ($col=="H") {$colSeg="KanjurLhasa";$colname="Lhasa Kanjur";}
if ($col=="J") {$colSeg="KanjurLithang";$colname="Lithang Kanjur";}
if ($col=="T") {$colSeg="TanjurDerge";$colname="Derge Tanjur";}
if ($col=="G") {$colSeg="OldTantra";$colname="rNying rgyud";}
if ($col=="B") {$colSeg="KanjurBon";$colname="Bön Kanjur";}

echo '<h2>'.$colname.'</h2>';
echo $txt.'<hr>';



	
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
		$total=count($bout);


$ids="(";
foreach ($bout as $boutt) { $ids=$ids."'".$boutt."', ";}
$ids=substr($ids,0,-2).")";

if	($total==1) {$bout1=$bout[0];
					$bout1a=str_replace("'","\'",$bout1);
					$sqlQuery = "SELECT * FROM $colSeg WHERE text LIKE '%$bout1a%' ORDER BY vol LIMIT 100";
				}
if	($total==2) {$bout1=$bout[0];$bout2=$bout[1];
					$bout1a=str_replace("'","\'",$bout1);
					$bout2a=str_replace("'","\'",$bout2);
					$sqlQuery = "SELECT * FROM $colSeg WHERE text LIKE '%$bout1a%' and  text LIKE '%$bout2a%' ORDER BY vol LIMIT 100";
				}
if	($total==3) {$bout1=$bout[0];$bout2=$bout[1];$bout3=$bout[2];
					$bout1a=str_replace("'","\'",$bout1);
					$bout2a=str_replace("'","\'",$bout2);
					$bout3a=str_replace("'","\'",$bout3);
					$sqlQuery = "SELECT * FROM $colSeg WHERE text LIKE '%$bout1a%' and  text LIKE '%$bout2a%' and  text LIKE '%$bout3a%' ORDER BY vol LIMIT 100";
				}
if	($total==4) {$bout1=$bout[0];$bout2=$bout[1];$bout3=$bout[2];$bout4=$bout[3];
					$bout1a=str_replace("'","\'",$bout1);
					$bout2a=str_replace("'","\'",$bout2);
					$bout3a=str_replace("'","\'",$bout3);
					$bout4a=str_replace("'","\'",$bout4);
					$sqlQuery = "SELECT * FROM $colSeg WHERE text LIKE '%$bout1a%' and  text LIKE '%$bout2a%' and text LIKE '%$bout3a%' and text LIKE '%$bout4a%' ORDER BY vol LIMIT 100";
				}
if	($total>4) {$bout1=$bout[0];$bout2=$bout[1];$bout3=$bout[2];$bout4=$bout[3];$bout5=$bout[4];
					$bout1a=str_replace("'","\'",$bout1);
					$bout2a=str_replace("'","\'",$bout2);
					$bout3a=str_replace("'","\'",$bout3);
					$bout4a=str_replace("'","\'",$bout4);
					$bout5a=str_replace("'","\'",$bout5);
					$sqlQuery = "SELECT * FROM $colSeg WHERE text LIKE '%$bout1a%' and  text LIKE '%$bout2a%' and text LIKE '%$bout3a%' and text LIKE '%$bout4a%' and text LIKE '%$bout5a%'ORDER BY vol LIMIT 100";
				}
	


$resultat = $mysqlClient->prepare($sqlQuery);
$resultat->execute();
$resultats = $resultat->fetchAll();
foreach ($resultats as $res) {
	$rest=$res["text"];
	$jepr=0;
if	($total==2) {
	if (strpos($rest,$bout1)<strpos($rest,$bout2)){
	$jepr=1;
}}
if	($total==3) {
	if (strpos($rest,$bout1)<strpos($rest,$bout2) AND strpos($rest,$bout2)<strpos($rest,$bout3)){
	$jepr=1;
}}	
if	($total==4) {
	if (strpos($rest,$bout1)<strpos($rest,$bout2) AND strpos($rest,$bout2)<strpos($rest,$bout3) AND strpos($rest,$bout3)<strpos($rest,$bout4)){
	$jepr=1;
}}	
if	($total>4) {
	if (strpos($rest,$bout1)<strpos($rest,$bout2) AND strpos($rest,$bout2)<strpos($rest,$bout3) AND strpos($rest,$bout3)<strpos($rest,$bout4) AND strpos($rest,$bout4)<strpos($rest,$bout5)){
	$jepr=1;
}}	

if ($jepr==1){
	
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

		$roug=str_replace($bout1,'<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$bout1.'</span>',$res["text"]);
		$roug=str_replace($bout2,'<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$bout2.'</span>',$roug);
		$roug=str_replace($bout3,'<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$bout3.'</span>',$roug);
		$roug=str_replace($bout4,'<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$bout4.'</span>',$roug);
		$roug=str_replace($bout5,'<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$bout5.'</span>',$roug);
			$rougu=str_replace($bout1u,'<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$bout1u.'</span>',$txtuni);
		$rougu=str_replace($bout2u,'<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$bout2u.'</span>',$rougu);
		$rougu=str_replace($bout3u,'<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$bout3u.'</span>',$rougu);
		$rougu=str_replace($bout4u,'<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$bout4u.'</span>',$rougu);
		$rougu=str_replace($bout5u,'<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$bout5u.'</span>',$rougu);
	
	$volr=$res["vol"];
	$secr=$res["sec"];
	$secr=str_replace("'","\'",$secr);
	$pagr=$res["pag"];
	$pgbr=$res["pgbreak"];
	



	$sqlQueryr = "SELECT * FROM LocationDergeKanjur WHERE finvol LIKE '$volr' AND finsec LIKE '$secr' AND finpag LIKE '$pagr'";
		$resultatr = $mysqlClient->prepare($sqlQueryr);
		$resultatr->execute();
		$resultatsr = $resultatr->fetchAll();
	
	$refr=$res["ref"];
	foreach($resultatsr as $resr) { echo $resr["ref"].'<br>';}
	
	
	$imgcol=$col;
	if ($col=="D") {$imgclass=1;$imgset="MW22084";
			$chemc="../data/Collections/D Derge Kanjur/D.xml";
			$xmlc=simplexml_load_file($chemc);
			foreach($xmlc->item as $itemc){ if (strcmp($itemc->ref,$refr)==0) {$rktsc=$itemc->rkts;$txttitle=$itemc->tib;}}
			$typ=1;
			}
	if ($col=="J") {$imgclass=1;$imgset="MW4CZ7445";
			$chemc="../data/Collections/J Lithang Kanjur/J.xml";
			$xmlc=simplexml_load_file($chemc);
			foreach($xmlc->item as $itemc){ if (strcmp($itemc->ref,$refr)==0) {$rktsc=$itemc->rkts;$txttitle=$itemc->tib;}}
			$typ=1;
			}
	if ($col=="H") {$imgclass=1;$imgset="MW26071";
			$chemc="../data/Collections/H Lhasa Kanjur/H.xml";
			$xmlc=simplexml_load_file($chemc);
			foreach($xmlc->item as $itemc){ if (strcmp($itemc->ref,$refr)==0) {$rktsc=$itemc->rkts;$txttitle=$itemc->tib;}}
			$typ=1;
			}
	if ($col=="T") {$imgclass=2;$imgset="MW23703";$imgcol="D";
			$chemc="../data/Collections/D Derge Tanjur/D.xml";
			$xmlc=simplexml_load_file($chemc);
			foreach($xmlc->item as $itemc){ if (strcmp($itemc->ref,$refr)==0) {$rktsc=$itemc->rktst;$txttitle=$itemc->tib;}}
			$typ=2;
			}
	if ($col=="G") {$imgclass=3;$imgset="MW1KG14783";$imgcol="Gpb";
			$chemc="../data/Collections/Gpb snga 'gyur rgyud 'bum phyogs bsgrigs/Gpb.xml";
			$xmlc=simplexml_load_file($chemc);
			foreach($xmlc->item as $itemc){ if (strcmp($itemc->ref,$refr)==0) {$rktsc=$itemc->rktsg;$txttitle=$itemc->tib;}}
			$typ=3;
			}
	$imgvol=$res["vol"];
	$imgsec=$res["sec"];
	$imgpag=substr($pagr,0,-1);
	
	echo '<a href="../cat.php?id='.$rktsc.'&typ='.$typ.'" target="_blank">';
	echo $refr.'</a> - <i>'.$txttitle.'</i><br>';
	echo 'Location: '.$pagr.'<p style="font-size:30px;">'.$rougu.'</p><p style="font-size:20px;">'.$roug.' </p>';
	

if ($col!="B") {	echo '<br><table style="border: 1px solid;border-radius: 1em;"><tr>';
	echo '<td width=50><td valign="top">Context <a href="context.php?id='.$res["vol"].'|'.$res["segno"].'|'.$txt.'|2|'.$col.'" target="_blank"><img style="vertical-align: text-top;" src="context.png" height=20></a>';
	echo '<td width=50><td valign="top"> Images <a href="../images.php?id='.$imgclass.'|'.$imgcol.'|'.$imgset.'|I'.$imgvol.'|'.$imgsec.'|'.$imgpag.'" target="_blank"><img style="vertical-align: text-top;" src="img.png" height=20></a>&nbsp&nbsp&nbsp<a href="duo.php?id='.$imgclass.'|'.$imgcol.'|'.$imgset.'|I'.$imgvol.'|'.$imgsec.'|'.$imgpag.'" target="_blank"><img style="vertical-align: text-top;" src="imgtxt.png" height=30></a>';
	echo '<td width=50><td valign="top">E-text <a href="complete.php?id='.$refr.'&coll='.$col.'" target="_blank"><img style="vertical-align: text-top;" src="text.png" height=20></a>';
		echo '<td width=50></table><hr>';
}
if ($col=="B") {echo '<br><br>rKTs can not display the images here. Please refer to the <a href="https://library.bdrc.io/show/bdr:MW4PD502?tabs=bdr:W4PD502" target="_blank">BDRC website</a><hr>';}


	




/*	
	echo $res["ref"].'<br>'.$res["segno"].'-'.$roug.' ';
	echo '<a href="context.php?id='.$res["ref"].'|'.$res["segno"].'|'.$txt.'|2" target="_blank">context</a>';
		echo '<hr>';*/
}
}


