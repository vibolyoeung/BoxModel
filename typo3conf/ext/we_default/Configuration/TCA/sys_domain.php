<?php
$extPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('we_custom');
$domainPath = $extPath . 'Configuration/TypoScript/Domains/';

if (is_dir($domainPath)) {
	$fields = array(
		'include_typoscript_path' => array(
			'label' => 'LLL:EXT:we_default/Resources/Private/Language/locallang_db.xml:domain_typoscript_configuration',
			'config' => array (
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:we_default/Resources/Private/Language/locallang_db.xml:select_domain', ''),
				),
				'itemsProcFunc' => 'Tx_WeDefault_UserFunc_ItemsProcFunc->getDomainFolders',
			)
		)
	);

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('sys_domain', $fields, 1);
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('sys_domain','include_typoscript_path');
}
?>