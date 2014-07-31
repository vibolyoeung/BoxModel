## Accessibility
## Standard key usage defined here: http://webaim.org/techniques/keyboard/accesskey#standard
## S - Skip navigation
## 1 - Home page
## 2 - What's new
## 3 - Site map
## 4 - Search
## 5 - Frequently Asked Questions (FAQ)
## 6 - Help
## 7 - Complaints procedure
## 8 - Terms and conditions
## 9 - Contact form
## 0 - Access key details

lib.misc.accessibility = COA
lib.misc.accessibility {
	wrap = <ul>|</ul>
	10 = TEXT
	10.wrap = <li> | </li>
	10.typolink.ATagParams = accesskey = S
	10.typolink.section = main-content
	10.typolink.parameter.data = page:uid
	10.data = {$_lll}:skip_navigation

	20 < .10
	20.typolink >
	20.typolink.ATagParams = accesskey = 1
	20.typolink.parameter = {$const.page.home}
	20.data = {$_lll}:home
	20.if.isTrue = {$const.page.home}

	30 < .10
	30.typolink >
	30.typolink.ATagParams = accesskey = 9
	30.typolink.parameter = {$const.page.contact}
	30.data = {$_lll}:contact
	30.if.isTrue = {$const.page.contact}
}