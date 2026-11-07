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


if ($cat==1) {$catName="Kanjur";}
if ($cat==2) {$catName="Tanjur";}
if ($cat==3) {$catName="Old Tantra";}


include('functions/align.php');
include('functions/nextpage.php');
include('functions/rktsno.php');


?>
<div class="toppage">
<table><tr><td><a href="index.php" style="text-decoration:none;"><img src="sub/logo.png" width=100></a>
<td width=50><td>Images viewer
<td width=50><td><form action="images.php">
<font size=-1>Category
<br><select id="id" name="id" onchange="this.form.submit();">  
<option value="x|x|x|x|x|x">---</option>
<?php
	if ($cat==1) { echo '<option value="1|x|x|x|x|x" selected>Kanjur and Canonical collections</option>';} else {echo '<option value="1|x|x|x|x|x">Kanjur and Canonical collections</option>';}
	if ($cat==2) { echo '<option value="2|x|x|x|x|x" selected>Tanjur</option>';} else {echo '<option value="2|x|x|x|x|x">Tanjur</option>';}
	if ($cat==3) { echo '<option value="3|x|x|x|x|x|x" selected>Old Tantra</option>';} else {echo '<option value="3|x|x|x|x">Old Tantra</option>';}
?>
</select></form>

<td width=25><td><form action="images.php">
<font size=-1>Collection
<br><select id="id" name="id" onchange="this.form.submit();">
<option value="x|x|x|x|x|x">---</option>
<?php
$xml=simplexml_load_file('data/Collections/collections.xml');
 foreach($xml->item as $item) {
	 if (strcmp($catName,$item->category)==0 and $item->set->integratedrKTs==1){
			if (strcmp($col,$item->sigla)==0) {echo '<option value="'.$cat.'|'.$col.'|x|x|x|x" selected>'.$col.' '.$item->name.'</option>';
				$ordner=$col.' '.$item->name;$collection=$col.' '.$item->name;}
			else {echo '<option value="'.$cat.'|'.$item->sigla.'|x|x|x|x">'.$item->sigla.' '.$item->name.'</option>';}
	 
 }}


?>
</select></form>

<td width=25><td><form action="images.php">
<font size=-1>Set

<br><select id="id" name="id" onchange="this.form.submit();">
<option value="x|x|x|x|x|x">---</option>
<?php 
$xml=simplexml_load_file('data/Collections/collections.xml');
 foreach($xml->item as $item) {
	  if (strcmp($catName,$item->category)==0 and strcmp($col,$item->sigla)==0){
		  foreach ($item->set as $sett){
			  if ($sett->integratedrKTs==1){
			  if (strcmp($set,$sett->ref)==0){
			   echo '<option value="'.$cat.'|'.$item->sigla.'|'.$sett->ref.'|x|x|x" selected>'.$sett->ref.'</option>';
			   $descr=$sett->description;$scanner=$sett->digitizedBy;
			  }
			  else {
			   echo '<option value="'.$cat.'|'.$item->sigla.'|'.$sett->ref.'|x|x|x">'.$sett->ref.'</option>';
			  }
			   }
	  }
 }
 }
?>
</select></form>

<td width=25><td><form action="images.php">
<font size=-1>Volume

<br><select id="id" name="id" onchange="this.form.submit();">
<option value="x|x|x|x|x|x">---</option>
<?php 
	$set1=str_replace("MW","",$set);
	$json=file_get_contents('data/Collections/'.$ordner.'/vol'.$set1.'.json');
	$jsona=json_decode($json,true);
	foreach($jsona as $ligne){	
		if(strcmp($vol,$ligne["bdrc"])==0) { echo '<option value="'.$cat.'|'.$col.'|'.$set.'|'.$ligne["bdrc"].'|x|x" selected>'.$ligne["vol"].'</option>';$nvol=$ligne["vol"];}
		else { echo '<option value="'.$cat.'|'.$col.'|'.$set.'|'.$ligne["bdrc"].'|x|x">'.$ligne["vol"].'</option>';}
	}
?>
</select></form>

<td width=25><td><form action="images.php">
<font size=-1>Page 

<br><select id="id" name="id" onchange="this.form.submit();">
	<option value="x|x|x|x|x|x">---</option>
