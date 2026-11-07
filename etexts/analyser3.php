<html>
<head>
<style>
.table, .td, .th {
  border: 1px solid;
}

.table {
  width: 100%;
  border-collapse: collapse;
}
.th, .td {
  padding: 15px;
  text-align: justify;
}</style>
</head>
<body>
<?php

$txt1=$_POST['txt1'];
$txt2=$_POST['txt2'];
$text1=$_POST['text1'];
$text2=$_POST['text2'];

class Diff {
 
    public static function diffArray($old, $new){
        $matrix = array();
        $maxlen = 0;
        foreach($old as $oindex => $ovalue){
            $nkeys = array_keys($new, $ovalue);
            foreach($nkeys as $nindex){
                $matrix[$oindex][$nindex] = isset($matrix[$oindex - 1][$nindex - 1]) ? $matrix[$oindex - 1][$nindex - 1] + 1 : 1;
                if($matrix[$oindex][$nindex] > $maxlen){
                    $maxlen = $matrix[$oindex][$nindex];
                    $omax = $oindex + 1 - $maxlen;
                    $nmax = $nindex + 1 - $maxlen;
                }
            }
        }
        if($maxlen == 0) return array(array('d'=>$old, 'i'=>$new));
        return array_merge(
            self::diffArray(array_slice($old, 0, $omax), array_slice($new, 0, $nmax)),
            array_slice($new, $nmax, $maxlen),
            self::diffArray(array_slice($old, $omax + $maxlen), array_slice($new, $nmax + $maxlen)));
    }
 
    public static function htmlDiff($old, $new){
        $ret = '';
        $diff = self::diffArray(explode(' ', $old), explode(' ', $new));
        foreach($diff as $k){
            if(is_array($k)){
                $ret .= (!empty($k['i'])?'<span style="border: 2px solid red; border-radius: 5px;padding: 2px;background-color:#ff3232;">'.implode(' ',$k['i']).'#/span> ':'');
            }else{
                $ret .= $k . ' ';
            }
        }
        return $ret;
    }
 
}


echo '<table class="table"><tr class="tr"><td class="td"><h1>'.$txt1.'</h1><td class="td"><h1>'.$txt2.'</h1>';
echo '<tr class="tr"><td class="td" valign="top">';
$result=Diff::htmlDiff($text2,$text1);
$result=str_replace("#/span","</span",$result);
echo $result;

echo '<td class="td" valign="top">';
$result=Diff::htmlDiff($text1,$text2);
$result=str_replace("#/span","</span",$result);
echo $result;

echo '</table>';
