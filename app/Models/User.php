<?php

function findUserByUsername(PDO $pdo, string $username): array|false
{
	$statement = $pdo->prepare(
		"SELECT id, username, email, password_hash
		 FROM users
		 WHERE username = :username
		 LIMIT 1"
	);

	$statement->execute([
		"username" => $username
	]);

	return $statement->fetch();
}

function findUserByEmail(PDO $pdo, string $email): array|false
{
	$statement = $pdo->prepare(
		"SELECT id, username, email
		 FROM users
		 WHERE email = :email
		 LIMIT 1"
	);

	$statement->execute([
		"email" => $email
	]);

	return $statement->fetch();
}

function createUser(
	PDO $pdo,
	string $username,
	string $email,
	string $passwordHash
): void
{
	$statement = $pdo->prepare(
		"INSERT INTO users (username, email, password_hash)
		 VALUES (:username, :email, :password_hash)"
	);

	$statement->execute([
		"username" => $username,
		"email" => $email,
		"password_hash" => $passwordHash
	]);
}