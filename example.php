<?php

require_once 'logic/IPGeolocationAPI.php';

try {
    // Create an instance of the API class
    // It will automatically load the config file
    $ipApi = new IPGeolocationAPI();

    $ip = '1.1.1.1';

    // Use the API as before
    echo "Country: " . $ipApi->getCountry($ip) . "\n";
    echo "City: " . $ipApi->getCity($ip) . "\n";
    // ... other method calls

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>