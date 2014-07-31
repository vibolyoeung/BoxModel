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

function user_includeCustomTsFiles(&$_params, &$pObj) {
	$extKey = 'we_custom';

		// load custom ts files when loading all ts files from the extension
	if ($pObj->hasGenerated == FALSE && \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded($extKey)) {
			// trailing / is needed: eq: Configuration/TypoScript/
		$extPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($extKey);
		$customPath = $extPath . 'Configuration/TypoScript/';
		$files = \TYPO3\CMS\Core\Utility\GeneralUtility::getAllFilesAndFoldersInPath(array(), $customPath, 'ts');

		$orderedFiles = array();
		$mixedFiles = array();
		$domainsFiles = array();
		foreach ($files as $file) {
			// fetch all overwrite constant/setup files and remove them from default domain
			if (strpos($file, $customPath . 'Domains/') !== FALSE) {
				$file = str_replace($customPath . 'Domains/', '', $file);
				$fileParts = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode('/', $file, FALSE, 2);

				// domain => files
				$domainsFiles[$fileParts[0]][] = $fileParts[1];

				continue;
			}

			$filename = substr(strrchr($file, '/'), 1);

				// constant file is exluded due to manual include
			if ($filename == 'Constants.ts') {
				continue;
			}

				// prepare include ts
			$file = str_replace($extPath, 'EXT:' . $extKey . '/', $file);
			$file = '<INCLUDE_TYPOSCRIPT: source="FILE: ' . $file . '">';

			$priority = intval($filename);
			if ($priority) {
				$orderedFiles[$priority] .= LF . $file;

					// the file is included now, nothing to do
				continue;
			}

				// all files in here have no priority set
			$mixedFiles[] = $file;
		}

			// start appending found ts files to we_custom
		$customInclusion = '';

			// low priority first
		if (count($mixedFiles) > 0) {
			$customInclusion .= LF . implode(LF, $mixedFiles);
		}

			// ones with priority
		if (count($orderedFiles) > 0) {
			ksort($orderedFiles);
			$customInclusion .= LF . implode(LF, $orderedFiles);
		}

			// add individual configuration if there is domain configuration on the root level
		if (count($domainsFiles) > 0) {
			$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
				'domainName,include_typoscript_path',
				'sys_domain',
				'hidden=0 AND PID=' . $pObj->absoluteRootLine[0]['uid']
			);
			$domainsOnThisRoot = array();
			while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
				$domainsOnThisRoot[$row['domainName']] = $row['include_typoscript_path'];
			}
			$GLOBALS['TYPO3_DB']->sql_free_result($res);

			$currentDomain = \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_HOST_ONLY');
			$domainDirectory = $domainsOnThisRoot[$currentDomain];

			$typoscriptIncludeTage = LF . '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $extKey;
			$typoscriptIncludeTage .= '/Configuration/TypoScript/Domains/' . $domainDirectory;

			// constants file must be at the root of the individual domain folder
			if (! empty($domainDirectory) && is_array($domainsFiles[$domainDirectory])) {
				if (in_array('Constants.ts', $domainsFiles[$domainDirectory])) {
					$key = array_search('Constants.ts', $domainsFiles[$domainDirectory]);
					unset($domainsFiles[$domainDirectory][$key]);

					$constantFile = $typoscriptIncludeTage . '/Constants.ts">';

					$GLOBALS['TYPO3_CONF_VARS']['FE']['defaultTypoScript_constants.']['wecustom/Configuration/TypoScript/'] = $constantFile;
				}

				// load only one domain for frontend
				foreach ($domainsFiles[$domainDirectory] as $file) {
					$customInclusion .= $typoscriptIncludeTage . '/' . $file . '">';
				}
			}
		}

		$GLOBALS['TYPO3_CONF_VARS']['FE']['defaultTypoScript_setup.']['wecustom/Configuration/TypoScript/'] = $customInclusion;
		$pObj->hasGenerated = TRUE;
	}

}
?>