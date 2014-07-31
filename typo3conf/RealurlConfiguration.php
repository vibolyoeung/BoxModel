<?php

$defaultConf = array(
	'init' => array(
		'enableCHashCache' => TRUE,
		'appendMissingSlash' => 'ifNotFile,redirect[301]',
		'enableUrlDecodeCache' => TRUE,
		'enableUrlEncodeCache' => TRUE,
		'emptyUrlReturnValue' => '/',
		'disableErrorLog' => TRUE
	),
	'preVars' => array(
		'0' => array(
			'GETvar' => 'L',
			'valueMap' => array(
				'en' => '1',
				'fr' => '2',
				'it' => '3'
			),
			'noMatch' => 'bypass'
		)
	),
	'pagePath' => array(
		'type' => 'user',
		'userFunc' => 'EXT:realurl/class.tx_realurl_advanced.php:&tx_realurl_advanced->main',
		'spaceCharacter' => '-',
		'languageGetVar' => 'L',
		// @see: http://docs.typo3.org/typo3cms/extensions/realurl/Realurl/Configuration/ConfigurationDirectives/Index.html#languageexceptionuids
		// Set the following to the uid of the language that cannot be rendered in the url, e.g: Khmer
		// Once it is set, it will take the page title of default language page for its url
		// @also http://forge.typo3.org/issues/49206 is requesting to have a fallback for choosing the non-default language for url
		'languageExceptionUids' => '',
		'expireDays' => '7',
		'segTitleFieldList' => 'tx_realurl_pathsegment,alias,nav_title,title',
		'error404_id' => '8'
	),
	'fileName' => array(
		'defaultToHTMLsuffixOnPrev' => 0,
		'index' => array(
			'rss.xml' => array(
				'keyValues' => array(
					'type' => '100'
				)
			),
			'print' => array(
				'keyValues' => array(
					'type' => 98,
				)
			),
			// tqSeoSitemapXml
			'sitemap.xml' => array(
				'keyValues' => array(
					'type' => 841132,
				),
			),
			// tqSeoSitemapTxt
			'sitemap.txt' => array(
				'keyValues' => array(
					'type' => 841131,
				),
			),
			// tqSeoRobotsTxt
			'robots.txt' => array(
				'keyValues' => array(
					'type' => 841133,
				),
			),
		)
	),
	'fixedPostVars' => array(
		'newsDetailConfiguration' => array(
			array(
				'GETvar' => 'tx_news_pi1[news]',
				'lookUpTable' => array(
					'table' => 'tx_news_domain_model_news',
					'id_field' => 'uid',
					'alias_field' => 'title',
					'addWhereClause' => ' AND NOT deleted',
					'useUniqueCache' => 1,
					'useUniqueCache_conf' => array(
						'strtolower' => 1,
						'spaceCharacter' => '-'
					),
					'autoUpdate' => 1,
					'expireDays' => 180,
				)
			)
		),
		'64' => 'newsDetailConfiguration'
	),
	'postVarSets' => array(
		'_DEFAULT' => array(
			// EXT:news start
			'article' => array(
				array(
					'GETvar' => 'tx_news_pi1[action]',
					'noMatch' => 'bypass'
				),
				array(
					'GETvar' => 'tx_news_pi1[controller]',
					'noMatch' => 'bypass'
				),
				array(
					'GETvar' => 'tx_news_pi1[news]',
					'lookUpTable' => array(
						'table' => 'tx_news_domain_model_news',
						'id_field' => 'uid',
						'alias_field' => 'title',
						'addWhereClause' => ' AND NOT deleted',
						'useUniqueCache' => 1,
						'useUniqueCache_conf' => array(
							'strtolower' => 1,
							'spaceCharacter' => '-',
						),
					),
				),
			),
		// EXT:news end
		)
	)
);

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'] = array(
	'_DEFAULT' => $defaultConf,
	'local.apostroph' => '_DEFAULT',
	'www.local.apostroph' => 'local.apostroph',
	'local.apostroph.wehost.asia' => '_DEFAULT',
	'www.local.apostroph.wehost.asia' => 'local.apostroph.wehost.asia',
	'dev.apostroph.wehost.asia' => '_DEFAULT',
	'www.dev.apostroph.wehost.asia' => 'dev.apostroph.wehost.asia',
	'latest.apostroph.wehost.asia' => '_DEFAULT',
	'www.latest.apostroph.wehost.asia' => 'latest.apostroph.wehost.asia',
	'staging.apostroph.wehost.asia' => '_DEFAULT',
	'www.staging.apostroph.wehost.asia' => 'staging.apostroph.wehost.asia',
	'demo.apostroph.wehost.asia' => '_DEFAULT',
	'www.demo.apostroph.wehost.asia' => 'demo.apostroph.wehost.asia',
	'temp.apostroph.wehost.asia' => '_DEFAULT',
	'www.temp.apostroph.wehost.asia' => 'temp.apostroph.wehost.asia'
);
?>