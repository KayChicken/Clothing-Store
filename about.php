<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="about.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha384-KyZXEAg3QhqLMpG8r+3Lwy6CpTzW5BJqW+9BqI2Z6V6g6I6U5f5un5PCxOEGF8MHL" crossorigin="anonymous">
    <title>About Us</title>
</head>

<body>
    <?php
    require('./components/header.php')
        ?>
    <main>
        <section class="about">
            <div class="container">

                <div class="about__content">

                    <div class="about__container">
                        <div class="about__col">
                            <img src="./img/about/a6.jpg" alt="" class="about__img">
                        </div>
                        <div class="about__col">
                            <h1>Who We Are?</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita recusandae nostrum
                                laboriosam? Fugit, placeat reprehenderit nihil totam delectus excepturi ut voluptas
                                autem.</p>

                        </div>
                    </div>

                    <div class="about__container">
                        <div class="about__col">
                            <img src="./img/about/a5.jpg" alt="" class="about__img">
                        </div>
                        <div class="about__col">
                            <h1>Smart Shopping</h1>
                            <p>At our online store, we celebrate the art of smart shopping. We understand that every
                                purchase is an opportunity to make a meaningful choice. With a curated selection of
                                products that blend quality, style, and value, we empower you to shop
                                consciously.
                            </p>

                        </div>
                    </div>

                    <div class="about__container">
                        <div class="about__col">
                            <img src="./img/about/a4.png" alt="" class="about__img">
                        </div>
                        <div class="about__col">
                            <h1>Quality Assurance</h1>
                            <p>At our online store, we take pride in our unwavering commitment to quality assurance. We
                                understand that your trust is earned through consistent excellence, and we go above and
                                beyond to ensure that every product meets the highest standards.
                                
                            </p>

                        </div>
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