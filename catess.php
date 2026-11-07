<!DOCTYPE html> 
<html> 
  
<head> 
    <title>rKTs</title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <link rel="icon" type="image/x-icon" href="sub/logo.ico">

    <link rel="stylesheet" href="sub/style.css"> 
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
  content: '\002B\20';
  color: #08088a;
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
  content: "\2212\20";
}


.panel {
  font-size: 18px;
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}

.panel2 {
  font-size: 18px;
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
  border: 1px solid #ddd;
}
.panel3 {
  font-size: 18px;
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
  border: 1px solid #ddd;
}

 .topcorner{
   position:absolute;
   top:10px;
   right:10px;
  }

</style>

</head>

<body>
<?php

session_Start();


include ('sub/unicode2.php');
$rkts=$_GET['id'];
$typ1=$_GET['typ'];
if ($typ1==1) {$id="K".$rkts;$typ="K";}
if ($typ1==2) {$id="T".$rkts;$typ="T";}
if ($typ1==3) {$id="G".$rkts;$typ="G";}
if ($typ1==5) {$id="B".$rkts;$typ="B";}
?>

<div class="toppage">
<table><tr><td><a href="index.php" style="text-decoration:none;"><img src="sub/logo.png" width=100></a>
<?php 


echo '<td width=50><td>Catalog entry rKTs-'.$id;?>
</table>
<div style="position:absolute;top:10px;right: 10px;">
<form action="results.php">
<input type="text" name="text" placeholder="Quick Search..." size="75">
<input type="hidden" id="typ" name="typ" value="1"> 
<input type="hidden" id="typ2" name="typ2" value="1" > 
<input type="hidden" id="sorte" name="sorte" value="1" > 
</form>
</div>
</div>

<div class="bodypage2">

<?php
try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db12;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
try
{
$mysqlClient2  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db11;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
		die('Erreur : '.$e->getMessage());
}


	$sqlQueryl = "SELECT * FROM rkts WHERE rkts LIKE '$rkts' AND rktsTyp LIKE '$typ' ORDER BY rkts";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();

			$tibtit=$resultats[0]["tib"];
			unicode($tibtit);
			echo '<span style="font-size:40px;">'.$tibtit.'</span><br><span style="font-size:15px;">'.$resultats[0]["tib"].'</span><br>';
			$skt2=$resultats[0]["skt"];
			devanagari($skt2);
			if ($resultats[0]["devanagari"]!="" OR $resultats[0]["skt"]!=""){echo '<br>';}
			if ($resultats[0]["devanagari"]!=""){
			echo '<span style="font-size:25px;">'.$resultats[0]["devanagari"].'</span><br>';
			}
			if ($resultats[0]["skt"]!=""){
			echo '<span style="font-size:15px;">'.$resultats[0]["skt"].'</span><br>';
			}
			if ($resultats[0]["mngunicode"]!="" OR $resultats[0]["mng"]!=""){echo '<br>';}
			if ($resultats[0]["mngunicode"]!=""){
			echo '<span style="font-family:Mongolian Baiti;font-size:35px;">'.$resultats[0]["mngunicode"].'</span><br>';
			}
			if ($resultats[0]["mng"]!=""){
			echo '<span style="font-size:15px;">'.$resultats[0]["mng"].'</span><br>';
			}
			if ($resultats[0]["engl"]!=""){
			echo '<br><span style="font-size:25px;">'.$resultats[0]["engl"].'</span><br>';
			}
			
if ($_SESSION['user']=="BL" OR $_SESSION['user']=="MV") {echo '<br><button><a href="sqleditor/editkernel.php?id='.$typ.'-'.$rkts.'" target="_Blank">edit</a></button><br><br>';}

?>
<br>

<button class="accordion2 active">Alternative titles <span style="font-size:10px;">(click here to show/hide)</span></button><div class="panel" style="display: none;"><div>
<?php
$arr=array();
	$sqlQueryl = "SELECT * FROM catalog WHERE rkts LIKE '$rkts' AND rktsTyp LIKE '$typ' ORDER BY rkts";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
