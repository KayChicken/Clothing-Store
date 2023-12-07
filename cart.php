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
    if (isset($_POST['clear'])) {
        if ($_POST['clear'] == true) {
            $_SESSION['cart'] = [];
        }
    }
    ?>
    <main>
        <section class='cart'>
            <div class="container">
                <h1>Cart</h1>
                <div class="cart__content">
                    <div class="cart__item">
                        <?php

                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $item) {
                                if (is_array($item)) {
                                    echo "
                                        <h3>{$item['title']}</h3>
                                        <img class='cart-img' src='./img/products/{$item['img']}' />
                                        <div>{$item['description']}</div>
                                        <div>{$item['compound']}</div>
                                        <div>{$item['price']}</div>
                                        <div>Выбранный размер : {$item['size']}</div>
                                        <div>Количество : 1</div>
                                        <button class='remove-item' >Убрать из корзины</button>
                                        
                                    ";
                                }


                            }
                        }

                        ?>
                    </div>
                </div>
                <form action="/cart.php" method='POST'>
                    <input type="text" name="clear" value="true" hidden>
                    <button class="buy-items">Сделать заказ</button>
                    <button type="sumbit" class="clear-cart">Clear Cart</button>
                </form>

            </div>
        </section>
    </main>
    <?php
    require('./components/footer.php');
    ?>
    <script src="cart.js"></script>
</body>

</html>