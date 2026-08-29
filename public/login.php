<?php

require_once __DIR__ . "/../config/database.php";
require_once __DIR__ . "/../app/Models/User.php";

session_start();

$username = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

	$username = trim($_POST["username"] ?? "");
	$password = $_POST["password"] ?? "";

	if ($username === "") {
		$errors[] = "Username is required.";
	}

	if ($password === "") {
		$errors[] = "Password is required.";
	}

	if (empty($errors)) {

		try {
			$pdo = connectDatabase();

			$user = findUserByUsername($pdo, $username);

			if (
				!$user ||
				!password_verify($password, $user["password_hash"])
			) {
				$errors[] = "Invalid username or password.";
			}
			else {
				session_regenerate_id(true);

				$_SESSION["user_id"] = (int) $user["id"];
				$_SESSION["username"] = $user["username"];

				header("Location: /", true, 303);
				exit;
			}

		}
		catch (PDOException $exception) {
			error_log($exception->getMessage());

			$errors[] = "Login failed. Please try again.";
		}
	}
}

require __DIR__ . "/../app/Views/login.php";