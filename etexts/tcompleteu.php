<style>
.hidden {
  display: none;
}
</style>
<a href="javascript:window.close();">CLOSE WINDOW</a>
<br><br>
<?php
include('../sub/unicode2.php');

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db12;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$id=$_GET['id'];
$col=$_GET['coll'];
$volcur=$_GET['volcur'];
if ($volcur=="") {$volcur=0;}

$sqlQuery = "SELECT * FROM catalog WHERE ref LIKE '$id' LIMIT 1";
$resultat = $mysqlClient->prepare($sqlQuery);
$resultat->execute();
$resultats = $resultat->fetchAll();

$comment="";
include("liencoll.php");


$titre=$resultats[0]["tib"];


echo $id.': '.$titre.'<br>';
echo '<table><tr><td>
<input type="button" onclick="location.href=\'tcompleteup.php?id='.$id.'&coll='.$col.'&volcur='.$volcur.'\';" value="show page break" />
<td width=150><td>
<input type="button" onclick="location.href=\'tcompleteul.php?id='.$id.'&coll='.$col.'&volcur='.$volcur.'\';" value="show line break" />

<td width=150><td>
<a href="tcomplete.php?coll='.$col.'&id='.$id.'&volcur='.$volcur.'" style=font-size:25px;">Wylie</a><td width=150><td>'.$comment.'</table><hr><p style="font-size:18px;">';



$sqlQuery = "SELECT * FROM locations WHERE ref LIKE '$id' limit 1";
$resultat = $mysqlClient->prepare($sqlQuery);
$resultat->execute();
$resultats = $resultat->fetchAll();
$setcur=$resultats[0]["setid"];
$sqlQuery = "SELECT * FROM locations WHERE ref LIKE '$id' and setid LIKE '$setcur'";
$resultat = $mysqlClient->prepare($sqlQuery);
$resultat->execute();
$resultats = $resultat->fetchAll();


if (count($resultats)>1) {
	echo 'text in '.count($resultats).' volumes<br><br>';
	
$xmlvol=simplexml_load_file('repository/allvolumes.xml');

for ($x = 0; $x < count($resultats); $x++) {
	$volno0=$resultats[$x]['vol'];
	foreach ($xmlvol->item as $itemvol)
	{if (strcmp($itemvol->volref,$volno0)==0){ $volaff=$itemvol->vol;}}
	
	$volcur1=$x+1;
	if ($volcur==$x) { echo '<span style="color:red;border: 2px solid red;border-radius: 5px;padding:3px;">volume '.$volcur1.' ('.$volaff.')</span> - ';}
	else {echo '<a href="tcomplete.php?id='.$id.'&coll='.$col.'&volcur='.$x.'">volume '.$volcur1.'  ('.$volaff.')</a> - ';}
}
echo '<br><br>';
	}

$vol=$resultats[$volcur]["vol"];
$sec=$resultats[$volcur]["sec"];
$debp=$resultats[$volcur]["debp"];
$debf=$resultats[$volcur]["debf"];
$debl=$resultats[$volcur]["debl"];
$finp=$resultats[$volcur]["finp"];
$finf=$resultats[$volcur]["finf"];
$finl=$resultats[$volcur]["finl"];



try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db11;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$volx="I".$vol;
$sqlQuery = "SELECT * FROM Volumes WHERE V_Ref LIKE '$volx' LIMIT 1";
$resultat = $mysqlClient->prepare($sqlQuery);
$resultat->execute();
$resultats = $resultat->fetchAll();

$volno=$resultats[0]["V_Number"];


if ($volno<10){$volno1="00".$volno;}
if ($volno<100 and $volno>9){$volno1="0".$volno;}
if ($volno<1000 and $volno>99){$volno1=$volno;}



$fh=fopen('repository/'.$repos.'/'.$volno1.'.txt', 'rb');

while (!feof($fh)) {
    $ligne = fgets($fh);
    $loc=explode("): ",$ligne)[0];
	$lin=explode("(",$loc)[0];
	$secl=explode("(",$loc)[1];
	$txt=explode("): ",$ligne)[1];
	if (strpos($lin,"a")!=false) {$pos=strpos($lin,"a");}
	if (strpos($lin,"b")!=false) {$pos=strpos($lin,"b");}
	$linp=substr($lin,0,$pos);
	$linf=substr($lin,$pos,1);
	$linl=substr($lin,$pos+1);
	
	if (strcmp($sec,$secl)==0){
	if (($linp==$debp && $debf=="a" and $linf=="a" and $linl>=$debl) || ($linp==$debp and $debf=="a" and $linf=="b") || ($linp==$debp and $debf=="b" and $linf=="b" and $linl>=$debl) || ($linp>$debp and $linp<$finp) || ($linp==$finp and $finf=="b" and $linf=="b" and $linl<=$finl) || ($linp==$finp and $finf=="b" and $linf=="a") || ($linp==$finp and $finf=="a" and $linf=="a" and $linl<=$finl))
	{ 
		unicode($txt);
		echo $txt.'་'; }
	}
	
	
}
fclose($fh);








