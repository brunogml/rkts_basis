<head>
<style>
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
</head>
<body>
<table><tr><td>
<h1><a href="../index.php" style="text-decoration:none;"><img src="../sub/logo.png" width=100></a>rKTs e-text search</h1>
<td width=100>
<td><i>Initial searches within the etext corpus can take a bit longer, as the system needs to compute results based on how common the search phrase is. <br>However, subsequent searches will be significantly faster due to efficient caching.</i>

<?php

$col=$_GET['col'];
$txt=$_GET['txt'];
$expert=0;
$expert=$_GET['expert'];
include("liencoll.php");

	

echo ' </table>';

echo '<table><tr><td width=50><td><form action="tresults.php">
<input type="text" name="txt" id="txt" style="width:500px; font-size: 20px;" value="'.$txt.'">

<select id="col" name="col" onchange="this.form.submit();" style="width: 300px; font-size: 20px;">';

echo '<option value="xxx" style="font-weight:bold;text-decoration: underline;">-KANJUR-</option>';
if ($col=="D") { echo '<option value="D" selected>D Derge Kanjur (Input)</option>';} 
	else { echo '<option value="D">D Derge Kanjur (Input)</option>';} 
if ($col=="F") { echo '<option value="F" selected>F Phugbrag Kanjur (OCR)</option>'; } 
	else { echo '<option value="F">F Phugbrag Kanjur (OCR)</option>';	} 
if ($expert==1){
	if ($col=="H") { echo '<option value="H" selected>H Lhasa Kanjur (Input)</option>'; } 
	else { echo '<option value="H">H Lhasa Kanjur (Input)</option>';	} 
}
if ($expert==1){
if ($col=="He") { echo '<option value="He" selected>He Hemis I Kanjur (OCR)</option>'; 				} 
	else { echo '<option value="He">He Hemis I Kanjur (OCR)</option>';} 
if ($col=="J") { echo '<option value="J" selected>J Lithang Kanjur (Input)</option>'; 				} 
	else { echo '<option value="J">J Lithang Kanjur (Input)</option>';} 
if ($col=="L") { echo '<option value="L" selected>L London Kanjur (OCR)</option>'; 				} 
	else { echo '<option value="L">L London Kanjur (OCR)</option>';} 
if ($col=="N") { echo '<option value="N" selected>N Narthang Kanjur (OCR)</option>';				} 
	else { echo '<option value="N">N Narthang Kanjur (OCR)</option>';} 
}
if ($expert==1){
if ($col=="Q") { echo '<option value="Q" selected>Q Peking Kanjur (OCR)</option>'; 	} 
	else { echo '<option value="Q">Q Peking Kanjur (OCR)</option>';} 
}
if ($col=="S") { echo '<option value="S" selected>S Stog Kanjur (OCR)</option>'; 	} 
	else { echo '<option value="S">S Stog Kanjur (OCR)</option>';} 
if ($expert==1){
if ($col=="Ts") { echo '<option value="Ts" selected>Ts Tsarang Kanjur (OCR)</option>'; 	} 
	else { echo '<option value="Ts">Ts Tsarang Kanjur (OCR)</option>';} 
if ($col=="Ty") { echo '<option value="Ty" selected>Ty Tashiyangtse Kanjur (OCR)</option>'; 	} 
	else { echo '<option value="Ty">Ty Tashiyangtse Kanjur (OCR)</option>';} 
if ($col=="V") { echo '<option value="V" selected>V Ulaanbaatar Kanjur (OCR)</option>'; 	} 
	else { echo '<option value="V">V Ulaanbaatar Kanjur (OCR)</option>';} 
}


echo '<option value="xxx" style="font-weight:bold;text-decoration: underline;">-CANONICAL COLLECTIONS-</option>';
if ($expert==1){
	if ($col=="Go") { echo '<option value="Go" selected>Go Gondhla Collection (OCR)</option>'; } 
	else { echo '<option value="Go">Go Gondhla Collection (OCR)</option>';	} 
}
if ($col=="Ng") { echo '<option value="Ng" selected>Ng Namgyal Collection (OCR)</option>'; 				} 
	else { echo '<option value="Ng">Ng Namgyal Collection (OCR)</option>';} 


echo '<option value="xxx" style="font-weight:bold;text-decoration: underline;">-TANJUR-</option>';
if ($col=="TD") { echo '<option value="TD" selected>D Derge Tanjur (Input)</option>'; 
				$repos="TanjurDerge";
				$liste="volTanjur";
				$det="D";$dett="2";
				$setref="MW23703";
				} 
	else { echo '<option value="TD">D Derge Tanjur (Input)</option>';} 
