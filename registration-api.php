<?php
session_start();
include('db.php');
try {
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);
    if (!empty($data['username']) && !empty($data['login'] && !empty($data['password']))) {
        $username = $data['username'];
        $login = $data['login'];
        $password = $data['password'];
        $user = mysqli_query($db, "SELECT * FROM user WHERE login = '$login'");
        if(!mysqli_num_rows($user)) {
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);
            $createUser = mysqli_query($db, "INSERT INTO user (username,login,password) VALUES ('$username','$login','$passwordHash')");
            $lastInsertedId = mysqli_insert_id($db);
            $newCart = mysqli_query($db , "INSERT INTO shopping_cart (id_user) VALUES ('$lastInsertedId')");
            $_SESSION['id'] = $lastInsertedId;
            echo json_encode(array('type' => 'succesful','message' => 'Пользователь успешно создан!'));
        }

        else {
            echo json_encode(array('type' => 'error','message' => 'Такой пользователь уже существует'));
        }
        
    } else {
        throw new Exception('Не все поля заполнены');
    }

   

} catch (Exception $e) {
    echo 'Выброшено исключение: ', $e->getMessage(), "\n";
}

?>