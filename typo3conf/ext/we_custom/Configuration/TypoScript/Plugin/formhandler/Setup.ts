plugin.Tx_Formhandler.settings.predef {
	formhandler-basic-contactform {
		## This is the title of the predefined form shown in the dropdown box in the plugin options.
		name = Formhandler Basic Contact Form

		## All form fields are prefixed with this values (e.g. contact[name])
		formValuesPrefix = contact

		langFile.1 = TEXT
		langFile.1.value = EXT:we_custom/Resources/Private/Language/locallang_formhandler_default.xml

		templateFile = TEXT
		templateFile.value = EXT:we_custom/Resources/Private/Templates/Plugin/formhandler/contactform.html

		## The master template is a file containing the markup for specific field types or other sub templates (e.g. for emails). You can use these predefined markups in your HTML template for a specific form.
		masterTemplateFile = TEXT
		masterTemplateFile.value = EXT:we_custom/Resources/Private/Templates/Plugin/formhandler/mastertemplate.html

		## These wraps define how an error messages looks like. The message itself is set in the lang file.
		singleErrorTemplate {
			totalWrap = <div class="col-lg-offset-2 col-lg-10">|</div>
			singleWrap = <span class="text-danger">|</span>
		}
		## In case an error occurred, all markers ###is_error_[fieldname]### are filled with the configured value of the setting "default".
		isErrorMarker {
			default = has-error
		}

		markers {
			website_url = TEXT
			website_url.data = TSFE:baseUrl

			lll_nl2br_email_admin_text = TEXT
			lll_nl2br_email_admin_text {
				data = LLL:EXT:we_custom/Resources/Private/Language/locallang_formhandler_default.xml:email_admin_text
			}

			lll_nl2br_email_user_text = TEXT
			lll_nl2br_email_user_text {
				data = LLL:EXT:we_custom/Resources/Private/Language/locallang_formhandler_default.xml:email_user_text
			}
		}

		# This block defines the error checks performed when the user hits submit.
		validators {
			1.class = Validator_Default
			1.config.fieldConf {
				name.errorCheck.1 = required
				email.errorCheck.1 = required
				email.errorCheck.2 = email
				message.errorCheck.1 = required
			}
		}

		## Spam Protection
		saveInterceptors.1 {
			# This Interceptor will check if the user needed at least 4 seconds to fill out the form. If not, the user gets redirected to a "SPAM detected" page.
			class = Interceptor_AntiSpamFormTime
			config {
				minTime {
					value = {$formhandler.contact-form.threshold}
					unit = seconds
				}
				redirectPage = {$formhandler.contact-form.spamRedirectPage}
			}
		}

		# Finishers are called after the form was submitted successfully (without errors).
		finishers {

			# Finisher_Mail sends emails to an admin and/or the user.
			1.class = Finisher_Mail
			1.config {
				checkBinaryCrLf = message
				admin {
					templateFile = TEXT
					templateFile.value = EXT:we_custom/Resources/Private/Templates/Plugin/formhandler/email-admin.html
					sender_email = {$formhandler.contact-form.email.admin.sender_email}
					to_email = {$formhandler.contact-form.email.admin.to_email}
					subject = TEXT
					subject.data = LLL:EXT:we_custom/Resources/Private/Language/locallang_formhandler_default.xml:email_admin_subject
				}
			}

			# Finisher_Redirect will redirect the user to another page after the form was submitted successfully.
			5.class = Finisher_Redirect
			5.config {
				redirectPage = {$formhandler.contact-form.redirectPage}
			}
		}
	}
}

# If the user has chosen to receive a copy of the contact request, reconfigure Finisher_Mail to send an email to the user to.
[globalVar = GP:contact|receive-copy = 1]
plugin.Tx_Formhandler.settings.predef.formhandler-basic-contactform {
	finishers {
		1.config {
			user {
				templateFile = TEXT
				templateFile.value = EXT:we_custom/Resources/Private/Templates/Plugin/formhandler/email-user.html
				sender_email = {$formhandler.contact-form.email.user.sender_email}
				to_email = email
				subject = TEXT
				subject.data = LLL:EXT:we_custom/Resources/Private/Language/locallang_formhandler_default.xml:email_user_subject
			}
		}
	}
}
[global]