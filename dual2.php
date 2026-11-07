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


$ex=explode('|',$id);
$cat=$ex[0];
$c1=$ex[1];
$v1=$ex[2];
$s1=$ex[3];
$p1=$ex[4];
$c2=$ex[5];
$v2=$ex[6];
$s2=$ex[7];
$p2=$ex[8];

$k=0;$j=0;
/*image1*/
if ($cat==1) {$json=file_get_contents('data/Collections/D Derge Kanjur/22084/'.$v1.'.json');$imgl="MW22084";}
if ($cat==2) {$json=file_get_contents('data/Collections/D Derge Tanjur/23703/'.$v1.'.json');$imgl="MW22083";}
if ($cat==3) {$json=file_get_contents('data/Collections/Gpb snga \'gyur rgyud \'bum phyogs bsgrigs/1KG14783/'.$v1.'.json');$imgl="MW1KG14783";}

	$jsona=json_decode($json,true);
	foreach ($jsona as $ligne){$j++;
		if ($ligne["pagination"]==$p1) {$img1=$ligne["file"];$k=$j;}
	}
$img=$img1;
$vol="I".$v1;
$k1a=$k-1;$p1a=$jsona[$k1a]["pagination"];
$k1b=$k+1;$p1b=$jsona[$k1b]["pagination"];

echo '<br><p align=center style="font-size:15px;"><a class="lien1" href="dual2.php?id='.$cat.'|'.$c1.'|'.$v1.'|'.$s1.'|'.$p1a.'|'.$c2.'|'.$v2.'|'.$s2.'|'.$p2.'">🠐'.$p1a.'<a>';
echo ' - <span style="font-size:25px;border: 2px solid;border-radius: 5px;padding: 10px;">'.$p1.'</span> - ';
echo '<a class="lien1" href="dual2.php?id='.$cat.'|'.$c1.'|'.$v1.'|'.$s1.'|'.$p1b.'|'.$c2.'|'.$v2.'|'.$s2.'|'.$p2.'">'.$p1b.'🠖<a>';
include("json/".$imgl.".php");


