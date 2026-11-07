
<?php
$text=$_GET['text'];
$typ2=$_GET['typ2'];
$text=str_replace(" ","",$text);


if ($typ2==1)
{
	if (ctype_digit($text[0])===TRUE)
	{ 
					header("Location: cat.php?id=".$text."&typ=1");
	}
else
{
if (substr($text,1,1)==1 or substr($text,1,1)==2 or substr($text,1,1)==3 or substr($text,1,1)==4 or substr($text,1,1)==5 or substr($text,1,1)==6 or substr($text,1,1)==7 or substr($text,1,1)==8 or substr($text,1,1)==9 or substr($text,1,1)==0){
$sigla=substr($text,0,1);}
else {$sigla=substr($text,0,2);}
if ($sigla=="Kq" or $sigla=="P" or $sigla=="K") { $sigla="Q";$text=str_replace("K","Q",$text); $text=str_replace("Kq","Q",$text); $text=str_replace("P","Q",$text); }
$i=0;


try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db12;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

	$sqlQueryl = "SELECT * FROM catalog WHERE ref LIKE '%$text%' AND rktsTyp LIKE 'K'";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
header("Location: cat.php?id=".$resultats[0]['rkts']."&typ=1");
}

/*		$xml=simplexml_load_file("data/Collections/collections.xml");
		foreach($xml->item as $item)
		{
			if (strcmp($sigla,$item->sigla)==0){
				$xml2=simplexml_load_file('data/Collections/'.$sigla.' '.$item->name.'/'.$sigla.'.xml');
				foreach($xml2->item as $item2) {
					if (strcmp($text,$item2->ref)==0) { echo '<a class="lien1" href="cat.php?id='.$item2->rkts.'&typ=1" target="_blank">'.$item2->tib.'</a><br>';$i=$i+1;
					header("Location: cat.php?id=".$item2->rkts."&typ=1");}
				}
				if($i>0) {break;}
		}}
*/


		
}

/*Dans Tanjurs*/


if ($typ2==2)
{
	if (ctype_digit($text[0])===TRUE)
	{ 
					header("Location: cat.php?id=".$text."&typ=2");
	}
else
{
$sigla=substr($text,0,1);

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db12;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

	$sqlQueryl = "SELECT * FROM catalog WHERE ref LIKE '%$text%' AND rktsTyp LIKE 'T'";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
header("Location: cat.php?id=".$resultats[0]['rkts']."&typ=2");
}


/*
		$xml=simplexml_load_file("data/Collections/collections.xml");
		foreach($xml->item as $item)
		{
			if (strcmp($sigla,$item->sigla)==0 and strcmp($item->category,"Tanjur")==0){
				$xml2=simplexml_load_file('data/Collections/'.$sigla.' '.$item->name.'/'.$sigla.'.xml');
				foreach($xml2->item as $item2) {
					if (strcmp($text,$item2->ref)==0) { echo '<a class="lien1" href="cat.php?id='.$item2->rkts.'&typ=1" target="_blank">'.$item2->tib.'</a><br>';$i=$i+1;
					header("Location: cat.php?id=".$item2->rktst."&typ=2");}
				}
				if($i>0) {break;}
		}}
*/


}


/*Dans OldTantra*/


if ($typ2==3)
{
	if (ctype_digit($text[0])===TRUE)
	{ 
					header("Location: cat.php?id=".$text."&typ=3");
	}
else
{
$sigla=substr($text,0,3);

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db12;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

	$sqlQueryl = "SELECT * FROM catalog WHERE ref LIKE '%$text%' AND rktsTyp LIKE 'G'";
	$resultatl = $mysqlClient->prepare($sqlQueryl);
	$resultatl->execute();
	$resultats = $resultatl->fetchAll();
header("Location: cat.php?id=".$resultats[0]['rkts']."&typ=3");
}
/*
		$xml=simplexml_load_file("data/Collections/collections.xml");
		foreach($xml->item as $item)
		{
			if (strcmp($sigla,$item->sigla)==0 and strcmp($item->category,"Old Tantra")==0){
				$xml2=simplexml_load_file('data/Collections/'.$sigla.' '.$item->name.'/'.$sigla.'.xml');
				foreach($xml2->item as $item2) {
					if (strcmp($text,$item2->ref)==0) { echo '<a class="lien1" href="cat.php?id='.$item2->rkts.'&typ=1" target="_blank">'.$item2->tib.'</a><br>';$i=$i+1;
					header("Location: cat.php?id=".$item2->rktsg."&typ=3");}
				}
				if($i>0) {break;}
		}}
*/


}

/*

		$strJsonFileContents = file_get_contents("data/Collections/collectionsT.json");
		$array = json_decode($strJsonFileContents, true);
		foreach($array as $arr){
			if (strcmp($sigla,$arr["sigla"])==0){
				$xml=simplexml_load_file('data/Collections/'.$sigla.' '.$arr["name"].'/'.$sigla.'.xml');
				foreach($xml->item as $item) {
					if (strcmp($text,$item->ref)==0) { echo '<a class="lien1" href="cat.php?id='.$item->rktst.'&typ=2" target="_blank">'.$item->tib.'</a><br>';$i=$i+1;}
				}
				if($i>0) {break;}
		}}
*/

