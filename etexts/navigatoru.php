<!DOCTYPE html> 
<html> 
  
<head> 
    <title>rKTs</title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <link rel="icon" type="image/x-icon" href="sub/logo.ico">

    <link rel="stylesheet" href="../sub/style.css"> 
<style>
.button {
  background-color: #08088a;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
</style>
</head>

<body>


<div class="toppage">
<table><tr><td><a href="../index.php" style="text-decoration:none;"><img src="../sub/logo.png" width=100></a>
<td width=50><td>e-texts navigator
</table>


<?php
session_Start();
include('../sub/unicode2.php');
$id=$_GET['id'];
 $ida=explode("|",$id);
 $cat=$ida[0];
 $col=$ida[1];
 $set=$ida[2];
 $vol=$ida[3];
 $voln=$ida[4];
 $sec=$ida[5];
 $pag=$ida[6];

echo '<table><tr>';
echo '<td width="50"><td><form action="navigatoru.php">
<font size=-1>Collection
<br><select id="id" name="id" onchange="this.form.submit();" style="width: 250px; font-size: 20px;">
<option value="x|x|x|x|x|x" style="font-weight: bold;">-KANJUR-</option>';
if ($col=="C") { echo '<option value="1|C|1PD96685|x|x|x|x" selected>C Cone Kanjur</option>';} else { echo '<option value="1|C|1PD96685|x|x|x|x">C Cone Kanjur</option>';} 
if ($col=="D") { echo '<option value="1|D|22084|x|x|x|x" selected>D Derge Kanjur</option>';} else { echo '<option value="1|D|22084|x|x|x|x">D Derge Kanjur</option>';} 
if ($col=="F") { echo '<option value="1|F|1KG13607|x|x|x|x" selected>F Phugbrag Kanjur</option>';} else { echo '<option value="1|F|1KG13607|x|x|x|x">F Phugbrag Kanjur</option>';} 
if ($col=="H") { echo '<option value="1|H|26071|x|x|x|x" selected>H Lhasa Kanjur</option>';} else { echo '<option value="1|H|26071|x|x|x|x">H Lhasa Kanjur</option>';} 
if ($col=="He") { echo '<option value="1|He|4CZ45313|x|x|x|x" selected>He Hemis I Kanjur</option>';} else { echo '<option value="1|He|4CZ45313|x|x|x|x">He Hemis I Kanjur</option>';} 
if ($col=="J") { echo '<option value="1|J|4CZ7445|x|x|x|x" selected>J Lithang Kanjur</option>';} else { echo '<option value="1|J|4CZ7445|x|x|x|x">J Lithang Kanjur</option>';} 
if ($col=="L") { echo '<option value="1|L|3CN981|x|x|x|x" selected>L London Kanjur</option>';} else { echo '<option value="1|L|3CN981|x|x|x|x">L London Kanjur</option>';} 
if ($col=="N") { echo '<option value="1|N|22703|x|x|x|x" selected>N Narthang Kanjur</option>';} else { echo '<option value="1|N|22703|x|x|x|x">N Narthang Kanjur</option>';} 
if ($col=="Q") { echo '<option value="1|Q|1PD96684|x|x|x|x" selected>Q Peking Kanjur</option>';} else { echo '<option value="1|Q|1PD96684|x|x|x|x">Q Peking Kanjur</option>';} 
if ($col=="S") { echo '<option value="1|S|22083|x|x|x|x" selected>S Stog Kanjur</option>';} else { echo '<option value="1|S|22083|x|x|x|x">S Stog Kanjur</option>';} 
if ($col=="Ts") { echo '<option value="1|Ts|3CN1302|x|x|x|x" selected>Ts Tsarang Kanjur</option>';} else { echo '<option value="1|Ts|3CN1302|x|x|x|x">Ts Tsarang Kanjur</option>';} 
if ($col=="Ty") { echo '<option value="1|Ty|2KG209840|x|x|x|x" selected>Ty Tashiyangtse Kanjur</option>';} else { echo '<option value="1|Ty|2KG209840|x|x|x|x">Ty Tashiyangtse Kanjur</option>';} 

echo '<option value="x|x|x|x|x|x" style="font-weight: bold;">-CANONICAL COLLECTIONS-</option>';
if ($col=="Ba") {echo '<option value="1|Ba|4CZ45308|x|x|x|x" selected>Ba Basgo Fragments</option>';} else { echo '<option value="1|Ba|4CZ45308|x|x|x|x">Ba Basgo Fragments</option>';} 
if ($col=="Dm") {echo '<option value="1|Dm|1BL10|x|x|x|x" selected>Dm Drakmar Collection</option>';} else { echo '<option value="1|Dm|1BL10|x|x|x|x">Dm Drakmar Collection</option>';} 
if ($col=="Go") {echo '<option value="1|Go|2KG5016|x|x|x|x" selected>Go Gondhla Collection</option>';} else { echo '<option value="1|Go|2KG5016|x|x|x|x">Go Gondhla Collection</option>';} 
if ($col=="Ng") { echo '<option value="1|Ng|2KG229028|x|x|x|x" selected>Ng Namgyal Collection</option>';} else { echo '<option value="1|Ng|2KG229028|x|x|x|x">Ng Namgyal Collection</option>';} 


echo '<option value="x|x|x|x|x|x" style="font-weight:bold;">-TANJUR-</option>';
if ($col=="TD") { echo '<option value="2|TD|23703|x|x|x|x" selected>D Derge Tanjur</option>';} else { echo '<option value="2|TD|23703|x|x|x|x">D Derge Tanjur</option>';} 
if ($col=="TG") { echo '<option value="2|TG|23702|x|x|x|x" selected>G Golden Tanjur</option>';} else { echo '<option value="2|TG|23702|x|x|x|x">G Golden Tanjur</option>';} 
if ($col=="TN") { echo '<option value="2|TN|22704|x|x|x|x" selected>N Narthang Tanjur</option>';} else { echo '<option value="2|TN|22704|x|x|x|x">N Narthang Tanjur</option>';} 
if ($col=="TQ") { echo '<option value="2|TQ|1KG13126|x|x|x|x" selected>Q Peking Tanjur</option>';} else { echo '<option value="2|TQ|1KG13126|x|x|x|x">Q Peking Tanjur</option>';} 

echo '<option value="x|x|x|x|x|x" style="font-weight:bold;">-OLD TANTRA-</option>';
if ($col=="Gaz") { echo '<option value="3|Gaz|1KG11703|x|x|x|x" selected>Gaz rnying rgyud bcu bdun (Anzom Chögar)</option>';} else { echo '<option value="3|Gaz|1KG11703|x|x|x|x">Gaz rnying rgyud bcu bdun (Anzom Chögar)</option>';} 
if ($col=="Gbr") { echo '<option value="3|Gbr|21519|x|x|x|x" selected>Gbr Vairocana rnying rgyud</option>';} else { echo '<option value="3|Gbr|21519|x|x|x|x">Gbr Vairocana rnying rgyud</option>';} 
if ($col=="Gdg") { echo '<option value="3|Gdg|21939|x|x|x|x" selected>Gdg Derge rnying rgyud</option>';} else { echo '<option value="3|Gdg|21939|x|x|x|x">Gdg Derge rnying rgyud</option>';} 
if ($col=="Gkh") { echo '<option value="3|Gkh|2PD17382|x|x|x|x" selected>Gkh Khams rnying rgyud</option>';} else { echo '<option value="3|Gkh|2PD17382|x|x|x|x">Gkh Khams rnying rgyud</option>';} 
if ($col=="Gkk") { echo '<option value="3|Gkk|25815|x|x|x|x" selected>Gkk Khakong rnying rgyud</option>';} else { echo '<option value="3|Gkk|25815|x|x|x|x">Gkk Khakong rnying rgyud</option>';} 
if ($col=="Glt") { echo '<option value="3|Glt|1ER124|x|x|x|x" selected>Glt rnying rgyud bcu bdun (Langthang)</option>';} else { echo '<option value="3|Glt|1ER124|x|x|x|x">Glt rnying rgyud bcu bdun (Langthang)</option>';} 
if ($col=="Gpb") { echo '<option value="3|Gpb|1KG14783|x|x|x|x" selected>Gpb Paltsek rnying rgyud</option>';} else { echo '<option value="3|Gpb|1KG14783|x|x|x|x">Gpb Paltsek rnying rgyud</option>';} 
if ($col=="Gtb") { echo '<option value="3|Gtb|21521|x|x|x|x" selected>Gtb Tsamdrak rnying rgyud</option>';} else { echo '<option value="3|Gtb|21521|x|x|x|x">Gtb Tsamdrak rnying rgyud</option>';} 
if ($col=="Gtn") { echo '<option value="3|Gtn|2PD19896|x|x|x|x" selected>Gtn Rikdzin Tsewang Norbu rnying rgyud</option>';} else { echo '<option value="3|Gtn|2PD19896|x|x|x|x">Gtn Rikdzin Tsewang Norbu rnying rgyud</option>';} 


echo '<option value="x|x|x|x|x|x" style="font-weight:bold;">-BON CANON-</option>';
if ($col=="Bkz") { echo '<option value="5|Bkz|4CZ58532|x|x|x|x" selected>Bkz bon gyi bka\' brten</option>';} else { echo '<option value="5|Bkz|4CZ58532|x|x|x|x">Bkz bon gyi bka\' brten</option>';} 


echo '</select></form>
</form>';

if ($cat==1) {$xml=simplexml_load_file('repository/volKanjur.xml');}
if ($cat==2) {$xml=simplexml_load_file('repository/volTanjur.xml');}
if ($cat==3) {$xml=simplexml_load_file('repository/volTantra.xml');}
if ($cat==5) {$xml=simplexml_load_file('repository/volBon.xml');}


echo '<td width="50"><td><form action="navigatoru.php">
<font size=-1>Volume
<br><select id="id" name="id" onchange="this.form.submit();" style="font-size: 20px;">
<option value="x|x|x|x|x|x">---</option>';

foreach ($xml->item as $item)
{
	if ($col==$item->col){
		if ($item->voln==$voln){echo '<option value="'.$cat.'|'.$col.'|'.$set.'|'.$item->volref.'|'.$item->voln.'|x|x" selected>'.$item->vol.'</option>';}
		else {echo '<option value="'.$cat.'|'.$col.'|'.$set.'|'.$item->volref.'|'.$item->voln.'|x|x">'.$item->vol.'</option>';}
	}
}
echo '</select></form>
</form>';

include("liencoll.php");


if ($col=="TD"){ $chem="D Derge Tanjur";$repos="TanjurDerge";$col2="D";}
if ($col=="TG"){ $chem="G Golden Tanjur";$repos="TanjurGolden";$col2="G";}
if ($col=="TN"){ $chem="N Narthang Tanjur";$repos="TanjurNarthang";$col2="N";}
if ($col=="TQ"){ $chem="Q Peking Tanjur";$repos="TanjurPeking";$col2="Q";}



	$json=file_get_contents('../data/Collections/'.$chem.'/'.$set.'/'.$vol.'.json');
	$jsona=json_decode($json,true);

echo '<td width="50"><td><form action="navigatoru.php">
<font size=-1>Page
<br><select id="id" name="id" onchange="this.form.submit();" style="font-size: 20px;">
<option value="x|x|x|x|x|x">---</option>';
$i=0;
foreach ($jsona as $ligne){
	if ($sec==$ligne["psection"] and $pag==$ligne["pagination"]) {echo '<option value="'.$cat.'|'.$col.'|'.$set.'|'.$vol.'|'.$voln.'|'.$ligne["psection"].'|'.$ligne["pagination"].'" selected>'.$ligne["pagination"].'</option>';$p1=$jsona[$i]["pagination"];$p2=$jsona[$i+2]["pagination"];$img=$ligne["file"];}
	else {echo '<option value="'.$cat.'|'.$col.'|'.$set.'|'.$vol.'|'.$voln.'|'.$ligne["psection"].'|'.$ligne["pagination"].'">'.$ligne["pagination"].'</option>';}
	$i=$i+1;
}
echo '</select></form>
</form>';
 echo '<td width=50><td><a href="navigator.php?id='.$id.'" style="font-size:12px;" font-decoration:none;>Wylie</a>';
echo '</table>';
echo '<hr><p style="font-size:14px; font-style: normal;font-weight: normal;margin: 50px;margin-top: 12px;">';
$fh=fopen('repository/'.$repos.'/'.$voln.'.txt', 'rb');
$i=1;



while (!feof($fh)) {
    $ligne = fgets($fh);
    $loc=explode("): ",$ligne)[0];
	$lin=explode("(",$loc)[0];
	$secl=explode("(",$loc)[1];
	$txt=explode("): ",$ligne)[1];
	if (strpos($lin,"a")!=false) {$pos=strpos($lin,"a");}
	if (strpos($lin,"b")!=false) {$pos=strpos($lin,"b");}
	$linp=substr($lin,0,$pos);
	$linf=substr($lin,$pos,1);
	$linl=substr($lin,$pos+1);
	unicode($txt);
	if (strcmp($sec,$secl)==0){
	if ($pag==$linp.$linf)
		
	{ echo '<span style="color:red;">'.$pag.'</span><sub style="color:red;">'.$i.'</sub><span style="font-size: 25px;"> '.$txt.'</span><br>'; $i++;}
	}
}
fclose($fh);

echo '<p style="font-size:10px;">';
/*image*/
echo '<br><hr>';


$seti="MW".$set;
include("json/".$seti.".php");




echo '<p style="text-align: center;">';
echo '<a href="navigator.php?id='.$cat.'|'.$col.'|'.$set.'|'.$vol.'|'.$voln.'|'.$sec.'|'.$p1.'">'.$p1.'</a> - <a href="navigator.php?id='.$cat.'|'.$col.'|'.$set.'|'.$vol.'|'.$voln.'|'.$sec.'|'.$p2.'">'.$p2.'</a>';
$vol1=$vol;
$set1=$set;
try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db12;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


echo '</div></p></p></p><p style="font-size:10px;">';

echo '<h3>Texts on this page</h3>';
	$sec1=str_replace("'","\'",$sec);
	$sqlQueryl = "SELECT * FROM locations WHERE vol LIKE '$vol1' AND sec LIKE '$sec1' ORDER BY debp";
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
				
		echo $res["ref"].' - ';
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
				echo $resultatqs[0]["tib"].'</a>';
		echo '<a class="lien1" href="../cat.php?id='.$rkts.'&typ='.$typ1.'" target="_blank"><img src="../sub/link.png" width=30></a><br>';
	}
}

echo '<br><br><br><br>';


if ($_SESSION['login']==1) {
	echo '<br><br><a href="../editor/index.php?id='.$id.'" target="_blank">Edit this page</a>';
}
?>


