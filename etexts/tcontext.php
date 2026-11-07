<p style="font-size:20px;">
<?php

$txt=$_GET['txt'];
$repos=$_GET['repos'];
$vol=$_GET['vol'];
$pag=$_GET['pag'];

$fh=file('repository/'.$repos.'/'.$vol.'.txt');

$i=0;

foreach($fh as $ligne){
	if (strcmp(substr($ligne,0,strlen($pag)),$pag)==0){$j=$i;}
	$i++;
}

echo explode(": ",$fh[$j-5])[0].'-'.explode(": ",$fh[$j+5])[0];
echo '<br><br>';
$ttt="";
$ttt.=explode(": ",$fh[$j-5])[1].' ';
$ttt.=explode(": ",$fh[$j-4])[1].' ';
$ttt.=explode(": ",$fh[$j-3])[1].' ';
$ttt.=explode(": ",$fh[$j-2])[1].' ';
$ttt.=explode(": ",$fh[$j-1])[1].' ';
$ttt.=explode(": ",$fh[$j])[1].' ';
$ttt.=explode(": ",$fh[$j+1])[1].' ';
$ttt.=explode(": ",$fh[$j+2])[1].' ';
$ttt.=explode(": ",$fh[$j+3])[1].' ';
$ttt.=explode(": ",$fh[$j+4])[1].' ';
$ttt.=explode(": ",$fh[$j+5])[1].' ';

$ttt=str_replace("  "," ",$ttt);
$ttt=str_replace($txt,'<span style="color:red;order: 2px solid red; border-radius: 5px;">'.$txt.'</span>',$ttt);

echo $ttt;

?>
<br><br><a href="javascript:window.close();">CLOSE WINDOW</a>'