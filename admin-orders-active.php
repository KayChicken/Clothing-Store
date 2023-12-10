<?php
include('./components/header.php');
include('./db.php');



$orders = isset($_POST['orders']) ? $_POST['orders'] : null;
if ($orders) {
    $update_orders = mysqli_query($db, "UPDATE cheques SET status = 2 WHERE id_cheque IN (" . implode(',', $orders) . ")");
}


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
            <form action='/admin-orders-active.php' method='POST'>
                <?php
                $active_orders = mysqli_query($db, 'SELECT * FROM `cheques`
                LEFT JOIN orders ON orders.cheque_id = cheques.id_cheque
                WHERE cheques.status = 1');
                if (mysqli_num_rows($active_orders) > 0) {
                    $currentChequeId = null;
                    $total_price = 0;
                    $count = mysqli_num_rows($active_orders);
                    $next = 0;
                    while ($row = mysqli_fetch_array($active_orders)) {

                        if ($currentChequeId !== $row['id_cheque']) {
                            if ($total_price !== 0) {
                                echo "<p>Total Price: $total_price</p>";
                            }

                            $total_price = 0;
                            echo "<div style='display:flex; justify-content:space-between; align-items:center' class='order-head'>";
                            echo "<h2>Name : {$row['full_name']}</h2>";
                            echo "<input type='checkbox' name='orders[]' value={$row['id_cheque']}>";
                            echo "</div>";
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
                    <button style="margin-top:25px;" type='submit'>Add to Payment</button>
                <?
                } else {
                    echo "No orders☹️";
                }




                ?>
            </form>
        </div>
    </section>
</body>