/*image2*/
if ($cat==1) {
if ($c2=="Bd") {$chem='data/Collections/Bd Bardan Collection/8LS15931/';$jsonno="MW8LS15931";}
if ($c2=="C") {$chem='data/Collections/C Cone Kanjur/1PD96685/';$jsonno="MW1PD96685";}
if ($c2=="Cz") {$chem='data/Collections/Cz Chizhi Kanjur/EAP570-4-1/';$jsonno="MWEAP570-4-1";}
if ($c2=="D") {$chem='data/Collections/D Derge Kanjur/22084/';$jsonno="MW22084";}
if ($c2=="Dd") {$chem='data/Collections/Dd Dodedrak Kanjur/EAP570-5-1/';$jsonno="MWEAP570-5-1";}
if ($c2=="Dk") {$chem='data/Collections/Dk Dongkarla Kanjur/EAP570-1-1/';$jsonno="MWEAP570-1-1";}
if ($c2=="Dm") {$chem='data/Collections/Dm Drakmar Collection/1BL10/';$jsonno="MW1BL10";}
if ($c2=="Eg") {$chem='data/Collections/Eg Egoo Collection/1KG12671/';$jsonno="MW1KG12671";}
if ($c2=="F") {$chem='data/Collections/F Phugbrag Kanjur/1KG13607/';$jsonno="MW1KG13607";}
if ($c2=="Go") {$chem='data/Collections/Go Gondhla Collection/2KG5016/';$jsonno="MW2KG5016";}
if ($c2=="Gt") {$chem='data/Collections/Gt Gangteng Kanjur/EAP039-1-1/';$jsonno="MWEAP039-1-1";}
if ($c2=="H") {$chem='data/Collections/H Lhasa Kanjur/26071/';$jsonno="MW26071";}
if ($c2=="He") {$chem='data/Collections/He Hemis I Kanjur/4CZ45313/';$jsonno="MW4CZ45313";}
if ($c2=="Hg") {$chem='data/Collections/Hg Hemis Golden Collection/4CZ45315/';$jsonno="MW4CZ45315";}
if ($c2=="Hi") {$chem='data/Collections/Hi Hemis II Kanjur/4CZ45314/';$jsonno="MW4CZ45314";}
if ($c2=="J") {$chem='data/Collections/J Lithang Kanjur/4CZ7445/';$jsonno="MW4CZ7445";}
if ($c2=="L") {$chem='data/Collections/L London Kanjur/3CN981/';$jsonno="MW3CN981";}
if ($c2=="N") {$chem='data/Collections/N Narthang Kanjur/22703/';$jsonno="MW22703";}
if ($c2=="Ng") {$chem='data/Collections/Ng Namgyal Collection/2KG229028/';$jsonno="MW2KG229028";}
if ($c2=="Np") {$chem='data/Collections/Np Neyphug Kanjur/EAP310-2-1/';$jsonno="MWEAP310-2-1";}
if ($c2=="Pj") {$chem='data/Collections/Pj Phajoding Ogmin Kanjur/EAP570-6-1/';$jsonno="MWEAP570-6-1";}
if ($c2=="Pz") {$chem='data/Collections/Pz Phajoding Khangzang Kanjur/EAP570-7-1/';$jsonno="MWEAP570-7-1";}
if ($c2=="Q") {$chem='data/Collections/Q Peking 1737 Kanjur/1PD96684/';$jsonno="MW1PD96684";}
if ($c2=="R") {$chem='data/Collections/R Ragya Kanjur/2PD17098/';$jsonno="MW2PD17098";}
if ($c2=="S") {$chem='data/Collections/S Stog Kanjur/22083/';$jsonno="MW22083";}
if ($c2=="Ts") {$chem='data/Collections/Ts Tsarang Kanjur/3CN1302/';$jsonno="MW3CN1302";}
if ($c2=="Ty") {$chem='data/Collections/Ty Tashiyangtse Kanjur/2KG209840/';$jsonno="MW2KG209840";}
if ($c2=="U") {$chem='data/Collections/U Urga Kanjur/29468/';$jsonno="MW29468";}
if ($c2=="Z") {$chem='data/Collections/Z Shey Kanjur/1PD127393/';$jsonno="MW1PD127393";}
}
if ($cat==2) {
if ($c2=="C") {$chem='data/Collections/C Cone Tanjur/1GS66030/';$jsonno="MW1GS66030";}
if ($c2=="G") {$chem='data/Collections/G Golden Tanjur/23702/';$jsonno="MW23702";}
if ($c2=="N") {$chem='data/Collections/N Narthang Tanjur/22704/';$jsonno="MW22704";}
if ($c2=="Q") {$chem='data/Collections/Q Peking Tanjur/1KG13126/';$jsonno="MW1KG13126";}
}

if ($cat==3) {
if ($c2=="Gaz") {$chem='data/Collections/Gaz a \'dzom par ma/1KG11703/';$jsonno="MW1KG11703";}
if ($c2=="Gbr") {$chem='data/Collections/Gbr bai ro\'i rgyud \'bum/21519/';$jsonno="MW21519";}
}

$img2="";
$k=0;$j=0;

	$json=file_get_contents($chem.$v2.'.json');
	$jsona=json_decode($json,true);
	foreach ($jsona as $ligne){$j++;
		if ($ligne["pagination"]==$p2) {$img2=$ligne["file"];$crop=$ligne["location"];$k=$j;}
	}
echo '<hr>';


$vol='I'.$v2;
$img=$img2;

$k1a=$k-1;$p2a=$jsona[$k1a]["pagination"];
$k1b=$k+1;$p2b=$jsona[$k1b]["pagination"];

echo '<br><p align=center style="font-size:15px;"><a class="lien1" href="dual2.php?id='.$cat.'|'.$c1.'|'.$v1.'|'.$s1.'|'.$p1.'|'.$c2.'|'.$v2.'|'.$s2.'|'.$p2a.'">🠐'.$p2a.'<a>';
echo ' - <span style="font-size:25px;border: 2px solid;border-radius: 5px;padding: 10px;">'.$p2.'</span> - ';
echo '<a class="lien1" href="dual2.php?id='.$cat.'|'.$c1.'|'.$v1.'|'.$s1.'|'.$p1.'|'.$c2.'|'.$v2.'|'.$s2.'|'.$p2b.'">'.$p2b.'🠖<a>';

include("json/".$jsonno.".php");