foreach($resultats as $ress){ if ($ress['tib']!="") {array_push($arr,$ress['tib']);}}
$arr2=array_unique($arr);
foreach($arr2 as $ar2) { 
	$art=$ar2; unicode($art);
	echo '<span class="tib" style="font-size:30px;">'.$art.'</span><br>'.$ar2.'';
	$ar22=str_replace("'","\'",$ar2);
	$sqlQueryl2 = "SELECT * FROM catalog WHERE tib LIKE '$ar22' AND tib NOT LIKE '' AND rktsTyp LIKE '$typ' ORDER BY coll";
	$resultatl2 = $mysqlClient->prepare($sqlQueryl2);
	$resultatl2->execute();
	$resultats2 = $resultatl2->fetchAll();
	$list=array();
	foreach($resultats2 as $re2) { array_push($list,$re2["coll"]);}
	$list=array_unique($list);
	$ll="";
	foreach($list as $li) { $ll=$ll.$li.'-';}
	echo '<br>'.substr($ll,0,-1).'<hr>';
	}

?>
</div></div><br><br>



<button class="accordion2 active">Details</button><div class="panel" style="display: block;"><div>
<?php
$personlist=array();
/*coll with handlist*/
$arr=array();
	$sqlQueryl = "SELECT * FROM Collections WHERE C_Handlist LIKE 1 ORDER BY C_Sigla";
	
	$resultatl = $mysqlClient2->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
	foreach($resultats as $res){
		if (($res["C_Sigla"]=="A" AND $res["C_Class"]==$typ1)OR ($res["C_Sigla"]=="C" AND $res["C_Class"]==$typ1) OR ($res["C_Sigla"]=="D" AND $res["C_Class"]==$typ1) OR ($res["C_Sigla"]=="N" AND $res["C_Class"]==$typ1) OR ($res["C_Sigla"]=="Q" AND $res["C_Class"]==$typ1) OR ($res["C_Sigla"]!="A" AND $res["C_Sigla"]!="C" AND $res["C_Sigla"]!="D" AND $res["C_Sigla"]!="N" AND $res["C_Sigla"]!="Q")) 
		{array_push($arr,$res["C_Sigla"].'#'.$res["C_Name"].'#'.$res["C_Class"].'#'.$res["C_NameTib"]);}		
		}
/*END coll with handlist*/
	
