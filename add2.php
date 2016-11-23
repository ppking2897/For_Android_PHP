<?php
    $account = $_POST['account'];
    $passwd = $_POST['passwd'];
    $newpasswd = password_hash($passwd,PASSWORD_DEFAULT);

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=member","root","sunny2897");
        $stmt = $pdo->prepare("INSERT INTO memberaccount (account,passwd) VALUES (?,?)");
        $stmt->bindParam(1, $account);
        $stmt->bindParam(2, $newpasswd);
        if ($stmt->execute()){
            echo 'OK';
            $newid = $pdo->lastInsertId();
            $upload = $_FILES['file'];
            if($upload['error']==0){
                if(copy($upload['tmp_name'],"upload/icon_{$newid}.jpg")){
                    echo 'OK2';
                }
                else{
                    echo 'Copy Fail ';
                }
            }
            else{
                echo 'Upload Fail :' . $upload['error'] ;
            }

        }else{
            echo 'XX';
        }
    }catch (Exception $e){
        die("Server Busy");
    }