<table><tr><td><a href="../index.php" style="text-decoration:none;"><img src="../sub/logo.png" width=100></a>
<td><h1>e-text analyser</h1>
</table>

<?php
/**
 * Vergleicht zwei Texte, die jeweils aus einer einzelnen langen Zeile bestehen
 * und hebt die Unterschiede hervor
 *
 * @param string $text1 Der erste Text (einzelne Zeile)
 * @param string $text2 Der zweite Text (einzelne Zeile)
 * @return string HTML mit den Texten nebeneinander und hervorgehobenen Unterschieden
 */
function einzelzeilenVergleich($text1, $text2) {
    // CSS für die Darstellung
    $ausgabe = '<style>
        .vergleich-container {
            display: flex;
            width: 100%;
            flex-direction: column;
            font-family: monospace;
        }
        .spalte {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            margin: 5px;
            overflow-x: auto;
            white-space: pre-wrap;
            word-break: break-word;
        }
        .spalten-header {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .diff-character {
            background-color: #ffff99;
            color: #cc0000;
            padding: 0 1px;
            border-radius: 2px;
        }
        .diff-markierung {
            color: #cc0000;
            font-weight: bold;
        }
        .position-marker {
            color: #999;
            font-size: 0.8em;
            border-top: 1px solid #ddd;
            padding-top: 3px;
            margin-top: 5px;
        }
        .position-nummer {
            color: #666;
            background: #f0f0f0;
            border-radius: 3px;
            padding: 1px 3px;
            margin: 0 1px;
        }
    </style>';
    
    $ausgabe1 .= '<div class="vergleich-container">';
    
    // Text 1 mit hervorgehobenen Unterschieden
    $ausgabe1 .= '<div class="spalte">';
    $ausgabe1 .= '<div class="spalten-header">Text 1:</div>';
    
    // Finde die Unterschiede zwischen den Texten
    $diff = zeichenweiseDifferenzen($text1, $text2);
    
    // Markiere die Unterschiede in Text 1
    $markierterText1 = '';
    $positionsMarker = [];
    $letztePosition = -20; // Startpunkt für Positionsmarkierungen
    
    for ($i = 0; $i < strlen($text1); $i++) {
        if (isset($diff[$i])) {
            // Wenn wir weit genug vom letzten Marker entfernt sind, neuen Marker hinzufügen
            if ($i - $letztePosition >= 20) {
                $positionsMarker[] = $i;
                $letztePosition = $i;
            }
            $markierterText1 .= '<span class="diff-character">' . htmlspecialchars($text1[$i]) . '</span>';
        } else {
            $markierterText1 .= htmlspecialchars($text1[$i]);
        }
    }
    
    $ausgabe1 .= $markierterText1;
    
    // Positionsmarkierungen für Text 1
    if (!empty($positionsMarker)) {
        $ausgabe1 .= '<div class="position-marker">Differences in positions: ';
        foreach ($positionsMarker as $pos) {
            $ausgabe1 .= '<span class="position-nummer">' . $pos . '</span>';
        }
        $ausgabe1 .= '</div>';
    }
    
    $ausgabe1 .= '</div>';
    
    // Text 2 mit hervorgehobenen Unterschieden
    $ausgabe1 .= '<div class="spalte">';
    $ausgabe1 .= '<div class="spalten-header">Text 2:</div>';
    
    // Markiere die Unterschiede in Text 2
    $markierterText2 = '';
    $positionsMarker = [];
    $letztePosition = -20;
    
    for ($i = 0; $i < strlen($text2); $i++) {
        if (isset($diff[$i])) {
            if ($i - $letztePosition >= 20) {
                $positionsMarker[] = $i;
                $letztePosition = $i;
            }
            $markierterText2 .= '<span class="diff-character">' . htmlspecialchars($text2[$i]) . '</span>';
        } else {
            $markierterText2 .= htmlspecialchars($text2[$i]);
        }
    }
    
    $ausgabe1 .= $markierterText2;
    
    // Positionsmarkierungen für Text 2
    if (!empty($positionsMarker)) {
        $ausgabe1 .= '<div class="position-marker">Differences in positions: ';
        foreach ($positionsMarker as $pos) {
            $ausgabe1 .= '<span class="position-nummer">' . $pos . '</span>';
        }
        $ausgabe1 .= '</div>';
    }
    
    $ausgabe1 .= '</div>';
    
    // Detaillierte Analyse der Unterschiede
    $ausgabe1 .= '<div class="spalte">';
    $ausgabe .= '<div class="spalten-header">Detailed analysis of the differences:</div>';
    
    // Differenzen im Kontext anzeigen
    $kontextDiff = kontextDifferenzen($text1, $text2, $diff, 10);
    
    if (empty($kontextDiff)) {
        $ausgabe .= 'Keine Unterschiede gefunden.';
    } else {
        foreach ($kontextDiff as $index => $diffInfo) {
            $ausgabe .= '<div style="margin-bottom: 15px;">';
            $ausgabe .= '<strong>Difference #' . ($index + 1) . ' (Position ' . $diffInfo['position'] . '):</strong><br>';
            $ausgabe .= 'Text 1: "' . $diffInfo['kontext_vorher'] . 
                        '<span class="diff-markierung">' . $diffInfo['text1_diff'] . '</span>' . 
                        $diffInfo['kontext_nachher'] . '"<br>';
            $ausgabe .= 'Text 2: "' . $diffInfo['kontext_vorher'] . 
                        '<span class="diff-markierung">' . $diffInfo['text2_diff'] . '</span>' . 
                        $diffInfo['kontext_nachher'] . '"';
            $ausgabe .= '</div>';
        }
    }
    
    $ausgabe .= '</div>';
    
    $ausgabe .= '</div>'; // Ende des Containers
    
    return $ausgabe;
}

/**
 * Ermittelt die Unterschiede zwischen zwei Texten auf Zeichenebene
 * 
 * @param string $text1 Der erste Text
 * @param string $text2 Der zweite Text
 * @return array Assoziatives Array mit Positionen als Schlüssel
 */
function zeichenweiseDifferenzen($text1, $text2) {
    $diff = array();
    $len1 = strlen($text1);
    $len2 = strlen($text2);
    
    // Bestimme die gemeinsamen Teile zu Beginn
    $start = 0;
    while ($start < $len1 && $start < $len2 && $text1[$start] === $text2[$start]) {
        $start++;
    }
    
    // Bestimme die gemeinsamen Teile am Ende
    $end1 = $len1 - 1;
    $end2 = $len2 - 1;
    while ($end1 >= $start && $end2 >= $start && $text1[$end1] === $text2[$end2]) {
        $end1--;
        $end2--;
    }
    
    // Markiere alle Unterschiede dazwischen
    for ($i = $start; $i <= $end1 || $i <= $end2; $i++) {
        if ($i > $end1 || $i > $end2 || $text1[$i] !== $text2[$i]) {
            $diff[$i] = true;
        }
    }
    
    return $diff;
}

/**
 * Extrahiert die Unterschiede mit umgebendem Kontext
 * 
 * @param string $text1 Der erste Text
 * @param string $text2 Der zweite Text
 * @param array $diff Array mit markierten Differenzpositionen
 * @param int $kontextLaenge Die Länge des Kontexts vor und nach dem Unterschied
 * @return array Array mit Unterschieden im Kontext
 */
function kontextDifferenzen($text1, $text2, $diff, $kontextLaenge = 10) {
    if (empty($diff)) {
        return array();
    }
    
    $kontextDiff = array();
    $positions = array_keys($diff);
    $diffBloecke = array();
    $aktuellerBlock = array();
    
    // Gruppiere aufeinanderfolgende Unterschiede in Blöcke
    foreach ($positions as $pos) {
        if (empty($aktuellerBlock) || end($aktuellerBlock) + 1 == $pos) {
            $aktuellerBlock[] = $pos;
        } else {
            $diffBloecke[] = $aktuellerBlock;
            $aktuellerBlock = array($pos);
        }
    }
    
    if (!empty($aktuellerBlock)) {
        $diffBloecke[] = $aktuellerBlock;
    }
    
    // Erstelle die Kontextdifferenzen für jeden Block
    foreach ($diffBloecke as $block) {
        $startPos = min($block);
        $endPos = max($block);
        
        $startKontext = max(0, $startPos - $kontextLaenge);
        $endKontext = min(strlen($text1), $endPos + $kontextLaenge + 1);
        $endKontext2 = min(strlen($text2), $endPos + $kontextLaenge + 1);
        
        // Texte vor der Differenz
        $vorher = substr($text1, $startKontext, $startPos - $startKontext);
        
        // Differenzen selbst
        $diff1 = substr($text1, $startPos, $endPos - $startPos + 1);
        $diff2 = substr($text2, $startPos, min($endPos, strlen($text2) - 1) - $startPos + 1);
        
        // Texte nach der Differenz
        $nachher = substr($text1, $endPos + 1, $endKontext - $endPos - 1);
        
        $kontextDiff[] = array(
            'position' => $startPos,
            'kontext_vorher' => htmlspecialchars($vorher),
            'text1_diff' => htmlspecialchars($diff1),
            'text2_diff' => htmlspecialchars($diff2),
            'kontext_nachher' => htmlspecialchars($nachher)
        );
    }
    
    return $kontextDiff;
}

/**
 * Erweiterte Funktion, die auch mit JSON oder XML umgehen kann
 * 
 * @param string $text1 Der erste Text
 * @param string $text2 Der zweite Text
 * @param string $format Optional: 'auto', 'json', 'xml' oder 'text'
 * @return string HTML mit formatiertem Vergleich
 */
function formatiertenEinzelzeilenVergleich($text1, $text2, $format = 'auto') {
    // Erkennt automatisch das Format
    if ($format === 'auto') {
        // Überprüfe auf JSON
        $isJson1 = isValidJson($text1);
        $isJson2 = isValidJson($text2);
        
        if ($isJson1 && $isJson2) {
            $format = 'json';
        } 
        // Überprüfe auf XML
        elseif ((strpos($text1, '<?xml') !== false || strpos($text1, '<') === 0) && 
                (strpos($text2, '<?xml') !== false || strpos($text2, '<') === 0)) {
            $format = 'xml';
        } else {
            $format = 'text';
        }
    }
    
    // Formatiere die Texte entsprechend
    switch ($format) {
        case 'json':
            $formattedText1 = json_encode(json_decode($text1), JSON_PRETTY_PRINT);
            $formattedText2 = json_encode(json_decode($text2), JSON_PRETTY_PRINT);
            return textVergleichInSpalten($formattedText1, $formattedText2);
            
        case 'xml':
            $formattedText1 = formatXML($text1);
            $formattedText2 = formatXML($text2);
            return textVergleichInSpalten($formattedText1, $formattedText2);
            
        case 'text':
        default:
            return einzelzeilenVergleich($text1, $text2);
    }
}

/**
 * Überprüft, ob ein String gültiges JSON ist
 * 
 * @param string $string Der zu überprüfende String
 * @return bool True, wenn der String gültiges JSON ist
 */
function isValidJson($string) {
    if (!is_string($string)) {
        return false;
    }
    
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);
}

