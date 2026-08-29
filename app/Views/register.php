<?php

$pageTitle = "Camagru - Register";

require __DIR__ . "/partials/header.php";

?>

<main class="page-content auth-page">
	<h2>Create a new account</h2>
	<p>Fill out the form below to create an account.</p>

	<?php if (!empty($errors)): ?>
		<ul class="form-errors">
			<?php foreach ($errors as $error): ?>
				<li>
					<?= htmlspecialchars($error) ?>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

	<form method="POST" class="auth-form">

		<div class="form-group">
			<label for="username">Username</label>

			<input
				type="text"
				id="username"
				name="username"
				autocomplete="username"
				value="<?= htmlspecialchars($username) ?>"
				placeholder="Enter your username"
				required>
		</div>

		<div class="form-group">
			<label for="email">Email</label>

			<input
				type="email"
				id="email"
				name="email"
				autocomplete="email"
				value="<?= htmlspecialchars($email) ?>"
				placeholder="Enter your email"
				required>
		</div>

		<div class="form-group">
			<label for="password">Password</label>

			<input
				type="password"
				id="password"
				name="password"
				minlength="8"
				autocomplete="new-password"
				placeholder="Enter your password"
				required>
		</div>

		<div class="form-group">
			<label for="password_confirmation">Confirm Password</label>

			<input
				type="password"
				id="password_confirmation"
				name="password_confirmation"
				autocomplete="new-password"
				placeholder="Confirm your password"
				required>
		</div>

		<button type="submit">Create an account</button>

	</form>

	<?php if ($success): ?>

		<p>Account created successfully.</p>

	<?php endif; ?>

</main>

<?php require __DIR__ . "/partials/footer.php"; ?>