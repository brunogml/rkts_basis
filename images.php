<!DOCTYPE html> 
<html> 
  
<head> 
    <title>rKTs</title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <link rel="icon" type="image/x-icon" href="sub/logo.ico">

    <link rel="stylesheet" href="sub/style.css"> 
		<link rel="stylesheet" href="modal/css/modalbox.min.css" type="text/css"/>
        <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script>

<style>
.accordion {
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
.accordion2 {
  background-color: #fff;
  color: #444;
  cursor: pointer;
  padding: 10px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 20px;
  transition: 0.4s;
}
.accordion3 {
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
.active3,  {
  background-color: #ddd; 
}

.accordion:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: left;
  margin-left: 5px;
}
.accordion2:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: left;
  margin-left: 5px;
}
.accordion3:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: left;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}
.active2:after {
  content: "\2212";
}
.active3:after {
  content: "\2212";
}


.panel {
  font-size: 18px;
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
select {
  font-size: 16px;
  border: 1px solid #08088a;
  border-radius: 5px;
	padding:5px;
}
</style>


</head>

<body>
<?php
$id=$_GET['id'];
 $ida=explode("|",$id);
 $cat=$ida[0];
 $col=$ida[1];
 $set=$ida[2];
 $vol=$ida[3];
 $sec=$ida[4];
 $p=$ida[5];

if ($col=="TD") {$col="D";}


if ($cat==1) {$catName="Kanjur";}
if ($cat==2) {$catName="Tanjur";}
if ($cat==3) {$catName="Old Tantra";}

$title=$set;
$coll=$col;
$page=$p;
$vol1=substr($vol,1);
header("Location: rkts1/pages/images.html?title={$title}&coll={$coll}&vol={$vol1}&page={$page}&sec={$sec}", true, 301);


include('functions/align.php');
include('functions/nextpage.php');
include('functions/rktsno.php');


?>
<div class="toppage">
<table><tr><td><a href="index.php" style="text-decoration:none;"><img src="sub/logo.png" width=100></a>
<td width=50><td>Image viewer

<td width=25><td><form action="images.php">
<font size=-1>Collection
<br><select id="id" name="id" onchange="this.form.submit();">
<option value="x|x|x|x|x|x">---</option>
<?php

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db11;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
	$sqlQueryl = "SELECT * FROM Collections WHERE C_images LIKE 1 ORDER BY C_Sigla, C_Name";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();

foreach ($resultats as $res) {
			if (strcmp($col,$res["C_Sigla"])==0 AND $cat==$res["C_Class"]) 
			{
				if ($res["C_Sigla"]!="NLM") {echo '<option value="'.$res["C_Class"].'|'.$res["C_Sigla"].'|x|x|x|x" selected>'.$res["C_Sigla"].' '.$res["C_Name"].'</option>';}
				else {echo '<option value="'.$res["C_Class"].'|'.$res["C_Sigla"].'|x|x|x|x" selected>BDRC</option>';}
				
				$ordner=$res["C_Sigla"].' '.$res["C_Name"];$collection=$res["C_Sigla"].' '.$res["C_Name"];$C_id=$res["id"];$cat=$res["C_Class"];
			}
			else {
				if ($res["C_Sigla"]!="NLM") {echo '<option value="'.$res["C_Class"].'|'.$res["C_Sigla"].'|x|x|x|x">'.$res["C_Sigla"].' '.$res["C_Name"].'</option>';}
				else {echo '<option value="'.$res["C_Class"].'|'.$res["C_Sigla"].'|x|x|x|x">BDRC</option>';}
				}
 }


?>
</select></form>


<td width=25><td><form action="images.php">
<font size=-1>Set

<br><select id="id" name="id" onchange="this.form.submit();">
<option value="x|x|x|x|x|x">---</option>
<?php 

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db11;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
	$sqlQueryl = "SELECT * FROM Sets WHERE C_ID LIKE '$C_id' AND S_IntegratedrKTs LIKE 1 ORDER BY S_IsReferenceSet DESC,S_Ref";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
foreach ($resultats as $res) {
			  if (strcmp($set,$res["S_Ref"])==0){
			   echo '<option value="'.$cat.'|'.$col.'|'.$res["S_Ref"].'|x|x|x" selected>'.$res["S_Ref"].'</option>';
			   $scanner=$res["S_DigitizedBy"];$S_ID=$res["id"];$hostedby=$res["S_ImagesBy"];
			  }
			  else {
			   echo '<option value="'.$cat.'|'.$col.'|'.$res["S_Ref"].'|x|x|x">'.$res["S_Ref"].'</option>';
			}
}

?>
</select></form>




<td width=25><td><form action="images.php">
<?php
if ($col=="Ma" OR $col=="PT") {echo '<font size=-1>Fragment';}
else {echo '<font size=-1>Volume';}
?>

<br><select id="id" name="id" onchange="this.form.submit();">
<option value="x|x|x|x|x|x">---</option>
<?php 

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db11;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
	$sqlQueryl = "SELECT * FROM Volumes WHERE S_ID LIKE '$S_ID' ORDER BY V_Number";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
foreach ($resultats as $res) {
		if(strcmp($vol,$res["V_Ref"])==0) { echo '<option value="'.$cat.'|'.$col.'|'.$set.'|'.$res["V_Ref"].'|x|x" selected>'.$res["V_Name"].'</option>';$nvol=$res["V_Number"];$volnn=$res["V_Name"];}
		else { echo '<option value="'.$cat.'|'.$col.'|'.$set.'|'.$res["V_Ref"].'|x|x">'.$res["V_Name"].'</option>';}
	}
?>
</select></form>

<td width=25><td><form action="images.php">
<?php
if ($col=="Ma" OR $col=="PT") {echo '<font size=-1>Image';}
else {echo '<font size=-1>Page';}
?>

<br><select id="id" name="id" onchange="this.form.submit();">
	<option value="x|x|x|x|x|x">---</option>
<?php

$vol1=substr($vol,1);
$set1=substr($set,2);

	$json=file_get_contents('data/Collections/'.$ordner.'/'.$set1.'/'.$vol1.'.json');
	$jsona=json_decode($json,true);
	$i=0;
	foreach($jsona as $ligne){ 
	if (strcmp($p,$ligne["pagination"])==0 and strcmp($sec,$ligne["psection"])==0) {echo '<option value="'.$cat.'|'.$col.'|'.$set.'|'.$vol.'|'.$ligne["psection"].'|'.$ligne["pagination"].'" selected>'.$ligne["pagination"].' ('.$ligne["psection"].')';if (strcmp("missing",$ligne["file"])==0) {echo '[missing]';} echo '</option>'; $img=$ligne["file"];$sec1=$jsona[$i]["psection"];$p1=$jsona[$i]["pagination"];$sec2=$jsona[$i+2]["psection"];$p2=$jsona[$i+2]["pagination"];$crop=$ligne["location"];$noimg=$i;}
	else {echo '<option value="'.$cat.'|'.$col.'|'.$set.'|'.$vol.'|'.$ligne["psection"].'|'.$ligne["pagination"].'">'.$ligne["pagination"].' ('.$ligne["psection"].')';if (strcmp("missing",$ligne["file"])==0) {echo '[missing]';} echo '</option>';	}
	$i=$i+1;
	}
?>
</select></form>
</form>
<?php
if (strcmp($collection,"NLM National Library of Mongolia")==0) {$coll1="BDRC";} else {$coll1=$collection;}
echo '<td width=100><td>'.$coll1;
?>


</table>

</div>
<div class="leftpage">

<?php

if ($scanner!=""){
	$jsons=file_get_contents('data/scanner/lien.json');
	$jsonsa=json_decode($jsons,true);
foreach($jsonsa as $jss) { if (strcmp($jss['scanner'],$scanner)==0) {$liensc=$jss['lien'];}}
	
echo '<p align=center>images from<br><br><a href="'.$liensc.'" target="_blank"><img src="data/scanner/'.$scanner.'.png" width=80 align="top"></a><br><br>';
}
if ($hostedby!=""){
	$jsons=file_get_contents('data/scanner/lien.json');
	$jsonsa=json_decode($jsons,true);
foreach($jsonsa as $jss) { if (strcmp($jss['scanner'],$hostedby)==0) {$liensc=$jss['lien'];}}
echo '<p align=center>hosted by<br><br><a href="'.$liensc.'" target="_blank"><img src="data/scanner/'.$hostedby.'.png" width=50 align="top"></a><br><br>';
}
?>
</div>

<div class="bodypage2">
<?php 


if($img!="missing")
{ 
include("json/".$set.".php");
}

else { echo '<p  style="text-align:center;font-size:25px;">page '.$p.' missing</p>';}

echo '<p align=center style="font-size:15px;"><a class="lien1" href="images.php?id='.$cat.'|'.$col.'|'.$set.'|'.$vol.'|'.$sec1.'|'.$p1.'">⮜ '.$p1.'</a> - <span style="font-size:25px;border: 2px solid;border-radius: 5px;padding: 10px;">'.$p.'</span> - <a class="lien1" href="images.php?id='.$cat.'|'.$col.'|'.$set.'|'.$vol.'|'.$sec2.'|'.$p2.'">'.$p2.' ⮞</a></p><br>';

if ($p>0 and $p!="x"){
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $link = "https";
else 
      $link = "http";
    
// Here append the common URL characters.
$link .= "://";
    
// Append the host(domain name, ip) to the URL.
$link .= $_SERVER['HTTP_HOST'];
    
// Append the requested resource location to the URL
$link .= $_SERVER['REQUEST_URI'];

echo 'Citation for this page: <input type="text" value="'.$collection.', vol. '.$volnn.', sec. '.$sec.', fol. '.$p.'. ('.$link.')" id="myInput" style="width:70%;">';
}


$colcat=$col.$cat;

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
echo '<h3>Texts on this page</h3>';
	$sec1=str_replace("'","\'",$sec);
	$sqlQueryl = "SELECT * FROM locations WHERE vol LIKE '$vol1' AND sec LIKE '$sec1' ORDER BY debp";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
	$p1=substr($p,0,-1);
	$pc=substr($p,-1);
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
		echo '<a class="lien1" href="cat.php?id='.$rkts.'&typ='.$typ1.'"><img src="sub/link.png" width=30></a><br>';
		
		
		if ($cat==1) {$catl="K";}
		if ($cat==2) {$catl="T";}
		$xml=simplexml_load_file('data/alignments/'.$catl.$rkts.'.xml');
		$refalign=$xml->locref->ref;
		if ($refalign==$refc) { 
		echo '<h3>Compare with other witnesses:</h3> ';
		foreach ($xml->item as $item)
		{
			if ($item->ref->pag==$p AND $item->ref->setid==$set) {
				foreach ($item->align as $align){
					echo '<a href="dual2.php?id='.$cat.'|'.$col.'|'.substr($vol,1).'|'.$sec.'|'.$p.'|'.$align->coll.'|'.$align->vol.'|'.$align->sec.'|'.$align->pag.'" target="_blank" style="text-decoration: none;color:black;">'.$align->ref.'</a> - ';
				}
			}
		}
		echo '<br>';
		}


	
	}
}
}
/*------------NLM*/
if ($col=="NLM" AND $vol!="x")
{
echo '<h3>Text on this page</h3>';
	$sec1=str_replace("'","\'",$sec);
	$sqlQueryl = "SELECT * FROM locationsNLM WHERE vol LIKE '$vol1' AND sec LIKE '$sec1' ORDER BY debp";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
	$p1=substr($p,0,-1);
	$pc=substr($p,-1);
foreach ($resultats as $res) {
	$debp=$res["debp"];
	$debf=$res["debf"];
	$finp=$res["finp"];
	$finf=$res["finf"];

	if (($debp<$p1 AND $finp>$p1) || ($debp==$p1 AND $debf=="a") || ($debp==$p1 AND $debf=="b" AND $pc=="b") || ($finp==$p1 AND $debf=="b") || ($finp==$p1 AND $debf=="a" AND $pc=="a") ) 
	{
				$refc=$res["ref"];
				$sqlcat= "SELECT * FROM NLM WHERE ref LIKE '$refc' LIMIT 1";
				$rescat= $mysqlClient->prepare($sqlcat);
				$rescat->execute();
				$rescats= $rescat->fetchAll();
				$rkts=$rescats[0]['rkts'];
				$typ=$rescats[0]['rktsTyp'];
				if ($typ=="K"){$typ1=1;}
				if ($typ=="T"){$typ1=2;}
				if ($typ=="G"){$typ1=3;}
				if ($typ=="C"){$typ1=4;}
				
		echo $res["ref"].' - ';
		$refc=$res["ref"];
				$sqlQ = "SELECT * FROM NLM WHERE ref LIKE '$refc' LIMIT 1";
				$resultatq = $mysqlClient->prepare($sqlQ);
				$resultatq->execute();
				$resultatqs = $resultatq->fetchAll();
				$rktsc=$resultatqs[0]["rkts"];$rktstypc=$resultatqs[0]["rktsTyp"];
				if ($typ1<4) {
					$sqlQ = "SELECT * FROM rkts WHERE rkts LIKE '$rktsc'  AND rktsTyp LIKE '$rktstypc' LIMIT 1";
				$resultatq = $mysqlClient->prepare($sqlQ);
				$resultatq->execute();
				$resultatqs = $resultatq->fetchAll();
				echo $resultatqs[0]["tib"].' ('.$rescats[0]["refNLM"].')</a>';
				}
				if ($typ1==4) {echo $rescats[0]["tib"].' ('.$rescats[0]["refNLM"].')</a>';}
		if ($typ1<4) {echo '<a class="lien1" href="cat.php?id='.$rkts.'&typ='.$typ1.'"><img src="sub/link.png" width=30></a><br>';}
		
	}
}
}


