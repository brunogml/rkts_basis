<?php
echo '<table>';
$xml=simplexml_load_file('abb.xml');

foreach($xml->item as $item)
{
	echo '<tr><td style="font-size:25px;">'.$item->abb.'<td style="font-size:25px;">'.$item->tib;
}