lib.nav.language = HMENU
lib.nav.language {
	special = language
	special.value = {$const.language.special.value}
	special.normalWhenNoLanguage = 0

	1 = TMENU
	1 {
		wrap = <ul id="lang-nav" class="nav navbar-nav navbar-right">|</ul>

		NO {
			stdWrap.cObject = TEXT
			stdWrap.cObject.data = {$_lll}:lib_nav_language_label_en || {$_lll}:lib_nav_language_label_km || {$_lll}:lib_nav_language_label_de
			allWrap = <li>|<i class="lang-bg"></i></li> |*| <li>|<i class="lang-bg"></i></li> |*| <li class="last">|<i class="lang-bg"></i></li>
		}

		ACT < .NO
		ACT = 1
		ACT {
			allWrap = <li class="active">|<i class="lang-bg"></i></li> |*| <li class="active">|<i class="lang-bg"></i></li> |*| <li class="last active">|<i class="lang-bg"></i></li>
		}

		USERDEF1 < .NO
		USERDEF1 = 1
		USERDEF1.doNotLinkIt = 1
		USERDEF1.allWrap = <li><span class="hidden"> | </span></li>
	}
}