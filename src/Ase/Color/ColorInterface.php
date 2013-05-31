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

namespace Ase\Color;

interface ColorInterface
{
	/**
	 * Returns the name of the color.
	 *
	 * @return string The name of the color.
	 */
	public function getName();

	/**
	 * Returns the value of the color.
	 *
	 * @return string The value of the color.
	 */
	public function getValue();
}
