<?php
/**
 * Adobe Swatch Exchange Generator
 *
 * Original procedural version by Chris Williams.
 * PHP 5.3 port and Composer package by Ryan Parman.
 *
 * @see      http://www.colourlovers.com/web/blog/2007/11/08/color-palettes-in-adobe-swatch-exchange-ase
 * @author   Chris Williams <http://www.colourlovers.com>
 * @author   Ryan Parman <http://ryanparman.com>
 * @version  2.1
 * @license  MIT
 */

namespace Ase;

use Ase\Palette\Palette;
use Ase\Palette\PaletteInterface;

class Generator
{
	/**
	 * Store the binary data for the *.ase file.
	 * @type string
	 */
	protected $buffer = '';

	/**
	 * An array of <PaletteInterface> objects.
	 * @type array
	 */
	protected $palettes = array();

	/**
	 * The default internal encoding of the environment.
	 * @type string
	 */
	protected $internal_encoding;

	/**
	 * The number of colors to store in the file.
	 * @type integer
	 */
	protected $color_count = 0;

	/**
	 * The number of palettes to store in the file.
	 * @type integer
	 */
	protected $palette_count = 0;

	/**
	 * Constructs a new instance of this class.
	 */
	public function __construct($palettes = array())
	{
		$this->palettes = $palettes;
	}

	/**
	 * Adds a <PaletteInterface> object to the generator.
	 *
	 * @param PaletteInterface $palette A palette object.
	 */
	public function addPalette(PaletteInterface $palette)
	{
		$this->palettes[] = $palette;
		return $this;
	}

	/**
	 * Returns an array of <PaletteInterface> objects.
	 *
	 * @return array<PaletteInterface> An array of <PaletteInterface> objects.
	 */
	public function getPalettes()
	{
		return $this->palettes;
	}

	/**
	 * Generate the palette binary as a stream.
	 *
	 * @return string The palette binary as a stream.
	 */
	public function makePalette()
	{
		// Stash current encoding and switch to UTF-8
		$this->internal_encoding = mb_internal_encoding();
		mb_internal_encoding('UTF-8');

		// Get correct counts
		foreach ($this->getPalettes() as $palette)
		{
			$this->color_count += count($palette->getColors());
			++$this->palette_count;
		}

		// File signature
		$this->buffer .= "ASEF";

		// Version
		$this->buffer .= pack("n*", 1, 0);

		// Total number of blocks
		$this->buffer .= pack("N", $this->color_count + ($this->palette_count * 2));

		foreach ($this->getPalettes() as $palette)
		{
			// Group start
			$this->buffer .= pack("n",0xC001);

			// Length of this block
			$title  = (mb_convert_encoding($palette->getName(), "UTF-16BE", "UTF-8") . pack("n", 0));

			// Length of the group title
			$buffer = pack("n", (strlen($title) / 2));

			// Group title
			$buffer .= $title;

			// Length of this block
			$this->buffer .= pack("N", strlen($buffer));
			$this->buffer .= $buffer;

			foreach ($palette->getColors() as $color)
			{
				// Color entry
				$this->buffer .= pack("n", 1);

				// Length of this block
				$title  = (mb_convert_encoding($color->getName(), "UTF-16BE", "UTF-8") . pack("n", 0));

				// Length of the title
				$buffer = pack("n", (strlen($title) / 2));

				// Title
				$buffer .= $title;

				// Colors
				list($r, $g, $b) = array_map("intval", sscanf($color->getValue(), "%2x%2x%2x"));
				$r /= 255;
				$g /= 255;
				$b /= 255;

				$buffer .= "RGB ";
				$buffer .= strrev(pack("f", $r));
				$buffer .= strrev(pack("f", $g));
				$buffer .= strrev(pack("f", $b));

				// Color type - 0x00 "Global"
				$buffer .= pack("n", 0);

				// Length of this block
				$this->buffer .= pack("N", strlen($buffer));
				$this->buffer .= $buffer;
			}

			// Group end
			$this->buffer .= pack("n", 0xC002);

			// Length of "Group end" block, which is 0
			$this->buffer .= pack("N", 0);
		}

		mb_internal_encoding($this->internal_encoding);

		return $this->buffer;
	}
}
