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
<td width=50><td valign="top">Handlist<br><br>
<form action="handlist.php">
<span style="font-size:14px;">Select a collection </span> <select class="input6" name="id" id="id" onchange="this.form.submit()">
  <option value="xxx">---</option>
<?php
$id=$_GET['id'];
$typ=substr($id,-1);
$col=substr($id,0,-1);
if ($typ==1) {$typ1="K";}
if ($typ==2) {$typ1="T";}
if ($typ==3) {$typ1="G";}
if ($typ==4) {$typ1="C";}
if ($typ==5) {$typ1="B";}

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db11;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
	$sqlQueryl = "SELECT * FROM Collections WHERE C_Handlist LIKE 1 ORDER BY C_Sigla, C_Class";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
foreach($resultats as $res)
{
	if (strcmp($id,$res["C_Sigla"].$res["C_Class"])==0) {
		echo ' <option value="'.$res["C_Sigla"].$res["C_Class"].'" selected>'.$res["C_Sigla"].' - '.$res["C_Name"].'</option>';
		$cid=$res['id'];
		}
	else {echo ' <option value="'.$res["C_Sigla"].$res["C_Class"].'">'.$res["C_Sigla"].' - '.$res["C_Name"].'</option>';}
}

?>
</select>
</form>
</table>
</div>
<div style=" padding-left: 50px;">

<?php
/*locations*/
$xmlloc=simplexml_load_file('etexts/repository/listes/'.$col.'.xml');




$sqlQuerybase = "SELECT * FROM Sources WHERE Collection LIKE '$cid'";
$resultatbase = $mysqlClient->prepare($sqlQuerybase);
$resultatbase->execute();
$res2base = $resultatbase->fetchAll();

	echo '<i>'.$res2base[0]["Source"].'</i><br>';




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


if ($col=="A" OR $col=="C" OR $col=="D" OR $col=="N" OR $col=="Q") 
{	$sqlQueryl = "SELECT * FROM catalog WHERE rktsTyp LIKE '$typ1' AND coll LIKE '$col' ORDER BY rnb";}
else {	$sqlQueryl = "SELECT * FROM catalog WHERE coll LIKE '$col' ORDER BY rnb";}

	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
$volnn="";

foreach ($resultats as $res)
{
	if ($res['rktsTyp']=="K") {$typ2=1;}
	if ($res['rktsTyp']=="T") {$typ2=2;}
	if ($res['rktsTyp']=="G") {$typ2=3;}
	if ($res['rktsTyp']=="B") {$typ2=5;}
	
	$location="";
	foreach ($xmlloc->item as $item)
	{	
	if (strcmp($item->ref,$res['ref'])==0) {
				$levol="I".$item->vol;
				$sqlQuerylvol = "SELECT * FROM Volumes WHERE V_Ref LIKE '$levol'";
				$resultatvol = $mysqlClient2->prepare($sqlQuerylvol);
				$resultatvol->execute();
				$resultatvols = $resultatvol->fetchAll();
				$volnom=$resultatvols[0]['V_Name'];

		$location.='<span style="color:gray;">'.$volnom.' ('.$item->debp.$item->debf.$item->debl.'-'.$item->finp.$item->finf.$item->finl.')</span>; ';
		
		}
	}
	$titrtib=$res['tib'];
	if ($titrtib==""){
			$refnor=$res['rkts'];
			$sqlQuerylr = "SELECT * FROM rkts WHERE rktsTyp LIKE '$typ1' AND rkts LIKE '$refnor'";
				$resultatr = $mysqlClient->prepare($sqlQuerylr);
				$resultatr->execute();
				$resultatrs = $resultatr->fetchAll();
	$titrtib='<span style="color:gray;font-style:italic"">['.$resultatrs[0]['tib'].'] (title missing)</span>';
	}
	echo '<span style="color:gray;font-size:10px;"><sub>'.$res['rnb'].'</sub></span> <b>'.$res['ref'].'</b> - '.$titrtib.'<a href="cat.php?id='.$res['rkts'].'&typ='.$typ2.'" target="_blank" style="text-decoration:none; color:black;"> (rKTs '.$res['rktsTyp'].'-'.$res['rkts'].')<img src="sub/link.png" width=30></a> '.substr($location,0,-2);


	
	echo '<br>';
}

/*-------------------------------------------*/

