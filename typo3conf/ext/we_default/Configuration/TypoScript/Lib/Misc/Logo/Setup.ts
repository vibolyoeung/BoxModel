## Logo configuration
lib.misc.logo = IMAGE
lib.misc.logo {
	file = EXT:we_custom/Resources/Public/Images/logo.png
	file.height = 40
	altText = Boxmodel Logo
	imageLinkWrap = 1
	imageLinkWrap {
		enable = 1
		typolink.parameter = {$const.page.root}
		typolink.ATagParams = class = "navbar-brand"
	}
	titleText = Boxmodel
}