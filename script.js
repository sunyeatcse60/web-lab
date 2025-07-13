document.getElementById("registrationForm").addEventListener("submit", function (e) {
    e.preventDefault();
  
   
    const username = document.getElementById("username").value.trim();
    const email = document.getElementById("email").value.trim();
    const phone = document.getElementById("phone").value.trim();
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;
  
    
    let isValid = true;
    const errors = {
      username_error: "",
      email_error: "",
      phone_error: "",
      password_error: "",
      confirmPassword_error: ""
    };
  
    // Username Validation
    if (username === "") {
      errors.username_error = "Username is required.";
      isValid = false;
    } else if (username.length < 3) {
      errors.username_error = "Username must be at least 3 characters.";
      isValid = false;
    }
  
    // Email Validation
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email === "") {
      errors.email_error = "Email is required.";
      isValid = false;
    } else if (!emailPattern.test(email)) {
      errors.email_error = "Invalid email format.";
      isValid = false;
    }
  
    // Phone Validation
    const phonePattern = /^[0-9]{10,15}$/;
    if (phone === "") {
      errors.phone_error = "Phone number is required.";
      isValid = false;
    } else if (!phonePattern.test(phone)) {
      errors.phone_error = "Phone must be 10–15 digits.";
      isValid = false;
    }
  
    // Password Validation
    if (password.length < 6) {
      errors.password_error = "Password must be at least 6 characters.";
      isValid = false;
    }
  
    // Confirm Password Validation
    if (confirmPassword !== password) {
      errors.confirmPassword_error = "Passwords do not match.";
      isValid = false;
    }
  
    // Show errors
    for (let id in errors) {
      document.getElementById(id).textContent = errors[id];
    }
  
    // Submit if valid
    if (isValid) {
      alert("Registration successful!");
      document.getElementById("registrationForm").reset();
    }
  });
  