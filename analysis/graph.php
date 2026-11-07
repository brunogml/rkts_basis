<?php // content="text/plain; charset=utf-8"

$rkts=$_GET['rkts'];

$coll=array("D Derge Kanjur", "S Stog Kanjur");
$coln=2;
$bampos=array();
$leus=array();
$i=0;

foreach($coll as $col){
	
	$sigla=explode(' ',$col)[0];
	$xml=simplexml_load_file('../data/Collections/'.$col.'/'.$sigla.'.xml');
	foreach ($xml->item as $item){
		if ($item->rkts==$rkts){
			$longtot=$item->loc->p;
			$debt=substr(explode('-',$longtot)[0],0,-1); if (substr($debt,-1)=="a") {$x=0;} else {$x=1;} $debt=substr($debt,0,-1); $debt=$debt*2+$x;
			$fint=substr(explode('-',$longtot)[1],0,-1); if (substr($fint,-1)=="a") {$x=0;} else {$x=1;} $fint=substr($fint,0,-1); $fint=$fint*2+$x;
			$longt=$fint-$debt;
			$nb=0;
			foreach ($item->bampo as $bampo){ 
				$bam=$bampo->loc->p;
					$deb=substr(explode('-',$bam)[0],0,-1);
					$fin=substr(explode('-',$bam)[1],0,-1);
					if (substr($deb,-1)=="a") {$x=0;} else {$x=1;}
					$debabs=substr($deb,0,-1); $debabs=$debabs*2+$x;
					if (substr($fin,-1)=="a") {$x=0;} else {$x=1;}
					$finabs=substr($fin,0,-1); $finabs=$finabs*2+$x;
					$long=$finabs-$debabs;
					$long=$long/$longt*100;
				$bampos[$i][$nb]=$long;
				$nb++;
				}
	}}
$i++;
}

$nbcol=$i;
$nbbam=$nb;






require_once ('graph/src/jpgraph.php');
require_once ('graph/src/jpgraph_bar.php');

setlocale (LC_ALL, 'et_EE.ISO-8859-1');

$data=array();
for ($x = 0; $x < $nbbam; $x++) {
	$tabtamp=array();
	for ($y=0; $y<$i; $y++)
	{$tabtamp[$y]=$bampos[$y][$x];}
	
$data[$x]=$tabtamp;
}

// Create the graph. These two calls are always required
$graph = new Graph(1000,500);
$graph->clearTheme();
$graph->SetScale("textlin");

// Rotate graph 90 degrees and set margin
$graph->Set90AndMargin(50,20,50,30);



// Create the bar plots
$bplot=array();
for ($x = 0; $x < $nbbam; $x++) {
$bplot[$x] = new BarPlot($data[$x]);
$bplot[$x]->SetFillColor("gray");
}
// Create the grouped bar plot
$gbplot = new AccBarPlot($bplot);

// ...and add it to the graPH
$graph->Add($gbplot);

$graph->title->Set("Bampo repartition");

$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);

// Display the graph
$graph->Stroke();
?>