/* END NLM*/
/*------------Matho*/
if ($col=="Ma" AND $vol!="x")
{
echo '<h3>Texts in this fragment</h3>';
	$sqlQueryl = "SELECT * FROM LocationsMatho WHERE vol LIKE '$vol1'";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
	$refm=$resultats[0]['ref'];
	$sqlQueryl = "SELECT * FROM Matho WHERE ref LIKE '$refm'";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
	
	echo $resultats[0]['description'];
	if ($resultats[0]['rktsTyp']=="K") { echo '<a href="cat.php?id='.$resultats[0]['rkts'].'&typ=1" target="_blank" style="text-decoration:none; color:black;"> (rKTs K-'.$resultats[0]['rkts'].')<img src="sub/link.png" width=30></a>';}
	if ($resultats[0]['rktsTyp']=="T") { echo '<a href="cat.php?id='.$resultats[0]['rkts'].'&typ=2" target="_blank" style="text-decoration:none; color:black;"> (rKTs T-'.$resultats[0]['rkts'].')<img src="sub/link.png" width=30></a>';}
	if ($resultats[0]['rktsTyp']=="G") { echo '<a href="cat.php?id='.$resultats[0]['rkts'].'&typ=3" target="_blank" style="text-decoration:none; color:black;"> (rKTs G-'.$resultats[0]['rkts'].')<img src="sub/link.png" width=30></a>';}

	$refn=$resultats[0]['ref'];
 	$sqln= "SELECT * FROM note WHERE ref LIKE '$refn'";
	$resultatn = $mysqlClient->prepare($sqln);
	$resultatn->execute();
	$resultatsn = $resultatn->fetchAll();
	foreach ($resultatsn as $resn) { $note=$resn['note'];
						$note=str_replace("Dan Martin's Hurried Notes","<a href=\"https://sites.google.com/site/tiblical/matho-fragments-handlist\" target=\"_Blank\">Dan Martin's Hurried Notes</a>",$note);
						echo '<br><i>'.$note.'</i>';}
}

