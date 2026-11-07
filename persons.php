<!DOCTYPE html>
<html>
<head>
 <link rel="icon" type="image/x-icon" href="sub/logo.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc; 
}

.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}
</style>
</head>
<body>
<div class="toppage">
<table><tr><td><a href="index.php" style="text-decoration:none;"><img src="sub/logo.png" width=100></a>


<?php
include ('sub/unicode2.php');

$id=$_GET['id'];

echo $id;
$xml=simplexml_load_file('data/Persons/persons.xml');
foreach($xml->item as $item)
{
	if (strcmp($id,$item->ref)==0){
			echo '<td width=50><td>';
			echo '<h1>'.$item->Standardname.'</h1><td width=150><td>';
			echo '<img src="sub/logo.png" width=40 style="vertical-align: middle;"> & <a href="https://www.bdrc.io/blog/2022/01/21/the-authors-and-translators-identification-initiative/" target="_blank" style="color:black;text decoration:underline;"><img src="sub/ATII.jpg" width=150 style="vertical-align: middle;"></a> </i>';

			echo '</table></div>';
		echo '<button class="accordion">Encoutered Names in the collections</button><div class="panel"><p>';

			foreach($item->name as $name) { 
				echo $name.'<br>';}
				echo '</div>';

$xmlw=simplexml_load_file('data/Collections/D Derge Kanjur/D.xml');


		echo '<br><br><button class="accordion">Translator in </button><div class="panel">';
	$j=0;
foreach($xmlw->item as $itemw){
	foreach($itemw->translator as $trans)
	{
		if (strcmp($id,$trans->rid)==0) { echo $itemw->ref.' - '.$itemw->tib.'<a href="cat.php?id='.$itemw->rkts.'&typ=1" target="_blank"><img src="sub/link.png" width=30></a><br>';$j++;}
	}
}	if ($j==0) { echo 'no entry';}

				echo '</div>';

		echo '<br><br><button class="accordion">Revisor in </button><div class="panel">';
	$j=0;
foreach($xmlw->item as $itemw){
	foreach($itemw->revisor as $trans)
	{
		if (strcmp($id,$trans->rid)==0) { echo $itemw->ref.' - '.$itemw->tib.'<a href="cat.php?id='.$itemw->rkts.'&typ=1" target="_blank"><img src="sub/link.png" width=30></a><br>';$j++;}
	}
}	if ($j==0) { echo 'no entry';}

				echo '</div>';


$avec=array();
foreach($xmlw->item as $itemw){
	$oui=0;
	foreach($itemw->translator as $trans)
	{
		if (strcmp($id,$trans->rid)==0) { $oui=1;}
	}
	if ($oui==1){
	foreach($itemw->translator as $trans)
	{
		if (strcmp($id,$trans->rid)!=0) { array_push($avec,$trans->rid);}
	}
	foreach($itemw->revisor as $trans)
	{
		if (strcmp($id,$trans->rid)!=0) { array_push($avec,$trans->rid);}
	}
	}
	foreach($itemw->revisor as $trans)
	{
		if (strcmp($id,$trans->rid)==0) { $oui=1;}
	}
	if ($oui==1){
	foreach($itemw->translator as $trans)
	{
		if (strcmp($id,$trans->rid)!=0) { array_push($avec,$trans->rid);}
	}
	foreach($itemw->revisor as $trans)
	{
		if (strcmp($id,$trans->rid)!=0) { array_push($avec,$trans->rid);}
	}
	}
}


$avec1=array_unique($avec);

		echo '<br><br><button class="accordion">Has worked with </button><div class="panel">';
			foreach($avec1 as $av1)
			{if ($av1!="#" AND $av1!="bdr:P8201"){ 
				foreach($xml->item as $item1) {if (strcmp($item1->ref,$av1)==0) { echo '- <a href="persons.php?id='.$av1.'" style="text-decoration:none;color:black;font-size: 20px;font-weight: bold;">'.$item1->Standardname.'</a> ('.$av1.') <a href="persons.php?id='.$av1.'" style="text-decoration:none;color:black;"><img src="sub/link.png" width=30></a><br>';}}
				foreach($xmlw->item as $itemw1){
					$ouii=0;
					foreach($itemw1->translator as $trans1){
						if (strcmp($trans1->rid,$id)==0 OR strcmp($trans1->rid,$av1)==0) { $ouii++;}
					}
					foreach($itemw1->revisor as $trans1){
						if (strcmp($trans1->rid,$id)==0 OR strcmp($trans1->rid,$av1)==0) { $ouii++;}
					}
					if ($ouii>1) { echo '<a href="cat.php?id='.$itemw1->rkts.'&typ=1" target="_blank" style="text-decoration:none;color:black;">'.$itemw1->ref.' - '.$itemw1->tib.'</a><br>';}
				}
				echo '<br>';
			}}
		echo '</div>';


		echo '<br><br><button class="accordion">Links </button><div class="panel">';
		echo '<a href="https://library.bdrc.io/show/'.$id.'" target="_blank" style="color:black;text-decoration:none;"><img src="sub/bdrc.png" width=50> BDRC ('.$id.')</a>';
		echo '</div>';



}}

?>


<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>

</body>
</html>