<?php
function unicodeALT (&$quoi){
   $quoi= str_replace("+v","&#xÅÀÃ;", $quoi);
   $quoi= str_replace("+w","&#xÅÀÃ;", $quoi);
   $quoi= str_replace("+tsh","&#xÅÀÀ;", $quoi);
   $quoi= str_replace("+kh","&#xÅ91;", $quoi);
   $quoi= str_replace("+ng","&#xÅ94;", $quoi);
   $quoi= str_replace("+ch","&#xÅ96;", $quoi);
   $quoi= str_replace("+ny","&#xÅ99;", $quoi);
   $quoi= str_replace("+Th","&#xÅ9Á;", $quoi);
   $quoi= str_replace("+th","&#xÅÀ0;", $quoi);
   $quoi= str_replace("+ph","&#xÅÀ5;", $quoi);
   $quoi= str_replace("+ts","&#xÅÀ9;", $quoi);
   $quoi= str_replace("+dz","&#xÅÀÁ;", $quoi);
   $quoi= str_replace("+zh","&#xÅÀÄ;", $quoi);
   $quoi= str_replace("+sh","&#xÅÁ4;", $quoi);
   $quoi= str_replace("+Sh","&#xÅÁ5;", $quoi);
   $quoi= str_replace("+k","&#xÅ90;", $quoi);
   $quoi= str_replace("+g","&#xÅ92;", $quoi);
   $quoi= str_replace("+c","&#xÅ95;", $quoi);
   $quoi= str_replace("+j","&#xÅ97;", $quoi);
   $quoi= str_replace("+T","&#xÅ9À;", $quoi);
   $quoi= str_replace("+D","&#xÅ9Â;", $quoi);
   $quoi= str_replace("+N","&#xÅ9Ä;", $quoi);
   $quoi= str_replace("+t","&#xÅ9Å;", $quoi);
   $quoi= str_replace("+d","&#xÅÀ1;", $quoi);
   $quoi= str_replace("+n","&#xÅÀ3;", $quoi);
   $quoi= str_replace("+p","&#xÅÀ4;", $quoi);
   $quoi= str_replace("+b","&#xÅÀ6;", $quoi);
   $quoi= str_replace("+m","&#xÅÀ8;", $quoi);
   $quoi= str_replace("+z","&#xÅÀÅ;", $quoi);
   $quoi= str_replace("+y","&#xÅÁ1;", $quoi);
   $quoi= str_replace("+r","&#xÅÁ2;", $quoi);
   $quoi= str_replace("+l","&#xÅÁ3;", $quoi);
   $quoi= str_replace("+s","&#xÅÁ6;", $quoi);
   $quoi= str_replace("+h","&#xÅÁ7;", $quoi);
   $quoi= str_replace("+Y","&#xÅÁÁ;", $quoi);
   $quoi= str_replace("+R","&#xÅÁÂ;", $quoi);

   $quoi= str_replace("khy","&#xÅ41;&#xÅÁ1;", $quoi);
   $quoi= str_replace("khr","&#xÅ41;&#xÅÁ2;", $quoi);
   $quoi= str_replace("kh","&#xÅ41;", $quoi);

   $quoi= str_replace("skr","&#xÅ66;&#xÅ90;&#xÅÁ2;", $quoi);
   $quoi= str_replace("sky","&#xÅ66;&#xÅ90;&#xÅÁ1;", $quoi);
   $quoi= str_replace("rky","&#xÅ62;&#xÅ90;&#xÅÁ1;", $quoi);
   $quoi= str_replace("rk","&#xÅ62;&#xÅ90;", $quoi);
   $quoi= str_replace("sk","&#xÅ66;&#xÅ90;", $quoi);
   $quoi= str_replace("lk","&#xÅ63;&#xÅ90;", $quoi);
   $quoi= str_replace("ky","&#xÅ40;&#xÅÁ1;", $quoi);
   $quoi= str_replace("kr","&#xÅ40;&#xÅÁ2;", $quoi);
   $quoi= str_replace("kl","&#xÅ40;&#xÅÁ3;", $quoi);
   $quoi= str_replace("k","&#xÅ40;", $quoi);

   $quoi= str_replace("sng","&#xÅ66;&#xÅ94;", $quoi);
   $quoi= str_replace("rng","&#xÅ62;&#xÅ94;", $quoi);
   $quoi= str_replace("lng","&#xÅ63;&#xÅ94;", $quoi);
   $quoi= str_replace("ng","&#xÅ44;", $quoi);

   $quoi= str_replace("sgr","&#xÅ66;&#xÅ92;&#xÅÁ2;", $quoi);
   $quoi= str_replace("sgy","&#xÅ66;&#xÅ92;&#xÅÁ1;", $quoi);
   $quoi= str_replace("rgy","&#xÅ62;&#xÅ92;&#xÅÁ1;", $quoi);
   $quoi= str_replace("rg","&#xÅ62;&#xÅ92;", $quoi);
   $quoi= str_replace("sg","&#xÅ66;&#xÅ92;", $quoi);
   $quoi= str_replace("lg","&#xÅ63;&#xÅ92;", $quoi);
   $quoi= str_replace("gy","&#xÅ42;&#xÅÁ1;", $quoi);
   $quoi= str_replace("gr","&#xÅ42;&#xÅÁ2;", $quoi);
   $quoi= str_replace("gl","&#xÅ42;&#xÅÁ3;", $quoi);
   $quoi= str_replace("g","&#xÅ42;", $quoi);

   $quoi= str_replace("ch","&#xÅ46;", $quoi);

   $quoi= str_replace("lc","&#xÅ63;&#xÅ95;", $quoi);
   $quoi= str_replace("c","&#xÅ45;", $quoi);

   $quoi= str_replace("lj","&#xÅ63;&#xÅ97;", $quoi);
   $quoi= str_replace("rj","&#xÅ62;&#xÅ97;", $quoi);
   $quoi= str_replace("j","&#xÅ47;", $quoi);

   $quoi= str_replace("tsh","&#xÅ5À;", $quoi);

   $quoi= str_replace("rts","&#xÅ62;&#xÅÀ9;", $quoi);
   $quoi= str_replace("sts","&#xÅ66;&#xÅÀ9;", $quoi);
   $quoi= str_replace("ts","&#xÅ59;", $quoi);

   $quoi= str_replace("rdz","&#xÅ62;&#xÅÀÁ;", $quoi);
   $quoi= str_replace("dzr","&#xÅ5Á;&#xÅÁ2;", $quoi);
   $quoi= str_replace("dz","&#xÅ5Á;", $quoi);

   $quoi= str_replace("rny","&#xÅ62;&#xÅ99;", $quoi);
   $quoi= str_replace("sny","&#xÅ66;&#xÅ99;", $quoi);
   $quoi= str_replace("ny","&#xÅ49;", $quoi);

   $quoi= str_replace("rth","&#xÅ62;&#xÅÀ0;", $quoi);
   $quoi= str_replace("sth","&#xÅ66;&#xÅÀ0;", $quoi);
   $quoi= str_replace("th","&#xÅ50;", $quoi);

   $quoi= str_replace("str","&#xÅ66;&#xÅ9Å;&#xÅÁ2;", $quoi);
   $quoi= str_replace("sty","&#xÅ66;&#xÅ9Å;&#xÅÁ1;", $quoi);
   $quoi= str_replace("rty","&#xÅ62;&#xÅ9Å;&#xÅÁ1;", $quoi);
   $quoi= str_replace("st","&#xÅ66;&#xÅ9Å;", $quoi);
   $quoi= str_replace("rt","&#xÅ62;&#xÅ9Å;", $quoi);
   $quoi= str_replace("lt","&#xÅ63;&#xÅ9Å;", $quoi);
   $quoi= str_replace("ty","&#xÅ4Å;&#xÅÁ1;", $quoi);
   $quoi= str_replace("tv","&#xÅ4Å;&#xÅÀÃ;", $quoi);
   $quoi= str_replace("tw","&#xÅ4Å;&#xÅÀÃ;", $quoi);
   $quoi= str_replace("tr","&#xÅ4Å;&#xÅÁ2;", $quoi);
   $quoi= str_replace("t","&#xÅ4Å;", $quoi);

   $quoi= str_replace("T","&#xÅ4À;", $quoi);

   $quoi= str_replace("sd","&#xÅ66;&#xÅÀ1;", $quoi);
   $quoi= str_replace("rd","&#xÅ62;&#xÅÀ1;", $quoi);
   $quoi= str_replace("ld","&#xÅ63;&#xÅÀ1;", $quoi);
   $quoi= str_replace("dy","&#xÅ51;&#xÅÁ1;", $quoi);
   $quoi= str_replace("dv","&#xÅ51;&#xÅÀÃ;", $quoi);
   $quoi= str_replace("dw","&#xÅ51;&#xÅÀÃ;", $quoi);
   $quoi= str_replace("dr","&#xÅ51;&#xÅÁ2;", $quoi);
   $quoi= str_replace("d","&#xÅ51;", $quoi);

   $quoi= str_replace("D","&#xÅ4Â;", $quoi);

   $quoi= str_replace("sn","&#xÅ66;&#xÅÀ3;", $quoi);
   $quoi= str_replace("rn","&#xÅ62;&#xÅÀ3;", $quoi);
   $quoi= str_replace("n","&#xÅ53;", $quoi);

   $quoi= str_replace("N","&#xÅ4Ä;", $quoi);

   $quoi= str_replace("phy","&#xÅ55;&#xÅÁ1;", $quoi);
   $quoi= str_replace("phr","&#xÅ55;&#xÅÁ2;", $quoi);
   $quoi= str_replace("ph","&#xÅ55;", $quoi);

   $quoi= str_replace("spr","&#xÅ66;&#xÅÀ4;&#xÅÁ2;", $quoi);
   $quoi= str_replace("spy","&#xÅ66;&#xÅÀ4;&#xÅÁ1;", $quoi);
   $quoi= str_replace("sp","&#xÅ66;&#xÅÀ4;", $quoi);
   $quoi= str_replace("rp","&#xÅ62;&#xÅÀ4;", $quoi);
   $quoi= str_replace("lp","&#xÅ63;&#xÅÀ4;", $quoi);
   $quoi= str_replace("py","&#xÅ54;&#xÅÁ1;", $quoi);
   $quoi= str_replace("pr","&#xÅ54;&#xÅÁ2;", $quoi);
   $quoi= str_replace("p","&#xÅ54;", $quoi);

   $quoi= str_replace("brl","&#xÅ56;&#xÅ62;&#xÅÁ3;", $quoi);
   $quoi= str_replace("sbr","&#xÅ66;&#xÅÀ6;&#xÅÁ2;", $quoi);
   $quoi= str_replace("sby","&#xÅ66;&#xÅÀ6;&#xÅÁ1;", $quoi);
   $quoi= str_replace("rby","&#xÅ62;&#xÅÀ6;&#xÅÁ1;", $quoi);
   $quoi= str_replace("sb","&#xÅ66;&#xÅÀ6;", $quoi);
   $quoi= str_replace("rb","&#xÅ62;&#xÅÀ6;", $quoi);
   $quoi= str_replace("lb","&#xÅ63;&#xÅÀ6;", $quoi);
   $quoi= str_replace("by","&#xÅ56;&#xÅÁ1;", $quoi);
   $quoi= str_replace("br","&#xÅ56;&#xÅÁ2;", $quoi);
   $quoi= str_replace("bl","&#xÅ56;&#xÅÁ3;", $quoi);
   $quoi= str_replace("b","&#xÅ56;", $quoi);

   $quoi= str_replace("smr","&#xÅ66;&#xÅÀ8;&#xÅÁ2;", $quoi);
   $quoi= str_replace("sm","&#xÅ66;&#xÅÀ8;", $quoi);
   $quoi= str_replace("rm","&#xÅ62;&#xÅÀ8;", $quoi);
   $quoi= str_replace("my","&#xÅ58;&#xÅÁ1;", $quoi);
   $quoi= str_replace("mr","&#xÅ58;&#xÅÁ2;", $quoi);
   $quoi= str_replace("m","&#xÅ58;", $quoi);

   $quoi= str_replace("M","&#xÅ7Ä;", $quoi);
   $quoi= str_replace("~M","&#xÅ83;", $quoi);

   $quoi= str_replace("'","&#xÅ60;", $quoi);

   $quoi= str_replace("w","&#xÅ5Ã;", $quoi);

   $quoi= str_replace("zh","&#xÅ5Ä;", $quoi);

   $quoi= str_replace("zl","&#xÅ5Å;&#xÅÁ3;", $quoi);
   $quoi= str_replace("z","&#xÅ5Å;", $quoi);

   $quoi= str_replace("shr","&#xÅ64;&#xÅÁ2;", $quoi);
   $quoi= str_replace("sh","&#xÅ64;", $quoi);

   $quoi= str_replace("Sh","&#xÅ65;", $quoi);

   $quoi= str_replace("sy","&#xÅ66;&#xÅÁ1;", $quoi);
   $quoi= str_replace("sr","&#xÅ66;&#xÅÁ2;", $quoi);
   $quoi= str_replace("sl","&#xÅ66;&#xÅÁ3;", $quoi);
   $quoi= str_replace("s","&#xÅ66;", $quoi);

   $quoi= str_replace("rl","&#xÅ62;&#xÅÁ3;", $quoi);
   $quoi= str_replace("ly","&#xÅ63;&#xÅÁ1;", $quoi);
   $quoi= str_replace("lh","&#xÅ63;&#xÅÁ7;", $quoi);
   $quoi= str_replace("l","&#xÅ63;", $quoi);

   $quoi= str_replace("h","&#xÅ67;", $quoi);

   $quoi= str_replace("H","&#xÅ7Å;", $quoi);

   $quoi= str_replace("ry","&#xÅ62;&#xÅÁ1;", $quoi);
   $quoi= str_replace("r","&#xÅ62;", $quoi);

   $quoi= str_replace(".y","&#xÅ61;", $quoi);
   $quoi= str_replace("y","&#xÅ61;", $quoi);


   $quoi= str_replace("A","&#xÅ71;", $quoi);
   $quoi= str_replace("ai","&#xÅ7Á;", $quoi);
   $quoi= str_replace("au","&#xÅ7Ã;", $quoi);
   $quoi= str_replace("-i","&#xÅ80;", $quoi);
   $quoi= str_replace("-I","&#xÅ81;", $quoi);
   $quoi= str_replace("i","&#xÅ72;", $quoi);
   $quoi= str_replace("I","&#xÅ73;", $quoi);
   $quoi= str_replace("u","&#xÅ74;", $quoi);
   $quoi= str_replace("U","&#xÅ75;", $quoi);
   $quoi= str_replace("e","&#xÅ7À;", $quoi);
   $quoi= str_replace("o","&#xÅ7Â;", $quoi);
   $quoi= str_replace("a","", $quoi);
   
   $quoi= str_replace(" ","&#xf0b;", $quoi);
   $quoi= str_replace("/&#xf0b;","/ ", $quoi);
   $quoi= str_replace("/","།", $quoi);

   
   $quoi= str_replace("À","a", $quoi);
   $quoi= str_replace("Á","b", $quoi);
   $quoi= str_replace("Â","c", $quoi);
   $quoi= str_replace("Ã","d", $quoi);
   $quoi= str_replace("Ä","e", $quoi);
   $quoi= str_replace("Å","f", $quoi);
   
   $quoi= str_replace("ཱརྱ","ཨཱརྱ", $quoi);
   
}



