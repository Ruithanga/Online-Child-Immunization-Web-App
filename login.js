document.getElementById('loginLink').addEventListener('click', function() {
    var loginContainer = document.getElementById('loginContainer');
    loginContainer.style.display = (loginContainer.style.display === 'none' || loginContainer.style.display === '') ? 'block' : 'none';
});

function validateForm() {
    function validateForm() {
        var userType = document.getElementById("userType").value;
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
    
        if (userType === "" || username === "" || password === "") {
            alert("Please select user type and provide both username and password!");
            return false;
        }
    
        // Additional validation logic can be added here
    
        return true;
    }
    
}
