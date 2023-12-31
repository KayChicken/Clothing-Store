<?php
try {
    include('./db.php');
    $inputJSON = file_get_contents('php://input');
    $inputData = json_decode($inputJSON, true);
    header('Content-type: application/json');
    $id_item = $inputData['items'];
    $remove_item_query = mysqli_query($db, "DELETE FROM item WHERE id_item IN (" . implode(',', $id_item) . ")");
    $remove_sizes_query = mysqli_query($db, "DELETE FROM item_sizes WHERE fk_item_id IN (" . implode(',', $id_item) . ")");
    $remove_from_orders = mysqli_query($db, "DELETE FROM shopping_cart_item WHERE product_item_id IN (" . implode(',', $id_item) . ")");
    echo json_encode(array('type' => 'succesful', 'message' => "Успешно удалено!"));

} catch (Exception $e) {
    echo json_encode(array('type' => 'error', 'message' => $e->getMessage()));
}

?>