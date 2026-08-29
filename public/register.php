<?php

require_once __DIR__ . "/../config/database.php";
require_once __DIR__ . "/../app/Models/User.php";

	$requestMethod = $_SERVER["REQUEST_METHOD"];

	$username = "";
	$email = "";
	$errors = [];
	$success = isset($_GET["registered"])
    && $_GET["registered"] === "1";;

	if ($requestMethod === "POST") {
		$username = trim($_POST["username"] ?? "");
		if ($username === "") {
			$errors[] = "Username is required.";
		}

		$email = trim($_POST["email"] ?? "");
		if ($email === "") {
			$errors[] = "Email is required.";
		}
		else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errors[] = "Email is not valid.";
		}

		$password = $_POST["password"] ?? "";
		if ($password === "") {
			$errors[] = "Password is required.";
		}
		else if (strlen($password) < 8) {
			$errors[] = "Password must be at least 8 characters long.";
		}

		$passwordConfirmation = $_POST["password_confirmation"] ?? "";
		if ($passwordConfirmation === "") {
			$errors[] = "Password confirmation is required.";
		}
		else if ($password !== $passwordConfirmation) {
			$errors[] = "Passwords do not match.";
		}

		if (empty($errors)) {

			try {
				$pdo = connectDatabase();

				if (findUserByUsername($pdo, $username)) {
					$errors[] = "Username is already taken.";
				}

				if (findUserByEmail($pdo, $email)) {
					$errors[] = "Email is already registered.";
				}

				if (empty($errors)) {

					$passwordHash = password_hash(
						$password,
						PASSWORD_DEFAULT
					);

					createUser($pdo, $username, $email, $passwordHash);

					// $success = true;
					header("Location: /register.php?registered=1", true, 303);
					exit;
				}

			} catch (PDOException $exception) {

				error_log($exception->getMessage());

				$errors[] = "Registration failed. Please try again.";
			}
		}

		// var_dump($errors);
		// error_log(print_r($errors, true));
	}

	require __DIR__ . "/../app/Views/register.php";
?>
