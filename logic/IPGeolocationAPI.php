<?php

class IPGeolocationAPI {
    private $apiUrl = "https://banproxy.com/api/";
    private $apiKey;

    public function __construct($configPath = 'config.php') {
        $config = require $configPath;
        $this->apiKey = $config['api_key'] ?? null;

        if (!$this->apiKey) {
            throw new Exception('API key not found in configuration file.');
        }
    }

    public function getIPInfo($ip) {
        $url = $this->apiUrl . $this->apiKey;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new Exception('Curl error: ' . curl_error($ch));
        }

        curl_close($ch);

        $result = json_decode($response, true);

        if (isset($result['status']) && $result['status'] === 'success') {
            return $result;
        } else {
            throw new Exception('API request failed: ' . ($result['message'] ?? 'Unknown error'));
        }
    }

    public function getCountry($ip) {
        $info = $this->getIPInfo($ip);
        return $info['country'] ?? null;
    }

    public function getCity($ip) {
        $info = $this->getIPInfo($ip);
        return $info['city'] ?? null;
    }

    public function getISP($ip) {
        $info = $this->getIPInfo($ip);
        return $info['isp'] ?? null;
    }

    public function getCoordinates($ip) {
        $info = $this->getIPInfo($ip);
        return [
            'latitude' => $info['lat'] ?? null,
            'longitude' => $info['lon'] ?? null
        ];
    }

    public function getTimezone($ip) {
        $info = $this->getIPInfo($ip);
        return $info['timezone'] ?? null;
    }
}
?>