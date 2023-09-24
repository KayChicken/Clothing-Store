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
    require('./components/header.php');
    require('./db.php');
    ?>
    <main>
        <section class='cart'>
            <div class="container">
                <h1>Cart</h1>
                <div class="cart__content">
                    <div class="cart__item">
                        <?php
                            if (!isset($_COOKIE['items'])) {
                            
                                echo "Корзина пустая";
                            } else {
                             
                                $items = unserialize($_COOKIE['items']);
                                $idList = implode(',', $items);
                                $result = $mysql->query("SELECT * FROM clothes WHERE id IN ({$idList})");
                                while ($row = $result->fetch_assoc()) {
                                    echo "<div>{$row['title']}</div>";
                                    echo "<div>\$ {$row['price']}</div>";
                                }


                            }

            
                        ?>
                    </div>
                </div>
                <button onclick="clearCart()">Remove Cart</button>
            </div>
        </section>
    </main>
    <?php
    require('./components/footer.php');
    ?>
    <script src="cart.js"></script>
</body>

</html>