<?php
$request_doc_template = <<<EOT
<xml version="1.0"?>
<RateV4Request USERID="981ALCHE4825">
    <Revision>2</Revision>
    <Package ID="0">
        <Service>PRIORITY</Service>
        <ZipOrigination>04544</ZipOrigination>
        <ZipDestination>93060</ZipDestination>
        <Pounds>50</Pounds>
        <Ounces>8</Ounces>
        <Container></Container>
        <Width></Width>
        <Length></Length>
        <Height></Height>
        <Girth></Girth>
        <Machinable>TRUE</Machinable>
    </Package>
    <Package ID="1">
    <Service>USPS RETAIL GROUND</Service>
    <ZipOrigination>04544</ZipOrigination>
    <ZipDestination>93060</ZipDestination>
    <Pounds>50</Pounds>
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
// echo $url . "\n\n";

$response = file_get_contents($url);
// print_r($response);
$xml = simplexml_load_string($response) or die("Error: Cannot create object");

// print_r( explode("=>", $xml ));
// print_r( $xml );
// echo "<br><br>";

echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>';
echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
echo '</head>';
echo '<body>';

$rate = 0;
$rateStr = "";
// echo '<table border="1">';
for ($pkgNum = 0; $pkgNum < 2; $pkgNum++) {

    for ($i = 0; $i < 100; $i++) {
        if ($xml->Package[$pkgNum] == null) {
            break;
        }
        if ($xml->Package[$pkgNum]->Postage[$i] == null) {
            break;
        }
        $x = $xml->Package[$pkgNum]->Postage[$i]->MailService;
        // $s = strstr( $x, "Express");
        // if ( $s != false ) {
        //     continue;
        // }

        $x = str_replace("&lt;sup&gt;&#8482;&lt;/sup&gt;", " ", $x);
        $x = str_replace("&lt;sup&gt;&#174;&lt;/sup&gt;", " ", $x);
        // echo '<tr>';
        $y = $xml->Package[$pkgNum]->Postage[$i]->Rate;
        $floatVal = floatval($y);
        $rate = number_format($floatVal, 2);

        // echo $x . " = " . $y . "<br>";

        // // 
        // if ($i == 8) {
        //     echo '<b>';
        // }
        // echo '<td>';
        // echo $i;
        // echo '</td>';

        // echo '<td>';
        // if ($i == 8 || $i == 18) {
        //     echo '<b>';
        // }
        // echo $x;
        // if ($i == 8 || $i == 18) {
        //     echo '</b>';
        // }
        // echo '</td>';

        // echo '<td>';
        // if ($i == 8 || $i == 18) {
        //     echo '<b>';
        // }
        // echo $y;
        // if ($i == 8 || $i == 18) {
        //     echo '</b>';
        // }
        // echo '</td>';

        // echo '</tr>';
    }
}
// echo '</table>';

echo '<script>';
echo 'sessionStorage.removeItem("shipping");';
echo 'sessionStorage.setItem( "shipping", ' . $rate . ' );';
echo 'var test = sessionStorage.getItem("shipping");';
echo 'window.history.back();';

echo '</script>';

echo '</body>';
echo '</html>';
