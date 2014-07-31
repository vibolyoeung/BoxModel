## Google Analytics :: Asynchronous Syntax
## See https://developers.google.com/analytics/devguides/collection/gajs/#quickstart
lib.misc.analytics = TEXT
lib.misc.analytics {
	value (

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-XXXXX-X']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
	)

	## Compatible with TYPO3 v4.6+ only
	replacement {
		10 {
			search = UA-XXXXX-X
			replace = {$const.analytics.account}
		}
	}

	## If the Analytics account is not empty
	if.isTrue = {$const.analytics.account}
}

## Remove Analytics when default id is not changed
[globalVar = LIT:UA-XXXXX-X = {$const.analytics.account}]
	lib.misc.analytics = TEXT
	lib.misc.analytics.value (

<!-- Google Analytics is missing. -->
	)
[end]