<!DOCTYPE html> 
<html> 
  
<head> 
    <title>rKTs</title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <link rel="icon" type="image/x-icon" href="sub/logo.ico">

    <link rel="stylesheet" href="sub/style.css"> 
<style>
tr:nth-child(even) {
  background-color: #f2f2f2
}
#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 80%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

</style>

</head>

<body>

<div class="toppage">
<table><tr><td><a href="index.php" style="text-decoration:none;"><img src="sub/logo.png" width=100></a>
<?php echo '<td width=50><td>Explore the Tibetan Canon';?>
</table>
</div>
<div class="leftpage">
<a class="lien1" href="index.php">Home</a>
<br><br>
  <b><u>Kanjur</u></b>
  <br><a class="lien1" href="explore.php?id=Vinaya">Vinaya</a>
  <br><a class="lien1" href="explore.php?id=Prajñāpāramitā">Prajñāpāramitā</a>
  <br><a class="lien1" href="explore.php?id=Buddhāvataṃsaka">Avataṃsaka</a>
  <br><a class="lien1" href="explore.php?id=Ratnakūṭa">Ratnakūṭa</a>
  <br><a class="lien1" href="explore.php?id=Sūtra">Sūtra</a>
  <br><a class="lien1" href="explore.php?id=Tantra">Tantra</a>
  <br><br><b><u>Tanjur</u></b>
  <br><a class="lien1" href="explore.php?id=bstod tshogs">bstod tshogs</a>
  <br><a class="lien1" href="explore.php?id=mdo">mdo 'grel</a>
  <br><a class="lien1" href="explore.php?id=rgyud">rgyud 'grel</a>
  <br><br><b><u>Old Tantra</u></b>
  <br><a class="lien1" href="explore.php?id=rnying">rnying rgyud</a>

<br><br><a class="lien1" onclick="goBack()">Go Back</a>
</div>

<div class="bodypage2">
<?php
$id=$_GET['id'];
if(isset($id)){
echo '<div class="main">
<h1>'.$id.'</h1>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Filter Tibetan Titles ..." title="Type in a name">
<table id="myTable">
  <tr>
    <th>Tibetan</th>
    <th>Sanskrit</th>';
	if (strcmp($id,"bstod tshogs")==0 or strcmp($id,"mdo")==0 or strcmp($id,"rgyud")==0){ echo '<th>Author</th>';}
	
echo '    <th>English</th>  </tr>';
  
  /*Kanjur*/
if (strcmp($id,"Vinaya")==0 or strcmp($id,"Prajñāpāramitā")==0 or strcmp($id,"Buddhāvataṃsaka")==0 or strcmp($id,"Ratnakūṭa")==0 or strcmp($id,"Sūtra")==0 or strcmp($id,"Tantra")==0){
 	$xml = simplexml_load_file('data/Kernel/rkts.xml'); 
	foreach($xml->item as $item){
		foreach($item->section as $section) {
		if (strcmp($section,$id)==0){
			$tib= $item->StandardTibetan;
			$skt=$item->StandardSanskrit;
			$eng=$item->English84000;
			echo '<tr><td>';
			if (strpos($eng,"from")!=0) { echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';}
			 echo '<a href="cat.php?id='.$item->rkts.'&typ=1" style="text-decoration:none;color:black;">'.$tib.' </font><td><i>'.$skt.' </i><td>'.$eng.'</a><br>';
}}}}

 /*Tanjur*/
if (strcmp($id,"bstod tshogs")==0 or strcmp($id,"mdo")==0 or strcmp($id,"rgyud")==0){
 	$xml = simplexml_load_file('data/Kernel/rktst.xml'); 
	foreach($xml->item as $item){
		foreach($item->section as $section) {
		if (strcmp($section,$id)==0){
			$tib= $item->StandardTibetan;
			$skt=$item->StandardSanskrit;
			$aut="";
			foreach ($item->author as $at) {$aut=$aut.$at.' - ';}
			$aut=substr($aut,0,-3);
			$eng=$item->English84000;
			echo '<tr><td>';
			if (strpos($eng,"from")!=0) { echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';}
			 echo '<a href="cat.php?id='.$item->rktst.'&typ=2" style="text-decoration:none;color:black;">'.$tib.' </font><td><i>'.$skt.' </i><td>'.$aut.' </i><td>'.$eng.'</a><br>';
}}}}
 

 /*OLD TANTRA*/
if (strcmp($id,"rnying")==0){
 	$xml = simplexml_load_file('data/Kernel/rktsg.xml'); 
	foreach($xml->item as $item){
		foreach($item->section as $section) {
		if (strcmp($section,$id)==0){
			$tib= $item->StandardTibetan;
			$skt=$item->StandardSanskrit;
			$eng=$item->English84000;
			echo '<tr><td>';
			if (strpos($eng,"from")!=0) { echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';}
			 echo '<a href="cat.php?id='.$item->rktsg.'&typ=3" style="text-decoration:none;color:black;">'.$tib.' </font><td><i>'.$skt.' </i><td>'.$eng.'</a><br>';
}}}}

}

  ?>
</table>

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
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<script>
function goBack() {
  window.history.back();
}
</script>