foreach($arr as $ari)
{
	$aris=explode('#',$ari)[0];
	$arin=explode('#',$ari)[1];
	$arit=explode('#',$ari)[2];
	$aritib=explode('#',$ari)[3];
	
	$sqlQueryl = "SELECT * FROM catalog WHERE rkts LIKE '$rkts' AND rktsTyp LIKE '$typ' AND coll LIKE '$aris' ORDER BY rkts";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
	if ($resultats[0]["id"]!="")
	{
		echo '<button class="accordion">'.$aris.' '.$arin.' / <span style="font-size:25px;">'.$aritib.'</span></button><div class="panel2">';

	foreach($resultats as $res)
	{
		echo '<br><span style="font-weight:bold; background-color:#d0d0fc; border: 2px solid #08088a; padding:10px; border-radius: 5px;">'.$res["ref"].'</span><br>';
		$tib=$res["tib"];
		$tibu=$tib; unicode($tibu);
		echo '<br><font size=+3>'.$tibu.'</font><br>'.$tib;
		$tib=$res["skt"];
		$reff=$res["ref"];$reffe=$reff;
		if ($tib!="") {
		$tibu=$tib; unicode($tibu);
		echo '<br><font size=+3>'.$tibu.'</font><br>'.$tib;
		}
		echo '</table><br><br>';
/*etexts*/
		if($aris=="D" AND $typ=="T") {$aris2="TD";}
		elseif($aris=="G" AND $typ=="T") {$aris2="TG";}
		elseif($aris=="N" AND $typ=="T") {$aris2="TN";}
		else {$aris2=$aris;}

		$hastext=array("D","F","G","H","J","N","Ng","Q","S","Gaz","Gbr","Gdg","Gkk","Gpb","Gtb");
		
		if (in_array($aris, $hastext)) {
			echo '<br><span style="font-size:20px;font-weight:bold;text-decoration: underline;">e-text</span> <a href="etexts/tcomplete.php?id='.$res["ref"].'&coll='.$aris2.'" target="_blank" style="text-decoration:none; color:black;"><img src="sub/link.png" width=30></a>';
		}
		
/*Structure*/
			$sq = "SELECT * FROM chapters WHERE ref LIKE '$reff'";
			$rsq = $mysqlClient->prepare($sq);
			$rsq->execute();
			$rsqs = $rsq->fetchAll();
			$sq1 = "SELECT * FROM bampo WHERE ref LIKE '$reff'";
			$rsq1 = $mysqlClient->prepare($sq1);
			$rsq1->execute();
			$rsqs1 = $rsq1->fetchAll();
			if ($rsqs[0]["id"]!="" OR $rsqs1[0]["id"]!=""){
				echo '<br><span style="font-size:20px;font-weight:bold;text-decoration: underline;">Textual structure</span>';
				echo '<a href="structure.php?reff='.$reff.'&typ='.$typ.'&aris='.$aris.'" target="_blank"><img src="sub/link.png" width=30></a>';


			}

		echo '<br><span style="font-size:20px;font-weight:bold;text-decoration: underline;">Location</span><br><table><tr>';
/*Locations*/
			$sett="";
			$sq = "SELECT * FROM locations WHERE ref LIKE '$reff' ORDER BY setid";
			$rsq = $mysqlClient->prepare($sq);
			$rsq->execute();
			$rsqs = $rsq->fetchAll();
			foreach($rsqs as $ls) { 
			
							$setidim=$ls["setid"];
							$sqlim = "SELECT * FROM Sets WHERE S_Ref LIKE '$setidim'";
							$resim = $mysqlClient2->prepare($sqlim);
							$resim->execute();
							$resims = $resim->fetchAll();
							$imoui=$resims[0]["S_IntegratedrKTs"];
			
			
				if (strcmp($sett,$ls["setid"])!=0) { echo '<td width=50><td style="border-left:1px solid #08088a;padding:5px;">';}
				echo '<sub style="color:gray;font-style: italic;"> set</sub> '.$ls["setid"].': '; 
				if($typ=="K") {$typn=1;}
				if($typ=="T") {$typn=2;}
				if($typ=="G") {$typn=3;}
				$voll="I".$ls["vol"];
							$sqlim = "SELECT * FROM Volumes WHERE V_Ref LIKE '$voll'";
							$resim = $mysqlClient2->prepare($sqlim);
							$resim->execute();
							$resims = $resim->fetchAll();
							$volll=$resims[0]["V_Name"];
							echo '<sub style="color:gray;font-style: italic;">volume</sub> '.$volll.' - ';
				
				echo '<sub style="color:gray;font-style: italic;"> folios</sub> '.$ls["debp"].$ls["debf"].'<sub>'.$ls["debl"].'</sub>-'.$ls["finp"].$ls["finf"].'<sub>'.$ls["finl"].'</sub>';
					if ($imoui==1) { echo '<a href="images.php?id='.$arit.'|'.$aris.'|'.$ls["setid"].'|I'.$ls["vol"].'|'.$ls["sec"].'|'.$ls["debp"].$ls["debf"].'" target="_blank"><img src="sub/link.png" width=30></a>'; 
				if ($aris=="C" OR $aris=="D"  OR $aris=="Go" OR $aris=="H" OR $aris=="He" OR $aris=="J" OR $aris=="N" OR $aris=="Q" OR $aris=="R" OR $aris=="S" OR $aris=="Ty" OR $aris=="U" OR $aris=="Z") { echo '<br>complete text <a href="imagescomplete.php?id='.$res["ref"].'&set='.$ls["setid"].'" target="_blank"><img src="sub/link.png" width=30></a>';}
					}
				echo '<br>';
				$sett=$ls["setid"];
				}
				
echo '</table>';
/*Colophon*/
$coloph=$res["coloph"]; $coloph1=$coloph; unicode($coloph1);
if ($coloph!=""){
echo '<br><span style="font-size:20px;font-weight:bold;text-decoration: underline;">Colophon</span>';
							$setidim=$rsqs[0]["setid"];
							$sqlim = "SELECT * FROM Sets WHERE S_Ref LIKE '$setidim'";
							$resim = $mysqlClient2->prepare($sqlim);
							$resim->execute();
							$resims = $resim->fetchAll();
							$imoui=$resims[0]["S_IntegratedrKTs"];

if ($imoui==1) {echo '<a href="images.php?id='.$arit.'|'.$aris.'|'.$rsqs[0]["setid"].'|I'.$rsqs[0]["vol"].'|'.$rsqs[0]["sec"].'|'.$rsqs[0]["finp"].$rsqs[0]["finf"].'" target="_blank"><img src="sub/link.png" width=30></a>';}
echo '<br><span class="tib" style="font-size:25px;">'.$coloph1.'</span><br>'.$coloph;
}

/*persons*/
			$sq = "SELECT * FROM translators WHERE ref LIKE '$reff'";
			$rsq = $mysqlClient->prepare($sq);
			$rsq->execute();
			$rsqs = $rsq->fetchAll();
			if ($rsqs[0]["id"]!=""){
			echo '<br><br><span style="font-size:20px;font-weight:bold;text-decoration: underline;">Translators and Revisors</span><br>';
			foreach($rsqs as $rs)
			{
				array_push($personlist,$rs["rid"]);
				echo $rs["name"].' ('.$rs["role"].')<br>';
			}
			}
			
/*Notes*/
			$sq = "SELECT * FROM note WHERE ref LIKE '$reff'";
			$rsq = $mysqlClient->prepare($sq);
			$rsq->execute();
			$rsqs = $rsq->fetchAll();
			if ($rsqs[0]["id"]!=""){
			echo '<br><br><span style="font-size:20px;font-weight:bold;text-decoration: underline;">Notes</span><br>';
			foreach($rsqs as $rs)
			{
				echo $rs["note"].'<br>';
			}
			}
			
			
if ($_SESSION['user']=="BL" OR $_SESSION['user']=="MV") {echo '<br><button><a href="sqleditor/editcatalog.php?id='.$reffe.'" target="_Blank">edit</a></button>';}
		echo '<hr>';
	}
	echo '</div><br>';
}
}


