<?php
/** @var \WordPress\Discovery\Site */
$site = $args['site'];

/** @var string */
$uri = $args['uri'];
?>
<hr />
<!-- <p>Site discovered at <code><?php echo htmlspecialchars( $uri ) ?></code></code> -->

<h1><?php echo htmlspecialchars( $site->getName() ) ?></h1>

<?php if ( $desc = $site->getDescription() ): ?>
	<p>Site description: <?php echo htmlspecialchars( $site->getDescription() ) ?></p>
<?php else: ?>
	<p>(No site description found.)</p>
<?php endif ?>

<p><strong>Site URL:</strong> <code><a href="<?php echo htmlspecialchars( $site->getURL() ) ?>"><?php echo htmlspecialchars( $site->getURL() ) ?></a></p></code></p>
<p><strong>API Index:</strong> <code><a href="<?php echo htmlspecialchars( $site->getIndexURL() ) ?>"><?php echo htmlspecialchars( $site->getIndexURL() ) ?></a></p></code></p>

<h2>Supported Namespaces</h2>
<ul>
	<?php foreach ( $site->getSupportedNamespaces() as $namespace ): ?>
		<li><?php echo htmlspecialchars( $namespace ) ?></li>
	<?php endforeach ?>
</ul>

<h2>Supported Authentication Methods</h2>
<ul>
	<?php foreach ( $site->getSupportedAuthentication() as $method ): ?>
		<li><?php echo htmlspecialchars( $method ) ?></li>
	<?php endforeach ?>
</ul>
