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
include('sub/unicode2.php');
include('sub/wylie.php');

				$text=toWylie($text);
				$text=str_replace("  "," ",$text);
				$text=str_replace("  "," ",$text);
				$ttext=$text;
				unicode($ttext);

echo '<div class="toppage">';
echo '<table><tr><td><a href="index.php" style="text-decoration:none;"><img src="sub/logo.png" width=100></a>';
echo '<td width=50><td>Results for <span style="color:red;"><span style="font-size:40px;">'.$ttext.'</span> / '.$text.'</span>';
?>
</table></div>
<div class="bodypage2" style="font-size:18px;">
<div class="w3-bar w3-white">
  <button class="w3-bar-item w3-button" onclick="openCity('Kanjur')" style="background-color:white; color:#08088a;border-style: solid; border-color: #08088a;width: 20%;border-radius: 12px;float: left;">Kanjur / <span style="font-size:30px;">བཀའ་འགྱུར</span></button>
  <button class="w3-bar-item w3-button" onclick="openCity('Tanjur')" style="background-color:white; color:#08088a;border-style: solid; border-color: #08088a;width: 20%;border-radius: 12px;float: left;">Tanjur / <span style="font-size:30px;">བསྟན་འགྱུར</span></button>
  <button class="w3-bar-item w3-button" onclick="openCity('OldTantra')" style="background-color:white; color:#08088a;border-style: solid; border-color: #08088a;width: 20%;border-radius: 12px;float: left;">Old Tantra / <span style="font-size:30px;">རྙིང་རྒྱུད</span></button>
</div>

<div id="Kanjur" class="w3-container city">
  <h2 style="border: 2px solid #08088a; border-radius: 5px; padding:5px;">Kanjur (exact match)</h2><table>

<?php
		$xml=simplexml_load_file('data/Kernel/rkts.xml');
		foreach($xml->item as $item){$oui=0;
		foreach($item->tib as $tib) {
			if (strpos($tib,$text)!==FALSE){$oui=1;}
		}
			if ($oui==1) {
				$res=$item->StandardTibetan;
				$rest=$res;
				unicode($rest);
				$ttext=$text;
				unicode($ttext);
				$roug='<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$text.'</span>';
				$troug='<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$ttext.'</span>';
				$res1=str_replace($text,$roug,$res);
				$rest=str_replace($ttext,$troug,$rest);
				echo '<tr><td width=150 valign="top" style="border-bottom: 1px solid;"><a class="lien1" href="cat.php?id='.$item->rkts.'&typ=1" target="_blank">rkts-K'.$item->rkts.'<td valign="top" style="border-bottom: 1px solid;"><a class="lien1" href="cat.php?id='.$item->rkts.'&typ=1" target="_blank"><span style="font-size:30px;">'.$rest.'</span><br>'.$res1.'</a><br>';
				}
		}

?>
  </table><h2 style="border: 2px solid #08088a; border-radius: 5px; padding:5px;">Kanjur (approximated match)</h2><table>

<?php
		$xml=simplexml_load_file('data/Kernel/rkts.xml');
		$natlang=simplexml_load_file('data/natlang.xml');
		$text1=$text.' ';
		foreach($natlang->item as $item) {$text1=str_replace($item," ",$text1);}
		$bout=explode(' ',$text1);
		$total=count($bout);
		foreach($xml->item as $item){
		foreach($item->tib as $tib) {$oui=0; 
		foreach($bout as $boutt) {if (strpos($tib,$boutt)!==FALSE){$oui=$oui+1;}
		}}
		if ($oui>=$total and strpos($tib,$text)==FALSE) {
			
				$res=$item->StandardTibetan;
				$rest=$res;
				unicode($rest);
				$res1=$res;
				foreach($bout as $boutt) {
					$tbout=$boutt;
					unicode($tbout);
				$roug='###'.$boutt.'####';
				$troug='###'.$tbout.'####';
				$res1=str_replace($boutt,$roug,$res1);
				$rest=str_replace($tbout,$troug,$rest);
					
				}
				$res1=str_replace("####","</span>",$res1);
				$rest=str_replace("####","</span>",$rest);
				$res1=str_replace("###","<span style=\"color:red;border: 2px solid red; border-radius: 5px;\">",$res1);
				$rest=str_replace("###","<span style=\"color:red;border: 2px solid red; border-radius: 5px;\">",$rest);
			
			echo '<tr><td width=150 valign="top" style="border-bottom: 1px solid;"><a class="lien1" href="cat.php?id='.$item->rkts.'&typ=1" target="_blank">rkts-K'.$item->rkts.'<td valign="top" style="border-bottom: 1px solid;"><a class="lien1" href="cat.php?id='.$item->rkts.'&typ=1" target="_blank"><span style="font-size:30px;">'.$rest.'</span><br>'.$res1.'</a><br>';
		}
		}
