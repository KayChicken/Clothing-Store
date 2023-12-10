<?php
include('./components/header.php');
include('./db.php')
    ?>

<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="admin-orders-active.css">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;500;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <section class="section_admin_orders">
        <div class="container">
            <?php
            $active_orders = mysqli_query($db, 'SELECT * FROM `cheques`
                LEFT JOIN orders ON orders.cheque_id = cheques.id_cheque
                WHERE cheques.status = 2 ');
            $currentChequeId = null;
            $total_price = 0;
            $count = mysqli_num_rows($active_orders);
            $next = 0;
            $flag = false;
            while ($row = mysqli_fetch_array($active_orders)) {
           
                if ($currentChequeId !== $row['id_cheque']) {
                    if ($total_price !== 0) {
                        echo "<p>Total Price: $total_price</p>";
                    } 
                   
                    $total_price = 0;
                    echo "<h2 style='margin-top:50px;'>Name : {$row['full_name']}</h2>";
                    $currentChequeId = $row['id_cheque'];
                }
                $total_price += $row['order_total_price'] * $row['quantity'];
                echo "
                    <div class='order-item'>
                        <h1 class='order-name'>{$row['product_name']}</h1>
                        <img src='./img/products/{$row['img']}' alt='{$row['title']}.jpg' class='order-item-img'>
                        <p>Size : {$row['size']}</p>
                        <p>Quantity : {$row['quantity']}</p>
                        <p>Price : {$row['order_total_price']}</p>
                    </div>
                ";

                if ($next === $count - 1) {
                    echo "<p>Total Price: $total_price</p>";
                    $total_price = 0;
                } 
                $next++;



                
                
            }

            ?>

        </div>
    </section>
</body>