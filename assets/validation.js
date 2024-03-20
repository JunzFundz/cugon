function alertErrors() {
    setTimeout(function () {
        $('#alert-box').removeClass('visible opacity-100').addClass('invisible');
    }, 1500);
}

function setErrorWithTimeout(element, errorMessage) {
    element.removeClass('border border-gray-300').addClass('border-red-600');
    $('#alert-box').removeClass('invisible').addClass('visible opacity-100');
    $('#alert-text').html(errorMessage);
    setTimeout(function () {
        element.removeClass('border-red-600').addClass('border-gray-300');
    }, 3000);
    alertErrors();
}

//!Validation sa checkout inputs 
function onSubmission() {
    const singleDateInput = $('#singleDateInput').val();
    const startDate = $('#startDate').val();
    const endDate = $('#endDate').val();
    const dateOptions = $('#options').val();

    if ($('.item-checkbox:checked').length === 0) {
        setErrorWithTimeout($('.item-checkbox'), "No item selected");
        return false;
    }

    switch (dateOptions) {
        case 'reg':
            if (!singleDateInput || singleDateInput === null || singleDateInput === '' || !isValidDate(singleDateInput)) {
                setErrorWithTimeout($('#singleDateInput'), "Enter Date");
                return false;
            }
            break;

        case 'stay':
            if (startDate === '' || startDate === null || endDate === '' || endDate === null) {
                setErrorWithTimeout($('#startDate, #endDate'), "Enter Date");
                return false;
            }
            if (startDate === endDate) {
                setErrorWithTimeout($('#startDate, #endDate'), "Two dates cannot be the same");
                return false;
            }
            break;

        default:
            if (dateOptions !== 'reg' && dateOptions !== 'stay') {
                setErrorWithTimeout($('#startDate, #endDate'), "Two dates cannot be the same");
                return false;
            }
            break;
    }
    return true;
}


function submitDetails() {

    var setName = $('#set-name').val();
    var setEmail = $('#set-email').val();
    var setPhone = $('#set-phone').val();
    var setCity = $('#set-city').val();
    var setBrgy = $('#set-brgy').val();
    var setZip = $('#set-zip').val();
    var setMsg = $('#set-msg').val();

    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    const phonePattern = /^\+?(\d[\d-. ]+)?(\([\d-. ]+\))?[\d-. ]+\d$/;

    switch (true) {
        case (
            (setName === null || setName === '') &&
            (setEmail === null || setEmail === '') &&
            (setPhone === null || setPhone === '') &&
            (setCity === null || setCity === '') &&
            (setBrgy === null || setBrgy === '') &&
            (setZip === null || setZip === '')
        ):
            $('#set-name, #set-email, #set-phone, #set-city, #set-brgy, #set-zip').removeClass('border-gray-300').addClass('border-red-600');
            $('#alert-box').removeClass('invisible').addClass('visible opacity-100');
            $('#alert-text').html("Fields are empty!");

            setTimeout(function () {
                $('#set-name, #set-email, #set-phone, #set-city, #set-brgy, #set-zip').removeClass('border-red-600').addClass('border-gray-300');
            }, 3000);

            alertErrors();
            return false;
            
        case (setName.length > 60):
            setErrorWithTimeout($('#set-name'), "Name is too long!");
            return false;

        case (setName.length < 10):
            setErrorWithTimeout($('#set-name'), "Name is too short!");
            return false;

        case (setEmail === null || setEmail == ''):
            setErrorWithTimeout($('#set-email'), "Oops email is empty!");
            return false;

        case (!emailRegex.test(setEmail)):
            setErrorWithTimeout($('#set-email'), "Oops email is incorrect format!");
            return false;

        case (setEmail.length < 5):
            setErrorWithTimeout($('#set-email'), "Email address is too short!");
            return false;

        case (setEmail.length > 50):
            setErrorWithTimeout($('#set-email'), "Email address is too long!");
            return false;

        case (setPhone === null || setPhone.trim() === ''):
            setErrorWithTimeout($('#set-phone'), "Phone number field is empty!");
            return false;

        case (!phonePattern.test(setPhone)):
            setErrorWithTimeout($('#set-phone'), "Invalid phone number format!");
            return false;

        case (setCity === null || setCity === ''):
            setErrorWithTimeout($('#set-city'), "City field is empty!");
            return false;

        case (setBrgy === null || setBrgy === ''):
            setErrorWithTimeout($('#set-brgy'), "Barangay field is empty!");
            return false;

        case (setZip === null || setZip.trim() === ''):
            setErrorWithTimeout($('#set-zip'), "Zip field is empty!");
            return false;
        default:
            break;
    }

    return true;
}

