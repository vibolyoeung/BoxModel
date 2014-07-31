## Section Frame
tt_content.stdWrap.innerWrap.cObject {
	101 = TEXT
	101.value = <div class="col-lg-1">|</div>

	102 = TEXT
	102.value = <div class="col-lg-2">|</div>

	103 = TEXT
	103.value = <div class="col-lg-3">|</div>

	104 = TEXT
	104.value = <div class="col-lg-4">|</div>

	105 = TEXT
	105.value = <div class="col-lg-5">|</div>

	106 = TEXT
	106.value = <div class="col-lg-6">|</div>

	107 = TEXT
	107.value = <div class="col-lg-7">|</div>

	108 = TEXT
	108.value = <div class="col-lg-8">|</div>

	109 = TEXT
	109.value = <div class="col-lg-9">|</div>

	110 = TEXT
	110.value = <div class="col-lg-10">|</div>

	111 = TEXT
	111.value = <div class="col-lg-11">|</div>

	112 = TEXT
	112.value = <div class="col-lg-12">|</div>
}

## Modify ouput rendering of the A tag of filelink content
tt_content.uploads.20 {
	renderObj {
		50 = COA
		50.10 = COA
		50.10.10 < .20
		50.10.20 < .40
		50.20 < .30

		50.10 {
			10 {
				override.data = file:current:title
				override.if.isTrue.data = file:current:title

				typolink >
				wrap = |
			}

			15 = LOAD_REGISTER
			15.file_extension.data = file:current:extension
			15.file_extension.case = upper

			20 = TEXT
			20 {
				bytes.label = " B| K| M| G"
				wrap = |
				noTrimWrap = | ({register:file_extension}, |)|
				insertData = 1
			}

			stdWrap.typolink < tt_content.uploads.20.renderObj.10.stdWrap.typolink
			stdWrap.typolink {
				ATagParams = class="filelink
				ATagParams {
					noTrimWrap = | | {file:current:extension}"|
					insertData = 1
				}
				wrap = <i class="glyphicon glyphicon-download-alt"></i>|
				ATagBeforeWrap = 1
			}
		}

		20 >
		30 >
		40 >
	}
}