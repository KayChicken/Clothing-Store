<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="blog.css">
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
        <section class="blog">
            <div class="container">
                <div class="blog__content">
                    <div class="blog__container">
                        <img src="./img/blog/b1.jpg" alt="blog.img" class="blog__img">
                        <p class="blog__data">12 November, 2023</p>
                        <h1 class="blog__title">My First Blog</h1>
                        <p class="blog__desc">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi ducimus iste id iure eius quibusdam quaerat nulla, unde quasi neque voluptate, expedita consequuntur quo natus provident nemo perferendis optio. Quasi?</p>
                    </div>

                    <div class="blog__container">
                        <img src="./img/blog/b1.jpg" alt="blog.img" class="blog__img">
                        <p class="blog__data">12 November, 2023</p>
                        <h1 class="blog__title">My First Blog</h1>
                        <p class="blog__desc">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi ducimus iste id iure eius quibusdam quaerat nulla, unde quasi neque voluptate, expedita consequuntur quo natus provident nemo perferendis optio. Quasi?</p>
                    </div>

                    <div class="blog__container">
                        <img src="./img/blog/b1.jpg" alt="blog.img" class="blog__img">
                        <p class="blog__data">12 November, 2023</p>
                        <h1 class="blog__title">My First Blog</h1>
                        <p class="blog__desc">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi ducimus iste id iure eius quibusdam quaerat nulla, unde quasi neque voluptate, expedita consequuntur quo natus provident nemo perferendis optio. Quasi?</p>
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