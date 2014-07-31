## tq_seo Configuration
<INCLUDE_TYPOSCRIPT: source="FILE: EXT:tq_seo/Configuration/TypoScript/setup.txt">

tqSeoSitemapXml.config.tx_realurl_enable = 1

## Rove the duplicate mata tags (description, keywords, robots)
plugin.tq_seo {
	metaTags {
		description =
		keywords =

		conf {
			description_page.field =
			keywords_page.field =
		}
	}
}