function validateBooking() {
    const start = document.form.start.value;
    const end = document.form.end.value;
    const available = document.form.available.value;
    const quantity = document.form.quantity.value;
    const payment = document.form.payment.value;
    const singleDate = document.form.singleDate.value;
    const selectedOption = document.getElementById('options').value;

    switch (selectedOption) {
        case 'reg':
            if (singleDate === '' || singleDate === null) {
                $('.singleDate').removeClass('border-gray-300').addClass('border-red-600');
                $('#alert-box').removeClass('invisible').addClass('visible opacity-100');
                $('#alert-text').html("Please specify date for regular");
                alertErrors();
                return false;
            }
            break;

        case 'stay':
            if (start === '' || start === null || end === '' || end === null) {
                $('#start').removeClass('border-gray-300').addClass('border-red-600');
                $('#end').removeClass('border-gray-300').addClass('border-red-600');
                $('#alert-box').removeClass('invisible').addClass('visible opacity-100');
                $('#alert-text').html("Enter valid date");
                alertErrors();
                return false;
            }
            if (start === end) {
                $('#startDate').removeClass('border-gray-300').addClass('border-red-600');
                $('#endDate').removeClass('border-gray-300').addClass('border-red-600');
                $('#alert-box').removeClass('invisible').addClass('visible opacity-100');
                $('#alert-text').html("Two dates cannot be the same");
                alertErrors();
                return false;
            }
            break;

        default:
            if (selectedOption !== 'reg' && selectedOption !== 'stay') {
                $('#endDate').removeClass('border-gray-300').addClass('border-red-600');
                $('#alert-box').removeClass('invisible').addClass('visible opacity-100');
                $('#alert-text').html("Please select option");
                alertErrors();
                return false;
            }
            break;
    }

    if (quantity > available) {
        $('#alert-box').removeClass('invisible').addClass('visible opacity-100');
        $('#alert-text').html("Sorry there are only " + available + " available");
        alertErrors();
        return false;
    } else if (available <= 0) {
        $('#alert-box').removeClass('invisible').addClass('visible opacity-100');
        $('#alert-text').html("Sorry there are no available left");
        alertErrors();
        return false;
    }
    if (quantity < 1) {
        $('#alert-box').removeClass('invisible').addClass('visible opacity-100');
        $('#alert-text').html("Invalid quantity");
        alertErrors();
        return false;
    }
    if (payment === '' || payment == null) {
        $('#alert-box').removeClass('invisible').addClass('visible opacity-100');
        $('#alert-text').html("Please select payment");
        alertErrors();
        return false;
    }
}

function validateSignup() {
    const username = document.signUp.username.value;
    const email = document.signUp.email.value;
    const phone = document.signUp.phone.value;
    const password = document.signUp.password.value;

    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    if (username === '' || username == null) {
        $('.singleDate').removeClass('border-gray-300').addClass('border-red-600');
        $('#alert-box').removeClass('invisible').addClass('visible opacity-100');
        $('#alert-text').html("Please specify date for regular");
        alertErrors();
        return false;
    }
    if (!emailRegex.test(email)) {
        alert('Email format is incorrect');
        return false;
    }
    if (email === '' || email == null) {
        alert('Email field is empty');
        return false;
    }
    if (phone === '' || phone == null) {
        alert('Phone number is required');
        return false;
    }
    if (password === '' || password == null) {
        alert('Password number is required');
        return false;
    }
    if (password.length < 8) {
        alert('Your Password must be at least 8 characters long');
        return false;
    }
}

function validateLogin() {
    const email = document.login.email.value;
    const password = document.login.password.value;

    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    if (!email) {
        alert('Email is incorrect');
        return false;
    }
    if (email != email) {
        alert('Email is incorrect');
        return false;
    }
    if (!emailRegex.test(email)) {
        alert('Email format is incorrect');
        return false;
    }
    if (email === '' || email == null) {
        alert('Email field is empty');
        return false;
    }
    if (!password) {
        alert('Password is incorrect');
        return false;
    }
    if (password === '' || password == null) {
        alert('Password number is required');
        return false;
    }
    if (password.length < 8) {
        alert('Your Password did not match');
        return false;
    }
}

// document.addEventListener('DOMContentLoaded', function () {
//     document.getElementById('singleDate').style.display = 'none';
//     document.getElementById('twoDates').style.display = 'none';
// });

function changeInputs() {
    let options = document.getElementById('options');
    let twoDates = document.getElementById('twoDates');
    let singleDate = document.getElementById('singleDate');

    if (options.value === 'reg') {
        singleDate.style.display = '';
        twoDates.style.display = 'none';
    } else {
        twoDates.style.display = '';
        singleDate.style.display = 'none';
    }
}
