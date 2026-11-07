<html>
<head>
 <link rel="icon" type="image/x-icon" href="sub/logo.ico">
<style>
.myDiv {
  text-align: center;
  width: 50%;
  height: 95%;
  position: absolute;
  right: 0px;
}
.myDiv2 {
  text-align: left;
  width: 45%;
  position: absolute;
  left: 0px;
  padding: 5px;
  font-size: 16px;

}
</style>
</head>
<body>
<?php
$text=' '.$_POST["text"];
$text=str_replace("'","ß",$text);

		  $xmld = simplexml_load_file("data/extra/terms.xml"); 
		  foreach($xmld->tib as $tibd){
			  if (substr_count($tibd,' ')>0) {
					$tibd=str_replace("'","ß",$tibd);
					$tibd1=' '.$tibd;
					$tibd2=str_replace(' ','#',$tibd);
					$tibd3=str_replace('ß','%27',$tibd2);
					$tibd3l=explode('#',$tibd3);
					if (substr_count($tibd,' ')>3) {$tibd3ll=$tibd3l[0].'#'.$tibd3l[1];}
					else {$tibd3ll=$tibd3l[0].'#'.$tibd3l[1];}
			$text=str_replace($tibd1,"▸<a onclick=\"affiche_text('".$tibd3."','".$tibd3ll."')\" style=\" font-weight: bold;color:blue;\">".$tibd2."</a>◂",$text);
		  }}
					$text=str_replace('#',' ',$text);
					$text=str_replace('ß','&#8217;',$text);

echo '<div id="divd0" class="myDiv2">';
echo $text;
echo '</div>';
?>

<div id="divd" class="myDiv">
</div>



<script language="JavaScript">

	function affiche_text(text,text2){
		text= '<iframe src="https://dictionary.christian-steinert.de/#%7B%22activeTerm%22%3A%22' + text + '%22%2C%22lang%22%3A%22tib%22%2C%22inputLang%22%3A%22tib%22%2C%22currentListTerm%22%3A%22' + text2 + '%22%2C%22forceLeftSideVisible%22%3Atrue%2C%22offset%22%3A0%7D" width=1000 height=750></iframe><br><a href="https://www.christian-steinert.de" target="_blank">Christan Steinert\'s Dictionary application</a>';
		document.getElementById("divd").innerHTML = text;
	}

</script>




