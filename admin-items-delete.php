<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="admin-items-change.css">
</head>

<body>
    <?php
    session_start();
    if ($_SESSION['user']['role'] != 2 ) {
        die("Нет доступа!");
    }
    include('./components/header.php');
    ?>
    <section class="change-products">
        <div class='container'>
            <div class='change-products__container'>
                <?php

                $items = mysqli_query($db, "SELECT * FROM item");
                while ($row = mysqli_fetch_array($items)) {
                    echo "
                            <div class='change-product-card' data-id='{$row['id_item']}'>
                                        <h2 class='change-item-title'>{$row['title']}</h2>
                                        <p>{$row['brand']}</p>
                                        <img src='./img/products/{$row['img']}' alt='{$row['title']}.jpg' class='change-item-img'>  
                            </div>
                            ";
                }
                ?>


            </div>
            <div id='num-items'>Choose items : 0</div>
            <button id='delete-btn'>Delete</button>
        </div>


    </section>
    <script src='./admin-item-delete.js'></script>
</body>