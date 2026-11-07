<?php
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
                $ret .= (!empty($k['i'])?'<span style="color:red;">'.implode(' ',$k['i']).'</span> ':'');
            }else{
                $ret .= $k . ' ';
            }
        }
        return $ret;
    }
 
}


$newo="kha zer bar byed pa'i skabs de dge slong rnams kyis bcom ldan 'das la gsol pa dang";
$oldo="kha zer ba byed pa'i skabs/ de dgi slong rnams kyi bcoms ldan pa 'das la gsol pa dang";

echo $newo.'<br>';
echo Diff::htmlDiff($newo,$oldo);


?>