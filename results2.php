<?php
// results2.php
$text = $_GET['text'] ?? '';
$encoded = str_replace('%20', '+', urlencode(urldecode($text)));
header("Location: /rkts1/pages/results.html?text={$encoded}&typ=1&typ2=1", true, 301);
exit;
?>



















<!DOCTYPE html>
<html>

<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="icon" type="image/x-icon" href="sub/logo.ico">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="sub/style.css"> 
<style>
.accordion {
  background-color: #fff;
  color: #444;
  cursor: pointer;
  padding: 15px;
  width: 100%;
  border: none;
  text-align: center;
  outline: none;
  font-size: 20px;
  transition: 0.4s;
}
.accordion2 {
  background-color: #fff;
  color: #444;
  cursor: pointer;
  padding: 10px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc; 
}
.active2,  {
  background-color: #ddd; 
}

.accordion:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: left;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}


.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}

 .topcorner{
   position:absolute;
   top:10px;
   right:10px;
  }

</style>
<body>

<?php
$text=$_GET['text'];
include('sub/unicode2.php');
include('sub/wylie.php');

				$text=toWylie($text);
				$text=str_replace("  "," ",$text);
				$text=str_replace("  "," ",$text);
				$textd=str_replace("'","\'",$text);
				$ttext=$text;
				unicode($ttext);




echo '<div class="toppage">';
echo '<table><tr><td><a href="index.php" style="text-decoration:none;"><img src="sub/logo.png" width=100></a>';
echo '<td width=50><td>Results for <span style="color:red;"><span style="font-size:40px;">'.$ttext.'</span> / '.$text.'</span>';
?>
</table></div>
<div class="bodypage2" style="font-size:18px;">
<div class="w3-bar w3-white">
  <button class="w3-bar-item w3-button" onclick="openCity('Kanjur')" style="background-color:white; color:#08088a;border-style: solid; border-color: #08088a;width: 20%;border-radius: 12px;float: left;">Kanjur / <span style="font-size:30px;">བཀའ་འགྱུར</span></button>
  <button class="w3-bar-item w3-button" onclick="openCity('Tanjur')" style="background-color:white; color:#08088a;border-style: solid; border-color: #08088a;width: 20%;border-radius: 12px;float: left;">Tanjur / <span style="font-size:30px;">བསྟན་འགྱུར</span></button>
  <button class="w3-bar-item w3-button" onclick="openCity('OldTantra')" style="background-color:white; color:#08088a;border-style: solid; border-color: #08088a;width: 20%;border-radius: 12px;float: left;">Old Tantra / <span style="font-size:30px;">རྙིང་རྒྱུད</span></button>
  <button class="w3-bar-item w3-button" onclick="openCity('bon')" style="background-color:white; color:#08088a;border-style: solid; border-color: #08088a;width: 20%;border-radius: 12px;float: left;">Bon Canon / <span style="font-size:30px;">བོན་གྱི་བཀའ་འགྱུར ། བཀའ་བརྟེན</span></button>
</div>

<div id="Kanjur" class="w3-container city">
  <h2 style="border: 2px solid #08088a; border-radius: 5px; padding:5px;">Kanjur (exact match)</h2><table>

<?php

				$roug='<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$text.'</span>';
				$troug='<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$ttext.'</span>';

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db12;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$result=array();
	$sqlQueryl = "SELECT * FROM catalog WHERE tib LIKE '%$textd%' AND rktsTyp LIKE 'K' ORDER BY rkts";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
	foreach ($resultats as $res){
		array_push($result,$res["rkts"]);
	}

