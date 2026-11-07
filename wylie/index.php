	
<?php
function toWylie($tib) {
	$tib=str_replace("ཀ","k|",$tib);
	$tib=str_replace("ཁ","kh|",$tib);
	$tib=str_replace("གཡ","g.y|",$tib);
	$tib=str_replace("ག","g|",$tib);
	$tib=str_replace("གྷ","g+h|",$tib);
	$tib=str_replace("ང","ng|",$tib);
	$tib=str_replace("ཅ","c|",$tib);
	$tib=str_replace("ཆ","ch|",$tib);
	$tib=str_replace("ཇ","j|",$tib);
	$tib=str_replace("ཉ","ny|",$tib);
	$tib=str_replace("ཏ","t|",$tib);
	$tib=str_replace("ཐ","th|",$tib);
	$tib=str_replace("ད","d|",$tib);
	$tib=str_replace("དྷ","d+h|",$tib);
	$tib=str_replace("ན","n|",$tib);
	$tib=str_replace("ཊ","T|",$tib);
	$tib=str_replace("ཋ","TH|",$tib);
	$tib=str_replace("ཌ","D|",$tib);
	$tib=str_replace("ཌྷ","D+H|",$tib);
	$tib=str_replace("ཎ","N|",$tib);
	$tib=str_replace("པ","p|",$tib);
	$tib=str_replace("ཕ","ph|",$tib);
	$tib=str_replace("བ","b|",$tib);
	$tib=str_replace("བྷ","b+h|",$tib);
	$tib=str_replace("མ","m|",$tib);
	$tib=str_replace("ཙ","ts|",$tib);
	$tib=str_replace("ཚ","tsh|",$tib);
	$tib=str_replace("ཛ","dz|",$tib);
	$tib=str_replace("ཛྷ","dz+h|",$tib);
	$tib=str_replace("ཝ","w|",$tib);
	$tib=str_replace("ཞ","zh|",$tib);
	$tib=str_replace("ཟ","z|",$tib);
	$tib=str_replace("འ","'|",$tib);
	$tib=str_replace("ཡ","y|",$tib);
	$tib=str_replace("ར","r|",$tib);
	$tib=str_replace("ལ","l|",$tib);
	$tib=str_replace("ཤ","sh|",$tib);
	$tib=str_replace("ཥ","Sh|",$tib);
	$tib=str_replace("ས","s|",$tib);
	$tib=str_replace("ཧ","h|",$tib);
	$tib=str_replace("ཨ","a|",$tib);
	$tib=str_replace("ི","i|",$tib);
	$tib=str_replace("ཱི","I|",$tib);
	$tib=str_replace("ུ","u|",$tib);
	$tib=str_replace("ཱུ","U|",$tib);
	$tib=str_replace("ཱ","A|",$tib);
	$tib=str_replace("ྲྀ","r-i|",$tib);
	$tib=str_replace("ཷ","r-I|",$tib);
	$tib=str_replace("ེ","e|",$tib);
	$tib=str_replace("ཻ","ai|",$tib);
	$tib=str_replace("ོ","o|",$tib);
	$tib=str_replace("ཽ","au|",$tib);
	$tib=str_replace("ཾ","M|",$tib);
	$tib=str_replace("ཿ","H|",$tib);
	$tib=str_replace("ྀ","-i|",$tib);
	$tib=str_replace("ཱྀ","-I|",$tib);
	
	$tib=str_replace("ྐ","+k|",$tib);
	$tib=str_replace("ྑ","+kh|",$tib);
	$tib=str_replace("ྒ","+g|",$tib);
	$tib=str_replace("ྒྷ","+g+h|",$tib);
	$tib=str_replace("ྔ","+ng|",$tib);
	$tib=str_replace("ྕ","+c|",$tib);
	$tib=str_replace("ྖ","+ch|",$tib);
	$tib=str_replace("ྗ","+j|",$tib);
	$tib=str_replace("ྙ","+ny|",$tib);
	$tib=str_replace("ྚ","+T|",$tib);
	$tib=str_replace("ྛ","+Th|",$tib);
	$tib=str_replace("ྜ","+D|",$tib);
	$tib=str_replace("ྜྷ","+D+h|",$tib);
	$tib=str_replace("ྞ","+N|",$tib);
	$tib=str_replace("ྟ","+t|",$tib);
	$tib=str_replace("ྠ","+th|",$tib);
	$tib=str_replace("ྡ","+d|",$tib);
	$tib=str_replace("ྡྷ","+d+h|",$tib);
	$tib=str_replace("ྣ","+n|",$tib);
	$tib=str_replace("ྤ","+p|",$tib);
	$tib=str_replace("ྥ","+ph|",$tib);
	$tib=str_replace("ྦ","+b|",$tib);
	$tib=str_replace("ྦྷ","+b+h|",$tib);
	$tib=str_replace("ྨ","+m|",$tib);
	$tib=str_replace("ྩ","+ts|",$tib);
	$tib=str_replace("ྪ","+tsh|",$tib);
	$tib=str_replace("ྫ","+dz|",$tib);
	$tib=str_replace("ྫྷ","+dz+h|",$tib);
	$tib=str_replace("ྭ","+w|",$tib);
	$tib=str_replace("ྮ","+zh|",$tib);
	$tib=str_replace("ྯ","+z|",$tib);
	$tib=str_replace("ྱ","+y|",$tib);
	$tib=str_replace("ྲ","+r|",$tib);
	$tib=str_replace("ླ","+l|",$tib);
	$tib=str_replace("ྴ","+sh|",$tib);
	$tib=str_replace("ྵ","+Sh|",$tib);
	$tib=str_replace("ྶ","+s|",$tib);
	$tib=str_replace("ྷ","+a|",$tib);
	$tib=str_replace("ྻ","+y|",$tib);
	
	$tib=str_replace("་"," ",$tib);
	$tib=str_replace("།","/",$tib);
	$tib=str_replace("༎","//",$tib);
	
	$bout=explode(' ',$tib);
	$tib2="";
	foreach($bout as $bt)
	{
		if (strpos($bt,'i')!=FALSE or strpos($bt,'u')!=FALSE or strpos($bt,'e')!=FALSE or strpos($bt,'o')!=FALSE or stripos($bt,'A')!=FALSE or stripos($bt,'I')!=FALSE or stripos($bt,'U')!=FALSE )
		{ $bt=str_replace("|","",$bt);
		}
		else 
		{
			$nb=substr_count($bt,'+');
			if ($nb>0){
			$bt2=explode('|',$bt);
			$i=0;$tt="";
			foreach($bt2 as $btt2) { 
			if (strstr($btt2,'+')) {$i=$i+1;}
			if ($i==$nb and strstr($btt2,'+')) {$btt2=$btt2."a";} 
				$tt=$tt.$btt2;
			}
			$bt=$tt;}
			else /*prescripte*/
			{
				if (substr_count($bt,'|')==1) {$bt=str_replace("|","a",$bt);}
				if (substr_count($bt,'|')==2) {$bt=substr($bt,0,-1);$bt=str_replace("|","a",$bt); }
				if  (substr_count($bt,'|')>2) {
													if (strcmp(substr($bt,0,4),"b|c|")==0) {$bt=str_replace("b|c|","bca",$bt);}
													if (strcmp(substr($bt,0,4),"b|d|")==0) {$bt=str_replace("b|d|","bda",$bt);}
													if (strcmp(substr($bt,0,4),"b|k|")==0) {$bt=str_replace("b|k|","bka",$bt);}
													if (strcmp(substr($bt,0,5),"b|sh|")==0) {$bt=str_replace("b|sh|","bsha",$bt);}
													if (strcmp(substr($bt,0,4),"b|s|")==0) {$bt=str_replace("b|s|","bsa",$bt);}
													if (strcmp(substr($bt,0,5),"b|ts|")==0) {$bt=str_replace("b|ts|","btsa",$bt);}
													if (strcmp(substr($bt,0,4),"b|t|")==0) {$bt=str_replace("b|t|","bta",$bt);}
													if (strcmp(substr($bt,0,5),"b|zh|")==0) {$bt=str_replace("b|zh|","bzha",$bt);}
													if (strcmp(substr($bt,0,4),"b|z|")==0) {$bt=str_replace("b|z|","bza",$bt);}

													if (strcmp(substr($bt,0,4),"d|b|")==0) {$bt=str_replace("d|b|","dba",$bt);}
													if (strcmp(substr($bt,0,4),"d|k|")==0) {$bt=str_replace("d|k|","dka",$bt);}
													if (strcmp(substr($bt,0,4),"d|m|")==0) {$bt=str_replace("d|m|","dma",$bt);}
													if (strcmp(substr($bt,0,4),"d|p|")==0) {$bt=str_replace("d|p|","dpa",$bt);}

													if (strcmp(substr($bt,0,4),"g|c|")==0) {$bt=str_replace("g|c|","gca",$bt);}
													if (strcmp(substr($bt,0,4),"g|d|")==0) {$bt=str_replace("g|d|","gda",$bt);}
													if (strcmp(substr($bt,0,5),"g|ny|")==0) {$bt=str_replace("g|ny|","gnya",$bt);}
													if (strcmp(substr($bt,0,4),"g|n|")==0) {$bt=str_replace("g|n|","gna",$bt);}
													if (strcmp(substr($bt,0,5),"g|sh|")==0) {$bt=str_replace("g|sh|","gsha",$bt);}
													if (strcmp(substr($bt,0,4),"g|s|")==0) {$bt=str_replace("g|s|","gsa",$bt);}
													if (strcmp(substr($bt,0,5),"g|ts|")==0) {$bt=str_replace("g|ts|","gtsa",$bt);}
													if (strcmp(substr($bt,0,4),"g|t|")==0) {$bt=str_replace("g|t|","gta",$bt);}
													if (strcmp(substr($bt,0,5),"g|zh|")==0) {$bt=str_replace("g|zh|","gzha",$bt);}
													if (strcmp(substr($bt,0,4),"g|z|")==0) {$bt=str_replace("g|z|","gza",$bt);}

													if (strcmp(substr($bt,0,5),"m|ch|")==0) {$bt=str_replace("m|ch|","mcha",$bt);}
													if (strcmp(substr($bt,0,5),"m|dz|")==0) {$bt=str_replace("m|dz|","mdza",$bt);}
													if (strcmp(substr($bt,0,4),"m|d|")==0) {$bt=str_replace("m|d|","mda",$bt);}
													if (strcmp(substr($bt,0,4),"m|j|")==0) {$bt=str_replace("m|j|","mja",$bt);}
													if (strcmp(substr($bt,0,5),"m|kh|")==0) {$bt=str_replace("m|kh|","mkha",$bt);}
													if (strcmp(substr($bt,0,5),"m|ny|")==0) {$bt=str_replace("m|ny|","mnya",$bt);}
													if (strcmp(substr($bt,0,4),"m|n|")==0) {$bt=str_replace("m|n|","mna",$bt);}
													if (strcmp(substr($bt,0,5),"m|th|")==0) {$bt=str_replace("m|th|","mtha",$bt);}
													if (strcmp(substr($bt,0,6),"m|tsh|")==0) {$bt=str_replace("m|tsh|","mtsha",$bt);}

													if (strcmp(substr($bt,0,4),"'|b|")==0) {$bt=str_replace("'|b|","'ba",$bt);}
													if (strcmp(substr($bt,0,5),"'|ch|")==0) {$bt=str_replace("'|ch|","'cha",$bt);}
													if (strcmp(substr($bt,0,5),"'|dz|")==0) {$bt=str_replace("'|dz|","'dza",$bt);}
													if (strcmp(substr($bt,0,4),"'|d|")==0) {$bt=str_replace("'|d|","'da",$bt);}
													if (strcmp(substr($bt,0,4),"'|j|")==0) {$bt=str_replace("'|j|","'ja",$bt);}
													if (strcmp(substr($bt,0,5),"'|kh|")==0) {$bt=str_replace("'|kh|","'kha",$bt);}
													if (strcmp(substr($bt,0,5),"'|ph|")==0) {$bt=str_replace("'|ph|","'pha",$bt);}
													if (strcmp(substr($bt,0,5),"'|th|")==0) {$bt=str_replace("'|th|","'tha",$bt);}
													if (strcmp(substr($bt,0,6),"'|tsh|")==0) {$bt=str_replace("'|tsh|","'tsha",$bt);}
													
													if (strpos($bt,'a')!=FALSE) {$bt=str_replace("|","",$bt);}
													
													else { $btf=explode("|",$bt); $i=0; $bt1="";
													foreach($btf as $btff) { 
														if ($i==0) { $btff=$btff."a";} 
														$bt1=$bt1.$btff; $i++;
													}
													$bt=$bt1;
													}
													
				}
			}
			
		}
			$tib2=$tib2.$bt.' ';
		}	

$tib=$tib2;
/*les groupes classiques*/
	$bout=explode(' ',$tib);
	$tib2="";
foreach($bout as $bt) {
	if (substr_count($bt,'+')==1)  {
	$bt=str_replace("b+l","bl",$bt);
	$bt=str_replace("b+r","br",$bt);
	$bt=str_replace("b+y","by",$bt);
	$bt=str_replace("c+w","cw",$bt);
	$bt=str_replace("d+r","dr",$bt);
	$bt=str_replace("d+w","dw",$bt);
	$bt=str_replace("dz+r","drz",$bt);
	$bt=str_replace("g+l","gl",$bt);
	$bt=str_replace("g+r","gr",$bt);
	$bt=str_replace("g+w","gw",$bt);
	$bt=str_replace("g+y","gy",$bt);
	$bt=str_replace("h+r","hr",$bt);
	$bt=str_replace("h+w","hw",$bt);
	$bt=str_replace("k+l","kl",$bt);
	$bt=str_replace("k+r","kr",$bt);
	$bt=str_replace("k+w","kw",$bt);
	$bt=str_replace("k+y","ky",$bt);
	$bt=str_replace("kh+r","khr",$bt);
	$bt=str_replace("kh+w","khw",$bt);
	$bt=str_replace("kh+y","khy",$bt);
	$bt=str_replace("l+b","lb",$bt);
	$bt=str_replace("l+c","lc",$bt);
	$bt=str_replace("l+d","ld",$bt);
	$bt=str_replace("l+g","lg",$bt);
	$bt=str_replace("l+h","lh",$bt);
	$bt=str_replace("l+j","lj",$bt);
	$bt=str_replace("l+k","lk",$bt);
	$bt=str_replace("l+ng","lng",$bt);
	$bt=str_replace("l+p","lp",$bt);
	$bt=str_replace("l+t","lt",$bt);
	$bt=str_replace("l+w","lw",$bt);
	$bt=str_replace("m+r","mr",$bt);
	$bt=str_replace("m+y","my",$bt);
	$bt=str_replace("n+r","nr",$bt);
	$bt=str_replace("ny+w","nyw",$bt);
	$bt=str_replace("p+r","pr",$bt);
	$bt=str_replace("p+y","py",$bt);
	$bt=str_replace("ph+r","phr",$bt);
	$bt=str_replace("ph+y","phy",$bt);
	$bt=str_replace("r+b","rb",$bt);
	$bt=str_replace("r+d","rd",$bt);
	$bt=str_replace("r+dz","rdz",$bt);
	$bt=str_replace("r+g","rg",$bt);
	$bt=str_replace("r+j","rj",$bt);
	$bt=str_replace("r+k","rk",$bt);
	$bt=str_replace("r+l","rl",$bt);
	$bt=str_replace("r+m","rm",$bt);
	$bt=str_replace("r+n","rn",$bt);
	$bt=str_replace("r+ng","rng",$bt);
	$bt=str_replace("r+ny","rny",$bt);
	$bt=str_replace("r+t","rt",$bt);
	$bt=str_replace("r+ts","rts",$bt);
	$bt=str_replace("r+w","rw",$bt);
	$bt=str_replace("s+b","sb",$bt);
	$bt=str_replace("s+d","sd",$bt);
	$bt=str_replace("s+g","sg",$bt);
	$bt=str_replace("s+k","sk",$bt);
	$bt=str_replace("s+l","sl",$bt);
	$bt=str_replace("s+m","sm",$bt);
	$bt=str_replace("s+n","sn",$bt);
	$bt=str_replace("s+ng","sng",$bt);
	$bt=str_replace("s+ny","sny",$bt);
	$bt=str_replace("s+p","sp",$bt);
	$bt=str_replace("s+r","sr",$bt);
	$bt=str_replace("s+t","st",$bt);
	$bt=str_replace("s+ts","sts",$bt);
	$bt=str_replace("s+w","sw",$bt);
	$bt=str_replace("sh+r","shr",$bt);
	$bt=str_replace("sh+w","shw",$bt);
	$bt=str_replace("t+r","tr",$bt);
	$bt=str_replace("t+w","tw",$bt);
	$bt=str_replace("th+r","thr",$bt);
	$bt=str_replace("ts+w","tsw",$bt);
	$bt=str_replace("tsh+w","tshw",$bt);
	$bt=str_replace("z+l","zl",$bt);
	$bt=str_replace("z+w","zw",$bt);
	$bt=str_replace("zh+w","zhw",$bt);
	}
	if (substr_count($bt,'+')==2)  {		
	$bt=str_replace("s+g+r","sgr",$bt);
	$bt=str_replace("s+g+y","sgy",$bt);
	$bt=str_replace("r+k+y","rky",$bt);
	$bt=str_replace("d+r+w","drw",$bt);
	$bt=str_replace("g+r+w","grw",$bt);
	$bt=str_replace("r+m+y","rmy",$bt);
	$bt=str_replace("ph+y+w","phyw",$bt);
	$bt=str_replace("r+g+w","rgw",$bt);
	$bt=str_replace("r+g+y","rgy",$bt);
	$bt=str_replace("s+n+r","snr",$bt);
	$bt=str_replace("r+ts+w","rtsw",$bt);
	$bt=str_replace("s+k+r","skr",$bt);
	$bt=str_replace("s+k+y","sky",$bt);
	$bt=str_replace("s+b+r","sbr",$bt);
	$bt=str_replace("s+b+y","sby",$bt);
	$bt=str_replace("s+m+r","smr",$bt);
	$bt=str_replace("s+m+y","smy",$bt);
	$bt=str_replace("s+p+r","spr",$bt);
	$bt=str_replace("s+p+y","spy",$bt);
	}
	$tib2=$tib2.$bt.' ';
}

/*points particuliers*/

$tib=$tib2;

	$tib=str_replace("p'i","pa'i",$tib);
	$tib=str_replace("b'i","ba'i",$tib);
	$tib=str_replace("m'i","ma'i",$tib);
	$tib=str_replace("dag'","dga'",$tib);
	$tib=str_replace("'aphgs","'phags",$tib);




	
	return $tib;
}

echo '<form action="index.php">
<input name="ess" id="ess">
</form>';




$ess=$_GET["ess"];

echo '<font size=+3>'.$ess.'</font><br>';

$res=toWylie($ess);

echo '<font size=+1>'.$res;
  



?>

