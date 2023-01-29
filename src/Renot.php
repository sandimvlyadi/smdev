<?php

namespace Sandimvlyadi\Smdev;

use Illuminate\Support\Facades\Http;

class Renot
{
    public static function send($message = '', $target = '')
    {
        if ($message == '') {
            return 'Message is empty.';
        }

        $url = env('RENOT_URL', '');
        if ($url == '') {
            return 'URL is empty. Please add RENOT_URL in your .env file.';
        }

        $payloads = new \stdClass();
        $payloads->message = $message;
        if ($target != '') {
            $payloads->target = $target;
        }
        $payloads = json_encode($payloads);

        return Http::withOptions([
            'verify' => false,
        ])->withHeaders([
            'Content-Type' => 'application/json',
        ])->withBody($payloads, 'json')->post($url);
    }
}