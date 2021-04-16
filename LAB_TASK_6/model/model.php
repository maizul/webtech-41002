<?php 

require_once '../model/db_connect.php';
$name = $email = $dob = $gender = $username = $password = $cpassword = "";

function addUser($data){
    $conn = db_conn();
    $selectQuery = "INSERT INTO `user_info`(`name`, `email`, `username`, `password`, `gender`, `dob`)  VALUES (:name, :email, :username, :password, :gender, :dob)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':name' => $data['name'],
            ':email' => $data['email'],
            ':username' => $data['username'],
            ':password' => $data['password'],
            ':gender' => $data['gender'],
            ':dob' => $data['dob']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function showUser($id){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `user_info` where ID = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    return $data;
}

function searchUser($user_name){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `user_info` WHERE username = ?";

    
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$user_name]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function updateUser($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE user_info set name = ?, email = ?, username = ?, gender = ?, dob = ? where ID = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['name'], $data['email'],$data['username'],$data['gender'],$data['dob'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}
?>