<?php

/**
 * Template for the Featured Posts view.
 *
 * @package TestTheme
 */

use TestThemeVendor\EightshiftLibs\Helpers\Components;
use TestTheme\Rest\ApiData;

$globalManifest = Components::getManifest(dirname(__DIR__, 2));
$manifest = Components::getManifest(__DIR__);

$blockClass = $attributes['blockClass'] ?? '';

$featuredPostsItemsPerLine = Components::checkAttr('featuredPostsItemsPerLine', $attributes, $manifest);

$newsApiData = \apply_filters('get_api_data', ['category' => 'technology', 'pageSize' => $featuredPostsItemsPerLine]);

?>

<ul
	class="<?php echo esc_attr($blockClass); ?>"
	data-items-per-line=<?php echo esc_attr($featuredPostsItemsPerLine); ?>
>
<?php
	foreach ($newsApiData as $post) {
		$cardProps = [
			'introContent' => $post['date'],
			'headingContent' => $post['title'], // @phpstan-ignore-line
			'paragraphContent' => $post['content'],
			'headingSize' => 'big',
			'introTag' => 'p',
			'headingTag' => 'h3',
			'paragraphTag' => 'p',
		];
	?>
		<li class="<?php echo esc_attr("{$blockClass}__item"); ?>">
			<?php echo Components::render('card', $cardProps); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</li>
	<?php
	}
	?>
</ul>