/*EXTRA Collections*/

echo '<br><span>Additional miscellaneous Collections</span>';
/*----------------------------------*/
			$sq = "SELECT * FROM Matho WHERE rkts LIKE '$rkts' AND rktsTyp LIKE '$typ'";
			$rsq = $mysqlClient->prepare($sq);
			$rsq->execute();
			$rsqs = $rsq->fetchAll();
			if ($rsqs[0]["id"]!="")
			{
					echo '<button class="accordion">Matho</button><div class="panel2">';
					foreach($rsqs as $rsm)
					{
		echo '<table><td valign="top"><br><span style="font-weight:bold; background-color:#d0d0fc; border: 2px solid #08088a; padding:10px; border-radius: 5px;">'.$rsm["ref"].'</span>';
		$tib=$rsm["tib"];
		$tibu=$tib; unicode($tibu);
		echo '<td width=50><td><span class="tib" style=font-size:30px;font-weight:bold;">'.$tibu.'</span><br><span style=font-size:18px;font-weight:bold;">'.$tib.'</span><br>';
		echo '</table>';
		$refm=$rsm["ref"];
		echo $rsm['description'];
			$sqm = "SELECT * FROM LocationsMatho WHERE ref LIKE '$refm'";
			$rsqm = $mysqlClient->prepare($sqm);
			$rsqm->execute();
			$rsqsm = $rsqm->fetchAll();
		echo '<br><br><span style="font-size:20px;font-weight:bold;text-decoration: underline;">Location</span><br>';
				$voll="I".$rsqsm[0]["vol"];
							$sqlim = "SELECT * FROM Volumes WHERE V_Ref LIKE '$voll'";
							$resim = $mysqlClient2->prepare($sqlim);
							$resim->execute();
							$resims = $resim->fetchAll();
							$volll=$resims[0]["V_Name"];
		echo $rsqsm[0]["setid"].': Frag. '.$volll.' - {'.$rsqsm[0]["debp"].'}'.$rsqsm[0]["debf"].'<sub>'.$rsqsm[0]["debl"].'</sub>-{'.$rsqsm[0]["finp"].'}'.$rsqsm[0]["finf"].'<sub>'.$rsqsm[0]["finl"].'</sub>' ;
		echo '<a href="images.php?id=4|Ma|MW1BL9|I'.$rsqsm[0]["vol"].'|'.$rsqsm[0]["sec"].'|'.$rsqsm[0]["debp"].$rsqsm[0]["debf"].'" target="_blank"><img src="sub/link.png" width=30></a>';
		
	echo '<br><br><u>Note</u>: <br>';

			$refn=$rsm['ref'];
 	$sqln= "SELECT * FROM note WHERE ref LIKE '$refn'";
	$resultatn = $mysqlClient->prepare($sqln);
	$resultatn->execute();
	$resultatsn = $resultatn->fetchAll();
	
	foreach ($resultatsn as $resn) { $note=$resn['note'];
						$note=str_replace("Dan Martin's Hurried Notes","<a href=\"https://sites.google.com/site/tiblical/matho-fragments-handlist\" target=\"_Blank\">Dan Martin's Hurried Notes</a>",$note);
						echo '<tr><td><td><i>'.$note.'</i>';}
echo '<hr>';
		
		
					}
					echo '</div><br>';
			}
