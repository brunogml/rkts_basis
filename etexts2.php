<!DOCTYPE html>
<html>
<head>
<style>
.accordion {
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
  background-color: #fff;
}

.accordion:after {
  content: '\002B';
  color: #444;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.panel {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}
.fcc-btn {
  background-color: white;
  color: #08088a;
  padding: 5px;
  text-decoration: none;
  border-style: solid;
  border-color: #08088a;
  border-width: 2px;
  border-radius: 5px;
}
.custom-select {
	color:#08088a;
	font-size:20px;
	  border-style: solid;
  border-color: #08088a;
  border-width: 2px;
  border-radius: 5px;

}
</style>
</head>
<body>



<form action="etexts2.php">
rKTs n° K<input type="text" id="rkts" name="rkts">
<input type="Submit" value="ok">
</form>

<?php
try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr82.world4you.com;dbname=6140636db9;charset=utf8', 'sql2575617', 'q@ix2uft');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$rkts=$_GET['rkts'];
$ref2=$_GET['ref2'];
$pag=$_GET['pag'];
$volume=$_GET['volume'];
$section=$_GET['section'];



if (isset($rkts))
{
echo '<h1>rKTs-K'.$rkts.'</h1>';
$xml=simplexml_load_file('data/alignments/K'.$rkts.'.xml');

echo '<h3>Derge Reference text: '.$xml->locref->vol.', '.$xml->locref->p.'</h3>';

echo '<table><tr><td>compare with <td><form action="etexts2.php?">';
echo '<input type="hidden" name="rkts" id="rkts" value="'.$rkts.'">';
echo '<input type="hidden" name="pag" id="pag" value="'.$pag.'">';
echo '<input type="hidden" name="volume" id="volume" value="'.$volume.'">';
echo '<input type="hidden" name="section" id="section" value="'.$section.'">';
echo '<select class="custom-select" name="ref2" id="ref2"  onchange="this.form.submit()">';
echo '<option value="xxx">---</option>';
foreach($xml->item->align as $align) { if ($align->coll=="D") { echo '<option value="'.$align->ref.'">'.$align->ref.'</option>'; break;}}
foreach($xml->item->align as $align) { if ($align->coll=="J") { echo '<option value="'.$align->ref.'">'.$align->ref.'</option>'; break;}}
foreach($xml->item->align as $align) { if ($align->coll=="H") { echo '<option value="'.$align->ref.'">'.$align->ref.'</option>'; break;}}
foreach($xml->item->align as $align) { if ($align->coll=="S") { echo '<option value="'.$align->ref.'">'.$align->ref.'</option>'; break;}}
echo '</select>';
echo '</form></table><hr>';

/*si page pas définie*/
if ($pag=="")
{	
	$pag=$xml->item->ref->pag;
	$section=$xml->item->ref->sec;
	$volume=$xml->item->ref->vol;
	
}	



/*trouver le parallèle*/
foreach($xml->item as $item){
	if (strcmp($item->ref->vol,$volume)==0 AND strcmp($item->ref->sec,$section)==0 AND strcmp($item->ref->pag,$pag)==0)
	{
	foreach($item->align as $align)
	{
		if (strcmp($align->ref,$ref2)==0)
		{
			$pag2=$align->pag;
			$volume2=$align->vol;
			$section2=$align->sec;
			$col2=$align->coll;
			break;
		}
	}
	}
}

if (substr($pag2,-1)=="a") {$tt=substr($pag2,0,-1); $pag2a=$tt.'b';}
if (substr($pag2,-1)=="b") {$tt=substr($pag2,0,-1); $tt=$tt+1; $pag2a=$tt.'a';}
if (substr($pag2a,-1)=="a") {$tt=substr($pag2a,0,-1); $pag2b=$tt.'b';}
if (substr($pag2a,-1)=="b") {$tt=substr($pag2a,0,-1); $tt=$tt+1; $pag2b=$tt.'a';}
 
$sqlQuery = "SELECT * FROM KanjurDerge WHERE vol LIKE '$volume' AND sec LIKE '$section' AND pag LIKE '$pag%'";
$resultat = $mysqlClient->prepare($sqlQuery);
$resultat->execute();
$resultats = $resultat->fetchAll();

$derge="";
foreach ($resultats as $res)
{
	$derge=$derge.$res['text'];
}

$derge=str_replace("  "," ",$derge);

if ($col2=="J") {$txtn="KanjurLithang";}
if ($col2=="H") {$txtn="KanjurLhasa";}
if ($col2=="S") {$txtn="KanjurStog";}
if ($col2=="D") {$txtn="KanjurDerge";}


$sqlQuery = "SELECT * FROM ".$txtn." WHERE vol LIKE '$volume2' AND sec LIKE '$section2' AND pag LIKE '$pag2%'";
$resultat = $mysqlClient->prepare($sqlQuery);
$resultat->execute();
$resultats = $resultat->fetchAll();
$lithang="";
foreach ($resultats as $res)
{
	$lithang=$lithang.$res['text'];
}
$sqlQuery = "SELECT * FROM ".$txtn." WHERE vol LIKE '$volume2' AND sec LIKE '$section2' AND pag LIKE '$pag2a%'";
$resultat = $mysqlClient->prepare($sqlQuery);
$resultat->execute();
$resultats = $resultat->fetchAll();
foreach ($resultats as $res)
{
	$lithang=$lithang.$res['text'];
}
$sqlQuery = "SELECT * FROM ".$txtn." WHERE vol LIKE '$volume2' AND sec LIKE '$section2' AND pag LIKE '$pag2b%'";
$resultat = $mysqlClient->prepare($sqlQuery);
$resultat->execute();
$resultats = $resultat->fetchAll();
foreach ($resultats as $res)
{
	$lithang=$lithang.$res['text'];
}

$lithang=str_replace("  "," ",$lithang);


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
                $ret .= (!empty($k['i'])?'<span style="border: 2px solid red; border-radius: 5px;padding: 2px;">'.implode(' ',$k['i']).'#/span> ':'');
            }else{
                $ret .= $k . ' ';
            }
        }
        return $ret;
    }
 
}