function unicode (&$quoi){
	$quoi=" ".$quoi;
   $quoi= str_replace("+v","ྭ", $quoi);
   $quoi= str_replace("+w","ྭ", $quoi);

   $quoi= str_replace("+tsh","ྪ", $quoi);
   $quoi= str_replace("+dz+h","ྫྷ", $quoi);

   $quoi= str_replace("+kh","ྑ", $quoi);
   $quoi= str_replace("+g+h","ྒྷ", $quoi);
   $quoi= str_replace("+ng","ྔ", $quoi);
   $quoi= str_replace("+ch","ྖ", $quoi);
   $quoi= str_replace("+ny","ྙ", $quoi);
   $quoi= str_replace("+Th","ྛ", $quoi);
   $quoi= str_replace("+Dh","ྜྷ", $quoi);
   $quoi= str_replace("+th","ྠ", $quoi);
   $quoi= str_replace("+dh","ྡྷ", $quoi);
   $quoi= str_replace("+ph","ྥ", $quoi);
   $quoi= str_replace("+bh","ྦྷ", $quoi);
   $quoi= str_replace("+ts","ྩ", $quoi);
   $quoi= str_replace("+dz","ྫ", $quoi);
   $quoi= str_replace("+zh","ྮ", $quoi);
   $quoi= str_replace("+sh","ྴ", $quoi);
   $quoi= str_replace("+Sh","ྵ", $quoi);

   $quoi= str_replace("+k","ྐ", $quoi);
   $quoi= str_replace("+g","ྒ", $quoi);
   $quoi= str_replace("+c","ྕ", $quoi);
   $quoi= str_replace("+j","ྗ", $quoi);
   $quoi= str_replace("+T","ྚ", $quoi);
   $quoi= str_replace("+D","ྜ", $quoi);
   $quoi= str_replace("+N","ྞ", $quoi);
   $quoi= str_replace("+t","ྟ", $quoi);
   $quoi= str_replace("+d","ྡ", $quoi);
   $quoi= str_replace("+n","ྣ", $quoi);
   $quoi= str_replace("+p","ྤ", $quoi);
   $quoi= str_replace("+b","ྦ", $quoi);
   $quoi= str_replace("+m","ྨ", $quoi);
   $quoi= str_replace("+z","ྯ", $quoi);
   $quoi= str_replace("+y","ྱ", $quoi);
   $quoi= str_replace("+r","ྲ", $quoi);
   $quoi= str_replace("+l","ླ", $quoi);
   $quoi= str_replace("+s","ྶ", $quoi);
   $quoi= str_replace("+h","ྷ", $quoi);
   $quoi= str_replace("+Y","ྻ", $quoi);
   $quoi= str_replace("+R","ྼ;", $quoi);

   $quoi= str_replace("tshw","ཚྭ", $quoi);

   $quoi= str_replace("khy","ཁྱ", $quoi);
   $quoi= str_replace("khr","ཁྲ", $quoi);
   $quoi= str_replace("khw","ཁྭ", $quoi);
   $quoi= str_replace("skr","སྐྲ", $quoi);
   $quoi= str_replace("sky","སྐྱ", $quoi);
   $quoi= str_replace("rky","རྐྱ", $quoi);
   $quoi= str_replace("sng","སྔ", $quoi);
   $quoi= str_replace("rng","རྔ", $quoi);
   $quoi= str_replace("lng","ལྔ", $quoi);
   $quoi= str_replace("ngw","ཉྭ", $quoi);
   $quoi= str_replace("sgr","སྒྲ", $quoi);
   $quoi= str_replace("sgy","སྒྱ", $quoi);
   $quoi= str_replace("rgy","རྒྱ", $quoi);
   $quoi= str_replace("tsh","ཚ", $quoi);
   $quoi= str_replace("rts","རྩ", $quoi);
   $quoi= str_replace("sts","སྩ", $quoi);
   $quoi= str_replace("rdz","རྫ", $quoi);
   $quoi= str_replace("dzr","ཛྲ", $quoi);
   $quoi= str_replace("rny","རྙ", $quoi);
   $quoi= str_replace("sny","སྙ", $quoi);
   $quoi= str_replace("rth","རྠ", $quoi);
   $quoi= str_replace("sth","སྠ", $quoi);
   $quoi= str_replace("str","སྟྲ", $quoi);
   $quoi= str_replace("sty","སྟྱ", $quoi);
   $quoi= str_replace("rty","རྟྱ", $quoi);
   $quoi= str_replace("phy","ཕྱ", $quoi);
   $quoi= str_replace("phr","ཕྲ", $quoi);
   $quoi= str_replace("spr","སྤྲ", $quoi);
   $quoi= str_replace("spy","སྤྱ", $quoi);
   $quoi= str_replace("brl","བརླ", $quoi);
   $quoi= str_replace("sbr","སྦྲ", $quoi);
   $quoi= str_replace("sby","སྦྱ", $quoi);
   $quoi= str_replace("rby","རྦྱ", $quoi);
   $quoi= str_replace("smr","སྨྲ", $quoi);
   $quoi= str_replace("smy","སྨྱ", $quoi);
   $quoi= str_replace("rmy","རྨྱ", $quoi);
   $quoi= str_replace("zhw","ཞྭ", $quoi);
   $quoi= str_replace("shr","ཤྲ", $quoi);
   $quoi= str_replace("shw","ཤྭ", $quoi);
   $quoi= str_replace("tsw","ཙྭ", $quoi);
 

   $quoi= str_replace("kh","ཁ", $quoi);
   $quoi= str_replace("rk","རྐ", $quoi);
   $quoi= str_replace("sk","སྐ", $quoi);
   $quoi= str_replace("lk","ལྐ", $quoi);
   $quoi= str_replace("ky","ཀྱ", $quoi);
   $quoi= str_replace("kr","ཀྲ", $quoi);
   $quoi= str_replace("kl","ཀླ", $quoi);
   $quoi= str_replace("kw","ཀྭ", $quoi);
   $quoi= str_replace("ng","ང", $quoi);
   $quoi= str_replace("rg","རྒ", $quoi);
   $quoi= str_replace("sg","སྒ", $quoi);
   $quoi= str_replace("lg","ལྒ", $quoi);
   $quoi= str_replace("gy","གྱ", $quoi);
   $quoi= str_replace("gr","གྲ", $quoi);
   $quoi= str_replace("gl","གླ", $quoi);
   $quoi= str_replace("gw","གྭ", $quoi);
   $quoi= str_replace("ch","ཆ", $quoi);
   $quoi= str_replace("lc","ལྕ", $quoi);
   $quoi= str_replace("lj","ལྗ", $quoi);
   $quoi= str_replace("rj","རྗ", $quoi);
   $quoi= str_replace("ts","ཙ", $quoi);
   $quoi= str_replace("dz","ཛ", $quoi);
   $quoi= str_replace("ny","ཉ", $quoi);
   $quoi= str_replace("Th","ཋ", $quoi);
   $quoi= str_replace("th","ཐ", $quoi);
   $quoi= str_replace("st","སྟ", $quoi);
   $quoi= str_replace("rt","རྟ", $quoi);
   $quoi= str_replace("lt","ལྟ", $quoi);
   $quoi= str_replace("ty","ཏྱ", $quoi);
   $quoi= str_replace("tv","ཏྭ", $quoi);
   $quoi= str_replace("tw","ཏྭ", $quoi);
   $quoi= str_replace("tr","ཏྲ", $quoi);
   $quoi= str_replace("sd","སྡ", $quoi);
   $quoi= str_replace("rd","རྡ", $quoi);
   $quoi= str_replace("ld","ལྡ", $quoi);
   $quoi= str_replace("dy","དྱ", $quoi);
   $quoi= str_replace("dv","དྭ", $quoi);
   $quoi= str_replace("dw","དྭ", $quoi);
   $quoi= str_replace("dr","དྲ", $quoi);
   $quoi= str_replace("sn","སྣ", $quoi);
   $quoi= str_replace("rn","རྣ", $quoi);
   $quoi= str_replace("ph","ཕ", $quoi);
   $quoi= str_replace("sp","སྤ", $quoi);
   $quoi= str_replace("rp","རྤ", $quoi);
   $quoi= str_replace("lp","ལྤ", $quoi);
   $quoi= str_replace("py","པྱ", $quoi);
   $quoi= str_replace("pr","པྲ", $quoi);
   $quoi= str_replace("sb","སྦ", $quoi);
   $quoi= str_replace("rb","རྦ", $quoi);
   $quoi= str_replace("lb","ལྦ", $quoi);
   $quoi= str_replace("by","བྱ", $quoi);
   $quoi= str_replace("br","བྲ", $quoi);
   $quoi= str_replace("bl","བླ", $quoi);
   $quoi= str_replace("sm","སྨ", $quoi);
   $quoi= str_replace("rm","རྨ", $quoi);
   $quoi= str_replace("my","མྱ", $quoi);
   $quoi= str_replace("mr","མྲ", $quoi);
   $quoi= str_replace("zh","ཞ", $quoi);
   $quoi= str_replace("zl","ཟླ", $quoi);
   $quoi= str_replace("zw","ཟྭ", $quoi);
   $quoi= str_replace("sh","ཤ", $quoi);
   $quoi= str_replace("Sh","ཥ", $quoi);
   $quoi= str_replace("sy","སྱ", $quoi);
   $quoi= str_replace("sr","སྲ", $quoi);
   $quoi= str_replace("sl","སླ", $quoi);
   $quoi= str_replace("sw","སྭ", $quoi);
   $quoi= str_replace("rl","རླ", $quoi);
   $quoi= str_replace("rw","རྭ", $quoi);
   $quoi= str_replace("ly","ལྱ", $quoi);
   $quoi= str_replace("lh","ལྷ", $quoi);
   $quoi= str_replace("lw","ལྭ", $quoi);
   $quoi= str_replace("ry","རྱ", $quoi);
   $quoi= str_replace("hr","ཧྲ", $quoi);
   $quoi= str_replace("hw","ཧྭ", $quoi);


   $quoi= str_replace("k","ཀ", $quoi);
   $quoi= str_replace("g","ག", $quoi);
   $quoi= str_replace("c","ཅ", $quoi);
   $quoi= str_replace("j","ཇ", $quoi);
   $quoi= str_replace("t","ཏ", $quoi);
   $quoi= str_replace("T","ཊ", $quoi);
   $quoi= str_replace("d","ད", $quoi);
   $quoi= str_replace("D","ཌ", $quoi);
   $quoi= str_replace("n","ན", $quoi);
   $quoi= str_replace("N","ཎ", $quoi);
   $quoi= str_replace("p","པ", $quoi);
   $quoi= str_replace("b","བ", $quoi);
   $quoi= str_replace("m","མ", $quoi);
   $quoi= str_replace("'","འ", $quoi);
   $quoi= str_replace("w","ཝ", $quoi);
   $quoi= str_replace("z","ཟ", $quoi);
   $quoi= str_replace("s","ས", $quoi);
   $quoi= str_replace("l","ལ", $quoi);
   $quoi= str_replace("h","ཧ", $quoi);
   $quoi= str_replace("H","ཿ", $quoi);
   $quoi= str_replace("r","ར", $quoi);
   $quoi= str_replace("R","ཪ", $quoi);


   $quoi= str_replace("M","ཾ", $quoi);
   $quoi= str_replace("~M","ྂ", $quoi);


   $quoi= str_replace(".y","ཡ", $quoi);
   $quoi= str_replace("y","ཡ", $quoi);


   $quoi= str_replace(" A"," ཨཱ", $quoi);
   $quoi= str_replace("A","ཱ", $quoi);
   $quoi= str_replace(" ai"," ཨཻ", $quoi);
   $quoi= str_replace("ai","ཻ", $quoi);
   $quoi= str_replace(" au"," ཨཽ", $quoi);
   $quoi= str_replace("au","ཽ", $quoi);
   $quoi= str_replace("-i","ྀ", $quoi);
   $quoi= str_replace("-I","ཱྀ", $quoi);
   $quoi= str_replace(" i"," ཨི", $quoi);
   $quoi= str_replace("i","ི", $quoi);
   $quoi= str_replace(" I"," ཨཱི", $quoi);
   $quoi= str_replace("I","ཱི", $quoi);
   $quoi= str_replace(" u"," ཨུ", $quoi);
   $quoi= str_replace("u","ུ", $quoi);
   $quoi= str_replace(" U"," ཨཱུ", $quoi);
   $quoi= str_replace("U","ཱུ", $quoi);
   $quoi= str_replace(" E"," ཨཱེ", $quoi);
   $quoi= str_replace(" e"," ཨེ", $quoi);
   $quoi= str_replace("e","ེ", $quoi);
   $quoi= str_replace(" o"," ཨོ", $quoi);
   $quoi= str_replace("o","ོ", $quoi);
   $quoi= str_replace("O","ཱོ", $quoi);
   $quoi= str_replace(" a"," ཨ", $quoi);
   $quoi= str_replace("a","", $quoi);
   
   $quoi= str_replace("  "," ", $quoi);
   $quoi= str_replace(" ","་", $quoi);
   $quoi= str_replace("/་","/ ", $quoi);
   $quoi= str_replace("/","།", $quoi);

   $quoi= str_replace("ཱརྱ","ཨཱརྱ", $quoi);
   $quoi= str_replace("ཱ་རྱ","ཨཱ་རྱ", $quoi);
   $quoi= str_replace("་་","་", $quoi);
   $quoi= str_replace("ཨཨཱ","ཨཱ", $quoi);
   $quoi= str_replace("_"," ", $quoi);
    $quoi= str_replace("0f85","྅", $quoi);
  
   $quoi=substr($quoi,3);
  
   
}


