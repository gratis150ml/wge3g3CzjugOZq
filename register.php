<?php

include "header.php";
include "connect.php";
global $conn;
if('POST' == $_SERVER['REQUEST_METHOD']) {
    $username = rand(1111111111111111, 9999999999999999);
    $password = bin2hex(openssl_random_pseudo_bytes(16)); 
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $result = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $values = array(':username'=>$username, ':password'=>$hash);
    $res = $result->execute($values);
    if($res){
        echo 'Username: '.$username.'<br>Password: '.$password.'';
    } else {
        echo 'Some error occurred.';
    }


}
?>

<form action="register.php" method="POST" id="register" style="padding: 20px; color: white;margin:0 auto;width:29%;text-align:left;">
<h1 style="position:relative; right:-134px;">register</h1><br>
<input style="width: 400px; height: 100px;background-color: #1b1e21; border: 1px solid grey;color: white;" type="submit" class="btn btn-primary" value="gerar">
</form>