<?php
$vol1=substr($vol,1);
	$json=file_get_contents('data/Collections/'.$ordner.'/'.$set1.'/'.$vol1.'.json');
	$jsona=json_decode($json,true);
	$i=0;
	foreach($jsona as $ligne){ 
	if (strcmp($p,$ligne["pagination"])==0 and strcmp($sec,$ligne["psection"])==0) {echo '<option value="'.$cat.'|'.$col.'|'.$set.'|'.$vol.'|'.$ligne["psection"].'|'.$ligne["pagination"].'" selected>'.$ligne["pagination"].' ('.$ligne["psection"].')';if (strcmp("missing",$ligne["file"])==0) {echo '[missing]';} echo '</option>'; $img=$ligne["file"];$sec1=$jsona[$i]["psection"];$p1=$jsona[$i]["pagination"];$sec2=$jsona[$i+2]["psection"];$p2=$jsona[$i+2]["pagination"];}
	else {echo '<option value="'.$cat.'|'.$col.'|'.$set.'|'.$vol.'|'.$ligne["psection"].'|'.$ligne["pagination"].'">'.$ligne["pagination"].' ('.$ligne["psection"].')';if (strcmp("missing",$ligne["file"])==0) {echo '[missing]';} echo '</option>';	}
	$i=$i+1;
	}
?>
</select></form>
</form>
<?php

echo '<td width=100><td>'.$collection;
?>


</table>

</div>
<div class="leftpage">

<?php

if ($scanner!=""){
echo '<p align=center>images from<br><br><img src="data/scanner/'.$scanner.'.png" width=80 align="top"><br><br>';
}
?>
<hr><a href="report.php" target="_blank" style="text-decoration:none;color:black;">report an error</a>

<hr><a href="dpe.php" style="text-decoration:none;font-size:14px;" target="_blank">Image viewer for the dPe bsdur ma</a></div>

<div class="bodypage2">
<?php 


if($img!="missing")
{ 
if (strcmp($col,"Gpb")==0){
	$img=str_replace("tif","png",$img);
	$img=str_replace("::","--",$img);
	
$imgser=substr($img,-8,4);

	$json1 = 'DIGIT/Gpb/'.$vol.'/I'.$imgser.'.png';
echo '<div id="openseadragon1" style="width: 95%; height:500px; border:1px solid #08088a;"></div>';


echo '
<script src="seadragon/openseadragon.min.js"></script>
<script type="text/javascript">
    var viewer = OpenSeadragon({
		 maxZoomLevel: 5.0,
        id: "openseadragon1",
        prefixUrl: "seadragon/images/",

		sequenceMode: true,
		
   tileSources:   
   [
	  {
			maxZoomLevel: 10.0,
            type: \'image\',
            url:  \''.$json1.'\',
            buildPyramid: false
        },
   ]
    });
	
</script>';

}

else{

if (strcmp($col,"T")==0) 		{
										if (substr($vol,-2)>50) {$volt1="https://img.toyobunko-lab.jp/iiif/tibetan/manuscript_kanjur/".substr($vol,-3);}
										else {$volt1="https://img.toyobunko-lab.jp/iiif/ekai2/".substr($vol,-2);}
										echo $volt1;
										$json = file_get_contents($volt1."/".$img."/info.json");
								}
elseif (strcmp($col,"Cz")==0) 	{ 
										$imgeap=substr($img,0,-4);
										$voleap=substr($vol,1);
										$voleap=str_replace('-','_',$voleap);
										include ("jsoneap/Cz.php");
								}
elseif (strcmp($col,"Dd")==0) 	{ 
										$imgeap=substr($img,0,-4);
										$voleap=substr($vol,1);
										$voleap=str_replace('-','_',$voleap);
										include ("jsoneap/Dd.php");
								}
elseif (strcmp($col,"Dk")==0) 	{ 
										$imgeap=substr($img,0,-4);
										$voleap=substr($vol,1);
										$voleap=str_replace('-','_',$voleap);
										include ("jsoneap/Dk.php");
								}
elseif (strcmp($col,"Gt")==0) 	{ 
										$imgeap=substr($img,0,-4);
										$voleap=substr($vol,1);
										$voleap=str_replace('-','_',$voleap);
										include ("jsoneap/Gt.php");
								}
elseif (strcmp($col,"Np")==0) 	{ 
										$imgeap=substr($img,0,-4);
										$voleap=substr($vol,1);
										$voleap=str_replace('-','_',$voleap);
										include ("jsoneap/Np.php");
								}
elseif (strcmp($col,"Pj")==0) 	{ 
										$imgeap=substr($img,0,-4);
										$voleap=substr($vol,1);
										$voleap=str_replace('-','_',$voleap);
										include ("jsoneap/Pj.php");
								}
elseif (strcmp($col,"Pz")==0) 	{ 
										$imgeap=substr($img,0,-4);
										$voleap=substr($vol,1);
										$voleap=str_replace('-','_',$voleap);
										include ("jsoneap/Pz.php");
								}
elseif (strcmp($col,"C")==0 and strcmp($set,"MWEAP1034-2-2")==0) 	{ 
										$imgeap=substr($img,0,-4);
										$voleap=substr($vol,1);
										$voleap=str_replace('-','_',$voleap);
										include ("jsoneap/C.php");
								}
elseif (strcmp($col,"W")==0) 	{ 
										
										include ("jsoneap/W.php");
								}
elseif (strcmp($col,"zzz1")==0) 	{ 
										include ('jsoneap/dkbc1.php');
								}
								
								
else {$json = file_get_contents("https://iiif.bdrc.io/".$img."/info.json");}

echo '<p align="center"><div id="openseadragon1" style="width: 95%; height:500px; border:1px solid #08088a;"></div>';
echo '<br>'.$descr;
echo ' (Collection: '.$collection;
echo ' - Set: '.$set;
echo ' - Volume: '.$vol;
echo ' - Section: '.$sec;
echo ' - image: '.$p.')';


echo '
<script src="seadragon/openseadragon.min.js"></script>
<script type="text/javascript">
    var viewer = OpenSeadragon({
		 maxZoomLevel: 5.0,
        id: "openseadragon1",
        prefixUrl: "seadragon/images/",

		sequenceMode: true,
		
   tileSources:   
   [
	  '.$json.'
   ]
    });
	
</script>';


}

}

