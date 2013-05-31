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

abstract class AbstractColor
{
	/**
	 * The name of the color.
	 * @type string
	 */
	protected $name;

	/**
	 * The value of the color.
	 * @type string
	 */
	protected $value;

	/**
	 * {@inheritdoc}
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getValue()
	{
		return $this->value;
	}
}
