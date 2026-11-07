<meta http-equiv="refresh" content="0; url=https://rkts.org/rkts1/pages/etexts_repository.html">



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.button {
  background-color: #08088a;
  border: none;
  border-radius: 15px;
  color: white;
  padding: 15px 32px;
  margin-bottom: 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
.button2 {
  background-color: #ababfa;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
</style>
</head>
<body>

<h1><a href="../index.php" style="text-decoration:none;"><img src="../sub/logo.png" width=100></a>rKTs e-text repository</h1>

<hr>


<?php
$col=$_GET['col'];


echo '<table><tr><td><form action="repository.php">
Select a collection <select id="col" name="col" onchange="this.form.submit()" style="width: 250px; font-size: 20px;">
  <option value="xxx" style="font-weight: bold;">-KANJUR-</option>';
if ($col=="KanjurCone") { echo '<option value="KanjurCone" selected>C Cone Kanjur</option>';} else { echo '<option value="KanjurCone">C Cone Kanjur</option>';}
if ($col=="KanjurDerge") { echo '<option value="KanjurDerge" selected>D Derge Kanjur</option>';} else { echo '<option value="KanjurDerge">D Derge Kanjur</option>';}
if ($col=="KanjurPhugbrag") { echo '<option value="KanjurPhugbrag" selected>F Phugbrag Kanjur</option>';} else { echo '<option value="KanjurPhugbrag">F Phugbrag Kanjur</option>';}
if ($col=="KanjurLhasa") { echo '<option value="KanjurLhasa" selected>H Lhasa Kanjur</option>';} else { echo '<option value="KanjurLhasa">H Lhasa Kanjur</option>';}
if ($col=="KanjurHemisI") { echo '<option value="KanjurHemisI" selected>He Hemis I Kanjur</option>';} else { echo '<option value="KanjurHemisI">He Hemis I Kanjur</option>';}
if ($col=="KanjurLithang") { echo '<option value="KanjurLithang" selected>J Lithang Kanjur</option>';} else { echo '<option value="KanjurLithang">J Lithang Kanjur</option>';}
if ($col=="KanjurLondon") { echo '<option value="KanjurLondon" selected>L London Kanjur</option>';} else { echo '<option value="KanjurLondon">L London Kanjur</option>';}
if ($col=="KanjurNarthang") { echo '<option value="KanjurNarthang" selected>N Narthang Kanjur</option>';} else { echo '<option value="KanjurNarthang">N Narthang Kanjur</option>';}
if ($col=="KanjurPeking") { echo '<option value="KanjurPeking" selected>Q Peking Kanjur</option>';} else { echo '<option value="KanjurPeking">Q Peking Kanjur</option>';}
if ($col=="KanjurStog") { echo '<option value="KanjurStog" selected>S Stog Kanjur</option>';} else { echo '<option value="KanjurStog">S Stog Kanjur</option>';}
if ($col=="KanjurTsarang") { echo '<option value="KanjurTsarang" selected>Ts Tsarang Kanjur</option>';} else { echo '<option value="KanjurTsarang">Ts Tsarang Kanjur</option>';}
if ($col=="KanjurTashiyangtse") { echo '<option value="KanjurTashiyangtse" selected>Ty Tashiyangtse Kanjur</option>';} else { echo '<option value="KanjurTashiyangtse">Ty Tashiyangtse Kanjur</option>';}
if ($col=="KanjurUlaanbaatar") { echo '<option value="KanjurUlaanbaatar" selected>V Ulaanbaatar Kanjur</option>';} else { echo '<option value="KanjurUlaanbaatar">V Ulaanbaatar Kanjur</option>';}

echo '  <option value="xxx" style="font-weight: bold;">-CANONICAL COLLECTIONS-</option>';
if ($col=="KanjurBasgoFrag") { echo '<option value="KanjurBasgoFrag" selected>Ba Bago Fragments</option>';} else { echo '<option value="KanjurBasgoFrag">Ba Bago Fragments</option>';}
if ($col=="KanjurDrakmar") { echo '<option value="KanjurDrakmar" selected>Dm Drakmar Collection</option>';} else { echo '<option value="KanjurDrakmar">Dm Drakmar Collection</option>';}
if ($col=="KanjurGondhla") { echo '<option value="KanjurGondhla" selected>Go Gondhla Collection</option>';} else { echo '<option value="KanjurGondhla">Go Gondhla Collection</option>';}
if ($col=="KanjurNamgyal") { echo '<option value="KanjurNamgyal" selected>Ng Namgyal Collection</option>';} else { echo '<option value="KanjurNamgyal">Ng Namgyal Collection</option>';}


 echo '  <option value="xxx" style="font-weight: bold;">-TANJUR-</option>';
if ($col=="TanjurDerge") { echo '<option value="TanjurDerge" selected>D Derge Tanjur</option>';} else { echo '<option value="TanjurDerge">D Derge Tanjur</option>';}
if ($col=="TanjurNarthang") { echo '<option value="TanjurNarthang" selected>N Narthang Tanjur</option>';} else { echo '<option value="TanjurNarthang">N Narthang Tanjur</option>';}
if ($col=="TanjurGolden") { echo '<option value="TanjurGolden" selected>G Golden Tanjur</option>';} else { echo '<option value="TanjurGolden">G Golden Tanjur</option>';}
if ($col=="TanjurPeking") { echo '<option value="TanjurPeking" selected>Q Peking Tanjur</option>';} else { echo '<option value="TanjurPeking">Q Peking Tanjur</option>';}


 echo '  <option value="xxx" style="font-weight: bold;">-OLD TANTRA-</option>';
if ($col=="NGBGaz") { echo '<option value="NGBGaz" selected>Gaz rnying rgyud bcu bdun (Anzom Chögar)</option>';} else { echo '<option value="NGBGaz">Gaz rnying rgyud bcu bdun (Anzom Chögar)</option>';}
if ($col=="NGBGbr") { echo '<option value="NGBGbr" selected>Gbr Vairocana rnying rgyud</option>';} else { echo '<option value="NGBGbr">Gbr Vairocana rnying rgyud</option>';}
if ($col=="NGBGdg") { echo '<option value="NGBGdg" selected>Gdg Derge rnying rgyud</option>';} else { echo '<option value="NGBGdg">Gdg Derge rnying rgyud</option>';}
if ($col=="NGBGkh") { echo '<option value="NGBGkh" selected>Gkh Khams rnying rgyud</option>';} else { echo '<option value="NGBGkh">Gkh Khams rnying rgyud</option>';}
if ($col=="NGBGkk") { echo '<option value="NGBGkk" selected>Gkk Khakong rnying rgyud</option>';} else { echo '<option value="NGBGkk">Gkk Khakong rnying rgyud</option>';}
if ($col=="NGBGlt") { echo '<option value="NGBGlt" selected>Glt rnying rgyud bcu bdun (Langthang)</option>';} else { echo '<option value="NGBGlt">Glt rnying rgyud bcu bdun (Langthang)</option>';}
if ($col=="NGBGpb") { echo '<option value="NGBGpb" selected>Gpb Paltsek rnying rgyud</option>';} else { echo '<option value="NGBGpb">Gpb Paltsek rnying rgyud</option>';}
if ($col=="NGBGtb") { echo '<option value="NGBGtb" selected>Gtb Tsamdrak rnying rgyud</option>';} else { echo '<option value="NGBGtb">Gtb Tsamdrak rnying rgyud</option>';}
if ($col=="NGBGtn") { echo '<option value="NGBGtn" selected>Gtn Rikdzin Tsewang Norbu rnying rgyud</option>';} else { echo '<option value="NGBGtn">Gtn Rikdzin Tsewang Norbu rnying rgyud</option>';}


 echo '  <option value="xxx" style="font-weight: bold;">-BON CANON-</option>';
if ($col=="BonBkz") { echo '<option value="BonBkz" selected>Bkz Bon Katen</option>';} else { echo '<option value="BonBkz">Bkz Bon Katen</option>';}

  
echo '
</select>
</form>';

if ($col==""){
echo '<br><h1>Kanjur</h1>';
echo '<a href="repository.php?col=KanjurCone" class="button">C Cone Kanjur</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="repository.php?col=KanjurDerge" class="button">D Derge Kanjur</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="repository.php?col=KanjurPhugbrag" class="button">F Phugbrag Kanjur</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="repository.php?col=KanjurLhasa" class="button">H Lhasa Kanjur</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="repository.php?col=KanjurHemisI" class="button">He Hemis I Kanjur</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<br>';
echo '<a href="repository.php?col=KanjurLithang" class="button">J Lithang Kanjur</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="repository.php?col=KanjurLondon" class="button">L London Kanjur</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="repository.php?col=KanjurNarthang" class="button">N Narthang Kanjur</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="repository.php?col=KanjurPeking" class="button">Q Peking Kanjur</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="repository.php?col=KanjurStog" class="button">S Stog Kanjur</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<br>';
echo '<a href="repository.php?col=KanjurTsarang" class="button">Ts Tsarang Kanjur</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="repository.php?col=KanjurTashiyangtse" class="button">Ty Tashiyangtse Kanjur</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="repository.php?col=KanjurUlaanbaatar" class="button">V Ulaanbaatar Kanjur</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';


echo '<br><h1>Canonical Collections</h1>';
echo '<a href="repository.php?col=KanjurBasgoFrag" class="button">Ba Basgo Fragments</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="repository.php?col=KanjurDrakmar" class="button">Dm Drakmar Collection</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="repository.php?col=KanjurGondhla" class="button">Go Gondhla Collection</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="repository.php?col=KanjurNamgyal" class="button">Ng Namgyal Collection</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';



echo '<br><h1>Tanjur</h1>';
echo '<a href="repository.php?col=TanjurDerge" class="button">D Derge Tengyur</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="repository.php?col=TanjurGolden" class="button">G Golden Tengyur</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="repository.php?col=TanjurNarthang" class="button">N Narthang Tengyur</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="repository.php?col=TanjurPeking" class="button">Q Peking Tengyur</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';


echo '<br><h1>Old Tantra</h1>';
echo '<a href="repository.php?col=NGBGaz" class="button">Gaz rnying rgyud bcu bdun (Anzom Chögar)</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="repository.php?col=NGBGbr" class="button">Gbr Vairocana rnying rgyud</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="repository.php?col=NGBGdg" class="button">Gdg Derge rnying rgyud</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="repository.php?col=NGBGkh" class="button">Gkh Kham rnying rgyud</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="repository.php?col=NGBGkk" class="button">Gkk Khakong rnying rgyud</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="repository.php?col=NGBGlt" class="button">Glt rnying rgyud bcu bdun (Langthang)</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="repository.php?col=NGBGpb" class="button">Gpb Paltsek rnying rgyud</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="repository.php?col=NGBGtb" class="button">Gtb Tsamdrak rnying rgyud</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="repository.php?col=NGBGtn" class="button">Gtn Rikdzin Tsewang Norbu rnying rgyud</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';



echo '<br><h1>Bon Canon</h1>';
echo '<a href="repository.php?col=BonBkz" class="button">Bkz Bon Katen</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

}
if ($col!="xxx" and $col!=""){
	
	
	if ($col=="KanjurBasgoFrag"){
		$comment='e-texts produced with BDRC’s OCR application <a href="https://github.com/buda-base/tibetan-ocr-app" target="_blank"><img src="../sub/link.png" width=20></a>';
		$link="1Ba";
		$collist="Ba";$liste="volKanjur";
		}
	if ($col=="KanjurCone"){
		$comment='e-texts produced with BDRC’s OCR application <a href="https://github.com/buda-base/tibetan-ocr-app" target="_blank"><img src="../sub/link.png" width=20></a>';
		$link="1C";
		$collist="C";$liste="volKanjur";
		}
	if ($col=="KanjurDerge"){
		$comment='e-texts based on the Esukhia Input <a href="https://github.com/OpenPecha-Data/P000001" target="_blank"><img src="../sub/link.png" width=20></a>';
		$link="1D";
		$collist="D";$liste="volKanjur";
		}
	if ($col=="KanjurDrakmar"){
		$comment='e-texts produced with BDRC’s OCR application <a href="https://github.com/buda-base/tibetan-ocr-app" target="_blank"><img src="../sub/link.png" width=20>';
		$link="1Dm";
		$collist="Dm";$liste="volKanjur";
		}
	if ($col=="KanjurPhugbrag"){
		$comment='e-texts produced with BDRC’s OCR application <a href="https://github.com/buda-base/tibetan-ocr-app" target="_blank"><img src="../sub/link.png" width=20>';
		$link="1F";
		$collist="F";$liste="volKanjur";
		}
	if ($col=="KanjurGondhla"){
		$comment='e-texts produced with BDRC’s OCR application <a href="https://github.com/buda-base/tibetan-ocr-app" target="_blank"><img src="../sub/link.png" width=20>';
		$link="1Go";
		$collist="Go";$liste="volKanjur";
		}
	if ($col=="KanjurLhasa"){
		$comment='e-texts based on the ACIP/ALL <img src="../data/scanner/ALL.png" width=70> Input <a href="https://asianlegacylibrary.org/library/" target="_blank"><img src="../sub/link.png" width=20>';
		$link="1H";
		$collist="H";$liste="volKanjur";
		}
	if ($col=="KanjurHemisI"){
		$comment='e-texts produced with BDRC’s OCR application <a href="https://github.com/buda-base/tibetan-ocr-app" target="_blank"><img src="../sub/link.png" width=20>';
		$link="1He";
		$collist="He";$liste="volKanjur";
		}
	if ($col=="KanjurLithang"){
		$comment='e-texts based on the Adarsha <img src="../data/scanner/Adarsha.png" width=40> Input <a href="https://online.adarshah.org/index.html?kdb=jiangkangyur&sutra=J1&page=1-1b" target="_blank"><img src="../sub/link.png" width=20>';
		$link="1J";
		$collist="J";$liste="volKanjur";
		}
	if ($col=="KanjurLondon"){
		$comment='e-texts produced with BDRC’s OCR application <a href="https://github.com/buda-base/tibetan-ocr-app" target="_blank"><img src="../sub/link.png" width=20>';
		$link="1L";
		$collist="L";$liste="volKanjur";
		}
	if ($col=="KanjurNarthang"){
		$comment='e-texts produced with BDRC’s OCR application <a href="https://github.com/buda-base/tibetan-ocr-app" target="_blank"><img src="../sub/link.png" width=20>';
		$link="1N";
		$collist="N";$liste="volKanjur";
		}
	if ($col=="KanjurNamgyal"){
		$comment='e-texts produced with BDRC’s OCR application <a href="https://github.com/buda-base/tibetan-ocr-app" target="_blank"><img src="../sub/link.png" width=20>';
		$link="1Ng";
		$collist="Ng";$liste="volKanjur";
		}
	if ($col=="KanjurPeking"){
		$comment='e-texts produced with BDRC’s OCR application <a href="https://github.com/buda-base/tibetan-ocr-app" target="_blank"><img src="../sub/link.png" width=20>';
		$link="1Q";
		$collist="Q";$liste="volKanjur";
		}
	if ($col=="KanjurStog"){
		$comment='e-texts produced with BDRC’s OCR application <a href="https://github.com/buda-base/tibetan-ocr-app" target="_blank"><img src="../sub/link.png" width=20>';
		$link="1S";
		$collist="S";$liste="volKanjur";
		}
	if ($col=="KanjurTashiyangtse"){
		$comment='e-texts produced with BDRC’s OCR application <a href="https://github.com/buda-base/tibetan-ocr-app" target="_blank"><img src="../sub/link.png" width=20>';
		$link="1Ty";
		$collist="Ty";$liste="volKanjur";
		}
	if ($col=="KanjurTsarang"){
		$comment='e-texts produced with BDRC’s OCR application <a href="https://github.com/buda-base/tibetan-ocr-app" target="_blank"><img src="../sub/link.png" width=20>';
		$link="1Ts";
		$collist="Ts";$liste="volKanjur";
		}
	if ($col=="KanjurUlaanbaatar"){
		$comment='e-texts produced with BDRC’s OCR application <a href="https://github.com/buda-base/tibetan-ocr-app" target="_blank"><img src="../sub/link.png" width=20>';
		$link="1V";
		$collist="V";$liste="volKanjur";
		}

	if ($col=="TanjurDerge"){
		$comment='e-texts based on the ACIP/ALL <img src="../data/scanner/ALL.png" width=70> Input <a href="https://asianlegacylibrary.org/library/" target="_blank"><img src="../sub/link.png" width=20>';
		$link="2D";
		$collist="TD";$liste="volTanjur";
		}
	if ($col=="TanjurNarthang"){
		$comment='e-texts based on the ALL <img src="../data/scanner/ALL.png" width=70> Input <a href="https://asianlegacylibrary.org/centers/south-india/south-india-centers-conclude-the-digitization-of-the-narthan-tengyur/" target="_blank"><img src="../sub/link.png" width=20>';
		$link="2N";
		$collist="TN";$liste="volTanjur";
		}

	if ($col=="TanjurGolden"){
		$comment='e-texts produced with BDRC’s OCR application <a href="https://github.com/buda-base/tibetan-ocr-app" target="_blank"><img src="../sub/link.png" width=20>';
		$link="2G";
		$collist="TG";$liste="volTanjur";
		}
	if ($col=="TanjurPeking"){
		$comment='e-texts produced with BDRC’s OCR application <a href="https://github.com/buda-base/tibetan-ocr-app" target="_blank"><img src="../sub/link.png" width=20>';
		$link="2Q";
		$collist="TQ";$liste="volTanjur";
		}


	if ($col=="NGBGaz"){
		$comment='e-texts produced with BDRC’s OCR application <a href="https://github.com/buda-base/tibetan-ocr-app" target="_blank"><img src="../sub/link.png" width=20>';
		$link="3Gaz";
		$collist="Gaz";$liste="volTantra";
		}
	if ($col=="NGBGbr"){
		$comment='e-texts produced with BDRC’s OCR application <a href="https://github.com/buda-base/tibetan-ocr-app" target="_blank"><img src="../sub/link.png" width=20>';
		$link="3Gbr";
		$collist="Gbr";$liste="volTantra";
		}
	if ($col=="NGBGdg"){
		$comment='e-texts produced with BDRC’s OCR application <a href="https://github.com/buda-base/tibetan-ocr-app" target="_blank"><img src="../sub/link.png" width=20>';
		$link="3Gdg";
		$collist="Gdg";$liste="volTantra";
		}
	if ($col=="NGBGkh"){
		$comment='e-texts produced with BDRC’s OCR application <a href="https://github.com/buda-base/tibetan-ocr-app" target="_blank"><img src="../sub/link.png" width=20>';
		$link="3Gkh";
		$collist="Gkh";$liste="volTantra";
		}
	if ($col=="NGBGkk"){
		$comment='e-texts produced with BDRC’s OCR application <a href="https://github.com/buda-base/tibetan-ocr-app" target="_blank"><img src="../sub/link.png" width=20>';
		$link="3Gkk";
		$collist="Gkk";$liste="volTantra";
		}
	if ($col=="NGBGlt"){
		$comment='e-texts produced with BDRC’s OCR application <a href="https://github.com/buda-base/tibetan-ocr-app" target="_blank"><img src="../sub/link.png" width=20>';
		$link="3Glt";
		$collist="Glt";$liste="volTantra";
		}
	if ($col=="NGBGpb"){
		$comment='e-texts produced with BDRC’s OCR application <a href="https://github.com/buda-base/tibetan-ocr-app" target="_blank"><img src="../sub/link.png" width=20>';
		$link="3Gpb";
		$collist="Gpb";$liste="volTantra";
		}
	if ($col=="NGBGtb"){
		$comment='e-texts produced with BDRC’s OCR application <a href="https://github.com/buda-base/tibetan-ocr-app" target="_blank"><img src="../sub/link.png" width=20>';
		$link="3Gtb";
		$collist="Gtb";$liste="volTantra";
		}
	if ($col=="NGBGtn"){
		$comment='e-texts produced with BDRC’s OCR application <a href="https://github.com/buda-base/tibetan-ocr-app" target="_blank"><img src="../sub/link.png" width=20>';
		$link="3Gtn";
		$collist="Gtn";$liste="volTantra";
		}

	if ($col=="BonBkz"){
		$comment='e-texts produced with BDRC’s OCR application <a href="https://github.com/buda-base/tibetan-ocr-app" target="_blank"><img src="../sub/link.png" width=20>';
		$link="5Bkz";
		$collist="Bkz";$liste="volBon";
		}



echo '<td width=50><td>'.$comment.'<td width=50><td>Go to the collection <a href="../collections.php?id='.$link.'" target="_blank"><img src="../sub/link.png" width=20></a></table>';	

$xml=simplexml_load_file("repository/".$liste.".xml");

$j=0;
echo '<hr><table><tr>';

foreach($xml->item as $item){
	if ($item->col==$collist){ 
	if ($j % 5 == 0) {echo '<tr>';}
	
	$filename='repository/'.$col.'/'.$item->voln.'.txt';
	if (file_exists($filename)) {
    echo '<td width=50><td valign="top"><img src="text.png" width=20> <a href="repository/'.$col.'/'.$item->voln.'.txt" target="_blank">vol. '.$item->voln.'</a> ('.$item->vol.')';
	echo ' <sub>[rev. '.date("d M Y", filemtime('repository/'.$col.'/'.$item->voln.'.txt')).']</sub>';
	$info='info/'.$col.$item->voln.'.txt'; 
	if (file_exists($info)) {echo '<sup><a href="info.php?fich='.$col.$item->voln.'" target="_blank">🛈</a></sup>';}
	$j++;
	}
	}
}
}

echo '<br><br><br>';

?>

<div style="position:absolute;top:10px;right: 10px;">
<a href="../rkts1/pages/etexts_repository.html" target="_blank"><img src="../sub/visitnew.jpg" width=100></a>
</div>
