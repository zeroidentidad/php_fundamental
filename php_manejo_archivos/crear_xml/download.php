<?php

require_once('data_source/places.php');

$id = isset( $_GET['id'] ) ? $_GET['id'] : '';

$record = $arr_data[ $id ];

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='. $record['name'] .'.kml');
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<kml xmlns="http://www.opengis.net/kml/2.2"> 
    <Placemark>
    <name><?php echo $record['name']; ?></name>
    <description><?php echo $record['description']; ?></description>
    <Point>
        <coordinates><?php echo $record['lat_lng']; ?>,0</coordinates>
    </Point>
    </Placemark> 
 </kml>