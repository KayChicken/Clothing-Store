<?php
    if(isset($_POST['add_to_cart'])) {
        $items = unserialize($_COOKIE['items']);
        $item = $_GET['item'];
        $items[] = $item;
        setcookie('items', serialize($items), time() + 3600, '/');
    }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fullItem.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha384-KyZXEAg3QhqLMpG8r+3Lwy6CpTzW5BJqW+9BqI2Z6V6g6I6U5f5un5PCxOEGF8MHL" crossorigin="anonymous">
</head>

<body>
    <?php
    require('./components/header.php');
    require('./db.php');
    ?>
    <main>
        <section>
            <div class="container">
                <div class="full__item">
                    <?php

                    if (isset($_GET['item'])) {
                        $itemId = $_GET['item'];
                        $item = $mysql->query("SELECT * FROM clothes WHERE id = $itemId");
                        if ($item->num_rows > 0) {
                            while ($row = $item->fetch_assoc()) {
                                echo "
                            <div class='item__col'>
                                <img class='item__img' src='./img/products/{$row['image']}.jpg' alt='dsa'>
                            </div>
                            <div class='item__col'>
                                <h1 class='item__title'>{$row['title']}</h1>
                                <h2 class='item__price'>\${$row['price']}</h2>
                                <div class='item__sizes'>
                                ";
                                $sizes_from_db = array();
                                $all_sizes = array('M',"L","XL","XLL");
                                $result = $mysql->query("SELECT size FROM clothes_sizes JOIN sizes ON sizes.id = clothes_sizes.fk_size AND clothes_sizes.fk_clothes = $itemId");
                                while ($size = $result->fetch_assoc()) {
                                    $sizes_from_db[] = $size['size'];
                                };
                                
                                foreach($all_sizes as $size) {
                                    $class = in_array($size, $sizes_from_db) ? 'active' : '';
                                    echo "<div class='item__size {$class}'>{$size}</div>";
                                };
                               
                                echo "
                                </div>
                                <form method='post' action=''>
                                    <input class='add__cart' type='submit' value='Add To Cart' name='add_to_cart'>
                                </form>
                                <div class='item__details'>
                                    <h2>Product Details</h2>
                                    <p>{$row['details']}</p>
                                </div>
                            </div>
                                    ";
                                
                            }
                        } else {
                            echo 'Ничего не найдено!';
                        }

                    } else {
                        print_r("Ничего не найдено!");
                    }
                    ?>

                </div>
            </div>
        </section>






    </main>
    <?php
    require('./components/footer.php')
        ?>
    <script src="cart.js"></script>
</body>

</html>