$derge=str_replace("//","/",$derge);
$derge=str_replace("/ /","/",$derge);
$derge=str_replace("/ ","/",$derge);
$derge=str_replace(" /","/",$derge);
$derge=str_replace("/","/ ",$derge);

$lithang=str_replace("//","/",$lithang);
$lithang=str_replace("/ /","/",$lithang);
$lithang=str_replace("/ ","/",$lithang);
$lithang=str_replace(" /","/",$lithang);
$lithang=str_replace("/","/ ",$lithang);

if (substr($pag,-1)=="a") {$tt=substr($pag,0,-1); $npag=$tt.'b';$tt1=$tt-1; $npag2=$tt1.'b';}
if (substr($pag,-1)=="b") {$tt=substr($pag,0,-1); $tt1=$tt; $tt=$tt+1; $npag=$tt.'a';$npag2=$tt1.'a';}



$result=Diff::htmlDiff($lithang,$derge);
$result=str_replace("#/span","</span",$result);
echo '<table><tr><td><h1>Derge</h1><td><h2>'.$pag.'</h2><td width=100><td>
<a  class="fcc-btn" href="etexts2.php?rkts='.$rkts.'&ref2='.$ref2.'&pag='.$npag2.'&volume='.$volume.'&section='.$section.'">Previous page</a><a  class="fcc-btn" href="etexts2.php?rkts='.$rkts.'&ref2='.$ref2.'&pag='.$npag.'&volume='.$volume.'&section='.$section.'">Next page</a></table>'.$result;
	$json=file_get_contents('data/Collections/D Derge Kanjur/22084/'.$volume.'.json');
	$jsona=json_decode($json,true);
		foreach ($jsona as $ligne) {if (strcmp($ligne["psection"],$section)==0 AND strcmp($ligne["pagination"],$pag)==0) {$img1=$ligne["file"];}}

echo '<br>Image <a href="images.php?id=1|D|MW22084|I'.$volume.'|'.$section.'|'.$pag.'" target="_blank"><img src="sub/link.png" width=25></a>';

echo '<hr>';
if ($col2=="J") {$colln="Lithang";$colljson="J Lithang Kanjur";$setjson="4CZ7445";}
if ($col2=="H") {$colln="Lhasa";$colljson="H Lhasa Kanjur";$setjson="26071";}
if ($col2=="S") {$colln="Stog";$colljson="S Stog Kanjur";$setjson="22083";}
if ($col2=="D") {$colln="Derge";$colljson="D Derge Kanjur";$setjson="22084";}

$result=Diff::htmlDiff($derge,$lithang);
$result=substr($result,strpos($result,"/span>")+7);

if (substr($result,-8,6)=="/span>") { $result=substr($result,0,strrpos($result,"<span "));}

$result=str_replace("#/span","</span",$result);

echo '<table><tr><td><h1>'.$colln.'</h1><td><h2>'.$pag2.' f.</h2></table>'.$result;

echo '<br>Image <a href="images.php?id=1|'.$col2.'|MW'.$setjson.'|I'.$volume2.'|'.$section2.'|'.$pag2.'" target="_blank"><img src="sub/link.png" width=25></a>';


}

?>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>

</body>
</html>

