<?php
    $account = $_POST['account'];
    $passwd = $_POST['passwd'];

    try {
        $pdo = new PDO("mysql=host:localhost;dbname=memberaccount", "root", "sunny2897");
        $sql = "SELECT * FROM memberaccount WHERE account='{$account}'";
        $stmt = $pdo->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $dbpasswd = $result['passwd'];

        if (password_verify($passwd, $dbpasswd)) {
            echo 'OK';
        } else {
            echo 'XX';
        }
    }catch(Exception $e){
        die("Server Busy");
    }
?>