<?php

$id=$_GET['id'];



 $json = file_get_contents("https://iiif.bdrc.io/".$id."/info.json");


echo '<div id="openseadragon1" style="width: 100%; height:100%; border:1px solid #08088a;"></div>';



echo '
<script src="seadragon/openseadragon.min.js"></script>
<script type="text/javascript">
    var viewer = OpenSeadragon({
		 maxZoomLevel: 5.0,
        id: "openseadragon1",
        prefixUrl: "seadragon/images/",

		sequenceMode: true,
		
   tileSources:   
   [
	  '.$json.'
   ]
    });
	
</script>';

