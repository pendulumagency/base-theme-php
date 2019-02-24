<!doctype html>
<html <?php language_attributes(); ?>>

<?php require __DIR__ . "/head.php"; ?>

<body <?php body_class(); ?>>
	<base-page-wrapper>
		<base-page>
			<header>
				<base-top-navigation></base-top-navigation>
			</header>

			<main>
				<base-content-container>

					<?php
					if (is_page()) {
						require __DIR__ . "/page.php";
					} else if (is_single()) {
						require __DIR__ . "/single.php";
					} else if (is_404()) {
						require __DIR__ . "/404.php";
					} else if (is_search()) {
						require __DIR__ . "/search.php";
					} else if (is_archive()) {
						require __DIR__ . "/archive.php";
					} else {
						require __DIR__ . "/default.php";
					} ?>

				</base-content-container>
			</main>

			<?php require __DIR__ . "/footer.php"; ?>

		</base-page>
	</base-page-wrapper> <!-- .base-page-wrapper -->

	<?php
		$wpSiteInfo = [
			'siteUrl' => get_site_url(),
			'siteDisplayName' => get_bloginfo( 'name', 'display' ),
			'homeUrl' => home_url( '/' )
		];

		$customLogoId = get_theme_mod( 'custom_logo' );

		if ($customLogoId) {
			$customLogo = [];

			$customLogo['imageAlt'] = get_post_meta( $customLogoId, '_wp_attachment_image_alt', true );

			// TODO: Get data about image and its available sizes rather than raw HTML
			$customLogo['imageHtml'] = wp_get_attachment_image( $customLogoId, 'full', false);

			$wpSiteInfo['customLogo'] = $customLogo;
		}
	?>

	<script>
		var _wpSiteInfo = <?php echo json_encode($wpSiteInfo); ?>;
	</script>

	<?php wp_footer(); ?>

</body>
</html>
