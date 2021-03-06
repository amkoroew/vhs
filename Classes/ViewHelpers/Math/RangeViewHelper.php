<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Claus Due <claus@wildside.dk>, Wildside A/S
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Math: Range
 *
 * Gets the lowest and highest number from an array of numbers.
 * Returns an array of [low, high]. For individual low/high
 * values please use v:math.maximum and v:math.minimum.
 *
 * @author Claus Due <claus@wildside.dk>, Wildside A/S
 * @package Vhs
 * @subpackage ViewHelpers\Math
 */
class Tx_Vhs_ViewHelpers_Math_RangeViewHelper extends Tx_Vhs_ViewHelpers_Math_AbstractSingleMathViewHelper {

	/**
	 * @return mixed
	 * @throw Exception
	 */
	public function render() {
		$a = $this->getInlineArgument();
		$aIsIterable = $this->assertIsArrayOrIterator($a);
		if ($aIsIterable) {
			$a = $this->convertTraversableToArray($a);
			sort($a, SORT_NUMERIC);
			if (count($a) === 1) {
				return array(reset($a), reset($a));
			} else {
				return array(array_shift($a), array_pop($a));
			}
		}
		return $a;
	}

}
