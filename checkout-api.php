<?php
try {
    session_start();
    include('./db.php');
    $inputJSON = file_get_contents('php://input');
    $inputData = json_decode($inputJSON, true);
    header('Content-type: application/json');
    $fullName = $inputData['fullName'];
    $city = $inputData['city'];
    $address = $inputData['address'];
    $phoneNumber = $inputData['phoneNumber'];
    $user_id = $_SESSION['id'];
    $create_cheque_query = mysqli_query($db, "INSERT INTO cheques (fk_user_id,full_name,city,address,phone) VALUES ('$user_id','$fullName','$city','$address','$phoneNumber')");
    $cheque_id = mysqli_insert_id($db);
    $user_items_query = mysqli_query($db, "SELECT * FROM shopping_cart_item 
    JOIN shopping_cart ON shopping_cart.id = shopping_cart_item.cart_id 
    JOIN item ON item.id_item = shopping_cart_item.product_item_id
    JOIN sizes ON sizes.id = shopping_cart_item.size_id
    WHERE id_user = '$user_id'
    ");
    while ($row = mysqli_fetch_array($user_items_query)) {
        $order_price = $row['price'] * $row['qty'];
        $item_name = $row['title'];
        $quantity = $row['qty'];
        $size_id = $row['size'];
        $item_img = $row['img'];
        $order_insert = mysqli_query($db, "INSERT INTO orders (cheque_id,product_name,quantity,size,img,order_total_price) VALUES ('$cheque_id','$item_name','$quantity','$size_id','$item_img','$order_price')");
    }
    $total_price_query = mysqli_query($db, "SELECT SUM(order_total_price * quantity) as total_price FROM orders 
    WHERE cheque_id = $cheque_id");
    $total_price = mysqli_fetch_assoc($total_price_query)['total_price'];
    $update_cheque = mysqli_query($db, "UPDATE cheques SET total_price = '$total_price' WHERE id_cheque = '$cheque_id'");
    echo json_encode(array('type' => 'succesful', 'message' => 'Заказ успешно создан'));

} catch (Exception $e) {
    echo json_encode(array('type' => 'error', 'message' => $e->getMessage()));
}

?>