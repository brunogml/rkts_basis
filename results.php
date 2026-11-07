<?php
$text=$_GET['text'];
$typ=$_GET['typ'];
$typ2=$_GET['typ2'];
$typ3=$_GET['typ3'];
$sorte=1;

include('sub/wylie.php');
				$text=toWylie($text);
				$text=str_replace("  "," ",$text);
				$text=str_replace("  "," ",$text);



/*titre*/
if ($typ==1) {
	header('Location: results2.php?text='.$text);
}

/*Quotation*/
if ($typ==2 and $typ2==1) {
		if (substr($text,-1)==" ") {$text=substr($text,0,-1);}
		header('Location: etexts/tresults.php?txt='.$text.'&col=D&expert=0');
}

/*Quotation*/
if ($typ==2 and $typ2==2) {
		if (substr($text,-1)==" ") {$text=substr($text,0,-1);}
		header('Location: etexts/tresults.php?txt='.$text.'&col=TD&expert=0');
}

/*Quotation*/
if ($typ==2 and $typ2==3) {
		if (substr($text,-1)==" ") {$text=substr($text,0,-1);}
		header('Location: etexts/tresults.php?txt='.$text.'&col=Gpb&expert=0');
}

/*refN°*/
if ($typ==3)
{
		header('Location: resultsID.php?text='.$text.'&typ2='.$typ2);
}


/*Chapters exact*/
if ($typ==4) {
		header('Location: resultschap.php?text='.$text.'&typ3='.$typ3);

}
/*fin chapters exact*/








?>
