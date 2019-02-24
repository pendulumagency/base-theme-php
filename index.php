<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Base-theme
 */

require __DIR__ . "/header.php";
?>


<body <?php body_class(); ?>>
	<base-page-wrapper>
		<base-page>
			<header>
				<base-top-navigation></base-top-navigation>
			</header>

			<div id="content" class="site-content">
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
			</div><!-- #content -->

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
		console.log(_wpSiteInfo);
	</script>

	<?php wp_footer(); ?>

</body>
</html>