/*----------------------------------*/
			
			
			$sq = "SELECT * FROM NLM WHERE rkts LIKE '$rkts' AND rktsTyp LIKE '$typ'";
			$rsq = $mysqlClient->prepare($sq);
			$rsq->execute();
			$rsqs = $rsq->fetchAll();
			if ($rsqs[0]["id"]!="")
			{
					echo '<button class="accordion">BDRC</button><div class="panel2">';
					foreach($rsqs as $rsm)
					{
						if ($rsm["bookType"]=="MS"){$bt="Manuscript";}
						if ($rsm["bookType"]=="XYL"){$bt="Xylograph";}
		echo '<br><span style="font-weight:bold; background-color:#d0d0fc; border: 2px solid #08088a; padding:10px; border-radius: 5px;">'.$rsm["ref"].'</span> ('.$bt.')';
		$tib=$rsm["tib"];
		$tibu=$tib; unicode($tibu);
		echo '<br><font size=+3>'.$tibu.'</font><br>'.$tib.'</span><br>';
		$refm=$rsm["ref"];
			$sqm = "SELECT * FROM locationsNLM WHERE ref LIKE '$refm'";
			$rsqm = $mysqlClient->prepare($sqm);
			$rsqm->execute();
			$rsqsm = $rsqm->fetchAll();
		echo '<br><br><span style="font-size:20px;font-weight:bold;text-decoration: underline;">Location</span><br>';
		echo $rsqsm[0]["debp"].$rsqsm[0]["debf"].'<sub>'.$rsqsm[0]["debl"].'</sub>-'.$rsqsm[0]["finp"].$rsqsm[0]["finf"].'<sub>'.$rsqsm[0]["finl"].'</sub>' ;
		echo '<a href="images.php?id=4|NLM|MWNLM|I'.$rsqsm[0]["vol"].'|'.$rsqsm[0]["sec"].'|'.$rsqsm[0]["debp"].$rsqsm[0]["debf"].'" target="_blank"><img src="sub/link.png" width=30></a>';
		echo '<hr>';
					}
					echo '</div><br>';
			}
	

