<?php

$id=$_GET['id'];
 $ida=explode("|",$id);
 $cat=$ida[0];
 $col=$ida[1];
 $set=$ida[2];
 $vol=$ida[3];
 $voln=$ida[4];
 $sec=$ida[5];
 $pag=$ida[6];
 $co2=$ida[7];

echo '<table><tr>';
echo '<td width="50"><td><form action="tcompare.php">
<font size=-1>Collection
<br><select id="id" name="id" onchange="this.form.submit();">
<option value="x|x|x|x|x|x">---</option>';
if ($col=="D") { echo '<option value="1|D|22084|x|x|x|x|x" selected>D Derge Kangyur</option>';} else { echo '<option value="1|D|22084|x|x|x|x|x">D Derge Kangyur</option>';} 

if ($col=="TD") { echo '<option value="2|TD|23703|x|x|x|x|x" selected>D Derge Tengyur</option>';} else { echo '<option value="2|TD|23703|x|x|x|x|x">D Derge Kanjur</option>';} 

echo '</select></form>
</form>';

if ($cat==1) {$xml=simplexml_load_file('repository/volKanjur.xml');}
if ($cat==2) {$xml=simplexml_load_file('repository/volTanjur.xml');}
if ($cat==3) {$xml=simplexml_load_file('repository/volTantra.xml');}


echo '<td width="50"><td><form action="tcompare.php">
<font size=-1>Volume
<br><select id="id" name="id" onchange="this.form.submit();">
<option value="x|x|x|x|x|x">---</option>';

foreach ($xml->item as $item)
{
	if ($col==$item->col){
		if ($item->voln==$voln){echo '<option value="'.$cat.'|'.$col.'|'.$set.'|'.$item->volref.'|'.$item->voln.'|x|x|x" selected>'.$item->vol.'</option>';}
		else {echo '<option value="'.$cat.'|'.$col.'|'.$set.'|'.$item->volref.'|'.$item->voln.'|x|x|x">'.$item->vol.'</option>';}
	}
}
echo '</select></form>
</form>';

if ($col=="D"){ $chem="D Derge Kanjur";$repos="KanjurDerge";$col2="D";}
if ($col=="H"){ $chem="H Lhasa Kanjur";$repos="KanjurLhasa";$col2="H";}
if ($col=="J"){ $chem="J Lithang Kanjur";$repos="KanjurLithang";$col2="J";}
if ($col=="Ng"){ $chem="Ng Namgyal Collection";$repos="KanjurNamgyal";$col2="Ng";}
if ($col=="S"){ $chem="S Stog Kanjur";$repos="KanjurStog";$col2="S";}

if ($col=="TD"){ $chem="D Derge Tanjur";$repos="TanjurDerge";$col2="D";}
if ($col=="TG"){ $chem="G Golden Tanjur";$repos="TanjurGolden";$col2="G";}
if ($col=="TN"){ $chem="N Narthang Tanjur";$repos="TanjurNarthang";$col2="N";}

if ($col=="Gaz"){ $chem="Gaz a 'dzom par ma";$repos="NGBGaz";$col2="Gaz";}
if ($col=="Gpb"){ $chem="Gpb snga 'gyur rgyud 'bum phyogs bsgrigs";$repos="NGBGpb";$col2="Gpb";}


	$json=file_get_contents('../data/Collections/'.$chem.'/'.$set.'/'.$vol.'.json');
	$jsona=json_decode($json,true);

