<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});
</script>
<style> 
#panel, #flip {
  padding: 5px;
  text-align: center;
  background-color: #ffffff;
  border: solid 1px #c3c3c3;
}

#panel {
  padding: 5px;
  display: none;
}
</style>
</head>
<body>
 



<?php

$col=$_GET['col'];
$set=$_GET['set'];
$vol=$_GET['vol'];
$sec=$_GET['sec'];
$pag=$_GET['pag'];

echo '<form action="ess.php">
  <input type="text" id="col" name="col" value="'.$col.'">
  <input type="text" id="set" name="set" value="'.$set.'">
  <input type="text" id="vol" name="vol" value="'.$vol.'">
<select id="sec" name="sec">';
if (strcmp($sec ,"'dul ba")==0) {echo '<option value="\'dul ba" selected>\'dul ba</option>';} else {echo '<option value="\'dul ba">\'dul ba</option>';}
if (strcmp($sec ,"mdo sde")==0) {echo '<option value="mdo sde" selected>mdo sde</option>';} else {echo '<option value="mdo sde">mdo sde</option>';}
echo '</select>
  <input type="text" id="pag" name="pag" value="'.$pag.'"><br><br>
  <input type="submit" value="Submit">
</form>'; 

/*inclure les librairires*/
include('functions/nextpage.php');
include('functions/align.php');
include('functions/rktsno.php');

/*pages suivantes*/
list($ps,$is,$pp,$ip) = nextpage($col,$set,$vol,$sec,$pag);

echo '<a href="ess.php?col='.$col.'&set='.$set.'&vol='.$vol.'&sec='.$sec.'&pag='.$pp.'">←</a> - ';
echo '<a href="ess.php?col='.$col.'&set='.$set.'&vol='.$vol.'&sec='.$sec.'&pag='.$ps.'">→</a><hr>';


echo '<table><tr>';
echo '<td>Previous<td><td>Next<tr>';
echo '<td>'.$pp.'<br>'.$ip;	
echo '<td width=100>';
echo '<td>'.$ps.'<br>'.$is;	
echo '</table>';

echo '<hr>';
/*pags alignées*/
$ax= alignment($col,$set,$vol,$sec,$pag);


echo '<b>Aligned images</b><br>';
echo '<table><tr><td><b>Collection<td width=50><td><b>Volume<td width=50><td><b>Section<td width=50><td><b>Page<td width=50><td><b>Image';
foreach($ax as $axx){
	echo '<tr><td>'.$axx[0].'<td><td>'.$axx[1].'<td><td>'.$axx[2].'<td><td>'.$axx[3].'<td><td>'.$axx[4];
}
	
echo '</table>';

echo '<hr>';
/*numero rkts*/
$sax= rktsno($col,$set,$vol,$sec,$pag);

echo 'rKTs '.$sax;

echo '<hr>';
echo '<div id="flip">Resumee  ⇵</div>';
echo '<div id="panel">';
echo '<table><tr>';
echo '<td>Previous<td><td>Next<tr>';
echo '<td>'.$pp.'<br>'.$ip;	
echo '<td width=100>';
echo '<td>'.$ps.'<br>'.$is;	
echo '</table>';
echo '<hr>';
echo '<b>Aligned images</b><br>';
echo '<table><tr><td><b>Collection<td width=50><td><b>Volume<td width=50><td><b>Section<td width=50><td><b>Page<td width=50><td><b>Image';
foreach($ax as $axx){
	echo '<tr><td>'.$axx[0].'<td><td>'.$axx[1].'<td><td>'.$axx[2].'<td><td>'.$axx[3].'<td><td>'.$axx[4];
}
echo '</table>';
echo '<hr>';
echo 'rKTs '.$sax;

echo '</div>';


?>

