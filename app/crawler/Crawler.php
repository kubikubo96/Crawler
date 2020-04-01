<?php

namespace App\Crawler;

class Crawler
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

    public function getSpecificData($regex, $uri)
    {
        preg_match_all($regex, $this->getWebContent($uri), $matches);
        return !empty($matches[1]) ? $matches[1] : FALSE;
    }
}