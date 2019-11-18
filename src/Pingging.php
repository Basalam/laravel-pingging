<?php

namespace Basalam\Pingging;

class Pingging
{
    public function ping($title, $url)
    {
        $services = config('pingging.services');

        $xml = $this->generateXML($this->title, $this->url);

        foreach ($services as $service) {
            $this->send($service, $xml);
        }

        return true;
    }

    private function generateXML($title, $url)
    {
        return view('pigging::ping', [
            'title' => $title,
            'url'   => $url,
        ])->render();
    }

    private function send($url, $post)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
