<?php
include('db.php');
session_start();
try {
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);
    if (!empty($data['login'] && !empty($data['password']))) {
        $login = $data['login'];
        $password = $data['password'];
        $user_query = mysqli_query($db, "SELECT * FROM user WHERE login = '$login'");
        if (mysqli_num_rows($user_query)) {
            $user = mysqli_fetch_assoc($user_query);
            $passwordHash = $user['password'];
            $passwordVerify = password_verify($password, $passwordHash);
            if ($passwordVerify) {
                $_SESSION['id'] = $user['id'];
                echo json_encode(array('type' => 'succesful','message' => 'Успешная авторизация!'));
            } else {
                echo json_encode(array('type' => 'error','message' => 'Неверный логин или пароль'));
            }
            exit();
        } else {
            echo json_encode(array('type' => 'error','message' => 'Неверный логин или пароль'));
        }

    } else {
        throw new Exception('Не все поля заполнены');
    }



} catch (Exception $e) {
    echo json_encode(array('type' => 'error','message' => 'Произошла ошибка'));
}


?>