else { echo '<p  style="text-align:center;font-size:25px;">page '.$p.' missing</p>';}

echo '<p align=center style="font-size:20px;"><a class="lien1" href="images.php?id='.$cat.'|'.$col.'|'.$set.'|'.$vol.'|'.$sec1.'|'.$p1.'">⮜ '.$p1.'</a> - <a class="lien1" href="images.php?id='.$cat.'|'.$col.'|'.$set.'|'.$vol.'|'.$sec2.'|'.$p2.'">'.$p2.' ⮞</a></p><br>';

$colcat=$col.$cat;
/*
if (strcmp($colcat,"D1")==0 OR strcmp($colcat,"Gpb3")==0 OR strcmp($colcat,"H1")==0 OR strcmp($colcat,"J1")==0 OR strcmp($colcat,"D2")==0) {
if  (strcmp($colcat,"D2")==0) {$col1="TD";} else {$col1=$col;}
$vol1=substr($vol,1);
echo '<h3>e-text</h3>';
$xml=simplexml_load_file('data/etext/'.$col1.'/'.$vol1.'.xml');
foreach($xml->item as $item){
	if (strcmp($p,substr($item->p,0,-1))==0){
	echo $item->text.'<br>';
	}}

	echo '<br>';

}
*/
/*Textes sur la page*/
echo '<table><tr><td valign="top"><h3>Texts on this page</h3>';

