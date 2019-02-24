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

?>


<base-content-container>
	<main id="main" class="site-main">

	<?php
	if ( have_posts() ) :

		if ( is_home() && ! is_front_page() ) :
			?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>
			<?php
		endif;

		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			/*
				* Include the Post-Type-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Type name) and that will be used instead.
				*/
			get_template_part( BaseThemeDirectory . '/template-parts/content', get_post_type() );

		endwhile;

		the_posts_navigation();

	else :

		get_template_part( BaseThemeDirectory . '/template-parts/content', 'none' );

	endif;
	?>

	</main><!-- #main -->
</base-content-container>

<?php
}

require __DIR__ . "/footer.php";