/*------------Pelliot*/
if ($col=="PT" AND $vol!="x")
{
echo '<h3>Texts in this fragment</h3>';
	$refm=substr($vol,1);
	$refm=$refm.'.';
	$sqlQueryl = "SELECT * FROM PelliotTibetain WHERE ref LIKE '$refm%'";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
	foreach($resultats as $res)
	{
		echo $res['ref'].' - '.$res['lalou'].' (lalou)';
	if ($res['rktsTyp']=="K") { echo '<a href="cat.php?id='.$res['rkts'].'&typ=1" target="_blank" style="text-decoration:none; color:black;"> (rKTs K-'.$res['rkts'].')<img src="sub/link.png" width=30></a>';}
	if ($res['rktsTyp']=="T") { echo '<a href="cat.php?id='.$res['rkts'].'&typ=2" target="_blank" style="text-decoration:none; color:black;"> (rKTs T-'.$res['rkts'].')<img src="sub/link.png" width=30></a>';}
	if ($res['rktsTyp']=="G") { echo '<a href="cat.php?id='.$res['rkts'].'&typ=3" target="_blank" style="text-decoration:none; color:black;"> (rKTs G-'.$res['rkts'].')<img src="sub/link.png" width=30></a>';}
	echo '<br>';
	}
}

/*------------LVP IOL Tib J*/
if ($col=="VP" AND $vol!="x")
{
echo '<h3>Texts in this fragment</h3>';
	$refm=substr($vol,4);
	$refm='IOL Tib J '.$refm.'.';
	$sqlQueryl = "SELECT * FROM LaValleePoussin WHERE ref LIKE '$refm%'";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
	foreach($resultats as $res)
	{
		echo $res['ref'].' - '.$res['description'].' (La Vallée Poussin)';
	if ($res['rktsTyp']=="K") { echo '<a href="cat.php?id='.$res['rkts'].'&typ=1" target="_blank" style="text-decoration:none; color:black;"> (rKTs K-'.$res['rkts'].')<img src="sub/link.png" width=30></a>';}
	if ($res['rktsTyp']=="T") { echo '<a href="cat.php?id='.$res['rkts'].'&typ=2" target="_blank" style="text-decoration:none; color:black;"> (rKTs T-'.$res['rkts'].')<img src="sub/link.png" width=30></a>';}
	if ($res['rktsTyp']=="G") { echo '<a href="cat.php?id='.$res['rkts'].'&typ=3" target="_blank" style="text-decoration:none; color:black;"> (rKTs G-'.$res['rkts'].')<img src="sub/link.png" width=30></a>';}
	echo '<br>';
	}
}