/*Mongolian Collections*/
$aris="Mmk";
echo '<br><br><span>Mongolian Canon</span>';
/*----------------------------------*/
			$sq = "SELECT * FROM mongolian WHERE rkts LIKE '$rkts' AND rktsTyp LIKE '$typ' AND coll LIKE 'Mmk'";
			$rsq = $mysqlClient->prepare($sq);
			$rsq->execute();
			$rsqs = $rsq->fetchAll();
			if ($rsqs[0]["id"]!="")
			{
					echo '<button class="accordion">Mmk Printed Mongolian Kanjur</button><div class="panel2">';
					foreach($rsqs as $rsm)
					{
		echo '<br><span style="font-weight:bold; background-color:#d0d0fc; border: 2px solid #08088a; padding:10px; border-radius: 5px;">'.$rsm["ref"].'</span>';
		$mng=$rsm["mng"];
		$tib=$rsm["tib"];
		$coloph=$rsm["coloph"]; 
		echo '<br><br><span style="font-family:Mongolian Baiti;font-size:35px;">'.$mng.'</span><br>';
		$refm=$rsm["ref"];

		echo '<br><span style="font-size:20px;font-weight:bold;text-decoration: underline;">Location</span><br><table><tr>';

			$sqm = "SELECT * FROM locations WHERE ref LIKE '$refm'";
			$rsqm = $mysqlClient->prepare($sqm);
			$rsqm->execute();
			$rsqsm = $rsqm->fetchAll();
			
			foreach($rsqsm as $ls) { 
			
							$setidim=$ls["setid"];
							$sqlim = "SELECT * FROM Sets WHERE S_Ref LIKE '$setidim'";
							$resim = $mysqlClient2->prepare($sqlim);
							$resim->execute();
							$resims = $resim->fetchAll();
							$imoui=$resims[0]["S_IntegratedrKTs"];
			
			
				if (strcmp($sett,$ls["setid"])!=0) { echo '<td width=50><td style="border-left:1px solid #08088a;padding:5px;">';}
				echo $ls["setid"].': '; 
				if($typ=="K") {$typn=1;}
				if($typ=="T") {$typn=2;}
				if($typ=="G") {$typn=3;}
				$typn=5;

				$voll="I".$ls["vol"];
							$sqlim = "SELECT * FROM Volumes WHERE V_Ref LIKE '$voll'";
							$resim = $mysqlClient2->prepare($sqlim);
							$resim->execute();
							$resims = $resim->fetchAll();
							$volll=$resims[0]["V_Name"];
							echo $volll.' - ';
				
				echo $ls["debp"].$ls["debf"].'<sub>'.$ls["debl"].'</sub>-'.$ls["finp"].$ls["finf"].'<sub>'.$ls["finl"].'</sub>';
					if ($imoui==1) { echo '<a href="images.php?id='.$typn.'|'.$aris.'|'.$ls["setid"].'|I'.$ls["vol"].'|'.$ls["sec"].'|'.$ls["debp"].$ls["debf"].'" target="_blank"><img src="sub/link.png" width=30></a>'; 
				
					}
				echo '<br>';
				$sett=$ls["setid"];
				}
echo '</table>';
		echo '<br><span style="font-size:20px;font-weight:bold;text-decoration: underline;">Colophon</span><br>';
		echo '<br><span style="font-family:Mongolian Baiti;font-size:25px;">'.$coloph.'</span><br>';

					}
					echo '</div><br>';
			}

	
?>
</div></div><br><br>


<button class="accordion2 active">Persons</button><div class="panel" style="display: block;"><div>
<?php
$personlist=array_unique($personlist);
foreach($personlist as $per){
	if ($per !="" AND $per !="#" AND $per!="bdr:"){
			$sq = "SELECT * FROM Persons WHERE ref LIKE '$per'";
			$rsq = $mysqlClient->prepare($sq);
			$rsq->execute();
			$rsqs = $rsq->fetchAll();
			echo $rsqs[0]["name"].'<a href="persons.php?id='.$per.'" target="_blank"><img src="sub/link.png" width=30></a><br>';

}}
echo '<p style="text-align:right;">source rKTs & <a href="https://www.bdrc.io/blog/2022/01/21/the-authors-and-translators-identification-initiative/" target="_blank" style="color:black;text decoration:underline;"><img src="sub/ATII.jpg" width=150 style="vertical-align: middle;"></a> </i></p>';

