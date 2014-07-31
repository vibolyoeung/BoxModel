<?php

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$extensionPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('we_default');

// enable to use other fields in page table in TS
$GLOBALS['TYPO3_CONF_VARS']['FE']['addRootLineFields'] .= ', hide_pagetitle, hide_pagetitle_subpage, description, keywords';

// get settings from ext_conf_template.txt
$confArr = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['we_default']);

if (1 == $confArr['enableDefaultPageTSconfig']) {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:we_default/Configuration/TSConfig/Page.ts">');
}

if (1 == $confArr['enableDefaultUserTSconfig']) {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:we_default/Configuration/TSConfig/User.ts">');
}

if (1 == $confArr['enableMinimizedRTE']) {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:we_default/Configuration/TSConfig/Rte.ts">');
}

if (1 == $confArr['disableTsTemplateEditing']) {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:we_default/Configuration/TSConfig/Record/Disallowed/SysTemplate.ts">');
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:we_default/Configuration/TSConfig/Function/Disallowed/TxTstemplateinfo.ts">');
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:we_default/Configuration/TSConfig/Function/Disallowed/TxTstemplateceditor.ts">');
}

// include default css_js optimization settings
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:we_default/Configuration/TSConfig/Misc/CssJsOptimization.ts">');

if (1 == $confArr['dontCompressCss']) {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:we_default/Configuration/TSConfig/Misc/DontCompressCss.ts">');
}

if (1 == $confArr['dontCompressJs']) {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:we_default/Configuration/TSConfig/Misc/DontCompressJs.ts">');
}

if (1 == $confArr['dontConcatenateCss']) {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:we_default/Configuration/TSConfig/Misc/DontConcatenateCss.ts">');
}

if (1 == $confArr['dontConcatenateJs']) {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:we_default/Configuration/TSConfig/Misc/DontConcatenateJs.ts">');
}

if (1 == $confArr['dontMoveJsFromHeaderToFooter']) {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:we_default/Configuration/TSConfig/Misc/DontMoveJsFromHeaderToFooter.ts">');
}

// nice to have
$TYPO3_CONF_VARS['BE']['accessListRenderMode'] = 'checkbox';
$TYPO3_CONF_VARS['BE']['explicitADmode'] = 'explicitAllow';
$TYPO3_CONF_VARS['BE']['forceCharset'] = 'utf-8';
$TYPO3_CONF_VARS['BE']['maxFileSize'] = '100000';
$TYPO3_CONF_VARS['BE']['sessionTimeout'] = '36000';
$TYPO3_CONF_VARS['FE']['permalogin'] = '1';
$TYPO3_CONF_VARS['SYS']['textfile_ext'] = 'txt,pdf,html,htm,css,inc,php,php3,tmpl,js,sql';

// peformance
$TYPO3_CONF_VARS['BE']['compressionLevel'] = $confArr['beCompressionLevel'];
$TYPO3_CONF_VARS['FE']['compressionLevel'] = $confArr['feCompressionLevel'];

if (1 == $confArr['enableDeveloperMode']) {
	$TYPO3_CONF_VARS['SYS']['devIPmask'] = '127.0.0.1';
}

// create versinNumberInFilename
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_content.php']['getImgResource']['ImgResourceHook'] = $extensionPath . 'Classes/Hook/ImgResourceHook.php:&Tx_WeDefault_Hook_ImgResourceHook';

// hook to rte link tag rendering
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_content.php']['typoLink_PostProc'][] = $extensionPath . 'Classes/UserFunc/RteRenderer.php:Tx_WeDefault_UserFunc_RteRenderer->renderFileLinkTag';

// hook khmer search
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['indexed_search']['pi1_hooks']['getSearchWords'] = $extensionPath . 'Classes/Hook/IndexSearchHook.php:Tx_WeDefault_Hook_IndexSearchHook';
?>