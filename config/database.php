<?php

function connectDatabase(): PDO
{
    $host = getenv("DB_HOST");
    $port = getenv("DB_PORT");
    $database = getenv("DB_NAME");
    $user = getenv("DB_USER");
    $password = getenv("DB_PASSWORD");

    $dsn = "mysql:host=$host;port=$port;dbname=$database;charset=utf8mb4";

    return new PDO(
        $dsn,
        $user,
        $password,
        [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			// means database errors should throw exceptions instead of silently failing
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			// means rows retrieved from the database should normally look like associative arrays
            PDO::ATTR_EMULATE_PREPARES => false
			// tells PDO to use native prepared statements where supported.
        ]
    );
}

// getenv()
// → gets runtime configuration

// $dsn
// → identifies database type/location/database

// new PDO(...)
// → actually opens the connection