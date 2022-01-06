<?php

require_once __DIR__ . '/vendor/autoload.php';

use UAParser\Parser;

$userAgent = $_SERVER['HTTP_USER_AGENT'];

$parser = Parser::create();
$result = $parser->parse($userAgent);

header("Content-Type: application/json");
$data = array(
    "browser" => $result->ua->toString(),
    "os" => $result->os->toString(),
    "device" => $result->device->toString(),
    "userAgent" => $userAgent
);
echo json_encode($data, JSON_PRETTY_PRINT);
die;