<?php
session_start();

require "./__autoload.php";
use sarassoroberto\usm\model\UserModel;

if(!$_SESSION['loggedIn']){
    header('location: ./login.php');
}

$model = new UserModel();
$title = "Users List";
include './src/view/list_users_view.php';
?>
