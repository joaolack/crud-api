<?php

require_once __DIR__ . '/../config/config.php';

$origin = $_SERVER['HTTP_ORIGIN'] ?? '';

in_array($origin, $allowedOrigins) ? 
    header("Access-Control-Allow-Origin: $origin") : null;
header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}    

$uri = strtok($_SERVER['REQUEST_URI'], '?');

match ($uri) {
    '/api/users' => require __DIR__ . '/../src/api.php',
    '/docs' => require __DIR__ . '/docs/views/docs.html',
    '/docs/openapi.yaml' => serveOpenApi(__DIR__ . '/docs/openapi.yaml'),
    default => notFound(),
};

function serveOpenApi(string $file): void {
    if (!file_exists($file)) {
        notFound();
        return;
    }

    header('Content-Type: application/yaml; charset=utf-8');
    readfile($file);
}

function notFound(): void {
    http_response_code(404);
    echo json_encode(['error' => 'Not found']);
}
