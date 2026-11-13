<?php
$id = $_GET['id'] ?? '';
$typ = $_GET['typ'] ?? '';
if ($typ==1) {$idn="K".$id;}
if ($typ==2) {$idn="T".$id;}
if ($typ==3) {$idn="G".$id;}
if ($typ==5) {$idn="B".$id;}


header("Location: rkts1/pages/detail.html?id={$idn}", true, 301);
exit;
?>

