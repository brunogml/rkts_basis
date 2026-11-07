<!DOCTYPE html> 
<html> 
  
<head> 
    <title>rKTs</title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <link rel="icon" type="image/x-icon" href="sub/logo.ico">

    <link rel="stylesheet" href="sub/style.css"> 

</head>

<body>

<div class="toppage">
<table><tr><td><a href="index.php" style="text-decoration:none;"><img src="sub/logo.png" width=100></a>
<td width=50><td>84000 Translation memory
</table>
</div>

<?php

include ('sub/unicode2.php');

$vol=$_POST['vol'];
$set=$_POST['set'];
$pag=$_POST['pag'];
$Dno=$_POST['Dno'];
$vol1=substr($vol,1);


$xml=simplexml_load_file('data/etext/D/'.$vol1.'.xml');
foreach($xml->item as $item){
	if (strcmp($pag,substr($item->p,0,-1))==0){
	$text=$text.$item->text.' ';
	}}

$text=str_replace('  ',' ',$text);


unicode($text);
		$text=str_replace("། །","།",$text);

echo '<p id="text" style="font-size: 25px;">'.$text.'</p>';


echo '<b>84000 Translation memory</b>';
echo '<div style="height: 500px; overflow: auto; border-style: solid;">';
 $p=$pag;
 $D=$Dno;


$scandir = scandir("data/84000TM/");
foreach($scandir as $fichier){
    if (strpos($fichier, substr($D,1))!== FALSE) {




$pTM="F.".substr($p,0,-1).".".substr($p,-1);


$xml=simplexml_load_file('data/84000TM/'.$fichier);
$i=1;
foreach($xml->body->tu as $tu){

	if (strcasecmp($tu->prop,$pTM)==0) {
		$tibb=$tu->tuv[0]->seg;
		$tibb=str_replace("། །","།",$tibb);
		echo '<table><tr><td  rowspan="2" valign="middle"><input name="checkbox" onclick="myFunction'.$i.'()" type="radio"  id="radio" /><td><span  style="font-size: 25px;"> '.$tu->tuv[0]->seg.' </span><tr><td> '.$tu->tuv[1]->seg.'</table>';


echo '<script>
function myFunction'.$i.'() {
  var str = document.getElementById("text").innerHTML; 
  res = str.replace("<span style=\"color:red;font-weight:bold;font-size: 30px;\">", "");
  res = res.replace("</span>", "");
  res = res.replace("'.$tibb.'", "<span style=\"color:red;font-weight:bold;font-size: 30px;\">'.$tibb.'</span>");
  
  document.getElementById("text").innerHTML = res;
}
</script>';

		
	echo '<br><br>';
	$i=$i+1;
}}



}
}