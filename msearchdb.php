<?php

include_once("includes/config.php");

$center_lat = ( isset( $_SESSION['lat'] ) ? $_SESSION['lat'] : 44.767742); # You could replace these "0"s with the

$center_lng = ( isset( $_SESSION['lng'] ) ? $_SESSION['lng'] : -93.277723 ); # Lat/Lng of a default location.




function xml_entities($value) {

    return strtr(

        $value, 

        array(

            "<" => "&lt;",

            ">" => "&gt;",

            '"' => "&quot;",

            "'" => "&apos;",

            "&" => "&amp;",

            )

        );

}

if(isset($_REQUEST['search_term'])){

	$search_term = mysql_real_escape_string(trim($_REQUEST['search_term']));

    // Search the rows in the markers table

$query = sprintf("SELECT address, name, lat, lng, ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM markers HAVING distance <= '%s' ORDER BY distance LIMIT 10",

  mysql_real_escape_string($center_lat),

  mysql_real_escape_string($center_lng),

  mysql_real_escape_string($center_lat),

  mysql_real_escape_string($search_term));

 

$result = mysql_query($query);

if (!$result) {

  die("Invalid query: " . mysql_error());

}

$markers = array();



        while ($row = @mysql_fetch_assoc($result)){

            extract($row);

            $markers[] = "<marker name='".xml_entities($name)."' address='".xml_entities($address)."' lat='{$lat}' lng='{$lng}' type='{$type}' />";

        }



        if(count($markers)){

            header("Content-type: text/xml");

            echo '<markers>'.implode('', $markers).'</markers>';

        }

}

?>