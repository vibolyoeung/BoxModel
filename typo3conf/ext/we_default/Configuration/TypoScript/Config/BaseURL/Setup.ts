## Condition to change config.baseURL
[globalVar = IENV:TYPO3_REQUEST_HOST = {$const.project.url.local}]
	config.baseURL = {$const.project.url.local}/
[globalVar = IENV:TYPO3_REQUEST_HOST = {$const.project.url.dev}]
	config.baseURL = {$const.project.url.dev}/
[globalVar = IENV:TYPO3_REQUEST_HOST = {$const.project.url.latest}]
	config.baseURL = {$const.project.url.latest}/
[globalVar = IENV:TYPO3_REQUEST_HOST = {$const.project.url.staging}]
	config.baseURL = {$const.project.url.staging}/
[globalVar = IENV:TYPO3_REQUEST_HOST = {$const.project.url.demo}]
	config.baseURL = {$const.project.url.demo}/
[end]