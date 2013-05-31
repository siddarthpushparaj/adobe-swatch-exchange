<?php
/**
 * Adobe Swatch Exchange Generator
 *
 * @see      http://www.colourlovers.com/web/blog/2007/11/08/color-palettes-in-adobe-swatch-exchange-ase
 * @author   Chris Williams <http://www.colourlovers.com>
 * @author   Ryan Parman <http://ryanparman.com>
 * @version  2.1
 * @license  MIT
 */

namespace Ase\Palette;

use Ase\Color\ColorInterface;

interface PaletteInterface
{
	/**
	 * Sets the name of the palette.
	 *
	 * @param string $name The name of the palette.
	 */
	public function setName($name);

	/**
	 * Returns the name of the palette.
	 *
	 * @return string The name of the palette.
	 */
	public function getName();

	/**
	 * Adds a <ColorInterface> object to the palette.
	 *
	 * @param ColorInterface $color A color object.
	 */
	public function addColor(ColorInterface $color);

	/**
	 * Returns an array of <ColorInterface> objects.
	 *
	 * @return array<ColorInterface> An array of <ColorInterface> objects.
	 */
	public function getColors();
}
