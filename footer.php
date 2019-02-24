<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Base-theme
 */

?>

<footer id="colophon" class="site-footer">
	<?php
		
		$themeSettings = get_option('base-theme-settings');

		$footerPageId = $themeSettings->footerPageId;
		if ($footerPageId) {

			$content_post = get_post($footerPageId);
			$content = $content_post->post_content;
			$content = apply_filters('the_content', $content);
			$content = str_replace(']]>', ']]&gt;', $content);
			echo $content;
			//echo get_post_field('post_content', $footerPageId);
		} else {
			echo 'No footer has been set up';
		}
	
	?>


	<!--<div class="site-info">
		<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'base-theme' ) ); ?>">
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf( esc_html__( 'Proudly powered by %s', 'base-theme' ), 'WordPress' );
			?>
		</a>
		<span class="sep"> | </span>
			<?php
			/* translators: 1: Theme name, 2: Theme author. */
			printf( esc_html__( 'Theme: %1$s by %2$s.', 'base-theme' ), 'base-theme', '<a href="http://underscores.me/">Me</a>' );
			?>
	</div> .site-info -->
</footer><!-- #colophon -->