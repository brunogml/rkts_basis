<?php
// results2.php
$text = $_GET['text'] ?? '';
$encoded = str_replace('%20', '+', urlencode(urldecode($text)));
header("Location: /rkts1/pages/results.html?text={$encoded}&typ=1&typ2=1", true, 301);
exit;
?>


