<?php
if(isset($_POST['zip'])) {
    $zip = $_POST['zip'];
} else {
    $zip = "";
}
?>
<form action="curl.php" method="post">
    <label for="zip">Enter Zip Code:</label>
    <input type="text" name="zip" id="zip" value="<?php echo $zip; ?>" />
    <input type="submit" value="GO!" />
</form>
<?php
$key = "16927d9a846341ce92d130341251802";
$url = "http://api.weatherapi.com/v1/forecast.json";
$alerts = "yes";
$aqi = "yes";
$data = [
    "q" => $zip,
    "key" => $key,
    "alerts" => $alerts,
    "aqi" => $aqi,
    ];

if($key!="") {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $data = http_build_query($data);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    $json = json_decode($output);
    echo "<pre>";
    echo $json->current->temp_f . " F<br>";
    echo $json->location->lat . " lat<br>";
    echo $json->location->lon . " lon<br>";
    print_r($json);
    echo "</pre>";
} else {
    echo "No key!";
}
?>