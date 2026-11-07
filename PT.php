<?php

$pt=$_GET['pt'];
$tour=$_GET['tour'];


	$json=file_get_contents('data/Collections/PT Pelliot Tibetain BNF/PT/manifest/PT'.$pt.'.json');
	$jsona=json_decode($json,true);
	$canv=$jsona["sequences"][0]["canvases"];
	
echo count($canv).'<br>';
	
	
$canv1=$canv[$tour];
$canvimim=$canv1["images"][0];
$imgres=$canvimim["resource"];
$imgnoBNF=$imgres["@id"];
echo '<img src="'.$imgnoBNF.'">';
	
$canv1=$canv[$tour+1];
$canvimim=$canv1["images"][0];
$imgres=$canvimim["resource"];
$imgnoBNF=$imgres["@id"];
echo '<img src="'.$imgnoBNF.'">';

$canv1=$canv[$tour+2];
$canvimim=$canv1["images"][0];
$imgres=$canvimim["resource"];
$imgnoBNF=$imgres["@id"];
echo '<img src="'.$imgnoBNF.'">';

$canv1=$canv[$tour+3];
$canvimim=$canv1["images"][0];
$imgres=$canvimim["resource"];
$imgnoBNF=$imgres["@id"];
echo '<img src="'.$imgnoBNF.'">';

$canv1=$canv[$tour+4];
$canvimim=$canv1["images"][0];
$imgres=$canvimim["resource"];
$imgnoBNF=$imgres["@id"];
echo '<img src="'.$imgnoBNF.'">';
	
