<?php

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
            
            if ($similarity > $bestSimilarity && $similarity >= $minSimilarity) {
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
            $result .= '<span style="color: green; font-weight: bold;">' . htmlspecialchars($foundChar) . '</span>';
        } else {
            // Different character - highlight in red
            if ($foundChar !== '') {
                $result .= '<span style="color: red; font-weight: bold;">' . htmlspecialchars($foundChar) . '</span>';
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
        echo "<p><strong>Similarity:</strong> " . number_format($result['similarity'] * 100, 2) . "%</p>";
		echo '<hr>';
    }
    
    return $result;
}

// Example usage
$stringA = "chos kyi rgyal po";
$stringB = "This is a example chos rgyal po with some text";

$result1 = findAndHighlightSimilarStringDetailed($stringA, $stringB, 0.6);

$stringA = "hello world xxxbxxx";
$stringB = "This is a helo wrld xxxsxxx example with some text";

$result1 = findAndHighlightSimilarStringDetailed($stringA, $stringB, 0.6);

?>