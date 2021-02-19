<?php
function USPSParcelRate($weight, $dest_zip, $origin_zip, $pack_size = "REGULAR", $userName, $servicecode)
{
    // =============== DON'T CHANGE BELOW THIS LINE API CALL===============
    $url = "http://Production.ShippingAPIs.com/ShippingAPI.dll";
    $ch = curl_init();
    // set the target url
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // parameters to post
    curl_setopt($ch, CURLOPT_POST, 1);
    $data = "API=RateV4&XML=<RateV4Request USERID=\"$userName\"><Package ID=\"1ST\"><Service>ALL</Service><ZipOrigination>$origin_zip</ZipOrigination><ZipDestination>$dest_zip</ZipDestination><Pounds>0.0</Pounds><Ounces>$weight</Ounces><Container/><Size>$pack_size</Size><Machinable>FALSE</Machinable></Package>
</RateV4Request>";
    // send the POST values to USPS
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $result = curl_exec($ch);
    $data = strstr($result, '<?');
    echo $data; // Uncomment to show XML in comments
    $xml_parser = xml_parser_create();
    xml_parse_into_struct($xml_parser, $data, $vals, $index);
    xml_parser_free($xml_parser);
    $params = array();
    $level = array();
    foreach ($vals as $xml_elem) {
        if ($xml_elem['type'] == 'open') {
            if (array_key_exists('attributes', $xml_elem)) {
                list($level[$xml_elem['level']], $extra) = array_values($xml_elem['attributes']);
            } else {
                $level[$xml_elem['level']] = $xml_elem['tag'];
            }
        }
        if ($xml_elem['type'] == 'complete') {
            $start_level = 1;
            $php_stmt = '$params';
            while ($start_level < $xml_elem['level']) {
                $php_stmt .= '[$level[' . $start_level . ']]';
                $start_level++;
            }
            $php_stmt .= '[$xml_elem[\'tag\']] = $xml_elem[\'value\'];';
            eval($php_stmt);
        }
    }
    curl_close($ch);
    // echo '<pre>'; print_r($params); echo'</pre>'; // Uncomment to see the full array
    return $params['RATEV3RESPONSE']['1ST'][$servicecode]['RATE'];
}

// $res = USPSParcelRate($weight, $dest_zip, $origin_zip, "REGULAR", $userName, $servicecode);
// function USPSParcelRate($weight, $dest_zip, $origin_zip, $pack_size = "REGULAR", $userName, $servicecode)
$res = USPSParcelRate("8.0", "03060", "04544", "REGULAR", "981ALCHE4825", "1");

echo "Price " . $res;
?>

The available usps methods are follows.

//Domestic Services The USPS updated their Services Name on last month Aprl2013


/* Customized For getting Service name and Price as array*/

function filterServiceName($serviceName) {
    $serviceNameKey = str_replace("&lt;sup&gt;&amp;reg;&lt;/sup&gt;", "", $serviceName);
    $serviceNameKey = str_replace("&lt;sup&gt;&amp;trade;&lt;/sup&gt;", "", $serviceNameKey);
    $serviceNameKey = str_replace("&lt;sup&gt;&#8482;&lt;/sup&gt;", "", $serviceNameKey);
    $serviceNameKey = str_replace("&lt;sup&gt;&#174;&lt;/sup&gt;", "", $serviceNameKey);
    $serviceNameKey = str_replace("l&lt;sup&gt;&#174;&lt;/sup&gt;", "", $serviceNameKey);
    return $serviceNameKey;
}

function removeDay($serviceName) {
    $serviceName = str_replace(array(' 1-Day',' 2-Day',' 3-Day',' Military',' DPO'), '', $serviceName);
    return $serviceName;
}

$ship_postage = '';
$servicesNotConfigurated = array();
$document_xml = new DomDocument; // Instanciation d'un DOMDocument
$new_xml = $data;
$document_xml->loadXML($new_xml); // On charge
$matchingNodes = $document_xml->getElementsByTagName("Postage");
// print_r($matchingNodes);
if ($matchingNodes != NULL) {
    for ($i = 0; $i < $matchingNodes->length; $i++) {
        $currNode = $matchingNodes->item($i);
        $serviceName = $currNode->getElementsByTagName("MailService");
        $serviceName = $serviceName->item(0);
        $serviceNameKey = filterServiceName($serviceName->nodeValue);
        $serviceNameKey = removeDay($serviceNameKey);
        if (!isset($ship_postage[$serviceNameKey])) {
            $ship_postage[$serviceNameKey] ['rate'] = 0;
        }
        $this_rate = $currNode->getElementsByTagName("Rate");
        $this_rate = $this_rate->item(0);
        $this_rate = $this_rate->nodeValue;
        $ship_postage[$serviceNameKey] ['rate'] = $this_rate;
    }
    echo "
    <pre />";
    print_r($ship_postage);
}
    /* Customized */