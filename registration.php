<head>
    <link rel="stylesheet" href="registration.css">
</head>

<body>
    <section class="registration">
        <form class="form-registration">
            <h1 class="registration-title">Registration</h1>
            <div class="input-block">
                <input type="text" id="username" class="registration-input" placeholder="Username" name="username">
                <small class="error-message"></small>
            </div>
            <div class="input-block">
                <input type="text" id="login" class="registration-input" placeholder="Login" name="login">
                <small class="error-message show"></small>
            </div>
            <div class="input-block">
                <input type="password" id="password" class="registration-input" placeholder="Password" name="password">
                <small class="error-message"></small>
            </div>
            <div class="input-block">
                <input type="password" id="repassword" class="registration-input" placeholder="Re-Password"
                    name="re-password">
                <small class="error-message"></small>
            </div>
            <div class="registration-btns">
                <button class="registration-btn">Registration</button>
                <a class="registration-btn" href="./login.php">Login</a>
            </div>
        </form>
    </section>
    <script src="./registration.js"></script>
</body>