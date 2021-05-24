<?php

require "./__autoload.php";
use sarassoroberto\usm\model\UserModel;

$model = new UserModel();

$model->logOut();

header('location: ./login.php');

?>