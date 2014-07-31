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
 * ************************************************************* */

function userPageNotFound($param, $ref) {
	global $TYPO3_CONF_VARS;

	// default detected language is 0
	$detectedLanguage = -1;
	$httpHost = \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('HTTP_HOST');

	// If it turned out to be a string pointer, then look up the real config
	while (!is_null($TYPO3_CONF_VARS['EXTCONF']['realurl'][$httpHost]) && is_string($TYPO3_CONF_VARS['EXTCONF']['realurl'][$httpHost])) {
		$TYPO3_CONF_VARS['EXTCONF']['realurl'][$httpHost] = $TYPO3_CONF_VARS['EXTCONF']['realurl'][$TYPO3_CONF_VARS['EXTCONF']['realurl'][$httpHost]];
	}

	$languageGetVar = $TYPO3_CONF_VARS['EXTCONF']['realurl'][$httpHost]['pagePath']['languageGetVar'];
	$languageGetVar = $languageGetVar ? $languageGetVar : 'L';
	$part = \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('REQUEST_URI');
	$partParts = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode('/', $part);

	// lookup the language from realurl path
	foreach ($TYPO3_CONF_VARS['EXTCONF']['realurl'][$httpHost]['preVars'] as $subArr1) {
		if ($subArr1['GETvar'] == $languageGetVar) {
			foreach ($subArr1['valueMap'] as $lang => $id) {
				foreach ($partParts as $partVal) {
					if ($partVal == $lang) {
						$detectedLanguage = $id;
					}
				}
			}
		}
	}

	// if not language set along with url parts, check with url variables
	if ($detectedLanguage == -1) {
		$detectedLanguage = intval(\TYPO3\CMS\Core\Utility\GeneralUtility::_GET('L'));
	}

	// get error page id from realurl configuration
	$errorPageId = intval($TYPO3_CONF_VARS['EXTCONF']['realurl'][$httpHost]['pagePath']['error404_id']);
	// prevent redirect to inexistent page
	if (!$errorPageId || !$GLOBALS['TYPO3_DB']->exec_SELECTgetSingleRow('uid', 'pages', 'hidden=0 AND deleted=0 AND uid=' . $errorPageId)) {
		header("HTTP/1.0 505 General Error");
		header('Location: http://' . $httpHost);
		exit;
	}

	// if no language given or language does not exist, use standard language
	if ($detectedLanguage !== 0 && $GLOBALS['TYPO3_DB']->exec_SELECTgetSingleRow('uid', 'pages_language_overlay', 'hidden=0 AND deleted=0 AND pid=' . $errorPageId . ' AND sys_language_uid=' . ((int) $detectedLanguage))) {
		return \TYPO3\CMS\Core\Utility\GeneralUtility::getUrl(\TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_REQUEST_HOST') . '/index.php?id=' . $errorPageId . '&L=' . $detectedLanguage);
	}

	return \TYPO3\CMS\Core\Utility\GeneralUtility::getUrl(\TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_REQUEST_HOST') . '/index.php?id=' . $errorPageId);
}
?>