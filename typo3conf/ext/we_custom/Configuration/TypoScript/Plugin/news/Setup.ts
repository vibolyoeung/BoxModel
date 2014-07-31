## News System Configuration
<INCLUDE_TYPOSCRIPT: source="FILE: EXT:news/Configuration/TypoScript/setup.txt">
plugin.tx_news {
	settings {
		relatedFiles {
			showIconDownload = 1
		}
		detail {
			showSocialShareButtons = {$plugin.tx_news.settings.detail.showSocialShareButtons}
			media {
				image {
					notFirstImage {
						width = {$plugin.tx_news.settings.detail.media.image.notFirstImage.width}
						height = {$plugin.tx_news.settings.detail.media.image.notFirstImage.height}
					}
				}
			}
	}
		}
	}
}
## RSS Feed
pageNewsRSS = PAGE
pageNewsRSS {
	typeNum = 100
	10 = USER
	10 {
		userFunc = tx_extbase_core_bootstrap->run
		pluginName = Pi1
		extensionName = News
		switchableControllerActions {
			News {
				1 = list
			}
		}
		settings < plugin.tx_news.settings
		settings.format = xml
		settings.detailPid = {$plugin.tx_news.settings.detailPid}
	}

	config {
		# deactivate Standard-Header
		disableAllHeaderCode = 1
		# no xhtml tags
		xhtml_cleaning = none
		admPanel = 0
		metaCharset = utf-8
		# define charset
		additionalHeaders = Content-Type:text/xml;charset=utf-8
		disablePrefixComment = 1
		absRefPrefix < config.baseURL
	}
}
## Condition set when on news details view
[globalVar = GP:tx_news_pi1|news > 0]
		# Set default action to detail if a news is passed through parameter
	config.defaultGetVars {
		tx_news_pi1.action = detail
	}

		# Clear page title because news title will be used
	lib.misc.pagetitle >

		# Keep parameter when switch language at news detail page
	lib.nav.language {
	1 {
		NO {
			additionalParams.cObject = COA
			additionalParams.cObject {
				10 = TEXT
				10.data = GP:tx_news_pi1|news
				10.wrap = &tx_news_pi1[news]=|
				20.required = 1

				20 = TEXT
				20.data = GP:tx_news_pi1|controller
				20.wrap = &tx_news_pi1[controller]=|
				20.required = 1

				30 = TEXT
				30.data = GP:tx_news_pi1|action
				30.wrap = &tx_news_pi1[action]=|
				30.required = 1

				40 = TEXT
				40.data = GP:cHash
				40.wrap = &cHash=|
				40.required = 1
		}
	}
}
[global]