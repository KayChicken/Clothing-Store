<?php
session_start();
if ($_SESSION['user']['role'] != 2 ) {
    die("Нет доступа!");
}
include('./components/header.php');

?>

<head>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;500;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <section class="section_admin">
        <div class="container">
            <h1>Items Panel</h1>
            <nav>
                <ul>
                    <li class='admin-panel__li'>
                        <a href="admin-orders-active.php" class='admin-panel__link'>Active Status</a>
                    </li>
                    <li class='admin-panel__li'>
                        <a href="admin-orders-payment.php" class='admin-panel__link'>Payment Item</a>
                    </li>
                    <li class='admin-panel__li'>
                        <a href="admin-orders-delete.php" class='admin-panel__link'>Delete Order</a>
                    </li>

                </ul>
            </nav>
        </div>
    </section>
</body>