$results1=array_unique($result);
foreach($results1 as $res)
{
	if ($res!=0){
	$sqlQueryl = "SELECT * FROM rkts WHERE rkts LIKE '%$res%' AND rktsTyp LIKE 'K' ORDER BY rkts";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
				$resl=$resultats[0]["tib"];
				$rest=$resl;
				unicode($rest);
				$res1=str_replace($text,$roug,$resl);
				$rest=str_replace($ttext,$troug,$rest);
				echo '<tr><td width=150 valign="top" style="border-bottom: 1px solid;"><a href="cat.php?id='.$res.'&typ=1" style="text-decoration:none;">K'.$res.'<td valign="top" style="border-bottom: 1px solid;"><a href="cat.php?id='.$res.'&typ=1" style="text-decoration:none;"><span style="font-size:30px;">'.$rest.'</span><br>'.$res1.'</a><br>';

}}



?>
  </table><h2 style="border: 2px solid #08088a; border-radius: 5px; padding:5px;">Kanjur (approximated match)</h2><table>

<?php
		$natlang=simplexml_load_file('data/natlang.xml');
		$text1=$text.' ';
		foreach($natlang->item as $item) {$text1=str_replace($item," ",$text1);}
		$text1=str_replace("'","\'",$text1);
		$bout=explode(' ',$text1);
		$bout=array_filter($bout);
		$nb=count($bout);
		$quer="tib LIKE '%".$bout[0]."%'";
		for ($x = 1; $x < $nb; $x++) {$quer=$quer." AND tib LIKE '%".$bout[$x]."%'";}
		
try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db12;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$result=array();
	$sqlQueryl = "SELECT * FROM catalog WHERE ".$quer." AND rktsTyp LIKE 'K' AND tib NOT LIKE '%$textd%' ORDER BY rkts";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
	foreach ($resultats as $res){
		array_push($result,$res["rkts"]);
	}

$results1=array_unique($result);
foreach($results1 as $res)
{
	if ($res!=0){
	$sqlQueryl = "SELECT * FROM rkts WHERE rkts LIKE '%$res%' AND rktsTyp LIKE 'K' ORDER BY rkts";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
				$resl=$resultats[0]["tib"];
				$rest=$resl;
				unicode($rest);
				$res1=$resl;
				foreach($bout as $boutt) {
					$boutt=str_replace("\'","'",$boutt);
					$tbout=$boutt;
					unicode($tbout);
				$roug='###'.$boutt.'####';
				$troug='###'.$tbout.'####';
				$res1=str_replace($boutt,$roug,$res1);
				$rest=str_replace($tbout,$troug,$rest);
					
				}
				$res1=str_replace("####","</span>",$res1);
				$rest=str_replace("####","</span>",$rest);
				$res1=str_replace("###","<span style=\"color:red;border: 2px solid red; border-radius: 5px;\">",$res1);
				$rest=str_replace("###","<span style=\"color:red;border: 2px solid red; border-radius: 5px;\">",$rest);
				echo '<tr><td width=150 valign="top" style="border-bottom: 1px solid;"><a href="cat.php?id='.$res.'&typ=1" style="text-decoration:none;">K'.$res.'</a><td valign="top" style="border-bottom: 1px solid;"><a href="cat.php?id='.$res.'&typ=1" style="text-decoration:none;"><span style="font-size:30px;">'.$rest.'</span><br>'.$res1.'</a><br>';

}}

?>

</table></div>

<div id="Tanjur" class="w3-container city" style="display:none">
  <h2 style="border: 2px solid #08088a; border-radius: 5px; padding:5px;">Tanjur (exact match)</h2><table>

<?php

				$roug='<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$text.'</span>';
				$troug='<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$ttext.'</span>';

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db12;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$result=array();
	$sqlQueryl = "SELECT * FROM catalog WHERE tib LIKE '%$textd%' AND rktsTyp LIKE 'T' ORDER BY rkts";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
	foreach ($resultats as $res){
		array_push($result,$res["rkts"]);
	}

