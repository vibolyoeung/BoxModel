<?php
/***************************************************************
 *  Copyright notice
*
*  (c) 2013 Web Essentials <extensions@web-essentials.asia>
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

/**
 * Enabling additional functions to RTE rendering
 *
 * @author Web Essentials <extensions@web-essentials.asia>
 */
class Tx_WeDefault_UserFunc_RteRenderer {

	/**
	 * Re-generate A tag from RTE text
	 *
	 * lib.parseFunc_RTE.tags.link {
	 *	 typolink {
	 *	   rteRenderer = 1
	 *	   rteRenderer {
	.*		 renderFileLinkTag = 1
	.*	   }
	 *	 }
	 * }
	 *
	 * @param array $params
	 * @param tslib_cObj $pObj
	 *
	 * @return void
	 */
	function renderFileLinkTag(&$params, $pObj) {
		if (intval($params['conf']['rteRenderer']) === 1 && intval($params['conf']['rteRenderer.']['renderFileLinkTag']) === 1) {
			if ($params['finalTagParts']['TYPE'] == 'file') {
				$finalTagParts = TYPO3\CMS\Core\Utility\GeneralUtility::get_tag_attributes($params['finalTag']);

				// try to remove leading "/" since we don't need to resolve the relative path
				if (substr($finalTagParts['href'], 0, 1) == '/') {
					$file = substr($finalTagParts['href'], 1, strlen($finalTagParts['href']));
				}

				// just internal file only
				if (@is_file($file)) {

					// as requirement, append the "filelink" to the class
					if (strpos($finalTagParts['class'], 'icon-download-alt') === FALSE) {
						$finalTagParts['class'] = 'filelink ' . $finalTagParts['class'];
					}

					$info = pathinfo($finalTagParts['href']);

					// add file extension into the the class attribute
					$finalTagParts['class'] = trim($finalTagParts['class']) . ' ' . $info['extension'];

					$params['finalTag'] = '<a' . ' target="' . $finalTagParts['target'] . '" class="' . trim($finalTagParts['class']) .
						'" title="' . $finalTagParts['title'] . '"' . ' href="' . $finalTagParts['href'] . '" >' .
						'<i class="glyphicon glyphicon-download-alt"></i>';

					// append file extension and size to the label
					$params['linktxt'] .= ' (' . strtoupper($info['extension']) . ', ' . TYPO3\CMS\Core\Utility\GeneralUtility::formatSize(filesize($file), ' B| KB| MB| GB') . ')';
				}
			} elseif ($params['finalTagParts']['TYPE'] == 'mailto') {
				if (strpos($params['finalTag'],'class="mail')) {
					$params['finalTag'] .= '<i class="glyphicon glyphicon-envelope"></i>&nbsp;';
				}
			} elseif ($params['finalTagParts']['TYPE'] == 'url') {
				if (strpos($params['finalTag'],'class="external-link"') || strpos($params['finalTag'],'class="external-link-new-window"')) {
					$params['finalTag'] .= '<i class="glyphicon glyphicon-new-window"></i>&nbsp;';
				}
			}
		}
	}
}
?>