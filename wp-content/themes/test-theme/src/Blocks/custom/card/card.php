<?php

/**
 * Template for the Card Block.
 *
 * @package TestTheme
 */

use TestThemeVendor\EightshiftLibs\Helpers\Components;

echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	'card',
	Components::props('card', $attributes)
);
