<?php
/**
 * Adobe Swatch Exchange Generator
 *
 * @author   Ryan Parman <http://ryanparman.com>
 * @version  2.1
 * @license  MIT
 */

namespace Ase\Color;

use Ase\Color\AbstractColor;
use Ase\Color\ColorInterface;
use Ase\Exception\FormatException;

class Hex extends AbstractColor implements ColorInterface
{
	/**
	 * Constructs a new instance of this class.
	 *
	 * @param string $name  The name of the color.
	 * @param string $value The value of the color.
	 */
	public function __construct($name = '', $value = '')
	{
		if (preg_match('/^#?([0-9a-f]{6}|[0-9a-f]{3})$/i', $value, $m))
		{
			$this->name = $name;

			if (strlen($m[1]) === 3)
			{
				list($r, $g, $b) = str_split($m[1]);
				$this->value = sprintf('%s%s%s%s%s%s', $r, $r, $g, $g, $b, $b);
			}
			else // 6
			{
				$this->value = $m[1];
			}
		}
		else
		{
			throw new FormatException("'${value}' is not a valid hexidecimal color value.");
		}
	}
}
