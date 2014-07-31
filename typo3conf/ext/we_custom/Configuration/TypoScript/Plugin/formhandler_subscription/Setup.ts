/*
## Formhandler Subscription  Configuration
<INCLUDE_TYPOSCRIPT: source="FILE: EXT:formhandler_subscription/Configuration/Settings/setup.txt">
plugin.Tx_Formhandler.settings.predef {
	formhandler_subscription_request_subscription {
		templateFile = {$plugin.formhandler_subscription.rootPath}RequestSubscription.html
		langFile.1 = {$plugin.formhandler_subscription.languagePath}locallang_formhandler_subscription_default.xml

		singleErrorTemplate {
			totalWrap = <span class="text-danger"> | </span>
			singleWrap = |
		}
		# In case an error occurred, all markers ###is_error_[fieldname]### are filled with the configured value of the setting "default".
		isErrorMarker {
			default = has-error
		}

		validators {
			1.config.fieldConf {
				gender.errorCheck.1 >
				first_name.errorCheck.1 >
				last_name.errorCheck.1 >
				email.errorCheck.1 = required
				email.errorCheck.2 = email
				email.errorCheck.3 = isNotInDBTable
				email.errorCheck.3 {
					table = tt_address
					field = email
					additionalWhere = pid={$plugin.formhandler_subscription.subscriberRecordsPID}
				}
			}
		}

		finishers {
			1.config.finishersNewSubscriber {
				10.config {
					fields {
						module_sys_dmail_html = 1
					}
				}
			}
		}
	}

	formhandler_subscription_request_update {
		templateFile = {$plugin.formhandler_subscription.rootPath}RequestUpdate.html
	}

	formhandler_subscription_remove_subscription {
		templateFile = {{$plugin.formhandler_subscription.rootPath}RemoveSubscription.html
	}
}
*/