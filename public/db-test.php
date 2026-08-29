<?php

require_once __DIR__ . "/../config/database.php";

try {
    $pdo = connectDatabase();

    $statement = $pdo->query(
        "SELECT COUNT(*) AS user_count FROM users"
    );

    $result = $statement->fetch();

    echo "Database connected successfully.<br>";
    echo "Users in database: " . (int) $result["user_count"];

} catch (PDOException $exception) {

    http_response_code(500);

    error_log($exception->getMessage());

    echo "Database connection failed.";
}