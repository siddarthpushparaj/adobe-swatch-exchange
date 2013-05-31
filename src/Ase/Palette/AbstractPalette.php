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

abstract class AbstractPalette
{
	/**
	 * The name to assign to the palette.
	 * @type string
	 */
	protected $name = '';

	/**
	 * An array of <ColorInterface> objects.
	 * @type array
	 */
	protected $colors = array();

	/**
	 * Constructs a new instance of this class.
	 *
	 * @param string                 $name   The name to assign to the palette.
	 * @param array<ColorInterface>  $colors An array of <ColorInterface> objects.
	 */
	public function __construct($name = '', $colors = array())
	{
		$this->name = $name;
		$this->colors = $colors;
	}

	/**
	 * {@inheritdoc}
	 */
	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}

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
	public function addColor(ColorInterface $color)
	{
		$this->colors[] = $color;
		return $this;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getColors()
	{
		return $this->colors;
	}
}
