TCEFORM {
	pages {
		module.disabled = 0
	}

	tt_content {

		header_layout {

		}

		section_frame {
			disabled = 0
				addItems.101 = col-lg-1
				addItems.102 = col-lg-2
				addItems.103 = col-lg-3
				addItems.104 = col-lg-4
				addItems.105 = col-lg-5
				addItems.106 = col-lg-6
				addItems.107 = col-lg-7
				addItems.108 = col-lg-8
				addItems.109 = col-lg-9
				addItems.110 = col-lg-10
				addItems.111 = col-lg-11
				addItems.112 = col-lg-12

				## Remove default TYPO3 frame
				removeItems = 0,1,5,6,10,11,12,20,21
		}
	}
}

TCEMAIN {
	default {

	}

	table {

	}

	permissions {

	}
}

## Set the default label and flag
mod {
	SHARED {

	}

	web_list {

	}

	xMOD_alt_doc {

	}

	web_layout {

	}

	##linkhandler: override mod tt_new to news syestem
	tx_linkhandler {
		tx_news_domain_model_news {
			label = News
			listTables = tx_news_domain_model_news
		}
	}
}