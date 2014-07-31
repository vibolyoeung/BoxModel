<?php
if ( ! defined('TYPO3_MODE') ) {
	die ('Access denied.');
}

// news template selector for list
$GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['templateLayouts']['10'] = array('Latest View', 'latest_view');

$extensionPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('we_custom');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:we_custom/Configuration/TSConfig/Page.ts">');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:we_custom/Configuration/TSConfig/User.ts">');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:we_custom/Configuration/TSConfig/Rte.ts">');

// autoload TypoScript from custom folder is here
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tstemplate.php']['includeStaticTypoScriptSources'][] =
	$extensionPath . 'Classes/UserFunc/user_t3lib_TStemplate.php:user_includeCustomTsFiles';

?>