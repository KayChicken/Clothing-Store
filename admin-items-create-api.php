<?php
try {
    $inputJSON = file_get_contents('php://input');
    $inputData = json_decode($inputJSON, true);
    header('Content-type: application/json');
    include('./db.php');
    $uploadDirectory = 'img/products/';
    $file = $_FILES['img'];
    if ($file['error'] !== UPLOAD_ERR_OK) {

    }
    $fileName = uniqid() . '_' . basename($file['name']);
    $targetPath = $uploadDirectory . $fileName;
    move_uploaded_file($file['tmp_name'], $targetPath);
    $title = $_POST['title'];
    $description = $_POST['description'];
    $img = $fileName;
    $brand = $_POST['brand'];
    $compound = $_POST['compound'];
    $price = $_POST['price'];
    $sizes = json_decode($_POST['sizes'], true);
    $create_item = mysqli_query($db, "INSERT INTO item (title,description,img,brand,compound,price) VALUES ('$title', '$description','$img','$brand','$compound','$price')");
    if (!$create_item) {
        echo json_encode(array('type' => 'error', 'message' => 'Ошибка при выполнении запроса: ' . mysqli_error($db)));
        exit;
    }
    if (!empty($sizes)) {
        $item_id = mysqli_insert_id($db);
        foreach ($sizes as $size) {
            $add_size = mysqli_query($db, "INSERT INTO item_sizes VALUES ($item_id, $size)");
        }
    }
    echo json_encode(array('type' => 'succesful', 'message' => "Успешно создано!"));
    exit;

} catch (Exception $e) {
    echo json_encode(array('type' => 'error', 'message' => $e->getMessage()));
    exit;
}

?>