/*------------Mongolian*/
if ($col=="Mmk" AND $vol!="x")
{
echo '<h3>Texts on this page</h3>';
	$sqlQueryl = "SELECT * FROM locations WHERE vol LIKE '$vol1' AND sec LIKE '$sec' ORDER BY debp";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
	$p1=substr($p,0,-1);
	$pc=substr($p,-1);
foreach ($resultats as $res) {
	$debp=$res["debp"];
	$debf=$res["debf"];
	$finp=$res["finp"];
	$finf=$res["finf"];

	if (($debp<$p1 AND $finp>$p1) || ($debp==$p1 AND $debf=="a") || ($debp==$p1 AND $debf=="b" AND $pc=="b") || ($finp==$p1 AND $debf=="b") || ($finp==$p1 AND $debf=="a" AND $pc=="a") ) 
	{
				$refc=$res["ref"];
				$sqlcat= "SELECT * FROM mongolian WHERE ref LIKE '$refc' LIMIT 1";
				$rescat= $mysqlClient->prepare($sqlcat);
				$rescat->execute();
				$rescats= $rescat->fetchAll();
				$rkts=$rescats[0]['rkts'];
				$typ=$rescats[0]['rktsTyp'];
				if ($typ=="K"){$typ1=1;}
				if ($typ=="T"){$typ1=2;}
				if ($typ=="G"){$typ1=3;}
				
		echo $res["ref"].' - <span style="font-family:Mongolian Baiti;font-size:25px;">'.$rescats[0]["mng"].' - </span>';
		$refc=$res["ref"];
				$sqlQ = "SELECT * FROM mongolian WHERE ref LIKE '$refc' LIMIT 1";
				$resultatq = $mysqlClient->prepare($sqlQ);
				$resultatq->execute();
				$resultatqs = $resultatq->fetchAll();
				$rktsc=$resultatqs[0]["rkts"];$rktstypc=$resultatqs[0]["rktsTyp"];
				$sqlQ = "SELECT * FROM rkts WHERE rkts LIKE '$rktsc'  AND rktsTyp LIKE '$rktstypc' LIMIT 1";
				$resultatq = $mysqlClient->prepare($sqlQ);
				$resultatq->execute();
				$resultatqs = $resultatq->fetchAll();
				echo $resultatqs[0]["tib"].'</a>';
		echo '<a class="lien1" href="cat.php?id='.$rkts.'&typ='.$typ1.'"><img src="sub/link.png" width=30></a><br>';
				
	
	}
}
}


