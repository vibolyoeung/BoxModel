page.headerData {
	## Page Title Configuration - Lib/Misc/Htmltitle/Setup.ts
	10 =< lib.misc.htmltitle

	## Enable Support HTML5 in old IE browsers
	20 = TEXT
	20.value (
		<!--[if lt IE 9]><script type="text/javascript" src="typo3conf/ext/we_default/Resources/Public/JavaScript/html5shiv.js"></script><![endif]-->
	)

	## Prepare Google Analytics
	## headerData.100000000 is reserved and 100000000 is maximum
	100000000 < lib.misc.analytics
}