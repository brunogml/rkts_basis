<?php
$txt = $_GET['txt'] ?? '';
$col = $_GET['col'] ?? '';

$encoded = str_replace('%20', '+', urlencode(urldecode($txt)));
header("Location: ../rkts1/pages/results2.html?text={$encoded}&collection={$col}&mode=exact&expert=0", true, 301);
exit;
?>






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
if ($expert==1){
	if ($col=="C") { echo '<option value="C" selected>C Cone Kanjur (OCR)</option>'; } 
	else { echo '<option value="C">C Cone Kanjur (OCR)</option>';	} 
}
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
	if ($col=="Ba") { echo '<option value="Ba" selected>Ba Basgo Fragments (OCR)</option>'; } 
	else { echo '<option value="Ba">Ba Basgo Fragments (OCR)</option>';	} 
	if ($col=="Dm") { echo '<option value="Dm" selected>Dm Drakmar Collection (OCR)</option>'; } 
	else { echo '<option value="Dm">Dm Drakmar Collection (OCR)</option>';	} 
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
if ($expert==1){
if ($col=="TQ") { echo '<option value="TQ" selected>Q Peking Tanjur (OCR)</option>'; 
				$repos="TanjurPeking";
				$liste="volTanjur";
				$det="Q";$dett="2";
				$setref="MW1KG13126";
				} 
	else { echo '<option value="TQ">Q Peking Tanjur (Input)</option>';} 
}

echo '<option value="xxx" style="font-weight:bold;text-decoration: underline;">-OLD TANTRA-</option>';
if ($expert==1){
if ($col=="Gaz") { echo '<option value="Gaz" selected>Gaz rnying rgyud bcu bdun (Anzom Chögar) (OCR)</option>'; 	} 
	else { echo '<option value="Gaz">Gaz rnying rgyud bcu bdun (Anzom Chögar) (OCR)</option>';} 
}
if ($expert==1){
if ($col=="Gbr") { echo '<option value="Gbr" selected>Gbr Vairocana rnying rgyud (OCR)</option>'; 		} 
	else { echo '<option value="Gbr">Gbr Vairocana rnying rgyud (OCR)</option>';} 
}
if ($expert==1){
if ($col=="Gdg") { echo '<option value="Gdg" selected>Gdg Derge rnying rgyud (OCR)</option>'; 		} 
	else { echo '<option value="Gdg">Gdg Derge rnying rgyud (OCR)</option>';} 
}
if ($expert==1){
if ($col=="Gkh") { echo '<option value="Gkh" selected>Gkh Khams rnying rgyud (OCR)</option>'; 		} 
	else { echo '<option value="Gkh">Gkh Khams rnying rgyud (OCR)</option>';} 
}
if ($expert==1){
if ($col=="Gkk") { echo '<option value="Gkk" selected>Gkk Khakong rnying rgyud (OCR)</option>'; 		} 
	else { echo '<option value="Gkk">Gkk Khakong rnying rgyud (OCR)</option>';} 
}
if ($expert==1){
if ($col=="Glt") { echo '<option value="Glt" selected>Glt rnying rgyud bcu bdun (Langthang) (OCR)</option>'; 		} 
	else { echo '<option value="Glt">Glt rnying rgyud bcu bdun (Langthang) (OCR)</option>';} 
}
if ($col=="Gpb") { echo '<option value="Gpb" selected>Gpb Paltsek rnying rgyud (OCR)</option>'; 		} 
	else { echo '<option value="Gpb">Gpb Paltsek rnying rgyud (OCR)</option>';} 
