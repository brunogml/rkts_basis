<?php
$txt = $_GET['txt'] ?? '';
$col = $_GET['col'] ?? '';

$encoded = str_replace('%20', '+', urlencode(urldecode($txt)));
header("Location: ../rkts1/pages/results2.html?text={$encoded}&collection={$col}&mode=approx&expert=0", true, 301);
exit;
?>













<head>
<style>
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
</head>
<body>
<table><tr><td>
<h1><a href="../index.php" style="text-decoration:none;"><img src="../sub/logo.png" width=100></a>rKTs e-text search</h1>
<td width=100>
<td><i>Initial searches within the etext corpus can take a bit longer, as the system needs to compute results based on how common the search phrase is. <br>However, subsequent searches will be significantly faster due to efficient caching.</i>

<?php

$col=$_GET['col'];
$txt=$_GET['txt'];
$expert=0;
$expert=$_GET['expert'];
include("liencoll.php");

	

echo ' </table>';

echo '<table><tr><td width=50><td><form action="tresults2.php">
<input type="text" name="txt" id="txt" style="width:500px; font-size: 20px;" value="'.$txt.'">

<select id="col" name="col" onchange="this.form.submit();" style="width: 300px; font-size: 20px;">';

echo '<option value="xxx" style="font-weight:bold;text-decoration: underline;">-KANJUR-</option>';
if ($expert==1){
	if ($col=="C") { echo '<option value="C" selected>C Cone Kanjur (OCR)</option>'; } 
	else { echo '<option value="C">C Cone Kanjur (OCR)</option>';	} 
}
if ($col=="D") { echo '<option value="D" selected>D Derge Kanjur (Input)</option>';} 
	else { echo '<option value="D">D Derge Kanjur (Input)</option>';} 
if ($col=="F") { echo '<option value="F" selected>F Phugbrag Kanjur (OCR)</option>'; } 
	else { echo '<option value="F">F Phugbrag Kanjur (OCR)</option>';	} 
if ($expert==1){
	if ($col=="H") { echo '<option value="H" selected>H Lhasa Kanjur (Input)</option>'; } 
	else { echo '<option value="H">H Lhasa Kanjur (Input)</option>';	} 
}
if ($expert==1){
if ($col=="He") { echo '<option value="He" selected>He Hemis I Kanjur (OCR)</option>'; 				} 
	else { echo '<option value="He">He Hemis I Kanjur (OCR)</option>';} 
if ($col=="J") { echo '<option value="J" selected>J Lithang Kanjur (Input)</option>'; 				} 
	else { echo '<option value="J">J Lithang Kanjur (Input)</option>';} 
if ($col=="L") { echo '<option value="L" selected>L London Kanjur (OCR)</option>'; 				} 
	else { echo '<option value="L">L London Kanjur (OCR)</option>';} 
if ($col=="N") { echo '<option value="N" selected>N Narthang Kanjur (OCR)</option>';				} 
	else { echo '<option value="N">N Narthang Kanjur (OCR)</option>';} 
}
if ($expert==1){
if ($col=="Q") { echo '<option value="Q" selected>Q Peking Kanjur (OCR)</option>'; 	} 
	else { echo '<option value="Q">Q Peking Kanjur (OCR)</option>';} 
}
if ($col=="S") { echo '<option value="S" selected>S Stog Kanjur (OCR)</option>'; 	} 
	else { echo '<option value="S">S Stog Kanjur (OCR)</option>';} 
if ($expert==1){
if ($col=="Ts") { echo '<option value="Ts" selected>Ts Tsarang Kanjur (OCR)</option>'; 	} 
	else { echo '<option value="Ts">Ts Tsarang Kanjur (OCR)</option>';} 
if ($col=="Ty") { echo '<option value="Ty" selected>Ty Tashiyangtse Kanjur (OCR)</option>'; 	} 
	else { echo '<option value="Ty">Ty Tashiyangtse Kanjur (OCR)</option>';} 
if ($col=="V") { echo '<option value="V" selected>V Ulaanbaatar Kanjur (OCR)</option>'; 	} 
	else { echo '<option value="V">V Ulaanbaatar Kanjur (OCR)</option>';} 
}


