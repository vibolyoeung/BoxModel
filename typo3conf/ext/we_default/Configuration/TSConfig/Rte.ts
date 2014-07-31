## RTE Configuration
RTE {
	classes {
		table {
			name = Table
			value = 
		}
		table-striped {
			name = Table Striped
			value = 
		}
		table-bordered {
			name = Table Bordered
			value = 
		}
		table-hover {
			name = Table Hover
			value = 
		}
		table-condensed {
			name = Table Condensed
			value = 
		}
	}
	default {

		## Possible CSS classes for links
		classesAnchor = btn btn-default, btn btn-primary, btn btn-success, btn btn-info, btn btn-warning, btn btn-danger, btn btn-link, btn btn-default btn-lg, btn btn-primary btn-lg, btn btn-success btn-lg, btn btn-info btn-lg, btn btn-warning btn-lg, btn btn-danger btn-lg, btn btn-link btn-lg, btn btn-default btn-sm, btn btn-primary btn-sm, btn btn-success btn-sm, btn btn-info btn-sm, btn btn-warning btn-sm, btn btn-danger btn-sm, btn btn-link btn-sm, btn btn-default btn-xs, btn btn-primary btn-xs, btn btn-success btn-xs, btn btn-info btn-xs, btn btn-warning btn-xs, btn btn-danger btn-xs, btn btn-link btn-xs
		classesAnchor.default {
			file =
			mail = 
			page =
			url =
		}

		## Custom formatblock (blockstyle update is required)
		buttons {
			blockstyle {
				tags {
					table.allowedClasses = table, table-striped, table-bordered, table-hover, table-condensed
				}
			}

			formatblock {
				removeItems = div
				orderItems = h2, h3, h3, h4, h5, blockquote, p
				items {
				}
			}
			textstyle {
				tags{
					span.allowedClasses = label,label-success,label-important,label-info,label-inverse,label-warning
				}
			}
			link {
				properties {
					class.allowedClasses := addToList(btn btn-default, btn btn-primary, btn btn-danger, btn btn-default btn-lg, btn btn-primary btn-lg, btn btn-danger btn-lg, btn btn-default btn-sm, btn btn-primary btn-sm, btn btn-danger btn-sm, btn btn-default btn-xs, btn btn-primary btn-xs, btn btn-danger btn-xs)
				}
			}
		}

		## Edit options for tables (cellspacing/ cellpadding / border)
		disableAlignmentFieldsetInTableOperations = 1
		disableBordersFieldsetInTableOperations = 1
		disableColorFieldsetInTableOperations = 1
		disableLayoutFieldsetInTableOperations = 1
		disableSpacingFieldsetInTableOperations = 1

		## This disables the RTE context menu so that spelling checking can be done with some browsers' context menu
		disableContextMenu = 1

		## Markup options
		enableWordClean = 1
		removeComments = 1
		removeTags = font
		removeTagsAndContents = 
		removeTrailingBR = 1

		enablePersonalDicts = 1

		## Hide header levels and other stuff
		## Deprecated since v6
		#hidePStyleItems = h1, address, blockquote, div

		## Keeps RTE Icons together in function groups
		keepButtonGroupTogether = 1

		## Show statusbar
		showStatusBar =  1

		## Table decalarations in RTE Toolbar
		hideTableOperationsInToolbar = 0
		keepToggleBordersInToolbar = 1

		## Shows all CSS classes in contentCSS file
		showTagFreeClasses = 0

		## Do not allow insertion of the following tags
		hideTags < RTE.default.removeTags

		/**
		 * Show / hide buttons
		 * cut / copy / paste are not shown in Chrome and Safari
		 *
		 * options
		 * copy, cut, paste, pastetoggle, pastebehaviour, pasteastext,
		 * textstyle, formatblock,  textstylelabel, blockstyle, blockstylelabel,
		 * bold, left, center, right, orderedlist, unorderedlist, insertcharacter,
		 * link, removeformat, table, toggleborders, tableproperties,
		 * rowproperties, rowinsertabove, rowinsertunder, rowdelete, rowsplit,
		 * columninsertbefore, columninsertafter, columndelete, columnsplit,
		 * cellproperties, cellinsertbefore, cellinsertafter, celldelete, cellsplit,
		 * cellmerge, findreplace, insertcharacter, undo, redo
		 * fontstyle, fontsize, strikethough, line, lefttoright, righttoleft,
		 * textcolor, bgcolor, textindicator, emoticon, user, spellcheck,
		 * chMode, inserttag, outdent, indent, justifyfull, subscript, superscript,
		 * acronym, italic, underline, image, showhelp, about
		 */
		#showButtons := addToList(orderedlist, unorderedlist, insertcharacter, link, image, removeformat, chMode, spellcheck)
		#showButtons := removeFromList(about)
		showButtons = citation, acronym, subscript, superscript, orderedlist, unorderedlist, table, definitionlist, formatblock, strong, emphasis, indent, outdent, link, insertcharacter, removeformat, tableproperties, tablerestyle, rowproperties, rowinsertabove, rowinsertunder, rowdelete, rowsplit, columnproperties, columninsertbefore, columninsertafter, columndelete, columnsplit, cellproperties, cellinsertbefore, cellinsertafter, celldelete, cellsplit, cellmerge, left, center, right

		hideButtons =

		## Add styles Left, center and right alignment of text in paragraphs (and cells).
		## it is possible to add td.align* to this list
		inlineStyle.text-alignment (
			p.align-left, h1.align-left, h2.align-left, h3.align-left, h4.align-left, h5.align-left, h6.align-left { text-align: left; }
			p.align-center, h1.align-center, h2.align-center, h3.align-center, h4.align-center, h5.align-center, h6.align-center { text-align: center; }
			p.align-right, h1.align-right, h2.align-right, h3.align-right, h4.align-right, h5.align-right, h6.align-right { text-align: right; }
		)

		## Use stylesheet file rather than the above mainStyleOverride and inlineStyle properties to style the contents
		ignoreMainStyleOverride = 1

		proc {

			/**
			 * list of allowed tags
			 *
			 * options
			 * table, tbody, thead, tr, th, td, h1, h2, h3, h4, h5, h6, div, p,
			 * br, span, ul, ol, li, re, blockquote, strong, em, b, i, u, sub,
			 * sup, strike, a, img, nobr, hr, tt, q, cite, abbr, acronym, center
			 *
			 * Allow embed (Youtube) HTML tags in the RTE
			 */
			allowTags := addToList(object, param, embed, iframe, script, table, abbr, acronym, cite)

			## tags allowed outside from p and div
			allowTagsOutside := addToList(object,embed,iframe,script)

			## list of denied tags
			denyTags < RTE.default.removeTags

			## as the name says ;-)
			dontConvBRtoParagraph = 1

			## allowed attributes in p and div tags
			keepPDIVattribs = align,class,style,id

			/**
			 * List all of your class selectors that are allowed on the way to the database
			 * custom CSS classes for formatblock
			 * allowedClasses := addToList(anchorlistinghead)
			 */
			allowedClasses =

			## HTML parser settings
			HTMLparser_rte {

				## allowed / denied tags (should be usually the same as in proc.*, otherwise it could be messed up)
				allowTags < RTE.default.proc.allowTags
				denyTags < RTE.default.proc.denyTags
				removeTags < RTE.default.removeTags

				## remove HTML comments
				removeComments = 1

				## Unmatched tags are removed (protect / 1 / 0)
				keepNonMatchedTags = 0
			}

			## modifications of the content on while saving to database
			entryHTMLparser_db = 1
			entryHTMLparser_db {

				## allowed / denied tags (should be usually the same as in proc.*, otherwise it could be messed up)
				allowTags < RTE.default.proc.allowTags
				denyTags < RTE.default.proc.denyTags
				removeTags < RTE.default.removeTags

				## remove all attributes from following tags
				noAttrib = b, i, u, strike, sub, sup, strong, em, quote, blockquote, cite, tt, br, center

				## remove tags if there is no attribute available
				rmTagIfNoAttrib = span,div

				## Encode HTML's special characters
				# htmlSpecialChars = 1

				## how to handle tags and attributes
				tags {
					## allow align attribute
					p {
						fixAttrib.align.unset = 1
						allowedAttribs := addToList(class,style,align)
					}
					div.fixAttrib.align.unset >

					hr.allowedAttribs = class

					## replace b and i tags
					b.remap = strong
					i.remap = em

					## allow img tags
					img >
				}
			}
		}

		## All classes have to be in RTE.default.proc.allowedClasses too.
		## possible CSS classes for paragraphs
		classesParagraph = align-left, align-center, align-right

		## possible CSS classes for spans
		classesCharacter =

		## possible CSS classes for images
		classesImage =

		## possible CSS classes for tables
		classesTable := addToList(table, table-striped, table-bordered, table-hover, table-condensed)
		classesTR =
		classesTH =
		classesTD =
	}
}

## Use same processing as on entry to database to clean content pasted into the editor
#RTE.default.enableWordClean.HTMLparser < RTE.default.proc.entryHTMLparser_db

## FE RTE configuration (htmlArea RTE only)
RTE.default.FE < RTE.default
RTE.default.FE.userElements >
RTE.default.FE.userLinks >