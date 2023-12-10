<?php
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
            <h1 class='admin-panel-title'>Admin Panel</h1>
            <nav class='admin-panel__navigation'>
                <ul>
                    <li class='admin-panel__li'>
                        <a href="./admin-items.php" class='admin-panel__link'>Items</a>
                    </li>
                    <li class='admin-panel__li'>
                        <a href="./admin-orders.php" class='admin-panel__link'>Orders</a>
                    </li>

                </ul>
            </nav>
        </div>
    </section>
</body>