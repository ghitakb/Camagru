<?php

function startSession(): void
{
	if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
}

function isLoggedIn(): bool
{
	startSession();

	return isset($_SESSION["user_id"]);
}

function requireLogin(): void
{
	startSession();

	if (!isset($_SESSION["user_id"])) {
		header("Location: /login.php", true, 302);
		exit;
	}
}

function currentUserId(): ?int
{
	startSession();

	if (!isset($_SESSION["user_id"])) {
		return null;
	}

	return (int) $_SESSION["user_id"];
}

function currentUsername(): ?string
{
	startSession();

	return $_SESSION["username"] ?? null;
}