if ($expert==1){
if ($col=="TG") { echo '<option value="TG" selected>G Golden Tanjur</option>'; 
				$repos="TanjurGolden";
				$liste="volTanjur";
				$det="G";$dett="2";
				$setref="MW23702";
				} 
	else { echo '<option value="TG">G Golden Tanjur (OCR)</option>';} 
}
if ($expert==1){
if ($col=="TN") { echo '<option value="TN" selected>N Narthang Tanjur (Input)</option>'; 
				$repos="TanjurNarthang";
				$liste="volTanjur";
				$det="N";$dett="2";
				$setref="MW22704";
				} 
	else { echo '<option value="TN">N Narthang Tanjur (Input)</option>';} 
}

echo '<option value="xxx" style="font-weight:bold;text-decoration: underline;">-OLD TANTRA-</option>';
if ($expert==1){
if ($col=="Gaz") { echo '<option value="Gaz" selected>Gaz rnying rgyud a \'dzom par ma (OCR)</option>'; 	} 
	else { echo '<option value="Gaz">Gaz rnying rgyud a \'dzom par ma (OCR)</option>';} 
}
if ($expert==1){
if ($col=="Gbr") { echo '<option value="Gbr" selected>Gbr bai ro\'i rgyud \'bum (OCR)</option>'; 		} 
	else { echo '<option value="Gbr">Gbr bai ro\'i rgyud \'bum (OCR)</option>';} 
}
if ($expert==1){
if ($col=="Gdg") { echo '<option value="Gdg" selected>Gdg Derge rgyud \'bum (OCR)</option>'; 		} 
	else { echo '<option value="Gdg">Gdg Derge rgyud \'bum (OCR)</option>';} 
}
if ($expert==1){
if ($col=="Gkk") { echo '<option value="Gkk" selected>Gkk rnying ma rgyud \'bum gyi kha skong (OCR)</option>'; 		} 
	else { echo '<option value="Gkk">Gkk rnying ma rgyud \'bum gyi kha skong (OCR)</option>';} 
}
if ($col=="Gpb") { echo '<option value="Gpb" selected>Gpb rgyud \'bum phyogs bsgrigs (OCR)</option>'; 		} 
	else { echo '<option value="Gpb">Gpb rgyud \'bum phyogs bsgrigs (OCR)</option>';} 
if ($expert==1){
if ($col=="Gtb") { echo '<option value="Gtb" selected>Gtb mtshams brag rnying rgyud (OCR)</option>'; 		} 
	else { echo '<option value="Gtb">Gtb mtshams brag rnying rgyud (OCR)</option>';} 
}

echo '<option value="xxx" style="font-weight:bold;text-decoration: underline;">-BON CANON-</option>';
if ($col=="Bkz") { echo '<option value="Bkz" selected>Bkz Bon bka\' brten (OCR)</option>'; 
				} 
	else { echo '<option value="Bkz">Bkz Bon bka\' brten (OCR)</option>';} 


echo '</select><td width=50>';
if ($expert==0) {echo '<td>Selective search <input type="radio" id="expert" name="expert" value="0"  onchange="this.form.submit();" checked>';}
else {echo '<td>Selective search <input type="radio" id="expert" name="expert" value="0"  onchange="this.form.submit();">';}
if ($expert==1) {echo '<br>Expert search <input type="radio" id="expert" name="expert" value="1"  onchange="this.form.submit();" checked>';}
else {echo '<br>Expert search <input type="radio" id="expert" name="expert" value="1"  onchange="this.form.submit();">';}
echo '</form><td width=50>';

echo '
<!-- Trigger/Open The Modal -->
<button id="myBtn" style="background-color: white;color: black;border: 2px solid #ffffff;font-size: 30px;">🛈</button>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
<span style="font-size:20px;font-weight:bold;">Selective Search</span> (Recommended for Targeted Queries):<br><br>
This option allows you to search within a curated selection of e-texts from key canonical
collections. These were chosen for their textual quality and their significance in representing
distinct transmission traditions.<br><br>
	• For general searches, we recommend the <u><i>Derge Kanjur</i></u>, a well-maintained e-text
representing the <i>Tshal pa</i> tradition.<br>
	• To explore the <i>Them spangs ma</i> transmission, use the <u><i>Stog Kanjur</i></u>. Please note that
this version is OCR-based and may contain textual errors.<br>
	• For early canonical materials, consult the <u><i>Namgyal collection</i></u>, which predates the
formal Kanjur compilations.<br>
	• The <u><i>Phugbrag Kanjur</i></u> reflects both early and later layers of transmission.<br>
	• E-texts for the <i>Tanjur</i> are based on manual transcription and are generally reliable.<br> 
	• Both <i>Old Tantra</i> and <i>Bon Canon</i> are OCR-based.<br><br>
