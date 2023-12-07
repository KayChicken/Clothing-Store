<?php
try {
    include('./db.php');
    $inputJSON = file_get_contents('php://input');
    $inputData = json_decode($inputJSON, true);
    header('Content-type: application/json');
    $id_item = $inputData['id_item'];
    $title = $inputData['title'];
    $description = $inputData['description'];
    $img = $inputData['img'];
    $brand = $inputData['brand'];
    $compound = $inputData['compound'];
    $price = $inputData['price'];
    $sizes = $inputData['sizes'];
    $change_item = mysqli_query($db, "UPDATE item SET title = '$title', description = '$description', img = '$img', brand = '$brand', compound = '$compound', price = '$price' WHERE id_item = '$id_item'");


    $current_sizes_query = mysqli_query($db, "SELECT fk_size_id FROM item_sizes WHERE fk_item_id = '$id_item'");
    $current_sizes_result = mysqli_fetch_all($current_sizes_query);
    $current_sizes = array_column($current_sizes_result, 0);

    // Сравниваем текущие размеры с новыми размерами ($sizes)
    $sizes_to_add = array_diff($sizes, $current_sizes);
    $sizes_to_remove = array_diff($current_sizes, $sizes);

    // Если есть размеры для добавления, добавляем их
    if (!empty($sizes_to_add)) {
        $item_id = $id_item;
        foreach ($sizes_to_add as $size) {
            $add_size = mysqli_query($db, "INSERT INTO item_sizes VALUES ($item_id, $size)");
        }
    }

    // Если есть размеры для удаления, удаляем их
    if (!empty($sizes_to_remove)) {
        $remove_sizes_query = mysqli_query($db, "DELETE FROM item_sizes WHERE fk_item_id = '$id_item' AND fk_size_id IN (" . implode(',', $sizes_to_remove) . ")");
    }
    echo json_encode(array('type' => 'succesful', 'message' => "Успешно изменено!"));

} catch (Exception $e) {
    echo json_encode(array('type' => 'error', 'message' => $e->getMessage()));
}

?>