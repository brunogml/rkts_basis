<html>
<head>
<style>
.table, .td, .th {
  border: 1px solid;
}

.table {
  width: 100%;
  border-collapse: collapse;
}
.th, .td {
  padding: 15px;
  text-align: justify;
}</style>
</head>
<body>
<table><tr><td><a href="../index.php" style="text-decoration:none;"><img src="../sub/logo.png" width=100></a>
<td><h1>e-text analyser</h1>
</table>
<table><tr><td><form action="analyser2.php">
rkts n° <input type=text" name="rkts">
<input type="submit" value="submit">
</form>

<?php
$rkts=$_GET['rkts'];
$txt1=$_GET['txt1'];
$txt2=$_GET['txt2'];



if ($rkts!=""){
	$collections=array("D","H","J","S");
	$repos=array("D-KanjurDerge","H-KanjurLhasa","J-KanjurLithang","S-KanjurStog");

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db12;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

	$sqlQueryl = "SELECT * FROM catalog WHERE rkts LIKE '$rkts' AND rktsTyp LIKE 'K' AND coll IN ('D','H','J')";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();

	$collres=array();
	
	foreach ($resultats as $res){ array_push($collres,$res['ref']);}
	echo '<form action="analyser2.php">';
	echo '<input type="hidden" name="rkts" value="'.$rkts.'">';
		echo '<table><tr><td>Text 1: ';
		foreach ($collres as $rr){ echo '<td><input type="radio" id="txt1" name="txt1" value="'.$rr.'"> '.$rr;}
		echo '<tr><td>Text 2: ';
		foreach ($collres as $rr){ echo '<td><input type="radio" id="txt2" name="txt2" value="'.$rr.'"> '.$rr;}
	echo '</table><input type="submit" value="submit">';
	echo '</form>';

}
	


echo '</table>';

if ($txt1!=""){
class Diff {
 
    public static function diffArray($old, $new){
        $matrix = array();
        $maxlen = 0;
        foreach($old as $oindex => $ovalue){
            $nkeys = array_keys($new, $ovalue);
            foreach($nkeys as $nindex){
                $matrix[$oindex][$nindex] = isset($matrix[$oindex - 1][$nindex - 1]) ? $matrix[$oindex - 1][$nindex - 1] + 1 : 1;
                if($matrix[$oindex][$nindex] > $maxlen){
                    $maxlen = $matrix[$oindex][$nindex];
                    $omax = $oindex + 1 - $maxlen;
                    $nmax = $nindex + 1 - $maxlen;
                }
            }
        }
        if($maxlen == 0) return array(array('d'=>$old, 'i'=>$new));
        return array_merge(
            self::diffArray(array_slice($old, 0, $omax), array_slice($new, 0, $nmax)),
            array_slice($new, $nmax, $maxlen),
            self::diffArray(array_slice($old, $omax + $maxlen), array_slice($new, $nmax + $maxlen)));
    }
 
    public static function htmlDiff($old, $new){
        $ret = '';
        $diff = self::diffArray(explode(' ', $old), explode(' ', $new));
        foreach($diff as $k){
            if(is_array($k)){
                $ret .= (!empty($k['i'])?'<span style="border: 2px solid red; border-radius: 5px;padding: 2px;background-color:#ff3232;">'.implode(' ',$k['i']).'#/span> ':'');
            }else{
                $ret .= $k . ' ';
            }
        }
        return $ret;
    }
 
}


function compareTexts($text1, $text2, $chunkSize = 100) {
    // Normalisierung der Texte (Leerzeichen reduzieren, Zeilenumbrüche vereinheitlichen)
    $text1 = preg_replace('/\s+/', ' ', trim($text1));
    $text2 = preg_replace('/\s+/', ' ', trim($text2));
    
    // Levenshtein-Distanz berechnen für den Gesamttext
    $maxLength = max(strlen($text1), strlen($text2));
    if ($maxLength == 0) {
        return [
            'similarityPercentage' => 100,
            'differences' => []
        ];
    }
    
    $levenshtein = levenshtein($text1, $text2);
    $similarityPercentage = round((1 - $levenshtein / $maxLength) * 100, 2);
    
    // Texte in Chunks zerlegen für detaillierte Analyse
    $chunks1 = [];
    $chunks2 = [];
    
    for ($i = 0; $i < strlen($text1); $i += $chunkSize) {
        $chunks1[] = substr($text1, $i, $chunkSize);
    }
    
    for ($i = 0; $i < strlen($text2); $i += $chunkSize) {
        $chunks2[] = substr($text2, $i, $chunkSize);
    }
    
    // Unterschiede zwischen den Chunks finden
    $differences = [];
    $maxChunks = max(count($chunks1), count($chunks2));
    
    for ($i = 0; $i < $maxChunks; $i++) {
        $chunk1 = isset($chunks1[$i]) ? $chunks1[$i] : '';
        $chunk2 = isset($chunks2[$i]) ? $chunks2[$i] : '';
        
        if ($chunk1 != $chunk2) {
            $chunkLength = max(strlen($chunk1), strlen($chunk2));
            if ($chunkLength > 0) {
                $chunkLevenshtein = levenshtein($chunk1, $chunk2);
                $differenceScore = $chunkLevenshtein / $chunkLength;
                
                $differences[] = [
                    'position' => $i * $chunkSize,
                    'text1' => $chunk1,
                    'text2' => $chunk2,
                    'differenceScore' => $differenceScore
                ];
            }
        }
    }
    
    // Nach Unterschiedlichkeit sortieren
    usort($differences, function($a, $b) {
        return $b['differenceScore'] <=> $a['differenceScore'];
    });
    
    // Auf die 5 unterschiedlichsten Passagen beschränken
    $differences = array_slice($differences, 0, 5);
    
    return [
        'similarityPercentage' => $similarityPercentage,
        'differences' => $differences
    ];
}

if (is_numeric(substr($txt1,1,1))) {$coll1=substr($txt1,0,1);} else {$coll1=substr($txt1,0,2);}
if (is_numeric(substr($txt2,1,1))) {$coll2=substr($txt2,0,1);} else {$coll2=substr($txt2,0,2);}
$vollist=simplexml_load_file('repository/volKanjur.xml');

$liste=simplexml_load_file('repository/listes/'.$coll1.'.xml');
foreach ($liste->item as $item) {
	if ($item->ref==$txt1){
	$vol1=$item->vol;$sec1=$item->sec;$debp1=$item->debp;$debf1=$item->debf;$debl1=$item->debl;$finp1=$item->finp;$finf1=$item->finf;$finl1=$item->finl;}
}
foreach($vollist->item as $item){ if (strcmp($item->volref,$vol1)==0) {$volno1=$item->voln;}}

foreach ($repos as $reposs){ if (explode('-',$reposs)[0]==$coll1) {$repos1=explode('-',$reposs)[1];}}
$chemin1='repository/'.$repos1.'/'.$volno1.'.txt';

$fh=fopen($chemin1, 'rb');
$text1="";

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
	
	if (strcmp($sec1,$secl)==0){
	if (($linp==$debp1 && $debf1=="a" and $linf=="a" and $linl>=$debl1) || ($linp==$debp1 and $debf1=="a" and $linf=="b") || ($linp==$debp1 and $debf1=="b" and $linf=="b" and $linl>=$debl1) || ($linp>$debp1 and $linp<$finp1) || ($linp==$finp1 and $finf1=="b" and $linf=="b" and $linl<=$finl1) || ($linp==$finp1 and $finf1=="b" and $linf=="a") || ($linp==$finp1 and $finf1=="a" and $linf=="a" and $linl<=$finl1))
	{ $text1=$text1.$txt.' '; }
	}
}



