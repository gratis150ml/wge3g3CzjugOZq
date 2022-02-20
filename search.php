<?php

include "header.php";
include "connect.php";
global $conn;

if(isset($_POST) & !empty($_POST)){
    if(empty($_POST['query']) || !isset($_POST['query'])) {
        echo 'vazio';
    } else {
        if (strlen($_POST['query'])>20) {
            echo 'query mt grande';
        } else {
            $r = $conn->prepare("SELECT * FROM users WHERE username LIKE ? ");
            $r->execute(array('%'.$_POST['query'].'%'));
            $f = $r->fetchAll();
            $c = $r->rowCount();
        }
    }
}
?>