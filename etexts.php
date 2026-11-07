<!DOCTYPE html> 
<html> 
  
<head> 
    <title>rKTs</title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <link rel="icon" type="image/x-icon" href="sub/logo.ico">

    <link rel="stylesheet" href="sub/style.css"> 
</style>
</head>

<body>
<?php

$id=$_GET['id'];

 $ida=explode("|",$id);
 $set=$ida[0];
 $vol=$ida[1];
 $sec=$ida[2];
 $pag=$ida[3];
?>
<div class="toppage">
<table><tr><td><a href="index.php" style="text-decoration:none;"><img src="sub/logo.png" width=100></a>
<td width=50><td>e-texts viewer
<td width=50><td><form action="etexts.php">
<font size=-1>Set
<br><select id="id" name="id" onchange="this.form.submit();">  
<option value="x|x|x">---</option>
<?php
	if ($set==1) { 
		echo '<option value="1|x|x|x" selected>Derge Kanjur</option>';
			$file="data/Collections/D Derge Kanjur/vol22084.json";
			$ordner="data/Collections/D Derge Kanjur/22084/";
			$colf="D";
		} 
	else 	{echo '<option value="1|x|x|x">Derge Kanjur</option>';}
	if ($set==2) { echo '<option value="2|x|x|x" selected>Lhasa Kanjur</option>';
			$file="data/Collections/H Lhasa Kanjur/vol26071.json";
			$ordner="data/Collections/H Lhasa Kanjur/26071/";
			$colf="H";
	} 
	else 	{echo '<option value="2|x|x|x">Lhasa Kanjur</option>';}
	if ($set==3) { echo '<option value="3|x|x|x" selected>Lithang Kanjur</option>';
			$file="data/Collections/J Lithang Kanjur/vol4CZ7445.json";
			$ordner="data/Collections/J Lithang Kanjur/4CZ7445/";
			$colf="J";
	}
	else 	{echo '<option value="3|x|x|x">Lithang Kanjur</option>';}
	if ($set==4) { echo '<option value="4|x|x|x" selected>Derge Tanjur</option>';
			$file="data/Collections/D Derge Tanjur/vol23703.json";
			$ordner="data/Collections/D Derge Tanjur/23703/";
			$colf="D";
	}
	else 	{echo '<option value="4|x|x|x">Derge Tanjur</option>';}
	if ($set==5) { echo '<option value="5|x|x|x" selected>Old Tantra</option>';
			$file="data/Collections/Gpb snga 'gyur rgyud 'bum phyogs bsgrigs/vol1KG14783.json";
			$ordner="data/Collections/Gpb snga 'gyur rgyud 'bum phyogs bsgrigs/1KG14783/";
			$colf="Gpb";
	}
	else 	{echo '<option value="5|x|x|x">Old Tantra</option>';}
	
?>
</select></form>

<td width=25><td><form action="etexts.php">
<font size=-1>Volume
<br><select id="id" name="id" onchange="this.form.submit();">
<option value="x|x|x">---</option>
<?php
	$json=file_get_contents($file);
	$jsona=json_decode($json,true);
	foreach($jsona as $ligne){	
		if(strcmp($vol,$ligne["bdrc"])==0) { echo '<option value="'.$set.'|'.$ligne["bdrc"].'|x|x" selected>'.$ligne["vol"].'</option>';$nvol=$ligne["vol"];}
		else { echo '<option value="'.$set.'|'.$ligne["bdrc"].'|x|x">'.$ligne["vol"].'</option>';}
	}
?>
</select></form>
<td width=25><td><form action="etexts.php">
<font size=-1>Page
<br><select id="id" name="id" onchange="this.form.submit();">
	<option value="x|x|x">---</option>
<?php
$vol1=substr($vol,1);
	$json=file_get_contents($ordner.$vol1.'.json');
	$jsona=json_decode($json,true);
	$i=0;
	foreach($jsona as $ligne){ 
	if (strcmp($pag,$ligne["pagination"])==0 and strcmp($sec,$ligne["psection"])==0) {echo '<option value="'.$set.'|'.$vol.'|'.$ligne["psection"].'|'.$ligne["pagination"].'" selected>'.$ligne["pagination"].'</option>';$img=$ligne["file"];$p1=$jsona[$i]["pagination"];$p2=$jsona[$i+2]["pagination"];}
	else {echo '<option value="'.$set.'|'.$vol.'|'.$ligne["psection"].'|'.$ligne["pagination"].'">'.$ligne["pagination"].'</option>';	}
	$i=$i+1;
	}
