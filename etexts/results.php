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
echo '<form action="results.php">';
echo '<input type="hidden" id="txt" name="txt" value="'.$txt.'">';
echo '<select id="col" name="col" onchange="this.form.submit()" >';
echo '<option value="xxx">---</option>';
if ($col=="D") {echo '<option value="D" selected>Derge Kanjur</option>';} else {echo '<option value="D">Derge Kanjur</option>';} 
if ($col=="F") {echo '<option value="F" selected>Phugbrag Kanjur</option>';} else {echo '<option value="F">Phugbrag Kanjur</option>';} 
if ($col=="H") {echo '<option value="H" selected>Lhasa Kanjur</option>';} else {echo '<option value="H">Lhasa Kanjur</option>';} 
if ($col=="J") {echo '<option value="J" selected>Lithang Kanjur</option>';} else {echo '<option value="J">Lithang Kanjur</option>';} 
if ($col=="S") {echo '<option value="S" selected>Stog Kanjur</option>';} else {echo '<option value="S">Stog Kanjur</option>';} 
if ($col=="T") {echo '<option value="T" selected>Derge Tanjur</option>';} else {echo '<option value="T">Derge Tanjur</option>';} 
/*if ($col=="N") {echo '<option value="N" selected>Narthang Tanjur</option>';} else {echo '<option value="N">Narthang Tanjur</option>';} */
if ($col=="G") {echo '<option value="G" selected>Old Tantra</option>';} else {echo '<option value="G">Old Tantra</option>';} 
echo '</select>';
echo '</form>';
echo '<td width=50><td><a hreF="results2.php?txt='.$txt.'&col='.$col.'">Approximated matches</a>';
echo '</table>';

if ($col=="D") {$colSeg="KanjurDerge";$colname="Derge Kanjur";}
if ($col=="F") {$colSeg="KanjurPhugbrag";$colname="Phugbrag Kanjur";}
if ($col=="H") {$colSeg="KanjurLhasa";$colname="Lhasa Kanjur";}
if ($col=="J") {$colSeg="KanjurLithang";$colname="Lithang Kanjur";}
if ($col=="S") {$colSeg="KanjurStog";$colname="Stog Kanjur";}
if ($col=="T") {$colSeg="TanjurDerge";$colname="Derge Tanjur";}
if ($col=="T") {$colSeg="TanjurDerge";$colname="Derge Tanjur";}
if ($col=="N") {$colSeg="TanjurNarthang";$colname="Narthang Kanjur";}
if ($col=="B") {$colSeg="KanjurBon";$colname="Bön Kanjur";}

echo '<h2>'.$colname.'</h2>';
echo $txt.'<hr>';

if (isset($txt)) {
$sqlQuery = "SELECT * FROM $colSeg WHERE text LIKE '%$txt1%' ORDER BY vol, segno  LIMIT 100";
$resultat = $mysqlClient->prepare($sqlQuery);
$resultat->execute();
$resultats = $resultat->fetchAll();
foreach ($resultats as $res)
{
	$roug=str_replace($txt,'<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$txt.'</span>',$res["text"]);
	$txtt=$txt;
	unicode($txtt);
	$txtuni=$res["text"];
	unicode($txtuni);
	$rouguni=str_replace($txtt,'<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$txtt.'</span>',$txtuni);
	
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
	if ($col=="F") {$imgclass=1;$imgset="MW1KG13607";
			$chemc="../data/Collections/F Phugbrag Kanjur/F.xml";
			$xmlc=simplexml_load_file($chemc);
			foreach($xmlc->item as $itemc){ if (strcmp($itemc->ref,$refr)==0) {$rktsc=$itemc->rkts;$txttitle=$itemc->tib;}}
			$typ=1;
			}
	if ($col=="S") {$imgclass=1;$imgset="MW22083";
			$chemc="../data/Collections/S Stog Kanjur/S.xml";
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
	if ($col=="N") {$imgclass=2;$imgset="MW22704";$imgcol="N";
			$chemc="../data/Collections/N Narthang Tanjur/N.xml";
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
	echo 'Location: '.$pagr.'<p style="font-size:30px;">'.$rouguni.'</p><p style="font-size:20px;">'.$roug.' </p>';
	
if ($col!="B") {	echo '<br><table style="border: 1px solid;border-radius: 1em;"><tr>';
	echo '<td width=50><td valign="top">Context <a href="context.php?id='.$res["vol"].'|'.$res["segno"].'|'.$txt.'|1|'.$col.'" target="_blank"><img style="vertical-align: text-top;" src="context.png" height=20></a>';
	echo '<td width=50><td valign="top"> Images <a href="../images.php?id='.$imgclass.'|'.$imgcol.'|'.$imgset.'|I'.$imgvol.'|'.$imgsec.'|'.$imgpag.'" target="_blank"><img style="vertical-align: text-top;" src="img.png" height=20></a>&nbsp&nbsp&nbsp<a href="duo.php?id='.$imgclass.'|'.$imgcol.'|'.$imgset.'|I'.$imgvol.'|'.$imgsec.'|'.$imgpag.'" target="_blank"><img style="vertical-align: text-top;" src="imgtxt.png" height=30></a>';
	echo '<td width=50><td valign="top">E-text <a href="complete.php?id='.$refr.'&coll='.$col.'" target="_blank"><img style="vertical-align: text-top;" src="text.png" height=20></a>';
		echo '<td width=50></table><hr>';
	
}
if ($col=="B") {echo '<br><br>rKTs can not display the images here. Please refer to the <a href="https://library.bdrc.io/show/bdr:MW4PD502?tabs=bdr:W4PD502" target="_blank">BDRC website</a><hr>';}
}

}
	
