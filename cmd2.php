<?php
    $id = $_REQUEST['id'];
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=member", "root", "sunny2897");
        $sql = "SELECT * FROM stat WHERE id = {$id}";
        $stmt = $pdo->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo $result['command'];
        if($stmt){
            echo 0;
        }
        else{
            echo 1;
        }
    }catch (Exception $e){
        die('Server Busy');
    }