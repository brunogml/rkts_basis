<!DOCTYPE html>
<html>
<head>
<style>
.accordion {
  background-color: white;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: white; 
}

.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 15px;
}
</style>
</head>
<body>



<?php
$coll1=$_POST['coll1'];
$coll2=$_POST['coll2'];



$arr1=explode(PHP_EOL,$coll1);
$arr2=explode(PHP_EOL,$coll2);

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db12;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur :'.$e->getMessage());
}
$tabl1=array();
$tabl2=array();
$ordre=array();

if (is_numeric($coll1[0])) { 
$i=0;
foreach($arr1 as $a1)
{
	$i++;
	$a1=substr($a1,0,-1);
	if ($a1=="") {$rrr=0;} else {$rrr=$a1;}
	if ($i==1) {$collection1='XXX';}
	array_push($tabl1,$rrr);
	array_push($ordre,$rrr);
}
echo '<br>';
	}

else {
$i=0;
foreach($arr1 as $a1)
{
	$i++;
	$a1=substr($a1,0,-1);
	$sqlQuery = "SELECT * FROM catalog WHERE ref LIKE '$a1' AND rktsTyp LIKE 'K' LIMIT 1";
	$resultat = $mysqlClient->prepare($sqlQuery);
	$resultat->execute();
	$resultats = $resultat->fetchAll();
	if ($resultats[0]['rkts']=="") {$rrr=0;} else {$rrr=$resultats[0]['rkts'];}
	if ($i==1) {$collection1=$resultats[0]['coll'];}
	array_push($tabl1,$rrr);
	array_push($ordre,$rrr);
}
echo '<br>';
}
array_pop($ordre);
array_pop($ordre);


if (is_numeric($coll2[0])) { 
$i=0;
foreach($arr2 as $a1)
{
	$i++;
	$a1=substr($a1,0,-1);
	if ($a1=="") {$rrr=0;} else {$rrr=$a1;}
	if ($i==1) {$collection2='YYY';}
	array_push($tabl2,$rrr);
	if (in_array($rrr, $ordre)) {} else {array_push($ordre,$rrr);}
}
echo '<br>';
	
	}

else {

$i=0;
foreach($arr2 as $a1)
{
	$i++;
	$a1=substr($a1,0,-1);
	$sqlQuery = "SELECT * FROM catalog WHERE ref LIKE '$a1' AND rktsTyp LIKE 'K' LIMIT 1";
	$resultat = $mysqlClient->prepare($sqlQuery);
	$resultat->execute();
	$resultats = $resultat->fetchAll();
	$rrr=0;
	$rrr=$resultats[0]['rkts'];
	if ($i==1) {$collection2=$resultats[0]['coll'];}
	array_push($tabl2,$rrr);
	if (in_array($rrr, $ordre)) {} else {array_push($ordre,$rrr);}
}
}
array_pop($ordre);


array_pop($tabl1);
array_pop($tabl2);

$tabl1a=array();
	$i=0;
foreach($tabl1 as $tab){
		$i++;
	array_push($tabl1a,$i);
}


$tabl2a=array();
foreach($tabl2 as $tab){
	$i=1;
	foreach($ordre as $ord) {
		if ($tab==$ord) {$j=$i; break;}
		$i++;
	}
array_push($tabl2a,$j);
}
array_pop($tabl1a);
array_pop($tabl2a);


?>


<div id="chartContainer" style="height: 700px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<div style="margin-top:16px;color:dimgrey;font-size:9px;font-family: Verdana, Arial, Helvetica, sans-serif;text-decoration:none;"></div>



<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
    zoomEnabled: true,
    zoomType: "xy",
	title:{
		text: "Text repartition",
		fontSize: 20
	},
	axisY: {
		title: "",
		suffix: ""
	},
	legend:{
		cursor: "pointer",
		fontSize: 30,
		itemclick: toggleDataSeries
	},
	toolTip:{
		shared: true
	},
	data: [{
		name: "<?php echo $collection1;?>",
		type: "line",
		showInLegend: true,
		dataPoints: [
<?php
$i=count($tabl1a);
for ($x = 0; $x < $i; $x++) {
	$tt1=$tabl1a[$x];
	$x1=$x+1;
echo '{ x: '.$x1.', y: '.$tt1.' },';}
echo '{ x: '.$i.', y: '.$tabl1a[$i-1].' }';
?>			
		]
	},
	{
		name: "<?php echo $collection2;?>",
		type: "line",
		showInLegend: true,
		dataPoints: [
<?php
$i=count($tabl2a);
for ($x = 0; $x < $i; $x++) {
	$tt2=$tabl2a[$x];
	$x1=$x+1;
echo '{ x: '.$x1.', y: '.$tt2.' },';}
echo '{ x: '.$i.', y: '.$tabl2a[$i-1].' }';
?>			
		]
	}]
});
chart.render();

function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart.render();
}

}
</script>

<?php
array_pop($arr1);
array_pop($arr2);

$n1=count($arr1);
$n1=count($arr2);
$nn=max($n1,$n2);
$deb=$tabl1[0]-1;
echo '<button class="accordion">Display/hide table</button>
<div class="panel">
<table><tr><td>#<td>Ref1<td>rkts<td>Ref2<td>rkts';
for ($x = 0; $x <= $nn; $x++) {
	echo '<tr>';
	echo '<td>'.$x+1;
	
	echo '<td>'.$arr1[$x];
	echo '<td>'.$tabl1[$x];
	
	echo '<td>'.$arr2[$x];
	echo '<td>'.$tabl2[$x];
}

echo '</div>';
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
