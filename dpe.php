<?php
$id=$_GET['id'];
 $ida=explode("|",$id);
 $cat=$ida[0];
 $vol=$ida[1];
 $sec=$ida[2];
 $p=$ida[3];
 $note=$ida[4];
 $note1=$ida[5];



?>
<table><tr><td><a href="index.php" style="text-decoration:none;"><img src="sub/logo.png" width=100></a>
<td width=50><td>dPe bsdur ma viewer
<td width=50><td>
<form action="dpe.php">
<font size=-1>Category
<br><select id="id" name="id" onchange="this.form.submit();">
<option value="x|x|x|x|x">---</option>
<?php
if ($cat==1) { echo '<option value="1|x|x|x|x" selected>Kanjur</option>';} else { echo '<option value="1|x|x|x|x">Kanjur</option>';}
if ($cat==2) { echo '<option value="2|x|x|x|x" selected>Tanjur</option>';} else { echo '<option value="2|x|x|x|x">Tanjur</option>';}
?>
</select></form>
<td width=25><td><form action="dpe.php">
<font size=-1>Volume
<br><select id="id" name="id" onchange="this.form.submit();">
<?php
echo '<option value="'.$cat.'|x|x|x|x">---</option>';
if ($cat==1) {$json=file_get_contents('data/Collections/A dPe bsdur ma Kanjur/vol1PD96682.json');}
if ($cat==2) {$json=file_get_contents('data/Collections/A dPe bsdur ma Tanjur/vol1PD95844.json');}
	$jsona=json_decode($json,true);
		foreach($jsona as $ligne){	
		if(strcmp($vol,$ligne["bdrc"])==0) { echo '<option value="'.$cat.'|'.$ligne["bdrc"].'|x|x|x" selected>'.$ligne["vol"].'</option>';$nvol=$ligne["vol"];}
		else { echo '<option value="'.$cat.'|'.$ligne["bdrc"].'|x|x|x">'.$ligne["vol"].'</option>';}
	}

?>
</select></form>
<td width=25><td><form action="dpe.php">
<font size=-1>Page
<br><select id="id" name="id" onchange="this.form.submit();">
	<option value="x|x|x|x">---</option>
<?php
	if ($cat==1) {$json=file_get_contents('data/Collections/A dPe bsdur ma Kanjur/1PD96682/'.$vol.'.json');}
	if ($cat==2) {$json=file_get_contents('data/Collections/A dPe bsdur ma Tanjur/1PD95844/'.$vol.'.json');}
	$jsona=json_decode($json,true);
		foreach($jsona as $ligne){	

	if ($ligne["pagination"]!=""){
		if (strcmp($p,$ligne["pagination"])==0) {
		$chemin='data/dpe/'.$vol.'.csv';
		$fic = fopen($chemin, "a+");
		while($tab=fgetcsv($fic,1024,';')){
		if ($tab[0]==$ligne["pagination"] and $note1=="") {$note=$tab[1];}
		}
		$img=$ligne["file"];
		$p1=$jsona[$i]["pagination"];
		$p2=$jsona[$i+2]["pagination"];
		echo '<option value="'.$cat.'|'.$vol.'|'.$ligne["psection"].'|'.$ligne["pagination"].'|'.$note.'" selected>'.$ligne["pagination"].'</option>';
		}
	else {echo '<option value="'.$cat.'|'.$vol.'|'.$ligne["psection"].'|'.$ligne["pagination"].'|'.$note.'">'.$ligne["pagination"].'</option>';	}
		if (strcmp($note,$ligne["pagination"])==0) {
			$img2=$ligne["file"];
		}
		
	}
	$i=$i+1;
		}
echo '</select></form>';


?>
<td width=100><td>Images by <a href="https://www.buddism.ru///CANON/" target="_blank"><img src="sub/buddismru.png" height=25px></a>
</table>



<?php
$img=substr(explode('::',$img)[1],1);
$img2=substr(explode('::',$img2)[1],1);

echo $img2;
$json1 = 'https://www.istb.univie.ac.at/kanjur/A/'.$vol.'/'.$img;
$json2 = 'https://www.istb.univie.ac.at/kanjur/A/'.$vol.'/'.$img2;


		$chemin='data/dpe/'.$vol.'.csv';
		$fic = fopen($chemin, "a+");
		while($tab=fgetcsv($fic,1024,';')){
		if ($tab[0]==$p1) {$notep1=$tab[1];}
		}

		$chemin='data/dpe/'.$vol.'.csv';
		$fic = fopen($chemin, "a+");
		while($tab=fgetcsv($fic,1024,';')){
		if ($tab[0]==$p2) {$notep2=$tab[1];}
		}



echo '<table width=100%><tr><td  width=50% align=center>';
echo '<a href="dpe.php?id='.$cat.'|'.$vol.'|'.$sec.'|'.$p1.'|'.$notep1.'" style="text-decoration:none; font-size:20px; color:#08088a;">🡄</a> ';
echo '<a href="dpe.php?id='.$cat.'|'.$vol.'|'.$sec.'|'.$p2.'|'.$notep2.'" style="text-decoration:none; font-size:20px; color:#08088a;">🡆</a>';
$nnote1=substr($note,-8,4);
$nnote1=$nnote1-1;
$nnote1=str_replace(substr($note,-8,4),$nnote1,$note);
echo '<td  width=50% align=center><a href="dpe.php?id='.$cat.'|'.$vol.'|'.$sec.'|'.$p.'|'.$nnote1.'|'.$nnote1.'" style="text-decoration:none; font-size:20px; color:#08088a;">🡄</a> ';
$nnote1=substr($note,-8,4);
$nnote1=$nnote1+1;
$nnote1=str_replace(substr($note,-8,4),$nnote1,$note);
echo '<a href="dpe.php?id='.$cat.'|'.$vol.'|'.$sec.'|'.$p.'|'.$nnote1.'|'.$nnote1.'" style="text-decoration:none; font-size:20px; color:#08088a;">🡆</a>';
echo '</table>';

echo '<div id="openseadragon1" style="width: 55%; height:90%; border:1px solid #08088a;float: left;"></div>';


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
	  {
			maxZoomLevel: 10.0,
            type: \'image\',
            url:  \''.$json1.'\',
            buildPyramid: false
        },
   ]
    });
	
</script>';

echo '<div id="openseadragon2" style="width: 43%; height:90%; border:1px solid #08088a;float: left;"></div>';

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
	  {
			maxZoomLevel: 10.0,
            type: \'image\',
            url:  \''.$json2.'\',
            buildPyramid: false
        },
   ]
    });
	
</script>';



?>






