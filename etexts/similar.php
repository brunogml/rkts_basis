<?php

$derge=array(
	array("1","'dul ba","1","13"),
	array("2","'bum","14","25"),
	array("3","sher phyin","26","34"),
	array("4","phal chen","35","38"),
	array("5","dkon brtsegs","39","44"),
	array("6","mdo sde","45","76"),
	array("7","rgyud","77","96"),
	array("8","rnying rgyud","97","99"),
	array("9","gzungs","100","101")	
);



function findAndHighlightSimilarString($stringA, $stringB, $minSimilarity = 0.5) {
    $lenA = strlen($stringA);
    $lenB = strlen($stringB);
    
    if ($lenA == 0 || $lenB == 0) {
        return null;
    }
    
    $bestMatch = null;
    $bestSimilarity = 0;
    $bestPosition = -1;
    
    // Try different substring lengths around the length of stringA
    $minLen = max(1, $lenA - 5);
    $maxLen = min($lenB, $lenA + 5);
    
    for ($len = $minLen; $len <= $maxLen; $len++) {
        for ($i = 0; $i <= $lenB - $len; $i++) {
            $substring = substr($stringB, $i, $len);
            $similarity = calculateSimilarity($stringA, $substring);
            
            // Exclude identical strings (similarity = 1.0) and only find similar ones
            if ($similarity > $bestSimilarity && $similarity >= $minSimilarity && $similarity < 1.0) {
                $bestSimilarity = $similarity;
                $bestMatch = $substring;
                $bestPosition = $i;
            }
        }
    }
    
    if ($bestMatch === null) {
        return [
            'found' => false,
            'similarity' => 0,
            'highlighted' => $stringB,
            'match' => null,
            'position' => -1
        ];
    }
    
    // Highlight the differences
    $highlighted = highlightDifferences($stringA, $bestMatch);
    
    // Replace the original substring in stringB with highlighted version
    $beforeMatch = substr($stringB, 0, $bestPosition);
    $afterMatch = substr($stringB, $bestPosition + strlen($bestMatch));
    $result = $beforeMatch . $highlighted . $afterMatch;
    
    return [
        'found' => true,
        'similarity' => $bestSimilarity,
        'highlighted' => $result,
        'match' => $bestMatch,
        'position' => $bestPosition
    ];
}

function calculateSimilarity($str1, $str2) {
    $len1 = strlen($str1);
    $len2 = strlen($str2);
    
    if ($len1 == 0 && $len2 == 0) return 1.0;
    if ($len1 == 0 || $len2 == 0) return 0.0;
    
    // Use Levenshtein distance for similarity calculation
    $distance = levenshtein($str1, $str2);
    $maxLen = max($len1, $len2);
    
    return 1 - ($distance / $maxLen);
}

function highlightDifferences($original, $found) {
    $origLen = strlen($original);
    $foundLen = strlen($found);
    $maxLen = max($origLen, $foundLen);
    
    $result = '';
    
    for ($i = 0; $i < $maxLen; $i++) {
        $origChar = $i < $origLen ? $original[$i] : '';
        $foundChar = $i < $foundLen ? $found[$i] : '';
        
        if ($origChar === $foundChar && $origChar !== '') {
            // Same character - highlight in green
            $result .= '<span style="color: green; font-weight: bold; background-color: yellow;">' . htmlspecialchars($foundChar) . '</span>';
        } else {
            // Different character - highlight in red
            if ($foundChar !== '') {
                $result .= '<span style="color: red; font-weight: bold; background-color: yellow;">' . htmlspecialchars($foundChar) . '</span>';
            }
        }
    }
    
    return $result;
}

// Alternative version with more detailed character-by-character comparison
function findAndHighlightSimilarStringDetailed($stringA, $stringB, $minSimilarity = 0.5) {
    $result = findAndHighlightSimilarString($stringA, $stringB, $minSimilarity);
    
    if ($result['found']) {
        // Add detailed comparison info
        $original = $stringA;
        $found = $result['match'];
        
        echo "<p>" . $result['highlighted'] . "</p>";
    }
    
    return $result;
}


$txt=$_GET['txt'];
$col=$_GET['col'];
$ite=$_GET['ite'];

$ite1=$ite-1;

echo '<b>Search for: '.$txt.'</b><hr>';


$deb=$derge[$ite1][2];
$fin=$derge[$ite1][3];

echo '<b> Section: '.$derge[$ite1][1].'</b><br>';

$i=0;
include("liencoll.php");

try
{
$mysqlClient  = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db12;charset=utf8', 'sql4629280', 'aku@5mp7');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$fichier1="";



for ($x = $deb; $x <= $fin; $x++) {
	
		if ($x<10){$fichier="00".$x;}
		if ($x<100 and $x>9){$fichier="0".$x;}
		if ($x>99){$fichier=$x;}
		
		$fh=file("repository/KanjurDerge/".$fichier.".txt");
		echo '<b>Volume '.$fichier.'</b><br>';
		
			$cestou1="";
		foreach ($fh as $ligne) {
			{
			$long=strlen($txt)-1;
			$next=substr(explode(": ",$fh[$i])[1],0,$long);
			$lintxt=$ligne.$next;
			findAndHighlightSimilarStringDetailed($txt,$lintxt,0.85);
			}

}}

echo 'Results for: ';
foreach ($derge as $derg)
{
	echo '<a href="similar.php?txt='.$txt.'&col='.$col.'&ite='.$derg[0].'">'.$derg[1].'</a> - ';
}