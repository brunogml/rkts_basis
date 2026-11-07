<?php
$txt = $_GET['txt'] ?? '';


header("Location: ../rkts1/pages/abb.html?txt={$txt}", true, 301);
exit;
?>




<head>
    <link rel="stylesheet" href="../sub/style.css"> 
<style>
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>

<body>
<div class="toppage">
<table><tr><td><a href="index.php" style="text-decoration:none;"><img src="../sub/logo.png" width=150></a>
<td width=50><td>Tibetan Abbreviations
</table>
</div>
<div class="bodypage2">


<form action="index.php">
<input type="text" id="txt" name="txt">
</form>

<!-- Trigger/Open The Modal -->
<button id="myBtn">How to search</button>

<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>just write the consonants in the order they appear <b>without</b> "+", voyels or irregular <font size=+2>༹.</font> (i.e. <font size=+2>ཙ, ཚ, ཛ</font> are ts, tsh and dz and for example <font size=+2>ཀ༹</font> is k only) </p>
	<p>for instance:</p></p>
	<p><font size=+2>ཀུནས།</font> -> kns</p>
	<p><font size=+2>སྒྲུབྱིས།</font> -> sgrbys</p>
	<p><font size=+2>ཀླེུནད།</font> -> klnd</p>
	<p><font size=+2>དཀྱིུང།</font> -> dkyng</p>
	<p><font size=+2>བཀ༹ལ།</font> -> bkl</p>
	<p><font size=+2>རྣཾསེ།</font> -> rnMs or rnms</p>
  </div>

</div>


<?php
$nb=0;
$xml=simplexml_load_file('abb.xml');
foreach($xml->item as $item){
	$nb=$nb+1;
}
echo '<br><br>'.$nb.' entries in this list<hr>';


$txt=$_GET['txt'];


if (isset($txt)){
	
echo '<h2>Results for '.$txt.'</h2>';
$xml=simplexml_load_file('abb.xml');
foreach($xml->item as $item){
	$rech=$item->abbw;
	$rech=str_replace('+','',$rech);
	$rech=str_replace('^','',$rech);
	$rech=str_replace('a','',$rech);
	$rech=str_replace('e','',$rech);
	$rech=str_replace('i','',$rech);
	$rech=str_replace('o','',$rech);
	$rech=str_replace('u','',$rech);
	$rech=substr($rech,0,strlen($txt));
	$rech=strtolower($rech);
	$txt1=strtolower($txt);
	if (strcmp($rech,$txt1)==0){
		echo '<font size=+4>'.$item->abb.' = '.$item->tib.'</font> (source ';
		if (strpos($item->source,"1")!==FALSE) { echo '<a href="https://www.dzongkha.gov.bt/en/publications/title/a-handbook-of-dzongkha-and-ch-k-abbreviations" target="new">Dzongkha abbreviations</a> - ';}
		if (strpos($item->source,"2")!==FALSE) { echo ' <a href="https://www.babelstone.co.uk/Tibetan/Contractions.html" target="new">Tibetan Shorthand Contractions</a> - ';}
		if (strpos($item->source,"3")!==FALSE) { echo ' <a href="https://www.dropbox.com/s/24jixiw6u81wfck/Bacot%201912.pdf?dl=0" target="new">Bacot écriture cursive Tibétaine</a> - ';}
		if (strpos($item->source,"4")!==FALSE) { echo ' <a href="https://dspace.cuni.cz/bitstream/handle/20.500.11956/86692/140058107.pdf?sequence=1+isAllowed=y" target="new">The Genealogy of Ya-ngal Family of Dolpo</a> - ';}
		if (strpos($item->source,"5")!==FALSE) { echo ' list from Open Pecha</a> - ';}
		echo ')<br>';

}
}

}

?>


<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

