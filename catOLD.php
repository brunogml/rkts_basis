<!DOCTYPE html> 
<html> 
  
<head> 
    <title>rKTs</title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <link rel="icon" type="image/x-icon" href="sub/logo.ico">

    <link rel="stylesheet" href="sub/style.css"> 
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
.accordion2 {
  background-color: #fff;
  color: #444;
  cursor: pointer;
  padding: 10px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 20px;
  transition: 0.4s;
}
.accordion3 {
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
.active3,  {
  background-color: #ddd; 
}

.accordion:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: left;
  margin-left: 5px;
}
.accordion2:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: left;
  margin-left: 5px;
}
.accordion3:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: left;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}
.active2:after {
  content: "\2212";
}
.active3:after {
  content: "\2212";
}


.panel {
  font-size: 18px;
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

</head>

<body>
<?php
include ('sub/unicode2.php');
$id=$_GET['id'];
$typ=$_GET['typ'];
if ($typ==1) {$id1='K'.$id;$catName="Kanjur";}
if ($typ==2) {$id1='T'.$id;$catName="Tanjur";}
if ($typ==3) {$id1='G'.$id;$catName="Old Tantra";}

?>

<div class="toppage">
<table><tr><td><a href="index.php" style="text-decoration:none;"><img src="sub/logo.png" width=100></a>
<?php echo '<td width=50><td>Catalog entry rKTs-'.$id1.' ('.$catName.')';?>
</table>
</div>

<div class="bodypage2">

<?php
if ($typ==1){	$xml=simplexml_load_file('data/Kernel/rkts.xml');}
if ($typ==2){	$xml=simplexml_load_file('data/Kernel/rktst.xml');}
if ($typ==3){	$xml=simplexml_load_file('data/Kernel/rktsg.xml');}

	foreach($xml->item as $item){
		if (strcmp($id,$item->rkts)==0 or strcmp($id,$item->rktst)==0 or strcmp($id,$item->rktsg)==0){
			$tibtit=$item->StandardTibetan;
			unicode($tibtit);
			echo '<h1 class="tib">'.$tibtit.'</h1><h2>'.$item->StandardTibetan.'</h2>';
			echo '<h2>'.$item->StandardSanskrit.'</h2>';
			echo '<h2>'.$item->English84000.'</h2>';

echo '<button class="accordion2 active"> alternative titles</button><div class="panel" style="display: block;"><div>';
foreach($item->tib as $tib){
	if ($tib->source==""){echo '<br><span class="tib">'.$tib.'</span>';}
	else {echo '<br><span class="tib">'.$tib.' ('.$tib->source.')</span>';}
}
echo '<br><br></div></div>';
	}}

	echo '<button class="accordion2 active"> Details</button><div class="panel" style="display: block;"><div>';

$xmld=simplexml_load_file("data/Collections/collections.xml");
foreach($xmld->item as $itemd){
	if (strcmp($itemd->category,$catName)==0 and $itemd->outline==1){
	$oui=0; 
	$text='<button class="accordion"> '.$itemd->sigla.' '.$itemd->name.'</button><div class="panel"><div>';
	$xmlc=simplexml_load_file('data/Collections/'.$itemd->sigla.' '.$itemd->name.'/'.$itemd->sigla.'.xml'); 
	$ijk=0;
	foreach($xmlc->item as $itemc) {
	if (strcmp($id,$itemc->rkts)==0 or strcmp($id,$itemc->rktst)==0 or strcmp($id,$itemc->rktsg)==0) {
		$oui=1;
		if ($ijk>0) {$text=$text.'<br><br><hr>';}
		$text=$text.'<br><span style="font-weight:bold; background-color:#d0d0fc; border: 2px solid #08088a; padding:10px; border-radius: 5px;">'.$itemc->ref.'</span><br>';
		if ($itemc->tib!=""){
			$tibc=$itemc->tib;
		unicode($tibc);
		$text=$text.'<br><font size=+3>'.$tibc.'</font>';
		$text=$text.'<br>'.$itemc->tib;
		}
		else { $text=$text.'<br><i>No title at the beginning of the text</i>';}
		if ($itemc->skttrans!=""){
		$sktc=$itemc->skttrans;
		unicode($sktc);
		$text=$text.'<br><font size=+3>'.$sktc.'</font>';
		$text=$text.'<br>'.$itemc->skttrans;
		}
	
/*Images*/
	
 if ($itemd->sigla=="NLM") {
	$text=$text.'<br><br><b><u>Images</u></b>:';
	$text=$text.'<a href="NLM/index.php?id='.substr(explode(".",$itemc->ref)[0],3).'|'.$itemc->ph.'" target="_blank" style="text-decoration:none; color:black;"><img src="sub/link.png" width=30></a><br>';
 }	 


$debv=$itemc->loc->json;
$debs=$itemc->loc->psection;
$debb=substr(explode("-",$itemc->loc->p)[0],0,-1);

/*ETEXTS*/

	if (strcmp($itemd->sigla,'D')==0 and $typ==1){
	$text=$text.'<br><b><u>e-texts</u></b>:';
	$text=$text.'<a href="etexts/complete.php?id='.$itemc->ref.'&coll=D" target="_blank" style="text-decoration:none; color:black;"><img src="sub/link.png" width=30></a><br>';
}
	if (strcmp($itemd->sigla,'H')==0){
	$text=$text.'<br><b><u>e-texts</u></b>:';
	$text=$text.'<a href="etexts/complete.php?id='.$itemc->ref.'&coll=H" target="_blank" style="text-decoration:none; color:black;"><img src="sub/link.png" width=30></a><br>';
}
	if (strcmp($itemd->sigla,'J')==0){
	$text=$text.'<br><b><u>e-texts</u></b>:';
	$text=$text.'<a href="etexts/complete.php?id='.$itemc->ref.'&coll=J" target="_blank" style="text-decoration:none; color:black;"><img src="sub/link.png" width=30></a><br>';
}
	if (strcmp($itemd->sigla,'D')==0 and $typ==2){
	$text=$text.'<br><b><u>e-texts</u></b>:';
	$text=$text.'<a href="etexts/complete.php?id='.$itemc->ref.'&coll=T" target="_blank" style="text-decoration:none; color:black;"><img src="sub/link.png" width=30></a><br>';
}
	if (strcmp($itemd->sigla,'Gpb')==0 and $typ==3){
	$text=$text.'<br><b><u>e-texts</u></b>:';
	$text=$text.'<a href="etexts/complete.php?id='.$itemc->ref.'&coll=G" target="_blank" style="text-decoration:none; color:black;"><img src="sub/link.png" width=30></a><br>';
}


if ($itemc->chap!="" or $itemc->bampo!="") { 
		$text=$text.'<br><br><b><u>Textual Structure</u></b>:';
		$text=$text.'<table><tr>';
	


	
/*CHAPTERS*/
		if ($itemc->chap!="") { 
		$text=$text.'<td valign="top"><button class="accordion3"> Chapters</button><div class="panel"><div>';
		foreach($itemc->chap as $chap) { $text=$text.'<br>'.$chap.' ('.$chap->loc->p.')';
											if ($itemd->set->integratedrKTs==1){
												$text=$text.'  <a href="images.php?id='.$typ.'|'.$itemd->sigla.'|'.$itemd->set->ref.'|I'.$chap->loc->json.'|'.$chap->loc->psection.'|'.substr($chap->loc->p,0,-1).'" target="_blank" style="text-decoration:none; color:black;"><img src="sub/link.png" width=30></a>';
											}
											if ($itemd->sigla=="A") {
													$text=$text.'<a href="dpe.php?id=1|'.$chap->loc->json.'||'.explode('-',$chap->loc->p)[0].'||" target="_blank" style="text-decoration:none; color:black;"><img src="sub/link.png" width=30></a>';
												 }	 

		}
		$text=$text.'</div></div>';
		}
/*BAMPOS*/
		if ($itemc->bampo!="") { 
		$text=$text.'<td valign="top"><button class="accordion3"> Bampos</button><div class="panel"><div>';
		foreach($itemc->bampo as $bampo) { $text=$text.'<br>'.$bampo.' ('.$bampo->loc->p.')';
											if ($itemd->set->integratedrKTs==1){
												$text=$text.'  <a href="images.php?id='.$typ.'|'.$itemd->sigla.'|'.$itemd->set->ref.'|I'.$bampo->loc->json.'|'.$bampo->loc->psection.'|'.substr(explode('-',$bampo->loc->p)[0],0,-1).'" target="_blank" style="text-decoration:none; color:black;"><img src="sub/link.png" width=30></a>';
											}
											if ($itemd->sigla=="A") {
													$text=$text.'<a href="dpe.php?id=1|'.$bampo->loc->json.'||'.explode('-',$bampo->loc->p)[0].'||" target="_blank" style="text-decoration:none; color:black;"><img src="sub/link.png" width=30></a>';
												 }	 
		}
		$text=$text.'</div></div>';
		}
		$text=$text.'</table>';
}
/*LOCATION*/
	$text=$text.'<br><b><u>Location</u></b>:<table><tr>';
	foreach($itemd->set as $setd) {
		$text=$text.'<td width=50><td valign="top" style="border-left: 1px solid #000;padding-left: 10px;"><b><u> Set: '.$setd->ref.'</u></b><br><br>';
	foreach($itemc->loc as $loc){
		if (strcmp($setd->ref,$loc->set)==0) {
		$text=$text.$loc->vol.', '.$loc->p.' ';
		if ($itemd->sigla!="A" and $itemd->sigla!="NLM" and $setd->integratedrKTs==1)
		{$text=$text.'<a href="images.php?id='.$typ.'|'.$itemd->sigla.'|'.$setd->ref.'|I'.$loc->json.'|'.$loc->psection.'|'.substr(explode("-",$loc->p)[0],0,-1).'" target="_blank" style="text-decoration:none; color:black;"><img src="sub/link.png" width=30></a>';
			if ($itemd->sigla=="C" OR $itemd->sigla=="D"  OR $itemd->sigla=="Go" OR $itemd->sigla=="H" OR $itemd->sigla=="He" OR $itemd->sigla=="J" OR $itemd->sigla=="N" OR $itemd->sigla=="Q" OR $itemd->sigla=="R" OR $itemd->sigla=="S" OR $itemd->sigla=="Ty" OR $itemd->sigla=="U" OR $itemd->sigla=="Z") { $text=$text.'<br>complete text <a href="imagescomplete.php?id='.$itemc->ref.'&set='.$setd->ref.'" target="_blank"><img src="sub/link.png" width=30></a>';}

	
	}

		if ($itemd->sigla=="A") {
		$text=$text.'<a href="dpe.php?id='.$typ.'|'.$loc->json.'||'.explode('-',$loc->p)[0].'||" target="_blank" style="text-decoration:none; color:black;"><img src="sub/link.png" width=30></a><br>';}
			
		$text=$text.'<br>';
	}}
			if ($setd->ref=="NLM") {
		$text=$text.$itemc->refNLM.' ('.$itemc->loc->p.') ';
		if (strcmp($itemc->booktype,"MS")==0) { $text=$text.'[Manuscript '.$itemc->size.'cm]';}
		if ($itemc->booktype=="XYL") { $text=$text.'[Xylograph '.$itemc->size.'cm]';}
		if ($itemc->booktype=="RGYA NAG PAR,") { $text=$text.'[Chinese print '.$itemc->size.'cm]';}
		}

	
	}
	$text=$text.'</table>';


/*COLOPHON*/
	if ($itemc->coloph!=""){
		$text=$text.'<br><b><u>Colophon</u></b>:';
	if ($itemd->set->integratedrKTs==1){
			$finv=$itemc->loc->json;
			$fins=$itemc->loc->psection;
			$finn=substr(explode("-",$itemc->loc->p)[1],0,-1);
		$text=$text.' <a href="images.php?id='.$typ.'|'.$itemd->sigla.'|'.$itemd->set->ref.'|I'.$finv.'|'.$fins.'|'.$finn.'" target="_blank" style="text-decoration:none; color:black;"><img src="sub/link.png" width=30></a>';}
		$colophc=$itemc->coloph;
		unicode($colophc);
		$text=$text.'<br><font size=+3>'.$colophc.'</font>';
		$text=$text.'<br>'.$itemc->coloph;

	}
	
/*TRANSLATORS*/
		if (strcmp($itemd->sigla,'D')==0) {$arraytrans=array();}
		$ni=0;
		if ($itemc->translator!="" OR $itemc->revisor!="" ){
		$text=$text.'<br><br><b><u>Translators and revisors</u></b>:';
		foreach ($itemc->translator as $trans)
		{		$text=$text.'<br>'.$trans.' (Tr.) <a href="persons.php?id='.$trans->rid.'" target="_blank"><img src="sub/link.png" width=30></a>';
		if (strcmp($itemd->sigla,'D')==0 AND strcmp(substr($trans->rid,0,5),"bdr:P")==0) {$arraytrans[$i]=$trans->rid;$i++;}
		}
		foreach ($itemc->revisor as $trans)
		{		$text=$text.'<br>'.$trans.' (Rev.) <a href="persons.php?id='.$trans->rid.'" target="_blank"><img src="sub/link.png" width=30></a>';
		if (strcmp($itemd->sigla,'D')==0 AND strcmp(substr($trans->rid,0,5),"bdr:P")==0) {$arraytrans[$i]=$trans->rid;$i++;}
		}
		}
			
	
/*NOTES*/
		if ($itemc->note!=""){
		$text=$text.'<br><b><u>Notes</u></b>:';
		foreach($itemc->note as $note){
		$text=$text.'<br>- '.$note;
		}
		}
		
/*InDERGE*/
		if ($itemc->inDerge->img!=""){
		$text=$text.'<br><b><u>Equivalences</u></b>:';
		foreach($itemc->inDerge as $inDerge){
			$vold=$inDerge->vol;
			$vols=$inDerge->psection;
			$volp=$inDerge->p;
			$json=file_get_contents('data/Collections/D Derge Kanjur/vol22084.json');
			$jsona=json_decode($json,true);
			foreach($jsona as $ligne) {
				if (strcmp($ligne["bdrc"],$vold)==0) {$vold1=$ligne["vol"];}
			}
		$text=$text.'<br>- '.$inDerge->img.' = Derge '.$vold1.' p. '.$inDerge->p;
		}
		}
		

		
	
	$ijk=$ijk+1;

	}
	}	
	$text=$text.'<hr></div></div>';
	
if ($oui==1) {echo $text;}
		
}}

/*NLM for Tanjur*/
if ($typ==2)
{
	$text="";
	$oui=0;	
	$xmlnlm=simplexml_load_file("data/Collections/NLM National Library of Mongolia/NLM.xml");
	foreach ($xmlnlm->item as $itemnlm)
	{
		if (strcmp($itemnlm->rktst,$id)==0) { $oui=1;
		$text=$text.'<br><span style="font-weight:bold; background-color:#d0d0fc; border: 2px solid #08088a; padding:10px; border-radius: 5px;">'.$itemnlm->ref.'</span><br>';
		$tibn=$itemnlm->tib;
		$tibc=$tibn;
		unicode($tibc);
		$text=$text.'<br><font size=+3>'.$tibc.'</font>';
		$text=$text.'<br>'.$tibn;
		$text=$text.'<br><br><b><u>Images</u></b>:';
		$text=$text.'<a href="NLM/index.php?id='.substr(explode(".",$itemnlm->ref)[0],3).'|'.$itemnlm->ph.'" target="_blank" style="text-decoration:none; color:black;"><img src="sub/link.png" width=30></a><br>';

	$text=$text.'<br><b><u>Location</u></b>:<table><tr>';
					
		$text=$text.$itemnlm->refNLM.' ('.$itemnlm->loc->p.') ';
		if (strcmp($itemnlm->booktype,"MS")==0) { $text=$text.'[Manuscript '.$itemnlm->size.'cm]';}
		if ($itemnlm->booktype=="XYL") { $text=$text.'[Xylograph '.$itemnlm->size.'cm]';}
		if ($itemnlm->booktype=="RGYA NAG PAR,") { $text=$text.'[Chinese print '.$itemnlm->size.'cm]';}
		
	$text=$text.'</table><hr>';

		}
	}

if ($oui==1)
{
	echo 	'<button class="accordion">NLM National Library of Mongolia</button><div class="panel"><div>';
	echo $text;
	echo '</div><br><br>';
}

}
/*Mongolian*/
try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db12;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
try
{
$mysqlClient2  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db11;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
		die('Erreur : '.$e->getMessage());
}
if ($typ==1) {$typ1="K";}
if ($typ==2) {$typ1="T";}
	$text="";
	$oui=0;	

			$sq = "SELECT * FROM mongolian WHERE rkts LIKE '$id' AND rktsTyp LIKE '$typ1' AND coll LIKE 'Mmk'";
			$rsq = $mysqlClient->prepare($sq);
			$rsq->execute();
			$rsqs = $rsq->fetchAll();
					foreach($rsqs as $rsm)
					{$oui=1;
		$text=$text.'<br><span style="font-weight:bold; background-color:#d0d0fc; border: 2px solid #08088a; padding:10px; border-radius: 5px;">'.$rsm["ref"].'</span>';
		$mng=$rsm["mng"];
		$refm=$rsm["ref"];
		$coloph=$rsm["coloph"];
		$text=$text.'<br><br><span style="font-family:Mongolian Baiti;font-size:35px;">'.$mng.'</span><br>';
		$text=$text.'<br><b><u>Location</u></b>:<table><tr>';
			$sqm = "SELECT * FROM locations WHERE ref LIKE '$refm'";
			$rsqm = $mysqlClient->prepare($sqm);
			$rsqm->execute();
			$rsqsm = $rsqm->fetchAll();
			
			foreach($rsqsm as $ls) { 
			
							$setidim=$ls["setid"];
							$sqlim = "SELECT * FROM Sets WHERE S_Ref LIKE '$setidim'";
							$resim = $mysqlClient2->prepare($sqlim);
							$resim->execute();
							$resims = $resim->fetchAll();
							$imoui=$resims[0]["S_IntegratedrKTs"];
			
			
				if (strcmp($sett,$ls["setid"])!=0) { $text=$text.'<td width=50><td style="border-left:1px solid #08088a;padding:5px;">';}
				$text=$text.$ls["setid"].': '; 
				if($typ=="K") {$typn=1;}
				if($typ=="T") {$typn=2;}
				if($typ=="G") {$typn=3;}
				$voll="I".$ls["vol"];
							$sqlim = "SELECT * FROM Volumes WHERE V_Ref LIKE '$voll'";
							$resim = $mysqlClient2->prepare($sqlim);
							$resim->execute();
							$resims = $resim->fetchAll();
							$volll=$resims[0]["V_Name"];
							$text=$text.$volll.' - ';
				
				$text=$text.$ls["debp"].$ls["debf"].'<sub>'.$ls["debl"].'</sub>-'.$ls["finp"].$ls["finf"].'<sub>'.$ls["finl"].'</sub>';
					if ($imoui==1) { $text=$text.'<a href="images.php?id=5|Mmk|'.$ls["setid"].'|I'.$ls["vol"].'|'.$ls["sec"].'|'.$ls["debp"].$ls["debf"].'" target="_blank"><img src="sub/link.png" width=30></a>'; 
					}
				$text=$text.'<br>';
				$sett=$ls["setid"];
				}
				
$text=$text.'</table>';
				
 
if ($coloph!=""){
$text=$text.'<br><span style="font-size:20px;font-weight:bold;text-decoration: underline;">Colophon</span>';
$text=$text.'<br>'.$coloph;
}
				
				
				
				
				}

if ($oui==1)
{
	echo 	'<button class="accordion">Mongolian printed Kanjur</button><div class="panel"><div>';
	echo $text;
	echo '</div><br><br>';
}


echo '<br><br></div></div>';

/*PERSONS*/

if ($typ==1){
	echo '<button class="accordion2 active">Persons </button><div class="panel" style="display: block;"><div>';
$xmltrans=simplexml_load_file("data/Persons/persons.xml");

foreach ($arraytrans as $transs)
{
	foreach ($xmltrans->item as $itemtrans){
		if (strcmp($itemtrans->ref,$transs)==0) { echo '<table><tr><td><h3>'.$itemtrans->Standardname.'</h3><td><a href="persons.php?id='.$itemtrans->ref.'" target="_blank"><img src="sub/link.png" width=30></a></table>';
	echo '<button class="accordion3">Translator in </button><div class="panel" style="display: none;"><div>';
		$xmlwo=simplexml_load_file('data/Collections/D Derge Kanjur/D.xml'); $itt=0;
			foreach ($xmlwo->item as $itemwo){
					foreach ($itemwo->translator as $transwo) {
						if (strcmp($transwo->rid,$itemtrans->ref)==0) { echo '- <a href="cat.php?id='.$itemwo->rkts.'&typ=1" target="_blank" style="text-decoration:none;color:#08088a;">'.$itemwo->ref.' - '.$itemwo->tib.'</a><br>';$itt++;}
}	
}
if ($itt==0) { echo 'no entry found';}

echo '<br><br></div></div>';

	echo '<button class="accordion3">Revisor in </button><div class="panel" style="display: none;"><div>';
		$xmlwo=simplexml_load_file('data/Collections/D Derge Kanjur/D.xml'); $itt=0;
			foreach ($xmlwo->item as $itemwo){
					foreach ($itemwo->revisor as $transwo) {
						if (strcmp($transwo->rid,$itemtrans->ref)==0) { echo '- <a href="cat.php?id='.$itemwo->rkts.'&typ=1" target="_blank" style="text-decoration:none;color:#08088a;">'.$itemwo->ref.' - '.$itemwo->tib.'</a><br>';$itt++;}
}	
}
if ($itt==0) { echo 'no entry found';}
echo '<br><br></div></div>';

}
}
}
echo '<br>source rKTs & <a href="https://www.bdrc.io/blog/2022/01/21/the-authors-and-translators-identification-initiative/" target="_blank" style="color:black;text decoration:underline;"><img src="sub/ATII.jpg" width=150 style="vertical-align: middle;"></a> </i>';
echo '<br><br></div></div>';
}

	echo '<button class="accordion2 active">Links</button><div class="panel" style="display: block;"><div>';

if ($typ==1) {
if ($id<10) {$refbdrc="000".$id;}
if ($id<100 and $id>9) {$refbdrc="00".$id;}
if ($id<1000 and $id>99) {$refbdrc="0".$id;}
/*BDRC*/
echo '<table><tr><td height=50 width=250><a href="http://library.bdrc.io/show/bdr:WA0RK'.$refbdrc.'" target="_void" style="text-decoration:none; color:black;"><img src="../sub/bdrc.jpg" width=70><td width=15><td valign="center"><a href="http://library.bdrc.io/show/bdr:WA0RK'.$refbdrc.'" target="_void" style="text-decoration:none; color:black;">BDRC bdr:WAORK'.$refbdrc.'</a>';

/*84000*/
$xmldn = simplexml_load_file('data/Collections/D Derge Kanjur/D.xml'); 
foreach($xmldn->item as $item) { if ($item->rkts==$id) {$dergen=$item->ref;} $dergen=str_replace('D','',$dergen);}
echo '<tr><td height=50 width=250><a href="https://read.84000.co/translation/toh'.$dergen.'.html" target="_blank" style="text-decoration:none; color:black;"><img src="../sub/84000.png" width=100><td><td valign="center"><a href="https://read.84000.co/translation/toh'.$dergen.'.html" target="_blank" style="text-decoration:none; color:black;">84000 Toh '.$dergen.'</a>';

/*Buddhanexus*/
function read($csv){
    $file = fopen($csv, 'r');
    while (!feof($file) ) {
        $line[] = fgetcsv($file, 1024);
    }
    fclose($file);
    return $line;
}
$csv = 'data/extra/bn_bdrc_list.csv';
$csv = read($csv);
$idbn="000".$id;
$idbn=substr($idbn,-4);
$idbn="WA0RK".$idbn;
foreach($csv as $entree){
	$rktsbn=explode('	',$entree[0])[0];
	$bn=explode('	',$entree[0])[1];
	if (strcmp($idbn,$rktsbn)==0) {$bnlien=$bn;}
}
echo '<tr><td height=50 width=250><a href="https://buddhanexus.net/tib/text/'.$bnlien.'" target="_void" style="text-decoration:none; color:black;"><img src="../sub/nexus.png" width=70><td width=15><td valign="center"><a href="https://buddhanexus.net/tib/text/'.$bnlien.'" target="_void" style="text-decoration:none; color:black;">BuddhaNexus '.$bnlien.'</a>';

/*Adarsha*/
$deja=0;
$xmlad = simplexml_load_file('../data/extra/adarshaLocJiang.xml'); 
foreach($xmlad->item as $itemad)
{ if (strcmp($itemad->rkts,$id)==0 and $deja!=1) {
echo '<tr><td height=100 width=250><a href="https://adarsha.dharma-treasure.org/kdbs/jiangkangyur?locale=bo&pbId='.$itemad->loc.'" target="_blank" style="text-decoration:none;color:black;"><img src="../sub/adarsha.png" width=100><td><td valign="center"><a href="https://adarsha.dharma-treasure.org/kdbs/jiangkangyur?locale=bo&pbId='.$itemad->loc.'" target="_blank" style="text-decoration:none;color:black;"> འཇང་བཀའ་འགྱུར།</a><br><br>'; 
$deja=1;
}}


}
echo '</table><br><br></div></div>';

?>


<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
<script>
var acc = document.getElementsByClassName("accordion2");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active2");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
<script>
var acc = document.getElementsByClassName("accordion3");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active3");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>

<script>
function goBack() {
  window.history.back();
}
</script>
</div>
<div class="topcorner">
<form action="results.php">
<input type="text" name="text" placeholder="Quick Search..." size="75">
<input type="hidden" id="typ" name="typ" value="1"> 
<input type="hidden" id="typ2" name="typ2" value="1" > 
<input type="hidden" id="sorte" name="sorte" value="1" > 
</form>
</div>