?>
</select></form>
</form><td style="font-size:12px;">
<?php
if ($set==1 and $pag!="x"){
$dcat=simplexml_load_file('data/Collections/D Derge Kanjur/D.xml');
	if (substr($pag,-1)=="a") {$pabs=substr($pag,0,-1);$pabs=$pabs*2;}
	if (substr($pag,-1)=="b") {$pabs=substr($pag,0,-1);$pabs=$pabs*2+1;}
	$vold=substr($vol,1);



foreach($dcat->item as $item) {

	foreach ($item->loc as $loc) {
	if (strcmp($loc->json,$vold)==0)	{
		$locp=$loc->p;
		$deb=substr(explode("-",$locp)[0],0,-1);
		$fin=substr(explode("-",$locp)[1],0,-1);
			if (substr($deb,-1)=="a") {$debabs=substr($deb,0,-1);$debabs=$debabs*2;}
			if (substr($deb,-1)=="b") {$debabs=substr($deb,0,-1);$debabs=$debabs*2+1;}
			if (substr($fin,-1)=="a") {$finabs=substr($fin,0,-1);$finabs=$finabs*2;}
			if (substr($fin,-1)=="b") {$finabs=substr($fin,0,-1);$finabs=$finabs*2+1;}
			if ($pabs>=$debabs and $pabs<=$finabs) {$Dno=$item->ref;$rkts=$item->rkts;echo '<br><a href="etexts/complete.php?id='.$Dno.'&coll='.$colf.'" target="_blank">display complete e-text '.$Dno.'</a>';}

	}
}}
}

if ($set==2 and $pag!="x"){
$dcat=simplexml_load_file('data/Collections/H Lhasa Kanjur/H.xml');
	if (substr($pag,-1)=="a") {$pabs=substr($pag,0,-1);$pabs=$pabs*2;}
	if (substr($pag,-1)=="b") {$pabs=substr($pag,0,-1);$pabs=$pabs*2+1;}
	$vold=substr($vol,1);



foreach($dcat->item as $item) {

	foreach ($item->loc as $loc) {
	if (strcmp($loc->json,$vold)==0)	{
		$locp=$loc->p;
		$deb=substr(explode("-",$locp)[0],0,-1);
		$fin=substr(explode("-",$locp)[1],0,-1);
			if (substr($deb,-1)=="a") {$debabs=substr($deb,0,-1);$debabs=$debabs*2;}
			if (substr($deb,-1)=="b") {$debabs=substr($deb,0,-1);$debabs=$debabs*2+1;}
			if (substr($fin,-1)=="a") {$finabs=substr($fin,0,-1);$finabs=$finabs*2;}
			if (substr($fin,-1)=="b") {$finabs=substr($fin,0,-1);$finabs=$finabs*2+1;}
			if ($pabs>=$debabs and $pabs<=$finabs) {$Dno=$item->ref;$rkts=$item->rkts;echo '<br><a href="etexts/complete.php?id='.$Dno.'&coll='.$colf.'" target="_blank">display complete e-text '.$Dno.'</a>';}

	}
}}
}


if ($set==3 and $pag!="x"){
$dcat=simplexml_load_file('data/Collections/J Lithang Kanjur/J.xml');
	if (substr($pag,-1)=="a") {$pabs=substr($pag,0,-1);$pabs=$pabs*2;}
	if (substr($pag,-1)=="b") {$pabs=substr($pag,0,-1);$pabs=$pabs*2+1;}
	$vold=substr($vol,1);



foreach($dcat->item as $item) {

	foreach ($item->loc as $loc) {
	if (strcmp($loc->json,$vold)==0)	{
		$locp=$loc->p;
		$deb=substr(explode("-",$locp)[0],0,-1);
		$fin=substr(explode("-",$locp)[1],0,-1);
			if (substr($deb,-1)=="a") {$debabs=substr($deb,0,-1);$debabs=$debabs*2;}
			if (substr($deb,-1)=="b") {$debabs=substr($deb,0,-1);$debabs=$debabs*2+1;}
			if (substr($fin,-1)=="a") {$finabs=substr($fin,0,-1);$finabs=$finabs*2;}
			if (substr($fin,-1)=="b") {$finabs=substr($fin,0,-1);$finabs=$finabs*2+1;}
			if ($pabs>=$debabs and $pabs<=$finabs) {$Dno=$item->ref;$rkts=$item->rkts;echo '<br><a href="etexts/complete.php?id='.$Dno.'&coll='.$colf.'" target="_blank">display complete e-text '.$Dno.'</a>';}

	}
}}
}



