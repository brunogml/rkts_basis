<!DOCTYPE html> 
<html> 
  
<head> 
    <title>rKTs</title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" href="../sub/style.css"> 
</head>

<body>

<div class="toppage">
<table><tr><td><a href="../index.php" style="text-decoration:none;"><img src="../sub/logo.png" width=150></a>
<td width=50><td>Text analysis
</table>
</div>
<div class="leftpage">
<a class="lien1" href="../index.php">Home</a><br><br>
<form action="text.php">
  <label for="id">rKTs N°:</label>
  <input type="text" id="id" name="id"  size="5">
</form> 

<br><br><a class="lien1" onclick="goBack()">Go Back</a>
</div>

<div class="bodypage2">


<?php
$id=$_GET['id'];
if (isset($id)){
echo '<h2>rKTs '.$id.'</h2>';

$xml=simplexml_load_file('../data/Kernel/rkts.xml');
foreach($xml->item as $item){
	if (strcmp($id,$item->rkts)==0){
		echo $item->StandardTibetan.'<hr>';
}}

$coll=array("D Derge Kanjur", "S Stog Kanjur");
$coln=2;
$bampos=array();
$leus=array();
$i=0;

foreach($coll as $col){
	
	$sigla=explode(' ',$col)[0];
	$xml=simplexml_load_file('../data/Collections/'.$col.'/'.$sigla.'.xml');
	foreach ($xml->item as $item){
		if ($item->rkts==$id){
			echo $item->ref;
			echo '<br>'.$item->loc->vol.' - '.$item->loc->p;
			$nb=0;
			foreach ($item->bampo as $bampo){ 
				$bampos[$i][$nb]=$bampo->loc->p;
				$nb++;
				}
			echo '<br>'.$nb.' bampo';
			foreach ($item->chap as $chap){ $nb++;}
			echo '<br>'.$nb.' le\'u';
	}}
		

echo '<hr>';
$i++;
}
$bampol=array();


for ($j = 0; $j < $coln; $j++) {
$i=0;
foreach($bampos[$j] as $bampo) {
	$deb=substr(explode('-',$bampo)[0],0,-1);
	$fin=substr(explode('-',$bampo)[1],0,-1);
	if (substr($deb,-1)=="a") {$x=0;} else {$x=1;}
	$debabs=substr($deb,0,-1); $debabs=$debabs*2+$x;
	if (substr($fin,-1)=="a") {$x=0;} else {$x=1;}
	$finabs=substr($fin,0,-1); $finabs=$finabs*2+$x;
	$long=$finabs-$debabs;
	$bampol[$j][$i]=$long;
	$i++;
}
}


/*graphique*/
if ($nb>0) {
echo '<img src="graph.php?rkts='.$id.'">';
}





/*fin isset*/
}