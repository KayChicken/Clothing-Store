<?php
include('./components/header.php');

?>

<head>
    <title>Create Item</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="admin-items.css">

</head>

<body>
    <section class="section_admin">
        <div class="container">
            <h1>Create Item</h1>
            <form action="/" method="POST" class='admin-item-form' enctype="multipart/form-data">
                <div class="admin-item-container">
                    <div class="input-block">
                        <label for="title">Title</label>
                        <input type="text" id='title' name="title" class='input-data'>
                        <small class='input-error'></small>
                    </div>
                    <div class="input-block">
                        <label for="description">Description</label>
                        <input type="text" id='description' name="description" class='input-data'>
                        <small class='input-error'></small>
                    </div>
                    <div class="input-block">
                        <label for="fileToUpload">Img</label>
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <small class='input-error'></small>
                    </div>
                    <div class="input-block">
                        <label for="brand">Brand</label>
                        <input type="text" id='brand' name="brand" class='input-data'>
                        <small class='input-error'></small>
                    </div>
                    <div class="input-block">
                        <label for="compound">Compound</label>
                        <input type="text" id='compound' name="compound" class='input-data'>
                        <small class='input-error'></small>
                    </div>
                    <label for="sizes">Sizes</label>
                    <div class='items-sizes'>

                        <?php
                        $sizes = mysqli_query($db, "SELECT * FROM sizes");
                        foreach ($sizes as $size) {
                            echo "<div>";
                            echo "<label>{$size['size']}</label>";
                            echo "<input type='checkbox' name='sizes[]' class='sizes-checkbox' value='{$size['id']}'>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                    <div class="input-block">
                        <label for="price">Price</label>
                        <input type="number" id='price' name="price" class='input-data'>
                        <small class='input-error'></small>
                    </div>

                </div>
                <input type="submit" class="create-btn" value="Create">
            </form>
        </div>
    </section>
    <script src='./admin-item.js'></script>
</body>