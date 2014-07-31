## Copyright
lib.misc.copyright = TEXT
lib.misc.copyright {
	wrap = <p class="copyright">|</p>
	data = {$_lll}:copyright_note
	
	## replace year to current and powered_by
	replacement {

		10 {
			search = ###START_YEAR###
			replace = {$const.project.start_year}
		}

		20 {
			search = ###YEAR###
			replace.data = date:U
			replace.strftime = %Y
		}

		30 {
			search = ###POWERED_BY###
			replace.data = {$_lll}:powered_by
			replace.typolink.parameter.data = {$_lll}:powered_by_link
			replace.typolink.extTarget = _blank
		}
	}

	required = 1
}