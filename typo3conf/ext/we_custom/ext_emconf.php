<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "we_custom".
 *
 * Auto generated 15-11-2012 08:01
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Web Essentials Custom Package',
	'description' => 'Web Essentials custom package for TYPO3 integration.',
	'category' => 'plugin',
	'author' => 'Web Essentials',
	'author_email' => 'extensions@web-essentials.asia',
	'author_company' => 'www.web-essentials.asia',
	'shy' => '',
	'priority' => '',
	'module' => '',
	'state' => 'alpha',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'version' => '1.0.0',
	'constraints' => array(
		'depends' => array(
			'we_default' => '1.0.0',
			'extbase' => '6.2.0-0.0.0',
			'fluid' => '6.2.0-0.0.0',
			'typo3' => '6.2.0-0.0.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:66:{s:21:"ext_conf_template.txt";s:4:"f908";s:12:"ext_icon.gif";s:4:"e922";s:17:"ext_localconf.php";s:4:"8498";s:14:"ext_tables.php";s:4:"716f";s:14:"ext_tables.sql";s:4:"eb25";s:24:"ext_typoscript_setup.txt";s:4:"e475";s:34:"Classes/UserFunc/user_notfound.php";s:4:"ee0d";s:42:"Classes/UserFunc/user_t3lib_TStemplate.php";s:4:"3b48";s:44:"Classes/XClass/class.ux_tslib_gifbuilder.php";s:4:"2fd4";s:30:"Configuration/TSConfig/page.ts";s:4:"a56b";s:29:"Configuration/TSConfig/rte.ts";s:4:"0dbc";s:30:"Configuration/TSConfig/user.ts";s:4:"fb90";s:66:"Configuration/TSConfig/function/disallowed/tx_tstemplateceditor.ts";s:4:"6daa";s:63:"Configuration/TSConfig/function/disallowed/tx_tstemplateinfo.ts";s:4:"ab69";s:58:"Configuration/TSConfig/misc/default_css_js_optimization.ts";s:4:"2e0b";s:48:"Configuration/TSConfig/misc/dont_compress_css.ts";s:4:"367e";s:47:"Configuration/TSConfig/misc/dont_compress_js.ts";s:4:"9e16";s:51:"Configuration/TSConfig/misc/dont_concatenate_css.ts";s:4:"bee0";s:50:"Configuration/TSConfig/misc/dont_concatenate_js.ts";s:4:"8da0";s:65:"Configuration/TSConfig/misc/dont_move_js_from_header_to_footer.ts";s:4:"e070";s:48:"Configuration/TSConfig/record/allowed/tx_news.ts";s:4:"bbf3";s:56:"Configuration/TSConfig/record/disallowed/sys_template.ts";s:4:"bac4";s:38:"Configuration/TypoScript/constants.txt";s:4:"994d";s:34:"Configuration/TypoScript/setup.txt";s:4:"8658";s:44:"Configuration/TypoScript/custom/constants.ts";s:4:"4193";s:62:"Configuration/TypoScript/custom/plugin/indexed_search/setup.ts";s:4:"0234";s:54:"Configuration/TypoScript/custom/plugin/qt_seo/setup.ts";s:4:"2007";s:45:"Configuration/TypoScript/default/constants.ts";s:4:"0edf";s:41:"Configuration/TypoScript/default/setup.ts";s:4:"e3f1";s:48:"Configuration/TypoScript/default/config/setup.ts";s:4:"a297";s:52:"Configuration/TypoScript/default/lib/footer/setup.ts";s:4:"49cf";s:52:"Configuration/TypoScript/default/lib/header/setup.ts";s:4:"ef9f";s:60:"Configuration/TypoScript/default/lib/misc/analytics/setup.ts";s:4:"7a85";s:60:"Configuration/TypoScript/default/lib/misc/copyright/setup.ts";s:4:"acef";s:60:"Configuration/TypoScript/default/lib/misc/htmltitle/setup.ts";s:4:"d8a9";s:55:"Configuration/TypoScript/default/lib/misc/logo/setup.ts";s:4:"c191";s:60:"Configuration/TypoScript/default/lib/misc/pagetitle/setup.ts";s:4:"0208";s:60:"Configuration/TypoScript/default/lib/misc/searchbox/setup.ts";s:4:"d47d";s:62:"Configuration/TypoScript/default/lib/misc/socialmedia/setup.ts";s:4:"b5fb";s:60:"Configuration/TypoScript/default/lib/nav/breadcrumb/setup.ts";s:4:"031b";s:56:"Configuration/TypoScript/default/lib/nav/footer/setup.ts";s:4:"3fd6";s:58:"Configuration/TypoScript/default/lib/nav/language/setup.ts";s:4:"429c";s:54:"Configuration/TypoScript/default/lib/nav/left/setup.ts";s:4:"7206";s:54:"Configuration/TypoScript/default/lib/nav/main/setup.ts";s:4:"fedd";s:46:"Configuration/TypoScript/default/page/setup.ts";s:4:"d9c6";s:53:"Configuration/TypoScript/default/page/css_js/setup.ts";s:4:"1974";s:40:"Resources/Private/Language/locallang.xml";s:4:"e36a";s:43:"Resources/Private/Language/locallang_db.xml";s:4:"99ee";s:47:"Resources/Private/Templates/BoxModel/html5.html";s:4:"3b9f";s:47:"Resources/Private/Templates/BoxModel/index.html";s:4:"99ff";s:49:"Resources/Private/Templates/BoxModel/subpage.html";s:4:"9d1c";s:50:"Resources/Private/Templates/BoxModel/css/print.css";s:4:"d41d";s:50:"Resources/Private/Templates/BoxModel/css/reset.css";s:4:"6260";s:50:"Resources/Private/Templates/BoxModel/css/style.css";s:4:"de4d";s:55:"Resources/Private/Templates/BoxModel/images/bg_body.png";s:4:"b530";s:55:"Resources/Private/Templates/BoxModel/images/favicon.ico";s:4:"43ec";s:52:"Resources/Private/Templates/BoxModel/images/logo.png";s:4:"e9f7";s:56:"Resources/Private/Templates/BoxModel/images/slider01.jpg";s:4:"37c8";s:59:"Resources/Private/Templates/BoxModel/images/sprite-icon.png";s:4:"ce0e";s:59:"Resources/Private/Templates/BoxModel/js/jquery-1.7.1.min.js";s:4:"ddb8";s:49:"Resources/Private/Templates/BoxModel/js/script.js";s:4:"14a2";s:78:"Resources/Private/Templates/BoxModel/plugin/indexed_search/indexed_search.tmpl";s:4:"4b08";s:51:"Resources/Private/Templavoila/fce/grid_33-33-33.xml";s:4:"9a31";s:48:"Resources/Private/Templavoila/fce/grid_50-50.xml";s:4:"3af4";s:46:"Resources/Private/Templavoila/page/default.xml";s:4:"6e83";s:14:"doc/manual.sxw";s:4:"8d2d";}',
);

?>