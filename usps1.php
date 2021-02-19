<?php
$request_doc_template = <<<EOT
<xml version="1.0"?>
<RateV4Request USERID="981ALCHE4825">
    <Revision>2</Revision>
    <Package ID="0">
        <Service>RETAIL GROUND</Service>
        <ZipOrigination>04544</ZipOrigination>
        <ZipDestination>93060</ZipDestination>
        <Pounds>1</Pounds>
        <Ounces>8</Ounces>
        <Container></Container>
        <Width></Width>
        <Length></Length>
        <Height></Height>
        <Girth></Girth>
        <Machinable>TRUE</Machinable>
    </Package>
</RateV4Request>
EOT;
$doc_string = preg_replace('/[\t\n]/', '', $request_doc_template);
$doc_string = urlencode($doc_string);

$url = "https://secure.shippingapis.com/ShippingAPI.dll?API=RateV4&XML=" . $doc_string;
echo $url . "\n\n";

$response = file_get_contents($url);
// print_r($response);
$xml = simplexml_load_string($response) or die("Error: Cannot create object");
// print_r($xml);

echo "Rate: " . $xml->Package->Postage->Rate . "\n";
?>
