<?php

header('Content-Type: application/json; charset=utf-8');

try {
    $host = getenv('DB_HOST');
    $port = getenv('DB_PORT');
    $database = getenv('DB_DATABASE');
    $user = getenv('DB_USERNAME');
    $password = getenv('DB_PASSWORD');

    $pdo = new PDO(
        "pgsql:host=$host;port=$port;dbname=$database",
        $user,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    $result = $pdo->query("SELECT CURRENT_TIMESTAMP");
    $dbTime = $result->fetchColumn();

    echo json_encode([
        'projeto' => 'DevOps Docker Lab',
        'versao' => '2.0.0',
        'status' => 'online',
        'php' => PHP_VERSION,
        'hostname' => gethostname(),
        'database' => [
            'status' => 'connected',
            'timestamp' => $dbTime
        ]
    ], JSON_PRETTY_PRINT);

} catch (PDOException $e) {
    http_response_code(503);

    error_log($e->getMessage());

    echo json_encode([
        'status' => 'error',
        'database' => 'unavailable'
    ]);
}
