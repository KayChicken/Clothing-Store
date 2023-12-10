<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="admin-items-change.css">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;500;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <?php
    include('./components/header.php');
    ?>
    <section class="change-products">
        <div class='container'>
            <div class='change-products__container'>

                <?php

                $items = mysqli_query($db, "SELECT * FROM item");
                while ($row = mysqli_fetch_array($items)) {
                    echo "
                            <div class='change-product-card'>
                                <a href='./admin-items-change-full.php?id_item={$row['id_item']}'>
                                    <div>
                                        <h2 class='change-item-title'>{$row['title']}</h2>
                                        <p>{$row['brand']}</p>
                                        <img src='./img/products/{$row['img']}' alt='{$row['title']}.jpg' class='change-item-img'>
                                    </div>
                                </a>
                            </div>
                            ";
                }
                ?>





            </div>









        </div>
        </div>
    </section>
</body>