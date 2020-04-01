<?php

namespace App\Curl;

Class Curl
{
    public function getWebContent($uri)
    {
        // Initialize CURL
        $curl = curl_init($uri);
        // Set return
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($curl);
        // Disconnect CURL, free
        curl_close($curl);

        return $result;
    }
}
