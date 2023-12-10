<?php
try {
    session_start();
    include('db.php');
    $inputJSON = file_get_contents('php://input');
    $inputData = json_decode($inputJSON, true);
    header('Content-type: application/json');
    $id_item = $inputData['id_item'];
    $size = $inputData['size'];
    $id_user = $_SESSION['id'];
    $cart_id_query = mysqli_query($db, "SELECT * FROM shopping_cart WHERE id_user = '$id_user'");
    $cart_id = mysqli_fetch_assoc($cart_id_query)['id'];
    $delte_item_from_cart = mysqli_query($db, "DELETE FROM shopping_cart_item WHERE product_item_id = '$id_item' AND size_id = '$size' AND cart_id = '$cart_id'");
    echo json_encode(array('type' => 'succesful', 'message' => "Убрано из корзины")); 
}


catch (Exception $e) {
    echo json_encode(array('type' => 'error', 'message' => $e->getMessage()));
}

?>