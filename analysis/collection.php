
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
</head>

<body>
<div class="toppage">
<table><tr><td><a href="../index.php" style="text-decoration:none;"><img src="../sub/logo.png" width=100><td width=25></a>
<td width=50><td>Resources for Kanjur and Tanjur Studies
</table>
</div>
<?php
$xml=simplexml_load_file("../data/Collections/collections.xml");
?>
<form action="graphical.php"><table><tr>
<td width=50><td>Reference Collection: <td>
<select name="id1" id="id1">
  <option value="xxx">---</option>
<?php
foreach($xml->item as $item)
{
	if (strcmp($item->category,"Kanjur")==0 and $item->comptool==1){
		echo '<option value="'.$item->sigla.'">'.$item->sigla.' '.$item->name.'</option>';
	}
}
?>
  </select>
  
<tr><td><td>  Collections to be compared with: 
<td><select name="id2" id="id2">
  <option value="xxx">---</option>
<?php
foreach($xml->item as $item)
{
	if (strcmp($item->category,"Kanjur")==0 and $item->comptool==1){
		echo '<option value="'.$item->sigla.'">'.$item->sigla.' '.$item->name.'</option>';
	}
}
?>
  </select>
<select name="id3" id="id3">
  <option value="xxx">---</option>
<?php
foreach($xml->item as $item)
{
	if (strcmp($item->category,"Kanjur")==0 and $item->comptool==1){
		echo '<option value="'.$item->sigla.'">'.$item->sigla.' '.$item->name.'</option>';
	}
}
?>
  </select>
<select name="id4" id="id4">
  <option value="xxx">---</option>
<?php
foreach($xml->item as $item)
{
	if (strcmp($item->category,"Kanjur")==0 and $item->comptool==1){
		echo '<option value="'.$item->sigla.'">'.$item->sigla.' '.$item->name.'</option>';
	}
}
?>
  </select>

<tr><td><td><input type="submit" value="Submit">
</form>