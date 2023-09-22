<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha384-KyZXEAg3QhqLMpG8r+3Lwy6CpTzW5BJqW+9BqI2Z6V6g6I6U5f5un5PCxOEGF8MHL" crossorigin="anonymous">
</head>

<body>
    <?php
    require('./components/header.php')
        ?>
    <main>
        <section>
            <div class="container">
                <div class="full__item">
                    <div class="col">
                        <img src="./img/products/f3.jpg" alt="dsa">
                    </div>
                    <div class="col">
                        <h1 class="item__title"></h1>
                        <h2 class="item__price"></h2>
                        <option value="1">

                        </option>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
    require('./components/footer.php')
        ?>
</body>

</html>