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
$typ=$_GET['typ3'];

include('sub/unicode2.php');
include('sub/wylie.php');

				$text=toWylie($text);
				$text=str_replace("  "," ",$text);
				$text=str_replace("  "," ",$text);
				$ttext=$text;
				unicode($ttext);




echo '<div class="toppage">';
echo '<table><tr><td><a href="index.php" style="text-decoration:none;"><img src="sub/logo.png" width=100></a>';
echo '<td width=50><td>Results for <span style="color:red;"><span style="font-size:40px;">'.$ttext.'</span> / '.$text.'</span> in chapters titles';
?>

<td width=100><td>
<span style="font-size:12px;">Select a collection <form action="resultschap.php">
<input type="hidden" name="text" id="text" value="<?php echo $text;?>">
<select name="typ3" id="typ3" onchange="this.form.submit()">
  <option value="x">---</option>
  <option value="D">D Derge Kanjur</option>
  <option value="F">F Phugbrag Kanjur</option>
  <option value="H">H Lhasa Kanjur</option>
  <option value="S">S Stog Kanjur</option>
  <option value="Z">Z Shey Kanjur</option>
  <option value="Gpb">Gpb Old Tantra</option>
</select></form>
</table></div>
<div class="bodypage2" style="font-size:18px;">




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

$text1=str_replace("'","\'",$text);

	if ($typ=="D") {$sqlQueryl = "SELECT * FROM chapters WHERE text LIKE '%$text1%' 
			AND ref LIKE 'D%' 
			AND ref NOT LIKE 'Dd%' 
			AND ref NOT LIKE 'Dk%' 
			AND ref NOT LIKE 'Dm%' 
			AND ref NOT LIKE 'Dr%' 
			AND ref NOT LIKE 'Ds%' 
			AND ref NOT LIKE 'Dt%' 
			ORDER BY ref";}
	if ($typ=="F") {$sqlQueryl = "SELECT * FROM chapters WHERE text LIKE '%$text1%' 
			AND ref LIKE 'F%' 
			ORDER BY ref";}
	if ($typ=="H") {$sqlQueryl = "SELECT * FROM chapters WHERE text LIKE '%$text1%' 
			AND ref LIKE 'H%' 
			AND ref NOT LIKE 'Ha%' 
			AND ref NOT LIKE 'He%' 
			AND ref NOT LIKE 'Hg%' 
			AND ref NOT LIKE 'Hi%' 
			AND ref NOT LIKE 'Hu%'  
			ORDER BY ref";}
	if ($typ=="H") {$sqlQueryl = "SELECT * FROM chapters WHERE text LIKE '%$text1%' 
			AND ref LIKE 'H%' 
			AND ref NOT LIKE 'Ha%' 
			AND ref NOT LIKE 'He%' 
			AND ref NOT LIKE 'Hg%' 
			AND ref NOT LIKE 'Hi%' 
			AND ref NOT LIKE 'Hu%'  
			ORDER BY ref";}
	if ($typ=="S") {$sqlQueryl = "SELECT * FROM chapters WHERE text LIKE '%$text1%' 
			AND ref LIKE 'S%' 
			AND ref NOT LIKE 'Sb%' 
			AND ref NOT LIKE 'Sd%' 
			AND ref NOT LIKE 'Sk%' 
			AND ref NOT LIKE 'Sl%' 
			AND ref NOT LIKE 'Sm%'  
			AND ref NOT LIKE 'Sr%' 
			AND ref NOT LIKE 'St%'  
			ORDER BY ref";}
	if ($typ=="Z") {$sqlQueryl = "SELECT * FROM chapters WHERE text LIKE '%$text1%' 
			AND ref LIKE 'Z%' 
			AND ref NOT LIKE 'Zd%' 
			AND ref NOT LIKE 'Zl%' 
			ORDER BY ref";}
	if ($typ=="Gpb") {$sqlQueryl = "SELECT * FROM chapters WHERE text LIKE '%$text1%' 
			AND ref LIKE 'Gpb%' 
			ORDER BY ref";}
	
	
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
	foreach ($resultats as $res){
		$rest=$res['text'];
		$ref=$res['ref'];
		$rest=str_replace($text,$roug,$rest);
		$sqlQ = "SELECT * FROM catalog WHERE ref LIKE '$ref'";
		$resq = $mysqlClient->prepare($sqlQ);
		$resq->execute();
		$resqs= $resq->fetchAll();
		$rkts=$resqs[0]["rkts"];
		$rktstyp=$resqs[0]["rktsTyp"]; if ($rktstyp=="K") {$typcat=1;} if ($rktstyp=="G") {$typcat=3;}  if ($rktstyp=="T") {$typcat=2;} 
		
		
		echo '<a href="cat.php?id='.$rkts.'&typ='.$typcat.'" target="_New">'.$res['ref'].'</a>: '.$rest.'<br>';
	}




