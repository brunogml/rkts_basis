<!DOCTYPE html> 
<html> 
  
<head> 
    <title>rKTs</title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <link rel="icon" type="image/x-icon" href="sub/logo.ico">

    <link rel="stylesheet" href="sub/style.css"> 
<style type="text/css">
 .topcorner{
   position:absolute;
   top:10px;
   right:10px;
  }
</style>

</head>

<body>
<div class="toppage">
<table><tr><td><a href="index.php" style="text-decoration:none;"><img src="sub/logo.png" width=100></a>
<td width=50><td>Collections
<?php
$id=$_GET['id'];
if ($id==1) { echo ' (Kanjur)';}
if ($id==2) { echo ' (Tanjur)';}
if ($id==3) { echo ' (rNying rgyud)';}
?>
</table>
</div>

<div class="leftpage">
<img src="sub/filter.png" width=25><br><br>
<a class="lien1" href="collections.php?id=1">Kanjur</a>
<br><br>
<a class="lien1" href="collections.php?id=2">Tanjur</a>
<br><br>
<a class="lien1" href="collections.php?id=3">rNying rgyud</a>
<br><br>
<a class="lien1" href="collections.php?id=0">All</a>
</div>

<div class="bodypage2">
<?php
$xml=simplexml_load_file('data/Collections/collections.xml');
	echo 'Click the headers to sort the table<br>';
	echo '<table class="tableau1"  id="myTable"><tr>
	<th onclick="sortTable(0)" style="font-size:20px;">Sigla
	<th onclick="sortTable(1)" style="font-size:20px;">Name
	<th onclick="sortTable(2)" style="font-size:20px;">Category
	<th onclick="sortTable(3)" style="font-size:20px;">Group
	<th onclick="sortTable(4)" style="font-size:20px;">Region
	<th onclick="sortTable(5)" style="font-size:20px;">Place
	<th onclick="sortTable(6)" style="font-size:20px;">rKTs outline
	<th onclick="sortTable(7)" style="font-size:20px;">Images
	<th onclick="sortTable(8)" style="font-size:20px;">BDRC';

if ($id==1) {
	foreach($xml->item as $item) {
		if (strcmp($item->category,"Kanjur")==0){$cate=1;
		echo '<tr>';
		echo '<td style="font-size:20px;"> <b>'.$item->sigla;
		echo '<td style="font-size:20px;"> <b>'.$item->name;
		echo '<td style="font-size:20px;"> '.$item->category;
		echo '<td style="font-size:20px;"> '.$item->group;
		echo '<td style="font-size:20px;"> '.$item->region;
		echo '<td style="font-size:20px;"> '.$item->location;
		if ($item->location!="") { echo ' <a href="https://library.bdrc.io/show/bdr:'.$item->location->ref.'" target="_blank"><img src="sub/link.png" width=15></a>';}
		echo '<td style="font-size:20px;"> ';
				if ($item->outline==1) { echo '<a class="lien1" href="handlist.php?id='.$item->sigla.$cate.'" target="_blank">outline <img src="sub/link.png" width=15></a>';}
		echo '<td style="font-size:20px;"> ';
		foreach($item->set as $set) { 
			
			if ($set->integratedrKTs==1) { 	if (strcmp($item->category,"Kanjur")==0) {$catn=1;}
											if (strcmp($item->category,"Tanjur")==0) {$catn=2;}
											if (strcmp($item->category,"Old Tantra")==0) {$catn=3;}
						echo '<a class="lien1" href="images.php?id='.$catn.'|'.$item->sigla.'|'.$set->ref.'" target="_blank">'.$set->ref;
						echo ' <img src="sub/link.png" width=15></a>';}
			echo '<br>';
		}
		echo '<td style="font-size:20px;"> ';
		foreach($item->set as $set) { 
			echo '<a class="lien1" href="https://library.bdrc.io/show/bdr:'.$set->ref.'" target="_blank">'.$set->ref.'</a>';
			echo '<br>';
		}
	}
	}
}
elseif ($id==2) {
	foreach($xml->item as $item) {
		if (strcmp($item->category,"Tanjur")==0){$cate=2;
		echo '<tr>';
		echo '<td style="font-size:20px;"> <b>'.$item->sigla;
		echo '<td style="font-size:20px;"> <b>'.$item->name;
		echo '<td style="font-size:20px;"> '.$item->category;
		echo '<td style="font-size:20px;"> '.$item->group;
		echo '<td style="font-size:20px;"> '.$item->region;
		echo '<td style="font-size:20px;"> '.$item->location;
		if ($item->location!="") { echo ' <a href="https://library.bdrc.io/show/bdr:'.$item->location->ref.'" target="_blank"><img src="sub/link.png" width=15></a>';}
		echo '<td style="font-size:20px;"> ';
				if ($item->outline==1) { echo '<a class="lien1" href="handlist.php?id='.$item->sigla.$cate.'" target="_blank">outline <img src="sub/link.png" width=15></a>';}
		echo '<td style="font-size:20px;"> ';
		foreach($item->set as $set) { 
			
			if ($set->integratedrKTs==1) { 	if (strcmp($item->category,"Kanjur")==0) {$catn=1;}
											if (strcmp($item->category,"Tanjur")==0) {$catn=2;}
											if (strcmp($item->category,"Old Tantra")==0) {$catn=3;}
						echo '<a class="lien1" href="images.php?id='.$catn.'|'.$item->sigla.'|'.$set->ref.'" target="_blank">'.$set->ref;
						echo ' <img src="sub/link.png" width=15></a>';}
			echo '<br>';
		}
		echo '<td style="font-size:20px;"> ';
		foreach($item->set as $set) { 
			echo '<a class="lien1" href="https://library.bdrc.io/show/bdr:'.$set->ref.'" target="_blank">'.$set->ref.'</a>';
			echo '<br>';
		}
	}
	}
}
elseif ($id==3) {
	foreach($xml->item as $item) {
		if (strcmp($item->category,"Old Tantra")==0){$cate=3;
		echo '<tr>';
		echo '<td style="font-size:20px;"> <b>'.$item->sigla;
		echo '<td style="font-size:20px;"> <b>'.$item->name;
		echo '<td style="font-size:20px;"> '.$item->category;
		echo '<td style="font-size:20px;"> '.$item->group;
		echo '<td style="font-size:20px;"> '.$item->region;
		echo '<td style="font-size:20px;"> '.$item->location;
		if ($item->location!="") { echo ' <a href="https://library.bdrc.io/show/bdr:'.$item->location->ref.'" target="_blank"><img src="sub/link.png" width=15></a>';}
		echo '<td style="font-size:20px;"> ';
				if ($item->outline==1) { echo '<a class="lien1" href="handlist.php?id='.$item->sigla.$cate.'" target="_blank">outline <img src="sub/link.png" width=15></a>';}
		echo '<td style="font-size:20px;"> ';
		foreach($item->set as $set) { 
			
			if ($set->integratedrKTs==1) { 	if (strcmp($item->category,"Kanjur")==0) {$catn=1;}
											if (strcmp($item->category,"Tanjur")==0) {$catn=2;}
											if (strcmp($item->category,"Old Tantra")==0) {$catn=3;}
						echo '<a class="lien1" href="images.php?id='.$catn.'|'.$item->sigla.'|'.$set->ref.'" target="_blank">'.$set->ref;
						echo ' <img src="sub/link.png" width=15></a>';}
			echo '<br>';
		}
		echo '<td style="font-size:20px;"> ';
		foreach($item->set as $set) { 
			echo '<a class="lien1" href="https://library.bdrc.io/show/bdr:'.$set->ref.'" target="_blank">'.$set->ref.'</a>';
			echo '<br>';
		}
	}
	}
}

