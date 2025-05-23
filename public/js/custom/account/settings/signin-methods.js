"use strict";

// Class definition
var KTAccountSettingsSigninMethods = function () {
    // Private functions
    var initSettings = function () {

        // UI elements
        var signInMainEl = document.getElementById('kt_signin_email');
        var signInEditEl = document.getElementById('kt_signin_email_edit');
        var passwordMainEl = document.getElementById('kt_signin_password');
        var passwordEditEl = document.getElementById('kt_signin_password_edit');

        // button elements
        var signInChangeEmail = document.getElementById('kt_signin_email_button');
        var signInCancelEmail = document.getElementById('kt_signin_cancel');
        var passwordChange = document.getElementById('kt_signin_password_button');
        var passwordCancel = document.getElementById('kt_password_cancel');

        // toggle UI
        signInChangeEmail.querySelector('button').addEventListener('click', function () {
            toggleChangeEmail();
        });

        signInCancelEmail.addEventListener('click', function () {
            toggleChangeEmail();
        });

        passwordChange.querySelector('button').addEventListener('click', function () {
            toggleChangePassword();
        });

        passwordCancel.addEventListener('click', function () {
            toggleChangePassword();
        });

        var toggleChangeEmail = function () {
            signInMainEl.classList.toggle('d-none');
            signInChangeEmail.classList.toggle('d-none');
            signInEditEl.classList.toggle('d-none');
        }

        var toggleChangePassword = function () {
            passwordMainEl.classList.toggle('d-none');
            passwordChange.classList.toggle('d-none');
            passwordEditEl.classList.toggle('d-none');
        }
    }

    var handleChangeEmail = function (e) {
        var validation;

        // form elements
        var form = document.getElementById('kt_signin_change_email');
        var submitButton = form.querySelector('#kt_signin_submit');

        validation = FormValidation.formValidation(
            form,
            {
                fields: {
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'Email ist erforderlich'
                            },
                            emailAddress: {
                                message: 'Dies ist keine gültige Mailadresse'
                            }
                        }
                    },

                    password: {
                        validators: {
                            notEmpty: {
                                message: 'Passwort ist erforderlich'
                            }
                        }
                    }
                },

                plugins: { //Learn more: https://formvalidation.io/guide/plugins
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row'
                    })
                }
            }
        );

        submitButton.addEventListener('click', function (e) {
            e.preventDefault();

            validation.validate().then(function (status) {
                if (status === 'Valid') {

                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');

                    // Disable button to avoid multiple click
                    submitButton.disabled = true;

                    // Send ajax request
                    axios.post(form.getAttribute('action'), new FormData(form))
                        .then(function (response) {
                            // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                            Swal.fire({
                                text: "Deine Mailadresse wurde erfolgreich geändert.",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Weiter!",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light-primary"
                                }
                            });
                        })
                        .catch(function (error) {
                            let dataMessage = error.response.data.message;
                            let dataErrors = error.response.data.errors;

                            for (const errorsKey in dataErrors) {
                                if (!dataErrors.hasOwnProperty(errorsKey)) continue;
                                dataMessage += "\r\n" + dataErrors[errorsKey];
                            }

                            if (error.response) {
                                Swal.fire({
                                    text: error.response.data.message,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Weiter!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                            }
                        })
                        .then(function () {
                            // always executed
                            // Hide loading indication
                            submitButton.removeAttribute('data-kt-indicator');

                            // Enable button
                            submitButton.disabled = false;
                        });

                } else {
                    Swal.fire({
                        text: "Es sind Fehler aufgetreten, bitte versuche es erneut.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Weiter!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    });
                }
            });
        });
    }

    var handleChangePassword = function (e) {
        var validation;

        // form elements
        var form = document.getElementById('kt_signin_change_password');
        var submitButton = form.querySelector('#kt_password_submit');

        validation = FormValidation.formValidation(
            form,
            {
                fields: {
                    current_password: {
                        validators: {
                            notEmpty: {
                                message: 'Aktuelles Passwort ist erforderlich '
                            }
                        }
                    },

                    password: {
                        validators: {
                            notEmpty: {
                                message: 'Neues Passwort ist erforderlich'
                            }
                        }
                    },

                    password_confirmation: {
                        validators: {
                            notEmpty: {
                                message: 'Bestätigungs-Passwort ist erforderlich'
                            },
                            identical: {
                                compare: function () {
                                    return form.querySelector('[name="password"]').value;
                                },
                                message: 'Die Passwörter stimmen nicht überein.'
                            }
                        }
                    },
                },

                plugins: { //Learn more: https://formvalidation.io/guide/plugins
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row'
                    })
                }
            }
        );

        submitButton.addEventListener('click', function (e) {
            e.preventDefault();

            validation.validate().then(function (status) {
                if (status == 'Valid') {

                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');

                    // Disable button to avoid multiple click
                    submitButton.disabled = true;

                    // Send ajax request
                    axios.post(form.getAttribute('action'), new FormData(form))
                        .then(function (response) {
                            // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                            Swal.fire({
                                text: "Das Passwort wurde erfolgreich zurückgesetzt",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Weiter!",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light-primary"
                                }
                            });
                        })
                        .catch(function (error) {
                            let dataMessage = error.response.data.message;
                            let dataErrors = error.response.data.errors;

                            for (const errorsKey in dataErrors) {
                                if (!dataErrors.hasOwnProperty(errorsKey)) continue;
                                dataMessage += "\r\n" + dataErrors[errorsKey];
                            }

                            if (error.response) {
                                Swal.fire({
                                    text: error.response.data.message,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Weiter!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                            }
                        })
                        .then(function () {
                            // always executed
                            // Hide loading indication
                            submitButton.removeAttribute('data-kt-indicator');

                            // Enable button
                            submitButton.disabled = false;
                        });

                } else {
                    Swal.fire({
                        text: "Es sind Fehler aufgetreten, bitte versuche es erneut.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Weiter!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    });
                }
            });
        });
    }

    // Public methods
    return {
        init: function () {
            initSettings();
            handleChangeEmail();
            handleChangePassword();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAccountSettingsSigninMethods.init();
});
