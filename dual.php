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

/*image1*/
if ($cat==1) {$jsoncoll=file_get_contents('data/Collections/collections.json');}
if ($cat==2) {$jsoncoll=file_get_contents('data/Collections/collectionsT.json');}
if ($cat==3) {$jsoncoll=file_get_contents('data/Collections/collectionsG.json');}

	$jsona=json_decode($jsoncoll,true);
	foreach($jsona as $ligne){
		$coltemp=str_replace("bdr:MW","",$ligne["BDRC"]);
		if (strcmp($ligne["sigla"],$c1)==0 and $ligne["integratedrKTs"]==1) { $chem1='data/Collections/'.$ligne["sigla"].' '.$ligne["name"].'/'.$coltemp.'/'.$v1.'.json';}
	}
	$jsona=json_decode($jsoncoll,true);
	foreach($jsona as $ligne){
		$coltemp=str_replace("bdr:MW","",$ligne["BDRC"]);
		if (strcmp($ligne["sigla"],$c2)==0 and $ligne["integratedrKTs"]==1) { $chem2='data/Collections/'.$ligne["sigla"].' '.$ligne["name"].'/'.$coltemp.'/'.$v2.'.json';}
	}
	
		$json=file_get_contents($chem1);
	$jsona=json_decode($json,true);
	$i=0;
	foreach($jsona as $ligne){
		if (strcmp($p1,$ligne["pagination"])==0 and strcmp($s1,$ligne["psection"])==0) {$img1=$ligne["file"];$p11=$jsona[$i]["pagination"];$p12=$jsona[$i+2]["pagination"];}
		$i=$i+1;
	}
		$json=file_get_contents($chem2);
	$jsona=json_decode($json,true);
	$i=0;
	foreach($jsona as $ligne){
		if (strcmp($p2,$ligne["pagination"])==0 and strcmp($s2,$ligne["psection"])==0) {$img2=$ligne["file"];$p21=$jsona[$i]["pagination"];$p22=$jsona[$i+2]["pagination"];}
		$i=$i+1;
	}
		
		


if (strcmp($c1,"T")==0) 		{
										$json1 = file_get_contents("https://img.toyobunko-lab.jp/iiif/tibetan/manuscript_kanjur/".substr($v1,-3)."/".$img1."/info.json");
								}
elseif (strcmp($c1,"Dd")==0) 	{ 
										$imgeap=substr($img1,0,-4);
										$voleap=substr($v1,0);
										$voleap=str_replace('-','_',$voleap);
										include ("jsoneap/Dd.php");
										$json1=$json;
								}
elseif (strcmp($c1,"Dk")==0) 	{ 
										$imgeap=substr($img1,0,-4);
										$voleap=substr($v1,0);
										$voleap=str_replace('-','_',$voleap);
										include ("jsoneap/Dk.php");
										$json1=$json;
								}
								
else {$json1 = file_get_contents("https://iiif.bdrc.io/".$img1."/info.json");}





if (strcmp($c2,"T")==0) 		{
										$json1 = file_get_contents("https://img.toyobunko-lab.jp/iiif/tibetan/manuscript_kanjur/".substr($v2,-3)."/".$img1."/info.json");
							}
elseif (strcmp($c2,"Dd")==0) 	{ 
										$imgeap=substr($img2,0,-4);
										$voleap=substr($v2,0);
										$voleap=str_replace('-','_',$voleap);
										include ("jsoneap/Dd.php");
										$json2=$json;
								}
elseif (strcmp($c2,"Dk")==0) 	{ 
										$imgeap=substr($img2,0,-4);
										$voleap=substr($v2,0);
										$voleap=str_replace('-','_',$voleap);
										include ("jsoneap/Dk.php");
										$json2=$json;
								}
								
else {$json2 = file_get_contents("https://iiif.bdrc.io/".$img2."/info.json");}




/*pagessuivantes*/




echo '<table><tr><td><h3>'.$c1.'</h3><td width=50><td><a href="dual.php?id='.$cat.'|'.$c1.'|'.$v1.'|'.$s1.'|'.$p11.'|'.$c2.'|'.$v2.'|'.$s2.'|'.$p2.'">'.$p11.'</a> -<b> '.$p1.' </b>- <a href="dual.php?id='.$cat.'|'.$c1.'|'.$v1.'|'.$s1.'|'.$p12.'|'.$c2.'|'.$v2.'|'.$s2.'|'.$p2.'">'.$p12.'</a></table>';
echo '<div id="openseadragon1" style="width: 100%; height:40%; border:1px solid #08088a;"></div>';
echo '
<script src="seadragon/openseadragon.min.js"></script>
<script type="text/javascript">
    var viewer = OpenSeadragon({
		 maxZoomLevel: 5.0,
        id: "openseadragon1",
        prefixUrl: "seadragon/images/",

		sequenceMode: true,
		
   tileSources:   
   [
	  '.$json1.'
   ]
    });
	
</script>';


echo '<div id="openseadragon2" style="width: 100%; height:40%; border:1px solid #08088a;"></div>';
echo '<table><tr><td><h3>'.$c2.'</h3><td width=50><td><a href="dual.php?id='.$cat.'|'.$c1.'|'.$v1.'|'.$s1.'|'.$p1.'|'.$c2.'|'.$v2.'|'.$s2.'|'.$p21.'">'.$p21.'</a> -<b> '.$p2.' </b>- <a href="dual.php?id='.$cat.'|'.$c1.'|'.$v1.'|'.$s1.'|'.$p1.'|'.$c2.'|'.$v2.'|'.$s2.'|'.$p22.'">'.$p22.'</a></table>';
echo '
<script src="seadragon/openseadragon.min.js"></script>
<script type="text/javascript">
    var viewer = OpenSeadragon({
		 maxZoomLevel: 5.0,
        id: "openseadragon2",
        prefixUrl: "seadragon/images/",

		sequenceMode: true,
		
   tileSources:   
   [
	  '.$json2.'
   ]
    });
	
</script>';

	
		


