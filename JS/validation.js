
function validateForm() {
    const email = document.querySelector('input[name="email"]').value;
    const phone = document.querySelector('input[name="phone"]').value;
    if (!email || !phone) {
        alert("Email and phone cannot be empty!");
        return false;
    }
    return true;
}