function devanagari (&$quoi){
	   $quoi= str_replace("kh","ख", $quoi);
	   $quoi= str_replace("gh","घ", $quoi);
	   $quoi= str_replace("ch","छ", $quoi);
	   $quoi= str_replace("jh","झ", $quoi);
	   $quoi= str_replace("ṭh","ठ", $quoi);
	   $quoi= str_replace("ḍh","ढ", $quoi);
	   $quoi= str_replace("th","थ", $quoi);
	   $quoi= str_replace("dh","ध", $quoi);
	   $quoi= str_replace("ph","फ", $quoi);
	   $quoi= str_replace("bh","भ", $quoi);

	   $quoi= str_replace("k","क", $quoi);
	   $quoi= str_replace("g","ग", $quoi);
	   $quoi= str_replace("ṅ","ङ", $quoi);
	   $quoi= str_replace("c","च", $quoi);
	   $quoi= str_replace("j","ज", $quoi);
	   $quoi= str_replace("ñ","ञ", $quoi);
	   $quoi= str_replace("ṭ","ट", $quoi);
	   $quoi= str_replace("ḍ","ड", $quoi);
	   $quoi= str_replace("ṇ","ण", $quoi);
	   $quoi= str_replace("t","त", $quoi);
	   $quoi= str_replace("d","द", $quoi);
	   $quoi= str_replace("n","न", $quoi);
	   $quoi= str_replace("p","प", $quoi);
	   $quoi= str_replace("b","ब", $quoi);
	   $quoi= str_replace("m","म", $quoi);
	   $quoi= str_replace("y","य", $quoi);
	   $quoi= str_replace("r","र", $quoi);
	   $quoi= str_replace("l","ल", $quoi);
	   $quoi= str_replace("v","व", $quoi);
	   $quoi= str_replace("ś","श", $quoi);
	   $quoi= str_replace("ṣ","ष", $quoi);
	   $quoi= str_replace("s","स", $quoi);
	   $quoi= str_replace("h","ह", $quoi);
	   
	   $quoi= str_replace("ai","ऐ", $quoi);
	   $quoi= str_replace("au","औ", $quoi);
	   $quoi= str_replace("a","अ", $quoi);
	   $quoi= str_replace("ā","आ", $quoi);
	   $quoi= str_replace("i","इ", $quoi);
	   $quoi= str_replace("ī","ई", $quoi);
	   $quoi= str_replace("u","उ", $quoi);
	   $quoi= str_replace("ū","ऊ", $quoi);
	   $quoi= str_replace("e","ए", $quoi);
	   $quoi= str_replace("o","ओ", $quoi);
	   $quoi= str_replace("ṛ","ऋ", $quoi);
	   $quoi= str_replace("ṝ","ॠ", $quoi);
	   $quoi= str_replace("ḷ","ऌ", $quoi);
	   $quoi= str_replace("ḹ","ॡ", $quoi);
	   $quoi= str_replace("ṃ","ं", $quoi);
	   $quoi= str_replace("ḥ","ः", $quoi);
	   
}
?>
