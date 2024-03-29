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
        <h2>Sign-up</h2>
        <p>* indicates a required field.</p>
        <form class ="login_signup-form" action = "signuphandle.php" method = "POST" enctype="multipart/form-data" onsubmit="return validateForm(event)">
            <label for="image"> Upload Image*</label>
            <input type="file" id="image" name="image" required><br><br>

            <label for="name"> Enter username*</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="email"> Enter Email*</label>
            <input type="email" id="email" name="email" required><br><br>
            
            <label for="password">Password*</label>
            <input type="password" id="password" name="password" required><br><br>

            <label for="password">Re Enter Password*</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required><br><br>
            <script src = "../script/signupPageValid.js"></script>
            <button type="submit">Signup</button>
        </form>
    </div>
</body>
</html>
