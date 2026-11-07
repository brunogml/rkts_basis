<!DOCTYPE html>
<html>
<head>
<style> 
.textarea {
  width: 250px;
  height: 500px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none;
}
</style>
</head>
<body>

<?php
$coll1=$_POST['coll1'];
$coll2=$_POST['coll2'];
$coll1=str_replace(' ',PHP_EOL,$coll1);
$coll2=str_replace(' ',PHP_EOL,$coll2);



echo '<form id="myform" action="index.php" method="post">';
echo '<table>';
echo '<tr><td>Collection 1<td width=50><td>Collection 2';
echo '<tr><td><textarea class="textarea" name="coll1" id="coll1">';
echo $coll1;
echo '</textarea>';
echo '<td><td><textarea class="textarea" name="coll2" id="coll2">';
echo $coll2;
echo '</textarea>';
echo '<tr><td><td><input type="submit" form="myform" value="validate data">';
echo '</form>';


/*$coll1a=$coll1;
$coll1b=explode(PHP_EOL,$coll1a);
foreach($coll1b as $cb) {echo '-'.substr($cb,0,-1).'-';}
*/
$coll1b=str_replace(PHP_EOL,' ',$coll1);
$coll2b=str_replace(PHP_EOL,' ',$coll2);
echo '<tr><td align="center"><button><a href="coll1.php?coll2='.$coll2b.'">Select texts for Collection 1</a></button>';
echo '<td><td align="center"><button><a href="coll2.php?coll1='.$coll1b.'">Select texts for Collection 2</a></button>';
echo '</table>';

echo '<br><br><br>';
echo '<form action="visu.php" method="post">';
echo '<input type="hidden" name="coll1" id="coll1" value="'.$coll1.'">';
echo '<input type="hidden" name="coll2" id="coll2" value="'.$coll2.'">';
echo '<tr><td><input type="submit" value="Visualise">';
echo '</form>';
