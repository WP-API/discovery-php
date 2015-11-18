<!DOCTYPE html>
<html>
	<head>
		<title><?php echo htmlspecialchars( $title ) ?></title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<div class="container">
			<h1>WordPress API Discovery</h1>
			<form action="" method="GET">
				<p>
					<label>
						Address to start discovery:
						<input type="url" name="uri" class="uri-input"
							value="<?php echo htmlspecialchars( $uri ) ?>" />
					</label>
					<label class="check-legacy">
						<input type="checkbox" name="legacy"
							<?php if ( $legacy ) echo 'checked' ?> />
						Check for legacy (v2 plugin, pre-WP 4.4) API?
					</label>
				</p>
			</form>
			<?php echo $content ?>
		</div>
	</body>
</html>