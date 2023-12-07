<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="admin-items.css">
</head>

<body>
    <?php
    include("./components/header.php");
    include("./db.php");
    if (isset($_GET['id_item'])) {
        $id_item = $_GET['id_item'];
        $item_query = mysqli_query($db, "SELECT * FROM item WHERE id_item = '$id_item'");
    }
    if (isset($item_query) && mysqli_num_rows($item_query) > 0) {
        $item = mysqli_fetch_assoc($item_query);
        ?>

        <section class="section_admin">
            <div class="container">
                <h1>Create Item</h1>
                <form action="/" method="POST" class='admin-item-form'>
                    <div class="admin-item-container">
                        <div class="input-block">
                            <label for="title">ID</label>
                            <div><?php echo $item['id_item']?></div>
                            <input type="text" id='id_item' name="id_item" class='input-data' hidden
                                value='<?php echo $item['id_item']; ?>'>
                            <small class='input-error'></small>
                        </div>
                        <div class="input-block">
                            <label for="title">Title</label>
                            <input type="text" id='title' name="title" class='input-data'
                                value='<?php echo $item['title']; ?>'>
                            <small class='input-error'></small>
                        </div>
                        <div class="input-block">
                            <label for="description">Description</label>
                            <input type="text" id='description' name="description" class='input-data'
                                value='<?php echo $item['description']; ?>'>
                            <small class='input-error'></small>
                        </div>
                        <div class="input-block">
                            <label for="img">Img</label>
                            <input type="text" id='img' name="img" class='input-data' value='<?php echo $item['img']; ?>'>
                            <small class='input-error'></small>
                        </div>
                        <div class="input-block">
                            <label for="brand">Brand</label>
                            <input type="text" id='brand' name="brand" class='input-data'
                                value='<?php echo $item['brand']; ?>'>
                            <small class='input-error'></small>
                        </div>
                        <div class="input-block">
                            <label for="compound">Compound</label>
                            <input type="text" id='compound' name="compound" class='input-data'
                                value='<?php echo $item['compound']; ?>'>
                            <small class='input-error'></small>
                        </div>
                        <label for="sizes">Sizes</label>
                        <div class='items-sizes'>

                            <?php
                            $sizes = mysqli_query($db, "SELECT * FROM sizes");
                            $user_id = $item['id_item'];
                            $item_sizes_query = mysqli_query($db, "SELECT fk_size_id FROM item_sizes WHERE fk_item_id = '$user_id'");
                            $item_sizes_result = mysqli_fetch_all($item_sizes_query);
                            $item_sizes = array_column($item_sizes_result, 0);
                            foreach ($sizes as $size) {
                                echo "<div>";
                                echo "<label>{$size['size']}</label>";
                                $isChecked = in_array($size['id'], $item_sizes);
                                echo "<input type='checkbox' name='sizes[]' class='sizes-checkbox' " . ($isChecked ? 'checked' : '') . " value='{$size['id']}'>";
                                echo "</div>";
                            }
                            ?>
                        </div>
                        <div class="input-block">
                            <label for="price">Price</label>
                            <input type="number" id='price' name="price" class='input-data'
                                value='<?php echo $item['price']; ?>'>
                            <small class='input-error'></small>
                        </div>

                    </div>
                    <input type="submit" class="create-btn" value="Change Item">
                </form>
            </div>
        </section>
        <script src='./admin-item-change.js'></script>
        <?php
    } else {
        echo "Товар не найден";
    }
    ?>
</body>