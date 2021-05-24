<?php

session_start();

require "./__autoload.php";
use sarassoroberto\usm\model\UserModel;

$model = new UserModel();

$action = './login.php';
$submit = 'Aggiungi nuovo utente';
$title = 'Login';

if($_SERVER['REQUEST_METHOD']==='GET') {
    $email = '';
}

if($_SERVER['REQUEST_METHOD']==='POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
}

if(!isset($_SESSION['exists']) || !isset($_SESSION['correctPassword'])){
    $exists = false;
    $correctPassword = false;
} else {
    $exists = $_SESSION['exists'];
    $correctPassword = $_SESSION['correctPassword'];
}

foreach($model->readAll() as $user) {
    if($user->getEmail()===$email){
        $exists = true;
        $_SESSION['exists'] = $exists;
        if($user->getPassword()===md5($password)) {
            $correctPassword = true;
            $_SESSION['correctPassword'] = $correctPassword;
        }
    }
}

if($exists && $correctPassword) {
    header('location: ./list_users.php');
    $_SESSION["loggedIn"] = true;
}

include 'src/view/login_view.php';

?>