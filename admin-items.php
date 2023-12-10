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
    <section class="section__admin">
        <div class="container">
            <h1 class="items-panel-title">Items Panel</h1>
            <nav>
                <ul>
                    <li class='admin-panel__li'>
                        <a href="admin-items-create.php" class='admin-panel__link'>Create Item</a>
                    </li>
                    <li class='admin-panel__li'>
                        <a href="admin-items-change.php" class='admin-panel__link'>Change Item</a>
                    </li>
                    <li class='admin-panel__li'>
                        <a href="admin-items-delete.php" class='admin-panel__link'>Delete Item</a>
                    </li>


                </ul>
            </nav>
        </div>
    </section>
</body>