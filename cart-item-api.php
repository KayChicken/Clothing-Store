<?php

try {
    session_start();
    include('db.php');
    $inputJSON = file_get_contents('php://input');
    $inputData = json_decode($inputJSON, true);
    header('Content-type: application/json');
    $id_item = $inputData['id_item'];
    $size = $inputData['size'];
    if (empty($size)) {
        echo json_encode(['type' => 'error', 'message' => 'Не выбран размер одежды!']);

    } else {
        $item['size'] = $size;
        $idUser = $_SESSION['id'];
        if (empty($idUser)) {
            echo json_encode(['type' => 'succesful', 'message' => 'Вы не авторизованы!']);
            exit;
        }
        $cart_query = mysqli_query($db, "SELECT * FROM shopping_cart WHERE id_user = '$idUser'");
        $cart = mysqli_fetch_assoc($cart_query);
        $cartId = $cart['id'];
        $cart_query_item = mysqli_query($db, "SELECT * FROM shopping_cart_item WHERE cart_id = '$cartId' AND product_item_id = '$id_item' AND size_id = '$size'");
        if (mysqli_num_rows($cart_query_item) > 0) {
            $cart_item = mysqli_fetch_assoc($cart_query_item);
            $cart_item_id = $cart_item['id'];
            $addCart = mysqli_query($db, "UPDATE shopping_cart_item SET qty = qty + 1 WHERE id = $cart_item_id ");
            echo json_encode(['type' => 'succesful', 'message' => 'Одежда была добавлена в корзину']);
        } else {
            $addCart = mysqli_query($db, "INSERT INTO shopping_cart_item (cart_id,product_item_id,qty,size_id) VALUES ('$cartId','$id_item',1,'$size')");

            echo json_encode(['type' => 'succesful', 'message' => 'Одежда была добавлена в корзину']);
        }

    }


} catch (Exception $e) {
    echo json_encode(array('type' => 'error', 'message' => $e->getMessage()));
}



?>