echo '<td width="50"><td><form action="tcompare.php">
<font size=-1>Page
<br><select id="id" name="id" onchange="this.form.submit();">
<option value="x|x|x|x|x|x|x">---</option>';
$i=0;
foreach ($jsona as $ligne){
	if ($sec==$ligne["psection"] and $pag==$ligne["pagination"]) {echo '<option value="'.$cat.'|'.$col.'|'.$set.'|'.$vol.'|'.$voln.'|'.$ligne["psection"].'|'.$ligne["pagination"].'|x" selected>'.$ligne["pagination"].'</option>';$p1=$jsona[$i]["pagination"];$p2=$jsona[$i+2]["pagination"];$img=$ligne["file"];}
	else {echo '<option value="'.$cat.'|'.$col.'|'.$set.'|'.$vol.'|'.$voln.'|'.$ligne["psection"].'|'.$ligne["pagination"].'|x">'.$ligne["pagination"].'</option>';}
	$i=$i+1;
}
echo '</select></form>';


echo '<td width="50"><td><form action="tcompare.php">
<font size=-1>Compare with
<br><select id="id" name="id" onchange="this.form.submit();">
<option value="x|x|x|x|x|x|x">---</option>';

/*Textes sur la page*/

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db12;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
if ($col!="Ma" AND $col!="PT" AND $col!="Mmk" AND $col!="VP" AND $col!="NLM" AND $p!='x')
{
	$sec1=str_replace("'","\'",$sec);
	$sqlQueryl = "SELECT * FROM locations WHERE vol LIKE '$vol' AND sec LIKE '$sec' ORDER BY debp";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
	$p1=substr($pag,0,-1);
	$pc=substr($pag,-1);
foreach ($resultats as $res) {
	$debp=$res["debp"];
	$debf=$res["debf"];
	$finp=$res["finp"];
	$finf=$res["finf"];

	if (($debp<$p1 AND $finp>$p1) || ($debp==$p1 AND $debf=="a") || ($debp==$p1 AND $debf=="b" AND $pc=="b") || ($finp==$p1 AND $finf=="b") || ($finp==$p1 AND $finf=="a" AND $pc=="a") ) 
	{
				$refc=$res["ref"];
				$sqlcat= "SELECT * FROM catalog WHERE ref LIKE '$refc' LIMIT 1";
				$rescat= $mysqlClient->prepare($sqlcat);
				$rescat->execute();
				$rescats= $rescat->fetchAll();
				$rkts=$rescats[0]['rkts'];
				$typ=$rescats[0]['rktsTyp'];
				if ($typ=="K"){$typ1=1;}
				if ($typ=="T"){$typ1=2;}
				if ($typ=="G"){$typ1=3;}
				if ($typ=="B"){$typ1=5;}
				
		$refc=$res["ref"];
				$sqlQ = "SELECT * FROM catalog WHERE ref LIKE '$refc' LIMIT 1";
				$resultatq = $mysqlClient->prepare($sqlQ);
				$resultatq->execute();
				$resultatqs = $resultatq->fetchAll();
				$rktsc=$resultatqs[0]["rkts"];$rktstypc=$resultatqs[0]["rktsTyp"];
				$sqlQ = "SELECT * FROM rkts WHERE rkts LIKE '$rktsc'  AND rktsTyp LIKE '$rktstypc' LIMIT 1";
				$resultatq = $mysqlClient->prepare($sqlQ);
				$resultatq->execute();
				$resultatqs = $resultatq->fetchAll();
				echo $refc.'</a>';
		
		
		if ($cat==1) {$catl="K";}
		if ($cat==2) {$catl="T";}
		$xml=simplexml_load_file('../data/alignments/'.$catl.$rkts.'.xml');
		$refalign=$xml->locref->ref;
		if ($refalign==$refc) { 
		foreach ($xml->item as $item)
		{
			if ($item->ref->pag==$pag AND $item->ref->sec==$sec) {
				foreach ($item->align as $align){
					echo '<option value="'.$cat.'|'.$col.'|'.$set.'|'.$vol.'|'.$voln.'|'.$ligne["psection"].'|'.$ligne["pagination"].'|'.$align->ref.'">'.$align->ref.'</option>';
				}
			}
		}
		echo '<br>';
		}


	
	}
}
}



echo '</select></form>';


echo '</table>';


