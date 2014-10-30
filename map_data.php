<?php

// Data to access the DB
include("config.ini");

echo("opening Agencies.kml...");

// Storing the kml data we generate
$store_data = fopen("Agencies.kml", "w+");

echo("OK.");

// KML header info
$header = '<?xml version="1.0" encoding="UTF-8"?>
<kml xmlns="http://www.opengis.net/kml/2.2" xmlns:gx="http://www.google.com/kml/ext/2.2" xmlns:kml="http://www.opengis.net/kml/2.2" xmlns:atom="http://www.w3.org/2005/Atom">
<Document>
    <Style id="ActHover">
        <IconStyle>
            <color>ff00ff00</color>
                <Icon>
                  <href>http://maps.google.com/mapfiles/kml/shapes/placemark_circle.png</href>
                </Icon>
        </IconStyle>
        <LabelStyle>
            <color>7f99ff66</color>
        </LabelStyle>
        <BalloonStyle>
            <displaymode>default</displaymode>
            <text><![CDATA[<b>$[name]</br>
            <b>Agency ID: $[Agency ID]</br>
            <b>Parser: $[Parser]</br>
            <b>Account Status: $[Status]</br>
            <b>Creation Date: $[Created]</br>
            <b>Coordinates: $[Latitude],$[Longitude]</br>]]></text>
        </BalloonStyle>
    </Style>
    <StyleMap id="Style-4">
            <Pair>
                <key>normal</key>
                <styleUrl>#ActMap</styleUrl>
            </Pair>
            <Pair>
                <key>highlight</key>
                <styleUrl>#ActHover</styleUrl>
            </Pair>
    </StyleMap>
    <Style id="ActMap">
            <IconStyle>
                <color>7f00ff00</color>
                <Icon>
                  <href>http://maps.google.com/mapfiles/kml/shapes/placemark_circle.png</href>
                </Icon>
            </IconStyle>
            <LabelStyle>
                <color>ff99ff66</color>
                <scale>0</scale>
            </LabelStyle>
            <BalloonStyle>
                <text></text>
            </BalloonStyle>
    </Style>
    <Style id="AwaitingHover">
        <IconStyle>
            <color>ffFFCC00</color>
                <Icon>
                  <href>http://maps.google.com/mapfiles/kml/shapes/placemark_circle.png</href>
                </Icon>
        </IconStyle>
        <LabelStyle>
            <color>ffFFCC33</color>
        </LabelStyle>
        <BalloonStyle>
            <displaymode>default</displaymode>
            <text><![CDATA[<b>$[name]</br>
            <b>Agency ID: $[Agency ID]</br>
            <b>Parser: $[Parser]</br>
            <b>Account Status: $[Status]</br>
            <b>Creation Date: $[Created]</br>
            <b>Coordinates: $[Latitude],$[Longitude]</br>]]></text>
        </BalloonStyle>
    </Style>
    <StyleMap id="Style-0">
            <Pair>
                <key>normal</key>
                <styleUrl>#AwaitingMap</styleUrl>
            </Pair>
            <Pair>
                <key>highlight</key>
                <styleUrl>#AwaitingHover</styleUrl>
            </Pair>
    </StyleMap>
    <Style id="AwaitingMap">
            <IconStyle>
                <color>ffFFCC00</color>
                <Icon>
                  <href>http://maps.google.com/mapfiles/kml/shapes/placemark_circle.png</href>
                </Icon>
            </IconStyle>
            <LabelStyle>
                <color>ffFFCC33</color>
                <scale>0</scale>
            </LabelStyle>
            <BalloonStyle>
                <text></text>
            </BalloonStyle>
    </Style>
    <Style id="BandaidHover">
        <IconStyle>
            <color>ff0050CC</color>
                <Icon>
                  <href>http://maps.google.com/mapfiles/kml/shapes/placemark_circle.png</href>
                </Icon>
        </IconStyle>
        <LabelStyle>
            <color>ff3350CC</color>
        </LabelStyle>
        <BalloonStyle>
            <displaymode>default</displaymode>
            <text><![CDATA[<b>$[name]</br>
            <b>Agency ID: $[Agency ID]</br>
            <b>Parser: $[Parser]</br>
            <b>Account Status: $[Status]</br>
            <b>Creation Date: $[Created]</br>
            <b>Coordinates: $[Latitude],$[Longitude]</br>]]></text>
        </BalloonStyle>
    </Style>
    <StyleMap id="Style-5">
            <Pair>
                <key>normal</key>
                <styleUrl>#BandaidMap</styleUrl>
            </Pair>
            <Pair>
                <key>highlight</key>
                <styleUrl>#BandaidHover</styleUrl>
            </Pair>
    </StyleMap>
    <Style id="BandaidMap">
            <IconStyle>
                <color>ff0050CC</color>
                <Icon>
                  <href>http://maps.google.com/mapfiles/kml/shapes/placemark_circle.png</href>
                </Icon>
            </IconStyle>
            <LabelStyle>
                <color>ff3350CC</color>
                <scale>0</scale>
            </LabelStyle>
            <BalloonStyle>
                <text></text>
            </BalloonStyle>
    </Style>
    <Style id="PolyHover">
        <IconStyle>
            <color>ff9999FF</color>
                <Icon>
                  <href>http://maps.google.com/mapfiles/kml/shapes/placemark_circle.png</href>
                </Icon>
        </IconStyle>
        <LabelStyle>
            <color>ff9933FF</color>
        </LabelStyle>
        <BalloonStyle>
            <displaymode>default</displaymode>
            <text><![CDATA[<b>$[name]</br>
            <b>Agency ID: $[Agency ID]</br>
            <b>Parser: $[Parser]</br>
            <b>Account Status: $[Status]</br>
            <b>Creation Date: $[Created]</br>
            <b>Coordinates: $[Latitude],$[Longitude]</br>]]></text>
        </BalloonStyle>
    </Style>
    <StyleMap id="Style-6">
            <Pair>
                <key>normal</key>
                <styleUrl>#PolyMap</styleUrl>
            </Pair>
            <Pair>
                <key>highlight</key>
                <styleUrl>#PolyHover</styleUrl>
            </Pair>
    </StyleMap>
    <Style id="PolyMap">
            <IconStyle>
                <color>ff9999FF</color>
                <Icon>
                  <href>http://maps.google.com/mapfiles/kml/shapes/placemark_circle.png</href>
                </Icon>
            </IconStyle>
            <LabelStyle>
                <color>ff9933FF</color>
                <scale>0</scale>
            </LabelStyle>
            <BalloonStyle>
                <text></text>
            </BalloonStyle>
    </Style>
    <name>Active911 Agencies</name>';

  // Write header info to kml
  fwrite($store_data,$header);

	//Open a new database connection
	$ro_db = new MYSQLI($server,$user,$pw,$table);

	//Spit an error if the connection fails
	if ($ro_db->connect_errno){

		die('Connect Error (' . $db_ro->connect_errno . ') -' . $db_ro->connect_error);
	}

	//Define the map query
	$map_query = ('SELECT id,name,parser_id,parser_args,status,lat,lon,created FROM agencies');

	//Create an empty array for storage
	$agencies = [];

	if ($result = $ro_db->query($map_query)){
		while ($row = $result->fetch_assoc()){

      // Store kml text in a string
      $body = '
    <Placemark>
        <name><![CDATA['. $row['name']. ']]></name>
        <snippet></snippet>
        <description></description>
        <styleUrl>#Style-' . $row['parser_id'] . '</styleUrl>
        <ExtendedData>
            <Data name="Agency ID">
                <value><![CDATA['. $row['id']. ']]></value>
            </Data>
            <Data name="Parser">
                <value><![CDATA[' . $row['parser_args'] . ']]></value>
            </Data>
            <Data name="Status">
                <value><![CDATA[' . $row['status'] . ']]></value>
            </Data>
            <Data name="Created">
            	<value><![CDATA[' . $row['created'] . ']]></value>
            </Data>
            <Data name="Latitude">
                <value><![CDATA['. $row['lat'] . ']]></value>
            </Data>
            <Data name="Longitude">
                <value><![CDATA[' . $row['lon'] . ']]></value>
            </Data>
        </ExtendedData>
        <Point>
            <coordinates>' . $row['lon'] . ',' . $row['lat'] . ',0</coordinates>
        </Point>
    </Placemark>';

      // Append each data segment to the kml
      fwrite($store_data,$body);
			}

		$result->free();
	}

  // Kml footer string
	$footer =  '
</Document>
</kml>
	';
	//Close the db connection
	$ro_db->close();

  // Finish with footer info
  fwrite($store_data,$footer);

  fclose($store_data);

	die;




?>
