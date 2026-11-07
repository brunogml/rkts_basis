<meta http-equiv="refresh" content="0; url=https://rkts.org/rkts1/pages/collections.html">





















<!DOCTYPE html> 
<html> 
  
<head> 
    <title>rKTs</title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <link rel="icon" type="image/x-icon" href="sub/logo.ico">

    <link rel="stylesheet" href="sub/style.css"> 
<style>
.input6 {
  font-size: 16px;
  margin: 2px;
  padding: 5px;
    border: 1px solid #000000;  
    width: 500px; 
}  
.tbd {
  font-size: 16px;
  padding: 5px;
    border: 1px solid #08088a;  
 }
</style>
</head>

<body>
<?php

session_Start();
?>
<div class="toppage">
<table><tr><td valign="top"><a href="index.php" style="text-decoration:none;"><img src="sub/logo.png" width=100></a>
<td width=50><td valign="top">Collections<br><br>
<form action="collections.php">
<span style="font-size:14px;">Select a collection </span> <select class="input6" name="id" id="id" onchange="this.form.submit()">
  <option value="xxx">Show all</option>
<?php
$id=$_GET['id'];

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db11;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
	$sqlQueryl = "SELECT * FROM Collections ORDER BY C_Sigla, C_Class";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
foreach($resultats as $res)
{
	if (strcmp($id,$res["C_Class"].$res["C_Sigla"])==0) {
		echo ' <option value="'.$res["C_Class"].$res["C_Sigla"].'" selected>'.$res["C_Sigla"].' - '.$res["C_Name"].'</option>';
		$cid=$res['id'];
		}
	else {echo ' <option value="'.$res["C_Class"].$res["C_Sigla"].'">'.$res["C_Sigla"].' - '.$res["C_Name"].'</option>';}
}

?>
</select>
</form>

<a href="collections.php?id=xxx" style="font-size:12px;text-decoration:none;color:black;">List all collection</a>
</table>
</div>
<div style=" padding-left: 50px;">


<?php
if (isset($id) AND $id!="xxx")
{
	$sqlQueryl = "SELECT * FROM Collections WHERE id LIKE '$cid'";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$cres = $resultatl->fetchAll();

	echo '<h1>'.$cres[0]['C_Name'].' ('.$cres[0]['C_Sigla'].') ';
	if ($cres[0]['C_NameTib']!="") { echo ' - <span style="font-size:40px;font-weight: bold;">'.$cres[0]['C_NameTib'].'</span><br>';}
	echo '</h1>';
	echo '<table style="border-collapse: collapse;">';
	echo '<tr><td class="tbd">Date of production<td class="tbd">'.$cres[0]['C_Date'];
	echo '<tr><td class="tbd">Place of production<td class="tbd">'.$cres[0]['C_Place'];
	echo '<tr><td class="tbd">Description<td class="tbd">'.$cres[0]['C_Description'];
	echo '<tr><td class="tbd">Category<td class="tbd">'.$cres[0]['C_Category'];
	echo '<tr><td class="tbd">Group<td class="tbd">'.$cres[0]['C_Group'];
	echo '</table>';
	echo '<h2>Available sets</h2>';
	echo '<table style="border-collapse: collapse;"><tr><td class="tbd">Set<td class="tbd">Volumes<td class="tbd">Digitizer<td class="tbd">Viewer<td class="tbd">Link';
$id2=$cres[0]["id"];
$sqlQuery = "SELECT * FROM Sets WHERE C_ID LIKE '$id2'";
$resultat = $mysqlClient->prepare($sqlQuery);
$resultat->execute();
$res2 = $resultat->fetchAll();
$i=0;
foreach($res2 as $ress)
{
	echo '<tr><td class="tbd"><b>'.$ress['S_Ref'].'</b>';
	echo '<td class="tbd">'.$ress['S_NumberOfVolume'].' vol.';
	$scanner=$ress['S_DigitizedBy'];
	echo '<td class="tbd"><img src="data/scanner/'.$scanner.'.png" width=50 align="top">';
	echo '<td class="tbd">';
	if ($ress['S_IntegratedrKTs']==1) {echo '<a href="images.php?id='.substr($id,0,1).'|'.substr($id,1).'|'.$ress['S_Ref'].'" target="_blank"><img src="sub/logo.png" width=35 align="top"></a>';}
	$refff=$ress['S_Ref'];
	if ($refff=="MW1ER156") {$refff="MW1BL6";}
	echo '<td class="tbd"><a href="https://library.bdrc.io/show/bdr:'.$refff.'" target="_New"><img src="data/scanner/BDRC.png" style="width:30px;"></a>';

}
echo '</table>';	

if ($cres[0]['C_Handlist']==1)
{
	
$sqlQuerybase = "SELECT * FROM Sources WHERE Collection LIKE '$id2'";
$resultatbase = $mysqlClient->prepare($sqlQuerybase);
$resultatbase->execute();
$res2base = $resultatbase->fetchAll();

	echo '<h2>Outline</h2>';
	echo $res2base[0]["Source"].'<br>';
	echo '<br><a href="handlist.php?id='.$cres[0]['C_Sigla'].$cres[0]['C_Class'].'">Display outline</a>';
}
}


if ($_SESSION['user']=="BL" OR $_SESSION['user']=="MV") {echo '<br><button><a href="sqleditor/collections/index.php?id='.$id.'" target="_Blank">edit</a></button>';}

if (!isset($id) OR $id=="xxx")
{	

echo '<table>';

foreach($resultats as $res)
{
$i++;
echo '<tr><td valign="bottom" style="border-bottom: solid;"><sub style="font-size:8px;">'.$i.'</sub> '.$res["C_Sigla"].'<td valign="top">'.$res["C_Name"].' - <span style="font-size:30px;">'.$res["C_NameTib"].'</span> <a href="collections.php?id='.$res["C_Class"].$res["C_Sigla"].'" style="text-decoration:none;color:black"><img src="sub/link.png" width=30></a>';
}

echo '</table>';
}
?>

<div style="position:absolute;top:10px;right: 10px;">
<a href="rkts1/pages/collections.html" target="_blank"><img src="sub/visitnew.jpg" width=100></a>
</div>
