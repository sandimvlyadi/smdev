<?php

namespace Sandimvlyadi\Smdev;

use Illuminate\Support\Facades\Http;

class Hook
{
    private static function getSignature($payloads = '', $secret = '')
    {
        $signature = hash_hmac('sha256', $payloads, $secret, true);
        return base64_encode($signature);
    }

    public static function send($message = '')
    {
        // params
        $timestamp = date('Y-m-d H:i:s');

        // parsing env
        $url = env('SMDEV_WEBHOOK', '');
        $env = str_replace('http://', '', $url);
        $env = str_replace('https://', '', $env);
        $env = explode('/', $env);
        if (count($env) != 5) {
            return null;
        }
        
        // collecting env data
        $host = $env[0];
        $path = $env[1];
        $clientId = $env[2];
        $clientSecret = $env[3];
        $clientToken = $env[4];

        // generate payload
        $payloads = new \stdClass();
        $payloads->message = $message;
        $payloads = json_encode($payloads);

        // generate signature
        $param = "timestamp={$timestamp}&body={$payloads}";
        $signature = self::getSignature($param, $clientSecret);

        return Http::withOptions([
            'verify' => false,
        ])->withHeaders([
            'Content-Type' => 'application/json',
            'Smdev-Timestamp' => $timestamp,
            'Smdev-Signature' => $signature,
        ])->withBody($payloads, 'json')->post($url);
    }
}