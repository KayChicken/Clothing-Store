<?php
    include('./components/header.php');

?>

<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="section_admin">
        <div class="container">
            <h1>Items Panel</h1>
            <nav>
                <ul>
                    <li style="display:flex; flex-direction:column; row-gap:10px;">
                        <a href="admin-orders-active.php">Active Status</a>
                        <a href="admin-orders-payment.php">Payment Item</a>
                        <a href="admin-orders-delete.php">Delete Order</a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
</body>