<?php
try {
    include('./db.php');
    $inputJSON = file_get_contents('php://input');
    $inputData = json_decode($inputJSON, true);
    header('Content-type: application/json');
    $title = $inputData['title'];
    $description = $inputData['description'];
    $img = $inputData['img'];
    $brand = $inputData['brand'];
    $compound = $inputData['compound'];
    $price = $inputData['price'];
    $sizes = $inputData['sizes'];
    $create_item = mysqli_query($db, "INSERT INTO item (title,description,img,brand,compound,price) VALUES ('$title', '$description','$img','$brand','$compound','$price')");
    if (!empty($sizes)) {
        $item_id = mysqli_insert_id($db);
        foreach ($sizes as $size) {
            $add_size = mysqli_query($db, "INSERT INTO item_sizes VALUES ($item_id, $size)");
        }
    }
    echo json_encode(array('type' => 'succesful','message' =>  "Успешно создано!"));

}


catch(Exception $e) {
    echo json_encode(array('type' => 'error','message' =>  $e->getMessage()));
}

?>