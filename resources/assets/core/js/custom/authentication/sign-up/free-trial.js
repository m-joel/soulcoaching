"use strict";

// Class Definition
var KTSignupFreeTrial = function() {
    // Elements
    var form;
    var submitButton;
    var validator;
    var passwordMeter;

    // Handle form
    var handleForm = function(e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
			form,
			{
				fields: {
					'email': {
                        validators: {
                            regexp: {
                                regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                message: 'Dies ist keine gültige Mailadresse',
                            },
							notEmpty: {
								message: 'Mailadresse ist erforderlich'
							}
						}
					},
                    'password': {
                        validators: {
                            notEmpty: {
                                message: 'The Passwort ist erforderlich'
                            },
                            callback: {
                                message: 'Bitte ein gültiges Passwort eingeben.',
                                callback: function(input) {
                                    if (input.value.length > 0) {
                                        return validatePassword();
                                    }
                                }
                            }
                        }
                    },
                    'confirm-password': {
                        validators: {
                            notEmpty: {
                                message: 'Bitte bestätige dein Passwort.'
                            },
                            identical: {
                                compare: function() {
                                    return form.querySelector('[name="password"]').value;
                                },
                                message: 'Die Passwörter stimmen nicht überein.'
                            }
                        }
                    },
                    'toc': {
                        validators: {
                            notEmpty: {
                                message: 'Bitte akzeptiere die AGB, um fortzufahren.'
                            }
                        }
                    }
                },
                plugins: {
					trigger: new FormValidation.plugins.Trigger({
                        event: {
                            password: false
                        }
                    }),
					bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
			}
		);

        submitButton.addEventListener('click', function (e) {
            e.preventDefault();

            validator.revalidateField('password');

            validator.validate().then(function(status) {
		        if (status == 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');

                    // Disable button to avoid multiple click
                    submitButton.disabled = true;

                    // Simulate ajax request
                    setTimeout(function() {
                        // Hide loading indication
                        submitButton.removeAttribute('data-kt-indicator');

                        // Enable button
                        submitButton.disabled = false;

                        // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                        Swal.fire({
                            text: "Du hast dich erfolgreich registriert!",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Weiter!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function (result) {
                            if (result.isConfirmed) {
                                form.reset();  // reset form
                                passwordMeter.reset();  // Passwort zurücksetzen meter

                                //form.submit(); // submit form
                                var redirectUrl = form.getAttribute('data-kt-redirect-url');
                                if (redirectUrl) {
                                    location.href = redirectUrl;
                                }
                            }
                        });
                    }, 1500);
                } else {
                    // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                    Swal.fire({
                        text: "Es sind Fehler aufgetreten, bitte versuche es erneut.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Weiter!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
		    });
        });

        form.querySelector('input[name="password"]').addEventListener('input', function() {
            if (this.value.length > 0) {
                validator.updateFieldStatus('password', 'NotValidated');
            }
        });
    }

    // Password input validation
    var validatePassword = function() {
        return  (passwordMeter.getScore() === 100);
    }

    // Public functions
    return {
        // Initialization
        init: function() {
            form = document.querySelector('#kt_free_trial_form');
            submitButton = document.querySelector('#kt_free_trial_submit');
            passwordMeter = KTPasswordMeter.getInstance(form.querySelector('[data-kt-password-meter="true"]'));

            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTSignupFreeTrial.init();
});


