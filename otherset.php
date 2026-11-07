<div class="toppage">
<table><tr><td><a href="index.php" style="text-decoration:none;"><img src="sub/logo.png" width=100></a>
<td><button type="button" 
        onclick="window.open('', '_self', ''); window.close();">Close Window</button>
		
		
		</table><br><br>


<?php
$img=$_GET['imgs2'];
$set2=$_GET['set2'];
$vol=$_GET['vol'];

echo '<h1>'.$set2.'</h1>';

include("json/".$set2.".php");

?>