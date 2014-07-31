<?php
$extensionPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('we_default');

return array(
	'Tx_WeDefault_Hook_ImgResourceHook' => $extensionPath . 'Classes/Hook/ImgResourceHook.php',
	'Tx_WeDefault_UserFunc_ItemsProcFunc' => $extensionPath . 'Classes/UserFunc/ItemsProcFunc.php'
);
?>