$results1=array_unique($result);
foreach($results1 as $res)
{
	if ($res!=0){
	$sqlQueryl = "SELECT * FROM rkts WHERE rkts LIKE '%$res%' AND rktsTyp LIKE 'T' ORDER BY rkts";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
				$resl=$resultats[0]["tib"];
				$rest=$resl;
				unicode($rest);
				$res1=str_replace($text,$roug,$resl);
				$rest=str_replace($ttext,$troug,$rest);
				echo '<tr><td width=150 valign="top" style="border-bottom: 1px solid;"><a href="cat.php?id='.$res.'&typ=2" style="text-decoration:none;">T'.$res.'<td valign="top" style="border-bottom: 1px solid;"><a href="cat.php?id='.$res.'&typ=2" style="text-decoration:none;"><span style="font-size:30px;">'.$rest.'</span><br>'.$res1.'</a><br>';

}}



?>
  </table><h2 style="border: 2px solid #08088a; border-radius: 5px; padding:5px;">Tanjur (approximated match)</h2><table>

<?php
		$natlang=simplexml_load_file('data/natlang.xml');
		$text1=$text.' ';
		foreach($natlang->item as $item) {$text1=str_replace($item," ",$text1);}
		$text1=str_replace("'","\'",$text1);
		$bout=explode(' ',$text1);
		$bout=array_filter($bout);
		$nb=count($bout);
		$quer="tib LIKE '%".$bout[0]."%'";
		for ($x = 1; $x < $nb; $x++) {$quer=$quer." AND tib LIKE '%".$bout[$x]."%'";}
		
try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db12;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$result=array();
	$sqlQueryl = "SELECT * FROM catalog WHERE ".$quer." AND rktsTyp LIKE 'T' AND tib NOT LIKE '%$textd%' ORDER BY rkts";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
	foreach ($resultats as $res){
		array_push($result,$res["rkts"]);
	}

$results1=array_unique($result);
foreach($results1 as $res)
{
	if ($res!=0){
	$sqlQueryl = "SELECT * FROM rkts WHERE rkts LIKE '%$res%' AND rktsTyp LIKE 'T' ORDER BY rkts";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
				$resl=$resultats[0]["tib"];
				$rest=$resl;
				unicode($rest);
				$res1=$resl;
				foreach($bout as $boutt) {
					$boutt=str_replace("\'","'",$boutt);
					$tbout=$boutt;
					unicode($tbout);
				$roug='###'.$boutt.'####';
				$troug='###'.$tbout.'####';
				$res1=str_replace($boutt,$roug,$res1);
				$rest=str_replace($tbout,$troug,$rest);
					
				}
				$res1=str_replace("####","</span>",$res1);
				$rest=str_replace("####","</span>",$rest);
				$res1=str_replace("###","<span style=\"color:red;border: 2px solid red; border-radius: 5px;\">",$res1);
				$rest=str_replace("###","<span style=\"color:red;border: 2px solid red; border-radius: 5px;\">",$rest);
				echo '<tr><td width=150 valign="top" style="border-bottom: 1px solid;"><a href="cat.php?id='.$res.'&typ=2" style="text-decoration:none;">T'.$res.'</a><td valign="top" style="border-bottom: 1px solid;"><a href="cat.php?id='.$res.'&typ=2" style="text-decoration:none;"><span style="font-size:30px;">'.$rest.'</span><br>'.$res1.'</a><br>';

}}

?>

</table></div>

<div id="OldTantra" class="w3-container city" style="display:none">
  <h2 style="border: 2px solid #08088a; border-radius: 5px; padding:5px;">Old Tantra (exact match)</h2><table>

<?php

				$roug='<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$text.'</span>';
				$troug='<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$ttext.'</span>';

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db12;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$result=array();
	$sqlQueryl = "SELECT * FROM catalog WHERE tib LIKE '%$textd%' AND rktsTyp LIKE 'G' ORDER BY rkts";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
	foreach ($resultats as $res){
		array_push($result,$res["rkts"]);
	}

