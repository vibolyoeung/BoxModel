<?php

/***************************************************************
*  Copyright notice
*
*  (c) 2012 Web Essentials <extensions@web-essentials.asia>
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
*  A copy is found in the textfile GPL.txt and important notices to the license
*  from the author is found in LICENSE.txt distributed with these scripts.
*
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

class Tx_WeDefault_Hook_ImgResourceHook implements \TYPO3\CMS\Frontend\ContentObject\ContentObjectGetImageResourceHookInterface {

	/**
	 * Hook for post-processing image resources
	 *
	 * @param string $file Original image file
	 * @param array $configuration TypoScript getImgResource properties
	 * @param array $imageResource Information of the created/converted image resource
	 * @param \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer $parent Parent content object
	 * @return array Modified image resource information
	 */
	public function getImgResourcePostProcess($file, array $configuration, array $imageResource, \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer $parent) {
		if ($imageResource[3] === $imageResource['origFile']) {
			$imageResource[3] = \TYPO3\CMS\Core\Utility\GeneralUtility::createVersionNumberedFilename($imageResource[3]);
		}

		return $imageResource;
	}
}
?>