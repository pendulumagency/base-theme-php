<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">

	<?php
		wp_head();

		$themeSettings = get_option("base-theme-settings");

		if (isset($themeSettings->customHeadHtml)) {
			echo $themeSettings->$customHeadHtml;
		}
	?>
</head>
