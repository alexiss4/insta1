<?php
class InstagramAPI {
    private $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36';

    public function getMediaInfo($url) {
        $mediaId = $this->getMediaIdFromUrl($url);
        if (!$mediaId) {
            return false;
        }

        $jsonData = $this->fetchJsonData($mediaId);
        if (!$jsonData) {
            return false;
        }

        return $this->parseJsonData($jsonData);
    }

    private function getMediaIdFromUrl($url) {
        preg_match('/instagram.com\/p\/([^\/]+)/', $url, $matches);
        return isset($matches[1]) ? $matches[1] : false;
    }

    private function fetchJsonData($mediaId) {
        $url = "https://www.instagram.com/p/{$mediaId}/?__a=1";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent);
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    private function parseJsonData($jsonData) {
        if (!isset($jsonData['graphql']['shortcode_media'])) {
            return false;
        }

        $media = $jsonData['graphql']['shortcode_media'];
        $type = $media['__typename'];

        switch ($type) {
            case 'GraphImage':
                return [
                    'type' => 'image',
                    'url' => $media['display_url'],
                    'caption' => $media['edge_media_to_caption']['edges'][0]['node']['text'] ?? '',
                ];
            case 'GraphVideo':
                return [
                    'type' => 'video',
                    'url' => $media['video_url'],
                    'thumbnail' => $media['display_url'],
                    'caption' => $media['edge_media_to_caption']['edges'][0]['node']['text'] ?? '',
                ];
            case 'GraphSidecar':
                $items = [];
                foreach ($media['edge_sidecar_to_children']['edges'] as $edge) {
                    $node = $edge['node'];
                    $items[] = [
                        'type' => $node['__typename'] == 'GraphVideo' ? 'video' : 'image',
                        'url' => $node['__typename'] == 'GraphVideo' ? $node['video_url'] : $node['display_url'],
                    ];
                }
                return [
                    'type' => 'carousel',
                    'items' => $items,
                    'caption' => $media['edge_media_to_caption']['edges'][0]['node']['text'] ?? '',
                ];
            default:
                return false;
        }
    }
}