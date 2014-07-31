## RTE Configuration
RTE {
	classes {
	}

	default {
		contentCSS = EXT:we_custom/Resources/Public/Css/Rte.css

		buttons{
			link {
				properties {
					## Possible classes in twitter bootstrap 3.0
					## class.allowedClasses := addToList(btn btn-default, btn btn-primary, btn btn-success, btn btn-info, btn btn-warning, btn btn-danger, btn btn-link, btn btn-default btn-lg, btn btn-primary btn-lg, btn btn-success btn-lg, btn btn-info btn-lg, btn btn-warning btn-lg, btn btn-danger btn-lg, btn btn-link btn-lg, btn btn-default btn-sm, btn btn-primary btn-sm, btn btn-success btn-sm, btn btn-info btn-sm, btn btn-warning btn-sm, btn btn-danger btn-sm, btn btn-link btn-sm, btn btn-default btn-xs, btn btn-primary btn-xs, btn btn-success btn-xs, btn btn-info btn-xs, btn btn-warning btn-xs, btn btn-danger btn-xs, btn btn-link btn-xs)
				}
			}
			left.useClass = text-left
			right.useClass = text-right
			center.useClass = text-center
		}

		###linkhandler: override RTE tt_new to news syestem
		tx_linkhandler {
			tx_news_domain_model_news {
				label = News
				listTables = tx_news_domain_model_news
			}
		}
	}
}