/*autres sets*/
$filename='data/Collections/'.$ordner.'/volumes.xml';
if (file_exists($filename) and $p!='x') {
echo '<h3>View this image in other sets</h3>';
		$j=-1;$k=0;
		$xmlvol=simplexml_load_file($filename);
		foreach ($xmlvol->item as $itemv){$j++;
			foreach ($itemv->set as $setc){
				if ($setc->vol==$vol){$k=$j;}
				}
			}
		
		foreach($xmlvol->item[$k]->set as $set2){
			if ($set!=$set2->ref){
				$jsons=file_get_contents('data/Collections/'.$ordner.'/'.substr($set2->ref,2).'/'.substr($set2->vol,1).'.json');
				$jsonsa=json_decode($jsons,true);
				foreach ($jsonsa as $jss){
					if ($jss["pagination"]==$p) {$imgs2=$jss["file"];}
				}
				
			echo '<a href="otherset.php?imgs2='.$imgs2.'&set2='.$set2->ref.'&vol='.$set2->vol.'" style="color:#08088a;text-decoration:none;" target="_blank">'.$set2->ref.'</a><br>';
		}}

}


/*fin autres sets*/


/*etexts*/

		$hastext=array("D","F","G","H","J","N","Ng","Q","S","Ty","Gaz","Gbr","Gdg","Gkk","Gpb","Gtb");
		
		if (in_array($col, $hastext)) {
			if ($cat==1) {$xmlvoln=simplexml_load_file('etexts/repository/volKanjur.xml');}
			if ($cat==2) {$xmlvoln=simplexml_load_file('etexts/repository/volTanjur.xml');}
			if ($cat==3) {$xmlvoln=simplexml_load_file('etexts/repository/volTantra.xml');}
			
			foreach ($xmlvoln->item as $itvoln) {if ($itvoln->col==$col AND $itvoln->volref==substr($vol,1)){$volnnn=$itvoln->voln;}}
			echo '<h3>View e-text for this image</h3>';
			$idtext=$cat."|".$col."|".substr($set,2)."|".substr($vol,1)."|".$volnnn."|".$sec."|".$p;
			echo '<a href="etexts/navigator.php?id='.$idtext.'" target="_blank" style="text-decoration:none; color:black;">'.$collection.'<img src="sub/link.png" width=30></a>';
		}



echo '</table>';


?>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
<script>
var acc = document.getElementsByClassName("accordion2");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active2");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
<script>
var acc = document.getElementsByClassName("accordion3");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active3");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>

<script>
function goBack() {
  window.history.back();
}
</script>
</div>
</div>
<?php
$title=$set;
$coll=$col;
$page=$p;
$vol1=substr($vol,1);
header("Location: rkts1/pages/images.html?title={$title}&coll={$coll}&vol={$vol1}&page={$page}&sec={$sec}", true, 301);

if ($p1!="")
{echo '
<div style="position:absolute;top:130px;left: 10px;">
<a href="rkts1/pages/images.html?title='.$title.'&coll='.$coll.'&vol='.$vol1.'&page='.$page.'&sec='.$sec.'" target="_blank"><img src="sub/visitnew.jpg" width=100></a>
</div>
';
}
?>
