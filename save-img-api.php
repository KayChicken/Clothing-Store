<?php
try {
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
    echo json_encode(array('type' => 'succesful', 'message' => $img));
    exit;

} catch (Exception $e) {
    echo json_encode(array('type' => 'error', 'message' => $e->getMessage()));
    exit;
}

?>