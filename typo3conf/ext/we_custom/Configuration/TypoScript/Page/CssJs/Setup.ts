page {
	includeCSS {
		screen = {$const.path.resource.css}Screen.css
	}

	includeJSFooterlibs {
		library = {$const.path.resource.javascript}libs.min.js
		jQueryCore {
			forceOnTop = 0
			disableCompression = 1
		}
	}

	includeJSFooter {
		main = {$const.path.resource.javascript}Main.js
	}
}