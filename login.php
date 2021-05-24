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
    $password = '';
}

if($_SERVER['REQUEST_METHOD']==='POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
}

if(isset($_SESSION['loggedIn'])){
    header('location: ./list_users.php');
}

/*foreach($model->readAll() as $user) {
    if($user->getEmail()===$email){
        $exists = true;
        $_SESSION['exists'] = $exists;
        if($user->getPassword()===md5($password)) {
            $correctPassword = true;
            $_SESSION['correctPassword'] = $correctPassword;
        }
    }
}*/

/*if($exists && $correctPassword) {
    header('location: ./list_users.php');
    $_SESSION["loggedIn"] = true;
}*/

if($model->logIn($email, $password) != null) {
    $_SESSION['loggedIn'] = $model->logIn($email, $password);
    header('location: ./list_users.php');
} else {
    echo($email." ".$password);
}

include 'src/view/login_view.php';

?>