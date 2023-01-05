<html>

	<?php
		if (session_status() === PHP_SESSION_NONE) {
    		session_start();
		}
	?>

	<head>
		<link rel="stylesheet" href="/style.css">
<!--        <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>-->
		<title>Song of the Day</title>
	</head>

	<header>
		<div id="nav-bar">
			<h1>Song of the Day</h1>
			<ul id="nav-list">
				<li class="nav-list-item"><a class="nav-link" href="/">Home</a></li>
				<li class="nav-list-item"><a class="nav-link" href="/suggestions">Suggestions</a></li>
				<li class="nav-list-item"><a class="nav-link" href="/admin">Admin</a></li>
				<?php
					if (isset($_SESSION['admin']) && $_SESSION['admin'] === True) {
						echo '<li class="nav-list-item"><a class="nav-link" href="/logout">Logout</a></li>';
					}
				?>
					
			</ul>
			<br>
			<button class="suggestion-btn" onclick="toggleForm(this, this.nextElementSibling)">Make a suggestion!</button>
			<button class="suggestion-btn" onclick="toggleForm(this, this.previousElementSibling)" style="display: none">Hide Form</button>
			<form id="suggestion-form" action="/api/suggestions" method="post">
				<input type="text" id="sg-name" name="sg_name" class="sg-input" placeholder="Your Name" required>
				<input type="text" id="sg-song" name="sg_song" class="sg-input" placeholder="Song Title" required>
				<input type="text" id="sg-artist" name="sg_artist" class="sg-input" placeholder="Artist" required>
				<input type="text" id="sg-link" name="sg_link" class="sg-input" placeholder="Link (optional)">
				<input type="submit" class="sg-input">
			</form>
		</div>
	</header>

	<body>
        @yield('content')
    </body>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="/sotd.js"></script>

</html>
