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

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db11;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

try
{
$mysqlClient2  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db12;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$coll2=$_GET['coll2'];
$id=$_GET['id'];
 $ida=explode("|",$id);
 $col=$ida[0];

echo '<table><tr><td valign="top">';
echo '<form action="coll1.php">';
echo '<input type="hidden" name="coll2" id="coll2" value="'.$coll2.'">';
echo '<select id="id" name="id" onchange="this.form.submit();">';
echo '<option value="x|x|x|x|x|x">---</option>';
		$sqlQueryl = "SELECT * FROM Collections WHERE C_Class LIKE 1 ORDER BY C_Sigla";
		$resultatl = $mysqlClient->prepare($sqlQueryl);
		$resultatl->execute();
		$resultatsl = $resultatl->fetchAll();
		foreach ($resultatsl as $res)
		{
			if (strcmp($col,$res["C_Sigla"])==0) {echo '<option value="'.$res["C_Sigla"].'|x|x|x|x|x" selected>'.$res["C_Sigla"].'</option>';} else {echo '<option value="'.$res["C_Sigla"].'|x|x|x|x|x">'.$res["C_Sigla"].'</option>';}
		}
echo '</select>';
echo '</form>';

echo '<td width=50><td>';
echo '<form action="index.php" method="post">';
echo '<input type="hidden" name="coll2" id="coll2" value="'.$coll2.'">';
echo '<textarea class="textarea" name="source" id="source" onselect="myFunction()">';
		$sqlQueryl = "SELECT * FROM catalog WHERE coll LIKE '$col' AND rktsTyp LIKE 'K'";
		$resultatl = $mysqlClient2->prepare($sqlQueryl);
		$resultatl->execute();
		$resultatsl = $resultatl->fetchAll();
		foreach ($resultatsl as $res)
		{echo $res["ref"].PHP_EOL;}

echo '</textarea>';
echo '<td> <input type="hidden" id="coll1" name="coll1" value="">';
echo '<input type="submit" value="done">';

echo '</form>';









?>

<script>
function myFunction() {
var userSelection;
if (window.getSelection) {
	userSelection = window.getSelection();
}
else if (document.selection) { // should come last; Opera!
	userSelection = document.selection.createRange();
}
document.getElementById("coll1").value = userSelection;



document.getElementById("ssel2").value = source.selectionStart;
var nn = String(userSelection);
var nnn = nn.length;

document.getElementById("ssel3").value = nnn;

}
</script>

