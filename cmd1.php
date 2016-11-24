<?php
    $id = $_REQUEST['id'];
    $state = $_REQUEST['state'];

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=member","root","sunny2897");
        $stmt = $pdo->query("update stat set stat={$state} where id = {$id}");
        if($stmt){
            echo 0;
        }
        else{
            echo 1;
        }
    }catch (Exception $e){
        die("Server Busy");
    }