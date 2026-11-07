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

</head>

<body >

<?php
$text=$_GET['text'];

echo '<div class="toppage">';
echo '<table><tr><td><a href="index.php" style="text-decoration:none;"><img src="sub/logo.png" width=100></a>';
echo '<td width=50><td>Results for <span style="color:red;">'.$text.'</span> in the Old Tantra';
echo '<td width=75><td valign="top" style="font-size:15px;">See results in<td width=20>
	<td valign="top" style="font-size:15px;">
		<a href="resultsD.php?text='.$text.'" style="text-decoration:none;">Derge Kanjur</a><br>
		<a href="resultsH.php?text='.$text.'" style="text-decoration:none;">Lhasa Kanjur</a><br>
		<a href="resultsJ.php?text='.$text.'" style="text-decoration:none;">Lithang Kanjur</a><br>
		<a href="resultsT.php?text='.$text.'" style="text-decoration:none;">Derge Tanjur</a><br>
		<a href="resultsG.php?text='.$text.'" style="text-decoration:none;">Old Tantra</a>';
echo '</table>';
echo '</div>';
echo '<div class="bodypage2" style="font-size:20px;">';

	$i=0;
	$dirname = 'data/etext/Gpb'; 
	$dir = opendir($dirname); 
while($file = readdir($dir)) { 
if($file != '.' && $file != '..' && !is_dir($dirname.$file)) { 
$xml=simplexml_load_file('data/etext/Gpb/'.$file);
$k=0;
foreach ($xml->item as $item){
	$k=$k+1;
	$textd=substr($xml->item[$k]->text,0,strlen($text));
	$textd=$item->text.' '.$textd;
	$textd=str_replace("  "," ",$textd);
	if (strpos($textd,$text)!==FALSE){
		$rouge='<span style="border:1px solid red;border-radius: 7px;">'.$text.'</span>';
		$aff=str_replace($text,$rouge,$textd);
		$vol=str_replace(".xml","",$file);
		$vol1="I".$vol;
		$pos=$item->p;
		$section=$item->section;
		$strJsonFileContents = file_get_contents("data/Collections/Gpb snga 'gyur rgyud 'bum phyogs bsgrigs/vol1KG14783.json");
		$array = json_decode($strJsonFileContents, true);
		foreach($array as $arr){
			if (strcmp($arr["bdrc"],$vol1)==0) { $voln=$arr["vol"];}
		}
		$paa=substr($pos,0,-1);
		$px=substr($paa,0,-1);if (substr($paa,-1)=="a") {$pabs=$px*2;} else {$pabs=$px*2+1;}
		$xmlcat=simplexml_load_file('data/Collections/Gpb snga \'gyur rgyud \'bum phyogs bsgrigs/Gpb.xml');
		foreach($xmlcat->item as $item){
			foreach($item->loc as $loc){
				if (strcmp($loc->set,"MW1KG14783")==0 and  strcmp($loc->psection,$section)==0 and strcmp($loc->json,$vol)==0)
				{
		$page=$loc->p;
		$pdeb=substr(explode("-",$page)[0],0,-1); $px=substr($pdeb,0,-1);if (substr($pdeb,-1)=="a") {$pdebabs=$px*2;} else {$pdebabs=$px*2+1;}
		$pfin=substr(explode("-",$page)[1],0,-1); $px=substr($pfin,0,-1);if (substr($pfin,-1)=="a") {$pfinabs=$px*2;} else {$pfinabs=$px*2+1;}
		if ($pabs<=$pfinabs and $pabs>=$pdebabs) { echo '<a class="lien1" href="cat.php?id='.$item->rktsg.'&typ=3" target="_blank">'.$item->ref.'</a><br>';}
				}
		}}
		$i=$i+1;
		echo $aff.' ('.$voln.' - '.$pos.') (<a class="lien1"  href="images.php?id=3|Gpb|I'.$vol.'|'.$section.'|'.substr($pos,0,-1).'" target="_blank" >go to images</a>)<br><br>';
		if ($i>100) {break;}

}}
}}