if ($set==4 and $pag!="x"){
$dcat=simplexml_load_file('data/Collections/D Derge Tanjur/D.xml');
	if (substr($pag,-1)=="a") {$pabs=substr($pag,0,-1);$pabs=$pabs*2;}
	if (substr($pag,-1)=="b") {$pabs=substr($pag,0,-1);$pabs=$pabs*2+1;}
	$vold=substr($vol,1);



foreach($dcat->item as $item) {

	foreach ($item->loc as $loc) {
	if (strcmp($loc->json,$vold)==0)	{
		$locp=$loc->p;
		$deb=substr(explode("-",$locp)[0],0,-1);
		$fin=substr(explode("-",$locp)[1],0,-1);
			if (substr($deb,-1)=="a") {$debabs=substr($deb,0,-1);$debabs=$debabs*2;}
			if (substr($deb,-1)=="b") {$debabs=substr($deb,0,-1);$debabs=$debabs*2+1;}
			if (substr($fin,-1)=="a") {$finabs=substr($fin,0,-1);$finabs=$finabs*2;}
			if (substr($fin,-1)=="b") {$finabs=substr($fin,0,-1);$finabs=$finabs*2+1;}
			if ($pabs>=$debabs and $pabs<=$finabs) {$Dno=$item->ref;$rkts=$item->rktst;echo '<br><a href="segmentation/completet.php?id='.$rkts.'" target="_blank">display complete e-text T'.$rkts.'</a>';}

	}
}}
}

?>
</table>
</div>


<div class="bodypage2" style="font-size:20px;">
<?php
if ($set==1) {$coll="D";}
if ($set==2) {$coll="H";}
if ($set==3) {$coll="J";}
if ($set==4) {$coll="TD";}
if ($set==5) {$coll="Gpb";}
$vol1=substr($vol,1);

$xml=simplexml_load_file('data/etext/'.$coll.'/'.$vol1.'.xml');
$text2="";
foreach($xml->item as $item){
	if (strcmp($pag,substr($item->p,0,-1))==0){
		$text2=$text2.$item->text;
	echo $item->text.'<br>';
	}}
	
	
echo '<br><p align=center><a class="lien1" href="etexts.php?id='.$set.'|'.$vol.'|'.$sec.'|'.$p1.'">'.$p1.'</a> - <a class="lien1" href="etexts.php?id='.$set.'|'.$vol.'|'.$sec.'|'.$p2.'">'.$p2.'</a>';




	$json=file_get_contents($ordner.$vol1.'.json');
	$jsona=json_decode($json,true);
	foreach($jsona as $ligne){
	if (strcmp($pag,$ligne["pagination"])==0 and strcmp($sec,$ligne["psection"])==0) { $img=$ligne["file"];}
	}
$json = file_get_contents("https://iiif.bdrc.io/".$img."/info.json");

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
	  '.$json.'
   ]
    });
	
</script>';	



echo'<div class="leftpage">';




if ($pag<>"" and $pag<>"x") {
echo '<form action="dico.php" method="post" target="_blank">
<input id="text" name="text" value="'.$text2.'" type="hidden" >
  Text with dictionary entries<br><input class="button" type="submit" value="Go" style="float: center;">
</form>';

if ($set==1) {
$dcat=simplexml_load_file('data/Collections/D Derge Kanjur/D.xml');
	if (substr($pag,-1)=="a") {$pabs=substr($pag,0,-1);$pabs=$pabs*2;}
	if (substr($pag,-1)=="b") {$pabs=substr($pag,0,-1);$pabs=$pabs*2+1;}
	$vold=substr($vol,1);



foreach($dcat->item as $item) {

	foreach ($item->loc as $loc) {
	if (strcmp($loc->json,$vold)==0)	{
		$locp=$loc->p;
		$deb=substr(explode("-",$locp)[0],0,-1);
		$fin=substr(explode("-",$locp)[1],0,-1);
			if (substr($deb,-1)=="a") {$debabs=substr($deb,0,-1);$debabs=$debabs*2;}
			if (substr($deb,-1)=="b") {$debabs=substr($deb,0,-1);$debabs=$debabs*2+1;}
			if (substr($fin,-1)=="a") {$finabs=substr($fin,0,-1);$finabs=$finabs*2;}
			if (substr($fin,-1)=="b") {$finabs=substr($fin,0,-1);$finabs=$finabs*2+1;}
			if ($pabs>=$debabs and $pabs<=$finabs) {$Dno=$item->ref;$rkts=$item->rkts;}

	}
}}


	$scandir = scandir("data/84000TM/");
foreach($scandir as $fichier){
		$Dnox="_".substr($Dno,1)."-";
    if (strpos($fichier, $Dnox)!== FALSE) {
		
	echo '<form action="transmemo.php" method="post" target="_blank">
<input id="vol" name="vol" value="'.$vol.'" type="hidden" >
<input id="sec" name="sec" value="'.$sec.'" type="hidden" >
<input id="pag" name="pag" value="'.$pag.'" type="hidden" >
<input id="Dno" name="Dno" value="'.$Dno.'" type="hidden" >
  Text with 84000 Translation memory <br><input class="button" type="submit" value="Go" style="float: center;">
</form>';
}}



}
echo '</div>';

}
?>

<script>
function goBack() {
  window.history.back();
}
</script>
