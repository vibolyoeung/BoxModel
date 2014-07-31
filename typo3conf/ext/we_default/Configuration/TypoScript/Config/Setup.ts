## Default Configuration
config {
	## URL
	baseURL = {$const.url.live}
	absRefPrefix = /

	## Language settings
	sys_language_uid = 0
	language = en
	locale_all = en_US.UTF-8
	alternate_html_xhtml_language = en
	htmlTag_langKey = en
	sys_language_overlay = 1
	sys_language_mode = content_fallback
	sys_language_softMergeIfNotBlank = tt_content:image, tt_content:caption
	uniqueLinkVars = 1
	linkVars = L

	## 2 = disable pag title completely
	noPageTitle = 2

	## CSS - JS Optimization
	removeDefaultJS = 0
	compressCss = {$const.compressCss}
	compressJs = {$const.compressJs}
	concatenateCss = {$const.concatenateCss}
	concatenateJs = {$const.concatenateJs}
	inlineStyle2TempFile = 1
	moveJsFromHeaderToFooter = {$const.moveJsFromHeaderToFooter}

	## Doctype
	doctype = html5
	xhtml_cleaning = all
	xmlprologue = none
	doctypeSwitch = 1
	metaCharset = utf-8
	renderCharset = utf-8

	## Caching
	no_cache = 0
	sendCacheHeaders = 0
	cache_period = 604800
	cache_clearAtMidnight = 0

	## RealURL
	tx_realurl_enable = 1
	simulateStaticDocuments = 0

	## even it is enabled but the frontend indexing is still disabled, Use crawler configuration
	index_enable = 1
	index_externals = 1
	index_metatags = 1

	## Spam Protection
	spamProtectEmailAddresses = -7
	spamProtectEmailAddresses_atSubst = (at)

	## image settings
	disableImgBorderAttr = 1
	meaningfulTempFilePrefix = 100

	## Comment
	disablePrefixComment = 1
	headerComment = {$const.headerComment}
}