/**
 * Formatiert XML-Text mit Einrückungen
 * 
 * @param string $xml Der XML-Text
 * @return string Formatierter XML-Text
 */
function formatXML($xml) {
    $dom = new DOMDocument();
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    
    // Versuche, XML zu parsen (mit Fehlerunterdrückung)
    @$dom->loadXML($xml);
    
    $formattedXML = $dom->saveXML();
    
    // Falls das Parsing fehlschlägt, gib den Originaltext zurück
    if ($formattedXML === false) {
        return $xml;
    }
    
    return $formattedXML;
}

function compareTexts($text1, $text2, $chunkSize = 100) {
    // Normalisierung der Texte (Leerzeichen reduzieren, Zeilenumbrüche vereinheitlichen)
    $text1 = preg_replace('/\s+/', ' ', trim($text1));
    $text2 = preg_replace('/\s+/', ' ', trim($text2));
    
    // Levenshtein-Distanz berechnen für den Gesamttext
    $maxLength = max(strlen($text1), strlen($text2));
    if ($maxLength == 0) {
        return [
            'similarityPercentage' => 100,
            'differences' => []
        ];
    }
    
    $levenshtein = levenshtein($text1, $text2);
    $similarityPercentage = round((1 - $levenshtein / $maxLength) * 100, 2);
    
    // Texte in Chunks zerlegen für detaillierte Analyse
    $chunks1 = [];
    $chunks2 = [];
    
    for ($i = 0; $i < strlen($text1); $i += $chunkSize) {
        $chunks1[] = substr($text1, $i, $chunkSize);
    }
    
    for ($i = 0; $i < strlen($text2); $i += $chunkSize) {
        $chunks2[] = substr($text2, $i, $chunkSize);
    }
    
    // Unterschiede zwischen den Chunks finden
    $differences = [];
    $maxChunks = max(count($chunks1), count($chunks2));
    
    for ($i = 0; $i < $maxChunks; $i++) {
        $chunk1 = isset($chunks1[$i]) ? $chunks1[$i] : '';
        $chunk2 = isset($chunks2[$i]) ? $chunks2[$i] : '';
        
        if ($chunk1 != $chunk2) {
            $chunkLength = max(strlen($chunk1), strlen($chunk2));
            if ($chunkLength > 0) {
                $chunkLevenshtein = levenshtein($chunk1, $chunk2);
                $differenceScore = $chunkLevenshtein / $chunkLength;
                
                $differences[] = [
                    'position' => $i * $chunkSize,
                    'text1' => $chunk1,
                    'text2' => $chunk2,
                    'differenceScore' => $differenceScore
                ];
            }
        }
    }
    
    // Nach Unterschiedlichkeit sortieren
    usort($differences, function($a, $b) {
        return $b['differenceScore'] <=> $a['differenceScore'];
    });
    
    // Auf die 5 unterschiedlichsten Passagen beschränken
    $differences = array_slice($differences, 0, 5);
    
    return [
        'similarityPercentage' => $similarityPercentage,
        'differences' => $differences
    ];
}

