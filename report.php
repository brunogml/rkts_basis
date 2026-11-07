

<form action="sub/reportederrorlist.php">
<table>
  <tr><td>
  Your name: <td><input type="text" id="name" name="name">
  <tr><td>
  Error: <td><input type="text" id="error" name="error"  size="250">
  <tr><td>
  <input type="submit" value="Submit">
  </table>
</form> 



<?php
/*fichier csv errorno;text;author;datereport;archived;datearchived*/

echo '<h3>Reported errors</h3>';
	$fic = fopen('data/extra/errorreported.csv', "a+");
	$i=1;
	while($tab=fgetcsv($fic,1024,';')){
		if ($tab[4]==1) { echo '<span style="color:green;">✓</span> ';} else {echo '<span style="color:red;">✗</span> ';}
		echo $tab[0].' - '.$tab[1].' ('.$tab[3].')<br>';
		$i++;
	}

echo ' <br><span style="color:red;">✗</span> Correction in progress <br><vr>';
echo '<span style="color:green;">✓</span> Correction done';

