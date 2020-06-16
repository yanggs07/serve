<?php

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
echo $url;
