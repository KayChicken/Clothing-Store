<?php
session_start();
include('db.php');
$inputJSON = file_get_contents('php://input');
$inputData = json_decode($inputJSON, true);
header('Content-type: application/json');
$id_item = $inputData['id_item'];
$item_query = mysqli_query($db, "SELECT * FROM item WHERE id_item = '$id_item'");
$item = mysqli_fetch_assoc($item_query);
$size = $inputData['size'];
if (empty($size) || empty($item)) {
    echo json_encode(['type' => 'error', 'message' => 'Не выбран размер одежды!']);

} else {
    $item['size'] = $size;
    $_SESSION['cart'][] = $item;
    echo json_encode(['type' => 'succesful', 'message' => 'Одежда была добавлена в корзину']);
}




?>