// Beispiel für die Verwendung:

    $text1 = "rgya gar skad du/ Ar+ya su bar+N+Na bA lu ko pa ma nA ma ma hA yA na sU tra/ bod skad du/ 'phags pa gser gyi bye ma lta bu zhes bya ba theg pa chen po'i mdo/ sangs rgyas dang / byang chub sems dpa' thams cad la phyag 'tshal lo// 'di skad bdag gis thos pa dus gcig na/ bcom ldan 'das mnyan du yod pa na rgyal bu rgyal byed kyi tshal mgon med zas sbyin gyi kun dga' ra ba na dge slong stong nyis brgya lnga bcu'i dge slong gi dge 'dun chen po dang / byang chub sems dpa' stong phrag mang po dag dang thabs cig tu bzhugs te/ de nas tshe dang ldan pa kun dga' bo stan las langs te bla gos phrag pa gcig tu gzar nas pus mo g.yas pa'i lha nga sa la btsugs te/ bcom ldan 'das ga la ba de logs su thal mo sbyar ba btud nas bcom ldan 'das la 'di skad ces gsol to// bcom ldan 'das ci de bzhin gshegs pa dgra bcom pa yang dag par rdzogs pa'i sangs rgyas rnams dpag tu ma mchis pa lags sam/ bcom ldan 'das ci de bzhin gshegs pa dgra bcom pa yang dag par rdzogs pa'i sangs rgyas rnams yon tan dpag tu ma mchis pa dang ldan lags sam/ de skad ces gsol pa dang / bcom ldan 'das kyis tshe dang ldan pa kun dga' bo la 'di skad ces bka' stsal to// kun dga' bo de bzhin gshegs pa dgra bcom pa yang dag par rdzogs pa'i sangs rgyas rnams ni dpag tu med do// kun dga' bo de bzhin gshegs pa dgra bcom pa yang dag par rdzogs pa'i sangs rgyas rnams ni yon tan dpag tu med pa dang ldan no// tshe dang ldan pa kun dga' bos lan gnyis su bcom ldan 'das la 'di skad ces gsol to// bcom ldan 'das ci de bzhin gshegs pa dgra bcom pa yang dag par rdzogs pa'i sangs rgyas rnams dpag tu ma mchis pa lags sam/ bcom ldan 'das ci de bzhin gshegs pa dgra bcom pa yang dag par rdzogs pa'i sangs rgyas rnams yon tan dpag tu ma mchis pa dang ldan lags sam/ bcom ldan 'das kyis kyang lan gnyis lan gsum du tshe dang ldan pa kun dga' bo la 'di skad ces bka' stsal to// kun dga' bo de bzhin gshegs pa dgra bcom pa yang dag par rdzogs pa'i sangs rgyas rnams ni dpag tu med do// kun dga' bo de bzhin gshegs pa dgra bcom pa yang dag par rdzogs pa'i sangs rgyas rnams ni yon tan dpag tu med pa dang yang ldan no// kun dga' bo khyod de bzhin gshegs pa rnams kyi dpag tu med pa mnyan pa'am/ de bzhin gshegs pa rnams kyi yul shes pa 'am/ de bzhin gshegs pa rnams kyi yon tan shes par 'dod dam/ de skad ces bka' stsal pa dang / bcom ldan 'das la tshe dang ldan pa kun dga' bos 'di skad ces gsol to// dge slong rnams la bcom ldan 'das kyis bstan du gsol/ bde bar gshegs pas bstan du gsol/ dge slong rnams kyis mngon sum du thos na yang dag par 'dzin par 'gyur lags so// de skad ces gsol pa dang / bcom ldan 'das kyis tshe dang ldan pa kun dga' bo la 'di skad ces bka' stsal to// kun dga' bo khyod kyis maud gal gyi bu chen po rdzu 'phrul ji lta bus phyogs dang phyogs mtshams dag tu 'gro ba shes sam/ kun dga' bos gsol pa/ maud gal gyi bu chen po rdzu 'phrul ji lta bus phyogs dang phyogs mtshams dag tu mchi ba bcom ldan 'das kyis bstan du gsol/ bde bar gshegs pas bstan du gsol/ bcom ldan 'das kyis bka' stsal pa/ kun dga' bo khyod la don 'di dpes bstan par bya'o// de ci'i phyir zhe na/ kun dga' bo skyes bu mkhas pa gang dag dpes don rtogs par 'gyur ba yod pa'i phyir ro// kun dga' bo dper na rdzing dpag tshad brgyad stong pa chus gang ba/ bya khwas btung du rung bar mu dang kha da chad du 'dug pa/ pad ma'i lo mas khebs pa zhig yod la de nas mi la la zhig gis rlung gi shugs las 'das pa'i rta mchog dag dang ldan pa'i lcags kyi shing rta la zhon te/ de yang mu khyud kyi shing yang chu la mi reg /rta rnams kyi rmig pa yang chu la mi reg /pad ma'i lo ma rnams kyang rta'i rmig pa dag gis mi brtol ba tsam gyi stobs dang shugs dang mgyogs pa de lta bus rgyug la/ kun dga' bo de nas rdzing de'i nang nas sbrul gdug pa zhig byung nas shing rta de mtsho'i nang nas phyir ma log pa de'i bar skabs su shing rta de lan brgyad bskor na/ kun dga' bo sbrul gdug pas shing rta lan cig bskor ba'i yun ji tsam pa de'i bar skabs su kun dga' bo khyod chos bstan pa rnam pa brgyad ston cing don kyang go bar byed do// kun dga' bo khyod tshig gcig smra ba'i yun ji tsam pa de'i bar skabs su maud gal gyi bu chen po chos bstan pa rnam pa brgyad ston cing don kyang go bar byed do// kun dga' bo maud gal gyi bu chen po tshig gcig smra ba'i yun ji tsam pa de'i bar skabs su gnas brtan sha ra dwa ti'i bu chos bstan pa rnam pa brgyad ston cing don kyang go bar byed do// gnas brtan sha ra dwa ti'i bu tshig gcig smra ba'i yun ji tsam pa de'i bar skabs su rang sangs rgyas chos bstan pa rnam pa grangs med pa ston to// rang sangs rgyas tshig gcig smra ba'i yun ji tsam pa de'i bar skabs su byang chub sems dpa' chos bstan pa rnam pa grangs med bsam gyis mi khyab brjod du med pa ston cing don kyang go bar byed do// kun dga' bo byang chub sems dpa' tshig gcig smra ba'i yun ji tsam pa de'i bar skabs su kun dga' bo gnas brtan maud gal gyi bu chen po 'jig rten gyi khams brgyad khri 'da'o// kun dga' bo rdzu 'phrul gyi stobs bskyed pa de lta bu'i 'gros kyis nyin mtshan bdun gyi bar du ngal mi bso bar shar phyogs su 'jig rten gyi khams ji snyed du 'gro ba dang / de bzhin du lho phyogs dang / nub phyogs dang / byang phyogs dang / de bzhin du shar lho'i phyogs mtshams dang / lho nub kyi mtshams dang / nub byang gi mtshams dang / byang shar gyi mtshams dang / de bzhin du steng dang 'og gi phyogs su nyin mtshan bdun gyi bar du ngal mi bso bar song la/ de nas mi la la zhig gis phyogs bcu'i 'jig rten gyi khams de dag thams cad ra bas bskor te ra bas bskor nas rdo dang / gseg ma dang / gyo mo dang / gyo dum med par byas te mthon dman med par byas nas grong khyer gcig tu byas la grong khyer gcig tu byas nas kyang yungs 'brus bkang ste byur bur byas na/ kun dga' bo grong khyer de'i nang gi yungs 'bru ji snyed yod pa de dag bas kyang ches mang ba'i 'jig rten gyi khams dag na sems can byang chub la zhugs pa dag ngas mthong ngo // de bas kyang ches mang ba'i 'jig rten gyi khams dag na byang chub sems dpa' rnams byang chub sems dpa'i spyad pa spyod pa dag ngas mthong ngo // de bas kyang ches mang ba'i 'jig rten gyi khams dag na byang chub sems dpa' rnams dga' ldan gyi lha'i ris dag tu skye ba dag ngas mthong ngo // de bas kyang ches mang ba'i 'jig rten gyi khams dag na byang chub sems dpa' rnams dga' ldan gyi lha'i ris dag na 'khod pa dag ngas mthong ngo // de bas kyang ches mang ba'i 'jig rten gyi khams dag na byang chub sems dpa' rnams dga' ldan gyi lha'i ris dag nas 'chi 'pho ba dag ngas mthong ngo // de bas kyang ches mang ba'i 'jig rten gyi khams dag na byang chub sems dpa' rnams ma'i mngal du 'jug pa dag ngas mthong ngo // de bas kyang ches mang ba'i 'jig rten gyi khams dag na byang chub sems dpa' rnams ma'i mngal nas 'byung ba dag ngas mthong ngo // de bas kyang ches mang ba'i 'jig rten gyi khams dag na byang chub sems dpa' rnams byis pa'i rtsed mo ston pa dag ngas mthong ngo // de bas kyang ches mang ba'i 'jig rten gyi khams dag na byang chub sems dpa' rnams rgyal srid spangs nas rab tu byung ba dag ngas mthong ngo // de bas kyang ches mang ba'i 'jig rten gyi khams dag na byang chub sems dpa' rnams dka' ba spyod pa'i sbyor ba ston pa dag ngas mthong ngo // de bas kyang ches mang ba'i 'jig rten gyi khams dag na byang chub sems dpa' rnams byang chub kyi snying por 'gro ba dag ngas mthong ngo // de bas kyang ches mang ba'i 'jig rten gyi khams dag na byang chub sems dpa' rnams byang chub kyi snying po la lta ba dag ngas mthong ngo // de bas kyang ches mang ba'i 'jig rten gyi khams dag na byang chub sems dpa' rnams byang chub kyi snying po la gces par byed pa'i mchog dang gus pa chen pos lan gsum bskor ba byed pa dag ngas mthong ngo // de bas kyang ches mang ba'i 'jig rten gyi khams dag na byang chub sems dpa' rnams byang chub kyi snying po la 'dug pa dag ngas mthong ngo // de bas kyang ches mang ba'i 'jig rten gyi khams dag na byang chub sems dpa' rnams byang chub kyi shing drung na 'dug pa dag ngas mthong ngo // de bas kyang ches mang ba'i 'jig rten gyi khams dag na byang chub sems dpa' rnams bla na med pa yang dag par rdzogs pa'i byang chub mngon par rdzogs par 'tshang rgya ba dag ngas mthong ngo // de bas kyang ches mang ba'i 'jig rten gyi khams dag na byang chub sems dpa' rnams bla na med pa yang dag par rdzogs pa'i byang chub mngon par rdzogs par sangs rgyas pa dag ngas mthong ngo //  de bas kyang ches mang ba'i 'jig rten gyi khams dag na sangs rgyas bcom ldan 'das rnams chos kyi 'khor lo bskor ba dag ngas mthong ngo // de bas kyang ches mang ba'i 'jig rten gyi khams dag na sangs rgyas bcom ldan 'das rnams yongs su mya ngan las 'das pa chen po ston pa dag ngas mthong ste/ de dag thams cad kyang mtshan 'thun pa dang gdung 'thun pa sha stag yin na 'jig rten gyi khams gang dag na byang chub sems dpa' chen po rnams mngon par 'byung ba dang / byang chub kyi snying por 'gro ba dang / byang chub kyi snying po la lta ba dang / byang chub kyi snying po la bskor ba byed pa dang / byang chub kyi snying po la 'dug pa dang / byang chub kyi shing drung na 'dug pa dang / mngon par rdzogs par sangs rgyas nas chos kyi 'khor lo bskor ba dang / yongs su mya ngan las 'das pa chen po ston pa mtshan tha dad pa dang gdung tha dad pa dag lta ci smos/ de nas bcom ldan 'das la tshe dang ldan pa kun dga' bos 'di skad ces gsol to// bcom ldan 'das 'jig rten gyi khams gang dag tu sangs rgyas bcom ldan 'das rnams mi 'byung ba dang / byang chub sems dpa' rnams kyang byang chub sems dpa'i spyad pa mi spyod pa'i 'jig rten gyi khams ji snyed cig mchis lags/ bcom ldan 'das kyis bka' stsal pa/ kun dga' bo 'jig rten gyi khams ngas bstan pa gang dag tu sangs rgyas bcom ldan 'das rnams 'byung ba dang / byang chub sems dpa' rnams kyang byang chub sems dpa'i spyad pa spyod pa gang yin pa de dag ni kun dga' bo dper na rgya mtsho chen po'i bye ma dang gang gA'i klung gi bye ma'i nang na gser gyi bye ma dkon pa dang 'dra ste/ kun dga' bo de bzhin du 'jig rten gyi khams gang dag tu sangs rgyas bcom ldan 'das rnams 'byung ba dang / byang chub sems dpa' rnams kyang byang chub sems dpa'i spyad pa spyod pa'i 'jig rten gyi khams de dag ni dkon te/ kun dga' bo ji ltar rgya mtsho chen po'i bye ma dang gang gA'i klung gi bye ma de dag las la la zhig gis bye ma 'bru gcig blangs pa de bzhin du gang du sangs rgyas bcom ldan 'das rnams 'byung ba dang / byang chub sems dpa' rnams kyang byang chub sems dpa'i spyad pa spyod pa'i 'jig rten gyi khams de dag ni nyung ngo // bcom ldan 'das kyis de skad ces bka' stsal nas/ tshe dang ldan pa kun dga' bo dang / dge slong de dag dang / byang chub sems dpa' de dag dang / lha dang / mi dang / lha ma yin dang / dri zar bcas pa'i 'jig rten yi rangs te/ bcom ldan 'das kyis gsungs pa la mngon par bstod do/// /'phags pa gser gyi bye ma lta bu zhes bya ba theg pa chen po'i mdo rdzogs // ";
    
    $text2 = "rgya gar skad du/ AR+ya su war+N+Na bA lu ko pa ma nA ma hA yA na sU tra/ bod skad du/ 'phags pa gser gyi bye ma lta bu zhes bya ba theg pa chen po'i mdo/ /sangs rgyas dang / byang chub sems dpa' thams cad la phyag 'tshal lo/ /'di skad bdag gis thos pa dus gcig na/ bcom ldan 'das mnyan du yod pa na rgyal bu rgyal byed kyi tshal mgon med zas sbyin gyi kun dga' ra ba na dge slong stong nyis brgya lnga bcu'i dge slong gi dge 'dun chen po dang / byang chub sems dpa' phrag mang po dag dang thabs gcig tu bzhugs te/ de nas tshe dang ldan pa kun dga' bo stan las langs te bla gos phrag pa gcig tu gzar nas phus mo g.yas pa'i lha nga sa la btsugs te bcom ldan 'das ga la ba de logs su thal mo sbyar ba btud nas bcom ldan 'das la 'di skad ces gsol to/ / bcom ldan 'das/ ci de bzhin gshegs pa dgra bcom pa yang dag par rdzogs pa'i sangs rgyas rnams dpag tu ma mchis pa lags sam/ bcom ldan 'das/ ci de bzhin gshegs pa dgra bcom pa yang dag par rdzogs pa'i sangs rgyas rnams yon tan dpag tu ma mchis pa dang ldan pa lags sam/ de skad ces gsol ba dang / bcom ldan 'das kyis tshe dang ldan pa kun dga' bo la 'di skad ces bka' stsal to/ /kun dga' bo/ de bzhin gshegs pa dgra bcom pa yang dag par rdzogs pa'i sangs rgyas rnams ni/ dpag tu med do/ /kun dga' bo/ de bzhin gshegs pa dgra bcom pa yang dag par rdzogs pa'i sangs rgyas rnams ni/ yon tan dpag tu med pa dang ldan no/ /tshe dang ldan pa kun dga' bos lan gnyis su bcom ldan 'das la 'di skad ces gsol to/ /bcom ldan 'das/ ci de bzhin gshegs pa dgra bcom pa yang dag par rdzogs pa'i sangs rgyas rnams dpag tu ma mchis pa lags sam/ bcom ldan 'das/ ci de bzhin gshegs pa dgra bcom pa yang dag par rdzogs pa'i sangs rgyas rnams yon tan dpag tu ma mchis pa dang ldan pa lags sam/ bcom ldan 'das kyis kyang lan gnyis lan gsum du tshe dang ldan pa kun dga' bo la 'di skad ces bka' stsal to/ /kun dga' bo/ /de bzhin gshegs pa dgra bcom pa yang dag par rdzogs pa'i sangs rgyas rnams ni/ dpag tu med do/ /kun dga' bo/ de bzhin gshegs pa dgra bcom pa yang dag par rdzogs pa'i sangs rgyas rnams ni/ yon tan dpag tu med pa dang ldan no/ /kun dga' bo/ khyod de bzhin gshegs pa rnams kyi dpag tu med pa mnyan pa'am/ de bzhin gshegs pa rnams kyi yul shes pa'am/ de bzhin gshegs ba rnams kyi yon tan shes par 'dod dam/ de skad ces bka' stsal pa dang / bcom ldan 'das la tshe dang ldan pa kun dga' bos 'di skad ces gsol to/ /dge slong rnams la bcom ldan 'das kyis bstan du gsol/ /bde bar gshegs pas bstan du gsol/ dge slong rnams kyis mngon sum du thos na/ yang dag par 'dzin par 'gyur lags so/ / de skad ces gsol pa dang / bcom ldan 'das kyis tshe dang ldan pa kun dga' bo la 'di skad ces bka' stsal to/ /kun dga' bo/ khyod kyis maud+gal gyi bu chen po rdzu 'phrul ji lta bus phyogs dang / phyogs mtshams dag tu 'gro ba shes sam/ kun dga' bos gsol ba/ maud+gal gyi bu chen po rdzu 'phrul ji lta bus phyogs dang / phyogs mtshams dag tu mchi ba bcom ldan 'das kyis bstan du gsol/ bde bar gshegs pas bstan du gsol/ bcom ldan 'das kyis bka' stsal ba/ kun dga' bo/ khyod la don 'di dpes bstan par bya'o/ /de ci'i phyir zhe na/ kun dga' bo/ skyes bu mkhas pa gang dag dpes don rtogs par 'gyur ba yod pa'i phyir ro/ /kun dga' bo/ /dper na/ rdzing dpag tshad brgyad stong ba/ chus gang ba/ bya khwas btung du rung bar mu dang kha da chad du 'dug pa/ pad+ma'i lo mas khebs pa zhig yod la/ de nas mi la la zhig gis rlung gi shugs las 'das pa'i rta mchog dag dang ldan pa'i lcags kyi shing rta la zhon te/ de'ang mu khyud kyi shing yang chu la mi reg /rta rnams kyi rmig pa'ang chu la mi reg /pad+ma'i lo ma rnams kyang rta'i rmig pa dag gis mi brtol ba tsam gyi stobs dang | shugs dang / mgyogs pa de lta bus rgyug la/ kun dga' bo/ de nas rdzing de'i nang nas sbrul gdug pa zhig byung bas shing rta de mtsho'i nang nas phyir ma log pa de'i bar skabs su shing rta de lan brgyad bskor na/ kun dga' bo/ sprul gdug pas shing rta lan gcig bskor ba'i yun ji tsam pa de'i bar skabs su kun dga' bo/ /khyod chos bstan pa rnam pa brgyad ston cing don kyang go bar byed do/ /kun dga' bo/ /khyod tshig gcig smra ba'i yun ji tsam pa de'i bar skabs su maud+gal gyi bu chen po chos bstan pa rnam pa brgyad ston cing don kyang go bar byed do/ / kun dga' bo/ /maud+gal gyi bu chen po tshig gcig smra ba'i yun ji tsam pa de'i bar skabs su gnas brtan shwa ra dwa ti'i bu chos bstan pa rnam pa brgyad ston cing don kyang go bar byed do/ /gnas brtan shA ra dwa ti'i bu tshig gcig smra ba'i yun ji tsam pa de'i bar skabs su rang sangs rgyas chos bstan pa rnam pa grangs med pa ston to/ /rang sangs rgyas tshig gcig smra ba'i yun ji tsam pa de'i bar skabs su byang chub sems dpa' chos bstan pa rnam pa grangs med/ bsam gyis mi khyab/ brjod du med pa ston cing don kyang go bar byed do| |kun dga' bo/ byang chub sems dpa' tshig gcig smra ba'i yun ji tsam pa de'i bar skabs su kun dga' bo/ gnas brtan maud+gal gyi bu chen po 'jig rten gyi khams brgyad khri 'da'o| |kun dga' bo/ rdzu 'phrul gyi stobs bskyed pa de lta bu'i 'gros kyis nyin mtshan bdun gyi bar du ngal mi bso bar shar phyogs su 'jig rten gyi khams ji snyed du 'gro ba dang / de bzhin du lho phyogs dang / nub phyogs dang / byang phyogs dang / de bzhin du shar lho'i mtshams dang / lho nub kyi mtshams dang / nub byang gi mtshams dang / byang shar gyi mtshams dang / de bzhin du steng dang / 'og gi phyogs su nyin mtshan bdun gyi bar du ngal mi bso bar song la/ de nas mi la la zhig gis phyogs bcu'i 'jig rten gyi khams de dag thams cad ra bas bskor te ra pas bskor nas rdo dang / gseg ma dang / gyo mo dang / gyo dum med par byas te mtho dman med par byas nas grong khyer gcig tu byas la/ grong khyer gcig tu byas nas kyang yungs 'brus bkang ste byur bur byas na/ kun dga' bo/ grong khyer de'i nang gi yungs 'bru ji snyed pa de dag pas kyang ches mang ba'i 'jig rten gyi khams dag na sems can byang chub la zhugs pa dag ngas mthong ngo / /de bas kyang ches mang ba'i 'jig rten gyi khams dag na byang chub sems dpa' rnams byang chub sems dpa'i spyad pa spyod pa dag ngas mthong ngo / /de bas kyang ches mang ba'i 'jig rten gyi khams dag na byang chub sems dpa' rnams dga' ldan gyi lha'i ris dag tu skye ba dag ngas mthong ngo / /de bas kyang ches mang ba'i 'jig rten gyi khams dag na byang chub sems dpa' rnams dga' ldan gyi lha'i ris dag na 'khod pa dag ngas mthong ngo / /de bas kyang ches mang ba'i 'jig rten gyi khams dag na byang chub sems dpa' rnams dga' ldan gyi lha'i ris dag nas 'chi 'pho ba dag ngas mthong ngo / /de bas kyang ches mang ba'i 'jig rten gyi khams dag na byang chub sems dpa' rnams ma'i mngal du 'jug pa dag ngas mthong ngo / /de bas kyang ches mang pa'i 'jig rten gyi khams dag na byang chub sems dpa' rnams ma'i mngal nas 'byung ba dag ngas mthong ngo / /de bas kyang ches mang ba'i 'jig rten khams dag na byang chub sems dpa' rnams byis pa'i rtsed mo ston pa dag ngas mthong ngo / /de bas kyang ches mang ba'i 'jig rten gyi khams dag na byang chub sems dpa' rnams rgyal srid spangs nas rab tu byung ba dag ngas mthong ngo / /de bas kyang ches mang ba'i 'jig rten gyi khams dag na byang chub sems dpa' rnams dka' ba spyod pa'i sbyor ba bsten pa dag nges mthong ngo / /de bas kyang ches mang ba'i 'jig rten gyi khams dag na byang chub sems dpa' rnams byang chub kyi snying por 'gro ba dag ngas mthong ngo / /de bas kyang ches mang ba'i 'jig rten gyi khams dag na byang chub sems dpa' rnams byang chub kyi snying po la lta ba dag ngas mthong ngo / /de bas kyang ches mang ba'i 'jig rten gyi khams dag na byang chub sems dpa' rnams byang chub kyi snying po la gces par byed pa'i mchog dang gus pa chen pos lan gsum bskor ba byed pa dag ngas mthong ngo / /de bas kyang ches mang ba'i 'jig rten gyi khams dag na byang chub sems dpa' rnams byang chub kyi snying po la 'dug pa dag ngas mthong ngo / /de bas kyang ches mang ba'i 'jig rten gyi khams dag na byang chub sems dpa' rnams byang chub kyi shing drung na 'dug pa dag ngas mthong ngo / /de bas kyang ches mang ba'i 'jig rten gyi khams dag na byang chub sems dpa' rnams bla na med pa yang dag par rdzogs pa'i byang chub mngon par rdzogs par 'tshang rgya ba dag ngas mthong ngo / /de bas kyang ches mang pa'i 'jig rten gyi khams dag na byang chub sems dpa' rnams bla na med pa yang dag par rdzogs pa'i byang chub mngon par rdzogs par sangs rgyas pa dag ngas mthong ngo / /de bas kyang ches mang pa'i 'jig rten gyi khams dag na sangs rgyas bcom ldan 'das rnams chos kyi 'khor lo bskor ba dag ngas mthong ngo / /de bas kyang ches mang ba'i 'jig rten gyi khams dag na sangs rgyas bcom ldan 'das rnams yongs su mya ngan las 'das pa chen po ston pa dag ngas mthong ste/ de dag thams cad kyang mtshan mthun pa dang / gdung mthun pa sha stag yin na/ 'jig rten gyi khams gang dag na byang chub sems dpa' sems dpa' chen po rnams mngon par 'byung ba dang / byang chub kyi snying por 'gro ba dang / byang chub kyi snying po la lta ba dang / byang chub kyi snying po la bskor ba byed pa dang / byang chub kyi snying po la 'dug pa dang / byang chub kyi shing drung na 'dug pa dang / mngon par rdzogs par sangs rgyas nas chos kyi 'khor lo bskor ba dang / yongs su mya ngan las 'das pa chen po ston pa mtshan tha dad pa dang / gdung tha dad pa dag lta ci smos/ de nas bcom ldan 'das la tshe dang ldan pa kun dga' bos 'di skad ces gsol to/ /bcom ldan 'das/ 'jig rten gyi khams gang dag tu sangs rgyas bcom ldan 'das rnams mi 'byung ba dang / / byang chub sems dpa' rnams kyang byang chub sems dpa'i spyad pa mi spyod pa'i 'jig rten gyi khams ji snyed mchis lags sam/ bcom ldan 'das kyis bka' stsal pa/ kun dga' bo/ 'jig rten gyi khams ngas bstan pa gang dag tu sangs rgyas bcom ldan 'das rnams 'byung ba dang / byang chub sems dpa' rnams kyang byang chub sems dpa'i spyad pa spyod pa gang yin pa de dag ni/ kun dga' bo/ / dper na/ rgya mtsho chen po'i bye ma dang / gang+gA'i klung gyi bye ma'i nang na gser gyi bye ma dkon pa dang 'dra ste/ kun dga' bo/ de bzhin du 'jig rten gyi khams gang dag tu sangs rgyas bcom ldan 'das rnams 'byung ba dang / byang chub sems dpa' rnams kyang byang chub sems dpa'i spyad pa spyod pa'i 'jig rten gyi khams de dag ni/ dkon te/ kun dga' bo/ ji ltar rgya mtsho chen po'i bye ma dang / gang+gA'i klung gi bye ma de dag las la la zhig gis bye ma 'bru gcig blangs pa de bzhin du gang du sangs rgyas bcom ldan 'das rnams 'byung ba dang / byang chub sems dpa' rnams kyang byang chub sems dpa'i spyad pa spyod pa'i 'jig rten gyi khams de dag ni/ nyung ngo / /bcom ldan 'das kyis de skad ces bka' stsal nas tshe dang ldan pa kun dga' bo dang / dge slong de dag dang / byang chub sems dpa' de dag dang / lha dang / mi dang / lha ma yin dang / dri zar bcas pa'i 'jig rten yi rang ste bcom ldan 'das kyis gsungs pa la mngon par bstod do/ /'phags pa gser gyi bye ma lta bya zhes bya ba theg pa chen po'i mdo rdzogs so//";
 
 
 
    $result = compareTexts($text1, $text2);
    
    echo "<h2>Match percentage: " . $result['similarityPercentage'] . "%</h2><br><br>";


echo einzelzeilenVergleich($text1, $text2);

?>