echo '<option value="xxx" style="font-weight:bold;text-decoration: underline;">-CANONICAL COLLECTIONS-</option>';
if ($expert==1){
	if ($col=="Ba") { echo '<option value="Ba" selected>Ba Basgo Fragments (OCR)</option>'; } 
	else { echo '<option value="Ba">Ba Basgo Fragments (OCR)</option>';	} 
	if ($col=="Dm") { echo '<option value="Dm" selected>Dm Drakmar Collection (OCR)</option>'; } 
	else { echo '<option value="Dm">Dm Drakmar Collection (OCR)</option>';	} 
	if ($col=="Go") { echo '<option value="Go" selected>Go Gondhla Collection (OCR)</option>'; } 
	else { echo '<option value="Go">Go Gondhla Collection (OCR)</option>';	} 
}
if ($col=="Ng") { echo '<option value="Ng" selected>Ng Namgyal Collection (OCR)</option>'; 				} 
	else { echo '<option value="Ng">Ng Namgyal Collection (OCR)</option>';} 


echo '<option value="xxx" style="font-weight:bold;text-decoration: underline;">-TANJUR-</option>';
if ($col=="TD") { echo '<option value="TD" selected>D Derge Tanjur (Input)</option>'; 
				$repos="TanjurDerge";
				$liste="volTanjur";
				$det="D";$dett="2";
				$setref="MW23703";
				} 
	else { echo '<option value="TD">D Derge Tanjur (Input)</option>';} 
if ($expert==1){
if ($col=="TG") { echo '<option value="TG" selected>G Golden Tanjur</option>'; 
				$repos="TanjurGolden";
				$liste="volTanjur";
				$det="G";$dett="2";
				$setref="MW23702";
				} 
	else { echo '<option value="TG">G Golden Tanjur (OCR)</option>';} 
}
if ($expert==1){
if ($col=="TN") { echo '<option value="TN" selected>N Narthang Tanjur (Input)</option>'; 
				$repos="TanjurNarthang";
				$liste="volTanjur";
				$det="N";$dett="2";
				$setref="MW22704";
				} 
	else { echo '<option value="TN">N Narthang Tanjur (Input)</option>';} 
}
if ($expert==1){
if ($col=="TQ") { echo '<option value="TQ" selected>Q Peking Tanjur (OCR)</option>'; 
				$repos="TanjurPeking";
				$liste="volTanjur";
				$det="Q";$dett="2";
				$setref="MW1KG13126";
				} 
	else { echo '<option value="TQ">Q Peking Tanjur (Input)</option>';} 
}

echo '<option value="xxx" style="font-weight:bold;text-decoration: underline;">-OLD TANTRA-</option>';
if ($expert==1){
if ($col=="Gaz") { echo '<option value="Gaz" selected>Gaz rnying rgyud bcu bdun (Anzom Chögar) (OCR)</option>'; 	} 
	else { echo '<option value="Gaz">Gaz rnying rgyud bcu bdun (Anzom Chögar) (OCR)</option>';} 
}
if ($expert==1){
if ($col=="Gbr") { echo '<option value="Gbr" selected>Gbr Vairocana rnying rgyud (OCR)</option>'; 		} 
	else { echo '<option value="Gbr">Gbr Vairocana rnying rgyud (OCR)</option>';} 
}
if ($expert==1){
if ($col=="Gdg") { echo '<option value="Gdg" selected>Gdg Derge rnying rgyud (OCR)</option>'; 		} 
	else { echo '<option value="Gdg">Gdg Derge rnying rgyud (OCR)</option>';} 
}
if ($expert==1){
if ($col=="Gkh") { echo '<option value="Gkh" selected>Gkh Khams rnying rgyud (OCR)</option>'; 		} 
	else { echo '<option value="Gkh">Gkh Khams rnying rgyud (OCR)</option>';} 
}
if ($expert==1){
if ($col=="Gkk") { echo '<option value="Gkk" selected>Gkk Khakong rnying rgyud (OCR)</option>'; 		} 
	else { echo '<option value="Gkk">Gkk Khakong rnying rgyud (OCR)</option>';} 
}
if ($expert==1){
if ($col=="Glt") { echo '<option value="Glt" selected>Glt rnying rgyud bcu bdun (Langthang) (OCR)</option>'; 		} 
	else { echo '<option value="Glt">Glt rnying rgyud bcu bdun (Langthang) (OCR)</option>';} 
}
if ($col=="Gpb") { echo '<option value="Gpb" selected>Gpb Paltsek rnying rgyud (OCR)</option>'; 		} 
	else { echo '<option value="Gpb">Gpb Paltsek rnying rgyud (OCR)</option>';} 
