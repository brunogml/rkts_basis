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

$longueur=max(count($arr1),count($arr2));
$tableau=array();


for ($x = 1; $x <= $longueur; $x++) {$tableau[$x][0]=$x;}
for ($x = 1; $x <= count($arr1); $x++) {$tableau[$x][1]=$x;$tableau[$x][2]=$arr1[$x-1];}
if($longueur>count($arr1)){for ($x = count($arr1)+1; $x <= $longueur; $x++) {$tableau[$x][1]=0;$tableau[$x][2]=0;}}

for ($x = 1; $x <= count($arr1); $x++) {
	$k=0;$k1=0;
	foreach ($arr2 as $arr2l){
		if ($arr1[$x-1]==$arr2l) {$k1=$k;}
		$k++;
	}
	$tableau[$x][3]=$k1;
	if ($k1>0) {$tableau[$x][4]=$arr1[$x-1];} else {$tableau[$x][4]=0;}
	}

if($longueur>count($arr1)){
	
for ($x = count($arr1)+1; $x <=$longueur ; $x++) {
	$k=0;$k1=0;
	foreach ($arr2 as $arr2l){
		if ($arr1[$x-1]==$arr2l) {$k1=$k;}
		$k++;
	}
	$tableau[$x][3]=$k1;
	if ($k1>0) {$tableau[$x][4]=$arr1[$x-1];} else {$tableau[$x][4]=0;}
	}
	
}



$i=count($tableau);


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
$kx=1;
foreach($tableau as $tab){echo '{ x: '.$kx.', y: '.$tab[1].' },';$kx++;}
echo '{ x: '.$i.', y: 0 }';

?>			
		]
	},
	{
		name: "<?php echo $collection2;?>",
		type: "line",
		showInLegend: true,
		dataPoints: [
<?php
$kx=1;
foreach($tableau as $tab){echo '{ x: '.$kx.', y: '.$tab[3].' },';$kx++;}
echo '{ x: '.$i.', y: 0 }';
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



echo '<table><tr><td>rn<td>loc1<td>Ref1<td>loc2<td>Ref2';
foreach($tableau as $tab){
	echo '<tr><td>'.$tab[0];
	echo '<td>'.$tab[1];
	echo '<td>'.$tab[2];
	if ($tab[3]>0) {echo '<td>'.$tab[3];} else {echo '<td>-';}
	if ($tab[4]>0) {echo '<td>'.$tab[4];} else {echo '<td>-';}
	
}