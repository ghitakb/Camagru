<nav class="site-nav">
	<a href="/">Gallery</a>

	<?php if ($loggedIn): ?>

		<a href="/studio.php">Studio</a>
		<a href="/profile.php">Profile</a>

		<form method="POST" action="/logout.php">
			<button type="submit">Logout</button>
		</form>

	<?php else: ?>

		<a href="/login.php">Login</a>
		<a href="/register.php">Register</a>

	<?php endif; ?>
</nav>