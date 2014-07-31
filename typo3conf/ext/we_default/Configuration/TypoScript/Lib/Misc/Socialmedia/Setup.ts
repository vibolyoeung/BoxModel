## Social media
lib.misc.socialmedia = COA
lib.misc.socialmedia {
	wrap = <ul class="social-media list-inline">|</ul>

	## Facebook
	10 = IMAGE
	10 {
		file = /typo3conf/ext/we_custom/Resources/Public/Images/facebook.png
		stdWrap {
			typolink.parameter = {$const.socialmedia.link.facebook}
			typolink.extTarget = _blank
			wrap = <li>|</li>
		}
		if.isTrue = {$const.socialmedia.link.facebook}
	}


	## Twitter
	20 = IMAGE
	20 {
		file = /typo3conf/ext/we_custom/Resources/Public/Images/twitter.png
		stdWrap {
			typolink.parameter = {$const.socialmedia.link.twitter}
			typolink.extTarget = _blank
			wrap = <li>|</li>
		}
		if.isTrue = {$const.socialmedia.link.twitter}
	}


	## Linkedin
	30 = IMAGE
	30 {
		file = /typo3conf/ext/we_custom/Resources/Public/Images/linkin.png
		stdWrap {
			typolink.parameter = {$const.socialmedia.link.linkedin}
			typolink.extTarget = _blank
			wrap = <li>|</li>
		}
		if.isTrue = {$const.socialmedia.link.linkedin}
	}
}