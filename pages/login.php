<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login_signup.css">
    <title>Document</title>
</head>
<body>
    <div class="login_signup">
        <h2>Login</h2>
        <p>* indicates a required fields.</p>
        <form class ="login_signup-form" action= "loginhandle.php" method ="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            
            <button type="submit">Login</button>
        </form>
        <p class="sign-up-link">Don't have an account? <a href="#">Create One.</a></p>
    </div>
    
</body>
</html>
