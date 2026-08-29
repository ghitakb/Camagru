<?php

require_once __DIR__ . "/../../Helpers/auth.php";

$pageTitle = $pageTitle ?? "Camagru";
$loggedIn = isLoggedIn();

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title><?= htmlspecialchars($pageTitle) ?></title>
		<link rel="stylesheet" href="/css/style.css">
	</head>

	<body>
		<header class="site-header">
			<h1 class="site-title">Camagru</h1>

			<?php require __DIR__ . "/nav.php"; ?>
		</header>