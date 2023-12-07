<head>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <section class="authorization">
        <form class="login-form" action="./login-api.php" method="POST">
            <h1 class="login-title">Login</h1>
            <div class="input-block">
                <input type="text" class="login-input" id='login' placeholder="Login" name="login">
                <small class="error-message"></small>
            </div>
            <div class="input-block">
                <input type="password" class="login-input" id='password' placeholder="Password" name="password">
                <small class="error-message"></small>
            </div>
            <div class="login-btns">
                <button class="login-btn">Login</button>
                <a class="login-btn" href="./registration.php">Registration</a>
            </div>
        </form>
    </section>
    <script src='./login.js'></script>
</body>