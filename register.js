function validateForm() {
    var userType = document.getElementById("userType").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;

    if (userType === "" || username === "" || password === "" || confirmPassword === "") {
        alert("Please fill in all fields!");
        return false;
    }

    if (password !== confirmPassword) {
        alert("Passwords do not match!");
        return false;
    }

    // Additional validation logic can be added here

    return true;
}