For best results, use short and distinctive phrases in your search.
<br><hr><br>
<span style="font-size:20px;font-weight:bold;">Expert Search</span> (Full Corpus Access):<br><br>
This mode provides access to all available e-texts across various canonical collections.
<br><br>
Please note that the quality of texts varies: 
<br>•    Input: Manually entered and reviewed texts (highest quality)
<br>•    OCR+: Machine-generated texts with multiple proofreading steps
<br>•    OCR: Raw OCR output without further verification
<br><br>
A search yielding no results in one collection does not necessarily mean the phrase is absent from the actual source.
<br>Use short and distinctive phrases to improve search accuracy, and consider checking better-curated e-texts via the Selective Search option.  </div>
</div>
';
/*
echo '<tr><td><td><a href="tresultsu.php?txt='.$txt.'&col='.$col.'&expert='.$expert.'" style="font-size:25px; text-decoration:none;">བོད་ཡིག</a>';
*/
echo '</table>';
echo '<p style=margin:25px;">';

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db12;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$fichier1="";

			$xmld=simplexml_load_file('repository/listes/'.$det.'.xml');

$scandir = scandir("repository/".$repos);
foreach($scandir as $fichier){
  if(preg_match("#\.(txt|ttt)$#i", $fichier)){

		$fh=file("repository/".$repos."/".$fichier);
		$i=0;
			$cestou1="";
		foreach ($fh as $ligne) {
			$i++;
			$long=strlen($txt)-1;
			$next=substr(explode(": ",$fh[$i])[1],0,$long);
			$lintxt=$ligne.$next;
	if (strpos($lintxt,$txt)!=FALSE) { 
			$red='<span style="color:red;border: 2px solid red;border-radius: 5px;padding:3px;">'.$txt.'</span>';
			$xml=simplexml_load_file("repository/".$liste.".xml");
			foreach ($xml->item as $item){if ($col==$item->col and substr($fichier,0,-4)==$item->voln) {$volref=$item->volref;$volname=$item->vol;}}
			
			if ($fichier1!=$fichier){echo '<hr><h3>'.$volname.'</h3>';}
			$ii=$i-2;
			$avant=explode(": ",$fh[$ii])[1];
			$apres=explode(": ",$fh[$i])[1];
			$ttxt='<span style="color:gray;">'.$avant.'</span> <span style="font-size:20px;">'.explode(": ",$ligne)[1].'</span> <span style="color:gray;">'.$apres.'</span>';
			
			    $loc=explode("): ",$ligne)[0];
				$lin=explode("(",$loc)[0];
				$secl=explode("(",$loc)[1];
				if (strpos($lin,"a")!=false) {$pos=strpos($lin,"a");}
				if (strpos($lin,"b")!=false) {$pos=strpos($lin,"b");}
				$linp=substr($lin,0,$pos);
				$linf=substr($lin,$pos,1);
				$linl=substr($lin,$pos+1);

			foreach($xmld->item as $itemd) {
				if (strcmp($itemd->vol,$volref)==0 and strcmp($itemd->sec,$secl)==0){
						if (($linp==$itemd->debp && $itemd->debf=="a" and $linf=="a" and $linl>=$itemd->debl) || ($linp==$itemd->debp and $itemd->debf=="a" and $linf=="b") || ($linp==$itemd->debp and $itemd->debf=="b" and $linf=="b" and $linl>=$itemd->debl) || ($linp>$itemd->debp and $linp<$itemd->finp) || ($linp==$itemd->finp and $itemd->finf=="b" and $linf=="b" and $linl<=$itemd->finl) || ($linp==$itemd->finp and $itemd->finf=="b" and $linf=="a") || ($linp==$itemd->finp and $itemd->finf=="a" and $linf=="a" and $linl<=$itemd->finl))
						{ $cestou='<a href="../cat.php?id='.$itemd->rkts.'&typ='.$dett.'" target="_Blank" style="text-decoration:none;">'.$itemd->ref.'</a> - ';$tib=$itemd->tib;$rkts=$itemd->rkts;$lienct=$itemd->ref;}
				
				}
			}
			echo '<span style="color:blue;">';
			if ($cestou1!=$cestou) {echo '<b><u>'.$cestou.' (<i>'.$tib.'</i>) <a href="../cat.php?id='.$rkts.'&typ='.$dett.'" target="_Blank" style="text-decoration:none;"><img src="../sub/link.png" width=30></a></u></b> (complete e-text for <a href="tcomplete.php?id='.$lienct.'&coll='.$col.'" target="_blank">'.$lienct.'</a>)<br> ';}
			echo str_replace("("," (",explode(": ",$ligne)[0]).' - ';
			echo '<a href="../images.php?id='.$dett.'|'.$col.'|'.$setref.'|I'.$volref.'|'.$secl.'|'.$linp.$linf.'" target="_blank"><img src="img.png" width=25px></a>';
			echo '</span><br>'.str_replace($txt,$red,$ttxt);
			echo '<br><a href="tcontext.php?txt='.$txt.'&repos='.$repos.'&vol='.substr($fichier,0,-4).'&pag='.explode(": ",$ligne)[0].'" target="_blank">See context <img style="vertical-align: text-top;" src="context.png" height=20></a>';
			echo '<br><br>';

			$fichier1=$fichier;
			$cestou1=$cestou;
			
}
}
}
}

?>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>