?>

</table></div>

<div id="Tanjur" class="w3-container city" style="display:none">
  <h2 style="border: 2px solid #08088a; border-radius: 5px; padding:5px;">Tanjur (exact match)</h2><table>
<?php
		$xml=simplexml_load_file('data/Kernel/rktst.xml');
		foreach($xml->item as $item){$oui=0;
		foreach($item->tib as $tib) {
			if (strpos($tib,$text)!==FALSE){$oui=1;}
		}
			if ($oui==1) {
				$res=$item->StandardTibetan;
				$rest=$res;
				unicode($rest);
				$ttext=$text;
				unicode($ttext);
				$roug='<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$text.'</span>';
				$troug='<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$ttext.'</span>';
				$res1=str_replace($text,$roug,$res);
				$rest=str_replace($ttext,$troug,$rest);
				echo '<tr><td width=150 valign="top" style="border-bottom: 1px solid;"><a class="lien1" href="cat.php?id='.$item->rktst.'&typ=2" target="_blank">rkts-T'.$item->rktst.'<td valign="top" style="border-bottom: 1px solid;"><a class="lien1" href="cat.php?id='.$item->rktst.'&typ=2" target="_blank"><span style="font-size:30px;">'.$rest.'</span><br>'.$res1.'</a><br>';
				}
		}
?>
  </table><h2 style="border: 2px solid #08088a; border-radius: 5px; padding:5px;">Tanjur (approximated match)</h2><table>
<?php
		$xml=simplexml_load_file('data/Kernel/rktst.xml');
		$natlang=simplexml_load_file('data/natlang.xml');
		$text1=$text.' ';
		foreach($natlang->item as $item) {$text1=str_replace($item," ",$text1);}
		$bout=explode(' ',$text1);
		$total=count($bout);
		foreach($xml->item as $item){
		foreach($item->tib as $tib) {$oui=0;
		foreach($bout as $boutt) {if (strpos($tib,$boutt)!==FALSE){$oui=$oui+1;}
		}}
		if ($oui>=$total  and strpos($tib,$text)==FALSE) {
			
				$res=$item->StandardTibetan;
				$rest=$res;
				unicode($rest);
				$res1=$res;
				foreach($bout as $boutt) {
					$tbout=$boutt;
					unicode($tbout);
				$roug='###'.$boutt.'####';
				$troug='###'.$tbout.'####';
				$res1=str_replace($boutt,$roug,$res1);
				$rest=str_replace($tbout,$troug,$rest);
					
				}
				$res1=str_replace("####","</span>",$res1);
				$rest=str_replace("####","</span>",$rest);
				$res1=str_replace("###","<span style=\"color:red;border: 2px solid red; border-radius: 5px;\">",$res1);
				$rest=str_replace("###","<span style=\"color:red;border: 2px solid red; border-radius: 5px;\">",$rest);
			
			echo '<tr><td width=150 valign="top" style="border-bottom: 1px solid;"><a class="lien1" href="cat.php?id='.$item->rktst.'&typ=2" target="_blank">rkts-T'.$item->rktst.'<td  valign="top" style="border-bottom: 1px solid;"><a class="lien1" href="cat.php?id='.$item->rktst.'&typ=2" target="_blank"><span style="font-size:30px;">'.$rest.'</span><br>'.$res1.'</a><br>';
		}
		}
