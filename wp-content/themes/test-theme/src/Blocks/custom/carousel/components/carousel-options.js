import React from 'react';
import { __ } from '@wordpress/i18n';
import { PanelBody, RangeControl, BaseControl } from '@wordpress/components';
import { icons, checkAttr, getAttrKey, IconLabel, IconToggle } from '@eightshift/frontend-libs/scripts';
import manifest from './../manifest.json';

export const CarouselOptions = ({ attributes, setAttributes }) => {
	const {
		options: manifestOptions,
	} = manifest;

	const carouselIsLoop = checkAttr('carouselIsLoop', attributes, manifest);
	const carouselShowItems = checkAttr('carouselShowItems', attributes, manifest);
	const carouselShowPrevNext = checkAttr('carouselShowPrevNext', attributes, manifest);
	const carouselShowPagination = checkAttr('carouselShowPagination', attributes, manifest);

	return (
		<PanelBody title={__('Carousel', 'test-theme')}>

			<IconToggle
				icon={icons.loopMode}
				label={__('Loop mode', 'test-theme')}
				help={__('Allows infinite scrolling through the items.', 'test-theme')}
				checked={carouselIsLoop}
				onChange={(value) => setAttributes({ [getAttrKey('carouselIsLoop', attributes, manifest)]: value })}
			/>

			<hr />

			<IconToggle
				icon={icons.arrowsHorizontal}
				label={__('Navigation buttons', 'test-theme')}
				checked={carouselShowPrevNext}
				onChange={(value) => setAttributes({ [getAttrKey('carouselShowPrevNext', attributes, manifest)]: value })}
			/>

			<IconToggle
				icon={icons.order}
				label={__('Pagination', 'test-theme')}
				checked={carouselShowPagination}
				onChange={(value) => setAttributes({ [getAttrKey('carouselShowPagination', attributes, manifest)]: value })}
			/>

			<hr />

			<BaseControl
				label={<IconLabel icon={icons.visible} label={__('Number of slides visible', 'test-theme')} />}
				help={__('Number of items to show at a time (on tablet width and up).', 'test-theme')}
			/>
			<IconToggle
				label={__('Automatic', 'test-theme')}
				help={__('Fit as many as possible. Works best when items are all same size.', 'test-theme')}
				checked={carouselShowItems === -1}
				onChange={(value) => setAttributes({ [getAttrKey('carouselShowItems', attributes, manifest)]: value ? -1 : 1 })}
			/>

			{carouselShowItems !== -1 &&
				<RangeControl
					label={__('Slides visible', 'test-theme')}
					value={carouselShowItems}
					onChange={(value) => setAttributes({ [getAttrKey('carouselShowItems', attributes, manifest)]: value })}
					min={manifestOptions.carouselItemsToShow.min}
					max={manifestOptions.carouselItemsToShow.max}
					step={manifestOptions.carouselItemsToShow.step}
				/>
			}
		</PanelBody>
	);
};