else {

	foreach($xml->item as $item) {
		echo '<tr>';
		echo '<td style="font-size:20px;"> <b>'.$item->sigla;
		echo '<td style="font-size:20px;"> <b>'.$item->name;
		echo '<td style="font-size:20px;"> '.$item->category;
		echo '<td style="font-size:20px;"> '.$item->group;
		echo '<td style="font-size:20px;"> '.$item->region;
		echo '<td style="font-size:20px;"> '.$item->location;
		if ($item->location!="") { echo ' <a href="https://library.bdrc.io/show/bdr:'.$item->location->ref.'" target="_blank"><img src="sub/link.png" width=15></a>';}
		if (strcmp($item->category,"Kanjur")==0) {$cate=1;}
		if (strcmp($item->category,"Canonical collection")==0) {$cate=1;}
		if (strcmp($item->category,"Tanjur")==0) {$cate=2;}
		if (strcmp($item->category,"Old Tantra")==0) {$cate=3;}
		echo '<td style="font-size:20px;"> ';
				if ($item->outline==1) { echo '<a class="lien1" href="handlist.php?id='.$item->sigla.$cate.'" target="_blank">outline <img src="sub/link.png" width=15></a>';}
		echo '<td style="font-size:20px;"> ';
		foreach($item->set as $set) { 
			
			if ($set->integratedrKTs==1) { 	if (strcmp($item->category,"Kanjur")==0) {$catn=1;}
											if (strcmp($item->category,"Tanjur")==0) {$catn=2;}
											if (strcmp($item->category,"Old Tantra")==0) {$catn=3;}
						echo '<a class="lien1" href="images.php?id='.$catn.'|'.$item->sigla.'|'.$set->ref.'" target="_blank">'.$set->ref;
						echo ' <img src="sub/link.png" width=15></a>';}
			echo '<br>';
		}
		echo '<td style="font-size:20px;"> ';
		foreach($item->set as $set) { 
			echo '<a class="lien1" href="https://library.bdrc.io/show/bdr:'.$set->ref.'" target="_blank">'.$set->ref.'</a>';
			echo '<br>';
		}
	}
}
		echo '</table>';
?>
<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>

</div>




<div class="topcorner">
<form action="results.php">
<input type="text" name="text" placeholder="Quick Search..." size="75">
<input type="hidden" id="typ" name="typ" value="1"> 
<input type="hidden" id="typ2" name="typ2" value="1" > 
<input type="hidden" id="sorte" name="sorte" value="1" > 
</form>
</div>
