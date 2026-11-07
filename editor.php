<?php


$id=$_GET['id'];
 $ida=explode("|",$id);
 $cat=$ida[0];
 $col=$ida[1];
 $set=$ida[2];
 $vol=$ida[3];
 $sec=$ida[4];
 $p=$ida[5];


include('functions/align.php');
include('functions/nextpage.php');
include('functions/rktsno.php');

?>

<table><tr><td><a href="editor.php" style="text-decoration:none;"><img src="sub/logo.png" width=100></a>
<td width=50><td>E-text editor

<td width=25><td><form action="editor.php">
<font size=-1>Collection
<br><select id="id" name="id" onchange="this.form.submit();">
<option value="x|x|x|x|x|x">---</option>
<?php

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db11;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
	$sqlQueryl = "SELECT * FROM Collections WHERE C_images LIKE 1 ORDER BY C_Sigla, C_Name";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();

foreach ($resultats as $res) {
			if (strcmp($col,$res["C_Sigla"])==0 AND $cat==$res["C_Class"] and $res["C_text"]==1) 
			{
				if ($res["C_Sigla"]!="NLM") {echo '<option value="'.$res["C_Class"].'|'.$res["C_Sigla"].'|x|x|x|x" selected>'.$res["C_Sigla"].' '.$res["C_Name"].'</option>';}
				else {echo '<option value="'.$res["C_Class"].'|'.$res["C_Sigla"].'|x|x|x|x" selected>BDRC</option>';}
				
				$ordner=$res["C_Sigla"].' '.$res["C_Name"];$collection=$res["C_Sigla"].' '.$res["C_Name"];$C_id=$res["id"];$cat=$res["C_Class"];
			}
			else { if ($res["C_text"]==1)
				{
				if ($res["C_Sigla"]!="NLM") {echo '<option value="'.$res["C_Class"].'|'.$res["C_Sigla"].'|x|x|x|x">'.$res["C_Sigla"].' '.$res["C_Name"].'</option>';}
				else {echo '<option value="'.$res["C_Class"].'|'.$res["C_Sigla"].'|x|x|x|x">BDRC</option>';}
			}}
 }


?>
</select></form>


<td width=25><td><form action="editor.php">
<font size=-1>Set

<br><select id="id" name="id" onchange="this.form.submit();">
<option value="x|x|x|x|x|x">---</option>
<?php 

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db11;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
	$sqlQueryl = "SELECT * FROM Sets WHERE C_ID LIKE '$C_id' AND S_IntegratedrKTs LIKE 1 ORDER BY S_IsReferenceSet DESC,S_Ref";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
foreach ($resultats as $res) {
			  if (strcmp($set,$res["S_Ref"])==0){
			   echo '<option value="'.$cat.'|'.$col.'|'.$res["S_Ref"].'|x|x|x" selected>'.$res["S_Ref"].'</option>';
			   $scanner=$res["S_DigitizedBy"];$S_ID=$res["id"];$hostedby=$res["S_ImagesBy"];
			  }
			  else {
			   echo '<option value="'.$cat.'|'.$col.'|'.$res["S_Ref"].'|x|x|x">'.$res["S_Ref"].'</option>';
			}
}

?>
</select></form>




<td width=25><td><form action="editor.php">
<?php
if ($col=="Ma" OR $col=="PT") {echo '<font size=-1>Fragment';}
else {echo '<font size=-1>Volume';}
?>

<br><select id="id" name="id" onchange="this.form.submit();">
<option value="x|x|x|x|x|x">---</option>
<?php 

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db11;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
	$sqlQueryl = "SELECT * FROM Volumes WHERE S_ID LIKE '$S_ID' ORDER BY V_Number";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
foreach ($resultats as $res) {
		if(strcmp($vol,$res["V_Ref"])==0) { echo '<option value="'.$cat.'|'.$col.'|'.$set.'|'.$res["V_Ref"].'|x|x" selected>'.$res["V_Name"].'</option>';$nvol=$res["V_Number"];$volnn=$res["V_Name"];}
		else { echo '<option value="'.$cat.'|'.$col.'|'.$set.'|'.$res["V_Ref"].'|x|x">'.$res["V_Name"].'</option>';}
	}
?>
</select></form>

<td width=25><td><form action="editor.php">
<?php
if ($col=="Ma" OR $col=="PT") {echo '<font size=-1>Image';}
else {echo '<font size=-1>Page';}
?>

<br><select id="id" name="id" onchange="this.form.submit();">
	<option value="x|x|x|x|x|x">---</option>
<?php

$vol1=substr($vol,1);
$set1=substr($set,2);

	$json=file_get_contents('data/Collections/'.$ordner.'/'.$set1.'/'.$vol1.'.json');
	$jsona=json_decode($json,true);
	$i=0;
	foreach($jsona as $ligne){ 
	if (strcmp($p,$ligne["pagination"])==0 and strcmp($sec,$ligne["psection"])==0) {echo '<option value="'.$cat.'|'.$col.'|'.$set.'|'.$vol.'|'.$ligne["psection"].'|'.$ligne["pagination"].'" selected>'.$ligne["pagination"].' ('.$ligne["psection"].')';if (strcmp("missing",$ligne["file"])==0) {echo '[missing]';} echo '</option>'; $img=$ligne["file"];$sec1=$jsona[$i]["psection"];$p1=$jsona[$i]["pagination"];$sec2=$jsona[$i+2]["psection"];$p2=$jsona[$i+2]["pagination"];$crop=$ligne["location"];}
	else {echo '<option value="'.$cat.'|'.$col.'|'.$set.'|'.$vol.'|'.$ligne["psection"].'|'.$ligne["pagination"].'">'.$ligne["pagination"].' ('.$ligne["psection"].')';if (strcmp("missing",$ligne["file"])==0) {echo '[missing]';} echo '</option>';	}
	$i=$i+1;
	}
?>
</select></form>
</form>
<?php
if (strcmp($collection,"NLM National Library of Mongolia")==0) {$coll1="BDRC";} else {$coll1=$collection;}
echo '<td width=100><td>'.$coll1;
?>


</table>


<?php

if($img!="missing")
{ 
include("json/".$set.".php");
}

else { echo '<p  style="text-align:center;font-size:25px;">page '.$p.' missing</p>';}

echo '<p align=center style="font-size:15px;"><a class="lien1" href="editor.php?id='.$cat.'|'.$col.'|'.$set.'|'.$vol.'|'.$sec1.'|'.$p1.'">⮜ '.$p1.'</a> - <span style="font-size:25px;border: 2px solid;border-radius: 5px;padding: 10px;">'.$p.'</span> - <a class="lien1" href="editor.php?id='.$cat.'|'.$col.'|'.$set.'|'.$vol.'|'.$sec2.'|'.$p2.'">'.$p2.' ⮞</a></p><br>';



try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr82.world4you.com;dbname=6140636db9;charset=utf8', 'sql2575617', 'q@ix2uft');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


echo '#########################<hr>'.$col;







