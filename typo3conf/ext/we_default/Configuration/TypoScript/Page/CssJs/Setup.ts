page {
	includeJSFooterlibs {
		jQueryCore = {$const.path.resource.javascript}JQuery/{$const.version.jQuery}/jquery.min.js
		jQueryCore {
			forceOnTop = 1
			disableCompression = 1
		}

		bootstrap = {$const.path.resource.javascript}Bootstrap/{$const.version.twitter_bootstrap}/bootstrap.min.js
		bootstrap {
			external = 0
			disableCompression = 1
		}
	}
}