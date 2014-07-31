<?php
$fields = array(
	'hide_pagetitle' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:we_default/Resources/Private/Language/locallang_db.xml:hide_pagetitle',
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('', ''),
				array('LLL:EXT:we_default/Resources/Private/Language/locallang_db.xml:hide_pagetitle_yes', 'yes'),
				array('LLL:EXT:we_default/Resources/Private/Language/locallang_db.xml:hide_pagetitle_no', 'no')
			),
		),
	),
	'hide_pagetitle_subpage' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:we_default/Resources/Private/Language/locallang_db.xml:hide_pagetitle_subpage',
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('', ''),
				array('LLL:EXT:we_default/Resources/Private/Language/locallang_db.xml:hide_pagetitle_yes', 'yes'),
				array('LLL:EXT:we_default/Resources/Private/Language/locallang_db.xml:hide_pagetitle_no', 'no')
			),
		),
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $fields, 1);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('pages', 'hide_pagetitle,hide_pagetitle_subpage');
?>