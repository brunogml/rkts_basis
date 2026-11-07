<!DOCTYPE html> 
<html> 
  
<head> 
    <title>rKTs</title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <link rel="icon" type="image/x-icon" href="sub/logo.ico">

    <link rel="stylesheet" href="sub/style.css"> 
<style>
.accordion {
  background-color: #fff;
  color: #444;
  cursor: pointer;
  padding: 10px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}
.accordion2 {
  background-color: #fff;
  color: #444;
  cursor: pointer;
  padding: 10px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 20px;
  transition: 0.4s;
}
.accordion3 {
  background-color: #fff;
  color: #444;
  cursor: pointer;
  padding: 10px;
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
.active2,  {
  background-color: #ddd; 
}
.active3,  {
  background-color: #ddd; 
}

.accordion:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: left;
  margin-left: 5px;
}
.accordion2:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: left;
  margin-left: 5px;
}
.accordion3:after {
  content: 'show ';
  color: #08088a;
  font-weight: bold;
  float: left;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}
.active2:after {
  content: "\2212";
}
.active3:after {
  content: "hide ";
}


.panel {
  font-size: 18px;
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}

.panel2 {
  font-size: 18px;
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
  border: 1px solid #ddd;
}
.panel3 {
  font-size: 18px;
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
  border: 1px solid #ddd;
}

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
</table>
<?php 

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db12;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
try
{
$mysqlClient2  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db11;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
		die('Erreur : '.$e->getMessage());
}


$reff=$_GET['reff'];
$typ=$_GET['typ'];
$aris=$_GET['aris'];

include ('sub/unicode2.php');

/*Structure*/
			$sq = "SELECT * FROM chapters WHERE ref LIKE '$reff' ORDER by id";
			$rsq = $mysqlClient->prepare($sq);
			$rsq->execute();
			$rsqs = $rsq->fetchAll();
			$sq1 = "SELECT * FROM bampo WHERE ref LIKE '$reff' ORDER by id";
			$rsq1 = $mysqlClient->prepare($sq1);
			$rsq1->execute();
			$rsqs1 = $rsq1->fetchAll();
				echo '<span style="font-size:20px;font-weight:bold;text-decoration: underline;">Structure of '.$reff.'</span><br><br>';

			if ($rsqs[0]["id"]!=""){

echo '<button class="accordion2 active"><span style="font-size:35px;">ལེའུ </span>/ Chapters </button><div class="panel2" style="display: block;"><div>';
				foreach($rsqs as $rs)
				{ 
					$chid=$rs["id"];
					$sqch = "SELECT * FROM locationschapters WHERE ref LIKE '$chid' ORDER by id";
					$rsqch = $mysqlClient->prepare($sqch);
					$rsqch->execute();
					$rsqsch = $rsqch->fetchAll();
					$ttt=$rs["text"];
					unicode($ttt);
					echo '<br><span style="font-size:30px;">'.$ttt.'</span><br>';
					echo $rs["text"].'</b>'; 
			foreach($rsqsch as $ls) { 
							$setidim=$ls["setid"];
							$sqlim = "SELECT * FROM Sets WHERE S_Ref LIKE '$setidim'";
							$resim = $mysqlClient2->prepare($sqlim);
							$resim->execute();
							$resims = $resim->fetchAll();
							$imoui=$resims[0]["S_IntegratedrKTs"];
				echo '<br><span style="font-size:15px;padding-left:50px;">'.$ls["setid"].': '; 
				if($typ=="K") {$typn=1;}
				if($typ=="T") {$typn=2;}
				if($typ=="G") {$typn=3;}
				echo $ls["debp"].$ls["debf"].'<sub>'.$ls["debl"].'</sub> ';
				if ($imoui==1) { echo '<a href="images.php?id='.$typn.'|'.$aris.'|'.$ls["setid"].'|I'.$ls["vol"].'|'.$ls["sec"].'|'.$ls["debp"].$ls["debf"].'" target="_blank"><img src="sub/link.png" width=20></a></span>'; }
				}

					echo '<br>';
				}

echo '</div></div>';
			}
						if ($rsqs1[0]["id"]!=""){


echo '<button class="accordion2 active"><span style="font-size:35px;">བམ་པོ </span>/ Bam po</button><div class="panel2" style="display: block;"><div>';
				foreach($rsqs1 as $rs)
				{ 
					$chid=$rs["id"];
					$sqch = "SELECT * FROM locationsbampo WHERE ref LIKE '$chid' ORDER by id";
					$rsqch = $mysqlClient->prepare($sqch);
					$rsqch->execute();
					$rsqsch = $rsqch->fetchAll();
					echo '<b>bam po '.$rs["text"].'</b>'; 
			foreach($rsqsch as $ls) { 
							$setidim=$ls["setid"];
							$sqlim = "SELECT * FROM Sets WHERE S_Ref LIKE '$setidim'";
							$resim = $mysqlClient2->prepare($sqlim);
							$resim->execute();
							$resims = $resim->fetchAll();
							$imoui=$resims[0]["S_IntegratedrKTs"];
				echo '<br><span style="font-size:15px;padding-left:50px;">'.$ls["setid"].': '; 
				if($typ=="K") {$typn=1;}
				if($typ=="T") {$typn=2;}
				if($typ=="G") {$typn=3;}
				echo $ls["debp"].$ls["debf"].'<sub>'.$ls["debl"].'</sub> ';
				if ($imoui==1) { echo '<a href="images.php?id='.$typn.'|'.$aris.'|'.$ls["setid"].'|I'.$ls["vol"].'|'.$ls["sec"].'|'.$ls["debp"].$ls["debf"].'" target="_blank"><img src="sub/link.png" width=20></a></span>'; }
				}

					echo '<br>';

				}
				echo '</table>';

echo '</div></div>';
			}

?>

<script>
var acc = document.getElementsByClassName("accordion2");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active2");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
