// validation.js
function validateForm() {
    let isValid = true;

    // Validate name (only alphabets and spaces)
    const name = document.getElementById("name").value;
    const nameError = document.getElementById("name-error");
    const nameRegex = /^[a-zA-Z\s]+$/;
    if (!nameRegex.test(name)) {
        nameError.textContent = "Name must contain only alphabets and spaces.";
        isValid = false;
    } else {
        nameError.textContent = "";
    }

    // Validate email (basic email format check)
    const email = document.getElementById("email").value;
    const emailError = document.getElementById("email-error");
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        emailError.textContent = "Please enter a valid email address.";
        isValid = false;
    } else {
        emailError.textContent = "";
    }

    // Validate phone (must be digits only, optional +, and length between 10 and 15)
    const phone = document.getElementById("phone").value;
    const phoneError = document.getElementById("phone-error");
    const phoneRegex = /^(\+?[0-9]{10,15})$/;
    if (!phoneRegex.test(phone)) {
        phoneError.textContent = "Phone number must contain only digits and be between 10 and 15 characters long.";
        isValid = false;
    } else {
        phoneError.textContent = "";
    }

    return isValid;
}