$chemint='data/Collections/'.$collection.'/'.$col.'.xml';
if (substr($p,-1)=="a") {$pabs=substr($p,0,-1)*2;}
if (substr($p,-1)=="b") {$pabs=substr($p,0,-1)*2+1;}
$xmlt=simplexml_load_file($chemint);
foreach($xmlt->item as $itemt){
	foreach($itemt->loc as $loc){
		$deb=substr(explode('-',$loc->p)[0],0,-1); if (substr($deb,-1)=="a") {$debabs=substr($deb,0,-1)*2;} if (substr($deb,-1)=="b") {$debabs=substr($deb,0,-1)*2+1;}
		$fin=substr(explode('-',$loc->p)[1],0,-1); if (substr($fin,-1)=="a") {$finabs=substr($fin,0,-1)*2;} if (substr($fin,-1)=="b") {$finabs=substr($fin,0,-1)*2+1;}

				if (strcmp($loc->set,$set)==0 and strcmp($loc->json,substr($vol,1))==0 and strcmp($loc->psection,$sec)==0 and $pabs>=$debabs and $pabs<=$finabs) 
					{ 	
						if ($cat==1) {
							$xmltp=simplexml_load_file("data/Kernel/rkts.xml");
							foreach($xmltp as $itemtp) { if (strcmp($itemtp->rkts,$itemt->rkts)==0) {$tibtp=$itemtp->StandardTibetan;$skttp=$itemtp->StandardSanskrit; break;}}
							echo '<a href="cat.php?id='.$itemt->rkts.'&typ=1" target="_blank" style="text-decoration: none;color:black;">rKTs-K'.$itemt->rkts.'</a><br> '.$tibtp.'<br>'.$skttp.'<br>';
									} 
						
						if ($cat==2) {
							$xmltp=simplexml_load_file("data/Kernel/rktst.xml");
							foreach($xmltp as $itemtp) { if (strcmp($itemtp->rktst,$itemt->rktst)==0) {$tibtp=$itemtp->StandardTibetan;$skttp=$itemtp->StandardSanskrit; break;}}
							echo '<a href="cat.php?id='.$itemt->rktst.'&typ=2" target="_blank" style="text-decoration: none;color:black;">rKTs-T'.$itemt->rktst.'<br>'.$tibtp.'<br>'.$skttp.'<br>';
									}  
						
						if ($cat==3) {
							$xmltp=simplexml_load_file("data/Kernel/rktsg.xml");
							foreach($xmltp as $itemtp) { if (strcmp($itemtp->rktsg,$itemt->rktsg)==0) {$tibtp=$itemtp->StandardTibetan;$skttp=$itemtp->StandardSanskrit; break;}}
							echo '<a href="cat.php?id='.$itemt->rktsg.'&typ=3" target="_blank" style="text-decoration: none;color:black;">rKTs-G'.$itemt->rktsg.'<br>'.$tibtp.'<br>'.$skttp.'<br>';
									}  
						
					}

	}
}




/*autres sets*/
echo '<td width=50><td valign="top"><h3>Other sets</h3>';
$xml=simplexml_load_file('data/Collections/collections.xml');
foreach($xml->item as $item){

	if (strcmp($catName,$item->category)==0 and strcmp($col,$item->sigla)==0){
		$i=0;
		foreach($item->set as $sett){
			if ($i>0) { 
			$imgset=0;
			$seti=str_replace('MW','',$sett->ref);
				$chemin='data/alignments/'.$cat.$col.'/'.$seti.'/'.substr($vol,1).'.csv';
						if (file_exists($chemin)) {
											$fic = fopen($chemin, "a+");
											while($tab=fgetcsv($fic,1024,';')){
												$pgcom=$tab[2];
												if (strcmp($pgcom,$p)==0) { $chemin2='data/Collections/'.$ordner.'/'.$seti.'/'.$tab[3].'.json'; 
														$json=file_get_contents($chemin2);
														$jsona=json_decode($json,true);
														foreach($jsona as $ligne) {
															if (strcmp($ligne["pagination"],$tab[5])==0 and strcmp($ligne["psection"],$tab[4])==0) {$imgset=$ligne["file"];}
														}

												
												
												}
											}
											}
			if ($imgset !=0) {echo '<a href="autset.php?id='.$imgset.'" target="autset" style="text-decoration: none;color:black;">';} else {echo '<font color=#bebebe;>';}
			echo $sett->ref.'</a></font><br>';}$i=$i+1;
		}
}}




/*fin autres sets*/
echo '<td width=50><td valign="top"><h3>Aligned collections</h3>';	
/*pages alignées*/

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr77.world4you.com;dbname=6140636db10;charset=utf8', 'sql5423417', '57c4c*qz');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

	$volal=substr($vol,1);
	$sqlQuery = "SELECT * FROM alignmentsD WHERE vol1 LIKE '$volal' AND  sec1 LIKE '$sec' AND p1 LIKE '$p' AND col2 NOT LIKE 'D' ORDER BY col2";
	$resultat = $mysqlClient->prepare($sqlQuery);
	$resultat->execute();
	$resultats = $resultat->fetchAll();
	foreach ($resultats as $res) {
		echo '<a href="dual.php?id='.$cat.'|'.$col.'|'.substr($vol,1).'|'.$sec.'|'.$p.'|'.$res["col2"].'|'.$res["vol2"].'|'.$res["sec2"].'|'.$res["p2"].'" target="_blank" style="text-decoration: none;color:black;">'.$res["col2"].'</a><br>';
				
	}


/*fin pages alignées*/






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
