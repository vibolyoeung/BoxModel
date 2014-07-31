## HTML Site Title Configuration
lib.misc.htmltitle = COA
lib.misc.htmltitle {
	wrap = <title>|</title>

	## Page Title part
	10 = TEXT
	10.field = tx_tqseo_pagetitle // title

	## Website Title part
	20 = TEXT
	20.data = {$_lll}:sitetitle
	20.noTrimWrap = | - |

}

## If Root
[globalVar = TSFE:id = {$const.page.root}]
	lib.misc.htmltitle.10.override.data = {$_lll}:home
[end]

## If News System single view
[globalVar = GP:tx_news_pi1|news > 0 ]
	lib.misc.htmltitle.10 >
	lib.misc.htmltitle.10 = RECORDS
	lib.misc.htmltitle.10 {
		dontCheckPid = 1
		tables = tx_news_domain_model_news
		source.data = GP:tx_news_pi1|news
		conf.tx_news_domain_model_news = TEXT
		conf.tx_news_domain_model_news.field = title
		conf.tx_news_domain_model_news.stripHtml = 1
		stdWrap {
			crop = 100 |...
			stripHtml = 1
		}
	}
[end]