?>
</div></div><br><br>


<button class="accordion2 active">Links</button><div class="panel" style="display: block;"><div>
<?php
if ($typ=="K") {
if ($rkts<10) {$refbdrc="000".$rkts;}
if ($rkts<100 and $rkts>9) {$refbdrc="00".$rkts;}
if ($rkts<1000 and $rkts>99) {$refbdrc="0".$rkts;}
/*BDRC*/
echo '<table><tr><td height=50 width=250><a href="http://library.bdrc.io/show/bdr:WA0RK'.$refbdrc.'" target="_void" style="text-decoration:none; color:black;"><img src="../sub/bdrc.jpg" width=70><td width=15><td valign="center"><a href="http://library.bdrc.io/show/bdr:WA0RK'.$refbdrc.'" target="_void" style="text-decoration:none; color:black;">BDRC bdr:WAORK'.$refbdrc.'</a>';

/*84000*/
$xmldn = simplexml_load_file('data/Collections/D Derge Kanjur/D.xml'); 
foreach($xmldn->item as $item) { if ($item->rkts==$rkts) {$dergen=$item->ref;} $dergen=str_replace('D','',$dergen);}
echo '<tr><td height=50 width=250><a href="https://read.84000.co/translation/toh'.$dergen.'.html" target="_blank" style="text-decoration:none; color:black;"><img src="../sub/84000.png" width=100><td><td valign="center"><a href="https://read.84000.co/translation/toh'.$dergen.'.html" target="_blank" style="text-decoration:none; color:black;">84000 Toh '.$dergen.'</a>';

/*Buddhanexus*/
function read($csv){
    $file = fopen($csv, 'r');
    while (!feof($file) ) {
        $line[] = fgetcsv($file, 1024);
    }
    fclose($file);
    return $line;
}
$csv = 'data/extra/bn_bdrc_list.csv';
$csv = read($csv);
$idbn="000".$rkts;
$idbn=substr($idbn,-4);
$idbn="WA0RK".$idbn;
foreach($csv as $entree){
	$rktsbn=explode('	',$entree[0])[0];
	$bn=explode('	',$entree[0])[1];
	if (strcmp($idbn,$rktsbn)==0) {$bnlien=$bn;}
}
echo '<tr><td height=50 width=250><a href="https://buddhanexus.net/tib/text/'.$bnlien.'" target="_void" style="text-decoration:none; color:black;"><img src="../sub/nexus.png" width=70><td width=15><td valign="center"><a href="https://buddhanexus.net/tib/text/'.$bnlien.'" target="_void" style="text-decoration:none; color:black;">BuddhaNexus '.$bnlien.'</a>';

/*Adarsha*/
$deja=0;
$xmlad = simplexml_load_file('../data/extra/adarshaLocJiang.xml'); 
foreach($xmlad->item as $itemad)
{ if (strcmp($itemad->rkts,$rkts)==0 and $deja!=1) {
echo '<tr><td height=100 width=250><a href="https://adarsha.dharma-treasure.org/kdbs/jiangkangyur?locale=bo&pbId='.$itemad->loc.'" target="_blank" style="text-decoration:none;color:black;"><img src="../sub/adarsha.png" width=100><td><td valign="center"><a href="https://adarsha.dharma-treasure.org/kdbs/jiangkangyur?locale=bo&pbId='.$itemad->loc.'" target="_blank" style="text-decoration:none;color:black;"> འཇང་བཀའ་འགྱུར།</a><br><br>'; 
$deja=1;
}}


}
?>
</div></div>

</div>
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
