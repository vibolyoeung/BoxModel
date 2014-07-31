## Left navigation configuration
lib.nav.left = HMENU
lib.nav.left {
	stdWrap.wrap = <aside id="content_left"><nav id="nav_sub">|</nav></aside>
	stdWrap.required = 1
	entryLevel = 2

	1 = TMENU
	1 {
		wrap = <ul class="level-2 list-unstyled">|</ul>
		noBlur = 1
		expAll = 1

		NO {
			ATagTitle.field = title // nav_title
			stdWrap.htmlSpecialChars = 1
			wrapItemAndSub = <li>|</li>
			accessKey = 1
		}

		ACT < .NO
		ACT = 1
		ACT {
			wrapItemAndSub = <li class="active">|</li>
		}

		CUR < .ACT
		CUR = 1
		CUR.wrapItemAndSub = <li class="current">|</li>

		# IFSUB
		# ACTIFSUB
		# CURIFSUB
	}

	2 < .1
	2 {
		wrap = <ul class="level-3">|</ul>
	}
}