if ($expert==1){
if ($col=="Gtb") { echo '<option value="Gtb" selected>Gtb Tsamdrak rnying rgyud (OCR)</option>'; 		} 
	else { echo '<option value="Gtb">Gtb Tsamdrak rnying rgyud (OCR)</option>';} 
}
if ($expert==1){
if ($col=="Gtn") { echo '<option value="Gtn" selected>Gtn Rikdzin Tsewang Norbu rnying rgyud (OCR)</option>'; 		} 
	else { echo '<option value="Gtn">Gtn Rikdzin Tsewang Norbu rnying rgyud (OCR)</option>';} 
}

echo '<option value="xxx" style="font-weight:bold;text-decoration: underline;">-BON CANON-</option>';
if ($col=="Bkz") { echo '<option value="Bkz" selected>Bkz Bon bka\' brten (OCR)</option>'; 
				} 
	else { echo '<option value="Bkz">Bkz Bon bka\' brten (OCR)</option>';} 


echo '</select><td width=50>';
if ($expert==0) {echo '<td>Selective search <input type="radio" id="expert" name="expert" value="0"  onchange="this.form.submit();" checked>';}
else {echo '<td>Selective search <input type="radio" id="expert" name="expert" value="0"  onchange="this.form.submit();">';}
if ($expert==1) {echo '<br>Expert search <input type="radio" id="expert" name="expert" value="1"  onchange="this.form.submit();" checked>';}
else {echo '<br>Expert search <input type="radio" id="expert" name="expert" value="1"  onchange="this.form.submit();">';}
echo '</form><td width=50>';

echo '
<!-- Trigger/Open The Modal -->
<button id="myBtn" style="background-color: white;color: black;border: 2px solid #ffffff;font-size: 30px;">🛈</button>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
<span style="font-size:20px;font-weight:bold;">Selective Search</span> (Recommended for Targeted Queries):<br><br>
This option allows you to search within a curated selection of e-texts from key canonical
collections. These were chosen for their textual quality and their significance in representing
distinct transmission traditions.<br><br>
	• For general searches, we recommend the <u><i>Derge Kanjur</i></u>, a well-maintained e-text
representing the <i>Tshal pa</i> tradition.<br>
	• To explore the <i>Them spangs ma</i> transmission, use the <u><i>Stog Kanjur</i></u>. Please note that
this version is OCR-based and may contain textual errors.<br>
	• For early canonical materials, consult the <u><i>Namgyal collection</i></u>, which predates the
formal Kanjur compilations.<br>
	• The <u><i>Phugbrag Kanjur</i></u> reflects both early and later layers of transmission.<br>
	• E-texts for the <i>Tanjur</i> are based on manual transcription and are generally reliable.<br> 
	• Both <i>Old Tantra</i> and <i>Bon Canon</i> are OCR-based.<br><br>
For best results, use short and distinctive phrases in your search.
<br><hr><br>
<span style="font-size:20px;font-weight:bold;">Expert Search</span> (Full Corpus Access):<br><br>
This mode provides access to all available e-texts across various canonical collections.
<br><br>
Please note that the quality of texts varies: 
<br>•    Input: Manually entered and reviewed texts (highest quality)
<br>•    OCR+: Machine-generated texts with multiple proofreading steps
<br>•    OCR: Raw OCR output without further verification
<br><br>
A search yielding no results in one collection does not necessarily mean the phrase is absent from the actual source.
<br>Use short and distinctive phrases to improve search accuracy, and consider checking better-curated e-texts via the Selective Search option.  </div>
</div>
';
/*
echo '<tr><td><td><a href="tserults2u.php?txt='.$txt.'&col='.$col.'&expert='.$expert.'" style="font-size:25px; text-decoration:none;">བོད་ཡིག</a>';
*/
echo '<td><td><a href="tresults.php?col='.$col.'&txt='.$txt.'&expert='.$expert.'"><button type="button">exact matches</button></a>';
echo '</table>';
echo '<p style=margin:25px;">';

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db12;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
/**
 * Approximate ordered word-set search in a Tibetan/Mongolian manuscript file.
 * Words must appear IN ORDER with at most $maxGap words between consecutive search words.
 * Section label (e.g. rgyud) is captured from the line header for display.
 */
