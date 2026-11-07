<a href="javascript:window.close();">CLOSE WINDOW</a>
<br>
<?php

$id=$_GET['id'];
include('../sub/unicode2.php');



$cat=explode("|",$id)[0];
$col=explode("|",$id)[1];
$set=explode("|",$id)[2];
$vol=explode("|",$id)[3];
$sec=explode("|",$id)[4];
$pag=explode("|",$id)[5];


if ($col=="D" AND $cat==1) { 
	$chem="../data/Collections/D Derge Kanjur/22084";
	$colSeg="KanjurDerge";
	}
if ($col=="H") { 
	$chem="../data/Collections/H Lhasa Kanjur/26071";
	$colSeg="KanjurLhasa";
	}
if ($col=="J") { 
	$chem="../data/Collections/J Lithang Kanjur/4CZ7445";
	$colSeg="KanjurLithang";
	}
if ($col=="S") { 
	$chem="../data/Collections/S Stog Kanjur/22083";
	$colSeg="KanjurStog";
	}
if ($col=="D" AND $cat==2) { 
	$chem="../data/Collections/D Derge Tanjur/23703";
	$colSeg="TanjurDerge";
	}
if ($col=="Gpb") { 
	$chem="../data/Collections/Gpb snga 'gyur rgyud 'bum phyogs bsgrigs/1KG14783";
	$colSeg="OldTantra";
	}

/*image number*/
	$json=file_get_contents($chem.'/'.substr($vol,1).'.json');
	$jsona=json_decode($json,true);
foreach($jsona as $ligne){
	if (strcmp($pag,$ligne["pagination"])==0 and strcmp($sec,$ligne["psection"])==0) {$img=$ligne["file"];}
}



if (strcmp($col,"Gpb")==0){
	$img=str_replace("tif","png",$img);
	$img=str_replace("::","--",$img);
	
$imgser=substr($img,-8,4);

	$json1 = '../DIGIT/Gpb/'.$vol.'/I'.$imgser.'.png';
echo '<div id="openseadragon1" style="width: 95%; height:500px; border:1px solid #08088a;"></div>';


echo '
<script src="../seadragon/openseadragon.min.js"></script>
<script type="text/javascript">
    var viewer = OpenSeadragon({
		 maxZoomLevel: 5.0,
        id: "openseadragon1",
        prefixUrl: "../seadragon/images/",

		sequenceMode: true,
		
   tileSources:   
   [
	  {
			maxZoomLevel: 10.0,
            type: \'image\',
            url:  \''.$json1.'\',
            buildPyramid: false
        },
   ]
    });
	
</script>';

}

else {
	$json = file_get_contents("https://iiif.bdrc.io/".$img."/info.json");
	echo '<p align="center"><div id="openseadragon1" style="width: 95%; height:500px; border:1px solid #08088a;"></div>';

echo '
<script src="../seadragon/openseadragon.min.js"></script>
<script type="text/javascript">
    var viewer = OpenSeadragon({
		 maxZoomLevel: 5.0,
        id: "openseadragon1",
        prefixUrl: "../seadragon/images/",

		sequenceMode: true,
		
   tileSources:   
   [
	  '.$json.'
   ]
    });
	
</script>';


}
/*End Image mnumber*/

/*etext*/
echo '<br><br>';
try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr82.world4you.com;dbname=6140636db9;charset=utf8', 'sql2575617', 'q@ix2uft');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$vol1=substr($vol,1);
$sec1=str_replace("'","\'",$sec);

$sqlQuery = "SELECT * FROM $colSeg WHERE vol LIKE '$vol1' AND sec LIKE '$sec1' AND pag LIKE '$pag%' 
									ORDER BY segno  LIMIT 100";
$resultat = $mysqlClient->prepare($sqlQuery);
$resultat->execute();
$resultats = $resultat->fetchAll();
foreach($resultats as $res){
	if (substr($res["pag"],-1)==1){ $av=$res["segno"];}
}
$av1=$av-1;
$txtav="";


$sqlQueryav = "SELECT * FROM $colSeg WHERE vol LIKE '$vol1' AND segno LIKE '$av1'";
$resultatav = $mysqlClient->prepare($sqlQueryav);
$resultatav->execute();
$resultatsav = $resultatav->fetchAll();
if ($resultatsav[0]["pgbreak"]>0){$txtav=substr($resultatsav[0]["text"],$resultatsav[0]["pgbreak"]);}





foreach($resultats as $res){
	if ($res["pgbreak"]>0) {$t1=substr($res["text"],0,$res["pgbreak"]);	$t2=substr($res["text"],$res["pgbreak"]);}
	else {$t1=$res["text"];$t2="";}
	$ligne=$txtav.' '.$t1;
	$ligneu=$ligne;
	unicode($ligneu);
	echo '<font size=6px;>'.$ligneu.'</font><br>';
	echo '<font size=4px;>'.$ligne.'</font><br><br>';
	$txtav=$t2;
	
}
