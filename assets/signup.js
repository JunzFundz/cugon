function alertErrors() {
    setTimeout(function () {
        $('#alert-box').removeClass('visible opacity-100').addClass('invisible');
    }, 1500);
}

function setErrorWithTimeout(element, errorMessage) {
    element.removeClass('border-gray-300').addClass('border-red-600');
    $('#alert-box').removeClass('invisible').addClass('visible opacity-100');
    $('#alert-text').html(errorMessage);
    setTimeout(function () {
        element.removeClass('border-red-600').addClass('border-gray-300');
    }, 3000);
    alertErrors();
}

function validateSignup() {
    var username = $('#username').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var password = $('#password').val();

    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    const phoneRegex = /^\d{12}$/;

    if (username === '' || username == null) {
        setErrorWithTimeout($('#username'), "Username is required");
        return false;
    }

    if (!emailRegex.test(email)) {
        setErrorWithTimeout($('#email'), "Email format is incorrect");
        return false;
    }

    if (email === '' || email == null) {
        setErrorWithTimeout($('#email'), "Email field is empty");
        return false;
    }

    if (!phoneRegex.test(phone)) {
        setErrorWithTimeout($('#phone'), "Phone number should be 10 digits");
        return false;
    }

    if (phone === '' || phone == null) {
        setErrorWithTimeout($('#phone'), "Phone number is required");
        return false;
    }

    if (password === '' || password == null) {
        setErrorWithTimeout($('#password'), "Password is required");
        return false;
    }

    if (password.length < 8) {
        setErrorWithTimeout($('#password'), "Password must be at least 8 characters long");
        return false;
    }
    return true;
}

function validateLogin() {
    var email = $('#email').val();
    var password = $('#password').val();

    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    if (!emailRegex.test(email)) {
        setErrorWithTimeout($('#email'), "Email format is incorrect");
        return false;
    }

    if (email === '' || email == null) {
        setErrorWithTimeout($('#email'), "Email field is empty");
        return false;
    }

    if (password === '' || password == null) {
        setErrorWithTimeout($('#password'), "Password is required");
        return false;
    }
    if (!password) {
        setErrorWithTimeout($('#password'), "Password is incorrect");
        return false;
    }

    if (password.length < 8) {
        setErrorWithTimeout($('#password'), "Password must be at least 8 characters long");
        return false;
    }
    return true;
}


$(function () {

    //!signup
    $('#signupForm').on('submit', function (e) {
        e.preventDefault();

        if (validateSignup()) {
            var username = $('#username').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var password = $('#password').val();

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: {
                    'signup': true,
                    'username': username,
                    'email': email,
                    'phone': phone,
                    'password': password
                },
                    success: function (response) {
                        if (response.success) {
                            $('#alert-box').removeClass('invisible').addClass('visible opacity-100');
                            $('#alert-text').html(response.success);
                            setTimeout(function () {
                                $('#alert-box').removeClass('visible').addClass('invisible');
                                if (response.redirect) {
                                    window.location.href = response.redirect;
                                }
                            }, 3000);

                        } else {    
                            $('#alert-box').removeClass('invisible').addClass('visible opacity-100');
                            $('#alert-text').html(response.error);
                            setTimeout(function () {
                                $('#alert-box').removeClass('visible').addClass('invisible');
                            }, 3000);
                        }
                    },

                error: function (xhr, status, error) {
                    $('#alert-box').removeClass('invisible').addClass('visible opacity-100');
                    $('#alert-text').html('An error occurred. ' + status + ' Please try again later.');
                    setTimeout(function () {
                        $('#alert-box').removeClass('visible').addClass('invisible');
                    }, 3000);
                }

            });
        }
    })
    
    //! verify
    $('#verify-account').on('click', function(e) {
        e.preventDefault();
    
        const otp = $('#verification-code').val()
        // console.log(code)
        $.ajax({
            url: '../data/confirm-account.php',
            type: 'post',
            data: {
                'verify': true,
                'email': '<?php echo $_GET["email"]; ?>',
                'token': '<?php echo $_GET["token"]; ?>',
                'otp': otp
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#alert-box').removeClass('invisible').addClass('visible opacity-100');
                    $('#alert-text').html(response.success);
                    setTimeout(function () {
                        $('#alert-box').removeClass('visible').addClass('invisible');
                        if (response.redirect) {
                            window.location.href = response.redirect;
                        }
                    }, 1500);
    
                } else {    
                    $('#alert-box').removeClass('invisible').addClass('visible opacity-100');
                    $('#alert-text').html(response.error);
                    setTimeout(function () {
                        $('#alert-box').removeClass('visible').addClass('invisible');
                    }, 3000);
                }
            },
            error: function(xhr, status, error) {
                console.error('An error occurred:', error);
            }
        });
    })

    //! login
    $('#loginForm').on('submit', function (e) {
        e.preventDefault();

        if (validateLogin()) {
            var email = $('#email').val();
            var password = $('#password').val();

            console.log(email, password)

            $.ajax({
                url: $(this).attr( 'action' ),
                type: $(this).attr( 'method' ),
                data: {
                    'login-user': true,
                    'email': email,
                    'password': password
                },
                dataType: 'json',
                success: function(response) {
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    } else {
                        $('#alert-box').removeClass('invisible').addClass('visible opacity-100');
                        $('#alert-text').html(response.error);
                        
                        setTimeout(function() {
                            $('#alert-box').removeClass('visible').addClass('invisible');
                        }, 1500);
                    }
                },
                
                error: function (xhr, status, error) {
                    $('#alert-box').removeClass('invisible').addClass('visible opacity-100');
                    $('#alert-text').html('An error occurred. ' + status + ' Please try again later.');
                    setTimeout(function () {
                        $('#alert-box').removeClass('visible').addClass('invisible');
                    }, 3000);
                }
                
            });
        }
    });

});