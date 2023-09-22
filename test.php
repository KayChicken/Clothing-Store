<?php

if (isset($_GET['item'])) {
    $itemId = $_GET['item'];
    $item = $mysql->query("SELECT * FROM clothes WHERE id = $itemId");
    if ($item->num_rows > 0) {
        while ($row = $item->fetch_assoc()) {
            echo "
                       <div>{$row['id']}</div>
                   ";
        }
    } else {
        echo 'Ничего не найдено!';
    }

} else {
    print_r("NOOOO!");
}
?>


<div class="item__col">
    <img class='item__img' src="./img/products/f3.jpg" alt="dsa">
</div>
<div class="item__col">
    <h1 class="item__title">Men's Fashion T Shirts</h1>
    <h2 class="item__price">$139.00</h2>
    <select class="item__sizes" name="" id="">
        <option value="">Select Size</option>
        <option value="">M</option>
        <option value="">L</option>
        <option value="">XL</option>
        <option value="">XLL</option>
    </select>
    <button class="add__cart">Add To Cart</button>
    <div class="item__details">
        <h2>Product Details</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, at, veniam earum molestiae
            similique velit corrupti, illum delectus architecto magni sapiente totam accusamus id
            iste officia provident fugit quam atque?
            Repellendus vel reprehenderit nulla veritatis sapiente mollitia doloremque ut hic
            officiis illo similique distinctio deleniti aut perferendis ipsam doloribus, architecto
            vero cupiditate eius expedita dicta voluptate. Totam beatae iste obcaecati.</p>
    </div>
</div>