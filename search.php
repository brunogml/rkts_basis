
<meta http-equiv="refresh" content="0; url=https://rkts.org/rkts1/pages/search.html">






















<!DOCTYPE html> 
<html> 
  
<head> 
    <title>rKTs</title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <link rel="icon" type="image/x-icon" href="sub/logo.ico">

    <link rel="stylesheet" href="sub/style.css"> 
<style>
input[type=text] {
  width: 80%;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 20px;
  background-color: white;
  background-image: url('searchicon.png');
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
  width: 80%;
}

#myDIV {
  width: 100%;
 

</style>

</head>

<body>
<div class="toppage">
<table><tr><td><a href="index.php" style="text-decoration:none;"><img src="sub/logo.png" width=100></a>
<td width=50><td>Search in the collections
</table>
</div>

<div class="bodypage2"  style="font-size:20px;">

<form action="results.php">
<input type="text" name="text" placeholder="Search..">
<br><br>
<input type="radio" id="typ" name="typ" value="1"  onclick="myFunction3()" checked> Title
<input type="radio" id="typ" name="typ" value="4" onclick="myFunction4()"> Chapters 
<input type="radio" id="typ" name="typ" value="2" onclick="myFunction2()"> Quotation
<input type="radio" id="typ" name="typ" value="3" onclick="myFunction2()"> ID N° 
<span class="popup" onclick="myFunction1()"><sup>🛈</sup>
  <span class="popuptext" id="myPopup1">= rKTs N° or Sigla + Id N° (Ex. 147, D125 or F247)</span>
</span>
<br><br>
<div id="myDIV" style="display:none;">
<input type="radio" id="typ2" name="typ2" value="1" checked> Kanjur
<input type="radio" id="typ2" name="typ2" value="2" > Tanjur
<input type="radio" id="typ2" name="typ2" value="3" > Old Tantra
<br><br>
</div>
<div id="myDIV2" style="display:none;">
<input type="radio" id="typ3" name="typ3" value="D" checked>D
<input type="radio" id="typ3" name="typ3" value="F" >F
<input type="radio" id="typ3" name="typ3" value="H" >H
<input type="radio" id="typ3" name="typ3" value="S" >S
<input type="radio" id="typ3" name="typ3" value="Z" >Z
<input type="radio" id="typ3" name="typ3" value="Gpb" > Gpb
<br><br>
</div>
<input class="button" type="submit" value="Submit">

</form>



</div>
<div style="position:absolute;top:10px;right: 10px;">
<a href="Video/index.php" target="_blank"><img src="sub/button12.png" width=100></a>
<br><a href="rkts1/pages/search.html" target="_blank"><img src="sub/visitnew.jpg" width=100></a>
</div>


<script>
function myFunction2() {
  var x = document.getElementById("myDIV");
   x.style.display = "block";
  var x = document.getElementById("myDIV2");
   x.style.display = "none";
}
</script>
<script>
function myFunction3() {
  var x = document.getElementById("myDIV");
   x.style.display = "none";
  var x = document.getElementById("myDIV2");
   x.style.display = "none";
}
</script>
<script>
function myFunction4() {
  var x = document.getElementById("myDIV2");
   x.style.display = "block";
  var x = document.getElementById("myDIV");
   x.style.display = "none";
}
</script>

<script>
// When the user clicks on div, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>


<script>
// When the user clicks on div, open the popup
function myFunction1() {
  var popup = document.getElementById("myPopup1");
  popup.classList.toggle("show");
}
</script>

