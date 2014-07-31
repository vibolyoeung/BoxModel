## For the breadcrumb cObject we use a HMENU of the type 'rootline'
lib.nav.breadcrumb = COA
lib.nav.breadcrumb {
	wrap = <nav id="breadcrumb"><ol class="breadcrumb">|</ol></nav>

	10 = HMENU
	10 {
		## Select HMENU type 'special.rootline'
		special = rootline

		## Traverse the pagetree starting at the rootpage (0) and ending at the current page (-1)
		special.range = 0|-1

		## Pages which are excluded from the regular menus should still be shown in the breadcrumb
		includeNotInMenu = 1

		## This menu has only 1 level since this is a rootline-menu
		1 = TMENU
		1 {
			NO {
				stdWrap.htmlSpecialChars = 1
				allWrap = <li class="first">|</li> |*| <li>|</li> |*| <li>|</li>
			}

			## Add alternative, unlinked configuration for current page, which is always the last item in the breadcrumb
			CUR = 1
			CUR.stdWrap.htmlSpecialChars = 1
			CUR.allWrap = <li class="last current">|</li>

			## Do not wrap a link around this item
			CUR.doNotLinkIt = 1
		}
	}
}

## Add news title to the last part of breadcrumb in news single view
[globalVar = GP:tx_news_pi1|news > 0]
	lib.nav.breadcrumb {
		## Clear current state in news single view
		10.1.CUR >

		## Use news title as the current state
		20 = RECORDS
		20 {
			dontCheckPid = 1
			tables = tx_news_domain_model_news
			source.data = GP:tx_news_pi1|news
			source.intval = 1
			conf.tx_news_domain_model_news = TEXT
			conf.tx_news_domain_model_news.field = title
			wrap = <li class="last current">|</li>
		}
	}
[end]

## no breadcrumb for the very root
[treeLevel = 0]
	lib.nav.breadcrumb >
[end]