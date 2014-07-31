TCEFORM {
	pages {
		/**
		 * disable fields of pages, that are not configured
		 * 0 for off, 1 for on
		 */
		abstract.disabled = 1
		alias.disabled = 1
		author.disabled = 0
		cache_timeout.disabled = 1
		content_from_pid.disabled = 0
		description.disabled = 0
		email.disabled = 0
		fe_login_mode.disabled = 1
		is_siteroot.disabled = 0
		keywords.disabled = 0
		l18n_cfg.disabled = 1
		lastUpdated.disabled = 1
#		layout.disabled = 1
		module.disabled = 1
		newUntil.disabled = 1
		no_cache.disabled = 0
		php_tree_stop.disabled = 1
		subtitle.disabled = 1
		target.disabled = 1
	}

	tt_content {
		header_layout {
			altLabels.1 = Heading 1
			altLabels.2 = Heading 2
			altLabels.3 = Heading 3
			altLabels.4 = Heading 4
			altLabels.5 = Heading 5

			removeItems = 0,1

			## Example of custom heading
			#addItems.99 = Blue Heading 1
		}

		section_frame {
			## items can be removed if you do not want editor to see in CE layout
			#removeItems = 1,5,6,10,11,12,20,21,66

			## Example of custom frame
			#addItems.100 = ###Test Frame###
		}

		/**
		 * disable fields of tt_content, that are not configured
		 * 0 for off, 1 for on
		 */
		colPos.disabled = 0
		date.disabled = 1
		header_position.disabled = 1
		image_compression.disabled = 1
		image_effects.disabled = 1
#		layout.disabled = 1
		linkToTop.disabled = 1
		sectionIndex.disabled = 1
		section_frame.disabled = 0
		spaceAfter.disabled = 1
		spaceBefore.disabled = 1
		subheader.disabled = 1
		sys_language_uid.disabled = 0

		/**
		 * RTE width in fullscreen view
		 */
		bodytext.RTEfullScreenWidth = 80%
	}
}

TCEMAIN {
	translateToMessage = Please translate `%s`

	## Don't hide newly copied pages or content. Prevent `copy X` on copy
	default {
		disablePrependAtCopy = 1
		disableHideAtCopy = 1
	}

	table {
		pages < TCEMAIN.default
		tt_content < TCEMAIN.default
	}

	## default be usergroup when creating new pages (every beuser should be in this group!)
	permissions {
		groupid = 1
		user = show,edit,delete,new,editcontent
		group = show,edit,delete,new,editcontent
		everybody =
	}
}

## Set the default label and flag
mod {
	SHARED {
		defaultLanguageLabel = English
		defaultLanguageFlag = gb
	}

	web_list {
		## edit record just by clicking on title in list-view
		clickTitleMode = edit

		## alternating colors for records in list-view
		alternateBgColors = 1

		itemsLimitPerTable = 20
		itemsLimitSingleTable = 100

		## Hide static_info_tables records on the rootpage
		hideTables = static_template,static_countries,static_country_zones,static_currencies,static_languages,static_territories,static_taxes,static_markets
	}

	xMOD_alt_doc {
		disableDocSelector = 1
		disableCacheSelector = 1
	}

	web_layout {
		defLangBinding = 1
	}

	wizards {
		## http://typo3.org/documentation/document-library/core-documentation/doc_core_tsconfig/4.3.2/view/1/5/#id2505051
		## http://buzz.typo3.org/people/steffen-kamper/article/the-new-content-element-wizard-in-version-43/
		newContentElement {
			renderMode = tabs

			wizardItems {
				common {
					elements {
						header {
							icon = gfx/c_wiz/regular_header.gif
							title = Header
							description = A simple header.
							tt_content_defValues {
								CType = header
							}
						}
					}

					## original: text,textpic,image,bullets,table
					show := addToList(header)

					## show only those elements, rest is possible via RTE
					#show := removeFromList(text,image,bullets,table)
				}

				plugins {
					#show =
				}

				special {
					## original: uploads,media,menu,html,div
					#show := removeFromList(uploads,div)
				}
			}
		}
	}
}