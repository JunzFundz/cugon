
// from form
// const singleDate = document.getElementById('singleDate');
// const start = document.getElementById('start');
// const end = document.getElementById('end');
// const quantity = document.getElementById('quantity');
// const meal = document.getElementById('meal');
// const payment = document.getElementById('payment');
// const selectedOption = document.getElementById('options').value;

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('twoDates').style.display = 'none';
    document.getElementById('singleDate').style.display = 'block';
});


//! inputs option for regular and stay
function changeInputs() {
    const twoDates = document.getElementById('twoDates');
    const singleDate = document.getElementById('singleDate');

    if (options.value === 'reg') {
        singleDate.style.display = '';
        twoDates.style.display = 'none';
    } else {
        twoDates.style.display = '';
        singleDate.style.display = 'none';
    }
}

// function getData() {

//     const options = { month: 'short', day: 'numeric', year: 'numeric' }

//     const startDate = new Date(start.value);
//     const endDate = new Date(end.value);

// Format ang date
//     const formattedStartDate = startDate.toLocaleDateString('en-PH', options);
//     const formattedEndDate = endDate.toLocaleDateString('en-PH', options);

//     document.getElementById('dateStart').innerHTML = formattedStartDate;
//     document.getElementById('dateEnd').innerHTML = formattedEndDate;
//     document.getElementById('itemQuantity').innerHTML = quantity.value;
//     document.getElementById('mealSelected').innerHTML = meal.value;
//     document.getElementById('paymentSelected').innerHTML = payment.value;

// }

// checkoutbtn.addEventListener('click', getData);


//! user cancel booking request
function cancelBook(resID) {
    if (confirm("Are you sure you want to cancel this request?")) {
        $.ajax({
            url: '../data/user-cancel.php',
            type: 'post',
            data: {
                resID: resID
            },
            success: function (response) {
                console.log(response);
                alert('Success');
                location.reload();
            },
            error: function () {
                alert('Error: ');
            }
        });
    }
}

