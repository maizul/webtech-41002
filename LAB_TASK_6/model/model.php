<?php 

require_once 'model/db_connect.php';

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

function showAllproducts(){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `user_info` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function updateProduct($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE `user_info` set `Name` = ?, `Buying Price` = ?, `Selling Price` = ?, `Display` = ? where `ID` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['name'], $data['buyingPrice'], $data['sellingPrice'], $data['display'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deleteProduct($id){
    $conn = db_conn();
    $selectQuery = "DELETE FROM `user_info` WHERE `ID` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}

function showData($id){
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

function searchData($username){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `user_info` WHERE username = ?";
     try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$username]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}
?>