$results1=array_unique($result);
foreach($results1 as $res)
{
	if ($res!=0){
	$sqlQueryl = "SELECT * FROM rkts WHERE rkts LIKE '%$res%' AND rktsTyp LIKE 'G' ORDER BY rkts";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
				$resl=$resultats[0]["tib"];
				$rest=$resl;
				unicode($rest);
				$res1=str_replace($text,$roug,$resl);
				$rest=str_replace($ttext,$troug,$rest);
				echo '<tr><td width=150 valign="top" style="border-bottom: 1px solid;"><a href="cat.php?id='.$res.'&typ=3" style="text-decoration:none;">G'.$res.'<td valign="top" style="border-bottom: 1px solid;"><a href="cat.php?id='.$res.'&typ=3" style="text-decoration:none;"><span style="font-size:30px;">'.$rest.'</span><br>'.$res1.'</a><br>';

}}



?>
  </table><h2 style="border: 2px solid #08088a; border-radius: 5px; padding:5px;">Old Tantra (approximated match)</h2><table>

<?php
		$natlang=simplexml_load_file('data/natlang.xml');
		$text1=$text.' ';
		foreach($natlang->item as $item) {$text1=str_replace($item," ",$text1);}
		$text1=str_replace("'","\'",$text1);
		$bout=explode(' ',$text1);
		$bout=array_filter($bout);
		$nb=count($bout);
		$quer="tib LIKE '%".$bout[0]."%'";
		for ($x = 1; $x < $nb; $x++) {$quer=$quer." AND tib LIKE '%".$bout[$x]."%'";}
		
try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db12;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$result=array();
	$sqlQueryl = "SELECT * FROM catalog WHERE ".$quer." AND rktsTyp LIKE 'G' AND tib NOT LIKE '%$textd%' ORDER BY rkts";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
	foreach ($resultats as $res){
		array_push($result,$res["rkts"]);
	}

$results1=array_unique($result);
foreach($results1 as $res)
{
	if ($res!=0){
	$sqlQueryl = "SELECT * FROM rkts WHERE rkts LIKE '%$res%' AND rktsTyp LIKE 'G' ORDER BY rkts";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
				$resl=$resultats[0]["tib"];
				$rest=$resl;
				unicode($rest);
				$res1=$resl;
				foreach($bout as $boutt) {
					$boutt=str_replace("\'","'",$boutt);
					$tbout=$boutt;
					unicode($tbout);
				$roug='###'.$boutt.'####';
				$troug='###'.$tbout.'####';
				$res1=str_replace($boutt,$roug,$res1);
				$rest=str_replace($tbout,$troug,$rest);
					
				}
				$res1=str_replace("####","</span>",$res1);
				$rest=str_replace("####","</span>",$rest);
				$res1=str_replace("###","<span style=\"color:red;border: 2px solid red; border-radius: 5px;\">",$res1);
				$rest=str_replace("###","<span style=\"color:red;border: 2px solid red; border-radius: 5px;\">",$rest);
				echo '<tr><td width=150 valign="top" style="border-bottom: 1px solid;"><a href="cat.php?id='.$res.'&typ=3" style="text-decoration:none;">G'.$res.'</a><td valign="top" style="border-bottom: 1px solid;"><a href="cat.php?id='.$res.'&typ=3" style="text-decoration:none;"><span style="font-size:30px;">'.$rest.'</span><br>'.$res1.'</a><br>';

}}

?>

</table></div>


<div id="bon" class="w3-container city" style="display:none">
  <h2 style="border: 2px solid #08088a; border-radius: 5px; padding:5px;">Bon Kanjur (exact match)</h2><table>

<?php

				$roug='<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$text.'</span>';
				$troug='<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$ttext.'</span>';

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db12;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$result=array();
	$sqlQueryl = "SELECT * FROM catalog WHERE tib LIKE '%$textd%' AND rktsTyp LIKE 'B' ORDER BY rkts";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
	foreach ($resultats as $res){
		array_push($result,$res["rkts"]);
	}

