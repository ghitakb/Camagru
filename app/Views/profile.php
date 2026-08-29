<?php

$pageTitle = "Camagru - Profile";

require __DIR__ . "/partials/header.php";

?>

<main class="page-content">
	<h2><?= htmlspecialchars($username ?? "") ?></h2>

	<p>Profile settings will be built here.</p>
</main>

<?php require __DIR__ . "/partials/footer.php"; ?>