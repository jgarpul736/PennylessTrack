<?php
require __DIR__ . '/../vendor/autoload.php';

use Alumnot\PennylessTrack\Health;
use Alumnot\PennylessTrack\Version;

header('Content-Type: application/json');
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($path === '/healthz') {
    echo json_encode(Health::status());
    exit;
}

if ($path === '/version') {
    echo json_encode(['version' => Version::get()]);
    exit;
}

http_response_code(404);
echo json_encode(['error' => 'not found']);
?>