$results1=array_unique($result);
foreach($results1 as $res)
{
	if ($res!=0){
	$sqlQueryl = "SELECT * FROM rkts WHERE rkts LIKE '%$res%' AND rktsTyp LIKE 'B' ORDER BY rkts";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
				$resl=$resultats[0]["tib"];
				$rest=$resl;
				unicode($rest);
				$res1=str_replace($text,$roug,$resl);
				$rest=str_replace($ttext,$troug,$rest);
				echo '<tr><td width=150 valign="top" style="border-bottom: 1px solid;"><a href="cat.php?id='.$res.'&typ=5" style="text-decoration:none;">B'.$res.'<td valign="top" style="border-bottom: 1px solid;"><a href="cat.php?id='.$res.'&typ=5" style="text-decoration:none;"><span style="font-size:30px;">'.$rest.'</span><br>'.$res1.'</a><br>';

}}



?>
  </table><h2 style="border: 2px solid #08088a; border-radius: 5px; padding:5px;">Bon Kanjur (approximated match)</h2><table>

<?php
		$natlang=simplexml_load_file('data/natlang.xml');
		$text1=$text.' ';
		foreach($natlang->item as $item) {$text1=str_replace($item," ",$text1);}
		$text1=str_replace("'","\'",$text1);
		$bout=explode(' ',$text1);
		$bout=array_filter($bout);
		$nb=count($bout);
		$quer="tib LIKE '%".$bout[0]."%'";
		for ($x = 1; $x < $nb; $x++) {$quer=$quer." AND tib LIKE '%".$bout[$x]."%'";}
		
try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db12;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$result=array();
	$sqlQueryl = "SELECT * FROM catalog WHERE ".$quer." AND rktsTyp LIKE 'B' AND tib NOT LIKE '%$textd%' ORDER BY rkts";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
	foreach ($resultats as $res){
		array_push($result,$res["rkts"]);
	}

$results1=array_unique($result);
foreach($results1 as $res)
{
	if ($res!=0){
	$sqlQueryl = "SELECT * FROM rkts WHERE rkts LIKE '%$res%' AND rktsTyp LIKE 'B' ORDER BY rkts";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
				$resl=$resultats[0]["tib"];
				$rest=$resl;
				unicode($rest);
				$res1=$resl;
				foreach($bout as $boutt) {
					$boutt=str_replace("\'","'",$boutt);
					$tbout=$boutt;
					unicode($tbout);
				$roug='###'.$boutt.'####';
				$troug='###'.$tbout.'####';
				$res1=str_replace($boutt,$roug,$res1);
				$rest=str_replace($tbout,$troug,$rest);
					
				}
				$res1=str_replace("####","</span>",$res1);
				$rest=str_replace("####","</span>",$rest);
				$res1=str_replace("###","<span style=\"color:red;border: 2px solid red; border-radius: 5px;\">",$res1);
				$rest=str_replace("###","<span style=\"color:red;border: 2px solid red; border-radius: 5px;\">",$rest);
				echo '<tr><td width=150 valign="top" style="border-bottom: 1px solid;"><a href="cat.php?id='.$res.'&typ=5" style="text-decoration:none;">B'.$res.'</a><td valign="top" style="border-bottom: 1px solid;"><a href="cat.php?id='.$res.'&typ=5" style="text-decoration:none;"><span style="font-size:30px;">'.$rest.'</span><br>'.$res1.'</a><br>';

}}

?>

</table></div>




<script>
function openCity(cityName) {
  var i;
  var x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  document.getElementById(cityName).style.display = "block";  
}
</script>
</div><div class="topcorner">
<form action="results2.php">
<input type="text" name="text" placeholder="Quick Search..." size="75">
<input type="hidden" id="typ" name="typ" value="1"> 
<input type="hidden" id="typ2" name="typ2" value="1" > 
<input type="hidden" id="sorte" name="sorte" value="1" > 
</form>
</div>

</body>
</html>
