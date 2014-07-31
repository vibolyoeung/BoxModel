<?php
namespace WebEssentials\WeCustom\ViewHelpers\Format;

/***************************************************************
 *
 * Copyright notice
 *
 * (c) 2013 Web Essentials <extensions@web-essentials.asia>, www.web-essentials.asia
 *
 * All rights reserved
 *
 * This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 ****************************************************************/

/**
 * The list News relate file
 *
 * @package we_aba
 *
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class FileDownloadViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * Category color
	 *
	 * @param string $file The relate file
	 * @param array $configuration The configuration of related file
	 * @param boolean $hideError
	 *
	 * @return \string
	 */
	public function render($file = NULL, $configuration = array(), $hideError = FALSE) {

		if (!is_file($file)) {
			$errorMessage = sprintf('Given file "%s" for %s is not valid', htmlspecialchars($file), get_class());
			\TYPO3\CMS\Core\Utility\GeneralUtility::devLog($errorMessage, 'news', \TYPO3\CMS\Core\Utility\GeneralUtility::SYSLOG_SEVERITY_WARNING);

			if (!$hideError) {
				throw new \TYPO3\CMS\Fluid\Core\ViewHelper\Exception\InvalidVariableException(
						'Given file is not a valid file: ' . htmlspecialchars($file));
			}
		}

		$cObj = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('tslib_cObj');

		$fileInformation = pathinfo($file);

		$tsConfiguration = array(
				'path' => $fileInformation['dirname'] . '/',
				'labelStdWrap.' => array(
						'cObject.' => array(
								'value' => '<i class="glyphicon glyphicon-download-alt"></i>' . $this->renderChildren() . ' (' . strtoupper($fileInformation['extension']) .
								', ' . \TYPO3\CMS\Core\Utility\GeneralUtility::formatSize(filesize($file), ' B| KB| MB| GB') . ')'
						)
				),

		);

		// Fallback if no configuration given
		if (!is_array($configuration)) {
			$configuration = array('labelStdWrap.' => array('cObject' => 'TEXT'));
		} else {
			if (class_exists('Tx_Extbase_Utility_TypoScript')) {
				$configuration = Tx_Extbase_Utility_TypoScript::convertPlainArrayToTypoScriptArray($configuration);
			} else {
				/** @var $typoscriptService Tx_Extbase_Service_TypoScriptService */
				$typoscriptService = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('Tx_Extbase_Service_TypoScriptService');
				$configuration = $typoscriptService->convertPlainArrayToTypoScriptArray($configuration);
			}
		}

		// merge default configuration with optional configuration
		$tsConfiguration = \TYPO3\CMS\Core\Utility\GeneralUtility::array_merge_recursive_overrule($tsConfiguration, $configuration);

		// generate file
		$file = $cObj->filelink($fileInformation['basename'], $tsConfiguration);
		return $file;
	}
}
?>