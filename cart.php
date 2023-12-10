<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="cart.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha384-KyZXEAg3QhqLMpG8r+3Lwy6CpTzW5BJqW+9BqI2Z6V6g6I6U5f5un5PCxOEGF8MHL" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<body>
    <?php

    session_start();
    require('./components/header.php');
    require('./db.php');
    if (isset($_POST['clear']) && isset($_SESSION['id'])) {
        $user_id = $_SESSION['id'];
        $cart_id_query = mysqli_query($db, "SELECT * FROM shopping_cart WHERE id_user = '$user_id'");
        $cart_id = mysqli_fetch_assoc($cart_id_query)['id'];
        $delete_cart = mysqli_query($db, "DELETE FROM shopping_cart_item WHERE cart_id = $cart_id");
    }
    ?>
    <main>
        <section class='cart'>
            <div class="container">
                <h1>Cart</h1>
                <div class="cart__content">
                    <?php
                    if (isset($_SESSION['id'])) {
                        $id_user = $_SESSION['id'];
                        $cartItems = mysqli_query($db, "SELECT * FROM `shopping_cart` 
                        JOIN shopping_cart_item ON shopping_cart_item.cart_id = shopping_cart.id
                        JOIN item ON item.id_item = shopping_cart_item.product_item_id
                        JOIN sizes ON sizes.id = shopping_cart_item.size_id
                        WHERE id_user = $id_user");

                        while ($item = mysqli_fetch_array($cartItems)) {

                            echo "
                                        <div class='cart__item'>
                                            <h3>{$item['title']}</h3>
                                            <img class='cart-img' src='./img/products/{$item['img']}' />
                                            <div>{$item['description']}</div>
                                            <div>{$item['compound']}</div>
                                            <div>Price : " . ($item['qty'] * $item['price']) . '$' . "</div>
                                            <div>Choose Size : {$item['size']}</div>
                                            <div>Quantity : {$item['qty']}</div>
                                            <button class='remove-item' data-id='{$item['id_item']}' data-size='{$item[14]}'>Remove</button>

                                           
                                        </div>
                                        ";

                        }

                    } else {
                        echo "<div style='font-size: 1.2rem;'>You are not authorized ☹️</div>";
                    }

                    ?>

                </div>
                <?php
                if (isset($_SESSION['id'])) {
                    if (mysqli_num_rows($cartItems) > 0) {
                        echo "
                        <form action='/cart.php' method='POST' class='remove-items'>
                        <input type='text' name='clear' value='true' hidden>
                        <a href='./checkout.php' class='buy-items'>Checkout</a>
                        <button type='sumbit' class='clear-cart'>Clear Cart</button>
                        </form>
                        ";
                    }
                    
                    else {
                        echo "<div>Cart is empty ☹️</div>";
                    }

                }
                ?>

                
            </div>
        </section>
    </main>
    <?php
    require('./components/footer.php');
    ?>
    <script src="cart-remove.js"></script>
</body>

</html>