if ($expert==1){
if ($col=="Gtb") { echo '<option value="Gtb" selected>Gtb Tsamdrak rnying rgyud (OCR)</option>'; 		} 
	else { echo '<option value="Gtb">Gtb Tsamdrak rnying rgyud (OCR)</option>';} 
}
if ($expert==1){
if ($col=="Gtn") { echo '<option value="Gtn" selected>Gtn Rikdzin Tsewang Norbu rnying rgyud (OCR)</option>'; 		} 
	else { echo '<option value="Gtn">Gtn Rikdzin Tsewang Norbu rnying rgyud (OCR)</option>';} 
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
echo '<tr><td><td><a href="tserultsu.php?txt='.$txt.'&col='.$col.'&expert='.$expert.'" style="font-size:25px; text-decoration:none;">བོད་ཡིག</a>';
*/

echo '<td><td><a href="tresults2.php?col='.$col.'&txt='.$txt.'&expert='.$expert.'"><button type="button">approximate matches</button></a>';
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
/**
 * Search for a string in a Tibetan/Mongolian manuscript file (format: "149a7(section): content"),
 * matching even when the string is split across two consecutive lines.
 */
function findCrossLine(string $filePath, string $search, int $contextLen = 500): array
{
    $raw   = file_get_contents($filePath);
    $lines = explode("\n", str_replace("\r\n", "\n", $raw));

    $segments = [];
    foreach ($lines as $lineNum => $line) {
        if (preg_match('/^(\S+)\(([^)]+)\):\s*(.*)$/', $line, $m)) {
            $segments[] = [
                'ref'      => $m[1],
                'section'  => $m[2],
                'fileline' => $lineNum + 1,
                'content'  => $m[3],
            ];
        }
    }

    $plain       = '';
    $charLineMap = [];
    $breakPos    = [];

    foreach ($segments as $si => $seg) {
        $start = strlen($plain);
        $plain .= $seg['content'];
        for ($k = $start, $end = strlen($plain); $k < $end; $k++) {
            $charLineMap[$k] = $si;
        }
        if (isset($segments[$si + 1])) {
            $charLineMap[strlen($plain)] = $si;
            $breakPos[strlen($plain)]    = $segments[$si + 1]['ref'];
            $plain .= ' ';
        }
    }

    $annotate = function (int $offset, int $length) use ($plain, $breakPos): string {
        $out = '';
        for ($i = $offset, $end = $offset + $length; $i < $end; $i++) {
            $out .= isset($breakPos[$i])
                ? ' <sub style="color:gray">' . htmlspecialchars($breakPos[$i], ENT_QUOTES, 'UTF-8') . '</sub> '
                : htmlspecialchars($plain[$i], ENT_QUOTES, 'UTF-8');
        }
        return $out;
    };

    $results = [];
    $offset  = 0;
    $idx     = 0;

    while (($pos = strpos($plain, $search, $offset)) !== false) {
        $matchLen     = strlen($search);
        $endPos       = $pos + $matchLen - 1;
        $startSI      = $charLineMap[$pos]    ?? 0;
        $endSI        = $charLineMap[$endPos] ?? $startSI;
        $beforeOffset = max(0, $pos - $contextLen);
        $afterOffset  = $pos + $matchLen;

        $results[] = [
            'occurrence' => ++$idx,
            'split'      => ($startSI !== $endSI),
            'start_ref'  => $segments[$startSI]['ref'],
            'start_line' => $segments[$startSI]['fileline'],
            'section'    => $segments[$startSI]['section'],
            'end_ref'    => $segments[$endSI]['ref'],
            'end_line'   => $segments[$endSI]['fileline'],
            'before'     => $annotate($beforeOffset, $pos - $beforeOffset),
            'match'      => $annotate($pos, $matchLen),
            'after'      => $annotate($afterOffset, min(strlen($plain) - $afterOffset, $contextLen)),
        ];

        $offset = $pos + 1;
    }

    return $results;
}

			$xmld=simplexml_load_file('repository/listes/'.$det.'.xml');

function printMatches(array $matches, string $filePath): void
{
    if (empty($matches)) return;

    $count = count($matches);
    echo "<hr><h2>" . htmlspecialchars($filePath, ENT_QUOTES, 'UTF-8').'</h2>';

    foreach ($matches as $m) {
        $occ = $m['occurrence'];
        $ref = htmlspecialchars($m['start_ref'], ENT_QUOTES, 'UTF-8');
        $loc = $m['split']
            ? "{$ref} → " . htmlspecialchars($m['end_ref'], ENT_QUOTES, 'UTF-8')
            : $ref;
				$lin=explode(" ",$loc)[0];
				$secl=$m['section'];		
				if (strpos($lin,"a")!=false) {$pos=strpos($lin,"a");}
				if (strpos($lin,"b")!=false) {$pos=strpos($lin,"b");}
				$linp=substr($lin,0,$pos);
				$linf=substr($lin,$pos,1);
				$linl=substr($lin,$pos+1);
				
			foreach($GLOBALS['xmld']->item as $itemd) {
				if (strcmp($itemd->vol,$GLOBALS['volref'])==0 and strcmp($itemd->sec,$secl)==0){
					echo $volref;
						if (($linp==$itemd->debp && $itemd->debf=="a" and $linf=="a" and $linl>=$itemd->debl) || ($linp==$itemd->debp and $itemd->debf=="a" and $linf=="b") || ($linp==$itemd->debp and $itemd->debf=="b" and $linf=="b" and $linl>=$itemd->debl) || ($linp>$itemd->debp and $linp<$itemd->finp) || ($linp==$itemd->finp and $itemd->finf=="b" and $linf=="b" and $linl<=$itemd->finl) || ($linp==$itemd->finp and $itemd->finf=="b" and $linf=="a") || ($linp==$itemd->finp and $itemd->finf=="a" and $linf=="a" and $linl<=$itemd->finl))
						{ $cestou='<a href="../cat.php?id='.$itemd->rkts.'&typ='.$GLOBALS['dett'].'" target="_Blank" style="text-decoration:none;">'.$itemd->ref.'</a> - ';$tib=$itemd->tib;$rkts=$itemd->rkts;$lienct=$itemd->ref;}
				
				}
			}
echo '<b><u>'.$cestou.' (<i>'.$tib.'</i>) <a href="../cat.php?id='.$rkts.'&typ='.$GLOBALS['dett'].'" target="_Blank" style="text-decoration:none;"><img src="../sub/link.png" width=30></a></u></b> (complete e-text for <a href="tcomplete.php?id='.$lienct.'&coll='.$GLOBALS['col'].'" target="_blank">'.$lienct.'</a>)<br> ';
        $sec = htmlspecialchars($m['section'], ENT_QUOTES, 'UTF-8');
        echo "<p><code>{$loc}</code> <span style='color:#666;font-style:italic;'>({$sec})</span>";
		echo '<a href="../images.php?id='.$GLOBALS['dett'].'|'.$GLOBALS['col'].'|'.$GLOBALS['setref'].'|I'.$GLOBALS['volref'].'|'.$secl.'|'.$linp.$linf.'" target="_blank"><img src="img.png" width=25px></a></p>';
        echo "<p style='line-height:1.8'>…{$m['before']}"
           . "<span style='color:red;font-weight:bold'>{$m['match']}</span>"
           . "{$m['after']}…</p>\n";
    }
}



$scandir = scandir("repository/".$repos);
foreach($scandir as $fichier){
  if(preg_match("#\.(txt|ttt)$#i", $fichier)){

$file    = 'repository/'.$colSeg.'/'.$fichier;
$matches = findCrossLine($file, $txt, 250);
			$xml=simplexml_load_file("repository/".$liste.".xml");
			foreach ($xml->item as $item){if ($col==$item->col and substr($fichier,0,-4)==$item->voln) {$volref=$item->volref;$volname=$item->vol;}}



printMatches($matches, $volname);

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

<br><br><br><br><br>

<div style="position:absolute;top:3px;right: 10px;">
<a href="../rkts1/pages/results2.html" target="_blank"><img src="../sub/visitnew.jpg" width=100></a>
</div>