?>

</table></div>

<div id="OldTantra" class="w3-container city" style="display:none">
  <h2 style="border: 2px solid #08088a; border-radius: 5px; padding:5px;">Old Tantra (exact match)</h2><table>
<?php
  		$xml=simplexml_load_file('data/Kernel/rktsg.xml');
		foreach($xml->item as $item){$oui=0;
		foreach($item->tib as $tib) {
			if (strpos($tib,$text)!==FALSE){$oui=1;}
		}
			if ($oui==1) {
				$res=$item->StandardTibetan;
				$rest=$res;
				unicode($rest);
				$ttext=$text;
				unicode($ttext);
				$roug='<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$text.'</span>';
				$troug='<span style="color:red;border: 2px solid red; border-radius: 5px;">'.$ttext.'</span>';
				$res1=str_replace($text,$roug,$res);
				$rest=str_replace($ttext,$troug,$rest);
				echo '<tr><td width=150 valign="top" style="border-bottom: 1px solid;"><a class="lien1" href="cat.php?id='.$item->rktsg.'&typ=3" target="_blank">rkts-G'.$item->rktsg.'<td valign="top" style="border-bottom: 1px solid;"><a class="lien1" href="cat.php?id='.$item->rktsg.'&typ=3" target="_blank"><span style="font-size:30px;">'.$rest.'</span><br>'.$res1.'</a><br>';
				}
		}
?>
  
   </table><h2 style="border: 2px solid #08088a; border-radius: 5px; padding:5px;">Old Tantra (approximated match)</h2><table>
 <?php
		$xml=simplexml_load_file('data/Kernel/rktsg.xml');
		$natlang=simplexml_load_file('data/natlang.xml');
		$text1=$text.' ';
		foreach($natlang->item as $item) {$text1=str_replace($item," ",$text1);}
		$bout=explode(' ',$text1);
		$total=count($bout);
		foreach($xml->item as $item){
		foreach($item->tib as $tib) {$oui=0;
		foreach($bout as $boutt) {if (strpos($tib,$boutt)!==FALSE){$oui=$oui+1;}
		}}
		if ($oui>=$total and strpos($tib,$text)==FALSE) {
			
				$res=$item->StandardTibetan;
				$rest=$res;
				unicode($rest);
				$res1=$res;
				foreach($bout as $boutt) {
					$tbout=$boutt;
					unicode($tbout);
				$roug='###'.$boutt.'####';
				$troug='###'.$tbout.'####';
				$res1=str_replace($boutt,$roug,$res1);
				$rest=str_replace($tbout,$troug,$rest);
					
				}
				$res1=str_replace("####","</span>",$res1);
				$rest=str_replace("####","</span>",$rest);
				$res1=str_replace("###","<span style=\"color:red;border: 2px solid red; border-radius: 5px;\">",$res1);
				$rest=str_replace("###","<span style=\"color:red;border: 2px solid red; border-radius: 5px;\">",$rest);
			
			echo '<tr><td width=150 valign="top" style="border-bottom: 1px solid;"><a class="lien1" href="cat.php?id='.$item->rktsg.'&typ=3" target="_blank">rkts-G'.$item->rktsg.'<td valign="top" style="border-bottom: 1px solid;"><a class="lien1" href="cat.php?id='.$item->rktsg.'&typ=3" target="_blank"><span style="font-size:30px;">'.$rest.'</span><br>'.$res1.'</a><br>';
		}
		}

 ?>
</table></div>

<script>
function openCity(cityName) {
  var i;
  var x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  document.getElementById(cityName).style.display = "block";  
}
</script>
</div><div class="topcorner">
<form action="results2.php">
<input type="text" name="text" placeholder="Quick Search..." size="75">
<input type="hidden" id="typ" name="typ" value="1"> 
<input type="hidden" id="typ2" name="typ2" value="1" > 
<input type="hidden" id="sorte" name="sorte" value="1" > 
</form>
</div>

</body>
</html>
