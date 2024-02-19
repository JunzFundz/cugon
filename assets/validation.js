function validateBooking() {

    const start = document.form.start.value;
    const end = document.form.end.value;
    const available = document.form.available.value;
    const quantity = document.form.quantity.value;
    const payment = document.form.payment.value;
    const singleDate = document.form.singleDate.value;
    const selectedOption = document.getElementById('options').value;

    // validation for dates
    switch (selectedOption) {
        case 'reg':
            if (singleDate === '' || singleDate === null) {
                alert("Please specify date for regular booking");
                return false;
            }
            break;
    
        case 'stay':
            if (start === '' || start === null || end === '' || end === null) {
                alert("Please enter a valid date");
                return false;
            }
            if (start === end) {
                alert("Start and End date cannot be the same");
                return false;
            }
            break;
    
        default:
            if (selectedOption !== 'reg' && selectedOption !== 'stay') {
                alert("Please select an option");
                return false;
            }
            break;
    }

    if (quantity > available) {
        alert("Sorry, there are only " + available + " available");
        return false;
    } else if (available <= 0) {
        alert("Sorry, there are no available to this item");
        return false;
    }
    if (quantity < 1) {
        alert("Invalid Quantity");
        return false;
    }
    if (payment === '' || payment == null) {
        alert("Please add a payment");
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
        alert('Username is required');
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


document.addEventListener('DOMContentLoaded', function () {
    // e hide niya both singleDate and twoDates by default
    document.getElementById('singleDate').style.display = 'none';
    document.getElementById('twoDates').style.display = 'none';
});


// inputs option for regular and stay
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
