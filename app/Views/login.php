<?php

$pageTitle = "Camagru - Login";

require __DIR__ . "/partials/header.php";

?>

<main class="page-content">
	<h2>Login to your account</h2>

	<?php if (!empty($errors)): ?>
		<ul>
			<?php foreach ($errors as $error): ?>
				<li><?= htmlspecialchars($error) ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

	<form method="POST" action="/login.php">
		<label for="username">Username</label>
		<input
			type="text"
			id="username"
			name="username"
			value="<?= htmlspecialchars($username) ?>"
			autocomplete="username"
			required
		>

		<label for="password">Password</label>
		<input
			type="password"
			id="password"
			name="password"
			autocomplete="current-password"
			required
		>

		<button type="submit">Login</button>
	</form>
</main>

<?php require __DIR__ . "/partials/footer.php"; ?>