<?php

$cookie_name = "items";
$cookie_value = json_encode([]); 
$expire_time = time() + (7 * 24 * 60 * 60); 

if (!isset($_COOKIE['items'])) {
    // Если кука не существует, то создаем её
    setcookie($cookie_name, $cookie_value, $expire_time, '/');

} 

?>






<header class="header">
    <div class="container">
        <div class="header__content">
            <a href="./index.php">
                <img src="./img/logo.png" alt="logo.png">
            </a>


            <nav class="header__navigation">
                <ul>
                    <li>
                        <a href="./index.php"
                            class="<?php echo ($_SERVER['SCRIPT_NAME'] == '/index.php') ? 'active' : ''; ?>">Home</a>
                    </li>
                    <li>
                        <a href="./shop.php"
                            class="<?php echo ($_SERVER['SCRIPT_NAME'] == '/shop.php') ? 'active' : ''; ?>">Shop</a>
                    </li>
                    <li>
                        <a href="./blog.php"
                            class="<?php echo ($_SERVER['SCRIPT_NAME'] == '/blog.php') ? 'active' : ''; ?>">Blog</a>
                    </li>
                    <li>
                        <a href="./about.php"
                            class="<?php echo ($_SERVER['SCRIPT_NAME'] == '/about.php') ? 'active' : ''; ?>">About</a>
                    </li>
                    <li>
                        <a href="./contact.php"
                            class="<?php echo ($_SERVER['SCRIPT_NAME'] == '/contact.php') ? 'active' : ''; ?>">Contact</a>
                    </li>

                </ul>
                <a href="./cart.php">
                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3.79424 12.0291C4.33141 9.34329 4.59999 8.00036 5.48746 7.13543C5.65149 6.97557 5.82894 6.8301 6.01786 6.70061C7.04004 6 8.40956 6 11.1486 6H12.8515C15.5906 6 16.9601 6 17.9823 6.70061C18.1712 6.8301 18.3486 6.97557 18.5127 7.13543C19.4001 8.00036 19.6687 9.34329 20.2059 12.0291C20.9771 15.8851 21.3627 17.8131 20.475 19.1793C20.3143 19.4267 20.1267 19.6555 19.9157 19.8616C18.7501 21 16.7839 21 12.8515 21H11.1486C7.21622 21 5.25004 21 4.08447 19.8616C3.87342 19.6555 3.68582 19.4267 3.5251 19.1793C2.63744 17.8131 3.02304 15.8851 3.79424 12.0291Z"
                            stroke="#1C274C" stroke-width="1.5" />
                        <path opacity="0.5" d="M9 6V5C9 3.34315 10.3431 2 12 2C13.6569 2 15 3.34315 15 5V6"
                            stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                        <path opacity="0.5"
                            d="M9.1709 15C9.58273 16.1652 10.694 17 12.0002 17C13.3064 17 14.4177 16.1652 14.8295 15"
                            stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </a>
            </nav>

        </div>
    </div>
</header>