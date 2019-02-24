<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Base-theme
 */

?>

<base-post id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_title( '<h1>', '</h1>' ); ?>

	<?php
		the_content();
	?>
</base-post>
