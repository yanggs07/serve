<?php

use Jenssegers\ImageHash\ImageHash;
use Jenssegers\ImageHash\Implementations\AverageHash;
use Jenssegers\ImageHash\Implementations\DifferenceHash;
use Jenssegers\ImageHash\Implementations\PerceptualHash;
use Kodus\ImageHash\ImageHasher;

require 'vendor/autoload.php';

$url = '';
if (isset($_SERVER['REQUEST_URI'])) {
    parse_str(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY), $query);
    if (isset($query['q'])) {
        $url = $query['q'];
    }
}
if (!$url) {
    $url = 'test.jpg';
}
$content = file_get_contents($url);
file_put_contents('tmp/image', $content);

$data = [
    'url' => $url,
    'md5' => md5($content),
    'jAverage' => (new ImageHash(new AverageHash()))->hash($content)->toHex(),
    'jDifference' => (new ImageHash(new DifferenceHash()))->hash($content)->toHex(),
    'jPerceptual' => (new ImageHash(new PerceptualHash()))->hash($content)->toHex(),
    'kPhash' => base_convert((new ImageHasher())->pHash('tmp/image'), 2, 16),
    'kDhash' => base_convert((new ImageHasher())->dHash('tmp/image'), 2, 16),
];

echo json_encode($data);