$liste=simplexml_load_file('repository/listes/'.$coll2.'.xml');
foreach ($liste->item as $item) {
	if ($item->ref==$txt2){
	$vol2=$item->vol;$sec2=$item->sec;$debp2=$item->debp;$debf2=$item->debf;$debl2=$item->debl;$finp2=$item->finp;$finf2=$item->finf;$finl2=$item->finl;}
}
foreach($vollist->item as $item){ if (strcmp($item->volref,$vol2)==0) {$volno2=$item->voln;}}

foreach ($repos as $reposs){ if (explode('-',$reposs)[0]==$coll2) {$repos2=explode('-',$reposs)[1];}}
$chemin2='repository/'.$repos2.'/'.$volno2.'.txt';

$fh=fopen($chemin2, 'rb');
$text2="";

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
	
	if (strcmp($sec2,$secl)==0){
	if (($linp==$debp2 && $debf2=="a" and $linf=="a" and $linl>=$debl2) || ($linp==$debp2 and $debf2=="a" and $linf=="b") || ($linp==$debp2 and $debf2=="b" and $linf=="b" and $linl>=$debl2) || ($linp>$debp2 and $linp<$finp2) || ($linp==$finp2 and $finf2=="b" and $linf=="b" and $linl<=$finl2) || ($linp==$finp2 and $finf2=="b" and $linf=="a") || ($linp==$finp2 and $finf2=="a" and $linf=="a" and $linl<=$finl2))
	{ $text2=$text2.$txt.' '; }
	}
}



$text1=str_replace("//","/",$text1);
$text1=str_replace("/ /","/",$text1);
$text1=str_replace("/ ","/",$text1);
$text1=str_replace(" /","/",$text1);
$text1=str_replace("/","/ ",$text1);
$text1=str_replace("  "," ",$text1);

$text2=str_replace("//","/",$text2);
$text2=str_replace("/ /","/",$text2);
$text2=str_replace("/ ","/",$text2);
$text2=str_replace(" /","/",$text2);
$text2=str_replace("/","/ ",$text2);
$text2=str_replace("  "," ",$text2);


    $result = compareTexts($text1, $text2);
    
    echo "<h2>Match between ".$txt1." and ".$txt2.": " . $result['similarityPercentage'] . "%</h2><br><br>";

$text1t=$text1;
$text2t=$text2;


if (strlen($text1)>10000)
{$text1t=substr($text1,0,10000); $text2t=substr($text2,0,10000); echo 'Texts have been truncated to 10.000 characters. 
<form action="analyser3.php" method="post" target="_blank">
<input type="hidden" name="txt1" value="'.$txt1.'">
<input type="hidden" name="txt2" value="'.$txt2.'">
<input type="hidden" name="text1" value="'.$text1.'">
<input type="hidden" name="text2" value="'.$text2.'">
complete table <input type="submit" value="here">
</form><br>';}


echo '<table class="table"><tr class="tr"><td class="td"><h1>'.$txt1.'</h1><td class="td"><h1>'.$txt2.'</h1>';
echo '<tr class="tr"><td class="td" valign="top">';
$result=Diff::htmlDiff($text2t,$text1t);
$result=str_replace("#/span","</span",$result);
echo $result;

echo '<td class="td" valign="top">';
$result=Diff::htmlDiff($text1t,$text2t);
$result=str_replace("#/span","</span",$result);
echo $result;

echo '</table>';

}
