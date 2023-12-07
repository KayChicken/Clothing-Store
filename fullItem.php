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
                <form class="item-form">
                    <div class="full__item">
                        <?php

                        if (isset($_GET['id_item'])) {
                            $itemId = $_GET['id_item'];
                            $item = mysqli_query($db, "SELECT * FROM item WHERE id_item = '$itemId'");
                            if (mysqli_num_rows($item) > 0) {
                                while ($row = mysqli_fetch_assoc($item)) {
                                    echo "
                            <div class='item__col'>
                                <img class='item__img' src='./img/products/{$row['img']}' alt='item.png'>
                            </div>
                            <div class='item__col'>
                                <h1 class='item__title' id='item-title'>{$row['title']}</h1>
                                <h2 class='item__price' id='item-price'>\${$row['price']}</h2>
                                <div class='item__sizes__block'>
                                ";
                                    $sizes_from_db = array();
                                    $all_sizes = array('XS','S', 'M', "L", "XL", "XLL");
                                    $result = mysqli_query($db, "SELECT size FROM item_sizes JOIN sizes ON sizes.id = item_sizes.fk_size_id WHERE item_sizes.fk_item_id = '$itemId'");
                                    while ($size = $result->fetch_assoc()) {
                                        $sizes_from_db[] = $size['size'];
                                    }
                                    ;

                                    foreach ($all_sizes as $size) {
                                        $class = in_array($size, $sizes_from_db);
                                        if ($class) {
                                            echo "<input type='radio' class='item__sizes active' name='size' value='{$size}' data-size='{$size}'/>";
                                        } else {
                                            echo "<input type='radio' class='item__sizes' name='size' value='{$size}' data-size='{$size}' disabled />";
                                        }




                                    }
                                    ;

                                    echo "
                                </div>
                                <button class='add__cart'>Add Cart</button>
                                <div class='item__details'>
                                    <h2>Product Details</h2>
                                    <p id='item-brand'>{$row['brand']}</p>
                                    <p id='item-compund'>{$row['compound']}</p>
                                </div>
                                
                            </div>";
                            echo "<input type='number' id='id_item' name='id_item' value='{$itemId}' hidden>";

                                }
                            } else {
                                echo 'Ничего не найдено!';
                            }

                        } else {
                            echo ("Ничего не найдено!");
                        }
                        ?>

                    </div>
                </form>
            </div>
        </section>






    </main>
    <?php
    require('./components/footer.php')
        ?>
    <script src="cart.js"></script>
</body>

</html>