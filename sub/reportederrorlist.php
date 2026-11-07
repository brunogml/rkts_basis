<?php

$error=$_GET['error'];
$name=$_GET['name'];


	$fic = fopen('../data/extra/errorreported.csv', "a+");
	$i=1;
	while($tab=fgetcsv($fic,1024,';')){
		$i++;
	}
$date=date("Y.m.d");
$nouvelle=$i.';'.$error.';'.$name.';'.$date.';0;0';




$txt=file_get_contents('../data/extra/errorreported.csv');
$txt=$nouvelle."\n".$txt;
file_put_contents('../data/extra/errorreported.csv',$txt);



header("Location: ../report.php");

