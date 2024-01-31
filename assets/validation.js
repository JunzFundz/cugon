function validateFrom() {
                
    const start = document.form.start.value;
    const end = document.form.end.value;
    const available = document.form.available.value;
    const quantity = document.form.quantity.value;
    const payment = document.form.payment.value;

    if (start === '' || start == null && end === '' || end == null) {
        alert("Please enter a valid date");
        return false;
    }
    if (start == end) {
        alert("Start and End date cannot be the same");
        return false;
    }
    if (quantity > available) {
        alert("Sorry there are only " + available + " available");
        return false;
    }
    if (payment === '' || payment == null) {
        alert("Please add a payment");
        return false;
    }
}