<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
	http_response_code(405);
	exit;
}

$_SESSION = [];

session_destroy();

header("Location: /", true, 303);
exit;