function findApproxCrossLine(
    string $filePath,
    string $search,
    int    $contextLen,
    int    $maxGap
): array {

    // ── 1. Parse segments ─────────────────────────────────────────────────────
    $raw   = file_get_contents($filePath);
    $lines = explode("\n", str_replace("\r\n", "\n", $raw));
    unset($raw);

    $segments = [];
    foreach ($lines as $lineNum => $line) {
        if (preg_match('/^(\S+)\(([^)]+)\):\s*(.*)$/', $line, $m))
            $segments[] = ['ref' => $m[1], 'section' => $m[2], 'fileline' => $lineNum + 1, 'content' => $m[3]];
    }
    unset($lines);
    $numSegs = count($segments);

    // ── 2. Build plain string + O(S) index structures ─────────────────────────
    $plain    = '';
    $segStart = [];   // $segStart[i] = plain offset where segment i begins
    $segEnd   = [];   // $segEnd[i]   = plain offset where segment i content ends
    $breakPos = [];   // $breakPos[offset] = next segment ref  (only boundary spaces)

    foreach ($segments as $si => $seg) {
        $segStart[$si] = strlen($plain);
        $plain        .= $seg['content'];
        $segEnd[$si]   = strlen($plain);
        if (isset($segments[$si + 1])) {
            $breakPos[strlen($plain)] = $segments[$si + 1]['ref'];
            $plain .= ' ';
        }
    }
    $plainLen = strlen($plain);

    // Binary search: which segment owns plain-string offset $pos?
    $segmentAt = static function (int $pos) use ($segStart, $numSegs): int {
        $lo = 0; $hi = $numSegs - 1;
        while ($lo < $hi) {
            $mid = ($lo + $hi + 1) >> 1;
            $segStart[$mid] <= $pos ? $lo = $mid : $hi = $mid - 1;
        }
        return $lo;
    };

    // ── 3. Gap counting — NO precomputed token array ──────────────────────────
    // Count words between two plain-string positions by scanning the substring.
    // The gap is always within a 2-segment window (~200–400 chars), so this is
    // fast and uses negligible memory vs. a 57MB precomputed token structure.
    $wordsBetween = static function (int $prevEnd, int $nextStart) use ($plain): int {
        if ($nextStart <= $prevEnd) return 0;
        return preg_match_all('/\S+/', substr($plain, $prevEnd, $nextStart - $prevEnd));
    };

    // ── 4. Find whole-word occurrences of each search word ───────────────────
    $searchWords = array_values(array_filter(preg_split('/\s+/', trim($search))));
    $numWords    = count($searchWords);
    if ($numWords === 0) return [];

    // EWTS word boundaries: not adjacent to letter/digit/+/'/- (handles stacked consonants)
    $WBL = '(?<![a-zA-Z0-9+\'\-])';
    $WBR = '(?![a-zA-Z0-9+\'\-])';

    // Parallel sorted arrays per search word: positions and end-offsets
    $oStarts = [];
    $oEnds   = [];
    foreach ($searchWords as $wi => $sw) {
        $pat = '/' . $WBL . preg_quote($sw, '/') . $WBR . '/';
        preg_match_all($pat, $plain, $om, PREG_OFFSET_CAPTURE);
        $oStarts[$wi] = [];
        $oEnds[$wi]   = [];
        foreach ($om[0] as [$hit, $pos]) {
            $oStarts[$wi][] = $pos;
            $oEnds[$wi][]   = $pos + strlen($hit);
        }
        unset($om);
    }

    // Binary search: first index in $oStarts[$wi] with value >= $minPos
    $firstFrom = static function (int $wi, int $minPos) use ($oStarts): int {
        $arr = $oStarts[$wi];
        $lo = 0; $hi = count($arr);
        while ($lo < $hi) {
            $mid = ($lo + $hi) >> 1;
            $arr[$mid] < $minPos ? $lo = $mid + 1 : $hi = $mid;
        }
        return $lo;
    };

    // ── 5. Window-bounded recursive search ───────────────────────────────────
    // For each occurrence of word[0] at segment $si0, the entire match must fit
    // within segments $si0 and $si0+1. We pass $winEnd as the upper bound,
    // so inner calls only scan occurrences within that window.
    $results = [];
    $idx     = 0;

    $recurse = null;
    $recurse = static function (
        int   $wi,
        int   $prevEnd,
        int   $winEnd,
        array &$positions     // reused array, no copies — positions[wi] = [start, end]
    ) use (
        &$recurse, &$results, &$idx,
        $numWords, $oStarts, $oEnds,
        $wordsBetween, $maxGap, $firstFrom,
        $segmentAt, $segments, $plainLen, $contextLen
    ): void {

        $cnt  = count($oStarts[$wi]);
        $from = $firstFrom($wi, $prevEnd);

        for ($oi = $from; $oi < $cnt; $oi++) {
            $pos = $oStarts[$wi][$oi];
            if ($pos >= $winEnd) break;

            if ($wordsBetween($prevEnd, $pos) > $maxGap) continue;

            $end = $oEnds[$wi][$oi];
            $positions[$wi] = [$pos, $end];

            if ($wi + 1 === $numWords) {
                $firstPos = $positions[0][0];
                $lastEnd  = $end;
                $startSI  = $segmentAt($firstPos);
                $endSI    = $segmentAt(max(0, $lastEnd - 1));

                $results[] = [
                    'occurrence' => ++$idx,
                    'split'      => ($startSI !== $endSI),
                    'start_ref'  => $segments[$startSI]['ref'],
                    'start_line' => $segments[$startSI]['fileline'],
                    'end_ref'    => $segments[$endSI]['ref'],
                    'end_line'   => $segments[$endSI]['fileline'],
                    'section'    => $segments[$startSI]['section'],
                    '_positions' => $positions,          // snapshot for rendering
                    '_firstPos'  => $firstPos,
                    '_lastEnd'   => $lastEnd,
                    '_bFrom'     => max(0, $firstPos - $contextLen),
                    '_aTo'       => min($plainLen, $lastEnd + $contextLen),
                ];
            } else {
                $recurse($wi + 1, $end, $winEnd, $positions);
            }
        }
    };

    $cnt0 = count($oStarts[0]);
    for ($oi = 0; $oi < $cnt0; $oi++) {
        $pos = $oStarts[0][$oi];
        $end = $oEnds[0][$oi];
        $si0 = $segmentAt($pos);
        $winEnd = ($si0 + 1 < $numSegs)
            ? $segEnd[$si0 + 1] + 1
            : $segEnd[$si0] + 1;

        $positions = [0 => [$pos, $end]];

        if ($numWords === 1) {
            $startSI = $si0;
            $results[] = [
                'occurrence' => ++$idx,
                'split'      => false,
                'start_ref'  => $segments[$si0]['ref'],
                'start_line' => $segments[$si0]['fileline'],
                'end_ref'    => $segments[$si0]['ref'],
                'end_line'   => $segments[$si0]['fileline'],
                'section'    => $segments[$si0]['section'],
                '_positions' => $positions,
                '_firstPos'  => $pos,
                '_lastEnd'   => $end,
                '_bFrom'     => max(0, $pos - $contextLen),
                '_aTo'       => min($plainLen, $end + $contextLen),
            ];
        } else {
            $recurse(1, $end, $winEnd, $positions);
        }
    }

    // ── 6. Render HTML ────────────────────────────────────────────────────────
    $renderRange = static function (int $from, int $to, array $positions) use ($plain, $breakPos): string {
        $events = [];
        foreach ($breakPos as $bpos => $ref) {
            if ($bpos >= $from && $bpos < $to)
                $events[] = ['pos' => $bpos, 'ord' => 1, 'type' => 'lb',    'ref' => $ref];
        }
        foreach ($positions as [$wpos, $wend]) {
            if ($wpos >= $from && $wpos < $to)
                $events[] = ['pos' => $wpos, 'ord' => 2, 'type' => 'open',  'ref' => null];
            if ($wend > $from && $wend <= $to)
                $events[] = ['pos' => $wend, 'ord' => 0, 'type' => 'close', 'ref' => null];
        }
        usort($events, static fn($a, $b) => $a['pos'] <=> $b['pos'] ?: $a['ord'] <=> $b['ord']);

        $out = ''; $cur = $from;
        foreach ($events as $ev) {
            if ($ev['pos'] > $cur)
                $out .= htmlspecialchars(substr($plain, $cur, $ev['pos'] - $cur), ENT_QUOTES, 'UTF-8');
            $cur = $ev['pos'];
            switch ($ev['type']) {
                case 'lb':
                    $out .= '<sub style="color:gray"> '
                          . htmlspecialchars($ev['ref'], ENT_QUOTES, 'UTF-8') . ' </sub>';
                    $cur++;   // consume the boundary space character
                    break;
                case 'open':  $out .= '<span style="color:red;font-weight:bold">'; break;
                case 'close': $out .= '</span>'; break;
            }
        }
        if ($cur < $to)
            $out .= htmlspecialchars(substr($plain, $cur, $to - $cur), ENT_QUOTES, 'UTF-8');
        return $out;
    };

    foreach ($results as &$r) {
        $r['before'] = $renderRange($r['_bFrom'],   $r['_firstPos'], []);
        $r['match']  = $renderRange($r['_firstPos'],$r['_lastEnd'],  $r['_positions']);
        $r['after']  = $renderRange($r['_lastEnd'],  $r['_aTo'],     []);
        unset($r['_positions'], $r['_bFrom'], $r['_firstPos'], $r['_lastEnd'], $r['_aTo']);
    }
    unset($r);

    return $results;
}
			$xmld=simplexml_load_file('repository/listes/'.$det.'.xml');

