<?php

$pageTitle = "Camagru - Studio";

require __DIR__ . "/partials/header.php";

?>

<main class="page-content">
	<h2>Welcome <?= htmlspecialchars($username ?? "") ?></h2>

	<p>The photo editor will be built here.</p>
</main>

<?php require __DIR__ . "/partials/footer.php"; ?>