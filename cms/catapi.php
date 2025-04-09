<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Cat Picture</title>
    <meta http-equiv="refresh" content="20">  <!-- Refresh every 20 seconds -->
</head>
<body>
    <h1>Get a Random Cat Picture!</h1>
    <div id="catImageContainer">
        <!-- Cat image will appear here -->
        <?php
        // Your API key for The Cat API
        $apiKey = "live_5biYoEP41PopVZ3Yq5AVCKQz80UUmp5t7EPuxbZa9vIV9BkrEpskEQPnO0H67pv4";

        // The URL for the Cat API to get a random cat image
        $url = "https://api.thecatapi.com/v1/images/search";

        // Initialize cURL session
        $ch = curl_init();

        // Set the cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "x-api-key: " . $apiKey
        ));

        // Execute the cURL request
        $output = curl_exec($ch);

        // Close the cURL session
        curl_close($ch);

        // Decode the JSON response
        $json = json_decode($output, true);

        // Check if the response contains a valid image
        if (isset($json[0]['url'])) {
            $catImageUrl = $json[0]['url'];
            // Display the image
            echo "<img src='" . $catImageUrl . "' alt='Random Cat' style='max-width: 100%; height: auto;' />";
        } else {
            echo "Sorry, no cat image found!";
        }
        ?>
    </div>
</body>
</html>