function printMatches(array $matches, string $filePath): void
{
    if (empty($matches)) return;

    $count = count($matches);
    echo "<hr><h2>" . htmlspecialchars($filePath, ENT_QUOTES, 'UTF-8').'</h2>';

    foreach ($matches as $m) {
        $occ = $m['occurrence'];
        $ref = htmlspecialchars($m['start_ref'], ENT_QUOTES, 'UTF-8');
        $loc = $m['split']
            ? "{$ref} → " . htmlspecialchars($m['end_ref'], ENT_QUOTES, 'UTF-8')
            : $ref;
				$lin=explode(" ",$loc)[0];
				$secl=$m['section'];		
				if (strpos($lin,"a")!=false) {$pos=strpos($lin,"a");}
				if (strpos($lin,"b")!=false) {$pos=strpos($lin,"b");}
				$linp=substr($lin,0,$pos);
				$linf=substr($lin,$pos,1);
				$linl=substr($lin,$pos+1);
				
			foreach($GLOBALS['xmld']->item as $itemd) {
				if (strcmp($itemd->vol,$GLOBALS['volref'])==0 and strcmp($itemd->sec,$secl)==0){
					echo $volref;
						if (($linp==$itemd->debp && $itemd->debf=="a" and $linf=="a" and $linl>=$itemd->debl) || ($linp==$itemd->debp and $itemd->debf=="a" and $linf=="b") || ($linp==$itemd->debp and $itemd->debf=="b" and $linf=="b" and $linl>=$itemd->debl) || ($linp>$itemd->debp and $linp<$itemd->finp) || ($linp==$itemd->finp and $itemd->finf=="b" and $linf=="b" and $linl<=$itemd->finl) || ($linp==$itemd->finp and $itemd->finf=="b" and $linf=="a") || ($linp==$itemd->finp and $itemd->finf=="a" and $linf=="a" and $linl<=$itemd->finl))
						{ $cestou='<a href="../cat.php?id='.$itemd->rkts.'&typ='.$GLOBALS['dett'].'" target="_Blank" style="text-decoration:none;">'.$itemd->ref.'</a> - ';$tib=$itemd->tib;$rkts=$itemd->rkts;$lienct=$itemd->ref;}
				
				}
			}
echo '<b><u>'.$cestou.' (<i>'.$tib.'</i>) <a href="../cat.php?id='.$rkts.'&typ='.$GLOBALS['dett'].'" target="_Blank" style="text-decoration:none;"><img src="../sub/link.png" width=30></a></u></b> (complete e-text for <a href="tcomplete.php?id='.$lienct.'&coll='.$GLOBALS['col'].'" target="_blank">'.$lienct.'</a>)<br> ';
        $sec = htmlspecialchars($m['section'], ENT_QUOTES, 'UTF-8');
        echo "<p><code>{$loc}</code> <span style='color:#666;font-style:italic;'>({$sec})</span>";
		echo '<a href="../images.php?id='.$GLOBALS['dett'].'|'.$GLOBALS['col'].'|'.$GLOBALS['setref'].'|I'.$GLOBALS['volref'].'|'.$secl.'|'.$linp.$linf.'" target="_blank"><img src="img.png" width=25px></a></p>';
        echo "<p style='line-height:1.8'>…{$m['before']}"
           . "{$m['match']}"
           . "{$m['after']}…</p>\n";
    }
}



$scandir = scandir("repository/".$repos);
foreach($scandir as $fichier){
  if(preg_match("#\.(txt|ttt)$#i", $fichier)){

$file    = 'repository/'.$colSeg.'/'.$fichier;
$maxGap  = 5;
$matches = findApproxCrossLine($file, $txt, 250, $maxGap);
			$xml=simplexml_load_file("repository/".$liste.".xml");
			foreach ($xml->item as $item){if ($col==$item->col and substr($fichier,0,-4)==$item->voln) {$volref=$item->volref;$volname=$item->vol;}}



printMatches($matches, $volname);

}
}

?>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<br><br><br><br><br>