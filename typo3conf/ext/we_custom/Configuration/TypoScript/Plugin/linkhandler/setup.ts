## Default News Configuration
<INCLUDE_TYPOSCRIPT: source="FILE: EXT:linkhandler/static/link_handler/setup.txt">

################################################
#   Setup the linkhandler
#
plugin.tx_linkhandler >
plugin.tx_linkhandler {
	tx_news_domain_model_news {
		parameter = {$const.page.news}
		additionalParams = &tx_news_pi1[news]={field:uid}
		additionalParams.insertData=1
		useCacheHash = 1
	}
}