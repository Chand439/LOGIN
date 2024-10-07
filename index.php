<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form id="loginForm">
            <input type="text" id="loginEmail" placeholder="Email" required>
            <input type="password" id="loginPassword" placeholder="Password" required>
            <button type="submit" id="loginButton">Login</button>
            <div class="error-message" id="loginError"></div>
        </form>

        <h2>Register</h2>
        
        <form id="registerForm" action="register.php" method="POST">
   

            <input type="text" id="registerUsername" name="username"  placeholder="Username" required>
            <input type="email" id="registerEmail" name="email"  placeholder="Email" required>
            <input type="password" id="registerPassword" name="password"  placeholder="Password" required>
            <button type="submit" id="registerButton" action="register.php" >Register</button>
            <div class="success-message" id="registerSuccess"></div>
            <div class="error-message" id="registerError"></div>
        </form>
    </div>

    <script src="script.js"></script>
</body>

</html>


<style>
body {
    font-family: 'Arial', sans-serif;
    background-color: #e9ecef;
    margin: 0;
    padding: 20px;
}

.container {
    max-width: 400px;
    margin: auto;
    padding: 30px;
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
}

input {
    margin: 10px 0;
    padding: 15px;
    border: 1px solid #ced4da;
    border-radius: 5px;
    font-size: 16px;
    transition: border-color 0.3s, box-shadow 0.3s;
}

input:focus {
    border-color: #28a745;
    box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
    outline: none;
}

button {
    padding: 15px;
    background-color: #28a745;
    color: #ffffff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s, transform 0.2s;
}

button:hover {
    background-color: #218838;
    transform: translateY(-2px);
}

button:active {
    transform: translateY(0);
}

.error-message {
    color: red;
    font-size: 14px;
    margin-top: 5px;
}

.success-message {
    color: green;
    font-size: 14px;
    margin-top: 5px;
}

</style>
