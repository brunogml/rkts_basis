
<!DOCTYPE html> 
<html> 
  
<head> 
    <title>rKTs</title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" href="../sub/style.css"> 
<style type="text/css">
 .topcorner{
   position:absolute;
   top:10px;
   right:10px;
  }
 .bottomcorner{
   position:fixed;
   bottom:10px;
   left:30px;
  }
</style>
<style>
.accordion {
  background-color: #eee;
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
  background-color: #ccc; 
}

.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}

</style>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #08088a;
  color: white;
}
</style>
</head>

<body>
<div class="toppage">
<table><tr><td><a href="../index.php" style="text-decoration:none;"><img src="../sub/logo.png" width=100><td width=25></a>
<td width=50><td>Resources for Kanjur and Tanjur Studies - Structural analysis
</table>
</div>

<?php
$id1=$_GET["id1"];
$id2=$_GET["id2"];
$id3=$_GET["id3"];
$id4=$_GET["id4"];
$collliste=simplexml_load_file("../data/Collections/collections.xml");


/*Chemins*/
foreach($collliste->item as $item){
	if (strcmp($item->sigla,$id1)==0 and strcmp($item->category,"Kanjur")==0){$chem1='../data/Collections/'.$item->sigla.' '.$item->name.'/'.$item->sigla.'.xml';}
	if (strcmp($item->sigla,$id2)==0 and strcmp($item->category,"Kanjur")==0){$chem2='../data/Collections/'.$item->sigla.' '.$item->name.'/'.$item->sigla.'.xml';}
	if (strcmp($item->sigla,$id3)==0 and strcmp($item->category,"Kanjur")==0){$chem3='../data/Collections/'.$item->sigla.' '.$item->name.'/'.$item->sigla.'.xml';}
	if (strcmp($item->sigla,$id4)==0 and strcmp($item->category,"Kanjur")==0){$chem4='../data/Collections/'.$item->sigla.' '.$item->name.'/'.$item->sigla.'.xml';}
	
	}
$tableau=array();

/*tab1*/
$xml1=simplexml_load_file($chem1);
$i=1;
foreach($xml1->item as $item){
	$tableau[$i][0]=$i;
	$tableau[$i][1]=$item->rkts;
	$tableau[$i][2]=$item->ref;
	$i=$i+1;
}


/*tab2*/
$xml2=simplexml_load_file($chem2);
$xml3=simplexml_load_file($chem3);
$xml4=simplexml_load_file($chem4);
$i=1;
foreach($tableau as $tab){
	$k=1;
	foreach($xml2->item as $item){
		if (strcmp($tab[1],$item->rkts)==0){
		$tableau[$i][3]=$k;
		$tableau[$i][4]=$item->ref;
		break;
}
		$k=$k+1;
}
	$k=1;
	foreach($xml3->item as $item){
		if (strcmp($tab[1],$item->rkts)==0){
		$tableau[$i][5]=$k;
		$tableau[$i][6]=$item->ref;
		break;
}
		$k=$k+1;
}
	$k=1;
	foreach($xml4->item as $item){
		if (strcmp($tab[1],$item->rkts)==0){
		$tableau[$i][7]=$k;
		$tableau[$i][8]=$item->ref;
		break;
}
		$k=$k+1;
}


		$i=$i+1;
}
$long=count($tableau);

/*graph*/
echo'
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	theme:"light1",
	animationEnabled: false,
	zoomEnabled: true,

 axisX:{
  	lineThickness: 0,
  	tickLength: 0,
  	labelFormatter: function(e) {
  	    return "";
  	}
  },
  axisY:{
  	lineThickness: 0,
  	gridThickness: 0,
  	tickLength: 0,
  	labelFormatter: function(e) {
  	    return "";
  	}
  },
  toolTip: {
		shared: "true"
	},
	legend:{
		cursor:"pointer",
		itemclick : toggleDataSeries
	},
	data: [
	{
		type: "spline", 
		showInLegend: true,
		name: "'.$id1.'",
		dataPoints: [';
		for ($x = 1; $x < $long; $x++) { echo '{ label: "", y: '.$x.' },';}
		echo '	{ label: "", y: '.$long.' }
		]
	},
	{
		type: "spline", 
		showInLegend: true,
		name: "'.$id2.'",
		dataPoints: [';
		$i=1;
		for ($x = 1; $x < $long; $x++) 
			{ 
				if ($tableau[$x][3]!="") {echo '{ label: "", y: '.$tableau[$x][3].' },';}
				else {echo '{ label: "", y: 0 },';}
			}
		echo '	{ label: "", y: '.$long.' }
		]
	},
	{
		type: "spline", 
		showInLegend: true,
		name: "'.$id3.'",
		dataPoints: [';
		$i=1;
		for ($x = 1; $x < $long; $x++) 
			{ 
				if ($tableau[$x][5]!="") {echo '{ label: "", y: '.$tableau[$x][5].' },';}
				else {echo '{ label: "", y: 0 },';}
			}
		echo '	{ label: "", y: '.$long.' }
		]
	},
	{
		type: "spline", 
		showInLegend: true,
		name: "'.$id4.'",
		dataPoints: [';
		$i=1;
		for ($x = 1; $x < $long; $x++) 
			{ 
				if ($tableau[$x][7]!="") {echo '{ label: "", y: '.$tableau[$x][7].' },';}
				else {echo '{ label: "", y: 0 },';}
			}
		echo '	{ label: "", y: '.$long.' }
		]
	}
	]
});
chart.render();

function toggleDataSeries(e) {
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible ){
		e.dataSeries.visible = false;
	} else {
		e.dataSeries.visible = true;
	}
	chart.render();
}

}
</script>';

echo '<div id="chartContainer" style="height: 700px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>';


echo '<button class="accordion">View Data</button>
<div class="panel"><table id="customers"><th>rKTs<th colspan=2 align="center">'.$id1.'<th colspan=2>'.$id2.'<th colspan=2>'.$id3.'<th colspan=2>'.$id4;
echo '<tr><td style="background-color: #b4b4db;"><td style="background-color: #b4b4db;">RN<td style="background-color: #b4b4db;">Ref<td style="background-color: #b4b4db;">RN<td style="background-color: #b4b4db;">Ref<td style="background-color: #b4b4db;">RN<td style="background-color: #b4b4db;">Ref<td style="background-color: #b4b4db;">RN<td style="background-color: #b4b4db;">Ref';

foreach($tableau as $tabl)
{ echo '<tr><td>'.$tabl[1].'<td>'.$tabl[0].'<td>'.$tabl[2].'<td>'.$tabl[3].'<td>'.$tabl[4].'<td>'.$tabl[5].'<td>'.$tabl[6].'<td>'.$tabl[7].'<td>'.$tabl[8];
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