if ($col=="Ma")
{
 	$sqlQueryl = "SELECT * FROM Matho ORDER BY id";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();

foreach ($resultats as $res)
{
	$img=substr(explode('.',$res['ref'])[0],2);
	$img=$img+452;
	echo '<table><tr><td><b>Frag. '.$res['ref'].'</b> <a href="images.php?id=4|Ma|MW1BL9|I1BL'.$img.'|1|1a" target="_blank"><img src="sub/link.png" width=30></a><td> '.$res['description'];
	if ($res['rktsTyp']=="K") { echo '<a href="cat.php?id='.$res['rkts'].'&typ=1" target="_blank" style="text-decoration:none; color:black;"> (rKTs K-'.$res['rkts'].')<img src="sub/link.png" width=30></a>';}
	if ($res['rktsTyp']=="T") { echo '<a href="cat.php?id='.$res['rkts'].'&typ=2" target="_blank" style="text-decoration:none; color:black;"> (rKTs T-'.$res['rkts'].')<img src="sub/link.png" width=30></a>';}
	if ($res['rktsTyp']=="G") { echo '<a href="cat.php?id='.$res['rkts'].'&typ=3" target="_blank" style="text-decoration:none; color:black;"> (rKTs G-'.$res['rkts'].')<img src="sub/link.png" width=30></a>';}
	$refn=$res['ref'];
 	$sqln= "SELECT * FROM note WHERE ref LIKE '$refn'";
	$resultatn = $mysqlClient->prepare($sqln);
	$resultatn->execute();
	$resultatsn = $resultatn->fetchAll();
	foreach ($resultatsn as $resn) { $note=$resn['note'];
						$note=str_replace("Dan Martin's Hurried Notes","<a href=\"https://sites.google.com/site/tiblical/matho-fragments-handlist\" target=\"_Blank\">Dan Martin's Hurried Notes</a>",$note);
						echo '<tr><td><td><i>'.$note.'</i>';}

	
	echo '</table><hr>';
}
}

 
 
/*-------------------------------------------*/

if ($col=="PT")
{
 	$sqlQueryl = "SELECT * FROM PelliotTibetain ORDER BY id";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();

foreach ($resultats as $res)
{
	$img=explode(".",$res['ref'])[0];
	echo '<b>'.$res['ref'].'</b>';
	if ($res['HasImages']==1) {echo '<a href="images.php?id=4|PT|MWPT|I'.$img.'|1|1" target="_blank"><img src="sub/link.png" width=30></a> ';}
	echo '- '.$res['lalou'];
	if ($res['rktsTyp']=="K") { echo '<a href="cat.php?id='.$res['rkts'].'&typ=1" target="_blank" style="text-decoration:none; color:black;"> (rKTs K-'.$res['rkts'].')<img src="sub/link.png" width=30></a>';}
	if ($res['rktsTyp']=="T") { echo '<a href="cat.php?id='.$res['rkts'].'&typ=2" target="_blank" style="text-decoration:none; color:black;"> (rKTs T-'.$res['rkts'].')<img src="sub/link.png" width=30></a>';}
	if ($res['rktsTyp']=="G") { echo '<a href="cat.php?id='.$res['rkts'].'&typ=3" target="_blank" style="text-decoration:none; color:black;"> (rKTs G-'.$res['rkts'].')<img src="sub/link.png" width=30></a>';}

	
	echo '</table><hr>';
}
}
 
/*-------------------------------------------*/

if ($col=="NLM")
{
 	$sqlQueryl = "SELECT * FROM NLM ORDER BY id";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();

foreach ($resultats as $res)
{
	echo '<b>'.$res['ref'].'</b> - '.$res['tib'];
	if ($res['rktsTyp']=="K") { echo '<a href="cat.php?id='.$res['rkts'].'&typ=1" target="_blank" style="text-decoration:none; color:black;"> (rKTs K-'.$res['rkts'].')<img src="sub/link.png" width=30></a>';}
	if ($res['rktsTyp']=="T") { echo '<a href="cat.php?id='.$res['rkts'].'&typ=2" target="_blank" style="text-decoration:none; color:black;"> (rKTs T-'.$res['rkts'].')<img src="sub/link.png" width=30></a>';}
	if ($res['rktsTyp']=="G") { echo '<a href="cat.php?id='.$res['rkts'].'&typ=3" target="_blank" style="text-decoration:none; color:black;"> (rKTs G-'.$res['rkts'].')<img src="sub/link.png" width=30></a>';}

	
	echo '</table><hr>';
}
}

 

/*-------------------------------------------*/

if ($col=="VP")
{
 	$sqlQueryl = "SELECT * FROM LaValleePoussin ORDER BY id";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();

foreach ($resultats as $res)
{
	echo '<b>'.$res['ref'].'</b> - '.$res['description'];
	if ($res['rktsTyp']=="K") { echo '<a href="cat.php?id='.$res['rkts'].'&typ=1" target="_blank" style="text-decoration:none; color:black;"> (rKTs K-'.$res['rkts'].')<img src="sub/link.png" width=30></a>';}
	if ($res['rktsTyp']=="T") { echo '<a href="cat.php?id='.$res['rkts'].'&typ=2" target="_blank" style="text-decoration:none; color:black;"> (rKTs T-'.$res['rkts'].')<img src="sub/link.png" width=30></a>';}
	if ($res['rktsTyp']=="G") { echo '<a href="cat.php?id='.$res['rkts'].'&typ=3" target="_blank" style="text-decoration:none; color:black;"> (rKTs G-'.$res['rkts'].')<img src="sub/link.png" width=30></a>';}

	
	echo '</table><hr>';
}
}

 
 
 
 
 
 