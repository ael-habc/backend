<?php

include_once 'db.php';

function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

function registerUser($username, $password, $mail) {
    global $conn;

    $hashedPassword = hashPassword($password);

    $stmt = $conn->prepare("INSERT INTO user (username, password, mail) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $hashedPassword, $mail);

    return $stmt->execute();
}

function loginUser($username, $password) {
    global $conn;

    $stmt = $conn->prepare("SELECT id_user, password FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($userId, $hashedPassword);

    if ($stmt->fetch() && password_verify($password, $hashedPassword)) {
        return $userId;
    } else {
        return false;
    }
}

?>
